<?php
	$this->load->module('templates');
	$this->templates->header();
	$this->templates->onenet_header();
        $dashboard_url=base_url()."overview/promotion_dashboard?promo_id=".$promoDetails[0]["rec_aid"];
?>
<div class="clr">&nbsp;</div>
<div class="new_wrapper">
    <div class="ondes_wrapper_main">
		<div class="ondes_module_container_wrap">
			<!--module_container start here-->
			<div class="ondes_wrapper_inner minheight600">
				<!--wrapper inner start here-->
				<div class="oneshop_getstarted_bgwrap mab30">
					<?php
					$this->load->module('campaigns');
					$pDetails = $promoDetails[0];
					$entityDetails = $this->campaigns->getEntityDetails($pDetails['promo_type'], $pDetails['entity_id']);
					$audienceDetails = $this->campaigns->getAudienceDetails($pDetails['transaction_id_fk']);
//                                      echo "<pre>";  print_R($audienceDetails);echo "</pre>"; die();
					?>

					<div class="Table">
						<div class="fll wi100pstg pab5 borderbottom">
							<p class="mat10 fll" style="width:50px; height:44px;"> <img width="50" height="44" src="<?php echo base_url().'assets/images/back/oneidship.png';?>"></p>
							<div class="fll mal10">
								<h3 class="fs24 mat10 normal pab5 bold"> <a><?php echo $pDetails['promo_name']; ?></a> </h3>
                                                                <h3 class="fll normal">Promotion Code : <?php echo $pDetails['promo_code']; ?> </h3><a href="<?php echo $dashboard_url;?>">( Show me Promotion Dashboard )</a>
							</div>

							<div class="flr mal10 mat10">
								<h3 class="mat10 normal pab5"><span> Created on :</span> <span class="fs11"> <?php echo date('M d , Y H:i A', strtotime($pDetails['created_on']) ); ?> </span> </h3>
								<h3 class="flr normal"> <span> Promotion Running Status : </span> 
                                                                    <?php
                                                                    $today = date("Y-m-d");
                                                                     $expire = $pDetails["promotion_end_time"];
                                                                    $today_time = strtotime($today);
                                                                    $expire_time = strtotime($expire);
                                                                    if ($expire_time > $today_time) { 
                                                                    ?>
                                                                    <span class="green"> <strong>Active</strong></span> 
                                                                        <?php   
                                                                    }else{ ?>
                                                                    <span class="red"> <strong>InActive</strong></span> 
                                                                        <?php                                                                        
                                                                    }
                                                                    ?>
                                                                </h3>
							</div>
						</div>
					</div>
					<div class="Table">
						<p class="fs18 bold mat20 fll wi100pstg pab10  mab30">  Promotion Basic Info  </p>
						<div class="audience_lab wi380 fll mal40 overflow">
							<div class="fll form_width mab10">
								<p class="label_name fs18"> <?php echo $pDetails['promo_name']; ?> </p>
								<p class="label_name fs12 gray"> Promotion Name </p>
							</div>
							<div class="fll form_width mab10">
								<p class="label_name fs18"> <?php echo ucwords(strtolower(str_replace("_"," ",$pDetails['promo_type']))); ?> </p>
								<p class="label_name fs12 gray"> Promotion Type </p>
							</div>

							<div class="fll form_width mab10">
								<p class="label_name fs18"> <a><?php echo $entityDetails['field_value']; ?></a> </p>
								<p class="label_name fs12 gray"> <?php echo ucwords(strtolower(str_replace("_"," ",$entityDetails['field_name']))); ?> </p>
							</div>
							<div class="fll form_width mab10">
								<p class="label_name fs18"> <?php echo "INR ". $pDetails['total_cost']; ?> </p>
								<p class="label_name fs12 gray"> Total Budget </p>
							</div>
							<div class="fll form_width mab10">
								<p class="label_name fs18"> <?php echo $pDetails['total_targets']; ?>  Peoples </p>
								<p class="label_name fs12 gray"> Total Targets </p>
							</div>
						</div>
						<div class="audience_lab wi380 fll pal40 overflow" style="border-left:1px #ccc solid;">
							<div class="fll form_width mab10">
								<p class="label_name fs18"> <?php echo date('M d , Y H:i A', strtotime($pDetails['promotion_start_time']) ); ?>   </p>
								<p class="label_name fs12 gray"> Promotion Start Date </p>
							</div>


							<div class="fll form_width mab10">
								<p class="label_name fs18"> <?php echo date('M d , Y H:i A', strtotime($pDetails['promotion_end_time']) ); ?> </p>
								<p class="label_name fs12 gray"> Promotion End Date </p>
							</div>

							<div class="fll form_width mab10">
								<p class="label_name fs18"> <?php
									$datediff = strtotime($pDetails['promotion_end_time']) - strtotime($pDetails['promotion_start_time']);
									echo floor($datediff/(60*60*24));

								?> Days </p>
								<p class="label_name fs12 gray"> Duration </p>
							</div>
							<div class="fll form_width mab10">
								<p class="label_name fs18"> <?php
									$payDetails = $this->campaigns->getPaymentDetails($pDetails['transaction_id_fk']);
									echo  date('M d , Y H:i A', strtotime($payDetails['transaction_time']) );

								?></p>
								<p class="label_name fs12 gray"> Payment On </p>
							</div>

							<div class="fll form_width mab10">
								<p class="label_name fs18"> <?php echo $this->campaigns->getCountryName($pDetails['country_launched_from']); ?> </p>
								<p class="label_name fs12 gray"> Applicable Country for Pricings </p>
							</div>
						</div>
					</div>
					<div class="Table">
						<p class="fs18 bold mat20 fll wi100pstg pab10  mab30">  Audience Lab Details  </p>
						<div class="audience_lab wi380 fll mal40 overflow">
							<div class="fll form_width mab10">
								<p class="label_name fs18"> 
                                                                    <?php if($audienceDetails['age_group']){
                                                                        echo $audienceDetails['age_group'];        
                                                                    }else{
                                                                        echo "<span class='red'>Not Set by User</span>";
                                                                    }                                                                
                                                                 ?>
                                                                </p>
								<p class="label_name fs12 gray"> Age </p>
							</div>
							<div class="fll form_width mab10">
								<p class="label_name fs18"> 
                                                                    
                                                                            <?php if($audienceDetails['gender']){
                                                                        echo $audienceDetails['gender'];        
                                                                    }else{
                                                                        echo "<span class='red'>Not Set by User</span>";
                                                                    }                                                                
                                                                 ?>

                                                                </p>
								<p class="label_name fs12 gray"> Gender </p>
							</div>

							<div class="fll form_width mab10">
								<p class="label_name fs18">
                                                                        <?php if($audienceDetails['marital_status']){
                                                                        echo $audienceDetails['marital_status'];        
                                                                    }else{
                                                                        echo "<span class='red'>Not Set by User</span>";
                                                                    }                                                                
                                                                 ?>
                                                                </p>
								<p class="label_name fs12 gray"> Relationship Status </p>
							</div>
							<div class="fll form_width mab10">
								<p class="label_name fs18"> 
                                                                        <?php if($audienceDetails['interest_entities']){
                                                                        echo $audienceDetails['interest_entities'];        
                                                                    }else{
                                                                        echo "<span class='red'>Not Set by User</span>";
                                                                    }                                                                
                                                                 ?>
                                                                </p>
								<p class="label_name fs12 gray"> Interest </p>
							</div>
						</div>
						<div class="audience_lab wi380 fll pal40 overflow" style="border-left:1px #ccc solid;">
							<div class="fll form_width mab10">
								<p class="label_name fs18">
                                                                     <?php if($audienceDetails['languages_knows'] && $audienceDetails['languages_knows']!=0){
                                                                         $lg="";
                                                                         $lagdtl=$audienceDetails['languages_knows'];

                                                                        foreach( $lagdtl as $laginfo){
                                                                            $lg.=$laginfo["language_name"].",";
                                                                        }   
                                                                        echo rtrim($lg,",");
                                                                    }else{
                                                                        echo "<span class='red'>Not Set by User</span>";
                                                                    }                                                                
                                                                 ?>

                                                                </p>
								<p class="label_name fs12 gray"> Languages Known </p>
							</div>
							<div class="fll form_width mab10">
								<p class="label_name fs18"> 
                                                                      <?php if($audienceDetails['country_id_str'] && $audienceDetails['country_id_str']!=0){
                                                                                $lg="";
                                                                         $lagdtl=$audienceDetails['country_id_str'];
                                                                        foreach( $lagdtl as $laginfo){
                                                                            $lg.=$laginfo["country_name"].",";
                                                                        }   
                                                                        echo rtrim($lg,",");
                                                                    }else{
                                                                        echo "<span class='red'>Not Set by User</span>";
                                                                    }                                                                
                                                                 ?>
                                                                </p>
								<p class="label_name fs12 gray"> Nationality </p>
							</div>
							<div class="fll form_width mab10">
								<p class="label_name fs18"> 
                                                            <?php if($audienceDetails['city_id_str'] && $audienceDetails['city_id_str']!=0){
                                                                       $lg="";
                                                                         $lagdtl=$audienceDetails['city_id_str'];
                                                                        foreach( $lagdtl as $laginfo){
                                                                            $lg.=$laginfo["city_name"].",";
                                                                        }   
                                                                        echo rtrim($lg,",");
                                                                    }else{
                                                                        echo "<span class='red'>Not Set by User</span>";
                                                                    }                                                                
                                                                 ?>
 
                                                                </p>
								<p class="label_name fs12 gray"> Location </p>
							</div>
							<div class="fll form_width mab10">
								<p class="label_name fs18"><?php 
                                                                
                                                             if($audienceDetails['exact_entities_ids'] && $audienceDetails['exact_entities_ids']!=0){
                                                                       $lg="";
                                                                         $lagdtl=$audienceDetails['exact_entities_ids'];
                                                                        foreach( $lagdtl as $laginfo){
                                                                            $lg.=$laginfo["page_name"].",";
                                                                        }   
                                                                        echo rtrim($lg,",");
                                                                    }else{
                                                                        echo "<span class='red'>Not Set by User</span>";
                                                                    } ?> 
                                                                </p>
								<p class="label_name fs12 gray"> Exact Entity Names </p>
							</div>
						</div>
					</div>
					<div class="Table">
						<p class="fs18 bold mat20 fll wi100pstg pab10  mab30">  Payment Information  </p>
						<!--<div class="audience_lab wi380 fll pal40 overflow" style="border-left:1px #ccc solid;">-->
						<div class="audience_lab wi380 fll mal40 overflow">
							<div class="fll form_width mab10">
								<p class="label_name fs18"> <a><?php echo $payDetails['card_name']; ?></a> </p>
								<p class="label_name fs12 gray"> Card Name </p>
							</div>
							<div class="fll form_width mab10">
								<p class="label_name fs18"> <?php echo $payDetails['cur_name']; ?> </p>
								<p class="label_name fs12 gray"> Payment in Currency </p>
							</div>
						</div>
						<div class="audience_lab wi380 fll pal40 overflow" style="border-left:1px #ccc solid;">
							<div class="fll form_width mab10">
								<p class="label_name fs18"> <a><?php echo $payDetails['transaction_code']; ?></a> </p>
								<p class="label_name fs12 gray"> Transaction Number </p>
							</div>
							<div class="fll form_width mab10">
								<p class="label_name fs18"> <?php echo $payDetails['status']; ?> </p>
								<p class="label_name fs12 gray"> Payment Status </p>
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
	<?php $this->templates->right_container(); ?>
</div>
<!--module container end here-->
<?php
$this->templates->footer();
?>
