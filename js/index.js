//const nombreHtml = document.getElementById('nombre');
const nombreHtml = document.querySelector('#nombre');
const apellidoHtml = document.querySelector('#apellido');
const correoHtml = document.getElementById('correo');
const usuarioHtml = document.querySelector('#usuario');
const contrasenaHtml = document.querySelector('#contrasena');
const roleHtml = document.querySelector('#role');
const telefonoHtml = document.getElementById('telefono');
/* const clases = document.getElementsByClassName('telefono');
const elementos = document.getElementsByTagName('div'); */
//const enlaces = document.querySelectorAll('.navegacion a');
const formulario = document.getElementById('formulario');

const datos = {
    nombre: '',
    apellido: '',
    correo: '',
    usuario: '',
    contrasena: '',
    role: '',
    telefono: ''
}

nombreHtml.addEventListener('input', leerDatos);
apellidoHtml.addEventListener('input', leerDatos);
correoHtml.addEventListener('input', leerDatos);
usuarioHtml.addEventListener('input', leerDatos);
contrasenaHtml.addEventListener('input', leerDatos);
roleHtml.addEventListener('input', leerDatos);
telefonoHtml.addEventListener('input', leerDatos);

addEventListener('load', chequearUsuario);

function chequearUsuario() {
    var user = getCookie("nombre");
    if (user != "") {
        mostrarAlertas("Bienvenido de nuevo " + user);
    }
}

formulario.addEventListener('submit', function(evento) {
    //evento.preventDefault();

    /*     if (nombreHtml.value != '') {
            console.log(nombreHtml.value);
        } else {
            alert('Favor digite el usuario');
        } */

    const {usuario, correo, contrasena} = datos;

    if (usuario != '') {
        setCookie('usuario', usuario, 30);
    } else {
        mostrarAlertas('El campo de usuario es obligatorio', true);
    }

    if (correo != '') {
        localStorage.setItem('correo', correo);
    } else {
        mostrarAlertas('El campo de correo es obligatorio', true);
    }

    if (contrasena != '') {
        sessionStorage.contrasena = constrasena;
    } else {
        mostrarAlertas('El campo de telefono es obligatorio', true);
    }

    return true;
});



function leerDatos(evento) {
    datos[evento.target.id] = evento.target.value;
}

function mostrarAlertas(mensaje, error = null) {
    const alerta = document.createElement('P');
    alerta.textContent = mensaje;

    if (error) {
        alerta.classList.add('error');
    } else {
        alerta.classList.add('correcto');
    }

    formulario.appendChild(alerta);

    setTimeout(() => {
        alerta.remove();
    }, 5000);
}