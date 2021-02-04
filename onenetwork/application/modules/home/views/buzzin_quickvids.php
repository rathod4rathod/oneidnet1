<?php
if ($bqvids != 0) {
    foreach ($bqvids as $bqvidsinfo) {
        ?>
<input type="radio" onclick="quickVideo(this.value)" name="imgid" id="imagid"<?php if (isset($vidid) && $imgid==$bqvidsinfo['rec_aid']) echo "checked";?>value="<?PHP echo $bqvidsinfo['rec_aid']; ?>" style="margin: 10px 0px 0px -100px">
        <div class="over_photo">
          
            <span class="overphoto_Wrapper"><img bquid="<?php echo $bqvidsinfo["rec_aid"]; ?>" class="bquid" src="<?php echo"http://localhost/buzzin/buzzin_quick_vids/vidsthumbnail/" . $bqvidsinfo["pics_url"]; ?>" class="oneshop_curencyConvertor"></span>
            <div class="click_photoOptionsbooks" style="display: none;">
                <h5 class="fll fs14 bold qvidl"  qvidl="<?php echo $bqvidsinfo["rec_aid"]; ?>"> Like </h5> 
                <h5 class="flr normal"> <?php echo $bqvidsinfo["likes_count"]; ?> </h5></div>
        </div>
        <?php
    }
    ?>
    <script>
        $('.over_photo').hover(
                function () {
                    $(this).find('.click_photoOptionsbooks').fadeIn(300);
                },
                function () {
                    $(this).find('.click_photoOptionsbooks').fadeOut(20);
                }
        );


    </script>
    <?php
}else{
    echo '<h2>buzzin quick video not found</h2>';
}