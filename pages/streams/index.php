
<?php include "../../partials/header.php"; ?>
<?php

$DOC_ROOT2 = $_SERVER['DOCUMENT_ROOT'].'/cyberfront';
$DOC_ROOT = '//'.$_SERVER['HTTP_HOST'].'/cyberfront';
?>

<main class="main">
    <div class="row chatlog-content">
        <div class="col s6">
            <!-- <div class="fp-Video">
                <div id="localVideo" class="display"></div>
                <video autoplay></video>
            </div> -->
            <video autoplay id="vid" style="display:none;"></video>
            <canvas id="canvas" width="640" height="480" style="border:1px solid #d3d3d3;"></canvas><br>
            <button onclick="startBroadcasting()">Start Broadcasting</button>
            <button onclick="stopBroadcasting()">Stop Broadcasting</button>
        </div>
        <div class="col s6">
            
                <!-- <div class="text-center" style="margin-top: 20px">
                    <div id="publishStatus"></div>
                    <div id="publishInfo"></div>
                </div> -->

            <div class="chatlog row">
                <form id="chatlog-form" method="POST">
                    <div class="col s8">
                        <input type="text" autofocus name="chatlog" placeholder="Сообщение" id="chatlog" />
                    </div>
                    <div class="col s4">
                        <button type="submit" id="chatlogsubmit" name="chatlogsubmit" class="waves-effect waves-light btn">Отправить</button>
                    </div>
                </form>
            </div>
            
            <div id="chatlog-history" class="chatlog-history">

                </div>
        </div>
    </div>
</main>
<script>
    // navigator.getUserMedia = navigator.webkitGetUserMedia || navigator.mozGetUserMedia;
    // var permissions = { audio: true, video: true }; 

    // navigator.getUserMedia(permissions, gotStream, streamError);

    // function gotStream(stream) {
    //     var videoElement = document.querySelector('video');
    //     videoElement.src = URL.createObjectURL(stream);
    // }

    // function streamError(error) {
    //     console.log(error);
    // }
</script>
<script src="<?php echo $DOC_ROOT?>/assets/js-libs/socket.io.js"></script>
<script>
//   var socket = io('http://95.213.187.204/spbcup/socket.php');
//   socket.on('connect', function(req, res){
//     // res.writeHead(200, {
//     //   /// ...
//     //     'Access-Control-Allow-Origin' : '*',
//     //     'Authorization': 'Basic ' + $.base64.encode('lin.dmitriy@ordotrans.ru:2IDBOa'), 
//     //     'Content-Type': 'application/json'
//     // });
//     //   console.log('connect');
    
//     console.log(req, res);
//   });
//   socket.on('event', function(data){
//       console.log(data);
//   });
//   socket.on('disconnect', function(){});
    // var socket = new WebSocket("ws://echo.websocket.org");
    // socket.onopen = function() {
    //     console.log("open socket");
    // };
    var video = document.querySelector("#vid"),
       canvas = document.querySelector('#canvas'),
       ctx = canvas.getContext('2d'),
       localMediaStream = null,
       onCameraFail = function (e) {
            console.log('Camera did not work.', e); // Исключение на случай, если камера не работает
        };
       navigator.getUserMedia = navigator.getUserMedia || navigator.webkitGetUserMedia || navigator.mozGetUserMedia || navigator.msGetUserMedia;
        window.URL = window.URL || window.webkitURL;
        navigator.getUserMedia({video: true}, function(stream) {
            video.src = window.URL.createObjectURL(stream);
            localMediaStream = stream;
        }, onCameraFail);

        cameraInterval = setInterval(function(){ snapshot();}, 1);
        function snapshot(){
            if(localMediaStream){
                    ctx.drawImage(video, 0, 0);
                }
        }
        var isBroadcasting = false,
            broadcastingTimer;
        function sendSnapshot(){
            if(localMediaStream && !isBroadcasting){
                isBroadcasting = true;
                        $.post("xn--80aaaa5acqd3dhkdo4j.xn--p1ai/",
                    {
                        p: "new",
                        text: ctx.canvas.toDataURL("image/webp", 1) // quality - качество изображения(float)
                    },
                    function(result){
                        console.log(result); // На случай, если что-то пойдёт не так
                        isBroadcasting = false;
                    }
                );
            }
        }
        // И добавим обработчики кнопок начала и завершения вещания
        function startBroadcasting(){
            broadcastingTimer = setInterval(sendSnapshot, 1);
        }
        function stopBroadcasting(){
            clearInterval(broadcastingTimer);
        }


        
    
</script>
<script src="<?php echo $DOC_ROOT?>/assets/js/flashphoner.js"></script>
<?php include "../../partials/footer.php"; ?>
