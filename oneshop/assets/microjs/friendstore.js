function dataLoading(){var t=$("#findstore_name").val(),e=$("#store_categ").val();if("City"!=e)var a=$("#sub_select").val();else var a=$("#city_txt").val();""!=t||""!=a?(dataparams="start_id="+starting_index+"&store_name="+t+"&category="+e+"&category_filter="+a,loaddata(dataparams,oneshop_url+"/stores/getFriendStoreDetails_Info")):(dataparams="start_id="+starting_index,loaddata(dataparams,oneshop_url+"/stores/friends_Storesdata")),starting_index+=20}function loaddata(t,e){$.ajax({type:"POST",url:e,data:t,success:function(t){0!=$.trim(t)?$("#friend_storeresult").append(t):(next_connection_flag=!1,$("#oneshop_nomoredata").css("display","block"))}})}$.get(oneshop_url+"/stores/friends_Storesdata",function(t){0!=$.trim(t)?$("#friend_storeresult").html(t):$("#oneshop_nomoredata").css("display","block")});var starting_index=20,next_connection_flag=!0;$(window).scroll(function(){$(window).scrollTop()==$(document).height()-$(window).height()&&next_connection_flag&&dataLoading()}),$(document).on("click","#find_store_btn",function(){$("#oneshop_nomoredata").css("display","none"),next_connection_flag=!0,starting_index=20;var t=$("#findstore_name").val(),e=$("#store_categ").val();if("City"!=e)var a=$("#sub_select").val();else var a=$("#city_txt").val();(""!=t||""!=a)&&$.ajax({type:"post",url:oneshop_url+"/stores/getFriendStoreDetails_Info",data:{store_name:t,category:e,category_filter:a},beforeSend:function(){$("#friend_storeresult").html("<div class='tmpdiv'><div class='spinner-idx'></div></div>"),$("#find_store_btn").prop("disabled","disabled")},success:function(t){$("#find_store_btn").prop("disabled",!1);var e=t.trim();0!=e?($(".tmpdiv").remove(),$("#friend_storeresult").html(e)):($(".tmpdiv").remove(),$("#oneshop_nomoredata").css("display","block"))}})});
