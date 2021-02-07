
<style>
     .oneshop_Snapclass{
	cursor: pointer;
	float: right;
	position: absolute;
	margin: -15px 0 0 470px;
	background-color: #333;
	border: solid 1px white;
	font: 12px Arial;
	color: white;
	box-shadow: 0 0 5px #555;
	padding: 6px 0px 2px 8px;
	width: 17px;
	height: 17px;
	border-radius: 15px;
	}

/* pop3 */

.oneshop_Snapclass {
    margin: 55px 0 0 540px; 
}
    .snap_edit_wrap {
        margin: 0px 0 50px 0px;
        width: 480px;
        float:left;
        height:280px;
        border: #555 solid thin;
    }
    .snap_edit_wrap img {
        border: 1px solid #ccc;
        margin: 0px 0px 0px 0px;
        width: 480px;
        height:350px;
    }
    .oneshop_paybook_yesorno_buttons {
    margin-top: 260px;
    margin-left: -420px;
   /*// padding: 20px 0 0;*/
    text-align: center;
    width: 400px;
    float: left;
}
.snapbuzz_pic {
	
	width:635px;
        margin: 50px 0px 0px 300px;
	float:left;}

</style>

<div class="buzdes_left_container snapbuzz_pic">
    <p class="oneshop_Snapclass" onClick="toggle_addCommentVisibility('buzdes_snapbuz')">X</p>
    <form id="buzzdev_submit" enctype="multipart/form-data">
    <div class="snappreview_box">

<div class="fll mab10 wi100pstg">
<h1 class="acenter normal fs18"> Customize Your Snaps Here!  </h1>
</div>

<div class="fll mab10 wi100pstg">
<p class="fll wi100pstg"> Caption </p>
<p class="fll">
<textarea class="buzdes_caption_box" rows="" cols="" id="buzsnap_caption" name="buzsnap_caption"></textarea>
</p>
</div>
<div class="snap_edit_wrap">
    <img src="#" title="New Buzz" id="Buzz_devsnap" name="Buzz_devsnap" alt="icon">
</div>

<div class="oneshop_paybook_yesorno_buttons">
    <p  class="fll"> <input type="file" style="margin-top: 30px;" name="buzzdev_snapQuic" id="buzzdev_snapQuic" class="button_new" ></p>
    <p  class="flr"> <input type="submit" style="margin-top: 30px;" name="buzzdev_snapsubmit" id="buzzdev_snapsubmit" class="button_new" value="Submit"></p>
</div>


</div>  
            
    </form>          
            	
    
    
    </div>

<script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#Buzz_devsnap').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#buzzdev_snapQuic").change(function () {
        readURL(this);
    });
  
</script>
