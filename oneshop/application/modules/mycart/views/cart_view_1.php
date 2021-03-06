<?php
$this->load->module("templates");
$this->templates->app_header();
$this->templates->os_mainmenu("cart_items");
?>
<div class="oneshop_container_sectionnew">
	<div class="oneshop_container_middle_section mat10">
		<?php //$this->templates->os_oneshopheader(); ?>
		<div class="oneshop_left_newcontainer pab10">
			<div class="titlecontainer acenter">
				<div class="titledeco">
					<h4 class="title-text fkinlineblock black">  Cart Items </h4>
				</div>
			</div>
			<div id='cart_items_div'>
              <input type="hidden" id="hcurrent_storeid" value=""/>
              <?php
				$i=1;
				if(count($store_details[0])!=0){
                  foreach($store_details as $slist){
				//echo $slist[0]["store_name"];
				$checkout_btn="checkout_btn".$i;
				$stores_str="stores_div".$i;
				$store_url=base_url()."store_home/".$slist["store_code"];
                            ?>
				<div id="store_dv_<?php echo $slist['store_aid']?>">
					<div class="borderbottom wi100pstg overflow bgRed" id="store_div_<?php echo $slist['store_aid']?>">
						<input type="hidden" id="hstore_aid<?php echo $i?>" value="<?php echo $slist['store_aid'];?>"/>
						<div class="np_des_netpro_settings_tabbg fll">
							<div class="np_des_contbox_safebox_topdiv fll"> <a href="<?php echo $store_url;?>"><?php echo $slist["store_name"];?></a> </div>
							<div class="np_des_curner fll">&nbsp;</div>
						</div>
						<p class="flr mat5">
                                                    <span><a href="javascript:void(0)" class="white mar10" id="remove_<?php echo $slist['store_aid'];?>"> <b>Remove</b> </a> </span>
							<span><a href="javascript:void(0)" class="white" id="<?php echo $checkout_btn;?>"> <b>Checkout</b> </a> </span>
						</p>
					</div>
                    <script type="text/javascript">
					$("#checkout_btn<?php echo $i?>").click(function(){
                                            var sel_storeid=$("#hstore_aid<?php echo $i?>").val();
                                            var quantity=$("#htotal_items_"+sel_storeid).val();
                                            var quantity_str="quantity_"+sel_storeid;
                                            var quantity=0;
                                            var total_stores_amt=0;
                                            var qty_str="";
                                            var price_str="";
                                            $("select[id^='"+quantity_str+"']").each(function(){
                                                var current_qty_id=this.id;
                                                var quantity_val=$("#"+current_qty_id).val();
                                                var product_id=current_qty_id.replace("quantity_","prod_price_");
                                                //alert(product_id);
                                                var product_price=$("#"+product_id).text();
                                                var prod_price=parseInt(quantity_val)*parseInt(product_price);
                                                total_stores_amt=total_stores_amt+(parseInt(quantity_val)*parseInt(product_price));
                                                quantity=parseInt(quantity)+parseInt(quantity_val);
                                                if(qty_str==""){
                                                    qty_str+=quantity_val;
                                                }else{
                                                    qty_str+="~"+quantity_val;
                                                }
                                                if(price_str==""){
                                                    price_str+=prod_price;
                                                }else{
                                                    price_str+="~"+prod_price;
                                                }
                                            });
                                            //alert(total_stores_amt);
                                            var price=$("#htotal_amount"+sel_storeid).val();
                                            $("#hstore_products_qty").val(qty_str);
                                            $("#hcurrent_storeid").val(sel_storeid);
                                            $("#hcheckout_amt").val(total_stores_amt);
                                            $("#hproduct_price_str").val(price_str);
                                            $("#checkout_div").css("display","block");
                                            //alert(quantity+"->"+price);
					});
					$("#remove_<?php echo $slist['store_aid'];?>").click(function(){
                                            var store_aid=<?php echo $slist["store_aid"];?>;
                                            $.ajax({
                                                type:"post",
                                                data:{store_id:store_aid},
                                                url: oneshop_url+"/mycart/deleteCartItem/",
                                                success:function(data){
                                                    if(data.trim()==1){
                                                        window.location.reload();
                                                    }
                                                }
                                            });
					});
					</script>
                    <?php
                      $this->load->module("mycart");
                      $this->mycart->cartViewTpl($slist["store_aid"],$mode,$cart_id);
                      $i++;
                    ?>
                  </div>
					<?php
                      }
					//echo "</div>";
					}
                    else{
                      ?>
                      <div class="nodata_found_bgwrap">
                          <p> Your cart list is empty </p>
                      </div>
                    <?php
                      }
					?>
    <div class="fll wi100pstg" id="checkout_div">
					<div class="wi100pstg mab10 fll address_div">
						<h2>Address Details</h2>
					</div>
                                    <?php
                                    //print_r($address_details);
                                    if($address_details!=""){
                                    ?>
                                    <div class="wi100pstg mab10 fll">
<!--                                        <input type="button" value="Choose existing address" id="existing_addr_btn" class="new_addr_btn"/>-->
                                        <input type="button" value="Choose different address" id="differ_addr_btn" class="differ_btn"/>
                                    </div>
                                    <?php
                                    }
                                    ?>
					<div class="oneshop_product_images mat10 mal20">
						<input type="hidden" id="hcheckout_amt" value=""/>
                                                <div class="wi100pstg mab10 fll">
							<div> Person Name </div>
                                                        <div class="fll"> <input type="text" class="oneshop_setspecified_textbox" placeholder="Person Name" id="person_name" <?php if($address_details!=""){echo "value='".$address_details[0]["person_name"]."'";echo "disabled=true";}?>> </div>
							<p class="wi100pstg fs11 red clearfix" id="mobile_no_error"> Please enter person name </p>
						</div>
						<div class="wi100pstg mab10 fll">
							<div> Address  </div>
                                                        <div class="fll"> <textarea class="oneshop_setspecified_textareabox" id="address" <?php if($address_details!=""){echo "disabled=true";}?>><?php if($address_details!=""){echo $address_details[0]["address_line"];}?></textarea> </div>
							<p class="wi100pstg fs11 red clearfix" id="address_error"> Please enter address </p>
						</div>
						<div class="wi100pstg mab10 fll">
							<div> Mobile No </div>
							<div class="fll"> <input type="text" class="oneshop_setspecified_textbox" placeholder="Mobile Number" id="mobile_no" <?php if($address_details!="" && $address_details[0]["mobile_number"]!=""){echo "value='".$address_details[0]["mobile_number"]."'";echo "disabled=true";}?>> </div>
							<p class="wi100pstg fs11 red clearfix" id="mobile_no_error"> Please enter mobile number</p>
						</div>
						<div class="wi100pstg mab10 fll">
							<div>Alternate Mobile No </div>
							<div class="fll"> <input type="text" class="oneshop_setspecified_textbox" placeholder="Alternate mobile number" id="alt_mobile_no"> </div>
							<p class="wi100pstg fs11 red clearfix" id="alt_mobile_no_error"> Please enter alternate mobile number</p>
						</div>
					</div>
					<div class="oneshop_product_images mat10 mal20">
						<div class="wi100pstg mab10 fll">
						<div> Country  </div>
						<div class="fll">
							<select class="oneshop_specifiedselect_new" id="country">
                                                            <?php
                                                            if($address_details==""){
                                                            ?>
							<option value="">--Select Country--</option>
							<?php
                                                            $this->load->module("mycart");
                                                            $countries_list=$this->mycart->getCountriesList();
                                                            foreach($countries_list as $clist){
                                                                echo "<option value='".$clist["country_id"]."'>".$clist["country_name"]."</option>";
                                                            }
                                                        }
                                                        else{
                                                            echo "<option value='".$address_details[0]["country_id"]."'>".$address_details[0]['country_name']."</option>";
                                                        }
							?>
							</select>
						</div>
						<p class="wi100pstg fs11 red clearfix" id="country_error"> Please select country </p>
					</div>
					<div class="wi100pstg mab10 fll">
						<div>State  </div>
						<div class="fll">
							<select class="oneshop_specifiedselect_new" id="state">
                                                            <?php
                                                            if($address_details==""){
                                                            ?>
							<option value="">--Select State--</option>
                                                        <?php
                                                        }else{
                                                            echo "<option value='".$address_details[0]["state_id"]."'>".$address_details[0]['state_name']."</option>";
                                                        }
                                                        ?>
							</select>
						</div>
					<p class="wi100pstg fs11 red clearfix" id="state_error"> Please select the state to deliver the product </p>
				</div>
				<div class="wi100pstg mab10 fll">
					<div> City  </div>
					<div class="fll">
						<select class="oneshop_specifiedselect_new" id="city">
                                                    <?php
                                                            if($address_details==""){
                                                            ?>
						<option value="">--Select City--</option>
                                                <?php
                                                        }else{
                                                            echo "<option value='".$address_details[0]["city_id"]."'>".$address_details[0]['city_name']."</option>";
                                                        }
                                                        ?>
						</select>
					</div>
					<p class="wi100pstg fs11 red clearfix" id="city_error"> Please select the city to deliver the product </p>
				</div>
				<div class="wi100pstg mab10 fll">
					<div> Zip Code </div>
					<div class="fll"> <input type="text" class="oneshop_setspecified_textbox" placeholder="Zip Code" id="zip_code" <?php if($address_details!=""){echo "value='".$address_details[0]["zipcode"]."'";echo "disabled=true";}?>> </div>
					<p class="wi100pstg fs11 red clearfix" id="zip_code_error"> Please select the city to deliver the product </p>
				</div>
				<div class="wi100pstg mab10 fll">
					<div> Type  </div>
					<div class="fll">
						<select class="oneshop_specifiedselect_new">
						<option value="standard">Standard Delivery</option>
						<option value="fast">Fast Delivery </option>
						</select>
					</div>
				</div>
			</div>
			<div class="wi100pstg mab10 fll" style="padding-left:12px">
				<input type="checkbox" name="save_address" id="save_address" checked="true"/>Save the address for the future purpose
			</div>
			<p class="flr clearfix"><input type="button" name="button" class="np_des_addaccess_btn" id="pcheckout_btn" value="Proceed To Check Out"> </p>
		</div>
	</div>
