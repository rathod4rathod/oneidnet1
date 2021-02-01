<?php

session_start();

if (($_SESSION["vuser"])) {
    $array = ["0" => "manasa", "1" => "venkatesh", "2" => "pavani", "3" => "shiva.jyothi", "4" => "suresh","5"=>"danish","6"=>"raju","7"=>"sayyed.ali","8"=>"jaime.matrinez","9"=>"meeta.josi"];
    foreach ($array as $key => $val) {
        if ($_SESSION["vuser"] != $array[$key]) {
            echo "<button  class='cp' id='" . $key . "' style='color:green;cursor:pointer;'>" . $array[$key] . "</button>";
        } else {
            echo "<input type='hidden' id='currentuser' value='" . $key . "'>";
        }
    }
    ?>
    <script src="https://rtcmulticonnection.herokuapp.com/dist/RTCMultiConnection.min.js"></script>
    <script src="https://rtcmulticonnection.herokuapp.com/socket.io/socket.io.js"></script>
    <script src="https://www.oneidnet.com/assets/js/jquery-1.11.2.min.js"></script>

    <div id="local">
        <h1>Local</h1>
    </div>

    <div id="remote">


    </div>



    <script>
        var $container = $('#container');
        var connection = new RTCMultiConnection();

        connection.autoCloseEntireSession = false;
        connection.socketURL = 'https://rtcmulticonnection.herokuapp.com:443/';

        connection.session = {
            video: true,
            audio: true
        };

        connection.sdpConstraints.mandatory = {
            OfferToReceiveAudio: true,
            OfferToReceiveVideo: true
        };

        var local = document.getElementById("local");
        var remote = document.getElementById("remote");
        connection.onstream = function (ev) {
            var video = ev.mediaElement;
            if (ev.type === 'local') {
                local.appendChild(video);
            }
            if (ev.type === 'remote') {
                remote.appendChild(video);
            }

        };

        $(".cp").click(function () {
			
            var id=$(this).attr("id"), currentuser=$("#currentuser").val(), roomname="";
            if(id>currentuser){
                roomname=id+"#"+currentuser;
            }else{
                roomname=currentuser+"#"+id;
            }

            connection.openOrJoin(roomname);
        });
    </script>

    <?php

} else {
    header('Location: '.base_url()."home/chatlogin");
}
?>

