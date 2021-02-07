

<?php

if ($adv != 0) {
    foreach ($adv as $advinfo) {
        if ($advinfo["size"] == "PERFECT_SQUARE") {
            ?>
            <div class="perfect_square_box_one" id="<?php echo "gma".$advinfo["rec_aid"]; ?>">
                <span class="click_createGroupPopUpCloseBtn gmaclose" gma="<?php echo $advinfo["rec_aid"]; ?>" style="margin:-10px 0 0 180px;"><h2>X</h2></span>
                <p class="perfect_square_middlecontent_box">
                    <a href="<?php echo $advinfo["url_for_redirection"];?>" <?php if ($advinfo["source_type"] == 'OUTSIDE_SYSTEM') {
                        echo 'target="_blank"';     }  ?> ><?php echo $advinfo["campaign_text"]; ?>  </a> </p>
                <img src="<?php if ($advinfo["uploaded_file_name"] && file_exists("assets/adv/" . $advinfo["uploaded_file_name"])) {
                        echo base_url() . "assets/adv/" . $advinfo["uploaded_file_name"];
                    } else {
                        echo base_url() . "assets/adv/one.jpg";
                    } ?>" />
            </div>
                    <?php
                } else if ($advinfo["size"] == "HALF_VERTICULAR") {
                    
                    ?>
            <div class="half_perfect_square_box_two" id="<?php echo "gma".$advinfo["rec_aid"]; ?>">
                <span class="click_createGroupPopUpCloseBtn gmaclose"  gma="<?php echo $advinfo["rec_aid"]; ?>"  style="margin:-10px 0 0 -20px;"><h2>X</h2></span>
                <div class="perfect_square_toptexture_bg"> 
                    <a href="<?php  echo $advinfo["url_for_redirection"];?>" <?php if ($advinfo["source_type"] == 'OUTSIDE_SYSTEM') {
                echo 'target="_blank"';
            } echo 'target="_blank"'; ?> >
            <?php echo $advinfo["campaign_text"]; ?> 
                    </a>
                </div>
                <img src="<?php if ($advinfo["uploaded_file_name"] && file_exists("assets/adv/" . $advinfo["uploaded_file_name"])) {
                echo base_url() . "assets/adv/" . $advinfo["uploaded_file_name"];
            } else {
                echo base_url() . "assets/adv/two.jpg";
            } ?>" />
            </div>
            <?php
        }
    }
}
?>


