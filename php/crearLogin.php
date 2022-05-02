<?php
include("datos.php");
$con = new ConexionDb();
if (isset($_POST["password"]) && isset($_POST["user"])) {
    $pass = $_POST["password"];
    $use = $_POST["user"];

    $info = $con->showDatos("SELECT * FROM loging   where userr='$use'");
    $userRe = count($info);
    if ($userRe == 0) {
        $datos = $con->ejecutar("INSERT into loging VALUES ('$use','$pass',null)");
        header("Location: login.php");
    } else {
        echo " <div class='messaError'><p>Escoja otro usuario, ya este se encuentra registrado!</p> </div> ";
    }
}
?>

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
    <link rel="stylesheet" href="../css/createLogin.css">
    <script src="../js/jquery-3.6.0.min.js"></script>
    <script src="../js/bootstrap.bundle.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/3762365bc6.js" crossorigin="anonymous"></script>
    <title>Crear Login</title>
</head>

<body>

    <body>
        <div class="imgLogin">
            <img src="../img/createLogin.png" alt="" class="img_Lo">
        </div>
        <form class="form_login " method="post" name="form_create_login">
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
            <button type="button" onclick="ValidarForm()" class="btn btn-success">Crear cuenta</button>

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
            const showError = document.querySelector(".label_Er")
            showError.style.display = "block";
        } else {
            document.form_create_login.submit();
        }
    }
</script>
</body>

</html>