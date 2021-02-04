                                           <div class="Table">

                                            <div class="Heading">
                                                <div class="Cell" style="width:60px;">
                                                    <p class="mat10">Logo</p>
                                                </div>
                                                <div class="Cell">
                                                    <p class="mat10">  Promotion Name </p>
                                                </div>
                                                <div class="Cell">
                                                    <p class="mat10">  Promotion Type </p>
                                                </div>
                                                <div class="Cell">
                                                    <p class="mat10">  Entity Name </p>
                                                </div>
                                                <div class="Cell">
                                                    <p class="mat10">  Saved On </p>
                                                </div>

                                            </div>
                                            <?php
                                            //Saved Promotions
                                            if($promotions_saved!=''){
                                                    foreach($promotions_saved as $promo) {
                                                            $promo_url=  base_url()."campaignDV?promo_id=".base64_encode(base64_encode($promo["promo_code"]));
                                                    ?>
                                                            <div class="Row">
                                                                    <div class="Cell" style="width:40px; text-align:center;">
                                                                            <p style="margin-bottom:5px;" class="mat10">
                                                                                <?php switch ($promo['promo_type']) {
                                                                                        case ONESHOP_PRODUCTS:
                                                                                            $pramotionimg =base_url().'assets/images/oproduct.png';;
                                                                                            break;
                                                                                        case ONESHOP_STORES:
                                                                                             $pramotionimg =base_url().'assets/images/ostore.png';
                                                                                            break;
                                                                                        case ONESHOP_MALLS:
                                                                                             $pramotionimg =base_url().'assets/images/oidentity.png';
                                                                                            break;
                                                                                         case TUNNEL_VIDEOS:
                                                                                             $pramotionimg =base_url().'assets/images/tvideo.png';
                                                                                            break; 
                                                                                        case TUNNEL_CHANNELS:
                                                                                             $pramotionimg =base_url().'assets/images/tchannel.png';
                                                                                            break;
                                                                                        case CLICK_PAGES:
                                                                                            $pramotionimg =base_url().'assets/images/cpage.png';
                                                                                            break;
                                                                                        case ISNEWS_STORIES:
                                                                                            $pramotionimg =base_url().'assets/images/is-news.png';
                                                                                            break;
                                                                                        
                                                                                        case CLICK_GROUPS:
                                                                                            $pramotionimg =base_url().'assets/images/cpage.png';
                                                                                            break;
                                                                                        case CLICK_EVENTS:
                                                                                            $pramotionimg =base_url().'assets/images/cevents.png';
                                                                                            break;
                                                                                        case COFFICE_JOBS:
                                                                                            $pramotionimg =base_url().'assets/images/cpostjob.png';
                                                                                            break;
                                                                                        case COFFICE_PROFILE:
                                                                                            $pramotionimg =base_url().'assets/images/cprofile.png';
                                                                                            break;
                                                                                        case DEALERX_PROFILE:
                                                                                            $pramotionimg =base_url().'assets/images/ddealers.png';
                                                                                            break;
                                                                                        case DEALERX_AUCTION:
                                                                                            $pramotionimg =base_url().'assets/images/dauction.png';
                                                                                               
                                                                                            break;
                                                                                         case  BUZZIN_QPICS:
                                                                                            $pramotionimg =base_url().'assets/images/bcompetition.png';
                                                                                            break;
                                                                                        case BUZZIN_QVIDS:
                                                                                            $pramotionimg =base_url().'assets/images/bvip.png';
                                                                                            break; 
                                                                                        case BUZZIN_ACCOUNT_PROMOTION:
                                                                                            $pramotionimg =base_url().'assets/images/ddealers.png';
                                                                                            break;
                                                                                        case NETPRO_GROUPS:
                                                                                            $pramotionimg =base_url().'assets/images/ngroup.png';
                                                                                            break; 
                                                                                        /* case TRAVELTIME_TOUR_PACKAGES:
                                                                                            $pramotionimg =base_url().'assets/images/ngroup.png';
                                                                                            break;
                                                                                         case ISNEWS_STORIES:
                                                                                            $pramotionimg =base_url().'assets/images/is-news.png';
                                                                                            break; */
                                                                                        default:
                                                                                            $pramotionimg =base_url().'assets/images/oneidnetlogo.png';
                                                                                        } ?>
                                                                                <img width="40px;" src="<?php echo $pramotionimg ;?>">
                                                                            </p>
                                                                    </div>
                                                                    <div class="Cell">
                                                                            <p class="mat20"> <a class="blue textdecoration" href="<?php echo $promo_url; ?>"> <?php echo ucfirst($promo['promo_name']); ?>  </a></p>
                                                                    </div>
                                                                    <div class="Cell">
                                                                            <p class="mat20"> <?php echo $promo['promo_type']; ?></p>
                                                                    </div>
                                                                    <div class="Cell">
                                                                            <p class="mat20 bold red"><a class="red" href="#"> <?php echo $promo['module']; ?> </a> </p>
                                                                    </div>
                                                                    <div class="Cell">
                                                                            <p class="mat20"> <?php echo date('M d , Y H:i A', strtotime($promo['created_on']) ); ?>  </p>
                                                                    </div>
                                                            </div>
                                                    <?php
                                            }} else { echo "No Saved Campaigns";}
                                            ?>
                                        </div>
                                    </div>