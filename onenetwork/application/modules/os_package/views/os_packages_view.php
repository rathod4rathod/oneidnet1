<?php
$prm = "";
$this->load->module('templates');
$this->templates->header();
$this->templates->onenet_header("packages");
$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
$oneshop_url = ONESHOPURL . 'create_store';
if ($type) {
    $oneshop_url = ONESHOPURL . 'packages/upgradePackage';
    $prm = "/" . $type . "/" . $str;
}
?>
<div class="new_wrapper">
    <div class="ondes_wrapper_main">
        <div class="ondes_module_container_wrap">
            <!--module_container start here-->
            <div class="ondes_wrapper_inner minheight600">
                <!--wrapper inner start here-->
                <div class="oneshop_getstarted mat30">
                    <div class="oneshop_getstarted_bgwrap mat40 mab30" style="position:relative; margin-top:-5%;">
                        <h1 class="acenter normal fs24" style="width:700px; border-bottom:1px #ccc solid; padding:0 0 10px 0; margin:30px auto; 

line-height:32px;"> ONESHOP PACKAGES </h1>
                        <div class="boxesnewleft_wrap">
                            <div style="margin-top:40px;" class="pricing-wrapper clearfix">
                                <div class="pricing-table">
                                    <h3 class="pricing-title vertical-text"  style="background-color:#09F;"> <br>
                                        <?PHP echo $stores_info[0]['remark']; ?> </h3>
                                    <div class="price">

                                        <p> <?PHP echo $stores_info[0]['name']; ?> <br><sup><?PHP
                                                $price = number_format($stores_info[0]['price']/100,2,',','.');
                                                echo  "$".$price."&nbsp";
                                                ?>/ Month</sup></p></div>


                                    <!-- Lista de Caracteristicas / Propiedades -->
                                    <ul class="table-list">
                                        <li>Add upto <b><?PHP echo $stores_info[0]['total_products']; ?></b>  products </li>                         

               
                                        <li><span class="blue"><b>Price Breakdown</b></span></li>
                                        <li><span>Store Site Operation &nbsp;</span><?PHP echo "$".number_format($stores_info[0]

['store_site_operation']/100,2,'.',''); ?></li>
                                        <li><span>Store Maintenance &nbsp;</span><?PHP echo "$".number_format($stores_info[0]

['store_maintainance']/100,2,'.',''); 

?> </li>
                                        <li> <span>Sales Percentage Charge &nbsp;</span><?PHP echo $stores_info[0]['initial_percentage_on_sale'] * 

100; ?> %</li>
                                        <li> <span>Store Data Storage &nbsp;</span><?PHP echo "$".number_format($stores_info[0]

['store_data_storage']/100,2,'.',''); ?></li>
                                    </ul>
                                    <!-- Contratar / Comprar -->
                                    <div class="table-buy"> <a href="<?PHP echo $oneshop_url . '/' . $stores_info[0]['package_id'] . $prm ?>" 

class="pricing-action oneshopdev_plan" id="<?PHP echo $stores_info[0]['package_id']; ?>" class="pricing-action">Select Plan</a> </div>
                                </div>

                                <div class="pricing-table">
                                    <h3 class="pricing-title vertical-text" style="background-color:#F0F;"> <br>
                                            <?PHP echo $stores_info[1]['remark']; ?></h3>
                                    <div class="price"  > <?PHP echo $stores_info[1]['name']; ?> <br><sup><?PHP
                                            $price = number_format($stores_info[1]['price']/100,2,'.','');
                                             echo  "$".$price."&nbsp";
                                                ?>/ Month</sup></div>
                                    <ul class="table-list">
                                        <li>Add upto <b><?PHP echo $stores_info[1]['total_products']; ?></b>  products </li>                         

               
                                        <li><span class="blue"><b>Price Breakdown</b></span></li>
                                        <li> <span>Store Site Operation &nbsp;</span><?PHP echo "$".number_format($stores_info[1]

['store_site_operation']/100,2,'.',''); ?></li>
                                        <li><span>Store Maintenance &nbsp;</span><?PHP echo "$".number_format($stores_info[1]

['store_maintainance']/100,2,'.',''); 

?> </li>
                                        <li><span>Sales Percentage Charge &nbsp;</span><?PHP echo number_format($stores_info[1]['initial_percentage_on_sale'] * 

100); ?> %</li>
                                        <li><span>Store Data Storage &nbsp;</span><?PHP echo "$".number_format($stores_info[1]

['store_data_storage']/100,2,'.',''); 

?> </li>
                                    </ul>

                                    <div class="table-buy"> <a href="<?PHP echo $oneshop_url . '/' . $stores_info[1]['package_id'] . $prm ?>" 

