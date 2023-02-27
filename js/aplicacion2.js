//var url = "http://localhost/visorHacienda/backend/consultas2.php";
//let url_consultas = "http://localhost/visorHacienda/backend/consultas.php";

var url = "http://localhost/visorHacienda/backend/consultas.php";
var formulario = document.querySelector("#miFormulario");

formulario.addEventListener("submit", function (event) {
  event.preventDefault();

  var datosFormulario = new FormData(formulario);

  var datosJson = {
    cedula: datosFormulario.get("nombre"),
  };

  /* var datosJson = {
    nombre: datosFormulario.get("nombre"),
    apellido: datosFormulario.get("apellido"),
    email: datosFormulario.get("email"),
  }; */

  fetch(url, {
    method: "POST",
    body: JSON.stringify(datosJson),
    headers: {
      "Content-Type": "application/json",
    },
  })
  .then((res) => res.json())
  .then((data) => {
    console.log(data);
  });
});
