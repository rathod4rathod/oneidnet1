<?php
echo '';
?>
<div class="oneshop_paybookpopup" id="addcard_div">            
            <h1 class="borderbottom wi100pstg normal pab5 mab10 lspacing"> Card Details </h1>
            <div class="oneshop_paymenttype_wrap"  id="addcards_div">   
            <div class="fll wi100pstg pab5 mab10">
            <p class="overflow fll"><span class="fll mar10 lh20"> Choose Type : </span> 
            <select name="scope_type" class="oneshop_specifiedselect_new" id="scope_type" onchange="removeerror(this.id)">
            <option value="">--Select--</option>
<option value="NATIONAL">  National </option>
<option value="INTERNATIONAL"> International  </option>
</select> </p>
</div>
<div class="fll wi100pstg pab5 mab10">
    <p class="overflow fll"><span class="fll mar10 lh20"> Card Number: </span> 
    <input type="text" name="card_no" id="card_no" placeholder="Enter 16 digit card number" onfocus="removeerror(this.id)"/>
</div>
            <div class="fll wi100pstg pab5 mab10">
            <p class="overflow fll"><span class="fll mar10 lh20"> Choose Usage Type : </span> 
            <select name="card_usage" class="oneshop_specifiedselect_new" id="card_usage" onchange="removeerror(this.id)">
<option value="">  Select </option>
<option value="BUSINESS">  Business </option>
<option value="PERSONAL"> Personal  </option>
<option value="OFFSHORE"> Offshore  </option>
<option value="GOVERNMENTAL"> Governmental  </option>
</select> </p>
</div>
<div class="fll wi100pstg pab5 mab10">
            <p class="overflow fll"><span class="fll mar10 lh20"> Card Type: </span> 
            <select name="card_type" class="oneshop_specifiedselect_new " id="card_type" onchange="removeerror(this.id)">
<option value="">  Select </option>
<option value="VISA">  Visa </option>
<option value="MASTERCARD"> Master Card </option>
<option value="JCB"> Jcb  </option>
<option value="AMEX"> Amex  </option>
<option value="WESTERN_UNION"> Western Union  </option>
<option value="CIRRUS"> Cirrus  </option>
<option value="DISCOVER"> Discover  </option>
<option value="MAESTRO">Maestro</option>
</select> </p>
</div>
<div class="fll wi100pstg pab5 mab10">
    <p class="overflow fll"><span class="fll mar10 lh20"> Card Name: </span> 
    <input type="text" name="card_name" id="card_name" placeholder="Card Name"/>
</div>
<div class="fll wi100pstg pab5 mab10">
    <p class="overflow fll"><span class="fll mar10 lh20"> Name on card: </span> 
    <input type="text" name="name_on_card" id="name_on_card" placeholder="Name on card"/>
</div>
<div class="fll wi100pstg pab5 mab10">
    <p class="overflow fll"><span class="fll mar10 lh20"> CVV: </span> 
    <input type="text" name="cvv" id="cvv" placeholder="CVV" style="width:60px" onfocus="removeerror(this.id)"/>
</div>
<div class="fll wi100pstg pab5 mab10">
    <p class="overflow fll"><span class="fll mar10 lh20"> Expriry Date: </span> 
    <input type="text" name="expiry_year" id="expiry_year" onfocus="removeerror(this.id)" placeholder="e.g. xxxx" style="width:50px"/> / <input type="text" onfocus="removeerror(this.id)" name="expiry_month" id="expiry_month" placeholder="e.g.xx" style="width:30px"/>
</div>
        
        <div class="oneshop_paybook_yesorno_buttons mat20 clearfix">
           <input type="button" value="Save" class="np_des_checkout_btn" name="button" id="save_card"> 
           <input type="button" value="Cancel" class="np_des_checkout_btn" name="button" id="cancel_card">
            </div>
        
            </div>
            
            </div>
<script type="text/javascript" src="<?php echo base_url() . "assets/microjs/"; ?>validation.js"></script>
<script type="text/javascript">
    $("#cancel_card").click(function(){
      $("#os_popup").css("display","none");

    });
    $("#save_card").click(function(){
        var name_on_card=$("#name_on_card").val();
        var card_type=$("#card_type").val();
        var cvv_number=$("#cvv").val();
        var card_name=$("#card_name").val();
        var card_number=$("#card_no").val();
        var expiry_year=$("#expiry_year").val();
        var expiry_month=$("#expiry_month").val();
        var card_usage=$("#card_usage").val();
        var scope_type=$("#scope_type").val();
        var flag=true;
        if (card_number.length == 0 || card_number == ''){
          $('#card_no').addClass('redfoucusclass');
          flag =false;
         }else{
             if(onlyNumeric(card_number)==false){
                  $('#card_no').addClass('redfoucusclass');
                  flag =false;
                  }
             }
         if (cvv_number.length == 0 || cvv_number == ''){
            $('#cvv').addClass('redfoucusclass');
              flag =false;
         }else{
            
              if(onlyNumeric(cvv_number)==false){
                  $('#cvv').addClass('redfoucusclass');
                  flag =false;
                  }
             
             }
         if (expiry_month.length == 0 || expiry_month== ''){
            $('#expiry_month').addClass('redfoucusclass');
              flag =false;
         }
         if (expiry_year.length == 0 || expiry_year== ''){
            $('#expiry_year').addClass('redfoucusclass');
              flag =false;
         }
         
         if ( card_type.length == 0 ||  card_type== ''){
            $('#card_type').addClass('redfoucusclass');
              flag =false;
         }
         if ( card_usage.length == 0 ||  card_usage== ''){
            $('#card_usage').addClass('redfoucusclass');
              flag =false;
         }
         if ( scope_type.length == 0 ||  scope_type== ''){
            $('#scope_type').addClass('redfoucusclass');
              flag =false;
         }
         
         if(flag==true){ 
         $.ajax({
            type:"post",
            url: oneshop_url+"/mycart/saveCardDetails/",
            data:{scope_type:scope_type,name_on_card:name_on_card,card_type:card_type,cvv_no:cvv_number,card_name:card_name,card_no:card_number,expiry_year:expiry_year,expiry_month:expiry_month,card_usage:card_usage},
            success:function(data){
            
              if (isJson(data) == true) {
              error_data(data);
              } else {

                var result=data.trim();
                if(result.indexOf("ERROR")===-1){
                  var result_arry=result.split("~");
                  //var card_res=result_arry[]."";
                  alert(result_arry[1]);
                  var card_html='<div class="fll overflow wi100pstg"><p class="fll mar10 paybok_field"> '+result_arry[1]+'</p><p class="lh26 fll pat5" style="width:150px;"> Last Used : '+result_arry[2]+'</p><p class="lh26 fll pat5" style="width:150px;"> <input type="radio" name="card" id="card_" value=""/>  </p></div>';
                  $("#cards_list_div").append(card_html);
                  $("#addcard_div").css("display","none");
//Edited By mitesh -> redirect to paybook after card added successfully.
                  // $("#cards_div").css("display","block");
                  $("#pay_div").css("display","block");
                }
                else{
                  alert("There might be some problem while processing.Please try again....");
                }
            }
          }
        });
    }else{
        return false;
        }
    });
     
</script>
