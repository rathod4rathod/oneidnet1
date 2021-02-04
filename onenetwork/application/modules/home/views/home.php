<?php
    $this->load->module('templates');
    $this->templates->header();
    ?>
        <script type="text/javascript" src="<?php echo base_url().'assets/js/jquery.cycle.all.js'?>"></script>
        <script type="text/javascript" src="<?php echo base_url().'assets/js/home.js'?>"></script>
        <?php
    $this->templates->onenet_header();
?>
<div class="clr">&nbsp;</div>
<div class="new_wrapper">
	<div class="ondes_wrapper_main">
		<div class="ondes_module_container_wrap"> <!--module_container start here-->
			<div class="ondes_wrapper_inner minheight600"><!--wrapper inner start here-->
				<div class="onenetwork_homepage_bgwrap">
					<div class="onenetwork_homepage_leftbanner">
						<div class="oisdes_leftbanner_box">
						<!--slider start from here-->
						<div class="isdes_nextbtn">›</div>
						<div class="isdes_prevbtn">‹</div>   
						<div class="slider" style="overflow: hidden;">
							<img alt="image" src="<?php echo base_url().'assets/images/sliders/slide1.jpg';?>" style="background-color: rgb(102, 0, 153); position: absolute; top: 0px; left: -630px; display: none; z-index: 3; opacity: 1; width: 100%; height: 300px;">
							<img alt="image" src="<?php echo base_url().'assets/images/sliders/slide2.jpg';?>" style="background-color: rgb(102, 0, 153); position: absolute; top: 0px; left: -630px; display: none; z-index: 3; opacity: 1; width: 100%; height: 300px;">
                            <img alt="image" src="<?php echo base_url().'assets/images/sliders/slide3.jpg';?>" style="background-color: rgb(102, 0, 153); position: absolute; top: 0px; left: -630px; display: none; z-index: 3; opacity: 1; width: 100%; height: 300px;">
                            <img alt="image" src="<?php echo base_url().'assets/images/sliders/slide4.jpg';?>" style="background-color: rgb(102, 0, 153); position: absolute; top: 0px; left: -630px; display: none; z-index: 3; opacity: 1; width: 100%; height: 300px;">
                            <img alt="image" src="<?php echo base_url().'assets/images/sliders/slide5.jpg';?>" style="background-color: rgb(102, 0, 153); position: absolute; top: 0px; left: -630px; display: none; z-index: 3; opacity: 1; width: 100%; height: 300px;">
						</div><!--end slider-->
						<!--slider End here-->
					</div>
				</div>
				<div class="onenetwork_homepage_right_box">
                                    <a href="<?php echo base_url().'static_pages/getstarted_view'?>"><input type="button" value="GET STARTED" class="button_new2" name=" "></a> 
                    <a href="<?php echo base_url().'templates/donations' ?>"><input type="button" value="DONATIONS" class="button_new2" name=" "></a>
					
                                        <a href="<?php echo base_url().'templates/contributors' ?>"><input type="button" value="CONTRIBUTORS" class="button_new2" name=" "></a>
                                       
                                        <a href="<?php echo ONEIDNETURL.'home/customersupport' ?>" target="_blank"><input type="button" value="SUPPORT" class="button_new2" name=" "></a>
				</div>
			</div>
			<div class="oneshop_getstarted mat30">
				<div class="oneshop_getstarted_bgwrap">
					<div class="oneshop_getstarted_leftbox_heading_div">
						<div class="oneshop_getstarted_iconbox"> <img src="<?php echo base_url().'assets/images/effectiveness_icon.png';?>" > </div>
						<div class="oneshop_getstarted_iconbox_contentdiv"> 
							<h2> Effectiveness </h2>
							<p> Effective, Productive & Creative </p>
						</div>
					</div>
					<div class="oneshop_getstarted_leftbox_heading_div">
						<div class="oneshop_getstarted_iconbox"> <img src="<?php echo base_url().'assets/images/reliabilities_icon.png';?>"> </div>
						<div class="oneshop_getstarted_iconbox_contentdiv"> 
							<h2> Reliability </h2>
							<p>  Reliable Execution of Campaigns </p>
						</div>
					</div>

					<div class="oneshop_getstarted_leftbox_heading_div">
						<div class="oneshop_getstarted_iconbox"> <img src="<?php echo base_url().'assets/images/quality_target_icon.png';?>"> </div>
						<div class="oneshop_getstarted_iconbox_contentdiv"> 
							<h2> Quality Target </h2>
							<p> Precise & Neumerous Parameters for Audience Selection </p>
						</div>
					</div>

					<div class="oneshop_getstarted_leftbox_heading_div">
						<div class="oneshop_getstarted_iconbox"> <img src="<?php echo base_url().'assets/images/impression_icon.png';?>"> </div>
						<div class="oneshop_getstarted_iconbox_contentdiv"> 
							<h2> Impressions </h2>
							<p> Good Response of your Advertisements </p>
						</div>
					</div>
				</div>
				<div class="oneshop_getstarted_bgwrap mat40 mab30">
					<h1 class="acenter normal fs24" style="width:100%; border-bottom:1px #ccc solid; padding:0 0 10px 0; margin:0 auto; line-height:32px;"> One Place to Operate Your Business and Control Marketing </h1>
					<div class="oneshop_getstarted_bg_one">
						<div class="oneshop_getstarted_bottom_contentbox">
							<div class="oneshop_getstarted_imageleftbox">
								<img src="<?php echo base_url().'assets/images/GeneralMarketingAdvertisement.png';?>">
							</div>
							<div class="oneshop_getstarted_right_box_contentdiv">
								<h2> General Marketing & Advertisement </h2>
								<div class="custommarketing_cont">
									<ul>
										<li><a href="<?php echo base_url().'gma/genericGeneralMarketing/Website_Marketing'?>">Website Marketing</a>  </li>
										<li><a href="<?php echo base_url().'gma/genericGeneralMarketing/Banner_Marketing'?>"> Banner Marketing</a> </li>
										<!--<li> Email Marketing </li>-->
										<li><a href="<?php echo base_url().'gma/genericGeneralMarketing/Flash_Marketing'?>"> Flash Marketing</a> </li>
									</ul>
								</div>
							</div>
						</div>
						<div class="oneshop_getstarted_bottom_contentbox">
							<div class="oneshop_getstarted_imageleftbox">
								<img src="<?php echo base_url().'assets/images/KeywordAdvertisement.png';?>">
							</div>
							<div class="oneshop_getstarted_right_box_contentdiv">
								<h2> Keyword Based Advertisement </h2>
								<div class="custommarketing_cont">
									<ul>
										<li> Vector ADS</li>
										<li> Product ADS</li>
										<li> WikiWrapper </li>
										<li> Index your page (FREE)</li>
									</ul>
								</div>
							</div>
						</div>
						<div class="oneshop_getstarted_bottom_contentbox">
							<div class="oneshop_getstarted_imageleftbox">
                                                            <a href="<?php echo base_url()."promotions"; ?>"><img src="<?php echo base_url().'assets/images/ModularPromotions.png';?>"></a>	
							</div>
							
							
							
							
							<div class="oneshop_getstarted_img_right_content">
								<a href="<?php echo base_url()."promotions"; ?>"><h2 class="mrb"> Module's Entities Promotions</h2></a>
								<div class="custommarketing_cont entities_pramotions">
									<ul>
                                                                            <li><span class="tal wi100"> <a href="<?php echo base_url().'clickinfo';?>">Click</a>  </span><span class="arrow">&#8250;</span> <span> 
                                                                                        <a href="<?php echo base_url().'promotions/';?>">Pages</a>     &#10004;
                                                                                        <a href="<?php echo base_url().'promotions/grouppromotpagepromotionsions';?>">Groups</a>     &#10004;  
                                                                                        <a href="<?php echo base_url().'promotions/eventPromotions';?>">Events</a>    
                                                                                    </span> </li>
                                                                                    <li><span class="tal wi100"> <a href="<?php echo base_url().'buzzininfo';?>">Buzzin</a> </span><span class="arrow">&#8250;</span> <span> Celebrities </span> </li>
                                                                                <li><span class="tal wi100"> <a href="<?php echo base_url().'netproinfo';?>">Netpro</a>  </span><span class="arrow">&#8250;</span> <span>    <a href="<?php echo base_url().'promotions/netproGroupPromotions';?>">Groups</a>  </span> </li>
                                                                                <li><span class="tal wi100"> <a href="<?php echo base_url().'coofficeinfo';?>">Corporate Office</a>  </span><span class="arrow">&#8250;</span> <span> <a href="<?php echo base_url()."promotions/coffieCompanyPromotion"; ?>">Company Profiles</a> &#10004; <a href="<?php echo base_url()."promotions/coffiejobPromotion";?>">Jobs</a>   </span> </li>
																				 <li><span class="tal wi100"> <a href="<?php echo base_url().'oneshopinfo';?>">Oneshop</a>  </span> <span class="arrow">&#8250;</span> <span>   <a href="<?php echo base_url().'promotions/oneshopstorePromotions';?>">Stores</a>  &#10004;  <a href="<?php echo base_url().'promotions/oneshopProductPromotions';?>">Products</a>                                                                                     </span> </li>
                                                                            <li><span class="tal wi100"> <a href="<?php echo base_url().'dealerxinfo';?>">DealerX</a>  </span> <span class="arrow">&#8250;</span> <span> <a href="<?php echo base_url().'promotions/dealerxProfilePromotion';?>">Dealers Profiles</a>   &#10004;  <a href="<?php echo base_url().'promotions/dealerxAuctionPromotion';?>">Auction Promotion</a>                                                                                     </span> </li>
                                                                            <!--<li><span class="tar wi100"> <a href="<?php echo base_url().'isnewsinfo';?>">IS News</a>  </span> <span class="">:&nbsp;&nbsp;</span> <span> Sponsored Stories  </span> </li>-->
                                                                            <li><span class="tal wi100"> <a href="<?php echo base_url().'tunnelinfo';?>">Tunnel</a>  </span> <span class="arrow">&#8250;</span> <span> 
                                                                                        <a href="<?php echo base_url().'promotions/tunnelVideoPromotion'?>">Videos </a>&#10004; 
                                                                                        <a href="<?php echo base_url().'promotions/tunnelChannelPromotion'?>">Channels</a> </span> </li>
									</ul>
								</div>
							</div>
						</div>
						<div class="oneshop_getstarted_bottom_contentbox">
							<div class="oneshop_getstarted_imageleftbox">
								<img src="<?php echo base_url().'assets/images/EliteMarketing.png';?>">
							</div>
							<div class="oneshop_getstarted_right_box_contentdiv">
								<h2> Elite Marketing </h2>
								<div class="elite_marketing">
									<p style="line-height:18px; color:#9B3318; margin-top:5px;">
										<i style="font-size:18px; color:#9B3318;">"</i>
											Market Your Most Valuable Ideas, Products and Services with Elite Marketing Events Through OneNetwork<span style="font-size:18px; color:#9B3318;">"</span>
											<i style="font-size:18px; color:#9B3318;">"</i>
										</p>
								</div>
							</div>
						</div>
                                                <div class="oneshop_getstarted_bottom_contentbox mab10">
							<div class="oneshop_getstarted_imageleftbox">
							<img src="<?php echo base_url().'assets/images/ban1.jpg';?>">
							</div>
							<div class="oneshop_getstarted_right_box_contentdiv">
                                                            <a href="<?php echo base_url().'official_badge'?>"><h2>Get Official Badges</h2></a>
								<div class="custommarketing_cont entities_pramotions">
									<ul>
                                                                            <li><span class="tal wi100"> Oneshop  </span><span class="arrow">&#8250;</span> <span> Travel Time</span> </li>
                                                                            <li><span class="tal wi100"> Netpro  </span><span class="arrow">&#8250;</span> <span> Corporate Office</span> </li>
                                                                            <li><span class="tal wi100"> Click  </span><span class="arrow">&#8250;</span> <span>Buzzin</span> </li>
                                                                            <li><span class="tal wi100"> Tunnel  </span><span class="arrow">&#8250;</span> <span>Dealerx</span> </li>
									</ul>
								</div>
							</div>
						</div>
					</div>
					<?php
                                        $this->templates->specialSuggestions();
                                        ?>
				</div>    
			</div>
		</div> <!--wrapper inner closed here-->
	</div> <!--module container end here-->
</div><!--wrapper main closed here-->

<?php
$this->templates->right_container();
?>
</div>
<!--module container end here-->
<?php
$this->templates->footer();
?>
