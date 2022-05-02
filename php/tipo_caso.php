<?php
session_start();
$id_user = $_SESSION["id"];
if (isset($_SESSION["pass"]) && isset($_SESSION["user"])) {
    print_r("<div class='userRegi'> <p><i class='fa-solid fa-user-check'></i>&nbsp&nbsp" . strtoupper($_SESSION["user"]) . "</p></div>");
} else {
    header("Location:login.php");
}
include("head.php");
include("datos.php");
$con = new ConexionDb();
if (isset($_POST["action"]) == "actulizar") {
    $nombre = $_POST["nombre"];
    $id = $_POST["id"];

    $con->ejecutar("UPDATE tipo_caso set nombre='$nombre' WHERE id='$id' ");
    header("Location: tipo_caso.php");
} else if (isset($_POST["action1"]) == "eliminar") {

    $id = $_POST["id_delete"];
    $con->ejecutar("DELETE tipo_caso FROM tipo_caso WHERE id='$id' ");
    header("Location: tipo_caso.php");
} else if (
    isset($_POST["nombre"])
) {

    $nombre = $_POST["nombre"];

    $con->ejecutar("INSERT into tipo_caso values (null,'$nombre','$id_user')  ");
    header("Location: tipo_caso.php");
}
?>
<!-- --------------------------------------------------------------------------------------------------------------- -->
<?php include("head.php"); ?>
<title>tipo_caso</title>
<link rel="stylesheet" href="../css/tipo_caso.css">
<link rel="stylesheet" href="../css/stilo_userRegis.css">
<?php include("closeHead.php") ?>
<?php include("contBody.php") ?>
<!-- --------------------------------------------------------------------------------------------------------------- -->
<div class="btnAdd">
    <button class="agregar">Agregar</button>
</div>
<table class="table">
    <tr>
        <th>Nombre del caso</th>
    </tr>
    <tbody class="t_Body">

        <?php
        $name_Selec = $con->showDatos("SELECT * FROM `tipo_caso` WHERE id_tipo_caso='$id_user' ");
        $i = 0;
        foreach ($name_Selec as $name) {

        ?>
            <tr id="<?php print_r($name_Selec[$i]["id"]) ?> ">
                <th id="nombre<?php print_r($name_Selec[$i]["id"]) ?>"><?php print_r($name_Selec[$i]["nombre"]) ?> </th>

            </tr>
        <?php $i++;
        } ?>

    </tbody>
</table>

<!--  ---------------------MODAL CONFIR UPDATE OR DELETE-----------  ---------------- -->
<div class="modal fade" id="EjemploModal1" tabindex="-1" role="dialog" aria-labelledby="EjemploModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="EjemploModalLabel">
                    Que deseas hacer?
                </h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">x</span>
                </button>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-warning actualizar" data-dismiss="modal">
                    Actulizar
                </button>
                <form action="" method="post">
                    <select class="action1" name="action1">
                    </select>
                    <select class="id_delete" name="id_delete">
                    </select>
                    <button type="submit" class="btn btn-danger eliminar ">
                        Eliminar
                    </button>
                </form>

            </div>
        </div>
    </div>
</div>
<!-- validar input para que no esten vacio -->


<div class="modal fade" id="EjemploModal" tabindex="-1" role="dialog" aria-labelledby="EjemploModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="EjemploModalLabel">
                    Agregar caso:
                </h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">x</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- formulario -->
                <div class="label_Eror">
                    <label class="form-label label_Error">*Complete los campos antes de enviar</label>
                </div>

                <form method="post" name="formularioCaso">

                    <select class="action" name="action">
                    </select>
                    <select class="id" name="id">

                    </select>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" aria-describedby="emailHelp">
                    </div>
                    <button type="button" onclick="enviar_formulario()" class="btn btn-primary btn-block guardar_Caso">Guardar</button>
                    <button type="button" onclick="enviar_formulario()" class="btn btn-warning btn-block update_Case ">
                        Actulizar
                    </button>
                </form>
            </div>

        </div>
    </div>
</div>

<script src="../js/tipo_caso.js"></script>
<?php include("closeBody.php") ?>