class="pricing-action oneshopdev_plan" id="<?PHP echo $stores_info[1]['package_id']; ?>" >Select Plan </a> </div>
                                </div>


                                <div class="pricing-table">
                                    <h3 class="pricing-title vertical-text" style="background-color:#C00;"> <br>
                                            <?PHP echo $stores_info[2]['remark']; ?></h3>
                                    <div class="price"  > <?PHP echo $stores_info[2]['name']; ?> <br><sup><?PHP
                                            $price = number_format($stores_info[2]['price']/100,2,'.','');
                                            echo  "$".$price."&nbsp";
                                                ?>/ Month</sup></div>
                                    <ul class="table-list">
                                        <li>Add upto <b><?PHP echo $stores_info[2]['total_products']; ?></b>  products </li>  
                                        <li><span class="blue"><b>Price Breakdown</b></span></li>
                                        <li> <span>Store Site Operation &nbsp;</span><?PHP echo "$".number_format($stores_info[2]

['store_site_operation']/100,2,'.',''); ?></li>
                                        <li><span>Store Maintenance &nbsp;</span><?PHP echo "$".number_format($stores_info[2]

['store_maintainance']/100,2,'.',''); 

?></li>
                                        <li><span>Sales Percentage Charge &nbsp;</span><?PHP echo $stores_info[2]['initial_percentage_on_sale'] * 

100; ?> %</li>
                                        <li><span>Store Data Storage &nbsp;</span><?PHP echo "$".number_format($stores_info[2]

['store_data_storage']/100,2,'.',''); 

?> </li>
                                    </ul>
                                    <div class="table-buy"> <a href="<?PHP echo $oneshop_url . '/' . $stores_info[2]['package_id'] . $prm ?>" 

class="pricing-action oneshopdev_plan" id="<?PHP echo $stores_info[2]['package_id']; ?>">Select Plan </a> </div>
                                </div>
                                <div class="pricing-table" style="    margin-top: 30px;">
                                    <h3 class="pricing-title vertical-text"  style="background-color:#03F;"> <br>
                                            <?PHP echo $stores_info[3]['remark']; ?></h3>
                                    <div class="price"  > <?PHP echo $stores_info[3]['name']; ?> <br><sup><?PHP
                                            $price = number_format($stores_info[3]['price']/100,2,'.','');
                                            echo  "$".$price."&nbsp";
                                                ?>/ Month</sup></div>
                                    <ul class="table-list">
                                        <li>Add upto <b><?PHP echo $stores_info[3]['total_products']; ?></b>  products </li>   
                                        <li><span class="blue"><b>Price Breakdown</b></span></li>
                                        <li> <span>Store Site Operation &nbsp;</span><?PHP echo "$".number_format($stores_info[3]

['store_site_operation']/100,2,'.',''); ?></li>
                                        <li><span>Store Maintenance &nbsp;</span><?PHP echo "$".number_format($stores_info[3]

['store_maintainance']/100,2,'.',''); 

?> </li>
                                        <li><span>Sales Percentage Charge &nbsp;</span><?PHP echo $stores_info[3]['initial_percentage_on_sale'] * 

100; ?> %</li>
                                        <li><span>Store Data Storage &nbsp;</span><?PHP echo "$".number_format($stores_info[3]

['store_data_storage']/100,2,'.',''); 

?> </li>
                                    </ul>
                                    <div class="table-buy"> <a href="<?PHP echo $oneshop_url . '/' . $stores_info[3]['package_id'] . $prm ?>" 

class="pricing-action oneshopdev_plan" id="<?PHP echo $stores_info[3]['package_id']; ?>">Select Plan </a> </div>
                                </div>
                                <div class="pricing-table" style="margin-top:30px;">
                                    <h3 class="pricing-title vertical-text" style="background-color:#F0F;"> 
                                        <br><?PHP echo $stores_info[4]['remark']; ?></h3>
                                    <div class="price"  > <?PHP echo $stores_info[4]['name']; ?> <br><sup><?PHP
                                            $price = number_format($stores_info[4]['price']/100,2,'.','');
                                            echo  "$".$price."&nbsp";
                                                ?>/ Month</sup></div>
                                    <ul class="table-list">
                                        <li>Add upto <b><?PHP echo $stores_info[4]['total_products']; ?></b>  products </li>    
                                        <li><span class="blue"><b>Price Breadown</b></span></li>
                                        <li> <span>Store Site Operation &nbsp;</span><?PHP echo "$".number_format($stores_info[4]

['store_site_operation']/100,2,'.',''); ?></li>
                                        <li><span>Store Maintenance &nbsp;</span><?PHP echo "$".number_format($stores_info[4]

['store_maintainance']/100,2,'.',''); 

?></li>
                                        <li><span>Sales Percentage Charge &nbsp;</span><?PHP echo $stores_info[4]['initial_percentage_on_sale'] * 

100; ?> %</li>
                                        <li><span>Store Data Storage &nbsp;</span><?PHP echo "$".number_format($stores_info[4]

['store_data_storage']/100,2,'.',''); 

?></li>
                                    </ul>
                                    <div class="table-buy"> <a href="<?PHP echo $oneshop_url . '/' . $stores_info[4]['package_id'] . $prm ?>" 

class="pricing-action oneshopdev_plan" id="<?PHP echo $stores_info[4]['package_id']; ?>">Select Plan </a> </div>

                                </div>


                                <div class="pricing-table" style="margin-top:30px;">
                                    <h3 class="pricing-title vertical-text" style="background-color:#C00;"> <br>
