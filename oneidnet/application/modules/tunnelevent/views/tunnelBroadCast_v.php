<!doctype html>
<?php

//print_r($tunnelvideo_suggetion);
?>
<html>
<head>
<meta charset="utf-8">
<title>tunnelBroadCasting</title>
<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/tunnelTumbnailStyle.css'?>">
<script type="text/javascript">
	/*function playVideo(id){
           
	var video = document.getElementById("video"+id);
	var plyBtn = document.getElementById("playButton");		
		if(video.paused){
			video.play();}
		else{
			video.pause();}
		}*/
               
        var currentPlayer;
        function playVideo(id) {
         var videoid='video'+id;
         var thissound=document.getElementById(videoid);
         if(currentPlayer  && currentPlayer != thissound) {
              currentPlayer.pause(); 
         }
         if (thissound.paused)
               thissound.play();
       else
           thissound.pause();
           thissound.currentTime = 0;
            currentPlayer = thissound;
 }
 </script>

</head>

<body>
     <?php  foreach($tunnelvideo_suggetion as $video){?>
    <div id="tunnelTumbnailWrapper">
    

	<img src="<?php echo base_url().'assets/Images/play-btn.png'?>" class="playBtn" onClick="playVideo(<?php echo $video['rec_id']; ?>)">
	<div class="videoBroadCasting">
           
	    <video class="videoStyle" id="<?php echo 'video'.$video['rec_id']; ?>">
  			<source src="<?php echo 'http://'. $_SERVER['HTTP_HOST'].'/tunnel/'.$video['video_path']?>" type="video/mp4">
			<!--<source src="nature.ogg" type="video/ogg">-->
			Your browser does not support the video tag.
		</video>
          
    </div>
         
<!--    <div class="videoDiscription">
    	<h2>Hi guys how are you Your browser does not support the video tag.
        Your browser does not support the video tag.</h2>
    </div>-->

    
</div>
     <?php } ?>
</body>
</html>
