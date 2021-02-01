<?php
$store_name = $store_details[0]["store_name"];
$store_id=$store_details[0]["store_aid"];
?>
<!-- <?php 
echo var_dump($session);
if($session != ''){
  unset($_SESSION['start']);
}
?> -->
<link href="<?php echo base_url().'assets/css/os_custom.css'?>" rel="stylesheet"/>
<script type="text/javascript">
     $(function(){ 
            $('#rating_s .rate-btn').hover(function(){
                $('#rating_s .rate-btn').removeClass('rate-btn-hover');
                var therate = $(this).attr('id');
                $('#sr_rating').val(therate);
                for (var i = therate; i >= 0; i--) {
                    $('#rating_s .rate-btn-'+i).addClass('rate-btn-hover');
                }
            });           
                            
            $('#rating_s .rate-btn').click(function(){ 
				
                var therate = $(this).attr('id');
                var store_id=<?php echo $store_id;?>;
                $('#rating_s .rate-btn').removeClass('rate-btn-active');
                for (var i = therate; i >= 0; i--) {
                    $('#rating_s .rate-btn-'+i).addClass('rate-btn-active');
                }
                 $('#sr_rating').val(therate);
                  
            });
        });
</script>
<div class="np_newpopuup_bgcontainer">
<p class="click_createGroup_newbtn"><a href="javascript:void(0);" id="sr_close"> <img alt="icon" src="<?php echo base_url().'assets/images/close3.png'?>"></a> </p>
<div class="np_popupheadingnew_box"><h4> Store Review - <?php echo ucfirst($store_name);?> </h4></div> 
<div class="np_popupcontainer_middlebox"> 

    <div class="fll mat10">
            <p class="flr mat10" id="rating_s"> 
<span class="fll rate-btn-1 rate-btn" id="1"></span> 
<span class="fll rate-btn-2 rate-btn" id="2"></span> 
<span class="fll rate-btn-3 rate-btn" id="3"></span> 
<span class="fll rate-btn-4 rate-btn" id="4"></span> 
<span class="fll rate-btn-5 rate-btn" id="5"></span> 
</p>
<?php
if($order_details!=0){
?>
  <div>
      <select id="order_select">
          <option value="">Select Order</option>
          <?php
          foreach($order_details as $list){
            echo "<option value='".$list["order_code"]."'>".$list["order_code"]."</option>";
          }
          ?>
      </select>
  </div>
<?php
}
?>
            <div class="wi100pstg mab10 fll">
                <div> Review  </div>
                <div class="fll"> 
					<input type="hidden" name="sr_rating" id="sr_rating" value="" >
					<textarea class="oneshop_setspecified_textareabox" style="width:440px;" id="sr_review"  maxlength="200"></textarea> </div>
                <p class="wi100pstg fs11 clearfix gray">( <span id="count_span">200</span> Max Characters )</p>
            </div>
    </div>
    <div id="error_msg"></div>
 <p class="flr clearfix"><input type="button" name="button" class="np_des_addaccess_btn" value="Submit" id="review_btn"> </p>
</div>
</div>
<script>
    $("#sr_close").click(function(){
        $("#os_popup").css("display","none");
    });
    $("#review_btn").click(function(){
		var error =0;
		var review_txt=$("#sr_review").val();
        var  rate = $('#sr_rating').val();
		var store_id=<?php echo $store_details[0]["store_aid"]?>;
        if($("#order_select").length){
          var order_no=$("#order_select").val();
          if(order_no===""){
            $("#order_select").addClass("redfoucusclass");
            error++;
          }else{
            $("#order_select").removeClass("redfoucusclass");
          }
        }else{
          alert("You are not authorized to send review as you haven't purchased product from our store");
          error++;
        }
		if(review_txt==''){
          $("#sr_review").addClass("redfoucusclass");
            error++;
         }
//         alert(error);
       if(error==0){
        $.ajax({
            type:"post",
            data:{store_aid:store_id,rate:rate,review_text:review_txt},
            url: oneshop_url+"/stores/insertStoreReview",
            success:function(data){
                var result=data.trim();
                //alert(result);
                if(result==1){
                    $("#os_popup").css("display","none");
                }
            }
        });
	}else{
		return false;
		}
    });
    $("#sr_review").keyup(function(){
        var review_len=$(this).val().length;
        var cnt=0;
        if(review_len<=200){
            cnt=200-review_len;
            $("#count_span").text(cnt);
        }
    });
</script>
