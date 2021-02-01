<?php
$endyear =date(Y);
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>A Personalized Internet Web Operating System - ONEIDNET</title>
<meta name="keywords" content="Click, Buzzin, vCom, OneIDship, 360 Mail, FindIt, Tunnel, Corporate Office, DealerX, Paybook, OneShop, OneVision, TravelTime, ISNews, cvbank, OneNetwork">
<meta name="description" content="Sign up today to this amazing whole new Internet Web Operating System. Get your world in ONE Tab with just ONE Username and Password and Get access to more than hundred lines of services all in one here in ONEIDNET">  
<meta name="author" content="ONEIDNET">
<meta property="og:title" content="A Personalized Internet Web Operating System - ONEIDNET" /> 
<meta property="og:description" content="A Whole New Personalized Internet Web Operating System" /> 
<meta property="og:image" content="<?php echo base_url()."assets/Images/oneidlogo.png"?>" />
<meta property="og:type" content="product"/>
<?php define("PAYBOOK_PATH", base_url()."assets/paybook/"); ?>
<link href="<?php  echo PAYBOOK_PATH.'assets/css/style.css'?>" rel="stylesheet" type="text/css">
<link rel="icon" href="<?php echo PAYBOOK_PATH.'assets/images/favicon.png'?>" type="image/png">
<link rel="stylesheet" href="<?php echo PAYBOOK_PATH.'assets/css/documenter_style.css'?>" media="all">
<link rel="stylesheet" href="<?php echo PAYBOOK_PATH.'assets/js/google-code-prettify/prettify.css'?>" media="screen">
<link rel="icon" href="<?php echo base_url()."assets/Images/oneidlogo.png"?>" type="image/gif" sizes="16x16">
<!--<script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>-->
<script src="<?php echo base_url().'assets/js/jquery-1.11.2.min.js'?>"></script>
<script type="text/javascript" src="<?php echo base_url().'js/jquery.easing.1.3.js'?>"></script>
<script type="text/javascript" src="<?php echo base_url().'js/functions.js'?>"></script>
<script type="text/javascript" src="<?php echo base_url().'js/intr.js'?>"></script>
<script>
$(document).ready(function(){
    $("#praveen").keypress(function(){
        $("#searchsugbox").show();
    });
	$(".suggession-close").click(function(){
        $(this).parent().hide();
    });
});
</script>


<script type="text/javascript" src="<?php echo PAYBOOK_PATH.'assets/scripts/jquery-1.11.2.min.js'?>"></script>
<script type="text/javascript" src="<?php echo PAYBOOK_PATH.'assets/scripts/jquery.easyzoom-modified.min.js'?>"></script>

<script type="text/javascript">
var oneid_url = document.location.origin + "/";
function removeerror(id){
	
	$("#" + id).removeClass("oneidnet_redfocusclass");
	}

function error_data(data) {
    var obj = jQuery.parseJSON(data);
    $.each(obj, function (index, value) {
        $("#" + index).addClass("oneidnet_redfocusclass");
    });
}


