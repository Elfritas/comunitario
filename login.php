<?php
session_start();
require 'conexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Consulta para verificar usuario y contraseña
    $sql = "SELECT * FROM usuarios WHERE username = :username AND password = :password";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':username' => $username,
        ':password' => $password
    ]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        // Guardar datos en la sesión
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_tipo'] = $user['tipo'];
        $_SESSION['user_nombre'] = $user['nombre'];

        // Redirigir al dashboard correspondiente
        if ($user['tipo'] === 'coordinador') {
            header('Location: dashboard_coordinador.php');
        } elseif ($user['tipo'] === 'profesor') {
            header('Location: dashboard_profesor.php');
        }
        exit;
    } else {
        echo "<script>alert('Usuario o contraseña incorrectos');</script>";
    }
}
?>

