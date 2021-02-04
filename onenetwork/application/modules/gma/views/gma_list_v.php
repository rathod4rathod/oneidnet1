<?php
    $this->load->module('templates');
    $this->templates->header();
    $this->templates->onenet_header();
    $dashboard_url=base_url()."overview/gma_dashboard?campaign_id=".base64_encode(base64_encode($campaign_details[0]["rec_aid"]));        
?>
<div class="clr">&nbsp;</div>
<div class="new_wrapper">
    <div class="ondes_wrapper_main">
		<div class="ondes_module_container_wrap">
			<!--module_container start here-->
			<div class="ondes_wrapper_inner minheight600">
				<!--wrapper inner start here-->
				<div class="oneshop_getstarted_bgwrap mab30">
					

					<div class="Table">
						<div class="fll wi100pstg pab5 borderbottom">
							<p class="mat10 fll" style="width:50px; height:44px;"> 
                                                            <?php switch ($campaign_details[0]['module_target']) {
               
                case ONESHOP:
                     $pramotionimg =base_url().'assets/images/back/oneshop.png';
                    break;
                 case TUNNEL:
                     $pramotionimg =base_url().'assets/images/back/tunnel.png';
                    break; 
                
                case CLICK:
                    $pramotionimg =base_url().'assets/images/back/click.png';
                    break;
                case COFFICE:
                    $pramotionimg =base_url().'assets/images/back/cooffice.png';
                    break;
                case DEALERX:
                    $pramotionimg =base_url().'assets/images/back/dealerx.png';
                    break;
                case  BUZZIN:
                    $pramotionimg =base_url().'assets/images/back/buzzin.png';
                    break;
                case NETPRO:
                    $pramotionimg =base_url().'assets/images/back/netpro.png';
                    break; 
                case ONENETWORK:
                    $pramotionimg =base_url().'assets/images/back/onenetwork.png';
                    break; 
               case ONEIDNET:
                    $pramotionimg =base_url().'assets/images/oneidnetlogo.png';
                    break;
                 /* 
                    case 360MAIL:
                    $pramotionimg =base_url().'assets/images/oneidnetlogo.png';
                    break;
                    case ONEVISION:
                    $pramotionimg =base_url().'assets/images/oneidnetlogo.png';
                    break;
                    case ONEIDSHIP:
                    $pramotionimg =base_url().'assets/images/oneidnetlogo.png';
                    break; 
                    case FINDIT:
                    $pramotionimg =base_url().'assets/images/is-news.png';
                    break;
                    case CVBANK:
                    $pramotionimg =base_url().'assets/images/is-news.png';
                    break;
                    */
                default:
                    $pramotionimg =base_url().'assets/images/oneidnetlogo.png';
                } ?>
                                                            <img width="50" height="44" src="<?php echo $pramotionimg ;?>"></p>
							<div class="fll mal10">
								<h3 class="fs24 mat10 normal pab5 bold"> <a><?php echo $campaign_details[0]["campaign_name"];?></a> </h3>
                                                                <h3 class="fll normal">Campaign ID:<?php echo $campaign_details[0]["campaign_code"] ?></h3><a href="<?php echo $dashboard_url;?>">(See details)</a>
							</div>

							<div class="flr mal10 mat10">
								<h3 class="mat10 normal pab5"><span> Created on :</span> <span class="fs11"> <?php echo date('M d , Y H:i A',strtotime($campaign_details[0]["created_on"])); ?> </span> </h3>
								<h3 class="flr normal"> <span> Campaign Running Status : </span> <span class="green"><strong><?php if($campaign_details[0]['status'] == 'LOCKED') {?>Active<?php } else {?>Inactive <?php }?></strong></span>  </h3>
							</div>
						</div>
					</div>
					<div class="Table">
						<p class="fs18 bold mat20 fll wi100pstg pab10  mab30">  Compaign Basic Info  </p>
						<div class="audience_lab wi380 fll mal40 overflow">
							<div class="fll form_width mab10">
								<p class="label_name fs18"> <?php echo ucfirst($campaign_details[0]["campaign_name"]);?> </p>
								<p class="label_name fs12 gray"> Campaign Name </p>
							</div>
							<div class="fll form_width mab10">
								<p class="label_name fs18"> <?php echo ucfirst($campaign_details[0]["module_target"]) ?></p>
								<p class="label_name fs12 gray">Module Target  </p>
							</div>

							<div class="fll form_width mab10">
								<p class="label_name fs18"> <a><?php echo ucwords(strtolower(str_replace("_"," ",$campaign_details[0]['source_type']))); ?> </a> </p>
								<p class="label_name fs12 gray">Source Type </p>
							</div>
							<div class="fll form_width mab10">
								<p class="label_name fs18"> <?php echo $campaign_details[0]["total_cost"] ."  INR ";?> </p>
								<p class="label_name fs12 gray"> Total Budget</p>
							</div>
							<div class="fll form_width mab10">
								<p class="label_name fs18"> <?php echo $campaign_details[0]["total_targets"];?>  Peoples </p>
								<p class="label_name fs12 gray"> Total Targets </p>
							</div>
                                                    <div class="fll form_width mab10">
								<p class="label_name fs18">   <?php echo  $campaign_details[0]['campaign_type']?> </p>
								<p class="label_name fs12 gray">Campaign Type </p>
							</div>
                                                    
						</div>
						<div class="audience_lab wi380 fll pal40 overflow" style="border-left:1px #ccc solid;">
							<div class="fll form_width mab10">
								<p class="label_name fs18"> <?php echo date('M d , Y H:i A',strtotime($campaign_details[0]["start_date"])); ?>   </p>
								<p class="label_name fs12 gray"> Promotion Start Date </p>
							</div>


							<div class="fll form_width mab10">
								<p class="label_name fs18"> <?php echo date('M d , Y H:i A',strtotime($campaign_details[0]["end_date"])); ?>  </p>
								<p class="label_name fs12 gray"> Promotion End Date </p>
							</div>

							<div class="fll form_width mab10">
								<p class="label_name fs18"> <?php
									$datediff = strtotime($campaign_details[0]["end_date"]) - strtotime($campaign_details[0]["start_date"]);
									echo floor($datediff/(60*60*24));

								?> Days </p>
								<p class="label_name fs12 gray"> Duration </p>
							</div>
							<div class="fll form_width mab10">
								<p class="label_name fs18"> <?php
									//$payDetails = $this->campaigns->getPaymentDetails($pDetails['transaction_id_fk']);									
                                                                        //echo  date('M d , Y H:i A', strtotime($payDetails['transaction_time']) );
                                                                echo date('M d, Y H:i A',strtotime($txn_details['transaction_time']));
								?></p>
								<p class="label_name fs12 gray"> Payment On </p>
							</div>

							<div class="fll form_width mab10">
								<p class="label_name fs18"> 
                                                                    <?php 
                                                                        //echo $this->campaigns->getCountryName($pDetails['country_launched_from']); 
                                                                    echo $campaign_details[0]['campaign_text'];
                                                                    ?> 
                                                                </p>
								<p class="label_name fs12 gray"> Campaign Text </p>
							</div>
						</div>
					</div>
					<div class="Table">
						<p class="fs18 bold mat20 fll wi100pstg pab10  mab30">  Audience Lab Details  </p>
						<div class="audience_lab wi380 fll mal40 overflow">
							<div class="fll form_width mab10">
								<p class="label_name fs18"> <?php echo $campaign_details[0]["age_group"];?></p>
								<p class="label_name fs12 gray"> Age </p>
							</div>
							<div class="fll form_width mab10">
								<p class="label_name fs18"> <?php echo $campaign_details[0]['gender']; ?></p>
								<p class="label_name fs12 gray"> Gender </p>
							</div>

							<div class="fll form_width mab10">
								<p class="label_name fs18"> <?php echo $campaign_details[0]['marital_status']; ?> </p>
								<p class="label_name fs12 gray"> Relationship Status </p>
							</div>
							<div class="fll form_width mab10">
								<p class="label_name fs18"> <?php echo $campaign_details[0]['interest_entities']; ?> </p>
								<p class="label_name fs12 gray"> Interest </p>
							</div>
						</div>
						<div class="audience_lab wi380 fll pal40 overflow" style="border-left:1px #ccc solid;">
							<div class="fll form_width mab10">
								<p class="label_name fs18"> <?php echo $languages_knows[0]['language_name']; ?></p>
								<p class="label_name fs12 gray"> Languages Known </p>
							</div>
							<div class="fll form_width mab10">
								<p class="label_name fs18">  <?php echo $country_names[0]['country_name']; ?> </p>
								<p class="label_name fs12 gray"> Nationality </p>
							</div>
							<div class="fll form_width mab10">
								<p class="label_name fs18"> <?php echo $city_names[0]['city_name']; ?>  </p>
								<p class="label_name fs12 gray"> Location </p>
							</div>
							
						</div>
					</div>
					<div class="Table">
						<p class="fs18 bold mat20 fll wi100pstg pab10  mab30">  Payment Information  </p>
						<!--<div class="audience_lab wi380 fll pal40 overflow" style="border-left:1px #ccc solid;">-->
						  <div class="audience_lab wi380 fll mal40 overflow">
							<div class="fll form_width mab10">
								<p class="label_name fs18"> <a><?php echo $txn_details['card_name']; ?> </a> </p>
								<p class="label_name fs12 gray"> Card Name </p>
							</div>
							<div class="fll form_width mab10">
								<p class="label_name fs18"> <?php echo $txn_details['cur_name']; ?> </p>
								<p class="label_name fs12 gray"> Payment in Currency </p>
							</div>
						</div>
						<div class="audience_lab wi380 fll pal40 overflow" style="border-left:1px #ccc solid;">
							<div class="fll form_width mab10">
								<p class="label_name fs18"> <a><?php echo $txn_details['transaction_code']; ?></a> </p>
								<p class="label_name fs12 gray"> Transaction Number </p>
							</div>
							<div class="fll form_width mab10">
								<p class="label_name fs18"> <?php echo $txn_details['status']; ?>  </p>
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
