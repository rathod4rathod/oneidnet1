<?php
$this->load->module("templates");
$this->templates->app_header();
$this->templates->os_mainmenu("cart_items");
?>
<style type="text/css">
.isa_error {
    color: #D8000C;
    background-color: #FFD2D2;
    margin: 10px 0px;
    padding:12px;
}
</style>
<div class="oneshop_container_sectionnew">
	<div class="oneshop_container_middle_section mat10" style="width: 75%">
      <?php if($_SESSION["check"]["invalid"] && (time()-$_SESSION["check"]["time"] < 15)) {?>
        <div class="isa_error">
          <?php echo $_SESSION["check"]["invalid"]?>
        </div>
        <?php } else {
          unset($_SESSION['check']);
        }?>
      <div class="oneshop_left_newcontainer pab10">
       <div class="hd_heading">
            	<h1>Cart Items<span></span></h1>
        </div>
      </div>
      <div id='cart_items_div'>
      
      </div>
          <input type="hidden" id="htotal_price" value=""/>
      </div>
      <div class="oneshop_right_newcontainer pab10">
      
		<a href="<?php echo ONENETWORKURL.'promotions/oneshopProductPromotions';  ?>" target="_self"><img src="<?php echo base_url() . "assets/"; ?>images/ad1.jpg" class="hotel_news_imgbox"></a>
      </div>
      <div class="fll wi100pstg" id="checkout_div">
                  <div class="wi100pstg mab10 fll address_div">
                      <h2>Address Details</h2>
                  </div>
                                  <?php
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
                          <div> Person's Name </div>
                                                      <div class="fll"> <input type="text" class="oneshop_setspecified_textbox" placeholder="Person Name" id="person_name" <?php if($address_details!=""){echo "value='".$address_details[0]["person_name"]."'";echo "disabled=true";}?>> </div>
                          <p class="wi100pstg fs11 red clearfix" id="name_no_error"> Please enter person name </p>
                      </div>
                      <div class="wi100pstg mab10 fll">
                          <div> Address  </div>
                                                      <div class="fll"> <textarea class="oneshop_setspecified_textareabox" id="address"
                                                        <?php if($address_details!=""){echo "value='".$address_details[0]["address_line"]."'";echo "disabled=true";}?>></textarea> </div>
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
                      <select class="oneshop_specifiedselect_new" id="d_option">
                        <option value="">Select Delivery Option</option>
                        <option value="standard">Standard Delivery</option>
                        <option value="fast">Fast Delivery </option>
                        <option value="pickup"> Pickup </option>
                      </select>
                  </div>
                  <p class="wi100pstg fs11 red clearfix" id="d_option_error"> Please enter Delivery Option </p>
              </div>
          </div>
          <div class="wi100pstg mab10 fll" style="padding-left:12px">
              <input type="checkbox" name="save_address" id="save_address" checked="true"/>Save the address for the future purpose
          </div>
          <p class="flr clearfix"><input type="button" name="button" class="np_des_addaccess_btn" id="pcheckout_btn" value="Proceed To Check Out"> </p>
      </div>
      </div></div>


        </div>
</div>
    <!--Oneshop Content ends Here(vinod 19-05-2015)-->
