const btnAddPaciente = document.getElementById('btnAddPaciente');
const modalAdd = document.getElementById('modalAdd');
const modalAccion = document.getElementById('modalAccion');
const close = document.querySelector('.close');
const closeAccion = document.querySelector('.closeAccion');
const rows = document.querySelectorAll('.userSelect');
const rowMedico = document.getElementById('rowMedico');

// Capturar campos de textos
const formAdd = document.querySelector('.formAdd'),
      formAccion = document.querySelector('.formAccion');


function registrarMedico() {
    btnAddPaciente.addEventListener('click', () => {
        modalAdd.style.display = 'flex';
        // Al presionar Registrar el en formulario de agregar
        formAdd.addEventListener('submit', (e) => {
            e.preventDefault();

            const accion = document.getElementById('accion').value;
            
            console.log(accion);
            console.log(e.target[0].value)
            let cedulaMedico = e.target[0].value;
            let nameMedico = e.target[1].value;
            let lastname = e.target[2].value;
            let ages = e.target[3].value;
            let address = e.target[4].value;
            let cellphone = e.target[5].value;
            let email = e.target[6].value;
            let sex = e.target[7].value;
            let specialty = e.target[8].value;
            let collegiate = e.target[9].value;
        
            const post = new FormData();
            post.append('cedula_medico', cedulaMedico);
            post.append('nombre', nameMedico);
            post.append('apellido', lastname);
            post.append('edad', ages);
            post.append('direccion', address);
            post.append('telefono', cellphone);
            post.append('correo', email);
            post.append('sexo', sex);
            post.append('especialidad', specialty);
            post.append('n_colegiado', collegiate);
            post.append('accion', accion);
            
            if (accion === 'crear') {
                // Crearemos nuevo medico
                ajaxInsert(post);
            }
        
        });

        /** Insertando datos a la base de datos via Ajax */
        function ajaxInsert(data) {
            const xhttp = new XMLHttpRequest();
            xhttp.open('POST', 'add_medico.php', true);
            xhttp.onload = function () {
                if (this.readyState === 4) {
                    if (this.status === 200 || this.status === 201) {
                        const response = JSON.parse(this.responseText);
                        console.log(response);
                        // Inserta un nuevo elemento a la tabla
                        const newMedico = document.createElement('tr');

                        newMedico.innerHTML = `
                                <td>${response.data.cedula_medico}</td>
                                <td>${response.data.nombre}</td>
                                <td>${response.data.apellido}</td>
                                <td>${response.data.edad}</td>
                                <td>${response.data.direccion}</td>
                                <td>${response.data.telefono}</td>
                                <td>${response.data.correo}</td>
                                <td>${response.data.sexo}</td>
                                <td>${response.data.especialidad}</td>
                                <td>${response.data.n_colegiado}</td>
                        `;
                        // Agregar fila(registro) a la tabla
                        rowMedico.appendChild(newMedico);
                    }
                }
            };
            xhttp.send(data);
        }
    });
    close.addEventListener('click', () => {
        modalAdd.style.display = 'none';
    });
}
if (btnAddPaciente) {
    registrarMedico();
}

rows.forEach(row =>  {
    console.log(row)
    row.addEventListener('click', (e) => {
        console.log(e.path[1].id)
        // Muestro la subventana(Ventana modal).
        modalAccion.style.display = 'flex';
        accionRow(row);
    });
});
closeAccion.addEventListener('click', () => {
    modalAccion.style.display = 'none';
});
function accionRow(row) {
    // Evento subtmi al formulario
    formAccion.addEventListener('submit', (e) => {
        e.preventDefault();
        console.log(row.id);

        /** Capturo el id de los botones
         * Para que cuando le de click a un boton sepa que funcion ejecutar.
         */
        switch (e.submitter.id) {
            case 'edit':
                console.log('Update');
                break;
            case 'delete':
                // console.log('Delete');
                ajaxDelete();
            break;
        
            default:
                break;
        }
    });
    function ajaxDelete() {
        // Llamado AJAX
        // Crear el objeto
        const xhttp = new XMLHttpRequest();
        // Abrir la conexion 
        // xhttp.open('GET', `add_medico?id=${id}&accion=eliminar`);
        // console.log(idReal)
    }
}
// Recorro el NodeList <tr>
// for (let i = 0; i < row.length; i++) {
//     // console.log(row[i].dataset.id);
//     // Acceso al <tr> que el user de click;
//     row[i].addEventListener('click', () => {
//         console.log(i)
//         // Muestro la subventana(Ventana modal).
//         modalAccion.style.display = 'flex';
//         // Evento subtmi al formulario
//         formAccion.addEventListener('submit', (e) => {
//             e.preventDefault();
//             console.log(row)
//             console.log(row[i])
//             // if (e.target)
//             const id = row[i].dataset;
//             // if (id === id) {
//                 //     alert('hello');
//                 // }
//                 console.log(id);
//                 console.log(i);
//             /** Capturo el id de los botones
//              * Para que cuando le de click a un boton sepa que funcion ejecutar.
//              */
//             switch (e.submitter.id) {
//                 case 'edit':
//                     console.log('Update')
//                     break;
//                     case 'delete':
//                         // ajaxDelete();
//                         // console.log(e);
//                     break;
            
//                 default:
//                     break;
//             }
//         });

//         function ajaxDelete() {
//             // Llamado AJAX
//             // Crear el objeto
//             const xhttp = new XMLHttpRequest();
//             // Abrir la conexion 
//             xhttp.open('GET', `add_medico?id=${id}&accion=eliminar`)
//         }

//     });
//     closeAccion.addEventListener('click', () => {
//         modalAccion.style.display = 'none';
//     });
// }

// //Eliminar medicos
// function deleteMedico(e) {

// }
