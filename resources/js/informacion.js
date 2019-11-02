function habilitar() {
    $('#identificacion').prop('disabled', false);
    $('#nombres').prop('disabled', false);
    $('#apellidos').prop('disabled', false);
    $('#email').prop('disabled', false);
    $('#telefono').prop('disabled', false);
    $('#contrato').prop('disabled', false);
    $('#codigo').prop('disabled', false);
    $('#creditos').prop('disabled', false);
    $('#año').prop('disabled', false);
    $('#periodo').prop('disabled', false);
    $('#programa').prop('disabled', false);
    $('#jornada').prop('disabled', false);
    $('#sede').prop('disabled', false);
    $('#direccion').prop('disabled', false);
    $('#decano').prop('disabled', false);
}

function deshabilitar() {
    $('#identificacion').prop('disabled', true);
    $('#nombres').prop('disabled', true);
    $('#apellidos').prop('disabled', true);
    $('#email').prop('disabled', true);
    $('#telefono').prop('disabled', true);
    $('#contrato').prop('disabled', true);
    $('#codigo').prop('disabled', true);
    $('#creditos').prop('disabled', true);
    $('#año').prop('disabled', true);
    $('#periodo').prop('disabled', true);
    $('#programa').prop('disabled', true);
    $('#jornada').prop('disabled', true);
    $('#sede').prop('disabled', true);
    $('#direccion').prop('disabled', true);
    $('#decano').prop('disabled', true);
}

function habilitarProgrma() {
    $('#nombre').prop('disabled', false);
    $('#tipo_programa').prop('disabled', false);
    $('#duracion').prop('disabled', false);
    $('#descripcion').prop('disabled', false);
    $('#director').prop('disabled', false);
    $('#modalidad').prop('disabled', false);
    $('#facultad').prop('disabled', false);
}

function deshabilitarProgrma() {
    $('#nombre').prop('disabled', true);
    $('#tipo_programa').prop('disabled', true);
    $('#duracion').prop('disabled', true);
    $('#descripcion').prop('disabled', true);
    $('#director').prop('disabled', true);
    $('#modalidad').prop('disabled', true);
    $('#facultad').prop('disabled', true);
}

$(document).ready(function() {
    $('#editar').click(function() {
        habilitar();
        habilitarProgrma();
        $('#cancelar').removeClass('hidden');
        $('#cambios').removeClass('hidden');
        $('#editar').addClass('hidden');
    });
    $('#cancelar').click(function() {
        deshabilitar();
        deshabilitarProgrma();
        $('#editar').removeClass('hidden');
        $('#cambios').addClass('hidden');
        $('#cancelar').addClass('hidden');
    });
});
