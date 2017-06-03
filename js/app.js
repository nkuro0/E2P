$(document).ready(function() {

    $('img.circleicon').click(function () {
        var id = $(this).parents('li.jeuglobal').attr('data-id');
        $('#modal-' + id).modal('show');
    });

    $('.ui.sidebar').first().sidebar('attach events', '.toggle.button');

    $('.toggle.button')
        .removeClass('disabled');

    $('.tabular.menu .item').tab();

    $('.ui.dropdown')
        .dropdown({});

    $(".envoiAvis").hide();

    $("#show").click(function () {
        $(".envoiAvis").toggle(function (e) {
            if ($(this).is(":visible")) {
                $(".envoiAvis").show();
            }
            else {
                $(".envoiAvis").hide();
            }
        });
    });

});














