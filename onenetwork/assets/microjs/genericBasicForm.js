function resetTabs(){$("#content > div").hide(),$("#tabs a").attr("id","")}function budget(){if(""!=$("#on_campaignstart").val()&&""!=$("#on_campaignstart").val()){var a=$("#onenetwork_noofdays").val(),e=$("#onenetwork_budget").val(),n=e*a;callAJAX(onenetwork_url+"payment/promotion_budget/",{amount:n,promotiontype:$("#promotiontype").val(),budget:e},budgetsuccess,"","")}}function budgetsuccess(a){var e=jQuery.parseJSON(a);$("#onenetwork_eachday").val(e.totalamount),$("#target_people").val(e.noof_target),$("#eachday_target_people").val(e.eachdayTargetPeopleCount)}function noofdays(){if(""!=$("#on_campaignstart").val()&&""!=$("#on_campaignstart").val()){var a=($("#onenetwork_eachday").val(),$("#onenetwork_noofdays").val(),$("#onenetwork_budget").val());0!=a.length}}function budgeteachday(){if(""!=$("#on_campaignstart").val()&&""!=$("#on_campaignstart").val()){var a=$("#onenetwork_eachday").val(),e=$("#onenetwork_noofdays").val(),n=a*e;$("#onenetwork_budget").val(n)}}function basicInfoDetails(){$("*").removeClass("errorredfoucusclass");var a=!0,e=$.trim($("#onenetwork_campagin").val()),n=$.trim($("#on_campaignstart").val()),t=$.trim($("#on_campaignend").val()),o=$.trim($("#onenetwork_target").val()),l=$.trim($("#onenetwork_target1").val()),r=$.trim($("#onenetwork_eachday").val()),i=$.trim($("#onenetwork_budget").val());return 0==e.length&&(a=!1,$("#onenetwork_campagin").focus(),$("#onenetwork_campagin").addClass("errorredfoucusclass")),""==$.trim($("#"+o).val())&&(a=!1,$("#"+o).addClass("errorredfoucusclass")),"hidden"!=$("#onenetwork_target1").attr("type")&&""==$.trim($("#"+l).val())&&(a=!1,$("#"+l).addClass("errorredfoucusclass")),0==n.length&&(a=!1,$("#on_campaignstart").addClass("errorredfoucusclass")),0==t.length&&(a=!1,$("#on_campaignend").addClass("errorredfoucusclass")),0==r.length&&(a=!1,$("#onenetwork_eachday").addClass("errorredfoucusclass")),0==i.length&&(a=!1,$("#onenetwork_budget").addClass("errorredfoucusclass")),0==a?!1:"onenetwork_campagin="+e+"&onenetwork_campaignstart="+n+"&onenetwork_campaignend="+t+"&onenetwork_target="+$("#"+o).val()+"&onenetwork_target1="+$("#"+l).val()+"&onenetwork_budget="+r+"&module="+$.trim($("#promotiontype").val()+"&onenetwork_eachdaybudget="+i+"&target_people="+$("#target_people").val())}function detail_confirmation(){if($("#oncmpname").html($("#onenetwork_campagin").val()),$("#duration_ontotaldaysviewdates").html($("#on_campaignstart").val()+" To "+$("#on_campaignend").val()),$("#ontotaldaysview").html($("#onenetwork_noofdays").val()),$("#totalbudget").html($("#onenetwork_budget").val()),$("#Eachdaybudget").html($("#onenetwork_eachday").val()),$("#onageview").html($("#age").val()),$("#ongenderview").html($("#gender").val()),$("#onrsview").html($("#marital_status").val()),$("#onclocationview").html($('input:radio[name="cloation"]:checked').val()),""!=$("#campaignlocation").val()){var a=$("#campaignlocation").val().split(",");if(""!=a)for($("#placesname").html(""),i=0;i<a.length-1;i++)$("#placesname").append("<div class='place_remove'><span class='place_name'>"+a[i]+"</span></div>")}}function compareCampigns(a){if(""!=$("#on_campaignstart").val()&&""!=$("#on_campaignend").val()){var e=$("#on_campaignstart").val(),n=$("#on_campaignend").val();Date.parse(n)<=Date.parse(e)&&($("#"+a).val(""),alert("End Date should be later date."))}}function daydiff(a,e){return(e-a)/864e5}function calculateCampDays(){return""!=$("#on_campaignstart").val()&&""!=$("#on_campaignstart").val()?daydiff(Date.parse($("#on_campaignstart").val()),Date.parse($("#on_campaignend").val())):void 0}function displayCount(a){var e=a.trim(),n=0,t=0;if(e.indexOf("~")>=0){var o=e.split("~"),l=o[0],r=l.split(":");n=r[1];for(var i=o.length,s=1;s<o.length-1;s++){var c=o[s],d=c.split(":"),u=d[0],g=280*d[1]/n,v="";"age"==u?v="People under age "+this.param.age_val:"gender"==u?v="People of gender "+this.param.gender_val:"marital"==u&&(v="People of relation "+this.param.val),(""!=d[1]||0!=d[1])&&(t=parseInt(d[1])),$("#"+u+"_title").html(v),$("#"+u+"_bar span").css("width",g+"px"),$("#"+u+"_div #subtotal").html(d[1]),$("#"+u+"_div #total").html(n)}var p=o[i-1];""!=p&&dispChart(p),$("#daily_reach p:last-child").html(t+" out of "+n)}}function disableBeforeReq(){$("#"+audience_val).attr("disabled",!0)}function completeReq(){$("#"+audience_val).attr("disabled",!1)}function dispChart(a){$.getJSON(onenetwork_url+"promotions/getChartJSON",{json_data:a},function(a){var e=new CanvasJS.Chart("chartContainer",{width:300,data:[{type:"pie",indexLabelPlacement:"inside",indexLabelFontColor:"yellow",dataPoints:a}]});e.render()})}function dispPagesOptions(a){var e=a.trim();if(""!=e)for(var n=e.split("~"),t=0;t<n.length;t++){var o=n[t],l=o.split(":");$("#pages").append("<option value='"+l[0]+"'>"+l[1]+"</option>")}}function audience_lab_details(){var a=$.trim($("#age").val()),e=$.trim($("#gender").val()),n=$.trim($("#marital_status").val()),t=$.trim($("#tokenize").val()),o=$.trim($("#pages").val()),l=$.trim($("#languages").val()),r=$("input[name=cloation]:checked").val(),i=!1,s=0,c=$.trim($("#campaignlocation").val());if(0==a||""==a?(s++,$("#age_error").text("Please select Age field").css("color","red")):$("#age_error").text(""),0==e||""==e?(s++,$("#gender_error").text("Please select Gender field").css("color","red")):$("#gender_error").text(""),0===s){var d="&age="+a+"&gender="+e+"&marital_status="+n+"&interests="+t+"&pages="+o+"&languages="+l+"&cloation="+r+"&campaignlocation="+c;return d}return i}var myUrl=window.location.href,myUrlTab=myUrl.substring(myUrl.indexOf("#")),myUrlTabName=myUrlTab.substring(0,4);!function(){for($("#content > div").hide(),$("#tabs li:first a").attr("id","current"),$("#content > div:first").fadeIn(),$("#tabs a").on("click",function(a){if(("#tab2"==$(this).attr("name")||"#tab3"==$(this).attr("name"))&&0==basicInfoDetails())return!1;if("#tab3"==$(this).attr("name")&&0!=basicInfoDetails()){if(0==audience_lab_details())return!1;$(".red_blod,.red_bold1").html("Pay INR "+$("#onenetwork_eachday").val()+"/-"),detail_confirmation()}"#tab2"==$(this).attr("name")?($("#tab2right").show(),$("#tab1right").hide()):"#tab1"==$(this).attr("name")?($("#tab2right").hide(),$("#tab1right").show()):($("#tab2right").hide(),$("#tab1right").hide()),a.preventDefault(),"current"!=$(this).attr("id")&&(resetTabs(),$(this).attr("id","current"),$($(this).attr("name")).fadeIn())}),i=1;i<=$("#tabs li").length;i++)myUrlTab==myUrlTabName+i&&(resetTabs(),$("a[name='"+myUrlTab+"']").attr("id","current"),$(myUrlTab).fadeIn());$(document).on("change","#Oneshop_store",function(){var a=$("#Oneshop_store").val();callAJAX(onenetwork_url+"generic/getProductsInfo",{storeid:a},function(a){$("#Oneshop_product").html(a)},function(){},function(){})}),$(document).on("change","#Tunnel_channel",function(){var a=$("#Tunnel_channel").val();callAJAX(onenetwork_url+"generic/getVideosInfo",{channelid:a},function(a){$("#Tunnel_video").html(a)},function(){},function(){})})}(),$("#Tunnel_channel").on("change",function(){var a=$("#Tunnel_channel").val();callAJAX(onenetwork_url+"promotions/getVideosInfo",{channelid:a},function(a){$("#Tunnel_video").html(a)},function(){},function(){})}),$(document).on("click","#onenetwork_marketing",function(){"website"==$(this).val()?$("#onenetwork_website").show():"banner"==$(this).val()&&($("#onenetwork_website").hide(),$("#onenetwork_banner").show())}),$(document).on("click","#onenetwork_addstudio",function(){0==$("#onenetwork_pramotion").val().length&&(flag=!1,$("#onenetwork_pramotion").addClass("errorredfoucusclass")),0==$("#onenetwork_moduletype").val().length&&(flag=!1,$("#onenetwork_moduletype").addClass("errorredfoucusclass")),0==$("#onenetwork_urltype").val().length&&(flag=!1,$("#onenetwork_urltype").addClass("errorredfoucusclass")),0==$("#onenetwork_module").val().length&&(flag=!1,$("#onenetwork_module").addClass("errorredfoucusclass")),0==$("#onenetwork_entity").val().length&&(flag=!1,$("#onenetwork_entity").addClass("errorredfoucusclass"))}),$(document).on("change","#onenetwork_module",function(){var a="<option value='' >Select</option>",e=$(this).val();"netpro"==e?a+="<option value='groups' >Groups</option>":"tunnel"==e?a+="<option value='channel' >Channel</option><option value='video' >Video</option>":"click"==e?a+="<option value='pages' >Pages</option><option value='events' >Events</option><option value='groups' >Groups</option>":"buzzin"==e?a+="<option value='pages' >Pages</option><option value='events' >Events</option><option value='groups' >Groups</option>":"cooffice"==e?a+="<option value='Companyprofile' >Companyprofile</option><option value='jobs' >Jobs</option>":"dealerx"==e?a+="<option value='profile' >Profile</option><option value='auction' >Auction</option>":"oneshop"==e?a+="<option value='product' >Product</option><option value='store' >Store</option><option value='malls' >Malls</option>":"traveltime"==e?a+="<option value='tourpackage' >Tour package</option>":"isnews"==e&&(a+="<option value='sponcerednews' >Sponcered news</option>"),$("#onenetwork_entity").html(a)}),$(document).on("change","#onenetwork_moduletype",function(){"Professioal"==$(this).val()?($("#onenetwork_professioal").show(),$("#onenetwork_social").hide()):($("#onenetwork_social").show(),$("#onenetwork_professioal").hide())}),$(document).on("click","#onenetwork_basicinfo",function(){return 0==basicInfoDetails()?!1:void $("#tabs li:nth-child(2)").find("a").trigger("click")}),$("#on_campaignstart").datepicker({minDate:0,dateFormat:"mm/dd/yy",onSelect:function(a,e){compareCampigns("on_campaignstart");var n=calculateCampDays();$("#onenetwork_noofdays").val(n)}}),$("#on_campaignend").datepicker({minDate:0,dateFormat:"mm/dd/yy",onSelect:function(a,e){compareCampigns("on_campaignstart");var n=calculateCampDays();$("#onenetwork_noofdays").val(n)}});var token="",language_token="",page_token="";$("#tokenize").tokenize({onAddToken:function(a,e,n){token+=","+e.trim();var t=$("#age").val(),o=$("#gender").val(),l=$("#marital_status").val();callAJAX(onenetwork_url+"promotions/getPageOptions",{val:token,age_val:t,gender_val:o,marital_val:l},dispPagesOptions),$("#hinterests_val").val(token)},onRemoveToken:function(a,e){var n=token.replace(","+a,"");token=n;var t=$("#age").val(),o=$("#gender").val(),l=$("#marital_status").val();callAJAX(onenetwork_url+"promotions/getPageOptions",{val:token,age_val:t,gender_val:o,marital_val:l},dispPagesOptions),$("#hinterests_val").val(token)}}),$("#languages").tokenize({onAddToken:function(a,e,n){language_token+=","+a.trim();var t=$("#age").val(),o=$("#gender").val(),l=$("#marital_status").val();callAJAX(onenetwork_url+"promotions/getAudienceCount",{pages:page_token,languages:language_token,age_val:t,gender_val:o,marital_val:l},displayCount),$("#hlanguages_val").val(language_token)},onRemoveToken:function(a,e){var n=language_token.replace(","+a,"");language_token=n;var t=$("#age").val(),o=$("#gender").val(),l=$("#marital_status").val();callAJAX(onenetwork_url+"promotions/getAudienceCount",{pages:page_token,languages:language_token,age_val:t,gender_val:o,marital_val:l},displayCount),$("#hlanguages_val").val(language_token)}}),$("#pages").tokenize({onAddToken:function(a,e,n){page_token+=","+a.trim();var t=$("#age").val(),o=$("#gender").val(),l=$("#marital_status").val();callAJAX(onenetwork_url+"promotions/getAudienceCount",{pages:page_token,languages:language_token,age_val:t,gender_val:o,marital_val:l},displayCount),$("#hpages_val").val(page_token)},onRemoveToken:function(a,e){var n=page_token.replace(","+a,"");page_token=n;var t=$("#age").val(),o=$("#gender").val(),l=$("#marital_status").val();callAJAX(onenetwork_url+"promotions/getAudienceCount",{pages:page_token,languages:language_token,age_val:t,gender_val:o,marital_val:l},displayCount),$("#hpages_val").val(page_token)}}),$('input:radio[name="cloation"]').change(function(){var a=$(this).val();if("Country"==a||"City"==a||"State"==a){$("#campaignlocation").val(""),$("#locationdisplay").fadeIn("slow");var e=onenetwork_url;"Country"==a?e+="promotions/countrysuggestion":"City"==a?e+="promotions/citysuggestion":"State"==a&&(e+="promotions/statesuggestion");var n=$("#age").val(),t=$("#gender").val(),o=$("#marital_status").val();$("#campaignlocation").tokenInput(e+"?q="+$("#campaignlocation").val(),{onAdd:function(e){var l=$(this).val();$("#hlocation_val").val($(this).val()),callAJAX(onenetwork_url+"promotions/getAudienceCount/",{pages:page_token,languages:language_token,age_val:n,gender_val:t,marital_val:o,location:l,location_type:a},displayCount)},onDelete:function(e){var l=$("#hlocation_val").val(),r=l.replace(e.id,"");$("#hlocation_val").val(r),callAJAX(onenetwork_url+"promotions/getAudienceCount/",{pages:page_token,languages:language_token,age_val:n,gender_val:t,marital_val:o,location:r,location_type:a},displayCount)}})}else $("#campaignlocation").val(""),$("#locationdisplay").fadeOut("slow")});var location_type="";$(function(){$.getJSON(onenetwork_url+"promotions/getChartData",function(a){var e=new CanvasJS.Chart("chartContainer",{width:300,data:[{type:"pie",indexLabelPlacement:"inside",indexLabelFontColor:"yellow",dataPoints:a}]});e.render()})});var audience_val="";$(function(){$(document).on("change",".audience_div select",function(){audience_val=$(this).attr("id");var a=$("#age").val(),e=$("#gender").val(),n=$("#marital_status").val();callAJAX(onenetwork_url+"promotions/getAudienceCount",{age_val:a,gender_val:e,marital_val:n},displayCount,disableBeforeReq,completeReq)})}),$(document).on("click","#audience_btn",function(){return 0==audience_lab_details()?!1:($("#tabs li:nth-child(3)").find("a").trigger("click"),void detail_confirmation())});
