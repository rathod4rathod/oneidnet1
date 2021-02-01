<?php
$this->load->module('templates');
$this->templates->app_header();
$this->templates->os_mainmenu();
//print_R($current_package);
//print_R($new_package);
?>
<div class="oneshop_container_middle_section mat10" id="currentrenewalPckgId" currentrenewalPckgId="<?php echo $current_package[0]["renewal_pckg_id"]?>">
    <div class="oneshop_left_newcontainer pab10" id="storeaid" storeaid="<?php echo $current_package[0]["store_aid"]?>">
        <div class="popupbox_new_wrapper" id="newpackageId" newpackageId="<?php echo $new_package[0]["newpackageId"];?>">
            <div class="fll borderbottom mab10 pab5 mat10 wi100pstg">
                <h2> <?php echo $current_package[0]["store_name"];?> </h2>
            </div>
            <div class="wi100pstg fll">
                <div class="statistics_total_wqrap">
                    <div class="preference_top_heading_wrap">
                        <div class="statistics_preference_box1 bold"> Package Name </div>
                        <div class="statistics_preference_box2 bold"> Total Products </div>
                        <div class="statistics_preference_box2 bold"> Duration </div>
                        <div class="statistics_preference_box2 bold"> Expiration Status </div>
                    </div>
                    <div class="preference_bottom_content_wrap">
                        <div class="preference_module_names acenter"> <span class="green2">  Current Package </span> <br> <strong> <?php echo $current_package[0]["package_name"];?> </strong>  </div>
                        <div class="statistics_preference_box_content acenter">  <?php echo $current_package[0]["total_products"];?> <strong> <span class="gray"> ( Remaining ) </span> </strong> </div>
                        <div class="statistics_preference_box_content acenter">  
                            <?php
                            $date = new DateTime();
                            $curdate = $date->format('Y-m-d');
                            $diff = abs(strtotime($current_package[0]["expired_on"]) - strtotime($curdate));
                             $months = floor(($diff - $years * 365 * 60 * 60 * 24) / (30 * 60 * 60 * 24));
                            //$years = floor($diff / (365*60*60*24));
                            //$days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
                            //printf("%d years, %d months, %d days\n", $years, $months, $days);
                            ?>
                            <span id="pckremainingmoths">
                                <?php echo $months; ?>
                            </span>
                        <span class="gray"> Months ( Remaining ) </span>
                        
                        </div>
                         <?php $date = new DateTime($current_package[0]["expired_on"]);
                            $curexpiredate=$date->format('Y-m-d'); ?> 
                        <div class="statistics_preference_box_content acenter"> <span class="red2" id="currentexpiredate" currentexpiredate="<?php echo $curexpiredate; ?>">
                            <?php echo $curexpiredate; ?></span>  </div>
                    </div>

                    <div class="preference_bottom_content_wrap">
                        <div class="preference_module_names acenter"> <span class="dark_gray"> Renewal Package Name </span> <br> <strong>  <?php echo $new_package[0]["newpackagename"];?> </strong> </div>
                        <div class="statistics_preference_box_content acenter"> <span id="remainingproducts"><?php echo $current_package[0]["total_products"];?></span>  +  <span id="newproducts" newproducts="<?php echo $new_package[0]["newpackageProducts"];?>"><?php echo $new_package[0]["newpackageProducts"];?></span> </div>
                        <div class="statistics_preference_box_content acenter"> 
                            <select id="pckduretion">
                                <option value="6">6 Month</option>
                                <option value="12">1 Year</option>
                                <option value="24">2 Year</option>
                                <option value="36">3 Year</option>
                            </select>
                        
                        </div>
                        <div class="statistics_preference_box_content acenter" id="newexpiredate">  -- </div>
                    </div>

                    <div class="preference_bottom_content_wrap_highleted_box">
                        <div class="preference_module_names_highlated acenter">  Current Package with carry over  </div>
                        <div class="statistics_preference_box_content bold acenter" id="totalproducts">  <?php echo $current_package[0]["total_products"]+ $new_package[0]["newpackageProducts"];?>  </div>
                        <div class="statistics_preference_box_content bold acenter" id="totalmonth">  -- </div>
                        <div class="statistics_preference_box_content bold acenter" id="expiredate">  -- </div>
                    </div>

                </div>

                <h1>Price : $ <price id="pckprice" pckprice="<?php echo $new_package[0]["newpackageprice"];?>"><?php echo $new_package[0]["newpackageprice"];?></price> </h1>
                <p class="flr mat20"><a class="btn btn-primary btn-large" id="Upgradepack"> Upgrade </a></p>
            </div>
        </div>
    </div>
    <div class="oneshop_right_newcontainer">
        <?php
        $this->load->module("suggestions");
        $this->suggestions->getStoreSuggestions();
        $this->suggestions->getProductSuggestions();
        ?>
    </div>
</div>

<?php
$this->templates->app_footer();
?>

<script type="text/javascript" src="<?php echo base_url();?>assets/microjs/upgradepackage.js"></script>
