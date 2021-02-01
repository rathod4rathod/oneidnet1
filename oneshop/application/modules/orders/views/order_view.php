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

}
//print_r($orderitems);
$product_detail_url=base_url()."product_detail_view/".$orderitems[0]["store_code"]."/".$orderitems[0]["product_code"];
$tgrand=0;
$tqnty=0;
?>
<!--Oneshop Content starts Here(vinod 19-05-2015)-->
<div class="oneshop_container_sectionnew">
	<div class="oneshop_container_middle_section mat10">
		<div class="oneshop_left_newcontainer mat15">
			<div class="fll wi100pstg borderbottom pab5">
				<div class="fll wi100pstg">
					<div class="fll wi100pstg"> <h3 class="normal fll mab20"> Order ID </h3> <h3 class="fll fs14 lh20 mal10"> <?php echo $order_details[0]["order_code"]; ?></h3> </div>
					<div class="fll"><span class="fll mar10"> Order on : </span> 
						<span class="fll"> <?php echo $order_details[0]["time"]; ?> 
					</span>
					</div>

					<div class="fll wi100pstg"><span class="fll mar10"> Delivery Details : </span> 
					<?php if($order_details[0]["status"] != 'CANCELLED' && $order_details[0]["status"] != 'JUST_PLACED'){ ?> 
						<span class="bold red fll"> <?php echo $order_details[0]["order_delivery_detail"];?> </span> 
					<?php }else{?>
						<span class="bold red fll"> YOU WILL GET DELIVERY DETAILS HERE... </span>
					<?php }?>
					</div>
				</div>
			</div>
			<div class="clearfix"></div>
			<div class="fll wi100pstg mat20 mab10">
				<h5 class="pab5 mal5 bold red fll"> Order Summary  </h5>
				<table width="100%" cellspacing="0" cellpadding="0" border="0" class="packagedat">
					<tbody>
						<tr class="bgcolor" id="tr_<?php echo $order_details[0]['order_aid']?>">
							<td class="red fs11 bold">  PRODUCT CODE </td>
							<td class="red fs11 bold"> NAME </td>
							<td class="red fs11 bold"> QTY </td>
							<td class="red fs11 bold"> UNIT PRICE </td>
							<td class="red fs11 bold"> TOTAL </td>
                                                        <td class="red fs11 bold aright par10">  </td>
						</tr>
						<!-- <?php 
							foreach($order_stores as $stores) {
						?>
						<tr>
							<td>  <?php echo $stores['store_name']; ?></td>
						</tr>
					<?php } ?> -->
						<?php
							foreach($orderitems as $item) {
						?>
<!--Edited by Mitesh =>  price, total price format -->
						<tr>
							<td>  <?php echo $item['product_code']; ?></td>
                            <td> <a href="<?php echo $product_detail_url;?>"><?php echo $item['product_name']; ?> </a></td>
							<td> <?php echo $item['quantity']; ?>  </td>
							<td> <?php echo $item['symbol']." ".number_format($item['price'],2); ?>  </td>
							<td class="center par10"> <?php echo number_format($item['price']*$item['quantity'],2); ?> </td>
<!--                                                        <td><?php echo "<a href='javascript:void(0)' onclick='cancel(33,73)'>Cancel</a>"?></td>-->
                            <?php
                            if($item["status"]==0){
                            ?>
                            <td><?php echo "<a href='javascript:void(0)' id='cancel_".$item["product_aid"]."'>Cancel</a>"?></td>
                            <?php
                            }
                            ?>
						</tr>
						<?php 
						$tgrand+=$item['price'];
						?>
						<?php } ?>
						<tr>
							<td style="border-bottom:none;" align="left" valign="top">&nbsp;  </td>
							<td style="border-bottom:none;">&nbsp;  </td>
							<td style="border-bottom:none;">&nbsp;  </td>
							<td style="border-bottom:none;">&nbsp;  </td>
							<td style="border-bottom:none;" class="fs12 gray pat10"> Grand Total : </td>
							<td style="border-bottom:none;" class="fs14 bold par10 aright"> <?php echo number_format($tgrand*$item['quantity'],2); ?> </td>
						</tr>

						<tr>
							<td style="border-bottom:none;" align="left" valign="top">&nbsp;  </td>
							<td style="border-bottom:none;">&nbsp;  </td>
							<td style="border-bottom:none;">&nbsp;  </td>
							<td style="border-bottom:none;">&nbsp;  </td>
							<td style="border-bottom:none;" class="fs12 gray">Shipping Charges : </td>
							<td style="border-bottom:none;" class="fs14 bold aright par10"> <?php echo number_format($order_details[0]["order_shipping"],2);?> </td>
						</tr>

						<tr>
							<td style="border-bottom:none;" align="left" valign="top">&nbsp;  </td>
							<td style="border-bottom:none;">&nbsp;  </td>
							<td style="border-bottom:none;">&nbsp;  </td>
							<td style="border-bottom:none;">&nbsp;  </td>
							<td style="border-bottom:none;" class="fs12 gray"> Handling Charges : </td>
							<td style="border-bottom:none;" class="fs14 bold aright par10">  <?php echo number_format($order_details[0]["order_handling"],2);?> </td>
						</tr>
						<tr>
							<td style="border-bottom:none;" align="left" valign="top">&nbsp;  </td>
							<td style="border-bottom:none;">&nbsp;  </td>
							<td style="border-bottom:none;">&nbsp;  </td>
							<td style="border-bottom:none;">&nbsp;  </td>
							<td style="border-bottom:none;" class="fs12 gray"> TAX : </td>
							<?php foreach ($order_tax as $tlist) {
								$ttax+=$tlist["tax_perc"];?>
							<?php }?>
							<td style="border-bottom:none;" class="fs14 bold aright par10">  <?php echo number_format(($item['price']*$ttax/100),2);?> </td>
						</tr>
					</tbody>
				</table>
				<?php 
				// $oneid_amt=$item['price']*5/100;
				$tax_amt=$item['price']*$ttax/100;
				$order_total_amount+= $tgrand + +$order_details[0]["order_shipping"] + +$order_details[0]["order_handling"] + +$tax_amt;
				?>
				<div class="bold" style="border-top:1px #CCC solid;">
					<p class="aright bgcolor flr pal10 pat5 fs14"><span class="red mar30"> Net Received Amount : </span> <span> <?php echo $item['symbol']." ".number_format($order_total_amount,2);?></span>  </p>
				</div>
			</div>
			<div class="oisdes_left_parcel_leftbox mal10">
				<h5 class="mab10 red"> Customer Detail </h5>
				<div class="mab10 overflow">
					<p class="wi200 fll"> Person Name </p><span class="fll">:&nbsp;<?php echo $user_details[0]["person_name"]; ?></span>
					<p style="display:none;"> <input type="text" class="oneshop_productfield_textbox" placeholder="Product Name"> </p>
				</div>
				<div class="mab10 overflow">
					<p class="wi200 fll"> Mobile </p> <span class="fll">:&nbsp;<?php echo $user_details[0]['mobile_number'];?></span>
					<p style="display:none;"> <select name="privacy" class="oneshop_selectbox_field">
						<option value="">Select Privacy</option>
						<option value="Public">Public</option>
						<option value="Private">Private</option>
					</select> </p>
				</div>
				<div class="mab10 overflow">
					<p class="wi200 fll"> Address Line1 </p><span class="fll">:&nbsp;<?php echo $user_details[0]['address_line'];?></span>
					<p style="display:none;">
						<textarea name="desc" placeholder="Description" class="subcategory_textarea"></textarea>
					</p>
				</div>
				<div class="mab10 overflow">
					<p class="wi200 fll"> Address Line2 </p><span class="fll">:&nbsp;<?php echo $user_details[0]['address_line2'];?></span>
					<p style="display:none;">  
						<textarea name="desc" placeholder="Description" class="subcategory_textarea"></textarea>
					</p>
				</div>
				<div class="mab10 overflow">
					<p class="wi200 fll"> City </p>
					<span class="fll">:&nbsp;
						<?php
							echo $user_details[0]['city_name'];
						?>
					</span>
					<p style="display:none;"> <select name="privacy" class="oneshop_selectbox_field">
					<option value="">Select Privacy</option>
					<option value="Public">Public</option>
					<option value="Private">Private</option>
					</select> </p>
				</div>

				<div class="mab10 overflow">
					<p class="wi200 fll"> State </p><span class="fll">:&nbsp;
                                            <?php
						echo $user_details[0]['state_name'];
                                            ?>
					</span>
					<p style="display:none;"> <select name="privacy" class="oneshop_selectbox_field">
					<option value="">Select Privacy</option>
					<option value="Public">Public</option>
					<option value="Private">Private</option>
					</select> </p>
				</div>

				<div class="mab10 overflow">
					<p class="wi200 fll"> Zip Code </p> <span class="fll">:&nbsp;<?php echo $user_details[0]['zipcode'];?></span>
					<p style="display:none;"> <select name="privacy" class="oneshop_selectbox_field">
					<option value="">Select Privacy</option>
					<option value="Public">Public</option>
					<option value="Private">Private</option>
					</select> </p>
				</div>

				<div class="mab10 overflow">
					<p class="wi200 fll"> Country </p> <span class="fll">:&nbsp;
                                            <?php
						echo $user_details[0]['country_name'];
                                            ?>
					</span>
					<p style="display:none;"> <select name="privacy" class="oneshop_selectbox_field">
					<option value="">Select Privacy</option>
					<option value="Public">Public</option>
					<option value="Private">Private</option>
					</select> </p>
				</div>
                                <div class="mab10 overflow">
					<p class="wi200 fll"> Status </p><span class="fll">:&nbsp;
                                            <?php
                                           if($order_details[0]['status']=='JUST_PLACED'){ 
						echo "Order is  just Placed";
                                           }elseif($order_details[0]['status']=='PROCESSING'){
                                               echo "Order is processing";
                                           }elseif($order_details[0]['status']=='DELIVERED'){
                                                echo "Order is delivered";
                                           }else{
                                               echo "Order is cancelled";
                                           }
                                            ?>
					</span>
					
				</div>
			</div>
			<div class="clearfix"></div>

