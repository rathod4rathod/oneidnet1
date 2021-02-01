<?php
$this->load->module('templates');
$this->templates->app_header();
$this->templates->os_mainmenu();
?>
<link rel="stylesheet" href="<?php echo base_url() . "/assets/"; ?>css/contributors.css" type="text/css">
<div class="oneshop_container_middle_section mat10">
    <div class="oneshop_left_newcontainer pab10">
        <div class="popupbox_new_wrapper">
            <div class="fll borderbottom mab30 pab5 mat10 wi100pstg">
                <h2>  Package History  </h2>
            </div>
            <div class="wi100pstg fll">
                <div class="table-form">
                    <div style="width:40%; float:left;">
                        <span class="fll black fs14 mar10 lh26"> STORE </span>
                        <div class="box-left fll" style="width:65%;">
                            <select id="stores">
                                <option value="ALLSTORES">All Stores</option>
                                <?php if($storesdtl!=0){
                                    foreach($storesdtl as $storesinfo){
                                        ?>
                                <option value="<?php echo $storesinfo["store_aid"];?>"><?php echo $storesinfo["store_name"];?></option>
                                            <?php
                                    }
                                }else{
                                    ?>
                                <option value="">Empty</option>
                                        <?php
                                } ?>
                                
                            </select>
                        </div>
                    </div>
                    <div style="width:40%; float:left; margin:0 0 0 5%;">
                        <span class="fll black fs14 mar10 lh26"> PACKAGE </span>
                        <div class="box-left fll" style="width:65%;">
                            <select id="packages">
                                <option value="ALLPACKAGES"> All Packages</option>
                                <?php
                                if($packagedtls!=0){
                                    foreach($packagedtls as $packageinfo){
                                        ?>
                                <option value="<?php echo $packageinfo["package_id_fk"];?>"><?php echo $packageinfo["package_name"];?></option>
                                            <?php                                        
                                    }                                    
                                }?>
                                
                            </select>
                        </div>
                    </div>
                    <div class="flr">
                        <!--<p class="flr"><a href="#" class="btn white btn-primary btn-large"> SEARCH </a></p>-->
                    </div>
                </div><div class="clr"></div>
                <div id="packagehistory"> 
                    <!--package history loading heare-->
                </div>                
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

<script type="text/javascript" src="<?php echo base_url();?>assets/microjs/storePackageHistory.js"></script>