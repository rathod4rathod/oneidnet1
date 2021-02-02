        <?php if($savedproducts!=0){ 
            foreach($savedproducts as $savedproduct){ 
                $product_aid=$savedproduct['product_aid'];
                //$product_url=base_url()."product_detail_view?product_id=".  base64_encode(base64_encode($savedproduct['product_aid']));
                $product_url=base_url()."product_detail_view/".  $savedproduct['store_code']."/".$savedproduct['product_code'];
                ?>
    <div class="oneshop_pro_saved_products_wrap box_sizing" id="sp_<?php echo $product_aid?>">
        <span class="delete_product"><input type="checkbox" name="cb" id="cb_<?php echo $product_aid?>"/></span>
    <div class="oneshop_proimagebox">
    <span>
<?php if($savedproduct['primary_image']!=''){ ?>
    <img src="<?php echo base_url().'stores/'.$savedproduct['store_code'].'/products/'.$savedproduct['product_aid'].'/mi/'. $savedproduct['primary_image']?>"> 
<?php }else{ ?>
<img src="<?php echo base_url().'assets/images/default_product_40.jpg'?>">
<?php } ?>
</span>
    </div>
    <div class="oneshop_product_ratebg_box">
        <p class="title"> <a href='<?php echo $product_url?>'><?php echo ucfirst($savedproduct['product_name']) ?> </a></p>
    <p class="price"><b><?php echo  $savedproduct['cost_price'] ?> </b></p>
    </div>
    </div>
<?php }}else{ ?>
	 <div class="osdes_rightbar_headingsbg_wrap box_sizing">
        <p>No  Products</p>
     </div>
<?php 
} ?>
<script type="text/javascript">
    $(".oneshop_pro_saved_products_wrap :checkbox").click(function(){
        if($(this).is(":checked")){
            var current_id=$(this).attr("id");
            var confirmation=confirm("Are your sure to delete the product?");
            if(confirmation){
                var product_arry=current_id.split("_");
                var product_id=product_arry[1];
                $.ajax({
                    type:"post",
                    data:{product_aid:product_id,mode:"SINGLE"},
                    url: oneshop_url+"/products/delSavedItem",
                    success:function(data){
                        var result=data.trim();
                        //alert(result);
                        if(result.indexOf("ERROR")==-1){
                            $("#sp_"+result).css("display","none");
                        }
                    }
                });
            }
        }
    });
</script>
