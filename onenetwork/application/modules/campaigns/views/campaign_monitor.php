<?php
$this->load->module('templates');
$this->templates->header();
$this->templates->onenet_header();

$count_saved = count($promotions_saved);
$count_running = count($promotions_running);
$count_expired = count($promotions_expired);
?>

<div class="new_wrapper">
    <div class="ondes_wrapper_main">
        <div class="ondes_module_container_wrap">
            <!--module_container start here-->
            <div class="ondes_wrapper_inner minheight600">
                <!--wrapper inner start here-->
                <div class="oneshop_getstarted ">
                    <div class="oneshop_getstarted_bgwrap mat40 mab30" style="position:relative; margin-top:-0;">
                        <div class="Table">
                            <div class="borderbottom fll wi100pstg pab5">
                                <p class="mat10 fll"><img width="40px;" src="<?php echo base_url() . 'assets/images/oneidlogo.png'; ?>"></p> <h3 class="fs24 mat20 normal mal10 fll pab10"> Campaigns </h3>
                            </div>
                            <div class="bold  fll" style="width:880px; padding:0 0 5px 0; margin:20px 0 0 0; line-height:24px;">
                                <span> <a href="#"> Campaigns </a> &nbsp;&nbsp;&gt;&nbsp;&nbsp; </span> <span> <a href="#"> Promotions Monitor </a> </span>

                            </div>
                            <!--<p class="fs18  fll">" TWO ipsum dolor sit amet, consectetur adipisicing elit. Quam totam nulla est, illo molestiae maxime officiis, quae ad, ipsum vitae deserunt molestias eius alias.
                                "</p>-->
                        </div>


                        <div class="wi100pstg mat30 mab30 ">
                            <div class="savepromotion">
                                <figure class="effect-jeff">
                                    <img alt="" src="">
                                    <figcaption>
                                        <div class="icons">
                                            <h3> <?php echo $count_saved;?> </h3>
                                            <h4>Saved <br> Campaigns</h4>
                                        </div>
                                    </figcaption>
                                </figure>
                            </div>
                            <div class="savepromotion">
                                <figure class="effect-jeff">
                                    <img alt="" src="">
                                    <figcaption>
                                        <div class="icons">
                                            <h3> <?php echo $count_running;?> </h3>
                                            <h4> Running <br> Campaigns</h4>
                                        </div>
                                    </figcaption>
                                </figure>
                            </div>
                            <div class="savepromotion">
                                <figure class="effect-jeff">
                                    <img alt="" src="">
                                    <figcaption>
                                        <div class="icons">
                                            <h3> <?php echo $count_expired;?> </h3>
                                            <h4>Expired <br> Campaigns</h4>
                                        </div>
                                    </figcaption>
                                </figure>
                            </div>
                        </div>

                        <div class="mat20 fll" style="width:620px;">
                            <div class="click_tabs_wrap">
                                <ul id="tabs">
                                    <li><a id="current" href="#" name="#tab1"> 1 </a> <p class="class1box"> SAVED CAMPAIGNS </p> </li>
                                    <li><a href="#" name="#tab2"> 2 </a> <p class="class2box"> RUNNING CAMPAIGNS  </p>  </li>
                                    <li><a href="#" name="#tab3"> 3 </a> <p class="class4box"> EXPIRED CAMPAIGNS </p>   </li>
                                </ul>
                            </div>
                            <div style="width:880px; margin-left:50px;" id="content">


                            <div id="tab1" style="display: block; width: 820px;">
                                    <p class="bold fs12 mat20">  SAVED PROMOTIONS </p>

                                    <div class="Table">
                                        <p class="fll mar10"> <input type="text" name="prom_name_draft" id="prom_name_draft" placeholder="Promotion Name ..." class="oneshop_savedcompaign_textbox"> </p>
                                        <p class="fll mar10"> <select name="prom_module_draft" id="prom_module_draft" class="flight_savedcompaign_select">
                                                <option disabled="">Select Module</option>
                                                <option value="All">All Modules</option>
                                                <?php
                                                foreach($promotion_modules as $protKey => $protVal){
                                                    echo "<option value='".$protKey."'>".$protVal."</option>";
                                                }
                                                ?>
                                            </select>
                                        </p>
                                        <p class="fll mar10"> 
                                            <select name="prom_type_draft" id="prom_type_draft" class="flight_savedcompaign_select">
                                                <option disabled="">Select Promotion Type</option>
                                                <option value="All">All Promotion Type</option>
                                            </select>
                                        </p>
                                        <p class="fll mar10"> <select name="prom_days_draft" id="prom_days_draft" class="flight_savedcompaign_select">
                                                <option disabled="">Select Date Filter</option>
                                                <option value="">All Time</option>
                                                <option value="present_month">This Month</option>
                                                <option value="last_six_months">Last Six Months</option>
                                                <option value="last_one_year">Last One Year</option>
                                            </select>
                                        </p>
                                        <p class="fll mar10"><a href="javascript:void(0);"  name="onenetwork_reset" id="onenetwork_reset"  class="np_des_addaccess_btn_save" >Reset</a></p>
                                    </div>

                                    <div class="fullsite" id="drafted_div">
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
                                            }} else { echo " <div class='Row'<div class='Cell'>>No Saved Campaigns</div></div>";}
                                            ?>
                                        </div>
                                    </div>
                                </div>


                                <div id="tab2" style="display: none;  width:820px;">
                                    <p class="bold fs12 mat20">  Active Promotions  </p>


                                    <div class="Table">
                                        <p class="fll mar10"> <input type="text" name="prom_name" id="prom_name" placeholder="Promotion Name ..." class="oneshop_savedcompaign_textbox"> </p>
                                        <p class="fll mar10"> <select name = "prom_module" id = "prom_module"  class="flight_savedcompaign_select">
                                                <option disabled="">Select Module</option>
                                                <option value="">All Modules</option>
                                                <?php
                                                foreach($promotion_modules as $protKey => $protVal){
                                                    $protValDisp = str_replace("_", " ", $protVal);
                                                    echo "<option value='".$protKey."'>".$protValDisp."</option>";
                                                }
                                                ?>
                                            </select>
                                        </p>
                                        <p class="fll mar10"> <select name="prom_type" id="prom_type" class="flight_savedcompaign_select">
                                                <option disabled="">Select Promotion Type</option>
                                                <option value="">All Promotion Types</option>
                                            </select>
                                        </p>
                                        <p class="fll mar10"> <select name="prom_days" id="prom_days" class="flight_savedcompaign_select">
                                                <option disabled="">Select Date Filter</option>
                                                <option value="">All Time</option>
                                                <option value="present_month">This Month</option>
                                                <option value="last_six_months">Last Six Months</option>
                                                <option value="last_one_year">Last One Year</option>
                                            </select>
                                        </p>
                                         <p class="fll mar10"><a href="javascript:void(0);" class="np_des_addaccess_btn_save"  name="onenetwork_reset" id="onenetwork_reset1" >Reset</a></p>
                                 

                                    </div>


                                    <div class="fullsite" id="locked_div">

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
                                            //Running Promotions
                                            if($promotions_running != ''){
                                                    foreach($promotions_running as $promo) {
                                                            $promo_url=  base_url()."campaignDV?promo_id=".base64_encode(base64_encode($promo["promo_code"]));
                                                      switch ($promo['promo_type']) {
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
                                                            <div class="Row">
                                                                    <div class="Cell" style="width:40px; text-align:center;">
                                                                            <p style="margin-bottom:5px;" class="mat10"><img width="40px;" src="<?php echo $pramotionimg;?>"></p>
                                                                    </div>
                                                                    <div class="Cell">
                                                                            <p class="mat20"> <a class="blue textdecoration" href="<?php echo $promo_url; ?>"> <?php echo $promo['promo_name']; ?>  </a></p>
                                                                    </div>
                                                                    <div class="Cell">
                                                                            <p class="mat20"> <?php echo $promo['promo_type']; ?> </p>
                                                                    </div>
                                                                    <div class="Cell">
                                                                            <p class="mat20 bold red"><a class="red" href="#"> <?php echo $promo['module']; ?> </a> </p>
                                                                    </div>
                                                                    <div class="Cell">
                                                                            <p class="mat20"> <?php echo date('M d , Y H:i A', strtotime($promo['created_on']) ); ?>  </p>
                                                                    </div>
                                                            </div>
                                                    <?php
                                            }} else { echo "No Running Campaigns";}
                                            ?>
                                          
                                        </div>
                                    </div>

                                </div>



                                <div id="tab3"  style="display: none; width:820px;">
                                    <p class="bold fs12 mat20">  Promotion History </p>



                                    <div class="fullsite">

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
                                                    <p class="mat10">  Promotion Status </p>
                                                </div>
                                                <div class="Cell">
                                                    <p class="mat10">  Created on </p>
                                                </div>

                                            </div>

                                             <?php
                                            //Expired Promotions 
                                            if($promotions_expired != ''){
                                                    foreach($promotions_expired as $promo) {
                                                            $promo_url=  base_url()."campaignDV?promo_id=".base64_encode(base64_encode($promo["promo_code"]));
                                                     switch ($promo['promo_type']) {
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
                                                            <div class="Row">
                                                                    <div class="Cell" style="width:40px; text-align:center;">
                                                                            <p style="margin-bottom:5px;" class="mat10"><img width="40px;" src="<?php echo $pramotionimg ;?>"></p>
                                                                    </div>
                                                                    <div class="Cell">
                                                                            <p class="mat20"> <a class="blue textdecoration" href="<?php echo $promo_url; ?>"> <?php echo $promo['promo_name']; ?>  </a></p>
                                                                    </div>
                                                                    <div class="Cell">
                                                                            <p class="mat20"> <?php echo $promo['promo_type']; ?> </p>
                                                                    </div>
                                                                    <div class="Cell">
                                                                            <p class="mat20 bold red"><a class="red" href="#"> <?php echo $promo['module']; ?> </a> </p>
                                                                    </div>
                                                                    <div class="Cell">
                                                                            <p class="mat20"> <?php echo date('M d , Y H:i A', strtotime($promo['created_on']) ); ?>  </p>
                                                                    </div>
                                                            </div>
                                                    <?php
                                            }} else { echo " <div class='bgcolor5'> No Expired Campaigns </div>";}
                                            ?>
                                        </div>
                                    </div>

                                </div>





                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--wrapper inner closed here-->
        </div>
        <!--module container end here-->
    </div>
<input type="hidden" name="base_url" id="base_url" value="<?php echo base_url();?>">
    <!--wrapper main closed here-->

    <?php $this->templates->right_container(); ?>
</div>
<script src="<?php echo base_url() . "assets/js/campaigns.js" ?>"></script>
<script src="<?php echo base_url() . "assets/js/prototype.js" ?>"></script>
<!--module container end here-->
<?php
$this->templates->footer();
?>
