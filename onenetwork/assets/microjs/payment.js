function paymentsuccess(e){url_redirection(e),"AERPC101"==$.trim(e)?window.location=onenetwork_url+"promotions/newpromotions":alert(e)}function paymentBefore(){document.getElementById("confirm_pay").disabled=!0}function paymentcmplt(){setTimeout(function(){$("#os_popup").html(""),$("#os_popup").hide(),document.getElementById("confirm_pay").disabled=!1},1500)}$(document).on("click","#payment_yes",function(){callAJAX(onenetwork_url+"payment/payment_popup",{payment:$("#onenetwork_eachday").val()},payment_poup,"","")}),$(document).on("click","#confirm_pay",function(){if($("input:radio[name='promotionpayment']").is(":checked")){var e=basicInfoDetails()+audience_lab_details()+"&promotionpayment_card_no="+$('input:radio[name="promotionpayment"]:checked').val()+"&skey="+sekey_return();callAJAX(onenetwork_url+"payment/promotion_payment/",e,paymentsuccess,paymentBefore,paymentcmplt)}else alert("Plese Select Card for Payment")});