<!--Edited By Mitesh => add curr val for currency symbol & get value in checkout function -->    
<?php
$this->templates->app_footer();
?>
<script type="text/javascript">
  var total_price=0; 
  var checkout_prods_str="";
  var curr="";
  var ship="";
  var handle="";
  var chkout_store_id=0;
  $.get(oneshop_url+"/mycart/cartViewTpl",function(data){
    $("#cart_items_div").html(data);
  });
    $(document).on("change",".oneshop_cartquantity",function(){
      //alert($(this).parents("div.historyResultsMainDiv").parent().prop("id")+"->"+$(this).val());
      var parent_div=$(this).parents("div.historyResultsMainDiv").parent().prop("id");
      var quantity=0;
      var price=0;
      $("#"+parent_div).find("div.historyResultsMainDiv").each(function(){
        var current_div_id=$(this).attr("id");
        var qnty = $("#"+current_div_id+" select[class^='oneshop_cartquantity']").val();
        var pprice = $("#"+current_div_id+" input[class^='product_price']").val().replace(",","");
        var current_price= qnty * pprice;
        ship = $("#"+current_div_id+" input[class^='prod_shipping']").val();
        handle= $("#"+current_div_id+" input[class^='prod_handling']").val();
        oneidnet= $("#"+current_div_id+" input[class^='prod_oneidnet']").val();
        tax= $("#"+current_div_id+" input[class^='prod_tax']").val();
        price = +current_price + +ship + +handle + +oneidnet + +tax;
        quantity+=parseInt($("#"+current_div_id+" select[class^='oneshop_cartquantity']").val());
      });
      $("#"+parent_div+" span.subtotal_price").text(price);
      $("#"+parent_div+" span#subtotal_items span").html(quantity);
    });

    var delete_cnt=0;
    $(document).on("click","a[id^='delete_']",function(){
      var current_id=$(this).attr("id");
      var parent_div=$(this).parents("div.historyResultsMainDiv").parent().prop("id");
      var child_count=$("#"+parent_div).find("div.historyResultsMainDiv").length;
      delete_cnt=child_count;
      if(child_count===1){
        $("#"+parent_div).css("display","none");
      }else{
        var div_ele=current_id.replace("delete_","product_div_");
        var product_id_arry=current_id.split("_");
        var product_aid=product_id_arry[1];
        var store_aid_arry=parent_div.split("_");
        var store_aid=store_aid_arry[2];
        //$("#"+div_ele).css("display","none");
        var price=0;
        var quantity=0;
        var current_cost=parseInt($("#product_div_"+product_aid+" #prod_price_"+product_aid).text());
        var current_quantity=$("#product_div_"+product_aid+" .oneshop_cartquantity").val();
        $("#"+parent_div).find("div.historyResultsMainDiv").each(function(){
          var current_div_id=$(this).attr("id");
          var current_price=parseInt($("#"+current_div_id+" select[class^='oneshop_cartquantity']").val())*parseInt($("#"+current_div_id+" span[id^='prod_price']").text());
          price+=current_price;
          quantity+=parseInt($("#"+current_div_id+" select[class^='oneshop_cartquantity']").val());
        });
        callAJAX(oneshop_url+"/mycart/deleteCartItem",{product_id:product_aid,store_id:store_aid},function(data){
          //var disp_price=price-(current_price*current_quantity);
          var result=data.trim();
          var result_arry=result.split("~");
          if(result_arry[1]==0){
            $("#"+parent_div).css("display","none");
          }
          else{
            $("#"+div_ele).css("display","none");
            var disp_price=price-(current_cost*current_quantity);
            var disp_quantity=quantity-current_quantity;
            $("#"+parent_div+" #subtotal_items span").text(disp_quantity);
            $("#"+parent_div+" .subtotal_price").text(disp_price);
          }
        });
      }
    });
    $(document).on("click","a[id^='remove_']",function(){
      var current_remove_id=$(this).attr("id");
      var store_aid_arry=current_remove_id.split("_");
      var store_aid=store_aid_arry[1];
      var store_div_id=current_remove_id.replace("remove_","store_dv_");
      callAJAX(oneshop_url+"/mycart/deleteCart/",{store_id:store_aid},function(){
        $("#"+store_div_id).css("display","none");
      });
    });
    $(document).on("click","a[id^='checkout_']",function(){
      var store_div_id=$(this).attr("id").replace("checkout_","store_dv_");
      var checkout_str="";
      var store_div_arry=store_div_id.split("_");
      chkout_store_id=store_div_arry[2];
      $("#"+store_div_id).find("div.historyResultsMainDiv").each(function(){
        var current_div_id=$(this).attr("id");
        var qnty = $("#"+current_div_id+" select[class^='oneshop_cartquantity']").val();
        var price = $("#"+current_div_id+" input[class^='product_price']").val().replace(",","");
        curr = $("#"+current_div_id+" input[class^='prod_currency']").val();
        ship = $("#"+current_div_id+" input[class^='prod_shipping']").val();
        handle= $("#"+current_div_id+" input[class^='prod_handling']").val();
        // oneidnet= $("#"+current_div_id+" input[class^='prod_oneidnet']").val();
        tax= $("#"+current_div_id+" input[class^='prod_tax']").val();
        // alert(curr);
        var current_price = qnty * price;
        var quantity=parseInt($("#"+current_div_id+" select[class^='oneshop_cartquantity']").val());
        var div_arry=current_div_id.split("_");
        var current_product_id=div_arry[2];
        checkout_str+=current_price+"-"+current_product_id+"-"+quantity+"~";
        total_price += current_price + +ship + +handle + +tax;
      });
      $("#hcheckout_amt").val(checkout_str);
      $("#checkout_div").css("display","block");
      $('html, body').animate({
        'scrollTop' : $("#checkout_div").offset().top
      });
      checkout_prods_str=checkout_str;
    });

    $(document).on("click","a[id^='tcheckout']",function(){
      checkout_prods_str="";
      var tcprice = $("#totalc_price").val();
      var tcurrency = $("#tcurr").val();
      total_price = tcprice ;
      curr = tcurrency;
      $("#checkout_div").css("display","block");
    });

    // function sum(input){
             
    //   if (toString.call(input) !== "[object Array]")
    //     return false;
      
    //         var total =  0;
    //         for(var i=0;i<input.length;i++)
    //           {                  
    //             if(isNaN(input[i])){
    //             continue;
    //              }
    //               total += Number(input[i]);
    //            }
    //          return total;
    // }

    $("#pcheckout_btn").click(function(){
        //var total_price=$("#hcheckout_amt").val();
        //var total_price=total_price;
        var person_name=$("#person_name").val();
        var country=$("#country").val();
        var state=$("#state").val();
        var city=$("#city").val();
        var zip_code=$("#zip_code").val();
        var address=$("#address").val();
        var mobileno=$("#mobile_no").val();
        var altmobile_no=$("#alt_mobile_no").val();
        var del_option=$("#d_option").val();
        //alert(total_price);
        var error=0;
        var error_msg="";
        var element_ids_arry=["person_name","country","state","city","zip_code","address","mobile_no","d_option"];

        for(var i=0;i<element_ids_arry.length;i++){
            var element_id=element_ids_arry[i];
            var elem_val="";
            elem_val=$("#"+element_id).val();
            if(elem_val==""){
                $("#"+element_id+"_error").css("display","block");
                error++;
            }
            if(element_id=="person_name"){
              if(elem_val==""){
                $("#name_no_error").css("display","block").text("Please enter person name");
                    error++;
              }
            }
            if(element_id=="d_option"){
              if(elem_val==""){
                $("#d_option_error").css("display","block").text("Please select delivery option");
                    error++;
              }
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

        if(altmobile_no!="")
        {
            if(!validateMobile(altmobile_no)){
                $("#alt_mobile_no_error").css("display","block").text("Please enter valid alternate mobile number");
                    error++;
            }
        }

        if(error==0){
            $.ajax({
                type:"post",
                data:{person_name:person_name,state_id:state,city_id:city,country_id:country,zipcode:zip_code,mobile_no:mobileno,address:address,alt_mobile_no:altmobile_no,doption:del_option},
                url: oneshop_url+"/mycart/shippingAddress",
                success:function(data){
                    var result=data.trim();
                    if(result==1){
                      if(checkout_prods_str!=""){
                        paybookPop(total_price,curr);
                      }
                      else
                      {
                        paybookFull(total_price,curr);
                      }
                    }
                }
            });
        }
    });

    function validateNumeric(elem_val){
        var regex=/^[0-9]+$/;
        if(!elem_val.match(regex)){
            return false;
        }
        return true;
    }

    function validateMobile(ele_val){
        var regexp=/^\(?(\d{3})\)?[- ]?(\d{3})[- ]?(\d{4})$/;
        if(regexp.test(ele_val)==false){
            return false;
        }
        return true;
    }
//Edited By Mitesh => add currency symbol to paybook
    function paybookPop(total_price,curr){
      
        var store_id=$("#hcurrent_storeid").val();
        //var product_ids=$("#store_dv_"+store_id+" #hstore_products_ids").val();
        var chkout_str=checkout_prods_str;
        // var curr_sym=curr;
        //alert(chkout_str);
        var mode='buy';

        $.ajax({
            type:"post",
            data:{total_price:total_price,store_id:chkout_store_id,chkout_str:chkout_str,curr:curr,ship:ship,handle:handle,mode:mode},
            url: oneshop_url+"/mycart/paybookPopup",
            success:function(data){
              // alert(data);
                $("#os_popup").css("display","block").html(data);
            }
        });
    }

    function paybookFull(total_price,curr){
      
        var store_id=$("#hcurrent_storeid").val();
        //var product_ids=$("#store_dv_"+store_id+" #hstore_products_ids").val();
        var chkout_str=checkout_prods_str;
        // var curr_sym=curr;
        //alert(chkout_str);
        var mode='buy';
        var full='full';

        $.ajax({
            type:"post",
            data:{total_price:total_price,curr:curr,mode:mode,full:full},
            url: oneshop_url+"/mycart/paybookFull",
            success:function(data){
              // alert(data);
              $("#os_popup").css("display","block").html(data);
              
            }
        });
    }

    // function getCurrency($store_id) {
    //     var store_id=$("#hcurrent_storeid").val();
    //     $db_api = $this->load->module("db_api");
    //     $store_res = $db_api->custom("select sc,symbol FROM iws_currencies AS iws INNER JOIN oshop_stores AS osh ON osh.currency = iws.sc WHERE osh.store_code='".$store_code."'");
    //     // $store_res = $db_api->select("currency", "oshop_stores", "store_code='" . $store_code . "'");
    //     return $store_res[0]['symbol'];
    //     alert($store_code[0]['symbol']);
    //     // return $store_res[0]['currency'];
    // }

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

  #name_no_error,#addcard_div,#checkout_div,#address_error,#state_error,#country_error,#mobile_no_error,#city_error,#zip_code_error,#d_option_error,#alt_mobile_no_error{
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
