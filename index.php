<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="./style/login.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:ital,opsz,wght@0,6..12,200..1000;1,6..12,200..1000&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h2>Ingrese a su cuenta</h2>
        <p>Ingrese sus correo y contraseña para acceder a su cuenta</p>

        <?php
        // Mostrar mensajes de error si existen
        if (isset($_GET['error'])) {
            $error = htmlspecialchars($_GET['error']);
            echo '<p style="color: red;">' . $error . '</p>';
        }
        ?>

        <form action="login.php" method="POST" class="form">
            <label for="username" class="label">Usuario:</label><br>
            <input type="text" id="username" name="username" class="input-box" placeholder="" required><br>

            <label for="password" class="label">Contraseña:</label><br>
            <input type="password" id="password" name="password" class="input-box" required><br>

            <input type="checkbox" id="checkbox" class="toggle">
            <label for="checkbox" class="toggle">Mantener sesion iniciada</label>

            <button class="btn" type="submit">Iniciar Sesión</button>
        </form>
    </div>    
</body>
</html>