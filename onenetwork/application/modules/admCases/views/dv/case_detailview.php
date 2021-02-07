<?php
$this->load->module('templates');
$this->templates->header();
$this->templates->onenet_header("administration");
?>
<script>
	$(function(){
		$("#hide_preview,.arcade-box").hide();
		  $("#show_preview").click(function() {
			$("#show_preview").hide();
			$("#hide_preview,.arcade-box").show();
			$('html, body').animate({ scrollTop: $('#arcade-box').offset().top }, 'slow');
		  });
		  $("#hide_preview").click(function() {
			$("#show_preview").show();
			$("#hide_preview,.arcade-box").hide();
		  });
		});
</script>
<div class="new_wrapper">
	<div class="db-container fll">
		<div class="big-cont-six">
			<div class="Table">
				<div class="fll wi100pstg pab5 borderbottom">
					<p style="width:50px; height:44px;" class="mat10 fll"> <img width="50" height="44" src="images/back/oneidship.png"></p> 
					<div class="fll mal10">
						<h3 class="fs24 mat10 normal pab5"><?php echo $case['title_of_problem']; ?> </h3>
						<h3 class="fll normal"> Case Number:<?php echo $case['case_code']; ?> </h3>
					</div>
					<div class="flr mal10 mat10">
						<h3 class="mat10 normal pab5"><span> Reported On:</span> <span class="fs11"> <?php echo date( 'g:ia \o\n l jS F Y', strtotime($case['created_on'])); ?> </span> </h3>
						<h3 class="flr normal"> <span> Status: </span> <span class="green"> <?php echo $case['status']; ?> </span>  </h3>
					</div>
				</div>
			</div>
            <div class="wi100pstg mat20 fll overflow">
				<div class="wi100pstg fll overflow">
					<div class="flr wi100pstg">
						<p class="mab10 mal10 aright"> <input type="button" value="RESPONSE" class="case-btn aright" id="rbutton"> </p> 
						<P class="aright"> <select class="oneshop_caseselectbox flr" style="width:200px;">
						<option>Select the Case Status</option>
						<option>Open</option>
						<option>Close</option>
						</select> 
						</P>
						<p class="flr bold mat6 mar10"> CHANGE CASE STATUS </p> 
					</div>
				</div>
			</div>
			<div class="wi100pstg pab10 mab15 fll">
				<div class="wi100pstg fll">
					<h2 class="mab10 fs18"> Description </h2>
					<p class="fs14 lh20"><?php echo $case['description'];?> </p>
				</div>
				<p class="aright fs14 mat10 mar10"> <a href="#" class="bold yellow" download="<?php echo $case['attach_snapshot'];?>" style="text-decoration:underline;"> Download Attached Attachments </a> </p>
			</div>
			<div class="wi100pstg mat30 fll overflow">
				<h2 class="fs18 wi100pstg  pab10 mab30"> Case Details </h2>

				<div class="audience_lab wi48 fll overflow">
					<h2 class="fs14 wi100pstg  pab10 mab30"> Heading Here </h2>
					<div class="fll form_width mab10">
						<p class="label_name fs18"> Module </p>
						<p class="label_name fs12 gray"> <?php echo $case['module'];?> </p>
					</div>
					<div class="fll form_width mab10">
						<p class="label_name fs18"> Priority </p>
						<p class="label_name fs12 gray"> <?php echo $case['priority'];?> </p>
					</div>
					<div class="fll form_width mab10">
						<p class="label_name fs18"> User Location </p>
						<p class="label_name fs12 gray"> <?php 
                                                        $campaigns = $this->load->module('campaigns');
                                                        echo $contry_name = $campaigns->getCountryName($case['user_location']);
                                                
                                                        ?> </p>
					</div>
					<div class="fll form_width mab10">
						<p class="label_name fs18"> Case Reported By </p>
						<p class="label_name fs12 gray"> <?php echo $case_reportedby; ?> </p>
					</div>
				</div>
				<div class="audience_lab wi48 fll overflow">

					<div class="fll form_width mab10">
					<p class="label_name fs18"> Case Created By</p>
					<p class="label_name fs12 gray"> <?php echo $case_createdby; ?> </p>
					</div>


					<div class="fll form_width mab10">
					<p class="label_name fs18"> Assigned To </p>
					<p class="label_name fs12 gray"> <?php echo $case_assignedto; ?>  </p>
					</div>

					<div class="fll form_width mab10">
					<p class="label_name fs18"> Assigned On </p>
					<p class="label_name fs12 gray"> <?php echo $case['assigned_on'];?> </p>
					</div>


					<div class="fll form_width mab10">
					<p class="label_name fs18"> Live Case Status </p>
					<p class="label_name fs12 gray"> <?php echo $case['live_case_status'];?> </p>
					</div>
				</div>
			</div>

			<div class="wi100pstg mat30 fll overflow">
				<h2 class="fs18 wi100pstg  pab10 mab30"> Heading Here </h2>
				<p class="acenter pal10 par10 fs18 lh20">
				<span class="bold fs30 yellow">"</span> 1914 translation by H. Rackham itation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Rackham itation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute<span class="bold fs30 yellow">"</span>
				</p>
			</div>
			<div class="wi100pstg mat30 fll overflow">
				<h2 class="fs18 wi100pstg  pab10 mab30"> Archive Chat Logs </h2>
				<p class="mab10 mal10 aright"> <input type="button" value="Show Chat Logs" class="case-btn aright" id="show_preview" name="button"> </p> 
				<p class="mab10 mal10 aright"> <input type="button" value="Hide Chat Logs" class="case-btn aright" id="hide_preview" name="button"> </p> 
				<div class="arcade-box"  id="arcade-box">
					<?php if($chat_logs ) { foreach($chat_logs as $message) {?>
					<div class="wi100pstg overflow mab10 fll">
						<p class="bold mar10 mat6 fs14 fll" style="width:50px;"> <?php 
						$admObject = $this->load->module('admCases');
						$sender = $admObject->getCreatedby($message['sender']);
						echo $sender; ?>: </p>
						<p class="fll bgcolor4 wi92 lh18"> <?php echo $message['message']; ?> </p>
					</div>
					<?php } } else { echo "No data Available at the moment"; } ?>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="right-adds-place flr">
	sdgsdg
</div>


</div>

<!--module container end here-->
<?php
$this->templates->footer();
?>
