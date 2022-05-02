<?php
session_start();
if (isset($_SESSION["pass"]) && isset($_SESSION["user"])) {
    print_r("<div class='userRegi'> <p><i class='fa-solid fa-user-check'></i>&nbsp&nbsp" . strtoupper($_SESSION["user"]) . "</p></div>");
} else {
    header("Location:login.php");
}
include("head.php");

?>

<title>Iinicio</title>

<link rel="stylesheet" href="../css/inicioF.css">
<link rel="stylesheet" href="../css/stilo_userRegis.css">
<?php include("head.php") ?>
<?php include("contBody.php") ?>

<div class="continer">
    <div class="contTitulo">
        <h1>Bienvenido</h1>
    </div>
    <div class="contParrafo">
        <p>Este es un sistema para gestionar los diferentes procesos que se toman cuentan los abogados
            en el momento de registrar un caso, para su posterior desarrollo o en los tribunales o en cualquier
            otro entorno. <br><br>
            Es un progrma muy util y poderos, pues nos permite de forma online, tener acceso a los diferentes casos
            que se esten llevando acabo. Así que sin mas, esto es muy ventajoso. <b>Puede navegar por el menú de navegación, valga la
                redundacia, para ver todos los servicios que se ofrecen.... !Grcias por usar el progrma¡</b>


        </p>
    </div>

</div>

<?php include("closeBody.php") ?>