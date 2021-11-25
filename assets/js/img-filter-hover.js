$(document).ready(function() {
    for (let i = 1; i <= 10; i++) {
        const cardId = '#card--' + i.toString();
        const imgId = '#img--' + i.toString();
        $(cardId).hover(
            function(e) {
                e.preventDefault();
                $(this).addClass('hover');
                $(imgId).addClass('img--hovered');
            }, function(e) {
                e.preventDefault();
                $(this).removeClass('hover');
                $(imgId).removeClass('img--hovered');
            }
        );
    }
});