$(document).ready(function() {


    $('#regbutton').click(function(e) {
        e.preventDefault();
        var formdata = $(this).parent().parent('form');
        $.ajax({
            type: "POST",
            url: "/regist.php",
            data: formdata,
            success: function(msg){
                
            }
        });
    });

    $('#logbutton').click(function(e) {
        e.preventDefault();
        var formdata = $(this).parent().parent('form');
        $.ajax({
            type: "GET",
            url: "/autorize.php",
            data: formdata,
            success: function(msg){
                
            }
        });
    });

});