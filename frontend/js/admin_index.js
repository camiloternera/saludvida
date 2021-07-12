const btnAddPaciente = document.getElementById('btnAddPaciente');
const modalAdd = document.getElementById('modalAdd');
const modalAccion = document.getElementById('modalAccion');
const close = document.querySelector('.close');
const closeAccion = document.querySelector('.closeAccion');
const row = document.querySelectorAll('.userSelect');
// Capturar campos de textos
const formAdd = document.querySelector('.formAdd');
// const cedulaMedico = document.getElementById('cedula');
// const nameMedico = document.getElementById('name');
// const lastname = document.getElementById('lastname');
// const ages = document.getElementById('ages');
// const address = document.getElementById('address');
// const cellphone = document.getElementById('cellphone');
// const email = document.getElementById('email');
// const sex = document.getElementById('sex');
// const specialty = document.getElementById('specialty');
// const collegiate = document.getElementById('collegiate');

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
            
            if (accion === 'registrar') {
                // Crearemos nuevo medico
                ajaxInsert(post);
            }
        
        });

        function ajaxInsert(data) {
            const xhttp = new XMLHttpRequest();
            xhttp.open('POST', 'add_medico.php', true);
            debugger
            xhttp.onload = function () {
                if (this.readyState === 4) {
                    if (this.status === 200 || this.status === 201) {
                        const response = (this.responseText);
                        console.log(response);
                        // Inserta un nuevo elemento a la tabla
                        // const newMedico = document.createElement('tr');

                        // newMedico.innerHTML = `
                        //         <td>${response.datos.nombre}</td>
                        //         <td>${response.datos.empresa}</td>
                        //         <td>${response.datos.telefono}</td>
                        // `;
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
