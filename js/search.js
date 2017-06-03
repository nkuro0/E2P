$(document).ready(function(){
    $(".recherche").keyup(function(){
        var recherche = $(this).val();
        var data = 'motclef=' + recherche;
        if(recherche.length>1){

            $.ajax({
                type: "GET",
                url: "actions/result.php",
                data: data,
                success: function (server_response) {
                    $(".results").hide().html(server_response).fadeIn([200]);
                }
            });
        }
    });
});





