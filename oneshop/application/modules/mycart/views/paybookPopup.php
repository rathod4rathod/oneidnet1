<?php
print_r($checkout_str);
?>
<!--Edited by Mitesh -> add card on new button click and set default card checked & Add currency symbol-->
<div class="oneshop_paybookpopup" id="pay_div">
    <div class="oneshop_paymenttype_wrap">
            <h1 class="borderbottom wi100pstg normal pab5 mab10 lspacing"> PAYBOOK </h1>
           <p class="acenter mat30 fs25"> Amount <span class="red"><?php echo $curr ?> <?php echo number_format($total_price,2)?> </span> Will be Deducted from Your Account</p>
           <p class="acenter mat10 fs14">  Are you sure you want to proceed ? </p>
            <div class="oneshop_paybook_yesorno_buttons" id="paybook_yes_no_div">
            <input type="button" name="button" class="paybook_btn" id="paybook_yes_btn" value="Yes">
            <!-- <?php echo $ship?> -->
            <input type="button" name="button" class="paybook_btn" id="paybook_no_btn" value="No">
            </div>
    </div>
    <div class="oneshop_paymenttype_wrap"  id="cards_div">
        <div class="fll wi100pstg pab5 mab10">
            <p class="overflow fll"><span class="fll mar10 lh20"> Choose payment Type : </span> 
            <select name="usage_type" class="oneshop_specifiedselect_new" id="usage_type">
                <option value="Business"> Business  </option>
                <option value="Personal">  Personal </option>
                <option value="Offshore"> Offshore </option>
                <option value="Governmental"> Governmental  </option>
            </select>
            </p>

            <span class="flr"><input type="button" name="button" class="np_des_addaccess_btn mal10" value="+ New" id="newcard_btn"></span>
        </div>
    <p class="bold fs14 pab5 borderbottom wi100pstg"> Cards to Choose for Payment </p>
    	<div class="fll oneshop_paymenttype_leftbox" id="cards_list_div">

<?php
$j=1;
//Edited by mitesh -> set current added card checked;
    foreach($paybook_result as $prlist){
        if ($j=1){
         echo '<div class="fll overflow wi100pstg">
         <p class="fll mar10 paybok_field"> '.$prlist["card_number"].'</p>
         <p class="lh26 fll pat5" style="width:150px;"> Last Used : '.$prlist["last_used_on"].'  </p>
         <p class="lh26 fll pat5" style="width:150px;"> <input type="radio" name="card" id="card_'.$j.'" value="'.$prlist["card_id"].'" checked/>  </p>
         </div>';
        }
        else{
            echo '<div class="fll overflow wi100pstg">
         <p class="fll mar10 paybok_field"> '.$prlist["card_number"].'</p>
         <p class="lh26 fll pat5" style="width:150px;"> Last Used : '.$prlist["last_used_on"].'  </p>
         <p class="lh26 fll pat5" style="width:150px;"> <input type="radio" name="card" id="card_'.$j.'" value="'.$prlist["card_id"].'"/>  </p>
         </div>';
         $j++;
        }
    }

    ?>
        </div>
        <div class="oneshop_paybook_yesorno_buttons mat20 clearfix">
            <?php 
                $checkout_str=$checkout_str;
                $chkout_str=rtrim($checkout_str, "~");
                $productid=explode("-", $chkout_str);
            ?>
            <script type="text/javascript">
                // Popup window code
                function newPopup(url) {
                    popupWindow = window.open(
                        url,'popUpWindow','height=700,width=800,left=10,top=10,resizable=yes,scrollbars=yes,toolbar=yes,menubar=no,location=no,directories=no,status=yes')
                }
            </script>
            <input type="hidden" name="full" id="full" value="<?php echo $full ?>">
            <!-- <button id="checkout-button">Checkout</button> -->
           <a href="<?php echo base_url(); ?>mycart/buy?cs=<?php echo $checkout_str ?>&store=<?php echo $store_id ?>&curr=<?php echo $curr ?>"><input type="button" value="Confirm to Pay" class="np_des_checkout_btn" name="button" id="confirm_pay"></a>
           <input type="button" value="Cancel" class="np_des_checkout_btn" name="button" id="cancel_pay">
            </div>
        </div>

</div>
<style>
    #cards_div{
        display:none;
    }