function isJson(item) {
    item = typeof item !== "string"
            ? JSON.stringify(item)
            : item;
    try {
        item = JSON.parse(item);
    } catch (e) {
        return false;
    }

    if (typeof item === "object" && item !== null) {
        return true;
    }

    return false;
}
$(document).ready(function(){
	
	$(document).on('click','#oneidnet_addcard' ,function(){
		$('.oneshop_addcardpopup').fadeIn(300);
	});
	$(document).on('click','.oneshop_addcardclose' ,function(){
		$('.oneshop_addcardpopup').fadeOut(100);
	});
	$(document).on('click','#oneid_addcardcancel' ,function(){
	$('.oneshop_addcardpopup').fadeOut(100);
	});
	$(document).on('click','#oneid_addcardsave' ,function(){
		var flag =true;
		 var name_oncard = $('#name_oncardadd').val();
      var card_number = $('#card_numberadd').val();
      var card_name = $('#card_nameadd').val();
      var card_cvv = $('#card_cvvadd').val();
      var card_expirymonth = $('#card_expirymonthadd').val();
      var card_expiryyear = $('#card_expiryyearadd').val();
      var card_use = $('#card_useadd').val();
      var card_type = $('#card_typeadd').val();
      var card_usage = $('#card_usageadd').val();
      
     if (card_number.length == 0 || card_number == ''){
		$('#card_numberadd').addClass('oneidnet_redfocusclass');
          flag =false;
	 }
	 if (card_cvv.length == 0 || card_cvv == ''){
		$('#card_cvvadd').addClass('oneidnet_redfocusclass');
          flag =false;
	 }
	 if (card_expirymonth.length == 0 || card_expirymonth== ''){
		$('#card_expirymonthadd').addClass('oneidnet_redfocusclass');
          flag =false;
	 }
	 if (card_expiryyear.length == 0 || card_expiryyear== ''){
		$('#card_expiryyearadd').addClass('oneidnet_redfocusclass');
          flag =false;
	 }
	 if (card_use.length == 0 || card_use== ''){
		$('#card_useadd').addClass('oneidnet_redfocusclass');
          flag =false;
	 }
	 if ( card_type.length == 0 ||  card_type== ''){
		$('#card_typeadd').addClass('oneidnet_redfocusclass');
          flag =false;
	 }
	 if ( card_usage.length == 0 ||  card_usage== ''){
		$('#card_usageadd').addClass('oneidnet_redfocusclass');
          flag =false;
	 }
	 if(flag==true){
     $.get(oneid_url+"myaccount/newcardsadd",{name_oncard:name_oncard,card_number:card_number,card_name:card_name,card_cvv:card_cvv,card_expirymonth:card_expirymonth, card_expiryyear: card_expiryyear,card_use :card_use ,card_type:card_type,card_usage:card_usage
     },function(data){
		 
		 if (isJson(data) == true) {
            error_data(data);
        } else {
		 $("#sucess_msg1").css("display","block");
		$('.oneshop_addcardpopup').fadeOut(100);
		
	    $('#oneidnet_carddata').html(data);
}
		});
	}else{
		return false; 
		}
		
		});
	$('.oneshop_productDetailedViewImageViews ul li').click(function(){
		var tumbnail =$(this).find('.oneshop_productTumbnail').attr('src');
		$('#window-zoom img').attr("src", tumbnail);
		$('#demo').attr("data-image", tumbnail);
		$('.oneshop_productMainImage').attr("src", tumbnail);
	});
	
	$(document).on('click','.oneshop_curencyConvertor' ,function(){
	
		$('.oneshop_currencyConvertorPopup').fadeIn(300);
		
		var cardid = $(this).attr('cardid');
		$.get(oneid_url+"myaccount/cardsdetail",{cardid:cardid},function(data){
		//	alert(data);
			$('.oneshop_currencyConvertorPopup').html(data);
		});
		
		});
	
});
//$('.oneshop_currencyConvertorCloseBtn_two').on('click',function(){
	$(document).on('click','.oneshop_currencyConvertorCloseBtn_two' ,function(){
		$('.oneshop_currencyConvertorPopup').fadeOut(100);
		});
	$(document).on('click','#oneid_cardcancel' ,function(){
	$('.oneshop_currencyConvertorPopup').fadeOut(100);
	});
	$(document).on('click','#oneid_updatecardsave' ,function(){
		var flag=true;
      var name_oncard = $('#name_oncard').val();
      var card_number = $('#card_number').val();
      var card_name = $('#card_name').val();
      var card_cvv = $('#card_cvv').val();
      var card_expirymonth = $('#card_expirymonth').val();
      var card_expiryyear = $('#card_expiryyear').val();
      var card_use = $('#card_use').val();
      var card_type = $('#card_type').val();
      var card_usage = $('#card_usage').val();
      var cardid = $(this).attr('cardid');
		
     if (card_number.length == 0 || card_number == ''){
		$('#card_number').addClass('oneidnet_redfocusclass');
          flag =false;
	 }
	 if (card_cvv.length == 0 || card_cvv == ''){
		$('#card_cvv').addClass('oneidnet_redfocusclass');
          flag =false;
	 }
	 if (card_expirymonth.length == 0 || card_expirymonth== ''){
		$('#card_expirymonth').addClass('oneidnet_redfocusclass');
          flag =false;
	 }
	 if (card_expiryyear.length == 0 || card_expiryyear== ''){
		$('#card_expiryyear').addClass('oneidnet_redfocusclass');
          flag =false;
	 }
	 if (card_use.length == 0 || card_use== ''){
		$('#card_use').addClass('oneidnet_redfocusclass');
          flag =false;
	 }
	 if ( card_type.length == 0 ||  card_type== ''){
		$('#card_type').addClass('oneidnet_redfocusclass');
          flag =false;
	 }
	 if ( card_usage.length == 0 ||  card_usage== ''){
		$('#card_usage').addClass('oneidnet_redfocusclass');
          flag =false;
	 }
	 if(flag==true){ */
        
	$.get(oneid_url+"myaccount/cardssave",{cardid:cardid,name_oncard:name_oncard,card_number:card_number,card_name:card_name,card_cvv:card_cvv,card_expirymonth:card_expirymonth, card_expiryyear: card_expiryyear,card_use :card_use ,card_type:card_type,card_usage:card_usage
     },function(data){
		 if (isJson(data) == true) {
            error_data(data);
        } else {
		$("#sucess_msg").css("display","block");
		 $('.oneshop_currencyConvertorPopup').fadeOut(100);
		
		
		$('#oneidnet_carddata').html(data);
	}
		});
	}else{
		return false; 
		} 
	 });
