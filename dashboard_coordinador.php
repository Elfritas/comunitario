<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['user_tipo'] !== 'coordinador') {
    header('Location: index.html');
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="./assets/img/logo1.webp">
    <title>Panel Profesor</title>
    <link rel="stylesheet" href="./assets/css/dashboard.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="dashboard">
        <!-- Menú lateral -->
        <nav class="sidebar">
            <h2>Liceo Nacional Simón Bolívar</h2>
            <ul>
                <li><a href="./Estudiantes/estudiantes.html">Estudiantes</a></li>
                <li><a href="./Curso/cursos.php">Cursos</a></li>
                <li><a href="./Materias/materias.php">Materia</a></li>
                <li><a href="#">Materia Aplazada</a></li>
                <li><a href="./Talento/agregar_talento.php">Talento</a></li>
                <li><a href="#">Documentos</a></li>
                <li><a href="./Representantes/agregar_representante.php">Representantes</a></li>
                <li><a href="#">Usuarios</a></li>
                <li><a href="logout.php" class="logout">Cerrar sesión</a></li>
            </ul>
        </nav>

        <!-- Contenido principal -->
        <div class="main-content">
        <h1 style="display: inline-block; vertical-align: middle;">Bienvenido <?php echo htmlspecialchars($_SESSION['user_nombre']); ?></h1>
        <div class="user-profile" style="display: inline-block; vertical-align: middle; margin-left: 700px;">
            <img src="./assets/img/coordinador.webp" alt="Foto de Usuario" class="user-photo" style="width: 65px; height: 65px; border-radius: 50%;">
        </div>
        <!-- Cards arriba -->
        <div class="card-deck" style="display: flex; justify-content: space-between; padding: 5%;">
            <div class="card" style="width: 22rem;">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <h6 class="card-subtitle mb-2 text-body-secondary">Card subtitle</h6>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="card-link">Card link</a>
                    <a href="#" class="card-link">Another link</a>
                </div>
            </div>
            <div class="card" style="width: 22rem;">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <h6 class="card-subtitle mb-2 text-body-secondary">Card subtitle</h6>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="card-link">Card link</a>
                    <a href="#" class="card-link">Another link</a>
                </div>
            </div>
            <div class="card" style="width: 22rem;">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <h6 class="card-subtitle mb-2 text-body-secondary">Card subtitle</h6>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="card-link">Card link</a>
                    <a href="#" class="card-link">Another link</a>
                </div>
            </div>
            </div>
            <!-- Grafica abajo -->
            <div class="card" style="width: 62rem; margin: 20px auto;">
                <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <h6 class="card-subtitle mb-2 text-body-secondary">Card subtitle</h6>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <a href="#" class="card-link">Card link</a>
                <a href="#" class="card-link">Another link</a>
                </div>
            </div>
        </div>
        </div>
    </div>
    <script src="dashboard.js"></script>
</body>
</html>