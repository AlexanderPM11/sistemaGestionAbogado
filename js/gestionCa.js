if (window.history.replaceState) { // verificamos disponibilidad
    window.history.replaceState(null, null, window.location.href);
}

function enviar_formulario() {
    const inputFecha = document.getElementById("fecha").value.trim();
    const inputDescripcion = document.getElementById("descripcion").value.trim();
    const cliente = document.getElementById("cliente").value.trim();
    const tipo_caso = document.getElementById("tipo_caso").value.trim();
    const abogado = document.getElementById("abogado").value.trim();
    const estado_caso = document.getElementById("estado_caso").value.trim();
    if ((inputFecha.length == 0) || (inputDescripcion.length == 0)|| (cliente.length == 0)|| (tipo_caso.length == 0)|| (abogado.length == 0)
    || (estado_caso.length == 0)) {
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
    const eliminar = document.querySelector(".eliminar").value = "";
    const btnUpdate = document.querySelector(".actualizar").value = "";
    const fecha = document.getElementById("fecha").value = "";
    const descrip = document.getElementById("descripcion").value = "";
    const cliente = document.getElementById("cliente").value = "";
    const tipo_caso = document.getElementById("tipo_caso").value = "";
    const abogado = document.getElementById("abogado").value = "";
    const estado_caso = document.getElementById("estado_caso").value = "";

    const guardar_Caso = document.querySelector(".guardar_Caso");
    guardar_Caso.style.display = "block";
    const BtnUpdate_Case = document.querySelector(".update_Case");
    BtnUpdate_Case.style.display = "none";
    showModal1()

});


//// acciones para gestionar casos update and delete
const trBody = document.querySelectorAll(".t_Body  tr");
var idTr = "";
trBody.forEach(tr => {
    tr.addEventListener("click", () => {
        showModal();
        idTr = tr.getAttribute("id");

        const eliminar = document.querySelector(".eliminar");
        const btnUpdate = document.querySelector(".actualizar");
        const fecha = document.getElementById("fecha");
        const descrip = document.getElementById("descripcion");
        const cliente = document.getElementById("cliente");
        const tipo_caso = document.getElementById("tipo_caso");
        const abogado = document.getElementById("abogado");
        const estado_caso = document.getElementById("estado_caso");

        // ----------------------------------------------------------------------------------------------------

        const btn_eliminar = document.querySelector(".action1");
        btn_eliminar.style.display = "none";
        const id_delete = document.querySelector(".id_delete");
        id_delete.style.display = "none";
        // ----------------------------------------------------------------------------------------------------
        const thFecha = document.querySelector("#fecha" + idTr).innerText;
        const thcliente = document.querySelector("#cliente" + idTr).innerText;
        const thtipoCaso = document.querySelector("#tipo_caso" + idTr).innerText;
        const thdecpt_caso = document.querySelector("#decpt_caso" + idTr).innerText;
        const thabogado = document.querySelector("#abogado" + idTr).innerText;
        const thestado_caso = document.querySelector("#estado_Caso" + idTr).innerText;

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
            console.log(guardar_Caso)

            fecha.value = thFecha;
            cliente.value = thcliente;
            descrip.value = thdecpt_caso;
            tipo_caso.value = thtipoCaso;
            abogado.value = thabogado;
            estado_caso.value = thestado_caso;
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
    });
});
function showModal1() {
    $("#EjemploModal").modal("show");
}