$.get(oneid_url+"myaccount/cardsdata" ,{cardsdata:"cardsdata"},function(data){
		 $('#oneidnet_carddata').html(data);
	 });
	 function deletecards(cardid){
var a = confirm('Are you sure want to delete?');
        if (a == true)
        {
            $.ajax({
                type: "POST",
                url: oneid_url+"myaccount/cardsdelete" ,
                data: {cardid: cardid},
                success: function (data)
                {
                   $('#oneidnet_carddata').html(data);
	  
                }
            });
        }
	}
</script>


<style type="text/css">
label {
	color: #999;
	font-size: 12px;
	font-weight: normal;
	position: absolute;
	pointer-events: none;
	left: 5px;
	top: 10px;
	transition: 0.2s ease all;
	-moz-transition: 0.2s ease all;
	-webkit-transition: 0.2s ease all;
}
</style>
<script src="<?php echo PAYBOOK_PATH.'assets/js/google-code-prettify/prettify.js'?>"></script>
<script src="<?php echo PAYBOOK_PATH.'assets/js/jquery.js'?>"></script>
<script src="<?php echo PAYBOOK_PATH.'assets/js/jquery.scrollTo.js'?>"></script>
<script src="<?php echo PAYBOOK_PATH.'assets/js/jquery.easing.js'?>"></script>
<script>document.createElement('section');var duration='500',easing='swing';</script>
<script src="<?php echo PAYBOOK_PATH.'assets/js/script.js'?>"></script>
 <script>
        $(document).ready(function () {
            $("#praveen").keypress(function () {
                $("#searchsugbox").show();
            });
            $(".suggession-close").click(function () {
                $(this).parent().hide();
            });
        });
    </script>
</head>
<body>


<div class="oneshop_currencyConvertorPopup">



</div>
<div class="oneshop_addcardpopup">
<div class="paybook_listview_pop">
<p class="oneshop_addcardclose" id="oneidnet_addclose">X</p>
<div class="fll np_des_mab20 np_des_mat10 wi100pstg">
<h1 class="fs14 bold"> Add New Card   </h1>
</div>




<div class="paybook_data_scroll">



