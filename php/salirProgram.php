<?php
if (isset($_POST["conSalir"]) == "salir") {
    header("Location:login.php");
    session_start();
    session_destroy();
}
