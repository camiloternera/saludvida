// import { router } from "./routes/admin.routes.js";
// console.log("hello")
// const init = () => {
//     router(window.location.hash);
//     window.addEventListener("hashchange", () => {
//         router(window.location.hash);
//     });
// }
// window.addEventListener("load", init);

const btnAddPaciente = document.getElementById('btnAddPaciente');
const modalAdd = document.getElementById('modalAdd');
const close = document.querySelector('.close');

btnAddPaciente.addEventListener('click', (e) => {
    modalAdd.style.display = 'flex';
});
close.addEventListener('click', () => {
    modalAdd.style.display = 'none';
});
