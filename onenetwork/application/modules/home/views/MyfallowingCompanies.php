<?php
//echo "<pre>";print_R($falloingcompanies[0]);echo "</pre>";
$this->load->module("templates");
$this->templates->coheader();
?>
<?php // echo "<pre>";print_R($jobdata);echo "</pre>";?>
<div class="clearfix"></div>

<div class="codes_module_container_wrap">
    <div class="wrapper-inner">

        <div class="j-left-container">
            <div class="fll overflow wi100pstg mab15"> <h2 class="mat8 border_bottom wi100pstg fll pab10 overflow"> Companies I Follow  </h2> </div>

            <?php if($falloingcompanies!=0){
                foreach($falloingcompanies as $falloingcompaniesinfo){
                    ?>
            <div class="auction_box_leftimage cmpdiv<?php echo $falloingcompaniesinfo["company_aid"];?>">
                    <div class="auction_box">
                        <div class="auction_box_inside">
                            <a href="<?php echo base_url()."profile/companyProfile/".bin2hex($falloingcompaniesinfo["company_aid"]); ?>">
                            <div class="auction_box_inside_bottom_wrap"> <?php echo $falloingcompaniesinfo["company_name"];?>  </div>
                            </a>
                            <p class="auction_box_inside_imagediv"> 
                                <a href="<?php echo base_url()."profile/companyProfile/".bin2hex($falloingcompaniesinfo["company_aid"]);?>">
                                <img src="<?php 
                                if($falloingcompaniesinfo["logo_path"]){
                                 echo base_url()."data/images/logo/orig/".$falloingcompaniesinfo["logo_path"];   
                                }else{
                                    echo base_url()."assets/images/noimage.png";   
                                }?>">
                                </a>   
                            </p>

                            <div class="followandunfollow_box">
                                <!--<p class="fll"><input class="button_new" value="Follow" type="button"> </p>--> 
                                
                                <p class="flr"><input class="button_new uncmpnyfallow" value="UnFollow " ccid="<?php echo $falloingcompaniesinfo["company_aid"]; ?>" type="button"> </p> 
                            </div>
                        </div>
                    </div>
                </div>
                        <?php
                }
 
            }
            else { echo "<h2>No following Companies</h2>";}
            
            ?>

            
        </div>
        <div class="j-right-container mat30">
            <?php 
$sugobj=$this->load->module("suggestions");
$sugobj->companySuggestion();
$sugobj->jobSuggestion();
?>
        </div>
    </div>
    <?php
    $this->templates->footer();
    ?>
