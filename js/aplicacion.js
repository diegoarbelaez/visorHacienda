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
        <h3>Valor de la Deuda:</h3><h3><span>$${parseInt(data.resultados.valordeuda).toLocaleString()}</span></h3>
      </p>`;
      }



      //Meter los telefonos de Permisos
      if (data.resultados.permisos > 0) {
        let datos = data.permisos
        let datosDivTelefonos = document.querySelector("#resultados_telefonos");
        let datosDivDirecciones = document.querySelector("#resultados_direcciones");
        datos.map((elemento) => {
          datosDivTelefonos.innerHTML += `
            <div class="inbox-item" >
              <p class="inbox-item-author">Telefono: ${elemento.telefono}</p>
            </div>
          `;
        });
        datos.map((elemento) => {
          datosDivDirecciones.innerHTML += `
            <div class="inbox-item">
              <p class="inbox-item-author">Dirección: ${elemento.direccion_residencia}</p>
            </div>
          `;
        });
      }


      //Meter los telefonos de Emsanar
      if (data.resultados.emsanar > 0) {
        let datos = data.emsanar
        let datosDivTelefonos = document.querySelector("#resultados_telefonos");
        let datosDivDirecciones = document.querySelector("#resultados_direcciones");
        datos.map((elemento) => {
          datosDivTelefonos.innerHTML += `
            <div class="inbox-item" >
              <p class="inbox-item-author">Telefono: ${elemento.TELEFONO}</p>
            </div>
          `;
        });
        datos.map((elemento) => {
          datosDivDirecciones.innerHTML += `
            <div class="inbox-item">
              <p class="inbox-item-author">Dirección: ${elemento.DIRECCION}</p>
            </div>
          `;
        });
      }



      //Meter los telefonos de Pandemia
      if (data.resultados.pandemia > 0) {
        let datos = data.pandemia
        let datosDivTelefonos = document.querySelector("#resultados_telefonos");
        let datosDivDirecciones = document.querySelector("#resultados_direcciones");
        datos.map((elemento) => {
          datosDivTelefonos.innerHTML += `
            <div class="inbox-item" >
              <p class="inbox-item-author">Telefono: ${elemento.telefono}</p>
            </div>
          `;
        });
        datos.map((elemento) => {
          datosDivDirecciones.innerHTML += `
            <div class="inbox-item">
              <p class="inbox-item-author">Dirección: ${elemento.direccion}</p>
            </div>
          `;
        });
      }


      //Meter los resultados de sus propiedades
      if (data.resultados.predial > 0) {

        //Formatear los valores
        const opcionesFormato = {
          style: "currency",
          currency: "COP",
          minimumFractionDigits: 2,
          useGrouping: true,
          currencyDisplay: "symbol",
        };

        let contador_propiedades = 0;
        let datos = data.predial
        let datosDivPropiedades = document.querySelector("#resultados_propiedades");
        datos.map((elemento) => {

          let avaluo = parseInt(elemento["Avaluo Actual"]).toLocaleString("es-ES",opcionesFormato);
          console.log(avaluo);

          datosDivPropiedades.innerHTML += `
          <div class="col-6">
          <h4>Datos de la Propiedad ${++contador_propiedades}</h4>
          <address>
          <span class="text-danger">Area Construida:</span> ${elemento["Area Construida"]}<br>
          <span class="text-danger">Area Metros:</span> ${elemento["Area Metros"]}<br>
          <span class="text-danger">Avaluo Actual:</span> ${avaluo}<br>
          <span class="text-danger">Descuento Periodo:</span> ${parseInt(elemento["Descuento Periodo"]).toLocaleString()}<br>
          <span class="text-danger">Descuento Vigencia:</span> ${parseInt(elemento["Descuento Vigencia"]).toLocaleString()}<br>
          <span class="text-danger">Deuda Periodo:</span> ${parseInt(elemento["Deuda Periodo"]).toLocaleString()}<br>
          <span class="text-danger">Deuda Vigencia:</span> ${parseInt(elemento["Deuda Vigencia"]).toLocaleString()}<br>
          <span class="text-danger">Direccion:</span> ${elemento["Direccion"]}<br>
          <span class="text-danger">Fecha Elaboracion:</span> ${elemento["Fecha Elaboracion"]}<br>
          <span class="text-danger">Fecha Vencimiento:</span> ${elemento["Fecha Vencimiento"]}<br>
          <span class="text-danger">Ficha Catastral:</span> ${elemento["Ficha Catastral"]}<br>
          <span class="text-danger">No Factura:</span> ${elemento["No Factura"]}<br>
          <span class="text-danger">No Identificacion:</span> ${elemento["No Identificacion"]}<br>
          <span class="text-danger">Periodo Inicial Deuda:</span> ${elemento["Periodo Inicial Deuda"]}<br>
          <span class="text-danger">Porpietario:</span> ${elemento["Porpietario"]}<br>
          <span class="text-danger">Predial 2023:</span> ${parseInt(elemento["Predial 2023"]).toLocaleString()}<br>
          <span class="text-danger">Tipo Documento:</span> ${elemento["Tipo Documento"]}<br>
          <span class="text-danger">Total 2018:</span> ${parseInt(elemento["Total 2018"]).toLocaleString()}<br>
          <span class="text-danger">Total 2019:</span> ${parseInt(elemento["Total 2019"]).toLocaleString()}<br>
          <span class="text-danger">Total 2020:</span> ${parseInt(elemento["Total 2020"]).toLocaleString()}<br>
          <span class="text-danger">Total 2021:</span> ${parseInt(elemento["Total 2021"]).toLocaleString()}<br>
          <span class="text-danger">Total 2022:</span> ${parseInt(elemento["Total 2022"]).toLocaleString()}<br>
          <span class="text-danger">Total 2023:</span> ${parseInt(elemento["Total 2023"]).toLocaleString()}<br>
          <span class="text-danger">Total Anterior 2018:</span> ${parseInt(elemento["Total Anterior 2018"]).toLocaleString()}<br>
          <span class="text-danger">Uso:</span> ${elemento["Uso"]}<br>
          <span class="text-danger">Valor a Pagar Periodo:</span> ${parseInt(elemento["Valor a Pagar Periodo"]).toLocaleString()}<br>
          <span class="text-danger">Valor a Pagar Vigencia:</span> ${parseInt(elemento["Valor a Pagar Vigencia"]).toLocaleString()}<br>
          </address>
      </div>
          `;
        });
        datos.map((elemento) => {
          datosDivDirecciones.innerHTML += `
            <div class="inbox-item">
              <p class="inbox-item-author">Dirección: ${elemento.direccion}</p>
            </div>
          `;
        });
      }



    });
});
