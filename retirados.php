
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Estudiantes Retirados</title>
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
                  
                    <div class="col-12">
                            <div class="bg-light rounded h-100 p-4">
                                    <h6 class="mb-4">Listado de Estudiantes Retirados</h6>
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Fecha de Retiro</th>
                                                    <th scope="col">Cédula</th>
                                                    <th scope="col">Apellidos</th>
                                                    <th scope="col">Nombres</th>
                                                    <th scope="col">Año</th>
                                                    <th scope="col">Sección</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    
                                                <td>Member</td>
                                                    <td>Mark</td>
                                                    <td>Otto</td>
                                                    <td>mark@email.com</td>
                                                    <td>UK</td>
                                                    <td>456</td>
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
            
            <!-- Sale & Revenue End -->


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