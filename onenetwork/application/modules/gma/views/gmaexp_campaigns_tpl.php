<div class="Table">
    <div class="Heading">
        <div class="Cell" style="width:60px;">
            <p class="mat10">Logo</p>
        </div>
        <div class="Cell">
            <p class="mat10">  Promotion ID </p>
        </div>
        <div class="Cell">
            <p class="mat10">  Promotion Name </p>
        </div>
        <div class="Cell">
            <p class="mat10">  Promotion Type </p>
        </div>
        <div class="Cell">
            <p class="mat10">  Created on </p>
        </div>
    </div>
    <?php
     if($gma_expired_data!=0){
    foreach($gma_expired_data as $promo) {
    $promo_url=  base_url()."campaignDV?promo_id=".base64_encode(base64_encode($promo["promo_code"]));
    $source_type=  str_replace("_SYSTEM", "", $promo["source_type"]);
?>
    <div class="Row">
        <div class="Cell" style="width:40px; text-align:center;">
            <p style="margin-bottom:5px;" class="mat10"><img width="40px;" src="<?php echo base_url().'assets/images/oneidlogo.png';?>"></p>
        </div>
        <div class="Cell">
            <p class="mat20"> <a class="blue textdecoration" href="javascript:void(0)"> <?php echo $promo['campaign_name']; ?>  </a></p>
        </div>
        <div class="Cell">
            <p class="mat20"> <?php echo $promo["campaign_type"];?> </p>
        </div>
        <div class="Cell">
            <p class="mat20 bold red"><a class="red" href="#"> <?php echo $promo["module_target"];?>  </a> </p>
        </div>
        <div class="Cell">
            <p class="mat20"> <?php echo date('M d , Y H:i A', strtotime($promo['created_on']) ); ?>  </p>
        </div>
    </div>
<?php
    }
} else { echo "No Expired Campaigns";}
    ?>
</div>