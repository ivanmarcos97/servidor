function cargaViajes() {
  let fichero = "./viajes.json";
  fetch(fichero)
    // .a continuación, se ejecuta cuando el servidor remoto responde
    .then(function (response) {
      // response.text() devuelve una nueva promesa que se resuelve con el texto de respuesta completo
      // cuando se carga
      return response.json();
    })
    .then(function (objeto) {
      // ...y aquí está el contenido del archivo remoto
      let tabla = document.getElementById("idViajes");
      for (let i = 0; i < objeto.viajes.length; i++) {
        let fila = document.createElement("tr");
        tabla.append(fila);
        let celdades = document.createElement("td");
        let celdapre = document.createElement("td");

        celdades.append(objeto.viajes[i].descripcion);
        celdapre.append(objeto.viajes[i].precio);

        fila.append(celdades);
        fila.append(celdapre);
      }
    });
}
document.addEventListener("DOMContentLoaded", programa);

function programa() {
  let tabla = document.getElementById("idViajes");
  let viajeseleccionado;
  tabla.addEventListener("click", seleccionarviaje);
  function seleccionarviaje(evento) {
    let target = evento.target;
    if (target.tagName != "TD") {
      return;
    }
    let tr = target.closest("tr");
    let trs = tabla.querySelectorAll("tr");
    for (let i = 0; i < trs.length; i++) {
      trs[i].style.backgroundColor = "white";
    }
    tr.style.backgroundColor = "yellow";
    viajeseleccionado = tr;
    let comprar = document.getElementById("comprar");
    let devolver = document.getElementById("devolver");

    comprar.disabled = false;
    devolver.disabled = false;
  }
}
