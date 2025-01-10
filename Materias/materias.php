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

// Manejo del formulario para agregar materias
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['nombre_materia'])) {
    $nombre_materia = trim($_POST['nombre_materia']);
    $id_curso = $_POST['id_curso'];

    if (empty($nombre_materia)) {
        $mensaje = "El nombre de la materia no puede estar vacío.";
    } else {
        // Verificar si la materia ya existe para el curso seleccionado
        $sql_verificar = "SELECT COUNT(*) FROM materias WHERE nombre_materia = :nombre_materia AND curso_id = :id_curso";
        $stmt_verificar = $pdo->prepare($sql_verificar);
        $stmt_verificar->execute([
            ':nombre_materia' => $nombre_materia,
            ':id_curso' => $id_curso
        ]);
        $existe = $stmt_verificar->fetchColumn();

        if ($existe > 0) {
            $mensaje = "La materia ya existe para el curso seleccionado.";
        } else {
            // Verificar si el curso existe
            $sql_curso = "SELECT COUNT(*) FROM cursos WHERE id = :id_curso";
            $stmt_curso = $pdo->prepare($sql_curso);
            $stmt_curso->execute([':id_curso' => $id_curso]);
            $curso_existe = $stmt_curso->fetchColumn();

            if ($curso_existe > 0) {
                // Insertar la materia
                $sql = "INSERT INTO materias (nombre_materia, curso_id) VALUES (:nombre_materia, :id_curso)";
                $stmt = $pdo->prepare($sql);
                $stmt->execute([
                    ':nombre_materia' => $nombre_materia,
                    ':id_curso' => $id_curso
                ]);
                $mensaje = "Materia agregada exitosamente.";
            } else {
                $mensaje = "El curso seleccionado no existe.";
            }
        }
    }
}

// Obtener la lista de cursos
$sql_cursos = "SELECT * FROM cursos";
$stmt_cursos = $pdo->query($sql_cursos);
$cursos = $stmt_cursos->fetchAll(PDO::FETCH_ASSOC);

// Filtrar materias por curso si se ha seleccionado un curso
$id_curso_filtrado = isset($_GET['id_curso']) ? $_GET['id_curso'] : null;
if ($id_curso_filtrado) {
    $sql_materias = "SELECT m.id, m.nombre_materia, c.nombre_curso 
                     FROM materias m 
                     JOIN cursos c ON m.curso_id = c.id 
                     WHERE m.curso_id = :id_curso 
                     ORDER BY c.id, m.nombre_materia";
    $stmt_materias = $pdo->prepare($sql_materias);
    $stmt_materias->execute([':id_curso' => $id_curso_filtrado]);
} else {
    $sql_materias = "SELECT m.id, m.nombre_materia, c.nombre_curso 
                     FROM materias m 
                     JOIN cursos c ON m.curso_id = c.id 
                     ORDER BY c.id, m.nombre_materia";
    $stmt_materias = $pdo->query($sql_materias);
}
$materias = $stmt_materias->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Materias</title>
    <link rel="stylesheet" href="../assets/css/dashboard.css">
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .dashboard {
            display: flex;
        }
        .sidebar {
            width: 250px;
            color: #fff;
            padding: 15px;
        }
        .sidebar h2 {
            text-align: center;
        }
        .sidebar ul {
            list-style-type: none;
            padding: 0;
        }
        .sidebar ul li {
            margin: 15px 0;
        }
        .sidebar ul li a {
            color: #fff;
            text-decoration: none;
        }
        .main-content {
            flex-grow: 1;
            padding: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <div class="dashboard">
        <!-- Menú lateral -->
        <nav class="sidebar">
        <a href="../dashboard_coordinador.php" style="text-decoration: none; color: inherit;"> <h2>Liceo Nacional Simón Bolívar</h2></a>
            <ul>
                <li><a href="../Estudiantes/estudiantes.html">Estudiantes</a></li>
                <li><a href="../Curso/cursos.php">Cursos</a></li>
                <li><a href="materias.php">Materia</a></li>
                <li><a href="#">Materia Aplazada</a></li>
                <li><a href="../Talento/agregar_talento.php">Talento</a></li>
                <li><a href="#">Documentos</a></li>
                <li><a href="../Representantes/agregar_representante.php">Representantes</a></li>
                <li><a href="#">Usuarios</a></li>
                <li><a href="../logout.php" class="logout">Cerrar sesión</a></li>
            </ul>
        </nav>

        <!-- Contenido principal -->
        <div class="main-content">
            <h1>Gestión de Materias</h1>
            <?php if (isset($mensaje)): ?>
                <p><?php echo htmlspecialchars($mensaje); ?></p>
            <?php endif; ?>
            <form method="POST" action="materias.php">
                <label for="nombre_materia">Nombre de la Materia:</label>
                <input type="text" id="nombre_materia" name="nombre_materia" required>
                <label for="id_curso">Curso:</label>
                <select id="id_curso" name="id_curso" required>
                    <?php foreach ($cursos as $curso): ?>
                        <option value="<?php echo htmlspecialchars($curso['id']); ?>"><?php echo htmlspecialchars($curso['nombre_curso']); ?></option>
                    <?php endforeach; ?>
                </select>
                <button type="submit">Agregar Materia</button>
            </form>
            <h2>Lista de Materias</h2>
            <button type="button" class="btn btn-warning" onclick="window.location.href='materias.php?id_curso=1'">Primero</button>
            <button type="button" class="btn btn-warning" onclick="window.location.href='materias.php?id_curso=2'">Segundo</button>
            <button type="button" class="btn btn-warning" onclick="window.location.href='materias.php?id_curso=3'">Tercero</button>
            <button type="button" class="btn btn-warning" onclick="window.location.href='materias.php?id_curso=4'">Cuarto</button>
            <button type="button" class="btn btn-warning" onclick="window.location.href='materias.php?id_curso=5'">Quinto</button> <br>

            <div style="display: flex; justify-content: center;">
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre de la Materia</th>
                            <th>Curso</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($materias as $materia): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($materia['id']); ?></td>
                                <td><?php echo htmlspecialchars($materia['nombre_materia']); ?></td>
                                <td><?php echo htmlspecialchars($materia['nombre_curso']); ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>