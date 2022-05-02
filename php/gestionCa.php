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
    $fecha = $_POST["fecha"];
    $cliente = $_POST["cliente"];
    $Tipo_caso = $_POST["tipo_caso"];
    $descripcion = $_POST["descripcion"];
    $abogado = $_POST["abogado"];
    $estado = $_POST["estado_caso"];
    $id = $_POST["id"];

    $con->ejecutar("UPDATE g_casos set fecha='$fecha',cliente='$cliente',tipo_caso='$Tipo_caso'
    ,decpt_caso='$descripcion',abogado='$abogado',estado_Caso='$estado'
    WHERE id='$id' ");
    header("Location: gestionCa.php");
} else if (isset($_POST["action1"]) == "eliminar") {

    $id = $_POST["id_delete"];
    $con->ejecutar("DELETE g_casos FROM g_casos WHERE id='$id' ");
    header("Location: gestionCa.php");
} else if (
    isset($_POST["fecha"]) && isset($_POST["cliente"]) && isset($_POST["tipo_caso"])
    && isset($_POST["descripcion"]) && isset($_POST["abogado"]) && isset($_POST["estado_caso"])
) {

    $fecha = $_POST["fecha"];
    $cliente = $_POST["cliente"];
    $Tipo_caso = $_POST["tipo_caso"];
    $descripcion = $_POST["descripcion"];
    $abogado = $_POST["abogado"];
    $estado = $_POST["estado_caso"];
    $con->ejecutar("INSERT into g_casos values (null,'$fecha','$cliente','$Tipo_caso','$descripcion','$abogado','$estado','$id_user')  ");
    header("Location: gestionCa.php");
}
?>
<!-- -------------------------------------------------------------------------------------------------------------- -->
<?php include("head.php"); ?>
<title>Gestion de caso</title>
<link rel="stylesheet" href="../css/stilo_userRegis.css">
<?php include("head.php") ?>
<?php include("contBody.php") ?>
<!-- -------------------------------------------------------------------------------------------------------------- -->

<div class="btnAdd">
    <button class="agregar">Agregar</button>
</div>
<table class="table table-dark ">
    <tr>
        <th>Fecha del caso</th>
        <th>Cliente</th>
        <th>Tipo de caso</th>
        <th>Descripción</th>
        <th>Abogado Asignado</th>
        <th>Estado del caso</th>
    </tr>
    <tbody class="t_Body">
        <?php
        $name_Selec = $con->showDatos("SELECT * FROM `g_casos` WHERE `id_client`='$id_user' ");
        $i = 0;
        foreach ($name_Selec as $name) {
        ?>
            <tr id="<?php print_r($name_Selec[$i]["id"]) ?> ">
                <th id="fecha<?php print_r($name_Selec[$i]["id"]) ?>"><?php print_r($name_Selec[$i]["fecha"]) ?> </th>
                <th id="cliente<?php print_r($name_Selec[$i]["id"]) ?>"><?php print_r($name_Selec[$i]["cliente"]) ?> </th>
                <th id="tipo_caso<?php print_r($name_Selec[$i]["id"]) ?>"><?php print_r($name_Selec[$i]["tipo_caso"]) ?> </th>
                <th id="decpt_caso<?php print_r($name_Selec[$i]["id"]) ?>"><?php print_r($name_Selec[$i]["decpt_caso"]) ?> </th>
                <th id="abogado<?php print_r($name_Selec[$i]["id"]) ?>"><?php print_r($name_Selec[$i]["abogado"]) ?> </th>
                <th id="estado_Caso<?php print_r($name_Selec[$i]["id"]) ?>"><?php print_r($name_Selec[$i]["estado_Caso"]) ?> </th>
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
                        <label for="exampleInputEmail1" class="form-label">Fecha</label>
                        <input type="date" class="form-control" id="fecha" name="fecha" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="input1" class="form-label">Cliente</label>
                        <select name="cliente" id="cliente">
                            <?php
                            $name_Selec = $con->showDatos("SELECT nombre FROM `clientes` ");
                            $i = 0;
                            foreach ($name_Selec as $name) {

                            ?>
                                <option> <?php print_r($name_Selec[$i]["nombre"]);
                                            $i++; ?> </option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="input1" class="form-label">Tipo de caso</label>
                        <select name="tipo_caso" id="tipo_caso">

                            <?php
                            $name_Selec = $con->showDatos("SELECT nombre FROM `tipo_caso` ");
                            $i = 0;
                            foreach ($name_Selec as $name) {

                            ?>
                                <option> <?php print_r($name_Selec[$i]["nombre"]);
                                            $i++; ?> </option>

                            <?php } ?>

                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="input1" class="form-label">Descripcion</label>
                        <input class="form-control" id="descripcion" name="descripcion" id="input1">
                    </div>
                    <div class="mb-3">
                        <label for="input1" class="form-label">Abogado Asignado </label>
                        <select name="abogado" id="abogado">
                            <?php
                            $name_Selec = $con->showDatos("SELECT nombre FROM `abogados` WHERE `id_user_abogado`='$id_user'  ");
                            $i = 0;
                            foreach ($name_Selec as $name) {

                            ?>
                                <option> <?php print_r($name_Selec[$i]["nombre"]);
                                            $i++; ?> </option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="input1" class="form-label">Estado del caso </label>
                        <select name="estado_caso" id="estado_caso">

                            <?php
                            $name_Selec = $con->showDatos("SELECT estado_caso FROM `estado_caso` WHERE `id_estado_caso`='$id_user'");
                            $i = 0;
                            foreach ($name_Selec as $name) {

                            ?>
                                <option> <?php print_r($name_Selec[$i]["estado_caso"]);
                                            $i++; ?> </option>
                            <?php } ?>
                        </select>
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
<!-- ------------------------------------------------------------------------------- -->
<script src="../js/gestionCa.js"></script>
<?php include("closeBody.php") ?>