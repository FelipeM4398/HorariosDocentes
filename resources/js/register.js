$(document).ready(function() {
    $('#isDocente').change(function() {
        if ($(this)[0].checked) {
            $('#docente').css('display', 'block');
            $('#isdocente').val('true');
        } else {
            $('#docente').css('display', 'none');
            $('#contrato').val('');
            $('#isdocente').val('false');
        }
    });
});
