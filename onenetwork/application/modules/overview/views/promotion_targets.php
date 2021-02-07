<?php
//print_r($promotions_data);
//print_r($targets_data);
$today_date=date("M d, Y");
$current_time=time();
if($promotions_data!=0){    
    $promotion_start=explode(" ",$promotions_data[0]["promotion_start_time"]);
    $promotion_end=explode(" ",$promotions_data[0]["promotion_end_time"]);
    $start_time=strtotime($promotion_start[0]);
    $end_time=strtotime($promotion_end[0]);    
    if($current_time>$start_time && $current_time<$end_time){        
        $datediff=$end_time-$start_time;
        $past_days=time()-$start_time;
        $remaining_days=floor($past_days/(60*60*24));
        $total_days=floor($datediff/(60*60*24));
        $days_percentage=floor(($remaining_days/$total_days)*100);
        $target_percentage=floor($targets_data[0]["target_cnt"]/$campaigns_data[0]["total_targets"])*100;
    }else{        
        $days_percentage=0;
        $target_percentage=0;
    }
    $promotion_type=str_replace("_", " ",$promotions_data[0]["promo_type"]);
    $module_name=$promotions_data[0]["module"];
}else{    
    $campaign_start=explode(" ",$campaigns_data[0]["start_date"]);
    $campaign_end=explode(" ",$campaigns_data[0]["end_date"]);
    $start_time=strtotime($campaign_start[0]);
    $end_time=strtotime($campaign_end[0]);    
    if($current_time>$start_time && $current_time<$end_time){        
        $datediff=$end_time-$start_time;
        $past_days=time()-$start_time;
        $remaining_days=floor($past_days/(60*60*24));
        $total_days=floor($datediff/(60*60*24));
        $days_percentage=floor(($remaining_days/$total_days)*100);
        $target_percentage=floor($targets_data[0]["target_cnt"]/$campaigns_data[0]["total_targets"])*100;
    }else{
        $days_percentage=0;
        $target_percentage=0;
    }    
    $promotion_type=str_replace("_", " ",$campaigns_data[0]["campaign_type"]);
    $module_name=$campaigns_data[0]["module_target"];
}
$entity_logo=base_url()."assets/images/pavatar.png";

