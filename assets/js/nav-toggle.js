$(document).ready(function() {
    $('.toggler').on('click', function(e) {
        e.preventDefault();
        $(this).toggleClass('toggled');
        $('.mainNav').toggleClass('expanded');
        $('.main').toggleClass('menu-expanded');
    });
});