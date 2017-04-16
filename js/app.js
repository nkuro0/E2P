(function($){

    $('img.circleicon').click(function(){
        var id= $(this).parents('li.jeuglobal').attr('data-id');
        $('#modal-'+id).modal('show');
    })

})(jQuery);