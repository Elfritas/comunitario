<?php
// Conexión a la base de datos
include 'conexion.php';
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
                 <input class="form-control border-0" type="search" placeholder="Buscar" style="width: 150px;">
                        
                    <div class="col-12">
                            <div class="bg-light rounded h-100 p-4">
                                    <h6 class="mb-4">Listado de Representantes</h6>
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th scope="col">C.I.</th>
                                                    <th scope="col">C.I. Estudiante</th>
                                                    <th scope="col">Apellidos</th>
                                                    <th scope="col">Nombres</th>
                                                    <th scope="col">Nº Contacto</th>
                                                    <th scope="col">Correo</th>
                                                    <th scope="col">Editar</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <th scope="row">16.567.349</th>
                                                    <th>33.163.234</th>
                                                    <td>Marquez</td>
                                                    <td>Ricardo</td>
                                                    <td>0412-0347923</td>
                                                    <td>m@gmai.com</td>
                                                    <td> <button type="button" class="btn  open-button"  id="open-button"><img src="assets/img/edit.jpg" style="width: 30px; height: 30px;"></button></td>

                                                    <div class="window-back" id="window-back">
                                                    <div class="window-container" id="window-container">
                                                        <button type="button" class="btn btn-primary rounded-pill m-2 close-button"  id="close-button" >Salir</button>
                                                        
                                                        <label for="floatingInput">Apellidos y Nombres</label>
                                                       <div class="d-flex mb-2">
                                                            <input type="text" class="form-control" id="floatingInput"placeholder="Marquez">
                                                            
                                                            <input type="text" class="form-control" id="floatingInput"placeholder="Daniel" style=" margin-left: 20px">
                                                       </div>
<br>
                                                       <label for="floatingInput">Teléfono de Contacto</label>
                                                       <input type="text" class="form-control" id="floatingInput"placeholder="0412-0347923">
                                                       <br>
                                                       <label for="floatingInput">Correo Electrónico</label>
                                                       <input type="text" class="form-control" id="floatingInput"placeholder="m@gmai.com">
                                                       <br><button type="button" class="btn btn-primary ms-2" style=" height: 35px;">Guardar </button>
                                                       
                                                       </div>  
                                                    </div>
                                                 </tr>
                                            </tbody>
                                        </table>
                                    </div>
                            </div>    
                           
                    </div>
                    <div class="btn-group-cent" role="group">
                                        <button type="button" class="btn ">1</button>
                                        <button type="button" class="btn ">2</button>
                                        <button type="button" class="btn ">3</button>
                                        <button type="button" class="btn">4</button>
                                        <button type="button" class="btn ">5</button>
                                    </div>       
                
                            </div>
                </div>
            </div>
        </div>
    </div>
    
    <script src="js/ventana.js"></script>
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
