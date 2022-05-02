
////Abrir y cerrar menu de navegacion
const btnBar1=document.querySelector(".btnBar");
const ultCont=document.querySelector(".nac-Container");
btnBar1.addEventListener("click",()=>{
let elementStyle = window.getComputedStyle(ultCont);
let elementDisplay = elementStyle.getPropertyValue('display');
if(elementDisplay=="none"){
    ultCont.style.display="flex";
}
else{
    ultCont.style.display="none";
}
});

onresize=function() {
           
    const ancho_Screen=screen.width;
    if(ancho_Screen>=750){
        ultCont.style.display="flex";
    }
};




////funcion para cerrar el menu al hacer click en un a
const all_A=document.querySelectorAll(".a_special");
all_A.forEach(boton =>{
    boton.addEventListener("click",()=>{
        const ultCont1=document.querySelector(".nac-Container");
        ultCont1.style.display="none";
        
    });

});
//funcion para cerrar el sub Menu al hacer click en un a
const all_a_SubMenu=document.querySelectorAll(".sub_casos");
all_a_SubMenu.forEach(boton =>{
    boton.addEventListener("click",()=>{
        const ultCont1=document.querySelector(".sub_Menu_Confi");
        ultCont1.style.display="none";
        
    });

});

////Abrir y cerrar modal de eliminar o actualiar
function showModal() {
    $("#EjemploModal1").modal("show");
}





