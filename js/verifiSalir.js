const salir=document.querySelector(".salir");
salir.addEventListener("click",()=>{
    showM();
});


function showM() {
    $("#modalConfirSalir").modal("show");
}