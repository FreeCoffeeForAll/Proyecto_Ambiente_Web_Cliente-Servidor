const formulario = document.getElementById('formulario');

formulario.addEventListener('submit', function(evento) {
    var retorno = false;
    try {
        if (confirm("¿Está segura(o) que desea eliminar la persona?")) {
            setCookie('usuario', '', -1);
            localStorage.removeItem('correo');
            sessionStorage.removeItem('contrasena');
            retorno = true;
        }
    } catch (error) {
        retorno = false;
    }
    return retorno;
});