$(document).ready(function() {
    console.log($('#isdocente')[0].value);
    $('#isDocente').change(function() {
        console.log($(this)[0].checked);
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
