<?php
//Promotion display
if($promotion_data!=0){
  //print_r($promos_cnt);
  echo "<input type='hidden' id='hpromotions_cnt' value='".$promos_cnt[0]["cnt"]."'/>";
    foreach($promotion_data as $promo) {
        $module_url="http://localhost/".strtolower($promo["module"])."/"; 
        $promo_end_date=explode(" ",$promo["promotion_end_time"]);
        if(trim($promo["promo_type"])=="ONESHOP_PRODUCTS"){            
            if($promo["parent_code"]!=""){
                $module_url.="product_detail_view/".$promo["parent_code"]."/".$promo["entity_code"];
            }
        }
        if(trim($promo["promo_type"])=="ONESHOP_STORES"){
           $module_url.="store_home/".$promo["entity_code"]; 
        }
        $diff=strtotime($promo_end_date[0])-strtotime(date("Y-m-d"));
        $days=floor($diff/(60*60*24));        
        $promo_url=  base_url()."campaignDV?promo_id=".base64_encode(base64_encode($promo["promo_code"]));
    ?>
    <li class="task-item">
        <div class="task-check">
<!--            <label>
                <input type="checkbox">
                <span class="text"></span>
            </label>-->
        </div>
        <?php 
        if( $days > 2){
            $classsApply = "label-palegreen";
            $dispStatus = "Running";
        }else if( $days <=2 && $days>0){
            $classsApply = "label-yellow";
            $dispStatus = "Expires";
        }else if( $days <=0){
            $classsApply = "label-orange";
            $dispStatus = "Expired";
        }
        ?>
        <div class="task-state">
            <span class="label <?php echo$classsApply;?>">
                <?php echo $dispStatus;?>
            </span>
        </div>
        <div class="task-time">Expiration Date: <?php echo date("M d, Y", strtotime($promo["promotion_end_time"]));?></div>
        <div class="task-body"><strong><?php echo $promo["module"];?></strong> <?php echo $promo['promo_name']; ?></div>
        <div class="task-creator">Click to visit <a href="<?php echo $module_url; ?>"><?php echo $promo['entity_name']; ?></a></div>                                                
        <div class="task-assignedto"><?php echo $promo["total_cost"];?>/-</div>
    </li>
    <?php }
}
else if($campaigns_data!=0){
  echo "<input type='hidden' id='hcampaigns_cnt' value='".$promos_cnt[0]["cnt"]."'/>";
    foreach($campaigns_data as $campaign) {
        $module_url="http://localhost/".strtolower($campaign["module_target"])."/"; 
        $campaign_end_date=explode(" ",$campaign["end_date"]);
        if(trim($campaign["module_target"])=="ONESHOP_PRODUCTS"){            
            if($campaign["parent_code"]!=""){
                $module_url.="product_detail_view/".$campaign["parent_code"]."/".$campaign["entity_code"];
            }
        }
        if(trim($campaign["module_target"])=="ONESHOP_STORES"){
           $module_url.="store_home/".$campaign["entity_code"]; 
        }
        if(trim($campaign["module_target"])=="CLICK_PAGES"){
           $module_url.="pages/pageMain?pud=".$campaign["entity_code"];  
        }
        $diff=strtotime($campaign_end_date[0])-strtotime(date("Y-m-d"));
        $days=floor($diff/(60*60*24));        
        //$campaign_url=  base_url()."campaignDV?promo_id=".base64_encode(base64_encode($campaign_end_date["r"]));
    ?>
    <li class="task-item">
        <div class="task-check">
            <label>
                <input type="checkbox">
                <span class="text"></span>
            </label>
        </div>
        <?php 
        if( $days > 2){
            $classsApply = "label-palegreen";
            $dispStatus = "Running";
        }else if( $days <=2){
            $classsApply = "label-yellow";
            $dispStatus = "Expired";
        }else if( $days <0){
            $classsApply = "label-orange";
            $dispStatus = "Expired";
        }
        ?>
        <div class="task-state">
            <span class="label <?php echo$classsApply;?>">
                <?php echo $dispStatus;?>
            </span>
        </div>
        <div class="task-time">Expiring On: <?php echo date("M d, Y", strtotime($campaign["end_date"]));?></div>
        <div class="task-body"><strong><?php echo $campaign["module_target"];?></strong> <?php echo $campaign['campaign_name']; ?></div>
        <div class="task-creator">Click to visit <a href="<?php echo $module_url; ?>"><?php echo $campaign['entity_name']; ?></a></div>                                                
        <div class="task-assignedto"><?php echo $campaign["total_cost"];?>/-</div>
    </li>
    <?php }
}
else if($promos_cnt[0]["cnt"]==0){
    echo "No other promotions";
}
?>
<!--</span>-->