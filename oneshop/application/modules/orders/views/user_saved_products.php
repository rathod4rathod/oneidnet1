<?php
if($prods_data!=0){
  foreach($prods_data as $rows){
    $path=explode(",",$rows["image_path"]);
    $img_url=base_url()."stores/".$rows["storeid"]."/products/si/".$path[0];
    $product_id=$rows["product_id"];
    $product_url=base_url()."home/product_Detail_View?product_id=".base64_encode(base64_encode($product_id));
?>
<div class="oneshop_profilePurchaseHistoryItem" id="save_list">
  <img src="<?php echo $img_url;?>" class="oneshop_pphproductPic">    
    <ul class="oneshop_pphHead">
      <li><h4>Product Name</h4></li>
      <li><h4>Store name</h4></li>
      <li><h4>Brand</h4></li>      
      <li><h4>Amount</h4></li>      
    </ul>
    <ul class="oneshop_pphBody">
      <li><h4><a href="<?php echo $product_url;?>"><?php echo $rows["productname"];?></a></h4></li>
      <li><h4><?php echo $rows["storename"];?></h4></li>
      <li><h4><?php echo $rows["brand"];?></h4></li>
      <li><h4><?php echo $rows["cost_price"];?></h4></li>
    </ul>                                
</div>
<?php
  }
}else{
  echo "<h1>No products in your list.</h1>";
}
?>
<style type="text/css">
    #save_list ul.oneshop_pphHead li:nth-child(1){
      width:156px;
    }
    #save_list ul.oneshop_pphHead li:nth-child(4){
        width:100px;
    }
    #save_list ul.oneshop_pphHead li{
      width:126px;
    }    
    #save_list ul.oneshop_pphBody li:nth-child(1){
      width:156px;
    }
    #save_list ul.oneshop_pphBody li:nth-child(4){
        width:100px;
    }
    #save_list ul.oneshop_pphBody li{
      width:126px;
    }
    ul.oneshop_pphBody li h4 a{
        text-decoration: none;
        color:#4D70DB;
    }
    ul.oneshop_pphBody li h4 a:hover{
        color:#fff;
    }
</style>