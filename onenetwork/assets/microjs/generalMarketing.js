function resetTabs(){$("#content > div").hide(),$("#tabs a").attr("id","")}function getEntitytype(e){var a="<option value='' >Select</option>";$("#entity_list").html(a),$("#onenetwork_submodule").css("display","block"),"netpro"==e?a+="<option value='groups' >Groups</option>":"tunnel"==e?a+="<option value='channel' >Channel</option><option value='video' >Video</option>":"click"==e?a+="<option value='pages' >Pages</option><option value='events' >Events</option><option value='groups' >Groups</option>":"buzzin"==e?a+="<option value='pages' >Pages</option><option value='events' >Events</option><option value='groups' >Groups</option>":"cooffice"==e?a+="<option value='Companyprofile' >Companyprofile</option><option value='jobs' >Jobs</option>":"dealerx"==e?a+="<option value='profile' >Profile</option><option value='auction' >Auction</option>":"oneshop"==e?a+="<option value='product' >Product</option><option value='store' >Store</option><option value='malls' >Malls</option>":"traveltime"==e?a+="<option value='tourpackage' >Tour package</option>":"isnews"==e&&(a+="<option value='sponcerednews' >Sponcered news</option>"),$("#submodule_list").html(a)}function compareCampigns(e){if(""!=$("#on_campaignstart").val()&&""!=$("#on_campaignend").val()){var a=$("#on_campaignstart").val(),n=$("#on_campaignend").val();Date.parse(n)<=Date.parse(a)&&($("#"+e).val(""),alert("End Date should be later date."))}}function daydiff(e,a){return(a-e)/864e5}function calculateCampDays(){return""!=$("#on_campaignstart").val()&&""!=$("#on_campaignstart").val()?daydiff(Date.parse($("#on_campaignstart").val()),Date.parse($("#on_campaignend").val())):void 0}function displayCount(e){var a=e.trim();if(a.indexOf("~")>=0){for(var n=a.split("~"),t=n[0],o=t.split(":"),i=o[1],l=n.length,r=1;r<n.length-1;r++){var s=n[r],c=s.split(":"),u=c[0],d=280*c[1]/i,p="";"age"==u?p="People under age "+this.param.val:"gender"==u?p="People of gender "+this.param.val:"marital"==u&&(p="People of relation "+this.param.val),$("#"+u+"title").html(p),$("#"+u+"_bar span").css("width",d+"px"),$("#"+u+"_div #subtotal").html(c[1]),$("#"+u+"_div #total").html(i)}var v=n[l-1];""!=v&&dispChart(v)}}function disableBeforeReq(){$("#"+audience_val).attr("disabled",!0)}function completeReq(){$("#"+audience_val).attr("disabled",!1)}function dispChart(e){$.getJSON(onenetwork_url+"promotions/getChartJSON",{json_data:e},function(e){var a=new CanvasJS.Chart("chartContainer",{width:300,data:[{type:"pie",indexLabelPlacement:"inside",indexLabelFontColor:"yellow",dataPoints:e}]});a.render()})}function dispPagesOptions(e){for(var a=e.trim(),n=a.split("~"),t=0;t<n.length;t++){var o=n[t],i=o.split(":");$("#pages").append("<option value='"+i[0]+"'>"+i[1]+"</option>")}}function basicInfoDetails(){$("*").removeClass("errorredfoucusclass");var e=!0,a=$.trim($("#onenetwork_campagin").val()),n=($.trim($("#onenetwork_text").val()),$.trim($("#on_campaignstart").val())),t=$.trim($("#on_campaignend").val()),o=($.trim($("#onenetwork_budget").val()),$.trim($("#onenetwork_noofdays").val()));if(0==a.length&&(e=!1,$("#onenetwork_campagin").focus(),$("#onenetwork_campagin").addClass("errorredfoucusclass")),0==n.length&&(e=!1,$("#on_campaignstart").addClass("errorredfoucusclass")),0==t.length&&(e=!1,$("#on_campaignend").addClass("errorredfoucusclass")),0==o.length&&(e=!1,$("#onenetwork_noofdays").addClass("errorredfoucusclass")),0==e)return!1;var i=$("#basicinfo_form").serializeArray();return i}function adsStudioDetails(){var e=!0,a=$("#onenetwork_campaigntype").val(),n=$("#onenetwork_contenttype").val(),t=$("#onenetwork_source").val(),o=($("#onenetwork_compaigncost").val(),"");if(0==a.length?(e=!1,$("#onenetwork_campaigntype").addClass("errorredfoucusclass")):"WEBSITE"!=a&&(0==$("#onenetwork_size").val().length?(e=!1,$("#onenetwork_size").addClass("errorredfoucusclass")):o=$("#onenetwork_size").val()),0==n.length?(e=!1,$("#onenetwork_contenttype").addClass("errorredfoucusclass")):(null==$("#onenetwork_promotion").val().length&&(e=!1,$("#onenetwork_promotion").addClass("errorredfoucusclass")),0==t.length&&(e=!1,$("#onenetwork_source").addClass("errorredfoucusclass"))),0==$("#onenetwork_budget").val().length&&(e=!1,$("#onenetwork_budget").addClass("errorredfoucusclass")),0==e)return!1;var i=new FormData($("#adsstudio_form")[0]);return i.append("banner",$("#onenetwork_adbanner")[0].files[0]),i}function audience_lab_details(){$.trim($("#age").val()),$.trim($("#gender").val()),$.trim($("#marital_status").val()),$.trim($("#tokenize").val()),$.trim($("#pages").val()),$.trim($("#languages").val()),$.trim($("#nationality").val()),$("input[name=cloation]:checked").val(),$.trim($("#campaignlocation").val());return $("#audiencelab_form").serializeArray()}function detail_confirmation(){if($("#oncmpname").html($("#onenetwork_campagin").val()),$("#duration_dates").html($("#on_campaignstart").val()+" To "+$("#on_campaignend").val()),$("#ontotaldaysview").html($("#onenetwork_noofdays").val()),$("#totalbudget").html($("#onenetwork_budget").val()),$("#Eachdaybudget").html($("#onenetwork_eachday").val()),$("#onageview").html($("#age").val()),$("#ongenderview").html($("#gender").val()),$("#onrsview").html($("#marital_status").val()),$("#onclocationview").html($('input:radio[name="cloation"]:checked').val()),""!=$("#campaignlocation").val()){var e=$("#campaignlocation").val().split(",");if(""!=e)for($("#placesname").html(""),i=0;i<e.length-1;i++)$("#placesname").append("<div class='place_remove'><span class='place_name'>"+e[i]+"</span></div>")}}function budget(){if(""!=$("#on_campaignstart").val()&&""!=$("#on_campaignstart").val()){var e=$("#onenetwork_noofdays").val(),a=$("#onenetwork_budget").val(),n=$("#onenetwork_campaigntype").val(),t=a*e;if("	WEBSITE"!=n)var o=$("#onenetwork_size").val();else o="";callAJAX(onenetwork_url+"gma/gma_budget/",{amount:t,promotiontype:$("#onenetwork_promotion").val(),budget:a,campaigntype:n,size:o},function(e){var a=jQuery.parseJSON(e);$("#onenetwork_compaigncost").val(a.Totalamount)},"","")}else alert("please select start date and end date")}var myUrl=window.location.href,myUrlTab=myUrl.substring(myUrl.indexOf("#")),myUrlTabName=myUrlTab.substring(0,4);!function(){for($("#content > div").hide(),$("#tabs li:first a").attr("id","current"),$("#content > div:first").fadeIn(),$("#tabs a").on("click",function(e){if("#tab4"==$(this).attr("name")){if(0==basicInfoDetails())return!1;var a=$("#onenetwork_campaigntype").val();"WEBSITE"!=a?$("#onenetwork_banner").show():$("#onenetwork_banner").hide();var n=$("#onenetwork_size").val();"PERFECT_SQUARE"==n?($("#perfect_square").show(),$("#cover_up").hide(),$("#half_verticular").hide()):"COVER_UP"==n?($("#cover_up").show(),$("#half_verticular").hide(),$("#perfect_square").hide()):"HALF_VERTICULAR"==n&&($("#half_verticular").show(),$("#perfect_square").hide(),$("#cover_up").hide())}if("#tab2"==$(this).attr("name")&&(0==basicInfoDetails()||0==adsStudioDetails()))return!1;if("#tab3"==$(this).attr("name")){if(0==basicInfoDetails()||0==adsStudioDetails()||0==audience_lab_details())return!1;detail_confirmation(),detail_confirmation()}"#tab2"==$(this).attr("name")?($("#tab2right").show(),$("#tab1right").hide()):"#tab1"==$(this).attr("name")?($("#tab2right").hide(),$("#tab1right").hide()):"#tab4"==$(this).attr("name")?($("#tab2right").hide(),$("#tab1right").show()):($("#tab2right").hide(),$("#tab1right").hide()),e.preventDefault(),"current"!=$(this).attr("id")&&(resetTabs(),$(this).attr("id","current"),$($(this).attr("name")).fadeIn())}),i=1;i<=$("#tabs li").length;i++)myUrlTab==myUrlTabName+i&&(resetTabs(),$("a[name='"+myUrlTab+"']").attr("id","current"),$(myUrlTab).fadeIn())}(),$("#on_campaignstart").datepicker({minDate:0,dateFormat:"mm/dd/yy",onSelect:function(e,a){compareCampigns("on_campaignstart");var n=calculateCampDays();$("#onenetwork_noofdays").val(n)}}),$("#on_campaignend").datepicker({minDate:0,dateFormat:"mm/dd/yy",onSelect:function(e,a){compareCampigns("on_campaignstart");var n=calculateCampDays();$("#onenetwork_noofdays").val(n)}}),$(document).on("change","#onenetwork_campaigntype",function(){"WEBSITE"!=$(this).val()?$("#onenetworksize").show():$("#onenetworksize").hide()}),$(document).on("change","#onenetwork_campaigntype",function(){var e=$("#onenetwork_campaigntype").val();"WEBSITE"!=e?($("#tab1right").show(),$("#onenetworksize").show()):($("#tab1right").hide(),$("#onenetworksize").hide())}),$(document).ready(function(){$("#tab1right").css("display","block"),$("#outside_urldiv").hide(),$(document).on("change","#onenetwork_source",function(){"OUTSIDE_SYSTEM"==$(this).val()?($("#outside_urldiv").show(),$("#onenetwork_insideall").hide(),$("#onenetwork_submodule").hide(),$("#onenetwork_entity").hide()):($("#outside_urldiv").hide(),$("#onenetwork_insideall").show(),$("#onenetwork_entity").show())}),$(document).on("change","#onenetwork_contenttype",function(){"SOCIAL"==$(this).val()?($("#onenetwork_social").show(),$("#onenetwork_professional").hide(),$("#onenetwork_all").hide()):"PROFESSIONAL"==$(this).val()?($("#onenetwork_professional").show(),$("#onenetwork_social").hide(),$("#onenetwork_all").hide()):($("#onenetwork_all").show(),$("#onenetwork_professional").hide(),$("#onenetwork_social").hide())}),$(document).on("change","#submodule_list",function(){var e=$("#submodule_list").val(),a=$("#onenetwork_modules").val();callAJAX(onenetwork_url+"gma/getEnitiesInfo",{selected:e,module:a},function(e){$("#entity_list").html(e)},function(){},function(){})}),$(document).on("change","#onenetwork_size",function(){var e=$("#onenetwork_size").val();"PERFECT_SQUARE"==e?($("#perfect_square").show(),$("#cover_up").hide(),$("#half_verticular").hide()):"COVER_UP"==e?($("#cover_up").show(),$("#half_verticular").hide(),$("#perfect_square").hide()):"HALF_VERTICULAR"==e&&($("#half_verticular").show(),$("#perfect_square").hide(),$("#cover_up").hide())})}),$(document).on("click","#onenetwork_basicinfo",function(){return 0==basicInfoDetails()?!1:void $("#tabs li:nth-child(2)").find("a").trigger("click")}),$(document).on("click","#onenetwork_adsstudio",function(){return 0==adsStudioDetails()?!1:void $("#tabs li:nth-child(3)").find("a").trigger("click")}),$(document).on("click","#audience_btn",function(){return 0==audience_lab_details()?!1:($("#tabs li:nth-child(4)").find("a").trigger("click"),void detail_confirmation())}),$(document).on("click","#payment_yes",function(){callAJAX(onenetwork_url+"payment/payment_popup",{payment:$("#onenetwork_compaigncost").val()},payment_poup,"","")}),$(document).on("click","#confirm_pay",function(){if($("input:radio[name='promotionpayment']").is(":checked")){var e=adsStudioDetails(),a=basicInfoDetails();$.each(a,function(a,n){e.append(n.name,n.value)});var n=audience_lab_details();$.each(n,function(a,n){e.append(n.name,n.value)});var t=$("#payment_form").serializeArray();$.each(t,function(a,n){e.append(n.name,n.value)}),$.ajax({url:onenetwork_url+"gma/gmaPrcreate",data:e,processData:!1,contentType:!1,type:"POST",success:function(e){"AERPC101"==$.trim(e)?window.location=onenetwork_url+"gma/gmamonitor":alert(e)}})}else alert("Plese Select Card for Payment")});var token="",language_token="",nationality_token="",page_token="";$("#tokenize").tokenize({onAddToken:function(e,a,n){token+=","+a.trim();var t=$("#age").val(),o=$("#gender").val(),i=$("#marital_status").val();callAJAX(onenetwork_url+"promotions/getPageOptions",{val:token,age_val:t,gender_val:o,marital_val:i},dispPagesOptions),$("#hinterests_val").val(token)},onRemoveToken:function(e,a){var n=token.replace(","+e,"");token=n;var t=$("#age").val(),o=$("#gender").val(),i=$("#marital_status").val();callAJAX(onenetwork_url+"promotions/getPageOptions",{val:token,age_val:t,gender_val:o,marital_val:i},dispPagesOptions),$("#hinterests_val").val(token)}}),$("#languages").tokenize({onAddToken:function(e,a,n){language_token+=","+e.trim();var t=$("#age").val(),o=$("#gender").val(),i=$("#marital_status").val();callAJAX(onenetwork_url+"promotions/getAudienceCount",{pages:page_token,languages:language_token,nationality:nationality_token,age_val:t,gender_val:o,marital_val:i},displayCount),$("#hlanguages_val").val(language_token)},onRemoveToken:function(e,a){var n=language_token.replace(","+e,"");language_token=n;var t=$("#age").val(),o=$("#gender").val(),i=$("#marital_status").val();callAJAX(onenetwork_url+"promotions/getAudienceCount",{pages:page_token,languages:language_token,nationality:nationality_token,age_val:t,gender_val:o,marital_val:i},displayCount),$("#hlanguages_val").val(language_token)}}),$("#nationality").tokenize({onAddToken:function(e,a,n){nationality_token+=","+e.trim();var t=$("#age").val(),o=$("#gender").val(),i=$("#marital_status").val();callAJAX(onenetwork_url+"promotions/getAudienceCount",{pages:page_token,languages:language_token,nationality:nationality_token,age_val:t,gender_val:o,marital_val:i},displayCount),$("#hnationality_val").val(nationality_token)},onRemoveToken:function(e,a){var n=nationality_token.replace(","+e,"");nationality_token=n;var t=$("#age").val(),o=$("#gender").val(),i=$("#marital_status").val();callAJAX(onenetwork_url+"promotions/getAudienceCount",{pages:page_token,languages:language_token,nationality:nationality_token,age_val:t,gender_val:o,marital_val:i},displayCount),$("#hnationality_val").val(nationality_token)}}),$("#pages").tokenize({onAddToken:function(e,a,n){page_token+=","+e.trim();var t=$("#age").val(),o=$("#gender").val(),i=$("#marital_status").val();callAJAX(onenetwork_url+"promotions/getAudienceCount",{pages:page_token,languages:language_token,nationality:nationality_token,age_val:t,gender_val:o,marital_val:i},displayCount),$("#hpages_val").val(page_token)},onRemoveToken:function(e,a){var n=page_token.replace(","+e,"");page_token=n;var t=$("#age").val(),o=$("#gender").val(),i=$("#marital_status").val();callAJAX(onenetwork_url+"promotions/getAudienceCount",{pages:page_token,languages:language_token,age_val:t,gender_val:o,marital_val:i},displayCount),$("#hpages_val").val(page_token)}}),$('input:radio[name="cloation"]').change(function(){var e=$(this).val();"Country"==e||"City"==e||"State"==e?($("#campaignlocation").val(""),$("#locationdisplay").fadeIn("slow")):($("#campaignlocation").val(""),$("#locationdisplay").fadeOut("slow"))});var location_type="";$(function(){function e(e){return e.split(/,\s*/)}function a(a){return e(a).pop()}$("#campaignlocation").bind("keydown",function(e){$(this).val().length>2&&e.keyCode===$.ui.keyCode.TAB&&$(this).autocomplete("instance").menu.active&&e.preventDefault()}).autocomplete({minLength:1,source:function(e,n){"State"==$('input:radio[name="cloation"]:checked').val()&&(location_type="State",$.getJSON(onenetwork_url+"promotions/statesuggestion",{term:a(e.term)},n)),"Country"==$('input:radio[name="cloation"]:checked').val()&&(location_type="Country",$.getJSON(onenetwork_url+"promotions/countrysuggestion",{term:a(e.term)},n)),"City"==$('input:radio[name="cloation"]:checked').val()&&(location_type="City",$.getJSON(onenetwork_url+"promotions/citysuggestion",{term:a(e.term)},n))},focus:function(){return!1},select:function(a,n){var t=e(this.value);return t.pop(),t.push(n.item.value),t.push(""),this.value=t.join(", "),callAJAX(onenetwork_url+"promotions/getAudienceCount/",{location:this.value},displayCount),!1}}),$.getJSON(onenetwork_url+"promotions/getChartData",function(e){var a=new CanvasJS.Chart("chartContainer",{width:300,data:[{type:"pie",indexLabelPlacement:"inside",indexLabelFontColor:"yellow",dataPoints:e}]});a.render()})});var audience_val="";$(function(){$(document).on("change",".audience_div select",function(){audience_val=$(this).attr("id");var e=$("#age").val(),a=$("#gender").val(),n=$("#marital_status").val();callAJAX(onenetwork_url+"promotions/getAudienceCount",{age_val:e,gender_val:a,marital_val:n},displayCount,disableBeforeReq,completeReq)})}),$('input[type="file"]#onenetwork_adbanner').bind("change",function(e){var a=this.files[0].type;"image/gif"==a||"image/jpg"==a||"image/png"==a||"image/jpeg"==a?$("#osdev_profile_pic_update_form").submit():alert("Allow file type should be jpg|png|gif|jpeg")});
