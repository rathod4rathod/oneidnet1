<div class="Table">
    <div class="Heading">
        <div class="Cell" style="width:60px;">
            <p class="mat10">Logo</p>
        </div>
        <div class="Cell">
            <p class="mat10">  Campaign Name </p>
        </div>
        <div class="Cell">
            <p class="mat10">  Campaign Type </p>
        </div>
        <div class="Cell">
            <p class="mat10">  Entity Name </p>
        </div>
        <div class="Cell">
            <p class="mat10">  Status </p>
        </div>
        <div class="Cell">
            <p class="mat10">  Created On </p>
        </div>

    </div>
<!--<div id="gma_campaigns_div">-->
<?php
    if($gm_data!=0){
    foreach($gm_data as $promo) {
    $campaign_url=  base_url()."gma/gmaCampaignView?campaign_id=".base64_encode(base64_encode($promo["rec_aid"]));
    $source_type=  str_replace("_SYSTEM", "", $promo["source_type"]);
?>
    <div class="Row">
        <div class="Cell" style="width:40px; text-align:center;">
            <p style="margin-bottom:5px;" class="mat10">
                 <?php switch ($promo['module_target']) {
               
                case ONESHOP:
                     $pramotionimg =base_url().'assets/images/back/oneshop.png';
                    break;
                 case TUNNEL:
                     $pramotionimg =base_url().'assets/images/back/tunnel.png';
                    break; 
                case ISNEWS:
                    $pramotionimg =base_url().'assets/images/back/isnews.png';
                    break;
                case CLICK:
                    $pramotionimg =base_url().'assets/images/back/click.png';
                    break;
                case COFFICE:
                    $pramotionimg =base_url().'assets/images/back/cooffice.png';
                    break;
                case DEALERX:
                    $pramotionimg =base_url().'assets/images/back/dealerx.png';
                    break;
                case  BUZZIN:
                    $pramotionimg =base_url().'assets/images/back/buzzin.png';
                    break;
                case NETPRO:
                    $pramotionimg =base_url().'assets/images/back/netpro.png';
                    break; 
                case ONENETWORK:
                    $pramotionimg =base_url().'assets/images/back/onenetwork.png';
                    break; 
               case ONEIDNET:
                    $pramotionimg =base_url().'assets/images/oneidlogo.png';
                    break;
                 /* 
                    case 360MAIL:
                    $pramotionimg =base_url().'assets/images/oneidnetlogo.png';
                    break;
                    case ONEVISION:
                    $pramotionimg =base_url().'assets/images/oneidnetlogo.png';
                    break;
                    case ONEIDSHIP:
                    $pramotionimg =base_url().'assets/images/oneidnetlogo.png';
                    break; 
                    case FINDIT:
                    $pramotionimg =base_url().'assets/images/is-news.png';
                    break;
                    case CVBANK:
                    $pramotionimg =base_url().'assets/images/is-news.png';
                    break;
                    */
                default:
                    $pramotionimg =base_url().'assets/images/oneidlogo.png';
                } ?>
                <img width="40px;" src="<?php echo $pramotionimg;?>"></p>
        </div>
        <div class="Cell">
            <p class="mat20"> <a class="blue textdecoration" title="<?php echo  $promo['campaign_name']; ?> " href="<?php echo $campaign_url;?>"> <?php if (strlen($promo['campaign_name']) <=15) {
         echo ucfirst($promo['campaign_name']);
       } else {
         echo ucfirst(substr($promo['campaign_name'], 0, 15)) . '...';
       }?> </a></p>
        </div>
        <div class="Cell">
            <p class="mat20"> <?php echo $promo["campaign_type"];?> </p>
        </div>
        <div class="Cell">
            <p class="mat20 bold red"><a class="red" href="#"> <?php echo $promo["module_target"];?>  </a> </p>
        </div>
        <div class="Cell">
            <p class="mat20 bold red"><a class="red" href="#"> <?php  if($promo["status"]=='LOCKED'){ echo "Active"; }else{ echo "Inactive"; };?>  </a> </p>
        </div>
        <div class="Cell">
            <p class="mat20"> <?php echo date('M d , Y H:i A', strtotime($promo['created_on']) ); ?>  </p>
        </div>
    </div>
<?php
    }
} else { echo "No Saved Campaigns";}
?>
</div>
