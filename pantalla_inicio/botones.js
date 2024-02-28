const b_postulante = document.getElementById("boton_postulante");
const b_lista = document.getElementById("boton_lista");
const d_mitadDer = document.getElementById("div_mitadDer");
const cargos = document.querySelector(".cargos");

b_postulante.addEventListener("click", () => {
 // window.location.href = "../SolicitudTrabajo.html";
    
    cargos.style.display = "block";
    document.addEventListener("click", clickOutsideHandler);
});

b_lista.addEventListener("click", () => {
});

function clickOutsideHandler(event) {
    if (!cargos.contains(event.target) && event.target !== b_postulante) {
        cargos.style.display = "none";
        document.removeEventListener("click", clickOutsideHandler);
    }
}

