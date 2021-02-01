
<?php 
//print_R($user_notifications);
if($store_notifications==0){
  echo '<li class="click_friendRequest">No data</li>';
}else{
foreach($store_notifications as $store_notifications_info){
  ?>
<div class="redirect_php" id="<?php echo $store_notifications_info["rec_aid"]?>" url="<?php echo $store_notifications_info["url"]?>">
      <li class="click_friendRequest" style="<?php if($store_notifications_info["read_or_not"]==2){ echo "background-color: #fff;";}else{ echo "background-color: #eee;";}?>">
  <?php echo $store_notifications_info["text"];  ?>
      </li>
    <div>

 <?php
}
?>

        <script>
    $(document).on("click",".redirect_php",function(){
      var nf_id=$(this).attr("id");
      var redirect_url=$(this).attr("url");
       $.ajax({
            type: 'POST',
            url: oneshop_url+ "/notification/update_notification",
            data: {notify_aid: $(this).attr("id")},
            success: function (data) {
              if(data==1)
              {
                if(redirect_url){
                  location.replace(redirect_url);
                }
              }
            }
        }); 
        return false();
    });
</script>
<?php
}
?>