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

// Obtener la lista de cursos
$sql_cursos = "SELECT * FROM cursos ORDER BY id ASC";
$stmt_cursos = $pdo->query($sql_cursos);
$cursos = $stmt_cursos->fetchAll(PDO::FETCH_ASSOC);

// Obtener las materias según el curso seleccionado
$materias = [];
$curso_seleccionado = null;

if (isset($_GET['curso_id'])) {
    $curso_id = $_GET['curso_id'];
    $curso_seleccionado = $pdo->query("SELECT nombre_curso FROM cursos WHERE id = $curso_id")->fetchColumn();

    $sql_materias = "SELECT * FROM materias WHERE id_curso = :id_curso";
    $stmt_materias = $pdo->prepare($sql_materias);
    $stmt_materias->execute([':id_curso' => $curso_id]);
    $materias = $stmt_materias->fetchAll(PDO::FETCH_ASSOC);
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Materias por Curso</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 800px;
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
        .curso-buttons {
            display: flex;
            justify-content: center;
            gap: 10px;
            margin-bottom: 20px;
        }
        .curso-buttons a {
            text-decoration: none;
            padding: 10px 15px;
            background-color: #007BFF;
            color: white;
            border-radius: 4px;
            font-size: 16px;
        }
        .curso-buttons a:hover {
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
        .no-data {
            text-align: center;
            margin-top: 20px;
            color: #888;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Materias por Curso</h1>

        <!-- Botones para seleccionar curso -->
        <div class="curso-buttons">
            <?php foreach ($cursos as $curso): ?>
                <a href="?curso_id=<?php echo $curso['id']; ?>">
                    Curso <?php echo htmlspecialchars($curso['nombre_curso']); ?>
                </a>
            <?php endforeach; ?>
        </div>

        <?php if ($curso_seleccionado): ?>
            <h2>Materias del Curso <?php echo htmlspecialchars($curso_seleccionado); ?></h2>
            <?php if (count($materias) > 0): ?>
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Materia</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($materias as $materia): ?>
                            <tr>
                                <td><?php echo $materia['id']; ?></td>
                                <td><?php echo htmlspecialchars($materia['nombre_materia']); ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php else: ?>
                <p class="no-data">No hay materias registradas para este curso.</p>
            <?php endif; ?>
        <?php else: ?>
            <h2>Seleccione un curso para ver sus materias</h2>
        <?php endif; ?>
    </div>
</body>
</html>
