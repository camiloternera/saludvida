

//----------- CODIGO DEL MENÚ -----------//

//Contenedor de cada item del menu
const intemsSubMPaciente = Array.from(document.querySelectorAll(".DashBItem"));
//Contenedores de los submenus 
const subMCitas = document.querySelector(".submenu__citas");
const subMInfoPersonal = document.querySelector(".submenu__infoPersonal");

//array usada para verificar si se ha clickeado, cada submenu tiene un index en el array
var clicked = [3];

//Recorre los items del menu 
intemsSubMPaciente.forEach(element => {
    //se acciona cuando se hace click en alguna opción del menú
    element.addEventListener("click", () => {
        //el switch detecta cual de las opciones del menu ha sido seleccionado
        switch (intemsSubMPaciente.indexOf(element)) {
            case 1: //si se selecciona la opción de citas
                resetMenu(subMInfoPersonal, 2)
                selectOption(subMCitas, 1); 
                break;
            case 2: //si se selecciona la opcion de información personal
                resetMenu(subMCitas, 1)
                selectOption(subMInfoPersonal, 2);
                break;
        }        
    })
}); 

/*
selectOption()
parametros: 
elemento: el elemento del submenu a mostrar u ocultar.
num : el numero del index del clicked perteneciente al contenedor.
*/ 
const selectOption = (elemento, num) => {
    if (!clicked[num]) {
        elemento.style.display = "initial";
        clicked[num] = true;
    }
    else {
        elemento.style.display = "none";
        clicked[num] = false;
    }
    
}


const resetMenu = (elemento, num) => {
    elemento.style.display = "none";
    clicked[num] = false;
}
    



