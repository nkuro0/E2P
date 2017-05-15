(function($){

    $('img.circleicon').click(function(){
        var id= $(this).parents('li.jeuglobal').attr('data-id');
        $('#modal-'+id).modal('show');
    });


})(jQuery);

$('.menu .item')
    .tab();


$('.ui.rating')
    .rating({
        maxRating: 5,
        onRate: function (rating) {
            console.log(rating)
        }
    });






