// Capturar menu lateral izquierdo
const listItems = document.querySelectorAll(".list-items");

//Recorrer los items
listItems.forEach(listItem => {
    // Capturar evento click por cada Item
    listItem.addEventListener('click', () => {
        listItem.classList.toggle("arrow");

        let height = 0;
        // Capturar el hermano del Elemento listItem
        let subItem = listItem.nextElementSibling;

        // Validar si el height del subItem es igual a 0 
        if (subItem.clientHeight == 0) {
            // El height minimo que debe tener subtItem para mostrarse
            height = subItem.scrollHeight;
        }
        // Pone en los estilo el height = heightpx;
        subItem.style.height = `${height}px`;
    });
});