<?PHP echo $stores_info[5]['remark']; ?></h3>
                                    <div class="price"  > <?PHP echo $stores_info[5]['name']; ?> <br><sup><?PHP
$price =number_format($stores_info[5]['price']/100,2,'.','');
echo  "$".$price."&nbsp";
                                                ?>/ Month</sup></div>
                                    <ul class="table-list">
                                        <li>Add upto <b><?PHP echo $stores_info[5]['total_products']; ?></b>  products  </li>    
                                        <li><span class="blue"><b>Price Breakdown</b></span></li>
                                        <li><span>Store Site Operation &nbsp;</span><?PHP echo "$".number_format($stores_info[5]

['store_site_operation']/100,2,'.',''); ?> </li>
                                        <li><span>Store Maintenance &nbsp;</span><?PHP echo "$".number_format($stores_info[5]

['store_maintainance']/100,2,'.',''); 

?></li>
                                        <li> <span>Sales Percentage Charge  &nbsp;</span><?PHP echo $stores_info[5]['initial_percentage_on_sale'] * 

100; ?> %</li>
                                        <li><span>Store Data Storage  &nbsp;</span><?PHP echo "$".number_format($stores_info[5]

['store_data_storage']/100,2,'.',''); ?></li>
                                    </ul> 
                                    <div class="table-buy"> <a href="<?PHP echo $oneshop_url . '/' . $stores_info[5]['package_id'] . $prm; ?>" 

class="pricing-action oneshopdev_plan" id="<?PHP echo $stores_info[5]['package_id']; ?>">Select Plan </a> </div>
                                </div>

                                <div class="pricing-table" style="    margin-top: 30px;">
                                    <h3 class="pricing-title vertical-text"  style="background-color:#03F;"> <br>
<?PHP echo $stores_info[6]['remark']; ?></h3>
                                    <div class="price"  > <?PHP echo $stores_info[6]['name']; ?> <br><sup><?PHP
$price = number_format($stores_info[6]['price']/100,2,'.','');
echo  "$".$price."&nbsp";
                                                ?>/ Month</sup></div>
                                    <ul class="table-list">
                                        <li>Add upto <b><?PHP echo $stores_info[6]['total_products']; ?></b>  products </li>    
                                        <li><span class="blue"><b>Price Breakdown</b></span></li>
                                        <li><span> Store Site Operation &nbsp;</span><?PHP echo "$".number_format($stores_info[6]

['store_site_operation']/100,2,'.',''); ?> </li>
                                        <li><span>Store Maintenance &nbsp;</span><?PHP echo "$".number_format($stores_info[6]

['store_maintainance']/100,2,'.',''); 

?></li>
                                        <li><span>Sales Percentage Charge &nbsp;</span><?PHP echo $stores_info[6]['initial_percentage_on_sale'] * 

100; ?> %</li>
                                        <li><span>Store Data Storage &nbsp;</span><?PHP echo "$".number_format($stores_info[6]

['store_data_storage']/100,2,'.',''); 

?></li>
                                    </ul>
                                    <div class="table-buy"> <a href="<?PHP echo $oneshop_url . '/' . $stores_info[6]['package_id'] . $prm; ?>" 

class="pricing-action oneshopdev_plan" id="<?PHP echo $stores_info[6]['package_id']; ?>">Select Plan </a> </div>
                                </div>

                                <div class="pricing-table" style="margin-top:30px;">
                                    <h3 class="pricing-title vertical-text" style="background-color:#F0F;"> <br>
<?PHP echo $stores_info[7]['remark']; ?></h3>
                                    <div class="price"  > <?PHP echo $stores_info[7]['name']; ?> <br><sup><?PHP
$price = number_format($stores_info[7]['price']/100,2,'.','');
echo  "$".$price."&nbsp";
                                                ?>/ Month</sup></div>
                                    <ul class="table-list">
                                        <li>Receive <b>Unlimited</b> orders   </li>
                                        <li>Add <b>Unlimited</b> products </li>          
                                        <li><span class="blue"><b>Price Breakdown</b></span></li>
                                        <li><span> Store Site Operation &nbsp;</span><?PHP echo "$".number_format($stores_info[7]

['store_site_operation']/100,2,'.',''); ?>  </li>
                                        <li><span>Store Maintenance  &nbsp;</span><?PHP echo "$".number_format($stores_info[7]

['store_data_storage']/100,2,'.',''); 

?></li>
                                        <li><span>Sales Percentage Charge  &nbsp;</span><?PHP echo $stores_info[7]['initial_percentage_on_sale'] * 

100; ?> %</li>
                                        <li><span>Store Data Storage  &nbsp;</span><?PHP echo "$".number_format($stores_info[7]

['store_data_storage']/100,2,'.',''); ?></li>
                                    </ul> 
                                    <div class="table-buy"> <a href="<?PHP echo $oneshop_url . '/' . $stores_info[7]['package_id'] . $prm; ?>" 

class="pricing-action">Select Plan </a> </div>
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
    <!--wrapper main closed here-->
<?php
$this->templates->right_container();
?>
</div>
<?php
$this->templates->footer();
?>
