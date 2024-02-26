class Ctrl_postulante {
    constructor() {
       this.postulantes=[];
    }
    add(postulante){
        this.postulantes.push(postulante);
    }

    mostrarPostulante(aux){
        let html="";
        const listaPostulantes=document.getElementById('lista-postulantes');
        listaPostulantes.innerHTML="";
        this.postulantes.forEach((postulante)=>{
            const fila=listaPostulantes.insertRow();
            const celda_nombre=fila.insertCell(0);
            const celda_cargo=fila.insertCell(1);
            const celda_fch_postulacion=fila.insertCell(2);
            const celda_estado=fila.insertCell(3);

            celda_nombre.innerHTML=postulante.nombre;
            celda_cargo.innerHTML=postulante.cargo;
            celda_fch_postulacion.innerHTML=postulante.fch_postulacion;
            celda_estado.innerHTML=postulante.estado;

        });

    }


}


const ctrl_postulante=new Ctrl_postulante();

const postulante1=new postulante('Juan','Desarrollador','2021-10-10','Pendiente');
const postulante2=new postulante('Maria','Desarrollador','2021-10-10','Pendiente');
const postulante3=new postulante('Pedro','Desarrollador','2021-10-10','Pendiente');

ctrl_postulante.add(postulante1);
ctrl_postulante.add(postulante2);
ctrl_postulante.add(postulante3);
ctrl_postulante.mostrarPostulante();

function mostrarPostulante(){
    
}

