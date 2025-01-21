<?php
// Conexión a la base de datos
include 'conexion.php';


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
    <title>Listado de Habilidades</title>
    
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
                                <h6 class="mb-4">Agregar Habilidad</h6>
                                <?php if (!empty($mensaje)) : ?>
                                <p class="<?php echo isset($error) ? 'error' : 'mensaje'; ?>">
                                    <?php echo $mensaje; ?>
                                </p>
                                 <?php endif; ?>
                                <form  method="POST" action="">
                                    <div class="mb-3">
                                        <label for="nombre_talento" class="form-label">Nombre</label>
                                        <input type="text" id="nombre_talento" name="nombre_talento" required>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Guardar</button>
                                </form>
                            </div>
                        </div>
                    
                <div class="col-sm-12 col-xl-6">
                        <div class="bg-light rounded h-100 p-4">
                            <h6 class="mb-4">Lista de Habilidades</h6>
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Habilidad</th>
                                         <th scope="col">Eliminar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php if (count($talentos) > 0) : ?>
                                        <?php foreach ($talentos as $talento) : ?>
                                            <tr>
                                                <td><?php echo $talento['id']; ?></td>
                                                <td><?php echo htmlspecialchars($talento['nombre_talento']); ?></td>
                                                <td> <button type="button" class="btn"> <img src="assets/img/delete.jpg"style="width: 30px; height: 30px;"></button></td>
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
