import view from '../../../admin/crud_medico/registrar_medico.php';

export default () => {
    const divElement = document.createElement("div");
    divElement.innerHTML = view;
  
    return divElement;
};
