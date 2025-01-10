<?php
// Conexión a la base de datos
$host = "localhost";
$dbname = "gestion_estudiantil";
$username = "root";
$password = "";

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error en la conexión: " . $e->getMessage());
}

// Manejo del formulario para agregar cursos
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre_curso = $_POST['nombre_curso'];

    // Validar que el curso esté en el rango permitido
    if (!in_array($nombre_curso, ['1', '2', '3', '4', '5'])) {
        $mensaje = "Solo se permiten cursos del 1 al 5.";
    } else {
        // Verificar si el curso ya existe
        $sql_verificar = "SELECT COUNT(*) FROM cursos WHERE nombre_curso = :nombre_curso";
        $stmt_verificar = $pdo->prepare($sql_verificar);
        $stmt_verificar->execute([':nombre_curso' => $nombre_curso]);
        $existe = $stmt_verificar->fetchColumn();

        if ($existe > 0) {
            $mensaje = "El curso ya existe.";
        } else {
            // Insertar el curso
            $sql = "INSERT INTO cursos (nombre_curso) VALUES (:nombre_curso)";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([':nombre_curso' => $nombre_curso]);
            $mensaje = "Curso agregado exitosamente.";
        }
    }
}

// Obtener la lista de cursos
$sql_cursos = "SELECT * FROM cursos ORDER BY id ASC";
$stmt_cursos = $pdo->query($sql_cursos);
$cursos = $stmt_cursos->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="./assets/img/logo1.webp">
    <title>Panel Profesor</title>
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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Cursos</title>
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
        select, button {
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
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
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
        <h1>Gestión de Cursos</h1>
        <?php if (!empty($mensaje)) : ?>
            <p class="mensaje"><?php echo $mensaje; ?></p>
        <?php endif; ?>
        <form method="POST" action="">
            <label for="nombre_curso">Seleccione el curso:</label>
            <select id="nombre_curso" name="nombre_curso" required>
                <option value="">Seleccione</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
            </select>
            <button type="submit">Agregar Curso</button>
        </form>

        <h2>Lista de Cursos</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Curso</th>
                </tr>
            </thead>
            <tbody>
                <?php if (count($cursos) > 0) : ?>
                    <?php foreach ($cursos as $curso) : ?>
                        <tr>
                            <td><?php echo $curso['id']; ?></td>
                            <td><?php echo htmlspecialchars($curso['nombre_curso']); ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php else : ?>
                    <tr>
                        <td colspan="2" style="text-align: center;">No hay cursos registrados.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</body>
</html>

        
        </div>
        </div>
    </div>
    <script src="dashboard.js"></script>
</body>
</html>
