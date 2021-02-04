<div style="margin-left:80px;" id="tab4">
    <form method="post" name="adsstudio_form" id="adsstudio_form" enctype="multipart/form-data">
	<p class="bold fs12 mat20">Ads Studio</p>
        <div  class="fll  form_width" id="outside_contenttype"  >
		<p class="label_name"> Content Nature </p>
		<p> 
			<select class='flight_searchfield_adult_and_childcontainer' name="onenetwork_contenttype" id="onenetwork_contenttype"  >
				<option value="">Select </option>
				<option value="SOCIAL">Social</option>
				<option value="PROFESSIONAL">Professional</option>
				<option value="ALL">All</option>
				
			</select>
		</p>
	</div>
        <div  class="fll  form_width" >
		<p class="label_name"> Source Type</p>
		<p> 
			<select class='flight_searchfield_adult_and_childcontainer'  name="onenetwork_source" id="onenetwork_source"  >
				<option value="">Select</option>
				<option value="INSIDE_SYSTEM">Inside</option>
				<option value="OUTSIDE_SYSTEM">Outside</option>
			</select>
		</p>
	</div>
        	
	<div  class="fll  form_width" id="onenetwork_social" style="display:none" >
		<p class="label_name"> Select Module  to Target</p>
		<p> 
			<select  multiple="multiple"   height="50" class='flight_searchfield_adult_and_childcontainer'   name="onenetwork_promotion[]"  id="onenetwork_promotion"  >
				<option value="">Select Module</option>
				<option value="CLICK">Click</option>
				<option value="BUZZIN">Buzzin</option>
				<option value="DEALERX">Dealerx</option>
				<option value="ONEVISION">One vision</option>
				<option value="FINDIT">Findit</option>
				<option value="ONENETWORK">Onenetwork</option>
				
					</select>
		</p>
	</div>
	<div  class="fll  form_width" id="onenetwork_professional"  style="display:none">
		<p class="label_name"> Select Module  to Target </p>
		<p> 
			<select  multiple="multiple"  class='flight_searchfield_adult_and_childcontainer' id="onenetwork_promotion"   name="onenetwork_promotion[]"  >
				<option value="">Select Module</option>
				<option value="NETPRO">Netpro</option>
				<option value="CLICK">Co Office</option>
				<option value="CVBANK">Cvbank</option>
				<option value="VCOM">Vcom</option>
				<option value="FINDIT">Find it</option>
				<option value="ONENETWORK">Onenetwork</option>
				
					</select>
		</p>
	</div>
	<div  class="fll  form_width" id="onenetwork_all"  style="display:none"  >
		<p class="label_name"> Select Module  to Target </p>
		<p> 
			<select class='flight_searchfield_adult_and_childcontainer' multiple="multiple"  id="onenetwork_promotion"  name="onenetwork_promotion[]"  >
				<option value="">Select Module</option>
				<option value="NETPRO">Netpro</option>
				<option value="ONESHOP">OneShop</option>
				<option value="TUNNEL">Tunnel</option>
				<option value="DEALERX">DealerX</option>
				<option value="COOFFICE">Co Office</option>
				<option value="ISNEWS">Is News</option>
				<option value="CLICK">Click</option>
				<option value="BUZZIN">Buzzin</option>
				<option value="TRAVELTIME">Travel Time</option>
				<option value="ONENETWORK">Onenetwork</option>
				<option value="360MAIL">360Mail</option>
			</select>
		</p>
	</div>
	
	<div  class="fll  form_width" id="onenetwork_insideall"  style="display:none"  >
		<p class="label_name"> Select Module  </p>
		<p> 
			<select class='flight_searchfield_adult_and_childcontainer' name="onenetwork_modules" id="onenetwork_modules" onchange="getEntitytype(this.value)"  >
				<option value="">Select Module</option>
				<option value="netpro">Netpro</option>
				<option value="oneshop">OneShop</option>
				<option value="tunnel">Tunnel</option>
				<option value="dealerx">DealerX</option>
				<option value="cooffice">Co Office</option>
				<option value="isnews">Is News</option>
				<option value="click">Click</option>
				<option value="buzzin">Buzzin</option>
				<option value="traveltime">Travel Time</option>
				<option value="Onenetwork">Onenetwork</option>
				<option value="mail">360Mail</option>
			</select>
		</p>
	</div>
	<div  class="fll  form_width" style="display:none;" id="onenetwork_submodule">
		<p class="label_name"> Entity type </p>
		<p> 
			<select class='flight_searchfield_adult_and_childcontainer' name="submodule_list" id="submodule_list"  >
				<option value="">Select </option>
				
			</select>
		</p>
	</div>
	<div  class="fll  form_width" style="display:none;" id="onenetwork_entity">
		<p class="label_name"> Entity type </p>
		<p> 
                    <select class='flight_searchfield_adult_and_childcontainer' name="entity_list" id="entity_list"  >
				<option value="">Select </option>
				
			</select>
		</p>
	</div>
	<div  class="fll  form_width" id="outside_urldiv">
		<p class="label_name"> Enter URL </p>
		<input type="text" value="" id="outsideUrl" name="outsideUrl" class="oneshop_productfield_textbox">
	</div>
	<div  class="fll  form_width">
		<p class="label_name"> Compaign Type </p>
		<p>
                    <select class='flight_searchfield_adult_and_childcontainer' id="onenetwork_campaigntype" name="onenetwork_campaigntype" >
				<option value="">Select</option>
				<option value="WEBSITE"  <?php  if($campaign_type =='Website_Marketing'){ echo "selected='selected'" ;}?>>Website</option>
				<option value="BANNER" <?php  if($campaign_type =='Banner_Marketing'){ echo "selected='selected'" ;}?>>Banner</option>
				<option value="FLASH" <?php  if($campaign_type =='Flash_Marketing'){ echo "selected='selected'" ;}?>>Flash</option>
			</select> 
		</p>
	</div>
	<div  class="fll  form_width" id="onenetworksize">
		<p class="label_name"> Size </p>
		<p> 
			<select class='flight_searchfield_adult_and_childcontainer' id="onenetwork_size"  name="onenetwork_size" >
				<option value="">Select</option>
				<option value="PERFECT_SQUARE">Perfect Squre</option>
				<!--<option value="COVER_UP">Cover Up</option>-->
				<option value="HALF_VERTICULAR">Half Verticular</option>
			</select>
		</p>
	</div>


	<div  class="fll  form_width">
		<p class="label_name"> Each day Budget</p>
                <p> 
		<input type="text" value="" id="onenetwork_budget"  onblur="budget()" name="onenetwork_budget"   class="oneshop_productfield_textbox">
	       </p>
         </div>
	<div  class="fll  form_width" >
		<p class="label_name"> Total Campaign Cost</p>
                <p>
                    <input type="text" value="" id="onenetwork_compaigncost" readonly="readonly" name="onenetwork_compaigncost" class="oneshop_productfield_textbox">
                </p>
	</div>
        <div  class="fll  form_width" id="onenetwork_banner" >
		<p class="label_name"> Choose Banner </p>
                <p>
		<input type="file" value="" id="onenetwork_adbanner" name="onenetwork_adbanner" class="oneshop_productfield_textbox">
                </p>
	</div>
	

	<div class="clearfix"></div>
	
	
	
	
	
	     
	
       
       
       
       
       
       
       
	<!--<div class="mat20 mar10"> <input type="button" value="SAVE" class="np_des_checkout_btn" id="basic_save"  name="button">  </div>-->
	<div class="mat20 mar10"> <input type="button" value="NEXT" class="np_des_checkout_btn" id="onenetwork_adsstudio"  name="button">  </div>
</form>
</div>
