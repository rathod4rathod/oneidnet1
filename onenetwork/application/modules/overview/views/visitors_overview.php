<?php
if($visitors_data!=0){
  echo "<input type='hidden' id='haudience_cnt' value='".$audience_cnt[0]["cnt"]."'/>";
    foreach($visitors_data as $info){
        $visited_on=$info["added_on"];
        $img_url=base_url()."assets/images/";
        if($info["match_type"]=="BEST_MATCH"){
            $img_url.="green.png";
        }elseif ($info["match_type"]=="MEDIUM_MATCH") {
            $img_url.="blue.png";
        }elseif($info["match_type"]=="BASIC_MATCH"){
            $img_url.="orange.png";
        }else{
            $img_url.="visitor_red.png";
        }
?>
<li class="order-item">
    <div class="insights-row">
        <div class="wid66 item-left">
            <div class="item-booker"><?php echo ucwords($info["first_name"]." ".$info["last_name"]);?></div>
            <div class="item-time">
                <i class="fa fa-calendar"></i>
                <span><?php echo date("d M",  strtotime($visited_on));?></span>
            </div>
        </div>
        <div class="wid33 item-right">
            <div class="item-price">
                <!--<span class="currency">$</span>-->
                <span class="price"><?php echo $info["total_views"];?> Views</span>
            </div>
        </div>
    </div>
<!--    <a class="item-more" href="javascript:void(0)">
        <i></i>
    </a>-->
    <p class="flr" style="position: absolute; right: -10px;width: 25px;height: 25px;top:14px">
        <img src="<?php echo $img_url?>"/>
    </p>
</li>
<?php
    }
}
/*else{
    echo "No visitors";
}*/
?>