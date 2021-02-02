<?php
$this->load->module('templates');
$this->templates->app_header();
$this->templates->os_mainmenu();
?>            

<!--Oneshop Content starts Here(vinod 19-05-2015)-->
<div class="oneshop_contentSection">
  <div class="oneshop_cartItemsPage">
    <div class="oneshop_cartItemsPageHead">
      My Cart Items
    </div>
    <input type="hidden" value="" name="hstore_id" id="hstore_id"/>
    <div id="cart_stores" style="float:left;margin-top:10px;">
      <ul style="list-style: none; padding-left:5px; margin-bottom: 5px;" id="stores_list">
<?php
$j=0;
$store_id=0;
  foreach($cart_stores as $items){
    $img_url=base_url()."stores/".$items["store_id"]."/logo/li/".$items["logo_path"];
    //echo $items["store_id_fk"];
    if($j==0){
      $store_id=$items["store_id_fk"];
      $styl="display:inline-block;width:150px;height:120px; overflow: hidden; border:3px solid #ddd; box-shadow: 0 0 3px #555; margin:2px;";
    }else{
      $styl="display:inline-block;width:150px;height:120px; overflow: hidden; border:3px solid #ddd; margin:2px;";
    }
    echo "<input type='hidden' name='hstore_id' id='hstore_id_$j' value='".$items["store_aid"]."'/>";    
    echo "<li style='$styl' name='items' id='item_$j'><span style='position: absolute; width: 150px; height: 100px; overflow: hidden;'><img style='float: left;' src='$img_url' width='150px'/></span>";
    echo "<a href='javascript:void(0)' style='position: absolute; font: 12px Arial; color: #555; text-decoration: none; width:145px; margin-top:95px; padding: 5px 0 5px 5px; background-color:#ddd' id='cart_store_$j'>".$items["name"]."</a>";
    echo "<a href='javascript:void(0)' id='delete_store_$j' style='font: 12px Arial; color: white; background-color: #333; width: 15px; height: 15px; text-align: center; position:absolute; margin-left:135px; text-decoration: none;'>X</a></li>";        
  ?>
<script type="text/javascript">
  $("#cart_store_<?php echo $j?>").click(function(){
    var store_id=$("#hstore_id_<?php echo $j?>").val();
    var current=<?php echo $j?>;
    //alert(current);
    $.ajax({
      type:"post",
      url: oneshop_url+"/mycart/mycart_View/"+store_id,
      success:function(data){
        $("#cart_items_list").html(data);
        $("#cart_stores li").each(function(i){
          if(i==current){
            $("#item_<?php echo $j?>").css("border","3px solid red");
          }else{
            $("#item_"+i).css("border","3px solid #555");
          }
        });
      }
    });
  });
  $("#delete_store_<?php echo $j?>").click(function(){
    var store_id=$("#hstore_id_<?php echo $j?>").val();
    $.ajax({
      type:"post",
      url: oneshop_url+"/mycart/deleteCartStore/"+store_id,
      success:function(data){
        var result=data.trim();
        if(result==1){
          window.location=oneshop_url+"/home/cart_items/";
        }
      }
    });
  });
</script>
<?php
    $j++;
  }
?>
  </ul>
</div>
<div id="cart_items_list" style="float:left;margin-top:2px;">
<?php
$this->load->module("mycart");
$this->mycart->mycart_view($store_id);
?>
</div>
        
    </div>
</div>
<!--Oneshop Content ends Here(vinod 19-05-2015)-->            

<?php
$this->templates->app_footer();
?>