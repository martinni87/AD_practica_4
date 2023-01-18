<!DOCTYPE html>
<html lang="es">
<head>
<meta charset='UTF-8'>
    <meta name='author' content='Martín Antonio Córdoba Getar'>
    <meta name='description' content='Práctica 4.1 de AD - DI 2ºDAM EFA El Campico'>
    <meta name='keywords' content='MVC, DAM, PHP, PDO, JavaScript, Jquery, Ajax, MySQL, JSON, Acceso a Datos, Desarrollo de Interfaces'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Práctica 4.1 AD - DI 2º DAM</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="vendor/jquery-3.6.1.min.js"></script>
    <script src="controller/medicos.js"></script>
    <link rel="stylesheet" href="./css/login_styles.css">
    
</head>
<body>
    <header class="header" id="header">
        <nav class="navbar" id="navbar">
            <form action="config/login.php" method="post">
                <fieldset>
                    <div class="login_item"><legend>Login</legend></div>
                    <!-- Pista a efectos de la práctica: usuario = admin, contraseña = 1234 -->
                    <div class="login_item"><label for="user">Usuario</label><input type="text" name="user" class="std_input" id="user" placeholder="user" title="Introduzca un usuario" required></div>
                    <div class="login_item"><label for="password">Contraseña</label><input type="password" name="password" class="std_input" id="password" placeholder="******" title="Introduzca una contraseña" required></div>
                    <div class="login_item">
                        <input type="submit" name="submit" class="btn btn-primary" id="submit" value="Acceder">
                        <input type="reset" name="reset" class="btn btn-danger" id="reset" value="Limpiar" onclick="location.href='./index.php?msg'">
                    </div>
                </fieldset>
                <div name="msg" id="msg"><?php $msg = $_GET["msg"]; echo $msg; ?></div>
            </form>
        </nav>
    </header>

    <main class="main" id="main">
        <article class="article" id="article1" name="article1">

        </article>
    </main>

    <footer class="footer" id="footer">

    </footer>
</body>
</html>