if($promotions_data[0]["promo_type"]=="ONESHOP_PRODUCTS"){
  $entity_logo=base_url()."assets/images/oproduct.png";
}
else if($promotions_data[0]["promo_type"]=="ONESHOP_STORES"){
  $entity_logo=base_url()."assets/images/ostore.png";
}
else if($promotions_data[0]["promo_type"]=="TUNNEL_CHANNELS"){
  $entity_logo=base_url()."assets/images/tchannel.png";
}
else if($promotions_data[0]["promo_type"]=="TUNNEL_VIDEOS"){
  $entity_logo=base_url()."assets/images/tvideo.png";
}
else if($promotions_data[0]["promo_type"]=="DEALERX_PROFILE"){
  $entity_logo=base_url()."assets/images/ddealers.png";
}
else if($promotions_data[0]["promo_type"]=="DEALERX_AUCTION"){
  $entity_logo=base_url()."assets/images/dauction.png";
}
else if($promotions_data[0]["promo_type"]=="COFFICE_PROFILE"){
  $entity_logo=base_url()."assets/images/cprofile.png";
}
else if($promotions_data[0]["promo_type"]=="COFFICE_JOBS"){
  $entity_logo=base_url()."assets/images/cpostjob.png";
}
else if($promotions_data[0]["promo_type"]=="ISNEWS_STORIES"){
  $entity_logo=base_url()."assets/images/is-news.png";
}
else if($promotions_data[0]["promo_type"]=="CLICK_PAGES"){
  $entity_logo=base_url()."assets/images/cpage.png";
}
else if($promotions_data[0]["promo_type"]=="CLICK_EVENTS"){
  $entity_logo=base_url()."assets/images/cevents.png";
}
else if($promotions_data[0]["promo_type"]=="BUZZIN_QVIDS"){
  $entity_logo=base_url()."assets/images/is-news.png";
}
else if($promotions_data[0]["promo_type"]=="BUZZIN_ACCOUNT_PROMOTION"){
  $entity_logo=base_url()."assets/images/bvip.png";
}
else if($promotions_data[0]["promo_type"]=="NETPRO_GROUPS"){
  $entity_logo=base_url()."assets/images/ngroup.png";
}
?>
<div class="insights-row">
    <div class="wid25">
        <div class="insightbox bg-white radius-bordered">
            <div class="insightbox-left bg-colorsecondary">
                <div class="insightbox-piechart">
                    <div data-toggle="insightPieChart" class="insightPieChart" data-barcolor="#fff" data-linecap="butt" data-percent="50" data-animate="500" data-linewidth="3" data-size="47" data-trackcolor="rgba(255,255,255,0.1)" style="width: 47px; height: 47px; line-height: 47px;">
                        <span class="white f90pstg"><?php echo $days_percentage;?>%</span>
                        <canvas width="47" height="47"></canvas>
                    </div>
                </div>
            </div>
            <div class="insightbox-right">
                <span class="insightbox-number colorsecondary"><?php echo $today_date;?></span>
                <div class="insightbox-text darkgray">PROMOTION IN PROGRESS DATE</div>
                <div class="insightbox-stat colorsecondary radius-bordered">
                    <i class="stat-icon icon-lg fa fa-tasks"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="wid25">
        <div class="insightbox bg-white radius-bordered">
            <div class="insightbox-left bg-colorthirdcolor">
                <div class="insightbox-piechart">
                    <div data-toggle="insightPieChart" class="insightPieChart" data-barcolor="#fff" data-linecap="butt" data-percent="15" data-animate="500" data-linewidth="3" data-size="47" data-trackcolor="rgba(255,255,255,0.2)" style="width: 47px; height: 47px; line-height: 47px;">
                        <span class="white f90pstg"><?php echo $target_percentage?>%</span>
                        <canvas width="47" height="47"></canvas>
                    </div>
                </div>
            </div>
            <div class="insightbox-right">
                <span class="insightbox-number colorthirdcolor"><?php echo $targets_data[0]["target_cnt"];?></span>
                <div class="insightbox-text darkgray">TARGET ACHIEVED</div>
                <div class="insightbox-stat colorthirdcolor radius-bordered">
                    <i class="stat-icon  icon-lg fa fa-envelope-o"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="wid25">
        <div class="insightbox bg-white radius-bordered">
            <div class="insightbox-left bg-colorprimary">
                <div class="insightbox-piechart">
                    <div id="users-pie" data-toggle="insightPieChart" class="insightPieChart" data-barcolor="#fff" data-linecap="butt" data-percent="76" data-animate="500" data-linewidth="3" data-size="47" data-trackcolor="rgba(255,255,255,0.1)" style="width: 47px; height: 47px; line-height: 47px;">
                        <span class="white f90pstg">76%</span>
                        <canvas width="47" height="47"></canvas>
                    </div>
                </div>
            </div>
            <div class="insightbox-right">
                <span class="insightbox-number colorprimary">0</span>
                <div class="insightbox-text darkgray">IMPRESSION FACTOR</div>
                <div class="insightbox-state bg-colorprimary">
                    <i class="fa fa-check"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="wid25">
        <div class="insightbox bg-white radius-bordered">
            <div class="insightbox-left no-padding">
                <img src="<?php echo $entity_logo ?>" style="width:65px; height:65px;">
            </div>
            <div class="insightbox-right padding-top-20">
                <div class="insightbox-stat palegreen">
<!--                    <i class="stat-icon icon-xlg fa fa-phone"></i>-->
                </div>
                <div class="insightbox-text darkgray"><span style="font-weight:bold">Entity Type:</span><?php echo $promotion_type?></div>
                <div class="insightbox-text darkgray"><span style="font-weight:bold">Module:</span><?php echo $module_name;?></div>
            </div>
        </div>
    </div>
</div>