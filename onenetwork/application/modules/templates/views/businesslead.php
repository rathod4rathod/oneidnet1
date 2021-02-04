<?php
$this->load->module('templates');
$this->templates->header();
$this->templates->onenet_header("businesslead");
?>
<div class="left_oontainer">
<h2 class="fs18  pab10 mab30 mal30 mat20"> Business Lead / Enquiry </h2>
<div class="container">
		<div class="ble-content" id="enquiry_form_div">
                    	
                <div class="ble-paragraph">                            
                    <h5>OUR MARQUE IS PEOPLE!</h5><br>
                    <div style="word-wrap: break-word; ">
                                ONEIDNET welcomes queries for potential business relations, leads, integration & prospects with the objective to develop business relations that yield mutual benefits and for our users to enhance our services alliances with other business leaders international markets
                    </div>	
		</div>
        
			
                    <form class="ble-form fll" style="min-width:40%; width:auto; margin-left:5%;" id="enquiry_form">
				<div class="ble-fg">
					<label>Subject</label>
					<input type="text" placeholder="Please enter subject here ..." id="enq_subject" name="enq_subject">
				</div>
				<div class="ble-fg">
					<label>Purpose</label>
					<select id="enq_purpose" name="enq_purpose">
						<option value="">-- Please select purpose --</option>
						<option value="Alliance or Partnership Enquiry">Alliance or Partnership Enquiry</option>
                                                <option value="Request for Information">Request for Information</option>
                                                <option value="General Enquiry">General Enquiry</option>
                                                <option value="Investment">Investment</option>
                                                <option value="App Integration Request">App Integration Request</option>
                                                <option value="Business Proposal">Business Proposal</option>
                                                <option value="Donation">Donation</option>
                                                <option value="Video Games">Video Games</option>
                                                <option value="Feedback">Feedback</option>
                                                <option value="Great Idea">Great Idea</option>
                                                <option value="General Comment">General Comment</option>
                                                <option value="Development Project">Development Project</option>
                                                <option value="National Assistance">National Assistance</option>
                                                <option value="International Assistance">International Assistance</option>
                                                <option value="World Outreach">World Outreach</option>
                                                <option value="Scientific Breakthrough">Scientific Breakthrough</option>
                                                <option value="Technological Breakthrough ">Technological Breakthrough </option>
                                                <option value="Other">Other</option>                                                
					</select>
				</div>
				<div class="ble-fg" id="enq_other_purposediv" style='display:none'>
					<label>Specify Other Purpose</label>
					<input type="text" placeholder="Please enter purpose here" id="enq_other_purpose" name="enq_other_purpose">
				</div>
				<div class="ble-fg" id="pavanierror">
					<label>Preferred Contact Number</label>
					<input type="tel" value="+91" class="ble-cc" id="contact_ext" name="contact_ext">
					<input type="tel" placeholder="Enter contact number" class="ble-tn" id="enq_contact" name="enq_contact" value="">
				</div>
				<div class="ble-fg">
					<label>Preferred Email Address</label>
					<input type="email" placeholder="Please enter your email" id="enq_email" name="enq_email" value="">
				</div>
				<div class="ble-fg">
					<label>Description</label>
					<textarea rows="6" id="enq_desc" name="enq_desc"></textarea>
				</div>
				
				<div class="ble-submit mab10 fll">
					<button type="submit" id="submit_enq">Submit</button>
				</div>

			</form>
			
			<div class="ble-alert enq_success">
				<p class="success">Your proposal submitted successfully! A ONEIDNET REPRESENTATIVE WILL BE IN CONTACT WITH YOU</p>
			</div>
                    <div class="progress_div">
                        <img src="<?php echo base_url().'assets/images/loader.gif'?>"/>
                    </div>
		
		<div class="ble-alert enq_error">
				<p class="error">Please fill all the required fields</p>
			</div>
		</div>
	</div>
</div> <!--module container end here-->
<div class="clearfix"></div>
<?php
$this->load->module('templates');
$this->templates->footer();
?>
<script>
$(document).on("change","#enq_purpose",function(){
    if($(this).val()=="Other"){
        $("#enq_other_purposediv").show();
    }else{        
        $("#enq_other_purposediv .errormsg").remove();
        $("#enq_other_purpose").val(" ");
        $("#enq_other_purposediv").hide();
    }    
});
</script>