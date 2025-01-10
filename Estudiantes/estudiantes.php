<?php
require '../conexion.php';

// Listar estudiantes
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $stmt = $pdo->query("SELECT * FROM estudiantes");
    $estudiantes = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($estudiantes);
    exit;
}

// Agregar estudiante
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents("php://input"), true);

    $sql = "INSERT INTO estudiantes (nombre, apellido, ano, curso, tiene_materias_aplazadas, talento, representante_documento) 
            VALUES (:nombre, :apellido, :ano, :curso, :tiene_materias_aplazadas, :talento, :representante_documento)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':nombre' => $data['nombre'],
        ':apellido' => $data['apellido'],
        ':ano' => $data['ano'],
        ':curso' => $data['curso'],
        ':tiene_materias_aplazadas' => $data['tiene_materias_aplazadas'],
        ':talento' => $data['talento'],
        ':representante_documento' => $data['representante_documento']
    ]);

    echo json_encode(['success' => true]);
    exit;
}

// Editar estudiante
if ($_SERVER['REQUEST_METHOD'] === 'PUT') {
    $data = json_decode(file_get_contents("php://input"), true);

    $sql = "UPDATE estudiantes SET 
                nombre = :nombre, 
                apellido = :apellido, 
                ano = :ano, 
                curso = :curso, 
                tiene_materias_aplazadas = :tiene_materias_aplazadas, 
                talento = :talento, 
                representante_documento = :representante_documento 
            WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':nombre' => $data['nombre'],
        ':apellido' => $data['apellido'],
        ':ano' => $data['ano'],
        ':curso' => $data['curso'],
        ':tiene_materias_aplazadas' => $data['tiene_materias_aplazadas'],
        ':talento' => $data['talento'],
        ':representante_documento' => $data['representante_documento'],
        ':id' => $data['id']
    ]);

    echo json_encode(['success' => true]);
    exit;
}

// Eliminar estudiante
if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
    $id = $_GET['id'];

    $sql = "DELETE FROM estudiantes WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':id' => $id]);

    echo json_encode(['success' => true]);
    exit;
}
?>
