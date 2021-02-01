<form id="reportproblem">
  
  <div class="oneshop_reportProblemHeader">
    	        <h4>Report your Problem</h4>
               <a href="javascript:void(0)">	<img  onClick="toggle_visibility('oneshop_reportProblemPopupBg');" src="<?php echo base_url()."assets/images/oneshopClose.png"?>" class="oneshop_reportProblemCloseBtn"></a>
    </div>
    <p id="response" style="color: 'green'; font-size: 10pt"></p>	
    <div class="oneshop_reportProblemContent">
    	<div class="oneshop_reportProblemFieldSection">
        <span class="oneshop_reportProblemFieldLable" ><h5>Problem Title :</h5></span>
        <input type="text" id="report_problem_name" name="report_problem_name" class="oneshop_reportProblemField textType">
        </div>
        
    	<div class="oneshop_reportProblemFieldSection">
        <span class="oneshop_reportProblemFieldLable"><h5>Problem Description :</h5></span>
        <textarea class="oneshop_reportProblemField textAreaType"  id="report_problem_description" name="report_problem_description"></textarea>
        </div> 
      
      <div class="location oneshop_reportProblemFieldSection">
       <span class="oneshop_reportProblemFieldLable"><h5>Location :</h5></span>
    <select class="oneshop_reportProblemField" name="location" id="country_id">
            	<option value="">Select your Country</option>
              <?php foreach($country_info as $country_information){
                ?>
                <option value="<?php echo $country_information["country_id"]; ?>"><?php echo $country_information["country_name"]; ?></option>
                <?php
              }?>
            </select>
        
    </div>  
        
    	<div class="oneshop_reportProblemFieldSection">
        <span class="oneshop_reportProblemFieldLable"><h5>Problem Screen Shot :</h5></span>
        <input type="file"  id="report_problem_screenshot" name="report_problem_screenshot" class="oneshop_reportProblemField textType">
        </div>               
    </div>
    
    <div class="oneshop_reportProblemFooter">
    	<button class="oneshop_reportProblemBtn">OK</button>
        <button class="oneshop_reportProblemBtn" id='report_cancel'>Cancel</button>
    </div>    
	</form>

