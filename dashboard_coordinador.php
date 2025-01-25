
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Inicio</title>
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
            
            <!-- Sale & Revenue Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                            <img src="assets/img/est4.png" style="width: 60px; height: 60px;">
                            <div class="ms-3">
                                <p class="mb-2">Estudiantes Inscritos</p>
                                <h6 class="mb-0">0</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                        <img src="assets/img/est1.png" style="width: 60px; height: 60px;">
                            <div class="ms-3">
                                <p class="mb-2">Nuevo Ingreso</p>
                                <h6 class="mb-0">0</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                        <img src="assets/img/est3.png" style="width: 50px; height: 50px;">
                            <div class="ms-3">
                                <p class="mb-2">Pendientes por Documentación</p>
                                <h6 class="mb-0">0</h6>
                            <a href="est_documentacion.php">Ver</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                        <img src="assets/img/est2.png" style="width: 60px; height: 60px;">
                            <div class="ms-3">
                                <p class="mb-2">Estudiantes por Sección</p>
                                <a href="seccion.php">Ver</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Sale & Revenue End -->


            <!-- Sales Chart Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-12 col-xl-6">
                        <div class="bg-light text-center rounded p-4">
                            <div class="d-flex align-items-center justify-content-between mb-4">
                                <h6 class="mb-0">Nuevos Ingresos</h6>
                            </div>
                            <canvas id="worldwide-sales"></canvas>
                        </div>
                    </div>

                    
                    <div class="col-sm-12 col-md-6 col-xl-4">
                        <div class="h-100 bg-light rounded p-4">
                            <div class="d-flex align-items-center justify-content-between mb-4">
                                <h6 class="mb-0">Calender</h6>
                            </div>
                            <div id="calender"></div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Sales Chart End -->

            <!-- Footer Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-light rounded-top p-4">
                    <div class="row">
                        <div class="col-12 col-sm-6 text-center text-sm-start">
                            &copy; <a href="#">Liceo Nacional Simón Bolívar</a>
                        </div>
                        <div class="col-12 col-sm-6 text-center text-sm-end">
                           
                            Diseñado y Desarrollado por el equipo E05-SIST-02-2024 del Servicio comunitario de la Unefa
                        </br>
                       
                        </div>
                    </div>
                </div>
            </div>
            <!-- Footer End -->
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
