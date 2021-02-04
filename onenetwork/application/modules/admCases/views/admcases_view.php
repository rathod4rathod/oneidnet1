<?php
$this->load->module('templates');
$this->templates->header();
$this->templates->onenet_header("administration");
?>

<script>
    function auto_grow(element) {
        element.style.height = "5px";
        element.style.height = (element.scrollHeight) + "px";
    }
</script>

<script type="text/javascript">
    $('.slider').cycle({

        fx: 'scrollHorz',
        next: '.isdes_nextbtn',
        prev: '.isdes_prevbtn',
        timeout: 3000,
        pause: 1
    });
</script>


<script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
<script>
    $(function () {
        $('#demo').textRotator({
            random: true,
            fadeIn: 1000,
            fadeOut: 500,
            duration: 5000,
            debug: false

        })
    })
</script>
<div class="clr">&nbsp;</div>
<div class="new_wrapper">
	<div class="right-adds-place fll">
		<div class="nav-profile">
			<div class="fll">
				<img width="50" height="50" class="db-pro-img" src="<?php echo base_url(); ?>assets/images/avatar-1.jpg">
			</div>
			<div class="db-pro-info fll">
				<p class="white"><?php echo $case_details[0]['first_name']." ".$case_details[0]['last_name']; ?></p>
				<p> Administrator </p>
				<!-- <p><span class="white">EMPID :</span> <span>ID# <?php echo $case_details['employee_code']; ?> </span> </p> -->
			</div>
		</div>
		<ul class="db-sidebar-nav">
		   <li><a href="<?php echo base_url(); ?>admCases"><img title="settings" alt="settings" src="<?php echo base_url(); ?>assets/images/settings.png"> CASES HISTORY </a></li>
		   <li><a href="#"><img alt="maximize" src="<?php echo base_url(); ?>assets/images/restore.png"> TEAM </a></li>
		   <li><a href="#"><img title="settings" alt="settings" src="<?php echo base_url(); ?>assets/images/privacy.png"> CHAT LOGS </a></li>
		   <li><a href="<?php echo base_url();?>admteam/<?php echo $employee_code;?>"><img title="settings" alt="settings" src="<?php echo base_url(); ?>assets/images/help.png"> MY TEAM </a></li>
		   <li><a href="#"><img title="settings" alt="settings" src="<?php echo base_url(); ?>assets/images/onenet.png"> REPORT </a></li>
		   <li><a href="#"><img title="settings" alt="settings" src="<?php echo base_url(); ?>assets/images/help.png"> ESCALATIONS </a></li>                                                                      
		</ul>
	</div>
	<div class="db-container flr">
		<div class="big-cont-six">
			<div class="wi100pstg overflow borderbottom mab30 fll">
				<h2 class="fs24 fll pab10"> Open Case Lists </h2>
				<div class="flr wi65">
					<div class="fright wi35">
						<p class="class-one lh30 mar10 black mab10 fll"> Priority </p>
						<select class="oneshop_caseselectbox fll">
							<option> Extremely Urgent (P1) </option>
							<option> Highly Urgent (P2) </option>
							<option> Mild Urgent (P3) </option>
							<option> Little Urgent (P4) </option>
							<option> Not So Urgent (P5) </option>
						</select>
					</div>
					<div class="fright wi35">
						<p class="class-one lh30 mar10 black mab10 fll"> Date </p>
						<select class="oneshop_caseselectbox fll">
							<option> This week </option>
							<option> This Month </option>
							<option> Custom Date </option>
						</select>
					</div>
				</div>
			</div>
                        <?php
                            foreach($case_details as $case) {
                        ?>
                        <div class="big-cont-banner-content-activity-leftbox">
				<div class="wi80 fll">
					<p class="wi100pstg fs18 mab10"> Case Number: <?php echo $case['case_code']; ?></p>
					<p class="wi100pstg fs24 mab10"> <a href="admCaseDetails/<?php echo $case['case_code']; ?>"> <?php echo $case['title_of_problem']; ?></a>  </p>
					<p class="wi100pstg fs14"> <span> Reported On: </span> <span class="gray"><?php echo date( 'g:ia \o\n l jS F Y', strtotime($case['created_on'])); ?></span>  </p>
				</div>
				<div class="wi22 flr pal10" style="border-left:1px #ccc solid; height:100%;">
					<p class="wi100pstg fs14 mab10"> <a><?php echo $case['first_name']." ".$case['last_name']; ?></a> </p>
					<p class="wi100pstg fs14 mab10">  Highly Urgent (<?php echo $case['priority']; ?> ) </p>
					<p class="wi100pstg fs14 mab10"> <a class="case-btn aleft" href="admCaseDetails/<?php echo $case['case_code']; ?>"> Look at this ...</a></p>
				</div>
			</div>
                        <?php
                            }
                        ?>
		</div>
	</div>
</div>

<div class="clr"></div>
<script>
    function resetTabs(){
        $("#content > div").hide(); //Hide all content
        $("#tabs a").attr("id",""); //Reset id's      
    }

    var myUrl = window.location.href; //get URL
    var myUrlTab = myUrl.substring(myUrl.indexOf("#")); // For localhost/tabs.html#tab2, myUrlTab = #tab2     
    var myUrlTabName = myUrlTab.substring(0,4); // For the above example, myUrlTabName = #tab

    (function(){
        $("#content > div").hide(); // Initially hide all content
        $("#tabs li:first a").attr("id","current"); // Activate first tab
        $("#content > div:first").fadeIn(); // Show first tab content
        
        $("#tabs a").on("click",function(e) {
            e.preventDefault();
            if ($(this).attr("id") == "current"){ //detection for current tab
             return       
            }
            else{             
            resetTabs();
            $(this).attr("id","current"); // Activate this
            $($(this).attr('name')).fadeIn(); // Show content for current tab
            }
        });

        for (i = 1; i <= $("#tabs li").length; i++) {
          if (myUrlTab == myUrlTabName + i) {
              resetTabs();
              $("a[name='"+myUrlTab+"']").attr("id","current"); // Activate url tab
              $(myUrlTab).fadeIn(); // Show url tab content        
          }
        }
    })()
  </script>   

<!--module container end here-->
<?php
$this->templates->footer();
?>
