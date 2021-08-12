// Variable para la botones
const btnAddPaciente = document.getElementById('addPaciente'),
      btnUpdatePaciente = document.getElementById('updatePaciente'),
      btnDeletePaciente = document.getElementById('deletePaciente');
// Validar checkbox seleccionado
const allCheck = document.getElementById('allCheck');
var check = document.querySelectorAll('.check');
// Capturar campos de textos
const form = document.querySelector('.form');
// Capturar input oculto
var accion = document.getElementById('accion');
// Ventana
const modal = document.getElementById('modal');
const closeModal = document.querySelector('.close');
// tbody de la tabla
const rowPaciente = document.getElementById('rowPaciente');
// Variable para capturar el campo e imprimir valores
const cedula = document.getElementById('cedula'),
      namePaciente = document.getElementById('name'),
      lastname = document.getElementById('lastname'),
      ages = document.getElementById('ages'),
      address = document.getElementById('address'),
      cellphone = document.getElementById('cellphone'),
      email = document.getElementById('email'),
      sex = document.getElementById('sex');
// URL
const url = "../../backend/functions/crud_paciente.php";

/** Funciones addEventListener */
function eventListener(e) {
    // Seleccion multiple
    allCheck.addEventListener('click', selectMultiple);
    // Abrir ventana modal Crear
    btnAddPaciente.addEventListener('click', openWindowModalAdd);
    // Abrir ventana modal Actualizar
    btnUpdatePaciente.addEventListener('click', openWindowModalUpdate)
    // Eliminar paciente
    btnDeletePaciente.addEventListener('click', deleteRowSelect);

    // Cerrar ventana modal Crear / Actualizar
    closeModal.addEventListener('click', closeWindowModal);
}
// Ejecutar eventListener();
eventListener();

// Seleccion multiple
function selectMultiple() {
    if (allCheck.checked === true) {
        check.forEach(select => {
            select.checked = true;
            checkSelect = select.checked;
        });
    } else {
        check.forEach(select => {
            select.checked = false;
            checkSelect = select.checked;
        });
    }
}

// Abrir ventana modal
function openWindowModalAdd() {
    // Mostrar la ventana modal
    modal.style.display = 'flex';
    // Pasarle un valor al input oculto
    accion.value = 'crear';
    // Ejecutar funcion form, que trae el evento submit.
    form.addEventListener('submit', actionForm);
}
function openWindowModalUpdate() {
    check.forEach(list => {
        if (list.checked) {
            // Abrir la ventana modal
            modal.style.display = 'flex';
            // Pasarle un valor al input oculto
            accion.value = 'update';
            // Agregarle atributos desde JS al option.sex
            sex.children[0].setAttribute("disabled", "");
            // Ejecutar funcion form, que trae el evento submit
            form.addEventListener('submit', actionForm);

            // Fila para obtener los datos
            const row = list.parentElement.parentElement;

            // Imprimir los datos de la fila en los campos
            cedula.value = parseInt(row.childNodes[3].textContent);
            cedula.setAttribute("disabled", ""); // Deshabilitar input
            namePaciente.value = row.childNodes[5].textContent;
            lastname.value = row.childNodes[7].textContent;
            ages.value = parseInt(row.childNodes[9].textContent);
            address.value = row.childNodes[11].textContent;
            cellphone.value = parseInt(row.childNodes[13].textContent);
            email.value = row.childNodes[15].textContent;
            sex.value = row.childNodes[17].innerText;

        }
    })     
}
// Cerrar ventana modal
function closeWindowModal() {
    modal.style.display = 'none';

    // Vaciar los check
    check.forEach(list => {
        list.checked = false;
    });
}

/** Accion que hara el paciente */
function actionForm(e) {
    // Evitar que realice la accion de recargar pagina
    e.preventDefault();
    console.log(e)

    const dataForm = new FormData();

    dataForm.append('cedula_paciente', cedula.value);
    dataForm.append('nombre', namePaciente.value);
    dataForm.append('apellido', lastname.value);
    dataForm.append('edad', ages.value);
    dataForm.append('direccion', address.value);
    dataForm.append('telefono', cellphone.value);
    dataForm.append('correo', email.value);
    dataForm.append('sexo', sex.value);
    dataForm.append('accion', accion.value);
    
    if (accion.value === 'crear') {
        // Crearemos nuevo paciente
        ajaxCreatePaciente(dataForm);
    } else {
        // Editar / Actualizar paciente
        ajaxUpdatePaciente(dataForm);
    }
}