</div>
            </div></div>

            <div class="oneshop_right_newcontainer pab10">

		<a href="<?php echo ONENETWORKURL.'promotions/oneshopProductPromotions';  ?>" target="_blank"><img src="<?php echo base_url() . "assets/"; ?>images/ad1.jpg" class="hotel_news_imgbox"></a>

  </div>
        </div>
</div>
    <!--Oneshop Content ends Here(vinod 19-05-2015)-->
<?php
$this->templates->app_footer();
?>
<script type="text/javascript">
    var total_prods_amt=0;
    var total_quantity=0;
    $(document).ready(function(){
        var total_amount=0;
        var total_items=0;
        $("span[id^='prod_price']").each(function(){
            var current_id=this.id;
            var product_price=$("#"+current_id).text().trim();
            total_amount=parseInt(total_amount)+parseInt(product_price);
        });
        $("select[id^='quantity']").each(function(){
            var current_id=this.id;
            var product_qty=$("#"+current_id).val();
            total_items=parseInt(total_items)+parseInt(product_qty);
            //alert(total_amount);
        });
        total_prods_amt=total_amount;
        total_quantity=total_items;
        $("#total_items_num").text(total_items);
        $("#total_price").text(total_amount);
    });
    $("#pcheckout_btn").click(function(){
        var total_price=$("#hcheckout_amt").val();
        var person_name=$("#person_name").val();
        var country=$("#country").val();
        var state=$("#state").val();
        var city=$("#city").val();
        var zip_code=$("#zip_code").val();
        var address=$("#address").text();
        var mobileno=$("#mobile_no").val();
        var altmobile_no=$("#alt_mobile_no").val();
        //alert(total_price);
        var error=0;
        var error_msg="";
        var element_ids_arry=["country","state","city","zip_code","address","mobile_no"];
        for(var i=0;i<element_ids_arry.length;i++){
            var element_id=element_ids_arry[i];
            var elem_val="";
            elem_val=$("#"+element_id).val();
            if(elem_val==""){
                $("#"+element_id+"_error").css("display","block");
                error++;
            }
            if(element_id=="mobile_no"){
                if(!validateMobile(elem_val)){
                    $("#"+element_id+"_error").css("display","block").text("Please enter valid mobile number");
                    error++;
                }
            }
            if(element_id=="zip_code"){
                if(!validateNumeric(elem_val)){
                    $("#"+element_id+"_error").css("display","block").text("Please enter valid zip code");
                    error++;
                }
            }
        }
        if(altmobile_no!=""){
            if(!validateMobile(altmobile_no)){
                $("#alt_mobile_no_error").css("display","block").text("Please enter valid alternate mobile number");
                    error++;
            }
        }
        //alert(error);
        if(error==0){
            $.ajax({
                type:"post",
                data:{person_name:person_name,state_id:state,city_id:city,country_id:country,zipcode:zip_code,mobile_no:mobileno,address:address,alt_mobile_no:altmobile_no},
                url: oneshop_url+"/mycart/shippingAddress",
                success:function(data){
                    //alert(result);
                    var result=data.trim();
                    if(result==1){
                        paybookPop(total_price);
                    }
                    //$("#os_popup").css("display","block");
                }
            });
        }
        //alert(total_price);
    });
    function validateNumeric(elem_val){
        var regex=/^[0-9]+$/;
        if(!elem_val.match(regex)){
            return false;
        }
        return true;
    }
    function validateMobile(ele_val){
        var regexp=/^[1-9]{1}[0-9]{9}$/;
        if(regexp.test(ele_val)==false){
            return false;
        }
        return true;
    }
    function paybookPop(total_price){
        var store_id=$("#hcurrent_storeid").val();
        var product_ids=$("#store_dv_"+store_id+" #hstore_products_ids").val();
        var mode='<?php echo $mode?>';
        $.ajax({
            type:"post",
            data:{total_price:total_price,store_id:store_id,product_ids:product_ids,mode:mode},
            url: oneshop_url+"/mycart/paybookPopup",
            success:function(data){
                $("#os_popup").html(data);
                $("#os_popup").css("display","block");
            }
        });
    }
    $("#country").change(function(){
        var country_val=$(this).val();
        $.ajax({
            type:"post",
            data:{country_id:country_val},
            url: oneshop_url+"/mycart/getStatesList",
            success:function(data){
                var result=data.trim();
                var state_options=result.split("~");
                var state_options_str="<option value=''>--Select State--</option>";
                for(var i=0;i<state_options.length;i++){
                    var state_opt=state_options[i];
                    var state_opts_arry=state_opt.split("-");
                    state_options_str+="<option value='"+state_opts_arry[0]+"'>"+state_opts_arry[1]+"</option>";
                }
                //state_options_str="<option value=''>--Select State--</option>";
                //alert(state_options_str);
                $("#state").html(state_options_str);
            }
        });
    });
    $("#state").change(function(){
        var state_val=$(this).val();
        $.ajax({
            type:"post",
            data:{state_id:state_val},
            url: oneshop_url+"/mycart/getCitiesList",
            success:function(data){
                var result=data.trim();
                var cities_options=result.split("~");
                var cities_options_str="<option value=''>--Select City--</option>";
                for(var i=0;i<cities_options.length;i++){
                    var city_opt=cities_options[i];
                    var city_opts_arry=city_opt.split("-");
                    cities_options_str+="<option value='"+city_opts_arry[0]+"'>"+city_opts_arry[1]+"</option>";
                }
                $("#city").html(cities_options_str);
            }
        });
    });
    $("#differ_addr_btn").click(function(){
        var fields_arry=["person_name","address","mobile_no","alt_mobile_no","country","state","city","zip_code"];
        //alert("werwerbwer");
        for(var j=0;j<fields_arry.length;j++){
            $("#"+fields_arry[j]).attr("disabled",false);
            $("#"+fields_arry[j]).val("");
            if(fields_arry[j]=="country"){
                $.ajax({
                    type:"post",
                    url: oneshop_url+"/mycart/getCountriesListStr",
                    success:function(data){
                        var result=data.trim();
                        //alert(result);
                        var countries_options=result.split("~");
                        var options_str="<option value=''>--Select country--</option>";
                        for(var c=0;c<countries_options.length;c++){
                            var option=countries_options[c];
                            var opt=option.split("-");
                            options_str+="<option value='"+opt[0]+"'>"+opt[1]+"</option>";
                        }
                        $("#country").html(options_str);
                    }
                });
            }
        }
    });
</script>
<style type="text/css">
  #addcard_div,#checkout_div,#address_error,#state_error,#country_error,#mobile_no_error,#city_error,#zip_code_error,#alt_mobile_no_error{
      display:none;
  }
  .address_div{
      background-color:#ddd;
      padding:6px 10px;
      margin-top:10px;
  }
  .new_addr_btn{
      background-color:#ddd;
      font-weight:bold;
      color:#000;
      padding:10px;
      margin-right:10px;
  }
  .differ_btn{
      background-color:#d20000;
      font-weight:bold;
      border:1px solid #000 ;
      color:#fff;
      padding:10px;
      margin-right:10px;
  }
</style>
