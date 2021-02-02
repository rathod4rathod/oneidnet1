<div class="click_popUp" id="reportproblemPopUp" style="display: none;">
	<div class="click_createGroupPopUpWrapper">
    <a href="javascript: void(0)"  onClick="reportProblem_popUpVisibility('reportproblemPopUp');">
    <span class="click_createGroupPopUpCloseBtn"><h2>X</h2></span></a>
    <form  id="reportproblemPopUp_form">
    <div class="click_popUpSection"> 
	    <div class="click_createGroupPopUpHeader"><h4>Report Your Problem</h4></div>
        
       
        <div class="click_createGroupForm">
             <p id="response" style="color: #FFFFF; font-size: 13pt"></p>
        	<div class="click_createGroupFormField">
            	<span class="click_createGroupFormFieldLable"><h4>Problem Name :</h4></span>
                <input type="text" class="click_createGroupFormFieldInput" name="report_problem_title" id="report_problem_title">
            </div>
            <div class="click_createGroupFormField">
            	<span class="click_createGroupFormFieldLable"><h4>Problem SnapShot :</h4></span>
                <input type="file" class="click_createGroupFormFieldInput" name="report_problem_snapshot" id="report_problem_snapshot">
            </div>
            <div class="click_createGroupFormField">
                <span class="click_createGroupFormFieldLable"><h4>Location :</h4></span>
        <select class="click_createGroupFormFieldInput" name="location" id="country_id">
        <option value="">Select your Location</option>
                      <?php foreach($country_info as $country_infoormation){
                        ?>
                        <option value="<?php echo $country_infoormation["country_id"]; ?>"><?php echo $country_infoormation["country_name"]; ?></option>
                        <?php
                      }?>
        </select>
</div>
            <div class="click_createGroupFormField">
            	<span class="click_createGroupFormFieldLable"><h4>Description :</h4></span>
                <textarea class="click_createGroupFormFieldInput click_textAreaType" name="report_problem_description" id="report_problem_description"></textarea>
            </div>
        </div>
        
        <div class="click_createGroupPopUpFooter">
        	<div class="click_createGroupPopUpFooterOptions">
            	<button class="click_reportProblemBtn" onClick="reportProblem_popUpVisibility('reportproblemPopUp');">Cancel</button>
            	<button class="click_reportProblemBtn" >Ok</button>
            </div>
        </div>
    
    </div>
            </form>
    </div>
</div>

