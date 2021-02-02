<?php 
    foreach($campaigns as $res){
        if($res == '')
        {
            unset($res);
        }
       if($res){?>
        <div class="adds_BannerCloseBtn">
        <img src="<?php echo base_url() . "assets/"; ?>images/addsCloseBtn.png" class="adds_closeBtnImg" title="Close ad">
            <div class="adds_closeOptions">
                <h5>Report this Ad</h5>
                    <ul>
                        <li class="close_banner_ad" id="1">Not Interested</li>
                        <li class="close_banner_ad" id="2">Irrelevant</li>
                        <li class="close_banner_ad" id="3">Repetitive</li>
                    </ul>
            </div>
        </div>
        <div class="adds_bannerContainer">
            <img src="<?php echo ONENETWORKURL ."data/".$adtype."/".$res['file_path'];?>" class="adds_banner" id="<?php echo $res['campaign_id'];?>">
        </div>
    <?php } } ?>
