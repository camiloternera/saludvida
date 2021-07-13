const btnAddPaciente = document.getElementById('btnAddPaciente');
const modalAdd = document.getElementById('modalAdd');
const modalAccion = document.getElementById('modalAccion');
const close = document.querySelector('.close');
const closeAccion = document.querySelector('.closeAccion');
const row = document.querySelectorAll('.userSelect');
const rowMedico = document.getElementById('rowMedico');
// Capturar campos de textos
const formAdd = document.querySelector('.formAdd');


if (btnAddPaciente) {
    btnAddPaciente.addEventListener('click', (e) => {
        modalAdd.style.display = 'flex';
        formAdd.addEventListener('submit', (e) => {
            e.preventDefault();

            const accion = document.getElementById('registrar').value;
        
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
            post.append('registrar', accion);
            
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


for (let i = 0; i < row.length; i++) {
    row[i].addEventListener('click', () => {
        modalAccion.style.display = 'flex';
    });
    closeAccion.addEventListener('click', () => {
        modalAccion.style.display = 'none'; 
    });
}
