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
    $nombre_talento = $_POST['nombre_talento'];

    // Validación básica
    if (empty($nombre_talento)) {
        $mensaje = "El campo Talento no puede estar vacío.";
    } else {
        // Verificar si ya existe el talento en la base de datos
        $sql_verificar = "SELECT COUNT(*) FROM talentos WHERE nombre_talento = :nombre_talento";
        $stmt_verificar = $pdo->prepare($sql_verificar);
        $stmt_verificar->execute([':nombre_talento' => $nombre_talento]);
        $existe = $stmt_verificar->fetchColumn();

        if ($existe > 0) {
            $mensaje = "El talento ya existe.";
        } else {
            // Insertar el talento
            $sql = "INSERT INTO talentos (nombre_talento) VALUES (:nombre_talento)";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([':nombre_talento' => $nombre_talento]);
            $mensaje = "Talento agregado exitosamente.";
        }
    }
}

// Obtener la lista de talentos
$sql_listar = "SELECT * FROM talentos ORDER BY id DESC";
$stmt_listar = $pdo->query($sql_listar);
$talentos = $stmt_listar->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../assets/img/logo1.webp">
    <title>Talentos</title>
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
    <title>Agregar y Listar Talentos</title>
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
        h1, h2 {
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
        .talentos-lista {
            margin-top: 30px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }
        th, td {
            padding: 10px;
            text-align: left;
            border: 1px solid #ddd;
        }
        th {
            background-color: #007BFF;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Agregar Talento</h1>
        <?php if (!empty($mensaje)) : ?>
            <p class="<?php echo isset($error) ? 'error' : 'mensaje'; ?>">
                <?php echo $mensaje; ?>
            </p>
        <?php endif; ?>
        <form method="POST" action="">
            <label for="nombre_talento">Nombre del Talento:</label>
            <input type="text" id="nombre_talento" name="nombre_talento" required>
            <button type="submit">Guardar</button>
        </form>

        <div class="talentos-lista">
            <h2>Lista de Talentos</h2>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (count($talentos) > 0) : ?>
                        <?php foreach ($talentos as $talento) : ?>
                            <tr>
                                <td><?php echo $talento['id']; ?></td>
                                <td><?php echo htmlspecialchars($talento['nombre_talento']); ?></td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else : ?>
                        <tr>
                            <td colspan="2" style="text-align: center;">No hay talentos registrados.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
        
        </div>
        </div>
    </div>
    <script src="dashboard.js"></script>
</body>
</html>




