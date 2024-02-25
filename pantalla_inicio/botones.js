const b_postulante = document.getElementById("boton_postulante");
const b_lista = document.getElementById("boton_lista");
const d_mitadDer = document.getElementById("div_mitadDer");
const cargos = document.querySelector(".cargos");

b_postulante.addEventListener("click", () => {
  window.location.href = "../SolicitudTrabajo.html";
    
  //  cargos.style.display = "block";//     d_mitadDer.classList.add("escondido");
});

b_lista.addEventListener("click", () => {
});