<div class="Table-popup">

                          
                     <div class="group np_des_wi420 np_des_mat25 fll">
                <input type="text" class="np_des_wi420" id="card_nameadd" value="" onfocus="removeerror(this.id)"  required>
                <span class="highlight"></span> <span class="bar"></span>
                <label>   Card Name   </label>
              </div>
                      <div class="group np_des_wi420 fll">
                <input type="text" class="np_des_wi420" id="card_numberadd" value="" onfocus="removeerror(this.id)" required>
                <span class="highlight"></span> <span class="bar"></span>
                <label>   Card Number  </label> 
                 </div>   
                                <div class="group np_des_wi420  fll">
                <input type="text" class="np_des_wi420" id="name_oncardadd" value="" required>
                <span class="highlight"></span> <span class="bar"></span>
                <label>  Name on the Card  </label>
              </div>


                               
             
              
                
                              
                               
	<div class="group fll">
                <input type="text" style="width:120px;"  id="card_cvvadd"  value="" onfocus="removeerror(this.id)"  required>
                <span class="highlight"></span> <span class="bar"></span>
                <label>   CVV  </label>
              </div>


<div class="group fll" style="margin-top:-10px; margin-left:35px;">
                <p class="np_des_mab2 fs11 np_des_mab10"> Expiry </p>
                <select class="oneshop_select_newfield_with_border fll"  onchange="removeerror(this.id)" id="card_expirymonthadd" style="width:125px;">
                  <option value=""> Month </option>
                 <?php  for($i=1;$i<=12;$i++){?>
                  <option value="<?php  echo $i ;?>"  ><?php  echo $i ;?></option>
                 <?php } ?>
                </select>
                
                <select class="oneshop_select_newfield_with_border os_des_mal15 fll" onchange="removeerror(this.id)"  id="card_expiryyearadd" style="width:125px;">
                  <option value=""> Year</option>
                  <?php  for($j=$endyear;$j<=2100;$j++){?>
                 <option value="<?php  echo $j;?>" ><?php  echo $j ;?></option>
                   <?php } ?>
                </select>
              </div>
                                

                                
                                
                                
                                
                                
              
              
              <div class="group np_des_wi420 fll">
                <p class="fs14 np_des_mab2 np_des_mab10"> Card Use</p>
                <select class="oneshop_select_newfield_with_border" id="card_useadd" onchange="removeerror(this.id)" >
					<option value="">select</option>
                  <option value="BUSINESS"  >Business</option>
                 <option value="PERSONAL" >Personal </option>
                   <option value="OFFSHORE" >Offshore</option>
                   <option value="GOVERNMENTAL" >Government</option>
                    
                </select>
              </div>
              
              
                          <div class="group np_des_wi420 fll">
                <p class="fs14 np_des_mab2 np_des_mab10">  Card Type  </p>
                <select class="oneshop_select_newfield_with_border" id="card_typeadd" onchange="removeerror(this.id)" >
                  <option value="">select</option>
                  <option value="VISA"  >Visa</option>
                  <option value="MASTERCARD"   >Master card</option>
                  <option value="JCB"  >Jcb</option>
                  <option value="AMEX"  >American Express</option>
                  <option value="WESTERN_UNION"  >Western Union</option>
                  <option value="CIRRUS"   >Cirrus</option>
                  <option value="DISCOVER"  >Discover</option>
                  <option value="MAESTRO"   >Maestro</option>
                  
                </select>
              </div>
              
              
                          <div class="group np_des_wi420 fll">
                <p class="fs14 np_des_mab2 np_des_mab10"> Usage </p>
                <select class="oneshop_select_newfield_with_border" id="card_usageadd" onchange="removeerror(this.id)" >
                  <option value=""> select </option>
                  <option value="NATIONAL" >National </option>
                  <option value="INTERNATIONAL"  >Inter National </option>
                </select>
              </div>
   
                          
                            <div class="flr np_des_mab10 mat5" style="margin-right:28px;">
                <input type="button" value="Save"  id="oneid_addcardsave"  class="button_new os_des_mal10 flr">
                <input type="button" value="Cancel"  id="oneid_addcardcancel"  class="button_new os_des_mal10 flr">
              </div>
                            

	
