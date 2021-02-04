<?php
    $this->load->module('templates');
    $this->templates->header();
    $this->templates->onenet_header();
    //$dashboard_url=base_url()."overview/gma_dashboard?campaign_id=".base64_encode(base64_encode($campaign_details[0]["rec_aid"]));        
   // echo"<pre>";print_r($offibadgeDetails)
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
                                                            <?php switch ($offibadgeDetails[0]['module']) {
               
                case ONESHOP:
                     $offimg =base_url().'assets/images/back/oneshop.png';
                    break;
                 case TUNNEL:
                     $offimg =base_url().'assets/images/back/tunnel.png';
                    break; 
                
                case CLICK:
                    $offimg =base_url().'assets/images/back/click.png';
                    break;
                case COFFICE:
                    $offimg =base_url().'assets/images/back/cooffice.png';
                    break;
                case DEALERX:
                    $offimg =base_url().'assets/images/back/dealerx.png';
                    break;
                case  BUZZIN:
                    $offimg =base_url().'assets/images/back/buzzin.png';
                    break;
                case NETPRO:
                    $offimg =base_url().'assets/images/back/netpro.png';
                    break; 
                case ONENETWORK:
                    $offimg =base_url().'assets/images/back/onenetwork.png';
                    break; 
               case ONEIDNET:
                    $offimg =base_url().'assets/images/oneidnetlogo.png';
                    break;
                 /* 
                    case 360MAIL:
                    $offimg =base_url().'assets/images/oneidnetlogo.png';
                    break;
                    case ONEVISION:
                    $offimg =base_url().'assets/images/oneidnetlogo.png';
                    break;
                    case ONEIDSHIP:
                    $offimg =base_url().'assets/images/oneidnetlogo.png';
                    break; 
                    case FINDIT:
                    $offimg =base_url().'assets/images/is-news.png';
                    break;
                    case CVBANK:
                    $offimg =base_url().'assets/images/is-news.png';
                    break;
                    */
                default:
                    $offimg =base_url().'assets/images/oneidnetlogo.png';
                } ?>
                                                            <img width="50" height="44" src="<?php echo $offimg ;?>"></p>
							<div class="fll mal10">
								<h3 class="fs24 mat10 normal pab5 bold"> <a><?php echo $offibadgeDetails[0]['module'];?></a> </h3>
                                                                </div>

							<div class="flr mal10 mat10">
								<h3 class="mat10 normal pab5"><span> Requested on :</span> <span class="fs11"> <?php echo date('M d , Y ',strtotime($offibadgeDetails[0]["requested_on"])); ?> </span> </h3>
                                                                <h3 class="flr normal"> <span>  Status : </span> <span class="green"><strong><?php if($offibadgeDetails[0]['status'] == 'WAITING') {echo "Waiting"; } elseif($offibadgeDetails[0]['status'] == 'APPROVED'){ echo "Approved"; }else{ echo "Rejected"; }?></strong></span>  </h3>
							</div>
						</div>
					</div>
					<div class="Table">
						<p class="fs18 bold mat20 fll wi100pstg pab10  mab30">  Official Badge Basic Info  </p>
						<div class="audience_lab wi380 fll mal40 overflow">
							<div class="fll form_width mab10">
								<p class="label_name fs18"> <?php if($offibadgeDetails[0]["module"]!=''){ echo ucfirst(strtolower($offibadgeDetails[0]["module"])); }else{ echo "No data";} ?> </p>
								<p class="label_name fs12 gray"> Module </p>
							</div>
							<div class="fll form_width mab10">
								<p class="label_name fs18"><?php  if($offibadgeDetails[0]["entity_type"]!=''){ echo ucwords(strtolower(str_replace("_"," ",$offibadgeDetails[0]["entity_type"])));  }else{ echo "No data";} ?> </p>
								<p class="label_name fs12 gray">Entity Type  </p>
							</div>

							<div class="fll form_width mab10">
								<p class="label_name fs18"> <a><?php if($offibadgeDetails[0]["popularity_type"]!=''){ echo ucfirst(strtolower($offibadgeDetails[0]["popularity_type"])); }else{ echo "No data";}  ?> </a> </p>
								<p class="label_name fs12 gray">Popularity Type </p>
							</div>
							<div class="fll form_width mab10">
								<p class="label_name fs18"> <?php if($offibadgeDetails[0]["website"]!=''){ echo $offibadgeDetails[0]["website"] ; }else{ echo "No data";} ?> </p>
								<p class="label_name fs12 gray"> Website </p>
							</div>
							
                                                    <div class="fll form_width mab10">
								<p class="label_name fs18">   <?php if($offibadgeDetails[0]['official_mobile']!=''){ echo  $offibadgeDetails[0]['official_mobile']; }else{ echo "No data";} ?> </p>
								<p class="label_name fs12 gray">Official Mobileno </p>
							</div>
                                                    
						</div>
						<div class="audience_lab wi380 fll pal40 overflow" style="border-left:1px #ccc solid;">
                                                    <div class="fll form_width mab10">
								<p class="label_name fs18"> <?php if($offibadgeDetails[0]["official_emailid"]!=''){ echo $offibadgeDetails[0]["official_emailid"]; }else{ echo "No data";} ?>   </p>
								<p class="label_name fs12 gray"> Official Email</p>
							</div>
							


							<div class="fll form_width mab10">
								<p class="label_name fs18"> <?php 
                                                                if($offibadgeDetails[0]['address_line_1']!=''){ echo ucfirst($offibadgeDetails[0]['address_line_1'])."," ; }
                                                                if($offibadgeDetails[0]['address_line_2']!=''){ echo ucfirst($offibadgeDetails[0]['address_line_2']) ."," ; } 
                                                                if( $cityname[0]['city_name']!=''){ echo $cityname[0]['city_name'].","; }  
                                                                if( $statename[0]['state_name']!=''){ echo $statename[0]['state_name'] ."," ; }
                                                                 if($countryname[0]['country_name']!= ''){echo $countryname[0]['country_name'] ; } ?>  </p>
								<p class="label_name fs12 gray"> Address </p>
							</div>

							
							<div class="fll form_width mab10">
								<p class="label_name fs18"> <?php
								if($txn_details['transaction_time']!=''){ echo "No data";}else{	
                                                                echo date('M d, Y H:i A',strtotime($txn_details[0]['transaction_time']));
                                                                }
								?></p>
								<p class="label_name fs12 gray"> Payment On </p>
							</div>

							<div class="fll form_width mab10">
								<p class="label_name fs18"> 
                                                                    <?php    if($offibadgeDetails[0]['description']!=''){ echo ucfirst($offibadgeDetails[0]['description']);}else{ echo "No data";  }  ?> 
                                                                </p>
								<p class="label_name fs12 gray"> Description  </p>
							</div>
						</div>
					</div>
					<div class="Table">
						<p class="fs18 bold mat20 fll wi100pstg pab10  mab30">Online Presence  References  </p>
						<div class="audience_lab wi380 fll mal40 overflow">
							<div class="fll form_width mab10">
                                                                <p class="label_name fs18"> <?php if($offibadgeDetails[0]['twitter_account']!=''){ echo $offibadgeDetails[0]['twitter_account'] ; }else{ echo "No data" ;} ?></p>
								<p class="label_name fs12 gray">  Twitter Account</p>
							</div>
							<div class="fll form_width mab10">
								<p class="label_name fs18"> <?php  if($offibadgeDetails[0]['facebook_page_url']!=''){ echo $offibadgeDetails[0]['facebook_page_url'] ; }else{ echo "No data" ;} ?></p>
								<p class="label_name fs12 gray"> Facebook Account  </p>
							</div>

							
						</div>
						<div class="audience_lab wi380 fll pal40 overflow" style="border-left:1px #ccc solid;">
							<div class="fll form_width mab10">
								<p class="label_name fs18"> <?php  if($offibadgeDetails[0]['linkedin_url']!=''){ echo $offibadgeDetails[0]['facebook_page_url'] ; }else{ echo "No data" ;} ?> </p>
								<p class="label_name fs12 gray"> LinkedIn Account </p>
							</div>
							<div class="fll form_width mab10">
								<p class="label_name fs18"> <?php  if($offibadgeDetails[0]['googleplus_url']!=''){  echo $offibadgeDetails[0]['facebook_page_url'] ; }else{ echo "No data" ;} ?> </p>
								<p class="label_name fs12 gray"> Google plus Account  </p>
							</div>
							
							
						</div>
					</div>
					<div class="Table">
						<p class="fs18 bold mat20 fll wi100pstg pab10  mab30">  Payment Information  </p>
						<!--<div class="audience_lab wi380 fll pal40 overflow" style="border-left:1px #ccc solid;">-->
						  <div class="audience_lab wi380 fll mal40 overflow">
							<div class="fll form_width mab10">
                                                                <p class="label_name fs18"> <a><?php if($txn_details[0]['card_name']!=''){ echo $txn_details[0]['card_name']; }else{ echo "No data" ;} ?> </a> </p>
								<p class="label_name fs12 gray"> Card Name </p>
							</div>
							<div class="fll form_width mab10">
								<p class="label_name fs18"> <?php if($txn_details[0]['cur_name']!=''){ echo $txn_details[0]['cur_name']; }else{ echo "No data" ;}  ?> </p>
								<p class="label_name fs12 gray"> Payment in Currency </p>
							</div>
						</div>
						<div class="audience_lab wi380 fll pal40 overflow" style="border-left:1px #ccc solid;">
							<div class="fll form_width mab10">
								<p class="label_name fs18"> <a><?php if($txn_details[0]['transaction_code']!=''){ echo $txn_details[0]['transaction_code']; }else{ echo "No data" ;}  ?></a> </p>
								<p class="label_name fs12 gray"> Transaction Number </p>
							</div>
							<div class="fll form_width mab10">
								<p class="label_name fs18"> <?php if($txn_details[0]['status']!=''){ echo $txn_details[0]['status'];  }else{ echo "No data" ;} ?>  </p>
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
