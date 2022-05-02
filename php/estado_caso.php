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
    $estado_caso = $_POST["nombre"];
    $id = $_POST["id"];

    $con->ejecutar("UPDATE estado_caso set estado_caso='$estado_caso' WHERE id='$id' ");
    header("Location: estado_caso.php");
} else if (isset($_POST["action1"]) == "eliminar") {

    $id = $_POST["id_delete"];
    $con->ejecutar("DELETE estado_caso FROM estado_caso WHERE id='$id' ");
    header("Location: estado_caso.php");
} else if (
    isset($_POST["nombre"])
) {

    $estado_caso = $_POST["nombre"];

    $con->ejecutar("INSERT into estado_caso values (null,'$estado_caso','$id_user')  ");
    header("Location: estado_caso.php");
}
?>
<?php include("head.php"); ?>
<title>Estado_caso</title>
<link rel="stylesheet" href="../css/tipo_caso.css">
<link rel="stylesheet" href="../css/stilo_userRegis.css">
<?php include("closeHead.php") ?>
<?php include("contBody.php") ?>
<div class="btnAdd">
    <button class="agregar">Agregar</button>
</div>
<table class="table">
    <tr>
        <th>Estados de los casos</th>
    </tr>
    <tbody class="t_Body">

        <?php
        $name_Selec = $con->showDatos("SELECT * FROM `estado_caso` WHERE `id_estado_caso`='$id_user' ");
        $i = 0;
        foreach ($name_Selec as $name) {

        ?>
            <tr id="<?php print_r($name_Selec[$i]["id"]) ?> ">
                <th id="nombre<?php print_r($name_Selec[$i]["id"]) ?>"><?php print_r($name_Selec[$i]["estado_caso"]) ?> </th>

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






<script>
    if (window.history.replaceState) { // verificamos disponibilidad
        window.history.replaceState(null, null, window.location.href);
    }

    function showModal1() {
        $("#EjemploModal").modal("show");
    }

    function showModal() {
        $("#EjemploModal1").modal("show");
    }
    const trBody = document.querySelectorAll(".t_Body  tr");
    var idTr = "";

    trBody.forEach(tr => {
        tr.addEventListener("click", () => {
            idTr = tr.getAttribute("id");
            showModal();

        });
    });
    const eliminar = document.querySelector(".eliminar");
    const btnUpdate = document.querySelector(".actualizar");
    const nombre = document.getElementById("nombre");
    const apellido = document.getElementById("nombre");
    // ----------------------------------------------------------------------------------------------------

    const btn_eliminar = document.querySelector(".action1");
    btn_eliminar.style.display = "none";
    const id_delete = document.querySelector(".id_delete");
    id_delete.style.display = "none";
    // ------------------------------------------------------------------------------
    btnUpdate.addEventListener("click", () => {
        const id1 = document.querySelector(".id");
        const id = document.createElement('option');
        id.value = idTr;
        id1.appendChild(id);
        id1.style.display = "none";

        const actulizar = document.querySelector(".action");
        const option = document.createElement('option');
        option.value = "actulizar";
        actulizar.appendChild(option);
        actulizar.style.display = "none";


        const BtnUpdate_Case = document.querySelector(".update_Case");
        BtnUpdate_Case.style.display = "block";

        const guardar_Caso = document.querySelector(".guardar_Caso");
        guardar_Caso.style.display = "none";
        const thnombre = document.querySelector("#nombre" + idTr).innerText;
        nombre.value = thnombre;
        showModal1();
    });
    eliminar.addEventListener("click", () => {
        const id_Eliminar = document.querySelector(".id_delete");
        const op_tion = document.createElement('option');
        op_tion.value = idTr;
        id_Eliminar.appendChild(op_tion);


        const eliminar = document.querySelector(".action1");
        const option = document.createElement('option');
        option.value = "eliminar";
        eliminar.appendChild(option);
        eliminar.style.display = "none";

    });

    function enviar_formulario() {
        const nombre = document.getElementById("nombre").value.trim();
        if ((nombre.length == 0)) {
            const showError = document.querySelector(".label_Eror")
            showError.style.display = "block";

        } else {
            document.formularioCaso.submit();
        }
    }
    const agregar = document.querySelector(".agregar");
    agregar.addEventListener("click", () => {
        const id = document.querySelector(".id");
        id.style.display = "none";
        const action = document.querySelector(".action");
        action.style.display = "none";
        const nombre = document.getElementById("nombre").value = "";


        const guardar_Caso = document.querySelector(".guardar_Caso");
        guardar_Caso.style.display = "block";
        const BtnUpdate_Case = document.querySelector(".update_Case");
        BtnUpdate_Case.style.display = "none";
        showModal1()

    });
</script>
<?php include("closeBody.php") ?>