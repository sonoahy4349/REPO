<?php
// Conexión a la base de datos
include 'conexion.php';

// Verificar si se enviaron datos por POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['pass'];

    // Consultar la base de datos para obtener el usuario
    $query = "SELECT * FROM usuarios WHERE correo = ?";
    $stmt = $conexion->prepare($query);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        // Si existe el usuario, verificar la contraseña
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['contrasena'])) {
            // Si la contraseña es correcta, iniciar sesión
            session_start();
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['nombre_completo'];
            $_SESSION['role'] = $user['rol_id'];
            header("Location: ../models/dashboard.php"); // Redirigir a un dashboard o página protegida
        } else {
            echo "Contraseña incorrecta.";
        }
    } else {
        echo "Usuario no encontrado.";
    }
} else {
    echo "Método de solicitud no válido.";
}

?>
