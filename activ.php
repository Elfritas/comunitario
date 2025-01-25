<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Estudiantes Activos</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

   <!-- Favicon -->
   <link href="assets/img/logo1.webp" rel="icon">
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

                    <form class="d-none d-md-flex ms-4">
                        <input class="form-control border-0" type="search" placeholder="Buscar" style="width: 150px;">
                        <div class="col-sm-12 col-xl-6">
                            <div class="btn-group" role="group">
                                    <button type="button" class="btn btn-outline-primary">1ero</button>
                                    <button type="button" class="btn btn-outline-primary">2do</button>
                                    <button type="button" class="btn btn-outline-primary">3ero</button>
                                    <button type="button" class="btn btn-outline-primary">4to</button>
                                    <button type="button" class="btn btn-outline-primary">5to</button>
                                    <p> ____ </p>
                                    <button type="button" class="btn btn-outline-primary">A</button>
                                    <button type="button" class="btn btn-outline-primary">B</button>
                                    <button type="button" class="btn btn-outline-primary">C</button>
                                    <button type="button" class="btn btn-outline-primary">D</button>
                                    <button type="button" class="btn btn-outline-primary">E</button>
                                    <button type="button" class="btn btn-outline-primary">F</button>
                                    <p> ____ </p>
                                    <button type="button" class="btn btn-outline-primary">General</button>        
                            </div>        
                        </div>  
                    </form><br>
                    
                
                    <div class="col-12">
                            <div class="bg-light rounded h-100 p-4">
                                    <h6 class="mb-4">Listado de Estudiantes</h6>
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Cédula</th>
                                                    <th scope="col">Apellidos</th>
                                                    <th scope="col">Nombres</th>
                                                    <th scope="col">Edad</th>
                                                    <th scope="col">Status</th>
                                                    <th scope="col">Año</th>
                                                    <th scope="col">Sección</th>
                                                    <th scope="col">Datos Adicionales</th>
                                                    <th scope="col">Editar</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <th scope="row">33.163.234</th>
                                                    <td>Marquez</td>
                                                    <td>Daniel</td>
                                                    <td>15</td>
                                                    <td>Est. Regular</td>
                                                    <td>5</td>
                                                    <td>A</td>
                                                    <th scope="col"><button type="button" class="btn btn-primary rounded-pill m-2 "  >Ver</button>
                                                    
                                                    <td>

                                                    <button type="button" class="btn  open-button"  id="open-button"><img src="assets/img/edit.jpg" style="width: 30px; height: 30px;"></button></td>

                                                    <div class="window-back" id="window-back">
                                                    <div class="window-container" id="window-container">
                                                        <button type="button" class="btn btn-primary rounded-pill m-2 close-button"  id="close-button" >Salir</button>
                                                        
                                                        <label for="floatingInput">Apellidos y Nombres</label>
                                                       <div class="d-flex mb-2">
                                                            <input type="text" class="form-control" id="floatingInput"placeholder="Marquez">
                                                            
                                                            <input type="text" class="form-control" id="floatingInput"placeholder="Daniel" style=" margin-left: 20px">
                                                       </div>

                                                       
                                                       <label for="floatingInput">Status, Año y Sección</label>
                                                       <div class="d-flex mb-2">
                                                            <input type="text" class="form-control" id="floatingInput"placeholder="Regular" style="width: 80px;">
                                                            
                                                            <input type="text" class="form-control" id="floatingInput"placeholder="5" style="width: 80px; margin-left: 20px">

                                                            <input type="text" class="form-control" id="floatingInput"placeholder="A" style="width: 80px; margin-left: 20px">
                                                       </div>
                                                       <button type="button" class="btn btn-primary ms-2" style=" height: 35px;">Guardar </button>
                                                       
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
