<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="./assets/img/logo1.webp">
    <title>Liceo S.B.</title>
    <link rel="stylesheet" href="./assets/css/styles.css">
</head>
<body>
    <div class="login-container">
        <h1>Liceo Nacional Simón Bolívar</h1>
        <form action="login.php" method="POST">
            <label for="username">Usuario:</label>
            <input type="text" id="username" name="username" required>
            
            <label for="password">Contraseña:</label>            
            <input type="password" id="password" name="password" required>
            
            <button type="submit">Ingresar</button>
        </form>
    </div>
</body>
</html>
