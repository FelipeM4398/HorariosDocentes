function active(element) {
    element
        .parent()
        .prev()
        .css('border-radius', '0 0 50px 0');
    element
        .parent()
        .next()
        .css('border-radius', '0 50px 0 0');
    element.css('margin-left', '1.7rem').css('padding', '0.6rem 1rem');
}

function activeFirst() {
    if ($('.item:first a').hasClass('active')) {
        $('.user-container').css('border-radius', '0 50px 50px 0');
    } else {
        $('.user-container').css('border-radius', '0 50px 0 0');
    }
}

function activeLast() {
    if ($('.item:last a').hasClass('active')) {
        $('.logout').css('border-radius', '0 50px 0 0');
    } else {
        $('.logout').css('border-radius', 'unset');
    }
}

$(document).ready(function() {
    active($('a.active'));
    activeFirst();
    activeLast();

    $('.item a').on('mouseover', function() {
        if (
            $(this)
                .parent()
                .prev()
                .children()
                .hasClass('active')
        ) {
            $(this).css('border-top-right-radius', '70px');
        }

        if (
            $(this)
                .parent()
                .next()
                .children()
                .hasClass('active')
        ) {
            $(this).css('border-bottom-right-radius', '70px');
        }
    });
});
