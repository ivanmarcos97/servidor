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
  let idviajeseleccionadocompra;
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

    comprar.disabled = false;
  }
  let mostrar = document.getElementById("mostrar");
  mostrar.addEventListener("click", MostrarViajes);
  function MostrarViajes() {
    tablacomprados.innerHTML = "";
    let fichero = "./procesar.php";
    fetch(fichero)
      // .a continuación, se ejecuta cuando el servidor remoto responde
      .then(function (response) {
        // response.text() devuelve una nueva promesa que se resuelve con el texto de respuesta completo
        // cuando se carga

        return response.json();
      })
      .then(function (objeto) {
        // ...y aquí está el contenido del archivo remoto
        let tabla = document.getElementById("idTiposViajes");
        for (let i = 0; i < objeto.length; i++) {
          let fila = document.createElement("tr");
          tabla.append(fila);
          let celid = document.createElement("td");
          let celdades = document.createElement("td");
          let celdapre = document.createElement("td");

          celid.append(objeto[i].id);
          celdades.append(objeto[i].nombre);
          celdapre.append(objeto[i].descripcion);

          fila.append(celid);
          fila.append(celdades);
          fila.append(celdapre);
        }
      });
  }
  let tablacomprados = document.getElementById("idTiposViajes");
  tablacomprados.addEventListener("click", seleccionarviajecomprados);
  function seleccionarviajecomprados(evento) {
    let target = evento.target;
    if (target.tagName != "TD") {
      return;
    }
    let tr = target.closest("tr");
    let trs = tablacomprados.querySelectorAll("tr");
    for (let i = 0; i < trs.length; i++) {
      trs[i].style.backgroundColor = "white";
    }
    tr.style.backgroundColor = "yellow";
    let devolver = document.getElementById("devolver");

    devolver.disabled = false;
    idviajeseleccionadocompra = tr.querySelectorAll("td")[0].textContent;
  }

  let devolver = document.getElementById("devolver");
  devolver.addEventListener("click", devolverViaje);
  function devolverViaje() {
    let xhr = new XMLHttpRequest();
    let url = "anular.php";
    let formData = new FormData();
    formData.append("id", idviajeseleccionadocompra);

    xhr.open("POST", url);

    xhr.send(formData);

    MostrarViajes();
  }
  let comprar = document.getElementById("comprar");
  comprar.addEventListener("click", cargarFormulario);
  function cargarFormulario() {
    let d = document.getElementById("idDescripcion");
    let p = document.getElementById("idPrecio");
    d.value = viajeseleccionado.querySelectorAll("td")[0].textContent;
    p.value = viajeseleccionado.querySelectorAll("td")[1].textContent;
  }
  let comprarviaje = document.getElementById("idComprar");
  comprarviaje.addEventListener("click", ComprarViaje);
  function ComprarViaje() {
    let Nombre = document.getElementById("idnombre").value;
    let Descripción = document.getElementById("idDescripcion").value;
    let Email = document.getElementById("idEmail").value;
    let numero = document.getElementById("idDedicatoria").value;
    let Precio = document.getElementById("idPrecio").value;
    let tarjeta = document.getElementById("idnumero").value;
    let CSV = document.getElementById("idcsv").value;

    if (/^[0-9]{16}$/.test(tarjeta) && /^[0-9]{3}$/.test(CSV)) {
      let xhr = new XMLHttpRequest();
      let url = "insertar.php";
      let formData = new FormData();
      formData.append("nombre", Nombre);
      formData.append("descripcion", Descripción);
      formData.append("email", Email);
      formData.append("numero", numero);
      formData.append("precio", Precio);
      formData.append("tarjeta", tarjeta);
      formData.append("csv", CSV);

      xhr.open("POST", url);

      xhr.send(formData);
      let formu = document.getElementById("formularioCompra");
      formu.classList.remove("error");
      MostrarViajes();
    } else {
      formu.classList.add("error");
    }
  }
}
