$(".netpro").click(function(){var s=$(this).val();$("#netpro_save").css("display","block"),$("#netpro_save").click(function(){$.ajax({type:"POST",url:"preferences/netpro_update_preferences",data:{value:s},success:function(s){s&&$("#netpro_save").css("display","none")}})})}),$(".buzzin").click(function(){var s=$(this).val();$("#buzzin_save").css("display","block"),$("#buzzin_save").click(function(){$.ajax({type:"POST",url:"preferences/buzzin_update_preferences",data:{value:s},success:function(s){s&&$("#buzzin_save").css("display","none")}})})}),$(".uclick").click(function(){var s=$(this).val();$("#click_save").css("display","block"),$("#click_save").click(function(){$.ajax({type:"POST",url:"preferences/click_update_preferences",data:{value:s},success:function(s){s&&$("#click_save").css("display","none")}})})}),$(".tunnel").click(function(){var s=$(this).val();$("#tunnel_save").css("display","block"),$("#tunnel_save").click(function(){$.ajax({type:"POST",url:"preferences/tunnel_update_preferences",data:{value:s},success:function(s){s&&$("#tunnel_save").css("display","none")}})})}),$("#location_access").on("change",function(){"PARTICULAR"==$("#location_access").val()?$("#countries_list").css("display","block"):"ANY"==$("#location_access").val()&&$("#countries_list").css("display","none")}),$("#device_access").on("change",function(){"PARTICULAR"==$("#device_access").val()?$("#device_list").css("display","block"):"ANY"==$("#device_access").val()&&$("#device_list").css("display","none")}),$("#browser_access").on("change",function(){"PARTICULAR"==$("#browser_access").val()?$("#browser_list").css("display","block"):"ANY"==$("#browser_access").val()&&$("#browser_list").css("display","none")}),$("#os_access").on("change",function(){"PARTICULAR"==$("#os_access").val()?$("#os_list").css("display","block"):"ANY"==$("#os_access").val()&&$("#os_list").css("display","none")}),$("#symantics_save").click(function(){var s=$("#location_access").val(),c=$("#device_access").val(),e=$("#browser_access").val(),a=$("#os_access").val(),i=$("#multi_countries").val(),l=$("#multi_devices").val(),n=$("#multi_browsers").val(),o=$("#multi_operatingsystems").val();$.ajax({type:"POST",url:"preferences/save_symantics",data:{location_access:s,device_access:c,browser_access:e,os_access:a,countries:i,devices:l,browsers:n,operatingsystems:o},success:function(s){window.location.reload()}})}),$("#symantics_cancel").click(function(){$(".click_NotificationListWrapper").css("display","none")}),$(document).on("click",".loged_update",function(){var s=$(this).attr("lgid"),c=$(this);return $.ajax({type:"POST",url:"preferences/update_login_history",data:{lgid:s},success:function(e){c.fadeOut("slow"),$(".logstatus"+s).html("Logout")}}),!1}),$(document).on("change","#device",function(){""!=$(this).val()?($(".login_details").css("display","none"),""==$("#os").val()?$("."+$(this).val()).css("display","block"):$("."+$(this).val()+$("#os").val()).css("display","block")):""!=$("#os").val()&&($(".login_details").css("display","none"),$("."+$("#os").val()).css("display","block"))}),$(document).on("change","#os",function(){""!=$(this).val()?($(".login_details").css("display","none"),""==$("#device").val()?$("."+$(this).val()).css("display","block"):$("."+$("#device").val()+$(this).val()).css("display","block")):""!=$("#device").val()&&($(".login_details").css("display","none"),$("."+$("#device").val()).css("display","block"))});
