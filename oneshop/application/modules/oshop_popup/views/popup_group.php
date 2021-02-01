


<div class="click_popUp" id="createGroupPopUp" style="display: none;">

	<div class="click_createGroupPopUpWrapper">
    <a href="javascript: void(0)" onClick="toggle_popUpVisibility('createGroupPopUp');">
    <span class="click_createGroupPopUpCloseBtn"><h2>X</h2></span></a>  
    <div class="click_popUpSection"> 
	    <div class="click_createGroupPopUpHeader"><h4>Create a Group</h4></div>
        <form enctype="multipart/form-data" method="post" id="netpro_create_group"  >
        <div class="click_createGroupForm">
            <div class="click_createGroupFormField">
            	<span class="click_createGroupFormFieldLable"><h4>Group Name  :</h4></span>
                <input type="text" class="click_createGroupFormFieldInput netpro_grp_name" name="group_name" id="group_name">
            </div>
             <div class="click_createGroupFormField">
            	<span class="click_createGroupFormFieldLable"><h4>Description :</h4></span>
                <textarea class="click_createGroupFormFieldInput click_textAreaType netpro_grp_description" name="group_desc" id="group_desc"></textarea>
            </div>
        	<div class="click_createGroupFormField">
            	<span class="click_createGroupFormFieldLable"><h4>Group Logo:</h4></span>
                 <input type="file" class="click_createGroupFormFieldInput netpro_grp_logo" name="group_logo" id="group_logo">
            </div>
            <div class="click_createGroupFormField">
            	<span class="click_createGroupFormFieldLable"><h4>Cover:</h4></span>
                <input type="file" class="click_createGroupFormFieldInput netpro_grp_cover" name="group_cover" id="group_cover">
            </div>
           
        </div>
        
        <div class="click_createGroupPopUpFooter">
        	<div class="click_createGroupPopUpFooterOptions">
            	<button value="SUBMIT" class="click_reportProblemBtn" onClick=toggle_popUpVisibility('createGroupPopUp');>Cancel</button>
            	<button class="click_reportProblemBtn" onclick="formDataSubmit()">Ok</button>
            </div>
        </div>
            </form>
    </div>
    </div>

    </div>

