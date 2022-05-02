<?php

include("datos.php");
$con = new ConexionDb();
if (isset($_POST["password"]) && isset($_POST["user"])) {
    $info = $con->showDatos("SELECT * FROM loging ");

    foreach ($info as $key => $valor) {
        $usuario = $_POST["password"];
        $contra = $_POST["user"];
        if ($usuario == $info[$key]["passwr"] && $contra == $info[$key]["userr"]) {
            header("Location: inicio.php");
            session_start();
            $_SESSION["pass"] = $info[$key]["passwr"];
            $_SESSION["user"] = $info[$key]["userr"];
            $_SESSION["id"] = $info[$key]["id"];
            break;
        }
    }
    echo "<b>Contraseña o usuario incorrecto!</b>";
}
?>

<style>
    b {
        color: red;
    }
</style>






<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/MenuNa.css">
    <link rel="stylesheet" href="../css/bootstrap-grid.min.css" />
    <link rel="stylesheet" href="../css/bootstrap-reboot.min.css" />
    <link rel="stylesheet" href="../css/bootstrap.min.css" />
    <link rel="stylesheet" href="../css/loginUser.css">
    <script src="../js/jquery-3.6.0.min.js"></script>
    <script src="../js/bootstrap.bundle.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/3762365bc6.js" crossorigin="anonymous"></script>
    <title>Login</title>
</head>

<body>

    <div class="imgLogin">
        <img src="../img/login.png" alt="" class="img_Lo">
    </div>
    <form class="form_login" method="post" name="formLogin">
        <div class="label_Eror ">
            <label class="form-label label_Er">*Complete los campos antes de enviar</label>
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Usuario</label>
            <input type="text" class="form-control" id="user" name="user" id="exampleInputPassword1">
        </div>

        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Contraseña</label>
            <input type="password" name="password" id="pass" class="form-control" id="exampleInputPassword1">
        </div>

        <button type="button" onclick="ValidarForm()" class="btn btn-primary">Loguiarme</button>
        <a href="crearLogin.php" class="btn btn-success">Crear cuenta</a>
    </form>

</body>

</html>

<script>
    if (window.history.replaceState) { // verificamos disponibilidad
        window.history.replaceState(null, null, window.location.href);
    }

    function ValidarForm() {
        const user = document.getElementById("user").value;
        const contra = document.getElementById("pass").value;
        if ((user.length == 0) || (contra.length == 0)) {
            const showError = document.querySelector(".label_Eror")
            showError.style.display = "block";
        } else {
            document.formLogin.submit();
        }
    }
</script>