<?php
$this->load->module('templates');
$this->templates->header();
$this->templates->onenet_header();
//print_r($count_data);
$options_arry=array('ISNEWS','360MAIL','CLICK','VCOM','NETPRO','ONENETWORK','TUNNEL','CVBANK','DEALERX','CORPORATE_OFFICE','ONEVISION','ONEIDSHIP','FINDIT','ONESHOP','TRAVELTIME','BUZZIN','ONEIDNET');
?>
<script type="text/javascript" src="<?php echo base_url().'assets/js/prototype.js'?>"></script>
<script type="text/javascript" src="<?php echo base_url().'assets/microjs/officialbadgemonitor.js'?>"></script>

<div class="new_wrapper">
    <div class="ondes_wrapper_main">
        <div class="ondes_module_container_wrap">
            <!--module_container start here-->
            <div class="ondes_wrapper_inner minheight600">
                <!--wrapper inner start here-->
                <div class="oneshop_getstarted ">
                    <div class="oneshop_getstarted_bgwrap mat40 mab30" style="position:relative; margin-top:0;">
                        <div class="Table">
                            <div class="borderbottom fll wi100pstg pab5">
                                <p class="mat10 fll"><img width="40px;" src="<?php echo base_url() . 'assets/images/oneidlogo.png'; ?>"></p> <h3 class="fs24 mat20 normal mal10 fll pab10"> Official Badges </h3>
                            </div>
                            <div class="bold  fll" style="width:880px; padding:0 0 5px 0; margin:20px 0 0 0; line-height:24px;">
                                <span> <a href="#"> Official Badges</a> &nbsp;&nbsp;&gt;&nbsp;&nbsp; </span> <span> <a href="#">  Monitor </a> </span>

                            </div>
                           <!-- <p class="fs18  fll">" Two ipsum dolor sit amet, consectetur adipisicing elit. Quam totam nulla est, illo molestiae maxime officiis, quae ad, ipsum vitae deserunt molestias eius alias.
                                "</p>-->
                        </div>


                        

                        <div class="mat20 fll" style="width:620px;">
                           
                            <div style="width:880px; margin-left:50px;" id="gma_content">


                            <div id="tab1" style="display: block; width: 820px;">
<!--                                    <p class="bold fs12 mat20">  RUNNING CAMPAIGNS </p>-->

                                    <div class="Table">
                                        <p class="fll mar10"><b>Filter By</b></p>
                                        <p class="fll mar10"> 
                                            <select name="officialbadge_module" id="officialbadge_module" class="flight_savedcompaign_select">
                                                <option disabled="">Select Module</option>
                                                <option value="">All Modules</option>
                                                <?php                                                
                                                for($i=0;$i<count($options_arry);$i++){
                                                    
                                                    if( $options_arry[$i] =='CORPORATE_OFFICE'){  $moduledata = explode("_",$options_arry[$i]);
                                                     echo "<option value='".$options_arry[$i]."'>". $moduledata[0]." ".$moduledata[1]."</option>";
                                                    
                                                    }else{
                                                    echo "<option value='".$options_arry[$i]."'>". $options_arry[$i]."</option>";
                                                    }
                                                }
//                                                foreach($promotion_modules as $protKey => $protVal){
//                                                    echo "<option value='".$protKey."'>".$protVal."</option>";
//                                                }
                                                ?>
                                            </select>
                                        </p>
                                        <p class="fll mar10"> 
                                            <select name="officialbadge_type" id="officialbadge_type" class="flight_savedcompaign_select">
                                                <option disabled="">Select</option>
                                               <option  value="">All</option>
                                               
                                            </select>
                                        </p>
                                       
                                    </div>

                                    <div class="fullsite" id="official_badge_div">
                                        
                                    </div>
                                
                                </div>


                               



<!--                                <div id="tab3" style="display: none; width:820px;">
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
                                                            <div class="Row">
                                                                    <div class="Cell" style="width:40px; text-align:center;">
                                                                            <p style="margin-bottom:5px;" class="mat10"><img width="40px;" src="<?php echo base_url().'assets/images/oneidlogo.png';?>"></p>
                                                                    </div>
                                                                    <div class="Cell">
                                                                            <p class="mat20"> <a class="blue textdecoration" href="<?php echo $promo_url; ?>"> Promotion name  </a></p>
                                                                    </div>
                                                                    <div class="Cell">
                                                                            <p class="mat20"> Store Promotion </p>
                                                                    </div>
                                                                    <div class="Cell">
                                                                            <p class="mat20 bold red"><a class="red" href="#"> ONESHOP </a> </p>
                                                                    </div>
                                                                    <div class="Cell">
                                                                            <p class="mat20"> <?php echo date('M d , Y H:i A', now()); ?>  </p>
                                                                    </div>
                                                            </div>
                                                    
                                        </div>
                                    </div>

                                </div>-->

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

<!--module container end here-->
<?php
$this->templates->footer();
?>
