function globalGet(a,n){$.get(a,n)}function setAdRightSection(a){$(".oneshop_rightSection").html(a),close_aside_ad()}function setAdBannarSection(a){$(".adds_bannerTypeWrapper").html(a),close_bannar_add()}function close_aside_ad(){function a(a,n){$.ajax({type:"POST",data:"campaignid="+a+"&report_ad="+n,url:"jsmodel/updateCampaigns",success:function(n){$("#click_addsFlashTypeWrapper"+a).hide("slow")}})}$(".adds_VerticleCloseBtn").click(function(){$(this).children(".adds_closeOptions").fadeIn(200)}),$(".adds_VerticleCloseBtn").mouseleave(function(){$(this).children(".adds_closeOptions").fadeOut(100)}),$(".close_ad_1").click(function(){var n=$(this).attr("id"),t=$(".adds_flash_1").attr("id");a(t,n)}),$(".close_ad_2").click(function(){var n=$(this).attr("id"),t=$(".adds_flash_2").attr("id");a(t,n)}),$(".close_ad_3").click(function(){var n=$(this).attr("id"),t=$(".adds_flash_3").attr("id");a(t,n)})}function close_bannar_add(){$(".adds_BannerCloseBtn").click(function(){$(this).children(".adds_closeOptions").fadeIn(200)}),$(".adds_BannerCloseBtn").mouseleave(function(){$(this).children(".adds_closeOptions").fadeOut(100)}),$(".close_banner_ad").click(function(){var a=$(this).attr("id"),n=$(".adds_banner").attr("id");$.ajax({type:"POST",data:"campaignid="+n+"&report_ad="+a,url:"jsmodel/updateCampaigns",success:function(a){$(".adds_bannerTypeWrapper").hide("slow")}})})}globalGet(url="jsmodel/getCampaignIds",setAdRightSection),$.fn.setAdRightSection=function(){$(this).append('<div class="spinner-lg"></div>')},globalGet(url="jsmodel/getCampaigns",setAdBannarSection);
