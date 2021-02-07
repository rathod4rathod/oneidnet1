<div class="Table">
    <div class="Heading">
        <div class="Cell" style="width:60px;">
            <p class="mat10">Logo</p>
        </div>
       
        <div class="Cell">
            <p class="mat10">  Module </p>
        </div>
        <div class="Cell">
            <p class="mat10">  Entity Type </p>
        </div>
        <div class="Cell">
            <p class="mat10">  Status </p>
        </div>
        <div class="Cell">
            <p class="mat10">  Requested On </p>
        </div>

    </div>
<!--<div id="gma_campaigns_div">-->
<?php
//print_r($officialdata);
    if($officialdata!=0){
    foreach($officialdata as $odata) {
    $obadge_url=  base_url()."official_badge/officialBadgeView?rec_aid=".base64_encode(base64_encode($odata["rec_aid"]));
   
?>
    <div class="Row">
        <div class="Cell" style="width:40px; text-align:center;">
            <p style="margin-bottom:5px;" class="mat10">
                 <?php switch ($odata['module']) {
               
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
                    $pramotionimg =base_url().'assets/images/oneidnetlogo.png';
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
                    $pramotionimg =base_url().'assets/images/oneidnetlogo.png';
                } ?>
                <img width="40px;" src="<?php echo $pramotionimg;?>"></p>
        </div>
        <div class="Cell">
            <p class="mat20"> <a href="<?php echo $obadge_url ?>"><?php echo $odata['module'];  ?> </a></p>
        </div>
        <div class="Cell">
            <p class="mat20"> <?php echo $odata["entity_type"];?> </p>
        </div>
       
        <div class="Cell">
            <p class="mat20 bold red"><a class="red" href="#"> <?php  if($odata["status"]=='WAITING'){ echo "Waiting"; }else if($odata["status"]=='APPROVED'){ echo "Approved"; }else{ echo "Rejected" ;} ?>  </a> </p>
        </div>
        <div class="Cell">
            <p class="mat20"> <?php echo date('M d , Y H:i A', strtotime($odata['requested_on']) ); ?>  </p>
        </div>
    </div>
<?php
    }
} else { echo "No Saved Official Badges";}
?>
</div>
