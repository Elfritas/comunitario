<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- Sidebar Start -->
    <div class="sidebar pe-4 pb-3">
            <nav class="navbar bg-light navbar-light">
                
                <div class="d-flex align-items-center ms-4 mb-4">
                    <div class="position-relative"><br>
                    <img class="rounded-circle" src="assets/img/logo.webp" alt="" style="width: 40px; height: 40px;">
                        <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
                    </div>
                    <div class="ms-3"><br>
                        <h6 class="mb-0">Administrador</h6>
                    </div>
                </div>
                <div class="navbar-nav w-100">
                    <a href="dashboard_coordinador.php" class="nav-item nav-link active"> <img src="assets/img/dash.png" style="width: 28px; height: 28px;">
                        Inicio</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link" data-bs-toggle="dropdown"><img src="assets/img/pc.jpg" style="width: 25px; height: 25px; border-radius: 70%"> Perfil Estudiantil</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="formulario/formulario.php" class="dropdown-item">Nuevo ingreso</a>
                            <a href="activ.php" class="dropdown-item">Estudiantes Inscritos</a>
                            <a href="retirados.php" class="dropdown-item">Retirados</a>
                            <a href="representantes.php" class="dropdown-item">Representantes</a>
                            <a href="est_documentacion.php" class="dropdown-item">Revisión de Expedientes</a>
                        </div>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link " data-bs-toggle="dropdown"><img src="assets/img/archivo.jpg" style="width: 25px; height: 25px; border-radius: 50%"> Configurar</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="agregar_talento.php" class="dropdown-item">Habilidades</a>
                            <a href="usuarios.php" class="dropdown-item">Usuarios</a>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
        <!-- Sidebar End -->
</body>
</html>
