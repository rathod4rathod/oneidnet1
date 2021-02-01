<?php
$store_name=$store_result[0]["store_name"];
$services=$store_result[0]["services"];
$services_arry=explode(",",$services);
?>
<div class="np_newpopuup_bgcontainer">
<p class="click_createGroup_newbtn"><a href="javascript:void(0)" id="call_request_close"> <img alt="icon" src="<?php echo base_url().'assets/images/close3.png'?>"></a> </p>
<div class="np_popupheadingnew_box"><h4> Submit Request - <?php echo $store_name;?> </h4></div> 
<div class="np_popupcontainer_middlebox"> 

<div class="fll mat10">
<div class="wi100pstg mab10 fll">
<div> Enquiry Type</div>
<p> <select class="oneshop_nosize wi100pstg " id="call_req_service_enq" onchange="removeerror(this.id)" >
        <option value="">--Select Service Enquiry--</option>
        <option value="Product Not yet received">Product Not yet received</option>
        <option value="Product has changed">Product has changed</option>
        <option value="Amount not refunded">Amount not refunded</option>
        <option value="Delay in order delivery">Delay in order delivery</option>
        <option value="service_type">Service type</option>
    </select>
             </p>
</div>
<div class="wi100pstg mab10 fll" id="service_type_div" onchange="removeerror(this.id)" >
<div> Service Type  </div>
<p> <select class="oneshop_nosize wi100pstg" id="call_req_service_type">
        <option value="">--Select service--</option>
            <?php
            for($i=0;$i<count($services_arry);$i++){
                echo "<option value='".$services_arry[$i]."'>".$services_arry[$i]."</option>";
            }
            ?>
    </select>
             </p>
</div>    
            <div class="wi100pstg mab10 fll" id="order_no_div">
            <div> Order Number  </div>
            <div> <input type="text" class="oneshop_nosize wi100pstg" placeholder="Order Number" id="call_req_order_no"> </div>
            </div>
    
            <div class="wi100pstg mab10 fll">
            <div> Subject  </div>
            <div> <input type="text" class="oneshop_nosize wi100pstg" placeholder="Subject"  onfocus="removeerror(this.id)"  id="call_req_subject"> </div>
            </div>
            
            <div class="wi100pstg mab10 fll">
            <div> Message  </div>
            <div class="fll"> <textarea class="oneshop_setspecified_textareabox" style="width:440px;" id="call_req_msg" onfocus="removeerror(this.id)" ></textarea> </div>
            <p class="wi100pstg fs11 clearfix gray">( <span id="count_span">250</span> Max Chacters ) </p>
            </div>
            </div>
    <div id="error_msg"></div>
 <p class="flr clearfix"><input type="button" name="button" class="np_des_addaccess_btn" value="Submit" id="call_submit"> </p>

</div>
</div>
<script type="text/javascript">
    $("#call_request_close").click(function(){        
        $("#os_popup").css("display","none");
    });
    $("#call_submit").click(function(){
        var service_type=$("#call_req_service_type").val();
        var service_enquiry=$("#call_req_service_enq").val();
        var subject=$("#call_req_subject").val();
        var description=$("#call_req_msg").val();
        var store_aid=<?php echo $store_result[0]["store_aid"];?>;
        var error=0;
        var error_msg="";
        if(service_enquiry==""){
			$("#call_req_service_enq").addClass("redfoucusclass");
			  error=1;
        }else{
            if(service_enquiry=="service_type"){
                if(service_type==""){
					$("#call_req_service_type").addClass("redfoucusclass");
           
                    error=1;
                }                       
            }else{
                if($("#call_req_order_no").val()==""){
                    error_msg+="Please enter order number<br>";
                    error=1;
                }
            }
        }
        if(subject==""){
			$("#call_req_subject").addClass("redfoucusclass");
           error=1;
        }else{
			var first_letter=subject.charAt(0);
            if(checkFirstLetterAlphaOnly(first_letter)==false){
				$("#call_req_subject").addClass("redfoucusclass");
           
		      }
			}
        if(description==""){
			$("#call_req_msg").addClass("redfoucusclass");
            error=1;
        }
        
        if(error!=0){
            $("#error_msg").css("display","block").html(error_msg);
            return false;
        }else{
            $.ajax({
                type:"post",
                url: oneshop_url+"/stores/insertCallReq",
                data:{service_type:service_type,service_enquiry:service_enquiry,subject:subject,desc:description,store_aid:store_aid},
                success:function(data){
					//alert(data);
					if (isJson(data) == true) {
                 error_data(data);
               }
                else{ 
                    var result=data.trim();
                    if(result==1){
                        $("#os_popup").css("display","none");
                    }
				}
                }
            }); 
        }
    }); 
    $("#call_req_service_enq").change(function(){
        var service_enq=$(this).val();
        if(service_enq=="service_type"){
            $("#service_type_div").css("display","block");
            $("#order_no_div").css("display","none");
        }
        else if(service_enq!=""){
            $("#service_type_div").css("display","none");
            $("#order_no_div").css("display","block");
        }else{
            $("#order_no_div").css("display","none");
        }
    });  
	// bug fixing on 30-03-2016
    $("#call_req_msg").keyup(function(){
        var review_len=$(this).val().length;
        var cnt=0;
        if(review_len<=200){
            cnt=250-review_len;
            $("#count_span").text(cnt);
        }
    });  
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
function error_data(data) {
    var obj = jQuery.parseJSON(data);
    $.each(obj, function (index, value) {	
        $("#"+index).addClass("redfoucusclass");
    });
    return false;
}
    function  removeerror(id) {
    $('#' + id).removeClass("redfoucusclass");
 }  
 function checkFirstLetterAlphaOnly(input_val){
    var regexp=/^([a-zA-Z])$/;
    if(regexp.test(input_val)){
        return true;
    }
    return false;
}
</script>
<style type="text/css">
    #error_msg,#order_no_div,#service_type_div{
        display:none;        
    }
</style>