</style>
<script type='text/javascript'>
    $("#paybook_yes_btn").click(function(){
        $("#cards_div").css("display","block");
        $("#paybook_yes_no_div").css("display","none");
    });

    $("#paybook_no_btn").click(function(){
        $("#os_popup").css("display","none");
    });

    $("#cancel_pay").click(function(){
        $("#os_popup").css("display","none");
    });

    // $("#confirm_pay").click(function(){
    //     var price=total_price;
    //     var shipping=ship;
    //     var handling=handle;
    //     var mode='buy';
    //     var full=$("#full").val();
    //     //alert(chkout_store_id+"->"+checkout_prods_str+"->"+checout);
    //     if(full == ""){
    //         if ($("input:radio[name='card']").is(":checked")) {

    //         var   radio_val=$("input:radio[name='card']:checked").val();

    //             $.ajax({
    //                 type:"post",
    //                 data:{amount:total_price,checkout_str:checkout_prods_str},
    //                 url: oneshop_url+"/mycart/makePayment",
    //                 success:function(data){
    //                     // alert('not full');
    //                     // var win = window.open();
    //                     // win.document.write(data);
    //                     var result=data.trim();
    //                     if(result.indexOf("YES")!=-1){
    //                         var result_arry=result.split("-");
    //                         var html_data='<div class="oneshop_paybook_success_popup"><p class="oneshop_paybook_stick">&nbsp;</p><h1 class="acenter normal mat20"> Payment Success !</h1>';
    //                         html_data+='<p class="acenter mat20 fs14 bgcolor3">  Your Transaction id is <span class="bold mal5"> '+result_arry[2]+' </span>  </p><p class="acenter mat30 fs14"> Amount <span class="red"> '+price+' /- </span> has been debited from Your Account</p><div class="overflow mat30" style="width:240px; margin:0 auto;"><span class="fll"><img src="Images/smile.png" width="39" height="40"></span> <p class="fll fs25 normal mat10 mal10"> Thanks for Shopping   </p> </div><p class="acenter mat20"> <a href="#" class="banner_borderbottom"> Rate to us </a> &nbsp;&nbsp;&nbsp;&nbsp; <a href="#" class="banner_borderbottom"> Write to us </a> </p></div>';
    //                         $("#os_popup").html(html_data).fadeOut(1000);
    //                         //$("#os_popup").html(html_data);
    //                         if(mode=="buy"){
    //                             //window.location="http://"+window.location.hostname+"/oneshop/";
    //                             window.location=oneshop_url+"/order_view?order_id="+result_arry[3];
    //                         }else{
    //                             var store_div="store_dv_"+result_arry[1];
    //                             $("#cart_items_div store_dv_"+store_div).css("display","none");
    //                             window.location.href=oneshop_url+"/mycart/myCartView/";
    //                         }
    //                     }
    //                 }
    //             });

    //         }else{
    // 			alert("Please select atleast one account");
    //             return false;
    // 		}
    //     }else{
    //         if ($("input:radio[name='card']").is(":checked")) {

    //             var radio_val=$("input:radio[name='card']:checked").val();
    //             $.ajax({
    //                 type:"post",
    //                 data:{full:full},
    //                 url: oneshop_url+"/mycart/makePayment1",

    //                 success:function(data){
    //                     var result=data.trim();
    //                     //alert(result);
    //                     if(result.indexOf("YES")!=-1){
    //                         var result_arry=result.split("-");
    //                         var html_data='<div class="oneshop_paybook_success_popup"><p class="oneshop_paybook_stick">&nbsp;</p><h1 class="acenter normal mat20"> Payment Success !</h1>';
    //                         html_data+='<p class="acenter mat20 fs14 bgcolor3">  Your Transaction id is <span class="bold mal5"> '+result_arry[2]+' </span>  </p><p class="acenter mat30 fs14"> Amount <span class="red"> '+price+' /- </span> has been debited from Your Account</p><div class="overflow mat30" style="width:240px; margin:0 auto;"><span class="fll"><img src="Images/smile.png" width="39" height="40"></span> <p class="fll fs25 normal mat10 mal10"> Thanks for Shopping   </p> </div><p class="acenter mat20"> <a href="#" class="banner_borderbottom"> Rate to us </a> &nbsp;&nbsp;&nbsp;&nbsp; <a href="#" class="banner_borderbottom"> Write to us </a> </p></div>';
    //                         $("#os_popup").html(html_data).fadeOut(1000);
    //                         //$("#os_popup").html(html_data);
    //                         if(mode=="buy"){
    //                             //window.location="http://"+window.location.hostname+"/oneshop/";
    //                             window.location=oneshop_url+"/order_view?order_id="+result_arry[3];
    //                         }else{
    //                             var store_div="store_dv_"+result_arry[1];
    //                             $("#cart_items_div store_dv_"+store_div).css("display","none");
    //                             window.location.href=oneshop_url+"/mycart/myCartView/";
    //                         }
    //                     }
    //                 }
    //             });

    //         }else{
    //             alert("Please select atleast one account");
    //             return false;
    //         }
    //     }
    // });
    
    $("#newcard_btn").click(function(){
        $("#pay_div").css("display","none");
        // $("#cards_div").css("display","none");
        $.ajax({
            type:"post",
            url: oneshop_url+"/mycart/addCardPopup/",
            success:function(data){
                $("#os_popup").append(data);
                $("#addcard_div").css("display","block");
            }
        });
    });
</script>