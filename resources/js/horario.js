$(document).ready(function() {
    $('#asig_compartida').multiselect({
        nonSelectedText: 'Seleccione las asignaturas compartidas',
        enableFiltering: true,
        enableCaseInsensitiveFiltering: true,
        buttonWidth: '100%',
        filterPlaceholder: 'Buscar una asignatura'
    });

    $('#escompartida').change(function() {
        if ($(this)[0].checked) {
            $('#container-compartida').css('display', 'block');
        } else {
            $('#container-compartida').css('display', 'none');
            $('#asig_compartida')[0].v;
        }
    });

    $('.filter_docente').multiselect({
        enableFiltering: true,
        enableCaseInsensitiveFiltering: true,
        filterPlaceholder: 'Buscar un docente',
        templates: {
            ul:
                '<ul class="multiselect-container dropdown-menu width-120"></ul>'
        }
    });

    $('.filter_asignatura').multiselect({
        enableFiltering: true,
        enableCaseInsensitiveFiltering: true,
        filterPlaceholder: 'Buscar una asignatura',
        templates: {
            ul:
                '<ul class="multiselect-container dropdown-menu width-120"></ul>'
        }
    });
});
