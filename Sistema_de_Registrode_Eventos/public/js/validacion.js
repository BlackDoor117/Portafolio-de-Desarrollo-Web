function validarFormulario() {
var nombre = document.getElementById('nombre').value;
var email = document.getElementById('email').value;
var telefono = document.getElementById('telefono').value;
if (nombre === '' || email === '' || telefono === '') {
alert('Por favor, completa todos los campos.');
return false; // Evita que se envíe el formulario
}
 // Envía el formulario si todos los campos están completos
return true;
}