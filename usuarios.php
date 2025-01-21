
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Lista de Usuarios</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

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
    <div class="container-xxl position-relative bg-white d-flex p-0">
       <?php 
        include 'menu/nav.php';
       ?>
        <div class="content">
             <?php  include 'menu/side.php';?>
             <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-12 col-xl-6">
                            <div class="bg-light rounded h-100 p-4">
                                <h5 class="mb-4">Agregar Nuevo Usuario</h5>
                                <?php if (isset($mensaje)): ?>
                                <p><?php echo htmlspecialchars($mensaje); ?></p>
                                 <?php endif; ?>

                                <form  method="POST" action="materias.php">
                                    <div class="mb-3">
                                        <label for="" class="form-label">Nombre del Usuario:</label>
                                        <input type="text" id="" name="" required> <br>
                                        <label for="">Tipo:</label>
                                        <select class="form-select mb-3" aria-label="Default select example" id="" name="" required>
                                           
                                        </select>
                                        <label for="" class="form-label">Contraseña</label>
                                        <input type="text" id="" name="" required>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Agregar</button>
                                </form>
                            </div>
                        </div>

                    
                <div class="col-sm-12 col-xl-6">
                        <div class="bg-light rounded h-100 p-4">
                    
                            <h2 class="mb-4">Lista de Usuarios</h2>
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">Nombre</th>
                                        <th scope="col">Tipo</th>
                                        <th scope="col">Eliminar</th>
                                    </tr>
                                </thead>
                                <tbody>
                            <tr>
                                <td></td>
                                <td></td>
                                <td> <button type="button" class="btn"> <img src="assets/img/delete.jpg"style="width: 30px; height: 30px;"></button></td>
                            </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
            </div>
            </div>
        </div>
        </div>
        <!-- Content End -->


       
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