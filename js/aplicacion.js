/* JAVASCRIPT APP */

//let url_consultas = "http://localhost/api-reaccion/login.php";
let url_consultas = "http://localhost/visorHacienda/backend/consultas.php";
let formulario_consulta = document.querySelector("#consulta_cedula");
let resultados1 = document.querySelector("#div_resultados");

formulario_consulta.addEventListener("submit", function consultar(e) {
  e.preventDefault();

  let datosFormulario = new FormData(formulario_consulta);

  let datos = {
    cedula: datosFormulario.get("cedula"),
  };

  console.log("Datos enviados");
  console.log(datos);

  fetch(url_consultas, {
    method: "POST",
    body: JSON.stringify(datos),
    headers: {
      "Content-Type": "application/json",
    },
  })
    .then((res) => res.json())
    .then((data) => {
      /* Resultados de la consulta */
      console.log(data);

      if (data.resultados.predial > 0) {
        let propietario = data.predial[0].Porpietario;
        let cantidad_propiedades = data.resultados.predial;
        resultados1.innerHTML = `<p>
        <h4>Nombre Contribuyente: </h4><span id="nombre_usuario">${propietario}</span>
        <h4>Cantidad propiedades registradas: </h4><span id="nombre_usuario">${cantidad_propiedades}</span>
      </p>`;
      }

      //Imprime los resultados de pandemia

      if (data.resultados.pandema > 0) {
        let datos = data.pandema;
        datos.map((elemento) => {
          let datosDiv = document.querySelector("#resultados_pandemia");
          datosDiv.innerHTML = `
            <div>
              <p>Apellidos: ${elemento.apellidos}</p>
              <p>Cédula: ${elemento.cedula}</p>
              <p>Dirección de residencia: ${elemento.direccion_residencia}</p>
              <p>Nombres: ${elemento.nombres}</p>
              <p>Teléfono: ${elemento.telefono}</p>
            </div>
          `;
        });
      }
    });
});
