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
    console.log(thnombre)
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