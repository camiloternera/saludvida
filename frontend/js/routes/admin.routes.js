import Hello from "../controllers/medico.admin.js";
console.log("word")
const router = (route) => {
    let content = document.getElementById("main");
    content.innerHTML = "";

    console.log(route);

    switch (route) {
        case "#/registrar_medico": {
        return content.appendChild(Hello());
        }
        case "#/registrar_medico": {
        return content;
        }
        default: {
        return content;
        }
    }
};

export { router };  