<div id="sucess_msg1" style="display:none;color:green">
		Data submited sucessfully
                </div>   

	
                        </div>


</div>

</div>



</div>





<div class="np_des_module_bgmain_wrapper">
  <div class="np_des_wrapper-main"><!--wrapper main start here-->
    
    <div class="header_fixed_wrapper">
      <div class="np_des_header-main"><!--header main start here-->
        <div class="np_des_headermain-sub"><!--headermain-sub start here-->
          <div class="np_des_logocv"><!--logocv start here--> 
              <a href="#"><img src="images/logo.png" alt="logo" width="115" height="55"/></a> </div>
          <div id="new-search-form">
            <form class="new-form-container" action="">
              <input id="praveen" type="text" class="new-search-field" placeholder="Type search text here...(Not Functional)">
              <div class="new-submit-container">
                <input type="submit" value="" class="new-submit">
              </div>
            </form>
            <div class="suggestionDivContainer" id="searchsugbox" style="display: none;">
              <ul style="list-style-type: none;">
                <li class="pad3"> <span class="no-result-Wrapper">
                  <h4 id="no-result-error">Sorry no results found.</h4>
                  </span> </li>
                
              </ul>
            </div>
          </div>
          <div class="moduleOptionsWrapper"> <span class="moduleOption"> <img src="<?php echo base_url().'images/30-30Trans.png'?>" class="moduleHeaderIcon" id="settings">
            <div class="notificationWrapper settingsWrapper"> <img src="<?php echo base_url().'images/notifyBubble.png'?>" class="notifyBubble">
              <div class="notificationContent settingsContent">
                <ul>
                  <li><img src="<?php echo base_url().'images/innerSettings.png'?>">
                    <p>Settings</p>
                  </li>
                  <li class="reportPblm"> <img src="<?php echo base_url().'images/reportProblem.png'?>">
                    <p>Report Problem</p>
                  </li>
                  <li><img src="<?php echo base_url().'images/help.png'?>">
                    <p>Help</p>
                  </li>
                </ul>
              </div>
            </div>
            </span> <span class="moduleOption"> <img src="<?php echo base_url().'images/30-30Trans.png'?>" class="moduleHeaderIcon" id="notifications">
            <div class="notificationWrapper"> <img src="<?php echo base_url().'images/notifyBubble.png'?>" class="notifyBubble">
              <div class="notificationContent"></div>
            </div>
            </span> <span class="moduleOption"> <img src="<?php echo base_url().'images/30-30Trans.png'?>" class="moduleHeaderIcon" id="messages">
            <div class="notificationWrapper"> <img src="<?php echo base_url().'images/notifyBubble.png'?>" class="notifyBubble">
              <div class="notificationContent"></div>
            </div>
            </span> <span class="moduleOption"> <img src="<?php echo base_url().'images/30-30Trans.png'?>" class="moduleHeaderIcon" id="requests">
            <div class="notificationWrapper"> <img src="<?php echo base_url().'images/notifyBubble.png'?>" class="notifyBubble">
              <div class="notificationContent"></div>
            </div>
            </span> </div>
        </div>
      </div>
      <div class="oisdes_subheader_cont_wrapper">
        <div class="oisdes_topmenu_rightbox">
          <ul>
            <li><a href="<?php echo base_url().'myaccount'?>" class="current"> MY Account </a></li>
            <li><a href="<?php echo base_url().'myaccount/mycarddetails'?>"> Cards used</a></li>
            <li><a href="<?php echo base_url().'myaccount/pendingtransactions'?>">Pending Transaction  </a></li>
            <li><a href="<?php echo base_url().'myaccount/transactionhistory'?>"> Transaction History </a></li>
            </ul>
        </div>
      </div>
    </div>
