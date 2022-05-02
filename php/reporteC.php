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

?>
<?php include("head.php"); ?>
<title>Reportes</title>
<link rel="stylesheet" href="../css/reportP.css">
<link rel="stylesheet" href="../css/stilo_userRegis.css">

<?php include("closeHead.php") ?>
<?php include("contBody.php") ?>

<!--  ---------------------MODAL CONFIR print case-----------  ---------------- -->
<div class="modal fade" id="EjemploModal1" tabindex="-1" role="dialog" aria-labelledby="EjemploModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="EjemploModalLabel">
                    Quiere imprimir este caso?
                </h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">x</span>
                </button>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success imprimir" data-dismiss="modal">
                    Imprimir
                </button>
            </div>
        </div>
    </div>
</div>
<div class="title">
    <h1>En esta parte puede seleccionar un caso para imprimirlo:</h1> <br>


</div>

<div class="contImgPrint">
    <img src="../img/print.png" alt="" class="img_print">
</div>
<table class=" table ">
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
        $name_Selec = $con->showDatos("SELECT * FROM `g_casos` WHERE `id_client`='$id_user'  ");
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


<?php include("closeBody.php") ?>

<script>
    const trBody = document.querySelectorAll(".t_Body  tr");
    var idTr = "";
    trBody.forEach(tr => {
        tr.addEventListener("click", () => {
            showModal();
            idTr = tr.getAttribute("id");
            const Btnimprimir = document.querySelector(".imprimir");
            Btnimprimir.addEventListener("click", () => {
                const thFecha = document.querySelector("#fecha" + idTr).innerText;
                const thcliente = document.querySelector("#cliente" + idTr).innerText;
                const thtipoCaso = document.querySelector("#tipo_caso" + idTr).innerText;
                const thdecpt_caso = document.querySelector("#decpt_caso" + idTr).innerText;
                const thabogado = document.querySelector("#abogado" + idTr).innerText;
                const thestado_caso = document.querySelector("#estado_Caso" + idTr).innerText;


                var contentToPrint = `<b>Este documento contiene un pequeño de reporte de un caso seleccionado que se encuentra registrado en el sistema. Asi que es el objetivo de este archivo.</b><br><br>  ` +
                    `<b>Fecha del caso: </b> ${thFecha}.<br><br>` + `<b>Cliente: </b> ${thcliente}.<br><br> ` + `<b>Tipo de caso: </b> ${thtipoCaso}.<br><br> ` +
                    `<b>Descripcion: </b> ${thdecpt_caso}.<br><br> ` + `<b>Abogado Asignado: </b> ${thabogado}.<br><br> ` + `<b>Estado del caso: </b> ${thestado_caso}.<br><br> `;
                var page = document.body.innerHTML;
                document.body.innerHTML = contentToPrint;
                window.print();
                document.body.innerHTML = page;
                location.reload()


            });

        });
    });


    function showModal() {
        $("#EjemploModal1").modal("show");
    }
</script>