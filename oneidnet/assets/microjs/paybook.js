function removeerror(a){$("#"+a).removeClass("oneidnet_redfocusclass")}function error_data(a){var d=jQuery.parseJSON(a);$.each(d,function(a,d){$("#"+a).addClass("oneidnet_redfocusclass")})}function isJson(a){a="string"!=typeof a?JSON.stringify(a):a;try{a=JSON.parse(a)}catch(d){return!1}return"object"==typeof a&&null!==a?!0:!1}function deletecards(a){var d=confirm("Are you sure want to delete?");1==d&&$.ajax({type:"POST",url:oneid_url+"myaccount/cardsdelete",data:{cardid:a},success:function(a){$("#oneidnet_carddata").html(a)}})}var oneid_url=oneidnet_url;$(function(){$(document).ready(function(){$(document).on("click","#oneidnet_myaccount",function(){window.location=oneidnet_url+"myaccount"}),$(document).on("click","#oneidnet_cards",function(){window.location=oneidnet_url+"mycards"}),$(document).on("click","#oneidnet_transaction",function(){window.location=oneidnet_url+"pendingtransactions"}),$(document).on("click","#oneidnet_transactionhistory",function(){window.location=oneidnet_url+"transactionhistory"}),$(document).on("click","#oneidnet_addcard",function(){$(".oneshop_addcardpopup").fadeIn(300)}),$(document).on("click",".oneshop_addcardclose",function(){$(".oneshop_addcardpopup").fadeOut(100)}),$(document).on("click","#oneid_addcardcancel",function(){$(".oneshop_addcardpopup").fadeOut(100)}),$(document).on("click","#oneid_addcardsave",function(){var a=!0,d=$("#name_oncardadd").val(),n=$("#card_numberadd").val(),e=$("#card_nameadd").val(),c=$("#card_cvvadd").val(),o=$("#card_expirymonthadd").val(),r=$("#card_expiryyearadd").val(),t=$("#card_useadd").val(),s=$("#card_typeadd").val(),i=$("#card_usageadd").val();return(0==n.length||""==n)&&($("#card_numberadd").addClass("oneidnet_redfocusclass"),a=!1),(0==c.length||""==c)&&($("#card_cvvadd").addClass("oneidnet_redfocusclass"),a=!1),(0==o.length||""==o)&&($("#card_expirymonthadd").addClass("oneidnet_redfocusclass"),a=!1),(0==r.length||""==r)&&($("#card_expiryyearadd").addClass("oneidnet_redfocusclass"),a=!1),(0==t.length||""==t)&&($("#card_useadd").addClass("oneidnet_redfocusclass"),a=!1),(0==s.length||""==s)&&($("#card_typeadd").addClass("oneidnet_redfocusclass"),a=!1),(0==i.length||""==i)&&($("#card_usageadd").addClass("oneidnet_redfocusclass"),a=!1),1!=a?!1:void $.get(oneid_url+"myaccount/newcardsadd",{name_oncard:d,card_number:n,card_name:e,card_cvv:c,card_expirymonth:o,card_expiryyear:r,card_use:t,card_type:s,card_usage:i},function(a){1==isJson(a)?error_data(a):($("#sucess_msg1").css("display","block"),$(".oneshop_addcardpopup").fadeOut(100),$("#oneidnet_carddata").html(a))})}),$(".oneshop_productDetailedViewImageViews ul li").click(function(){var a=$(this).find(".oneshop_productTumbnail").attr("src");$("#window-zoom img").attr("src",a),$("#demo").attr("data-image",a),$(".oneshop_productMainImage").attr("src",a)}),$(document).on("click",".oneshop_curencyConvertor",function(){$(".oneshop_currencyConvertorPopup").fadeIn(300);var a=oneidnet_url,d=$(this).attr("cardid");$.get(a+"myaccount/cardsdetail",{cardid:d},function(a){$(".oneshop_currencyConvertorPopup").html(a)})})}),$.get(oneid_url+"myaccount/cardsdata",{cardsdata:"cardsdata"},function(a){$("#oneidnet_carddata").html(a)})}),$(document).on("click",".oneshop_currencyConvertorCloseBtn_two",function(){$(".oneshop_currencyConvertorPopup").fadeOut(100)}),$(document).on("click","#oneid_cardcancel",function(){$(".oneshop_currencyConvertorPopup").fadeOut(100)}),$(document).on("click","#oneid_updatecardsave",function(){var a=!0,d=$("#name_oncard").val(),n=$("#card_number").val(),e=$("#card_name").val(),c=$("#card_cvv").val(),o=$("#card_expirymonth").val(),r=$("#card_expiryyear").val(),t=$("#card_use").val(),s=$("#card_type").val(),i=$("#card_usage").val(),u=$(this).attr("cardid");return(0==n.length||""==n)&&($("#card_number").addClass("oneidnet_redfocusclass"),a=!1),(0==c.length||""==c)&&($("#card_cvv").addClass("oneidnet_redfocusclass"),a=!1),(0==o.length||""==o)&&($("#card_expirymonth").addClass("oneidnet_redfocusclass"),a=!1),(0==r.length||""==r)&&($("#card_expiryyear").addClass("oneidnet_redfocusclass"),a=!1),(0==t.length||""==t)&&($("#card_use").addClass("oneidnet_redfocusclass"),a=!1),(0==s.length||""==s)&&($("#card_type").addClass("oneidnet_redfocusclass"),a=!1),(0==i.length||""==i)&&($("#card_usage").addClass("oneidnet_redfocusclass"),a=!1),1!=a?!1:void $.get(oneid_url+"myaccount/cardssave",{cardid:u,name_oncard:d,card_number:n,card_name:e,card_cvv:c,card_expirymonth:o,card_expiryyear:r,card_use:t,card_type:s,card_usage:i},function(a){1==isJson(a)?error_data(a):($("#sucess_msg").css("display","block"),$(".oneshop_currencyConvertorPopup").fadeOut(100),$("#oneidnet_carddata").html(a))})});
