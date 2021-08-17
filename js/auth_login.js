// Form
const form = document.getElementById('formLogin');
//URL
const url = "backend/auth_login.php";
// Accion del form al evento submit
form.addEventListener('submit', (e) => {
    // Evito que la pagina se recargue
    e.preventDefault();
    // Capturo los campos del formulario
    const fieldCedula = document.getElementById('user'),
          fieldPassword = document.getElementById('password');
    // Valido que lo campos esten vacios
    if (fieldCedula.value == "" || fieldPassword.value == "") {
        showMessage("Todos los campos son obligatorios", "error");
    } else {
        try {
            const formValue = new FormData();
            formValue.append('cedula', fieldCedula.value);
            formValue.append('password', fieldPassword.value);
            postUserCorrect(formValue);
        } catch (error) {
            
        }
    }
});
// Ajax para validar que el usuario exista
function postUserCorrect(data) {
    const xhttp = new XMLHttpRequest();
    xhttp.open('POST', url, true);
    xhttp.onreadystatechange = function () {
        if (this.readyState === 4) {
            if (this.status === 200 || this.status === 201) {
                console.log(this.responseText);
                const response = JSON.parse(this.responseText);
                console.log(response)
                if (response.url) {
                    // Reedirijo la pagina a la url de respuesta
                    window.location.href = response.url;
                } else {
                    showMessage(response.msg, "error");
                }
            }
        }
    }
    xhttp.send(data);
}
// Mostrar un mensaje de alerta
function showMessage(message, typeMessage) {
    const notification = document.createElement("div");
    notification.classList.add(typeMessage, 'notificacion');
    notification.textContent = message;

    form.insertBefore(notification, document.querySelector('.form__login-btn'));

    // Mostrar y ocultar mensaje de advertencia
    setTimeout(() => {
        notification.classList.add('visible');
        setTimeout(() => {
            notification.classList.remove('visible');
            setTimeout(() => {
                notification.remove();
            }, 300);
        }, 3000);
    }, 100);
}