/** Eliminar paciente */ 
function deleteRowSelect() {
    check.forEach(list => {
        if (list.checked) {
            const rowDelete = list.parentElement.parentElement;
            // Pasamos por argumento de la funcion la id y la fila a eliminar
            ajaxDeletePaciente(list.id, rowDelete);
        }
    });
}

/** Tecnologia AJAX */
function ajaxCreatePaciente(data) { // Crear paciente
    console.log(...data)
    const xhttp = new XMLHttpRequest();
    xhttp.open('POST', url, true);
    xhttp.onreadystatechange = function () {
        if (this.readyState === 4) {
            if (this.status === 200 || this.status === 201) {
                // console.log(this.responseText)
                const response = JSON.parse(this.responseText);
                // Inserta un nuevo elemento a la tabla
                const newPaciente = document.createElement('tr');
                newPaciente.classList.add('userSelect');

                newPaciente.innerHTML = `
                    <th><input type="checkbox" class="check" id="${response.data.cedula_paciente}"></th>
                    <td>${response.data.cedula_paciente}</td>
                    <td>${response.data.nombre}</td>
                    <td>${response.data.apellido}</td>
                    <td>${response.data.edad}</td>
                    <td>${response.data.direccion}</td>
                    <td>${response.data.telefono}</td>
                    <td>${response.data.correo}</td>
                    <td>${response.data.sexo}</td>
                `;
                // Agregar fila(registro) a la tabla
                rowPaciente.appendChild(newPaciente);
                // Limpiar el formulario
                form.reset();
                // Reasignarle valores al check
                check = document.querySelectorAll('.check');
                // Cerrar la ventana modal
                closeWindowModal();
            }
        }
    };
    xhttp.send(data);
}
function ajaxUpdatePaciente(data) { // Editar / Actualizar paciente
    /** Editando/Actualizando datos a la base de datos via Ajax */
    // LLamado AJAX - Creando objeto
    const xhttp = new XMLHttpRequest();
    // Abrir la conexion
    xhttp.open('POST', url, true);
    // Leer la respuesta
    xhttp.onload = function () {
        if (this.readyState === 4) {
            if (this.status === 200 || this.status === 201) {
                const response = JSON.parse(this.responseText);                
                // Capturar id
                const id = document.getElementById(`${response.data.cedula_paciente}`);
                // Capturar la fila
                const row = id.parentElement.parentElement;

                // Imprimir datos en el DOM HTML
                row.children[2].innerText = response.data.nombre;
                row.children[3].innerText = response.data.apellido;
                row.children[4].innerText = response.data.edad;
                row.children[5].innerText = response.data.direccion;
                row.children[6].innerText = response.data.telefono;
                row.children[7].innerText = response.data.correo;
                row.children[8].innerText = response.data.sexo;

                closeWindowModal();
            }
        }
    }
    xhttp.send(data);
}
function ajaxDeletePaciente(id, rowDelete) { // Eliminar paciente
    // Validamos que este seguro de eliminar un user
    const confirmDelete = confirm('¿Estás Seguro (a) ?');
    
    if (confirmDelete) {
        /** Eliminando datos a la base de datos via Ajax */
        // LLamado AJAX - Creando objeto
        const xhttp = new XMLHttpRequest();
        // Abrir la Conexion
        xhttp.open('GET', `${url}?id=${id}&accion=delete`, true);
        // Leer la respuesta
        xhttp.onload = function () {
            if (this.readyState === 4) {
                if (this.status === 200 || this.status === 201) {
                    const response = JSON.parse(xhttp.responseText);
                    if (response.respuesta === 'Successful') {
                        // Eliminar el registro del DOM
                        rowDelete.remove();
                        // Reasignarle valores al check
                        check = document.querySelectorAll('.check');
                    }
                }
            }
        }
        // Enviar la peticion
        xhttp.send();
    }
}
