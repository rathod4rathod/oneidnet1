<div class="snapshots_leftbox mat20">
    <?PHP foreach ($quick_img as $quick_img) {
    // print_r($quick_img);
       $data= explode('/', $quick_img['pics_url']);
    $str= $data[0];
    if($str=='quick_pics'){?>

        <div class="over_photo"> 
            <input type="hidden" id="imgid"  name="imgid" value="<?PHP echo $quick_img['rec_aid']; ?>"/>
            <input type="radio" onclick="quickPic(this.value)" name="imgid" id="imagid"<?php if (isset($imgid) && $imgid==$quick_img['rec_aid']) echo "checked";?>value="<?PHP echo $quick_img['rec_aid']; ?>">
            <span class="overphoto_Wrapper"><img class="oneshop_curencyConvertor" src="http://localhost/buzzin/<?php echo $quick_img['pics_url']; ?>"></span>
            <div style="display: none;" class="click_photoOptionsbooks">   <h5 class="fll fs14 bold"> Like </h5> <h5 class="flr normal"> 2,450 </h5></div>
        </div>
    <?PHP }} ?>
    <p class="flr" style="display: none;" ><a href="javascript: void(0)" >  <input type="submit" value="Apply" id="buzz_img_onenetdev" class="button_new" name="formpost"></a></p>

</div>
<script>
   
</script>