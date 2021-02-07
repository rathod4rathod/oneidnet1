
    <?php
    if($promodata){
        
    
foreach($promodata as $promodatadata){
//    echo "<pre>";print_R($promodata);echo "</pre>";
//    echo "<pre>";print_R($promodatadata["entity_details"]);echo "</pre>";
    ?>
<div class="leftbox-container-common-box fll mal20 p_c_id<?php echo $promodatadata["promotionId"];?>" id="p_c_id<?php echo $promodatadata["promotionId"];?>" >
    <div class="channelitem"><!--videoitem start here-->
        <p class="leftclose"><a> <img width="15" height="15" alt="img" class="promoclose" p_c_id="<?php echo $promodatadata["promotionId"];?>" src="<?php echo base_url()."assets/"?>images/no.png"> </a></p>
        <!--<p class="leftgolder-tunnel"><a> <img width="18" height="18" alt="img" src="<?php echo base_url()."assets/"?>images/settings.png"> </a> </p>-->
        <?php  $url=base_url()."modulePromotions/promoupdate?pid=".$promodatadata["promotionId"]."&eid=".$promodatadata["entity_id"]."&ulid=".bin2hex($promodatadata["entity_details"][0]["url"]); ?>
        <a href="<?php echo trim($url); ?>">
        <div class="videoitems_box">
            <div class="leftchannelitem url_link"> 
                <img src="<?php echo $promodatadata["entity_details"][0]["promo_image"];?>" alt="img" class="imgitem"> </div>
            <div class="rightchannelitem"> <div class="mat15">  <?php echo $promodatadata["entity_details"][0]["promo_name"]; ?> </div> </div>
        </div>
         </a>       
    </div>
</div>
        <?php
    }}
?>
