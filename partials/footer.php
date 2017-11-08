
<div id="overlay" class="overlay"></div>

<?php
    $DOC_ROOT2 = $_SERVER['DOCUMENT_ROOT'].'/cyberfront';
    $DOC_ROOT = '//'.$_SERVER['HTTP_HOST'].'/cyberfront';
    // include $DOC_ROOT2.'/templates/popup/registration.popup.php';
?>
    <script src="<?php echo $DOC_ROOT?>/assets/js/libs.min.js"></script>
    <script src="<?php echo $DOC_ROOT?>/assets/js-libs/jquery-3.2.1.min.js"></script>
    <script src="<?php echo $DOC_ROOT?>/assets/js/app.js"></script>

    <script>
        // $.ajax({
        //     type: "GET",
        //     url: "http://95.213.187.204/spbcup/socket.php",
        //     data: "hello=helloworld",
        //     success: function(msg){
        //         console.log(msg);
        //     },
        //     error: function(err) {
        //         console.log(err);
        //     }
        // });
        
    $('#chatlogsubmit').click(function(e) {
        
        e.preventDefault();
        var formdata = $(this).parent().parent('form');
        // var data = formdata.serializeArray();
        
        // var dataString;
        // var chatlog;
        // for(var i = 0; i<data.length; i++) {
        //     dataString = data[i].value;
        // }

        // if(dataString.length > 0) {
        //     chatlog += "<p>" + dataString + "</p>";
        //     console.log(chatlog);
        // }

        var stringData = formdata.find('input').val();
        var data;
        if(formdata.find('input').val()) {
            var date = new Date();
            var timestamp = date.getHours() + ":" + date.getMinutes();
            var chatlogBody = formdata.parent().parent().parent().find('#chatlog-history');
            chatlogBody.after("<div class='chatlog-new'><article class='chatlog-mess' data-timestamp="+ timestamp +">" + stringData +"</article> <article class='chatlog-time'>" + timestamp +"</article> </div>");
            
            formdata.find('input').val(''); //Очищаем инпут поле
        }
    });

        $(document).ready(function() {
            $('[data-target-popup]').click(function() {
                var target = $(this).data('target-popup');
                var popup = $('[data-popup-name]').data('popup-name');
                
                $('.overlay').addClass('overlay--active');
                $('[data-popup-name="' + target + '"]').addClass('popup--active');
            });

            $('[data-popup-close], .overlay').click(function() {
                // var target = $(this).parent().parent().data('popup-name');
                $('.overlay').removeClass('overlay--active');
                $('[data-popup-close]').parent().parent().removeClass('popup--active');
            });
        });

        $(document).keydown(function(eventObject){
            if( eventObject.which == 27 ){
                /** Закрытие popup окна нажатием на ESC */
                $('.overlay').removeClass('overlay--active');
                $('[data-popup-close]').parent().parent().removeClass('popup--active');
            };
        });
    </script>
</body>
</html>
