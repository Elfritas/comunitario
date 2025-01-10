<?php
// Conexión a la base de datos
$host = "localhost";
$dbname = "gestion_estudiantil"; // Nombre de tu base de datos
$username = "root";
$password = "";
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error en la conexión: " . $e->getMessage());
}

// Manejo del formulario (POST)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $telefono = $_POST['telefono'];
    $correo = $_POST['correo'];
    $documento_identidad = $_POST['documento_identidad'];
    $foto_documento = isset($_FILES['foto_documento']) ? $_FILES['foto_documento'] : null;

    // Validación básica
    if (empty($nombre) || empty($apellido) || empty($telefono) || empty($documento_identidad)) {
        $mensaje = "Todos los campos son obligatorios.";
    } else {
        // Verificar si el documento de identidad ya existe
        $sql = "SELECT COUNT(*) FROM representantes WHERE documento_identidad = :documento_identidad";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([':documento_identidad' => $documento_identidad]);
        $count = $stmt->fetchColumn();

        if ($count > 0) {
            $mensaje = "El documento de identidad ya está registrado.";
        } else {
            // Manejo del archivo de la foto del documento, si existe
            $ruta_destino = null;
            if ($foto_documento && $foto_documento['error'] === UPLOAD_ERR_OK) {
                $nombre_archivo = uniqid() . "_" . basename($foto_documento['name']);
                $directorio = "uploads/representantes/";
                $ruta_destino = $directorio . $nombre_archivo;

                // Crear el directorio si no existe
                if (!file_exists($directorio)) {
                    mkdir($directorio, 0777, true);
                }

                // Mover el archivo subido
                if (!move_uploaded_file($foto_documento['tmp_name'], $ruta_destino)) {
                    $mensaje = "Error al subir la foto del documento.";
                    $ruta_destino = null;
                }
            } elseif ($foto_documento && $foto_documento['error'] === UPLOAD_ERR_NO_FILE) {
                $mensaje = "No se ha subido ningún archivo.";
            }

            // Inserción en la base de datos
            try {
                $sql = "INSERT INTO representantes (nombre, apellido, telefono, correo, documento_identidad, foto_documento) 
                        VALUES (:nombre, :apellido, :telefono, :correo, :documento_identidad, :foto_documento)";
                $stmt = $pdo->prepare($sql);
                $stmt->execute([
                    ':nombre' => $nombre,
                    ':apellido' => $apellido,
                    ':telefono' => $telefono,
                    ':correo' => $correo,
                    ':documento_identidad' => $documento_identidad,
                    ':foto_documento' => $ruta_destino
                ]);
                $mensaje = "Representante agregado exitosamente.";
            } catch (PDOException $e) {
                if ($e->getCode() == 23000) { // Código de error para violación de restricción de unicidad
                    $mensaje = "El documento de identidad ya está registrado.";
                } else {
                    $mensaje = "Error al agregar el representante: " . $e->getMessage();
                }
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="./assets/img/logo1.webp">
    <title>Agregar Representante</title>
    <link rel="stylesheet" href="../assets/css/dashboard.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="dashboard">
        <!-- Menú lateral -->
        <nav class="sidebar">
        <a href="../dashboard_coordinador.php" style="text-decoration: none; color: inherit;"> <h2>Liceo Nacional Simón Bolívar</h2></a>
            <ul>
                <li><a href="../Estudiantes/estudiantes.php">Estudiantes</a></li>
                <li><a href="#">Cursos</a></li>
                <li><a href="#">Materia</a></li>
                <li><a href="#">Materia Aplazada</a></li>
                <li><a href="#">Talento</a></li>
                <li><a href="#">Documentos</a></li>
                <li><a href="#">Usuarios</a></li>
                <li><a href="logout.php" class="logout">Cerrar sesión</a></li>
            </ul>
        </nav>
        <!-- contenido -->
        <!DOCTYPE html>
<html lang="es">
<head>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            color: #333;
        }
        form {
            display: flex;
            flex-direction: column;
        }
        label {
            margin-top: 10px;
        }
        input, button {
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
        }
        button {
            background-color: #007BFF;
            color: white;
            border: none;
            cursor: pointer;
            margin-top: 20px;
        }
        button:hover {
            background-color: #0056b3;
        }
        .mensaje {
            text-align: center;
            color: green;
            margin-top: 20px;
        }
        .error {
            text-align: center;
            color: red;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Agregar Representante</h1>
        <?php if (!empty($mensaje)) : ?>
            <p class="<?php echo isset($error) ? 'error' : 'mensaje'; ?>">
                <?php echo $mensaje; ?>
            </p>
        <?php endif; ?>
        <form method="POST" action="" enctype="multipart/form-data">
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" required>

            <label for="apellido">Apellido:</label>
            <input type="text" id="apellido" name="apellido" required>

            <label for="telefono">Teléfono:</label>
            <input type="tel" id="telefono" name="telefono" required>

            <label for="correo">Correo Electrónico:</label>
            <input type="email" id="correo" name="correo">

            <label for="documento_identidad">Documento de Identidad:</label>
            <input type="text" id="documento_identidad" name="documento_identidad" required>

            <label for="foto_documento">Foto del Documento de Identidad (opcional):</label>
            <input type="file" id="foto_documento" name="foto_documento" accept="image/*">

            <button type="submit">Guardar</button>
        </form>
    </div>
</body>
</html>

        
        </div>
        </div>
    </div>
    <script src="dashboard.js"></script>
</body>
</html>
