function showModal() {
  $("#EjemploModal1").modal("show");
}

if (window.history.replaceState) {
  window.history.replaceState(null, null, window.location.href);
}
// ----------------------------------------------------------------------------------------------------------------------------------------------------------
const trBody = document.querySelectorAll(".t_Body  tr");
var idTr = "";
trBody.forEach((tr) => {
  tr.addEventListener("click", () => {
    showModal();
    idTr = tr.getAttribute("id");

    const eliminar = document.querySelector(".eliminar");
    const btnUpdate = document.querySelector(".actualizar");
    const nombre = document.getElementById("Nombre");
    const apellido = document.getElementById("apellido");
    const cedula = document.getElementById("cedula");
    const Correo = document.getElementById("Correo");
    const telefono = document.getElementById("telefono");
    const celular = document.getElementById("celular");
    const direccion = document.getElementById("direccion");
    const estado_civil = document.getElementById("estado_civil");
    // ----------------------------------------------------------------------------------------------------------------------------------------------------------

    const btn_eliminar = document.querySelector(".action1");
    btn_eliminar.style.display = "none";
    const id_delete = document.querySelector(".id_delete");
    id_delete.style.display = "none";

    // ----------------------------------------------------------------------------------------------------------------------------------------------------------
    const thnombre = document.querySelector("#nombre" + idTr).innerText;
    const thapellido = document.querySelector("#apellido" + idTr).innerText;
    const thcedula = document.querySelector("#cedula" + idTr).innerText;
    const thcorreo = document.querySelector("#correo" + idTr).innerText;
    const thtelefono = document.querySelector("#telefono" + idTr).innerText;
    const thcelular = document.querySelector("#celular" + idTr).innerText;
    const thdireccion = document.querySelector("#direccion" + idTr).innerText;
    const thestado_civil = document.querySelector(
      "#estado_civil" + idTr
    ).innerText;

    btnUpdate.addEventListener("click", () => {
      const id1 = document.querySelector(".id");
      const id = document.createElement("option");
      id.value = idTr;
      id1.appendChild(id);
      id1.style.display = "none";

      const actulizar = document.querySelector(".action");
      const option = document.createElement("option");
      option.value = "actulizar";
      actulizar.appendChild(option);
      actulizar.style.display = "none";

      const BtnUpdate_Case = document.querySelector(".update_Case");
      BtnUpdate_Case.style.display = "block";

      const guardar_Caso = document.querySelector(".guardar_Caso");
      guardar_Caso.style.display = "none";

      nombre.value = thnombre;
      apellido.value = thapellido;
      cedula.value = thcedula;
      Correo.value = thcorreo;
      telefono.value = thtelefono;
      celular.value = thcelular;
      direccion.value = thdireccion;
      estado_civil.value = thestado_civil;

      showModal1();
    });

    eliminar.addEventListener("click", () => {
      const id_Eliminar = document.querySelector(".id_delete");
      const op_tion = document.createElement("option");
      op_tion.value = idTr;
      id_Eliminar.appendChild(op_tion);
      const eliminar = document.querySelector(".action1");
      const option = document.createElement("option");
      option.value = "eliminar";
      eliminar.appendChild(option);
      eliminar.style.display = "none";
    });
  });
});

const agregar = document.querySelector(".agregar");
agregar.addEventListener("click", () => {
  const id = document.querySelector(".id");
  id.style.display = "none";
  const action = document.querySelector(".action");
  action.style.display = "none";
  const eliminar = (document.querySelector(".eliminar").value = "");
  const btnUpdate = (document.querySelector(".actualizar").value = "");
  const nombre = (document.getElementById("Nombre").value = "");
  const apellido = (document.getElementById("apellido").value = "");
  const cedula = (document.getElementById("cedula").value = "");
  const Correo = (document.getElementById("Correo").value = "");
  const telefono = (document.getElementById("telefono").value = "");
  const celular = (document.getElementById("celular").value = "");
  const direccion = (document.getElementById("direccion").value = "");
  const estado_civil = (document.getElementById("estado_civil").value = "");

  const guardar_Caso = document.querySelector(".guardar_Caso");
  guardar_Caso.style.display = "block";
  const BtnUpdate_Case = document.querySelector(".update_Case");
  BtnUpdate_Case.style.display = "none";
  showModal1();
});

function enviar_formulario() {
  const nombre = document.getElementById("Nombre").value.trim();
  const apellido = document.getElementById("apellido").value.trim();
  const cedula = document.getElementById("cedula").value.trim();
  const Correo = document.getElementById("Correo").value.trim();
  const telefono = document.getElementById("telefono").value.trim();
  const celular = document.getElementById("celular").value.trim();
  const direccion = document.getElementById("direccion").value.trim();
  const estado_civil = document.getElementById("estado_civil").value.trim();
  if (
    nombre.length == 0 ||
    apellido.length == 0 ||
    cedula.length == 0 ||
    Correo.length == 0 ||
    telefono.length == 0 ||
    celular.length == 0 ||
    direccion.length == 0 ||
    estado_civil.length == 0
  ) {
    const showError = document.querySelector(".label_Eror");
    showError.style.display = "block";
  } else {
    document.formularioCliente.submit();
  }
}

function showModal1() {
  $("#EjemploModal").modal("show");
}
