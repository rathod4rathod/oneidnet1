 <script src="<?php echo base_url().'assets/js/sloganChange.js'?>"></script>
<script>
    var myAudio = document.getElementById("regdes_myBgMusic");
    function myBgAudio(){
        if (myAudio.paused){
            myAudio.play();
			$("regdes_play_btn").attr("src", "<?php echo base_url().'assets/Images/equilizer.gif'?>");}
        else{
            myAudio.pause();
			$("regdes_play_btn").attr("src", "<?php echo base_url().'assets/Images/equilizerpaused.png'?>");}
        }
</script> 

</body>
</html>