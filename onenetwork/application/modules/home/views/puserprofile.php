<?php
$this->load->module("templates");
$this->templates->coheader();
?>




<div class="clearfix"></div>

<div class="codes_module_container_wrap_bgimages_fixed">
    <div class="codes_module_container_wrap_transparent_wrap">
        <div class="wrapper-inner">

            <div class="j-left-container">
                <!--<div class="fll overflow wi100pstg mab15"> <h2 class="mat8 border_bottom wi100pstg fll white pab10 overflow"> My Applied Jobs  </h2> </div>-->

                <div class="wi100pstg fll overflow">


                    <div class="dealer-cover-banner">
                        <div class="dealer-cover-logo"> 
                            <?php if( $udata[0]['img_path']!=""){
                                ?>
                            <img class="dealer-cover-logo-image" src="<?php echo ONEIDNET_URL."data/" . $udata[0]['img_path'];?>">
                                    <?php
                            }else{
                                ?>
                            <img class="dealer-cover-logo-image" src="<?php // echo base_url()."assets/"?>images/noimage.png"> 
                                    <?php
                            } ?>
                            
                            
                            
                        </div>
                            
                        <div class="dealer-cover-name">
                            <div class="fll">
                                <h2 class="white"><?php echo $udata[0]['user_name']; ?></h2>
                                <!--<div class="wi100pstg white mat5"> <p class="fll bold"> Followers : </p> <p class="fll"> 2400 </p> </div>-->
                            </div>

                        </div>
                        <img class="dealer-cover-image" src="<?php echo base_url()."assets/"?>images/mercedes.jpg">
                    </div>

                    <div class="fll wi100pstg mat20">

                        <div class="company-nav">
                            <ul>
                                <li ><a><?php echo $udata[0]["user_name"];?> Following Companies</a> </li>
                            </ul>
                        </div>
                        
                        
                        
                        
                        
                        
                        
                        


            

                        
                        
                        
                        
                        
                        
            <div class="fll wi100pstg mat20" id="myfollowingjobssec"  >
                <div class="fll wi100pstg">
                    <h2 class="dx_des_mab10 wi100pstg white mab15 dx_des_borderbottom2 fll dx_des_pab10"> My Fallowing Companies </h2>
                    <div class="wi100pstg fll">

                        <?php
//                        print_R(falloingcompaniespuserprofile);die();
                        if ($falloingcompanies != 0) {
                            foreach ($falloingcompanies as $falloingcompaniesinfo) {
                                ?>
                                <div class="auction_box_leftimage cmpdiv<?php echo $falloingcompaniesinfo["company_aid"]; ?>">
                                    <div class="auction_box">
                                        <div class="auction_box_inside">
                                            <a href="<?php echo base_url() . "profile/companyProfile/" . bin2hex($falloingcompaniesinfo["company_aid"]); ?>">
                                                <div class="auction_box_inside_bottom_wrap"> <?php echo $falloingcompaniesinfo["company_name"]; ?>  </div>
                                            </a>
                                            <p class="auction_box_inside_imagediv"> 
                                                <a href="<?php echo base_url() . "profile/companyProfile/" . bin2hex($falloingcompaniesinfo["company_aid"]); ?>">
                                                    <img src="<?php
                                                    if ($falloingcompaniesinfo["logo_path"]) {
                                                        echo base_url() . "data/images/logo/orig/" . $falloingcompaniesinfo["logo_path"];
                                                    } else {
                                                        echo base_url() . "assets/images/noimage.png";
                                                    }
                                                    ?>">
                                                </a>   
                                            </p>

                                        </div>
                                    </div>
                                </div>
                                <?php
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>

                        
                        

                        
                    </div>
                </div>
            </div>





            <div class="j-right-container mat30">
                <?php
                $sugobj = $this->load->module("suggestions");
                $sugobj->companySuggestion();
                $sugobj->jobSuggestion();
                ?>
            </div>



        </div>



        <?php
        $this->templates->footer();
        ?>