<!--			<div class="overflow mal10 fll mat20">
				<h5 class="mab10 red"> Choose Status </h5>
				<div class="mab10 overflow">
					<p class="wi200 fll"> Choose Status </p>
					<p> <select name="privacy" class="oneshop_setspecified_textbox">
					<option value="">Select Privacy</option>
					<option value="Public">Public</option>
					<option value="Private">Private</option>
					</select> </p>
				</div>
			</div>-->
		</div>
		<div class="oneshop_right_newcontainer mat15">
			
		</div>
	</div>
</div>
<!--Oneshop Content ends Here(vinod 19-05-2015)-->            

<?php
$this->templates->app_footer(  ); 
?>

<script type="text/javascript">
  $("a[id^='cancel_']").click(function(){
    var btn_id=$(this).attr("id");
    var btn_id_arry=btn_id.split("_");
    var tr_id=$("tr[id^='tr_']").attr("id");
    var tr_id_arry=tr_id.split("_");
    //alert(btn_id_arry[1]+"->"+tr_id_arry[1]);
    callAJAX(oneshop_url+"/cancel_order/",{product_aid:btn_id_arry[1],order_aid:tr_id_arry[1]},function(data){
      var result=data.trim();
      if(result=="OININSSUCCESS"){
        $("#"+btn_id).css("display","none");
      }else{
        $("#"+btn_id).prop("disabled",false);
        alert("Please try again later");
      }
    },function(){
      $("#"+btn_id).prop("disabled",true);
    });
  });
</script>