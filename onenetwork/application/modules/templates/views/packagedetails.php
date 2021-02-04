 
<div class="coofc_packageTypeWrapper">
    <?php if(isset($message)){?>
    <div class="coofc_packageHeader"><?php echo $message; ?></div>
    <?php }else{ ?>
                        <div class="coofc_packageHeader">Small Package<h4><?php $this->load->module('home');$this->home->currencySymbol($package[0]['price'],$country_id); ?></h4></div>
                        <div class="coofc_packageFeatureWrapper">
                            <span class="coofc_packageFeatureName">Admin</span>
                            <span class="coofc_packageFeatureValue"><?php echo $package[0]['admin'];?></span>
                        </div>
                        <div class="coofc_packageFeatureWrapper">
                            <span class="coofc_packageFeatureName">Hr</span>
                            <span class="coofc_packageFeatureValue"><?php echo $package[0]['hr'];?></span>
                        </div>
                        <div class="coofc_packageFeatureWrapper">
                            <span class="coofc_packageFeatureName">Virtualization</span>
                            <span class="coofc_packageFeatureValue"><?php echo $package[0]['virtualization'];?></span>
                        </div>
                        <div class="coofc_packageFeatureWrapper">
                            <span class="coofc_packageFeatureName">Job Postings</span>
                            <span class="coofc_packageFeatureValue"><?php echo $package[0]['job_post'];?></span>
                        </div>
                        <div class="coofc_packageFeatureWrapper">
                            <span class="coofc_packageFeatureName">CV Downloads</span>
                            <span class="coofc_packageFeatureValue"><?php echo $package[0]['cv_download'];?></span>
                        </div>
                        <div class="coofc_packageFeatureWrapper">
                            <span class="coofc_packageFeatureName">Search Candidates</span>
                            <span class="coofc_packageFeatureValue"><?php echo $package[0]['search_tool'];?></span>
                        </div>
                        <div class="coofc_packageFeatureWrapper">
                            <span class="coofc_packageFeatureName">V-COM Call Duration</span>
                            <span class="coofc_packageFeatureValue"><?php echo $package[0]['vcom_max_call_duration'];?></span>
                        </div>
                        <div class="coofc_packageFeatureWrapper">
                            <span class="coofc_packageFeatureName">V-COM Redail Attempts</span>
                            <span class="coofc_packageFeatureValue"><?php echo $package[0]['vcom_redial_attempt'];?></span>
                        </div>
                        <div class="coofc_packageFeatureWrapper">
                            <span class="coofc_packageFeatureName">Requests for Interviews</span>
                            <span class="coofc_packageFeatureValue"><?php echo $package[0]['total_request_for_interview'];?></span>
                        </div>
                        
    <?php } ?>          
                    </div>
