function multiselect_docente() {
    $('.filter_docente').multiselect({
        enableFiltering: true,
        enableCaseInsensitiveFiltering: true,
        filterPlaceholder: 'Buscar un docente',
        templates: {
            ul:
                '<ul class="multiselect-container dropdown-menu width-120 docente"></ul>'
        },
        onChange: async function(option, checked, select) {
            //if ($(option).val() != '') {
            listAsignaturas($(option).val());
            //}
        }
    });
}

function multiselect_asignatura() {
    $('.filter_asignatura').multiselect({
        enableFiltering: true,
        enableCaseInsensitiveFiltering: true,
        filterPlaceholder: 'Buscar una asignatura',
        templates: {
            ul:
                '<ul class="multiselect-container dropdown-menu width-120 asignatura"></ul>'
        }
    });
}

function multiselect_grupo() {
    $('.filter_grupo').multiselect({
        enableFiltering: true,
        enableCaseInsensitiveFiltering: true,
        filterPlaceholder: 'Buscar un grupo',
        templates: {
            ul: '<ul class="multiselect-container dropdown-menu"></ul>'
        }
    });
}

function listDocentes() {
    $(document).on('change', '.periodo', async function() {
        if ($('#content-docente').children('span').length != 0) {
            $('#content-docente')
                .children('span')
                .remove();
            $('#content-docente').append(
                '<select name="docente" id="docente" class="form-control filter_docente docente">' +
                    '<option value="">Seleccione el docente</option>' +
                    '</select>'
            );
        }
        if ($(this).val()) {
            await $.ajax({
                type: 'GET',
                url: '/horarios/' + $(this).val() + '/docentes',
                success: function(data) {
                    if (data.length != 0) {
                        data.forEach(element => {
                            $('#docente').append(
                                '<option value="' +
                                    element.id_docente +
                                    '">' +
                                    element.nombres +
                                    ' ' +
                                    element.apellidos +
                                    '</option>'
                            );
                        });
                    }
                }
            });
            multiselect_docente();
        }
    });
}

async function listAsignaturas(id_docente) {
    await $.ajax({
        type: 'GET',
        url: '/horarios/' + id_docente + '/asignaturas',
        success: function(data) {
            $('#asignatura').html(
                '<option value="">Seleccione una asignatura</option>'
            );
            data.forEach(element => {
                $('#asignatura').append(
                    '<option value="' +
                        element.id_asignatura +
                        '">' +
                        element.codigo +
                        ' - ' +
                        element.nombre +
                        '</option>'
                );
            });
        }
    });
}

function listGrupos() {
    $(document).on('click', '#add_grupo', function() {
        $.ajax({
            type: 'GET',
            url: '/horarios/grupos',
            success: function(data) {
                var options = '<option>Seleccione un grupo</option>';
                data.forEach(element => {
                    options +=
                        '<option value="' +
                        element.id +
                        '">' +
                        element.nombre +
                        ' - ' +
                        element.sede.nombre +
                        ' - ' +
                        element.jornada_academica.nombre +
                        ' - ' +
                        element.programa.nombre;
                    ('</option>');
                });
                var grupo =
                    '<div class="form-group group-inputs-3 last-auto">' +
                    '<div>' +
                    '<select name="grupos[]" class="form-control filter_grupo">' +
                    options +
                    '</select>' +
                    '</div>' +
                    '<div>' +
                    '<input name="cantidad[]" class="form-control" type="number" placeholder="Ingrese la cantidad de estudiantes">' +
                    '</div>' +
                    '<div class="item-end">' +
                    '<button class="btn btn-danger remove" type="button"><i class="fas fa-minus-circle"></i></button>' +
                    '</div>' +
                    '</div>';
                $('#panel-groups').append(grupo);

                multiselect_grupo();
            }
        });
    });
}

function listDias() {
    $(document).on('click', '#add-dia', function() {
        $.ajax({
            type: 'GET',
            url: '/horarios/dias',
            success: function(data) {
                var dias = '<option>Seleccione un dia</option>';
                var frecuencias = '<option>Seleccione una frecuencia</option>';
                data.dias.forEach(element => {
                    dias +=
                        '<option value="' +
                        element.id +
                        '">' +
                        element.nombre +
                        '</option>';
                });
                data.frecuencias.forEach(element => {
                    frecuencias +=
                        '<option value="' +
                        element.id +
                        '">' +
                        element.nombre +
                        '</option>';
                });
                var dia =
                    '<div class="form-group group-inputs-5 last-auto">' +
                    '<div>' +
                    '<select name="dias[]" class="form-control dia" required>' +
                    dias +
                    '</select>' +
                    '</div>' +
                    '<div>' +
                    '<select name="frecuencias[]" class="form-control" required>' +
                    frecuencias +
                    '</select>' +
                    '</div>' +
                    '<div>' +
                    '<input type="time" name="horas[]" class="form-control" placeholder="Ingrese la hora de inicio" min="07:00" max="21:30" required>' +
                    '</div>' +
                    '<div>' +
                    '<input name="cantidad_horas[]" step="any" class="form-control" type="number" placeholder="Ingrese la cantidad de horas" required>' +
                    '</div>' +
                    '<div class="item-end">' +
                    '<button class="btn btn-danger remove" type="button"><i class="fas fa-minus-circle"></i></button>' +
                    '</div>' +
                    '</div>';
                $('#panel-dias').append(dia);
            }
        });
    });
}

function removeItems() {
    $(document).on('click', '.remove', function() {
        $(this)
            .parent()
            .parent()
            .remove();
    });
}

function loadDisponibilidad() {
    $(document).on('change', '.dia', async function() {
        if ($(this).val() && $('.docente').val() && $('.periodo').val()) {
            var inputHora = $(this)
                .parent()
                .next()
                .next()
                .children('input');
            var hora_inicio;
            var hora_fin;
            await $.ajax({
                type: 'GET',
                url:
                    '/horarios/dispo/' +
                    $('.periodo').val() +
                    '/' +
                    $('.docente').val() +
                    '/' +
                    $(this).val(),
                success: function(data) {
                    hora_inicio = data[0].jornada.hora_inicio;
                    hora_fin = data[data.length - 1].jornada.hora_fin;
                }
            });
            inputHora.val(hora_inicio);
            inputHora[0].min = hora_inicio;
            inputHora[0].max = hora_fin;
        }
    });
}

$(document).ready(function() {
    multiselect_grupo();
    listGrupos();
    listDias();
    removeItems();
    loadDisponibilidad();
    listDocentes();
});
