function habilitar() {
    $('#identificacion').prop('disabled', false);
    $('#nombres').prop('disabled', false);
    $('#apellidos').prop('disabled', false);
    $('#email').prop('disabled', false);
    $('#telefono').prop('disabled', false);
    $('#contrato').prop('disabled', false);
}

function deshabilitar() {
    $('#identificacion').prop('disabled', true);
    $('#nombres').prop('disabled', true);
    $('#apellidos').prop('disabled', true);
    $('#email').prop('disabled', true);
    $('#telefono').prop('disabled', true);
    $('#contrato').prop('disabled', true);
}

$(document).ready(function() {
    $('#editar').click(function() {
        habilitar();
        $('#cancelar').removeClass('hidden');
        $('#cambios').removeClass('hidden');
        $('#editar').addClass('hidden');
    });
    $('#cancelar').click(function() {
        deshabilitar();
        $('#editar').removeClass('hidden');
        $('#cambios').addClass('hidden');
        $('#cancelar').addClass('hidden');
    });
});
