
/* JAVASCRIPT APP */

let url_consultas = "http://localhost/visorHacienda/backend/consultas.php";

let cedula = document.querySelector('#cedula');
let resultado = document.querySelector('#resultado');
let formulario_consulta = document.querySelector("#consulta_cedula")


formulario_consulta.addEventListener('submit', consultar);


function consultar(e) {
    e.preventDefault();

    let datos = {
        cedula: cedula.value
    }

    console.log(datos);

    fetch(url_consultas, {
        method: 'POST',
        headers: {
            'Accept': 'application/json',
            'Content-Type': 'application/json'
          },
        body: JSON.stringify(datos)
    })
        .then(res => res.json())
        .then(data => {
            console.log(data);
        })

}


