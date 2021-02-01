<?php
foreach ($order_data as $orows) {
    $prod_img_url=base_url().'assets/images/default_product_60.png';
    if($orows["primary_image"]!="" && file_exists('stores/'.$orows["store_code"]."/products/".$orows["product_aid"]."/li/".$orows["primary_image"])){
        $prod_img_url=base_url().'stores/'.$orows["store_code"]."/products/".$orows["product_aid"]."/li/".$orows["primary_image"];        
    }
?>    
    <div class="newbox-left fll">
        <div class="left_imagebox">
            <img src="<?php echo $prod_img_url;?>" class="imagediv">
        </div>
        <div class="left_contentbox">
            <h2 class="mab10 fs14 bold pab5"> <?php echo $orows["product_name"];?> </h2>
            <div class="wi458 fll">
                <div class="mab10 wi100pstg overflow"><p class="wi200 fs14 bold fll"> Quantity </p><span class="fll">:</span> <p class="fll fs14 mal10"> <?php echo $orows["quantity"];?> </p></div>
                <div class="mab10 wi100pstg overflow"><p class="wi200 fs14 bold fll"> Price </p><span class="fll">:</span> <p class="fll fs14 mal10"> <?php echo $orows["sale_price"];?>/- </p></div>
                <div class="mab10 wi100pstg overflow"><p class="wi200 fs14 bold fll"> Total </p><span class="fll">:</span> <p class="fll fs14 mal10"> <?php echo $orows["price"];?> </p></div>                
            </div>
            <p class="flr mar20 mat30"><input type="button" value="CANCEL ORDER" class="cancelorder_btn" name="button" id="cancel_order<?php echo $orows['product_aid']?>"> </p>
        </div>
    </div>
<?php
}
?>
<script type="text/javascript">
    $("input[id^='cancel_order']").click(function(){
        var btn_id=$(this).attr("id");
        var order_id=$("#horder_id").val();
        var product_id=btn_id.replace("cancel_order","");
        //alert(order_id+"->"+product_id);
        callAJAX(oneshop_url+"/cancel_order",{order_id:order_id,product_id:product_id},function(data){
            var result=data.trim();
            $("#"+btn_id).css("disabled",false);
        },function(){
            $("#"+btn_id).css("disabled",true);
        });
    });
</script>