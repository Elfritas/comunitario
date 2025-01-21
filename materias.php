<?php
// Conexión a la base de datos
include 'conexion.php';

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
    <link rel="icon" href="../assets/img/logo1.webp">
    <title>Listado de Representantes</title>
    <!-- Favicon -->
    <link href="assets/img/logo1.webp" rel="icon">
   <!-- Libraries Stylesheet -->
   <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
   <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

   <!-- Customized Bootstrap Stylesheet -->
   <link href="css/bootstrap.min.css" rel="stylesheet">

   <!-- Template Stylesheet -->
   <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <div class="container-xxl position-relative bg-white d-flex p-0 dashboard">
    <?php include 'menu/nav.php'; ?>
        <div class="content">
        <?php  include 'menu/side.php';?>
        <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-12 col-xl-6">
                            <div class="bg-light rounded h-100 p-4">
                                <h5 class="mb-4">Agregar Materia</h5>
                                <?php if (isset($mensaje)): ?>
                                <p><?php echo htmlspecialchars($mensaje); ?></p>
                                 <?php endif; ?>

                                <form  method="POST" action="materias.php">
                                    <div class="mb-3">
                                        <label for="nombre_materia" class="form-label">Nombre de la Materia:</label>
                                        <input type="text" id="nombre_materia" name="nombre_materia" required>
                                        <label for="id_curso">Curso:</label>
                                        <select class="form-select mb-3" aria-label="Default select example" id="id_curso" name="id_curso" required>
                                            <?php foreach ($cursos as $curso): ?>
                                                <option value="<?php echo htmlspecialchars($curso['id']); ?>"><?php echo htmlspecialchars($curso['nombre_curso']); ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Agregar</button>
                                </form>
                            </div>
                        </div>

                    
                <div class="col-sm-12 col-xl-6">
                        <div class="bg-light rounded h-100 p-4">
                        <div class="btn-group" role="group">
                                <input type="radio" class="btn-check" name="btnradio" id="btnradio1" autocomplete="off"
                                    checked>
                                <label class="btn btn-outline-primary" for="btnradio1" >Todo</label>

                                <input type="radio" class="btn-check" name="btnradio" id="btnradio2" autocomplete="off">
                                <label class="btn btn-outline-primary" for="btnradio2" onclick="window.location.href='materias.php?id_curso=1'">1</label>

                                <input type="radio" class="btn-check" name="btnradio" id="btnradio2" autocomplete="off">
                                <label class="btn btn-outline-primary" for="btnradio2" onclick="window.location.href='materias.php?id_curso=2'">2</label>

                                <input type="radio" class="btn-check" name="btnradio" id="btnradio3" autocomplete="off">
                                <label class="btn btn-outline-primary" for="btnradio3" onclick="window.location.href='materias.php?id_curso=3'">3</label>

                                <input type="radio" class="btn-check" name="btnradio" id="btnradio3" autocomplete="off">
                                <label class="btn btn-outline-primary" for="btnradio3" onclick="window.location.href='materias.php?id_curso=4'">4</label>

                                <input type="radio" class="btn-check" name="btnradio" id="btnradio3" autocomplete="off">
                                <label class="btn btn-outline-primary" for="btnradio3" onclick="window.location.href='materias.php?id_curso=5'">5</label>
                            </div> <br><br>
                            <h2 class="mb-4">Lista de Materias por Año</h2>
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">Curso</th>
                                        <th scope="col">Materia</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($materias as $materia): ?>
                            <tr>
                             <td><?php echo htmlspecialchars($materia['nombre_curso']); ?></td>
                                <td><?php echo htmlspecialchars($materia['nombre_materia']); ?></td>
                                
                            </tr>
                        <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
            </div>
            </div>
        </div>
        </div>
    </div>
      <!-- JavaScript Libraries -->
      <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
     <script src="lib/chart/chart.min.js"></script>
     <script src="lib/easing/easing.min.js"></script>
     <script src="lib/waypoints/waypoints.min.js"></script>
     <script src="lib/owlcarousel/owl.carousel.min.js"></script>
     <script src="lib/tempusdominus/js/moment.min.js"></script>
     <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
     <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>
 
     <!-- Template Javascript -->
     <script src="js/main.js"></script>
</body>
</html>