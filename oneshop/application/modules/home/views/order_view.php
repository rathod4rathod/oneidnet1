<?php
$this->load->module('templates');
$this->templates->app_header();
$this->templates->os_mainmenu();

$store_owner="no";
$store_manager="no";
$store_owner_details=$this->templates->get_store_ownerId();
$user_id=$this->templates->get_UserId();
if($store_owner_details!=""){
    $store_owner="yes";
}else{
    $manager_details=$this->templates->store_manager_return($user_id);
    if($manager_details["role"]=="ORDER_MANAGER" || $manager_details["role"]=="PRODUCT_MANAGER"){
        $store_manager="yes";
    }
    
}?>


<!--Oneshop Content starts Here(vinod 19-05-2015)-->
<div class="oneshop_container_sectionnew">
	<div class="oneshop_container_middle_section mat10">
		<div class="oneshop_left_newcontainer mat15">
			<div class="fll wi100pstg borderbottom pab5">
				<div class="fll wi100pstg">
					<div class="fll wi100pstg"> <h3 class="normal fll mab20"> Order ID </h3> <h3 class="fll fs14 lh20 mal10"> ID # 995544 </h3> </div>
					<div class="fll"><span class="fll mar10"> Order on : </span> <span class="fll"> 27-12-2015 </span> </div>
				</div>
			</div>
			<div class="clearfix"></div>
			<div class="fll wi100pstg mat20 mab10">
				<h5 class="pab5 mal5 bold red fll"> Order Summary  </h5>
				<table width="100%" cellspacing="0" cellpadding="0" border="0" class="packagedat">
					<tbody><tr class="bgcolor">
							<td class="red fs11 bold">  PRODUCT CODE </td>
							<td class="red fs11 bold"> NAME </td>
							<td class="red fs11 bold"> QTY </td>
							<td class="red fs11 bold"> UNIT PRICE </td>
							<td class="red fs11 bold aright par10"> TOTAL </td>
						</tr>

						<tr>
							<td align="left" valign="top"> PRID000999 </td>
							<td> Samsung Galaxy On7(Gold, 8 GB). </td>
							<td> 2 </td>
							<td> 1250.00 </td>
							<td class="aright par10"> 6500 </td>
						</tr>

						<tr>
							<td align="left" valign="top"> PRID077 </td>
							<td> Dual SIM (4G + 4G) 5.5 Inch HD Display </td>
							<td> 2 </td>
							<td> 98,999.00 </td>
							<td class="aright par10"> 1,20,988 </td>
						</tr>

						<tr>
							<td align="left" valign="top"> PRID077 </td>
							<td> Dual SIM (4G + 4G) 5.5 Inch HD Display </td>
							<td> 2 </td>
							<td> 98,999.00 </td>
							<td class="aright par10"> 1,20,988 </td>
						</tr>
						<tr>
							<td align="left" valign="top"> PRID077 </td>
							<td> Dual SIM (4G + 4G) 5.5 Inch HD Display </td>
							<td> 2 </td>
							<td> 98,999.00 </td>
							<td class="aright par10"> 1,20,988 </td>
						</tr>
						<tr>
							<td style="border-bottom:none;" align="left" valign="top">&nbsp;  </td>
							<td style="border-bottom:none;">&nbsp;  </td>
							<td style="border-bottom:none;">&nbsp;  </td>
							<td style="border-bottom:none;" class="fs12 gray pat10"> Grand Total : </td>
							<td style="border-bottom:none;" class="fs14 bold par10 aright"> 2,40,988 </td>
						</tr>

						<tr>
							<td style="border-bottom:none;" align="left" valign="top">&nbsp;  </td>
							<td style="border-bottom:none;">&nbsp;  </td>
							<td style="border-bottom:none;">&nbsp;  </td>
							<td style="border-bottom:none;" class="fs12 gray">Oneidnet 11% </td>
							<td style="border-bottom:none;" class="fs14 bold aright par10"> 30% </td>
						</tr>

						<tr>
							<td style="border-bottom:none;" align="left" valign="top">&nbsp;  </td>
							<td style="border-bottom:none;">&nbsp;  </td>
							<td style="border-bottom:none;">&nbsp;  </td>
							<td style="border-bottom:none;" class="fs12 gray"> Oneidship Charges </td>
							<td style="border-bottom:none;" class="fs14 bold aright par10"> 10% </td>
						</tr>
					</tbody>
				</table>
				<div class="bold" style="border-top:1px #CCC solid;">
					<p class="aright bgcolor flr pal10 pat5 fs14"><span class="red mar30"> Net Received Amount : </span> <span> 2,50,000/-</span>  </p>
				</div>
			</div>
			<div class="oisdes_left_parcel_leftbox mal10">
				<h5 class="mab10 red"> Customer Detail </h5>
				<div class="mab10 overflow">
					<p class="wi200 fll"> Person Name </p><span class="fll">:</span> 
					<p style="display:none;"> <input type="text" class="oneshop_productfield_textbox" placeholder="Product Name"> </p>
				</div>
				<div class="mab10 overflow">
					<p class="wi200 fll"> Mobile </p> <span class="fll">:</span>
					<p style="display:none;"> <select name="privacy" class="oneshop_selectbox_field">
						<option value="">Select Privacy</option>
						<option value="Public">Public</option>
						<option value="Private">Private</option>
					</select> </p>
				</div>
				<div class="mab10 overflow">
					<p class="wi200 fll"> Address Line </p><span class="fll">:</span>
					<p style="display:none;">  
						<textarea name="desc" placeholder="Description" class="subcategory_textarea"></textarea>
					</p>
				</div>
				<div class="mab10 overflow">
					<p class="wi200 fll"> City </p><span class="fll">:</span>
					<p style="display:none;"> <select name="privacy" class="oneshop_selectbox_field">
					<option value="">Select Privacy</option>
					<option value="Public">Public</option>
					<option value="Private">Private</option>
					</select> </p>
				</div>

				<div class="mab10 overflow">
					<p class="wi200 fll"> State </p><span class="fll">:</span>
					<p style="display:none;"> <select name="privacy" class="oneshop_selectbox_field">
					<option value="">Select Privacy</option>
					<option value="Public">Public</option>
					<option value="Private">Private</option>
					</select> </p>
				</div>

				<div class="mab10 overflow">
					<p class="wi200 fll"> Zip Code </p> <span class="fll">:</span>
					<p style="display:none;"> <select name="privacy" class="oneshop_selectbox_field">
					<option value="">Select Privacy</option>
					<option value="Public">Public</option>
					<option value="Private">Private</option>
					</select> </p>
				</div>

				<div class="mab10 overflow">
					<p class="wi200 fll"> Country </p> <span class="fll">:</span>
					<p style="display:none;"> <select name="privacy" class="oneshop_selectbox_field">
					<option value="">Select Privacy</option>
					<option value="Public">Public</option>
					<option value="Private">Private</option>
					</select> </p>
				</div>
			</div>
			<div class="clearfix"></div>

			<div class="overflow mal10 fll mat20">
				<h5 class="mab10 red"> Choose Status </h5>
				<div class="mab10 overflow">
					<p class="wi200 fll"> Choose Status </p>
					<p> <select name="privacy" class="oneshop_setspecified_textbox">
					<option value="">Select Privacy</option>
					<option value="Public">Public</option>
					<option value="Private">Private</option>
					</select> </p>
				</div>
			</div>
		</div>
		<div class="oneshop_right_newcontainer mat15">
				</div>
	</div>
</div>
<!--Oneshop Content ends Here(vinod 19-05-2015)-->            

<?php
$this->templates->app_footer(  ); 
?>
