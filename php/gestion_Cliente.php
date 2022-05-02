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
    $nombre = $_POST["Nombre"];
    $apellido = $_POST["apellido"];
    $cedula = $_POST["cedula"];
    $correo = $_POST["Correo"];
    $telefono = $_POST["telefono"];
    $celular = $_POST["celular"];
    $direccion = $_POST["direccion"];
    $estado_civil = $_POST["estado_civil"];
    $id = $_POST["id"];

    $con->ejecutar("UPDATE clientes set nombre='$nombre',apellido='$apellido',cedula='$cedula',correo='$correo',telefono='$telefono',celular='$celular',
    direccion='$direccion',estado_civil='$estado_civil' WHERE id=$id");
    header("Location: gestion_Cliente.php");
} else if (isset($_POST["action1"]) == "eliminar") {

    $id = $_POST["id_delete"];
    $con->ejecutar("DELETE clientes FROM clientes WHERE id='$id' ");
    header("Location: gestion_Cliente.php");
} else if (
    isset($_POST["Nombre"]) && isset($_POST["apellido"]) && isset($_POST["cedula"])
    && isset($_POST["Correo"]) && isset($_POST["telefono"]) && isset($_POST["celular"]) && isset($_POST["direccion"]) && isset($_POST["estado_civil"])
) {
    $nombre = $_POST["Nombre"];
    $apellido = $_POST["apellido"];
    $cedula = $_POST["cedula"];
    $correo = $_POST["Correo"];
    $telefono = $_POST["telefono"];
    $celular = $_POST["celular"];
    $direccion = $_POST["direccion"];
    $estado_civil = $_POST["estado_civil"];
    $id = $_POST["id"];


    $con->ejecutar("INSERT into clientes values (null,'$nombre','$apellido','$cedula','$correo','$telefono','$celular','$direccion','$estado_civil','$id_user')  ");
    header("Location: gestion_Cliente.php");
}


?>



<?php include("head.php"); ?>

<title>Gestion de cliente</title>
<link rel="stylesheet" href="../css/gestioClient.css">
<link rel="stylesheet" href="../css/stilo_userRegis.css">
<?php include("closeHead.php") ?>
<?php include("contBody.php") ?>

<div class="btnAdd">
    <button class="agregar">Agregar</button>
</div>
<table class="table">
    <tr>

    <tr>

        <th>Cedula</th>
        <th>Nombre</th>
        <th>Apellido</th>
        <th>Correo</th>
        <th>Telefono</th>
        <th>Celular</th>
        <th>Direccion</th>
        <th>Estado Civil</th>

    </tr>
    </tr>

    <tbody class="t_Body">

        <?php
        $name_Selec = $con->showDatos("SELECT * FROM `clientes` WHERE `id_client`='$id_user'  ");
        $i = 0;
        foreach ($name_Selec as $name) {

        ?>
            <tr id="<?php print_r($name_Selec[$i]["id"]) ?> ">
                <th id="cedula<?php print_r($name_Selec[$i]["id"]) ?>"><?php print_r($name_Selec[$i]["cedula"]) ?> </th>
                <th id="nombre<?php print_r($name_Selec[$i]["id"]) ?>"><?php print_r($name_Selec[$i]["nombre"]) ?> </th>
                <th id="apellido<?php print_r($name_Selec[$i]["id"]) ?>"><?php print_r($name_Selec[$i]["apellido"]) ?> </th>
                <th id="correo<?php print_r($name_Selec[$i]["id"]) ?>"><?php print_r($name_Selec[$i]["correo"]) ?> </th>
                <th id="telefono<?php print_r($name_Selec[$i]["id"]) ?>"><?php print_r($name_Selec[$i]["telefono"]) ?> </th>
                <th id="celular<?php print_r($name_Selec[$i]["id"]) ?>"><?php print_r($name_Selec[$i]["celular"]) ?> </th>
                <th id="direccion<?php print_r($name_Selec[$i]["id"]) ?>"><?php print_r($name_Selec[$i]["direccion"]) ?> </th>
                <th id="estado_civil<?php print_r($name_Selec[$i]["id"]) ?>"><?php print_r($name_Selec[$i]["estado_civil"]) ?> </th>
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
<!--  ---------------------MODAL TO ADD-----------  ---------------- -->
<div class="modal fade contModal" id="EjemploModal" tabindex="-1" role="dialog" aria-labelledby="EjemploModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="EjemploModalLabel">
                    Agregar clientes:
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
                <!-- formulario -->

                <form method="post" name="formularioCliente" class="mb-1">

                    <select class="action" name="action">
                    </select>
                    <select class="id" name="id">

                    </select>
                    <div class="mb-1">
                        <label for="exampleInputEmail1" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="Nombre" name="Nombre" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-1">
                        <label for="input1" class="form-label">Apellido</label>
                        <input type="text" class="form-control" id="apellido" name="apellido" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-1">
                        <label for="input1" class="form-label">Cedula</label>
                        <input type="text" class="form-control" id="cedula" name="cedula" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-1">
                        <label for="input1" class="form-label">Correo</label>
                        <input type="email" class="form-control" id="Correo" name="Correo">
                    </div>
                    <div class="mb-1">
                        <label for="input1" class="form-label">Telefono</label>
                        <input type="text" class="form-control" id="telefono" name="telefono">

                    </div>
                    <div class="mb-1">
                        <label for="input1" class="form-label">Celular</label>
                        <input type="text" class="form-control" id="celular" name="celular">

                    </div>
                    <div class="mb-1">
                        <label for="input1" class="form-label">Direccion</label>
                        <input type="text" class="form-control" id="direccion" name="direccion">

                    </div>
                    <div class="mb-1">
                        <label for="input1" class="form-label">Estado Civil</label>
                        <input type="text" class="form-control" id="estado_civil" name="estado_civil">

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
<script src="../js/gestion_cliente.js"></script>
<?php include("closeBody.php") ?>