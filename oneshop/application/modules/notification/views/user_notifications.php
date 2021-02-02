<?php 
//print_R($user_notifications);
if($user_notifications==0){
  echo '<li class="click_friendRequest">No data</li>';
}else{
foreach($user_notifications as $user_notifications_info){
    $msg=$user_notifications_info["msg"];
    // echo $msg;
    $notif_url=base_url().$user_notifications_info["url"];
    $notif_img_url=base_url().$user_notifications_info["img_url"];
    /*if($user_notifications_info["from_userid"]==$loggedin_user){
        if($user_notifications_info["type"]=="ORDER_PLACED" || $user_notifications_info["type"]=="ORDER_CANCEL"){
            $msg=$user_notifications_info["msg"];
        }
    }else{
        $msg=$user_notifications_info["msg"];
    }
    <div class="redirect_php" id="<?php echo $user_notifications_info["rec_aid"]?>" url="<?php echo $user_notifications_info["url"]?>">
        <li class="click_friendRequest" style="<?php if($user_notifications_info["status"]==1){ echo "background-color: #fff;";}else{ echo "background-color: #eee;";}?>">
            <img src="<?php echo $notif_img_url?>"/><a href="<?php echo $notif_url?>"><?php echo $msg;?></a>
        </li>
    </div>*/
 
  if($user_notifications_info['type']=='STORE_REVIEW'){ 
	  		
	   if($user_notifications_info['profile_image_path']!=''){
		    $notif_img_url=base_url().'stores/'.$user_notifications_info["store_code"].'/SDT/si/'.$user_notifications_info['profile_image_path'];
			   
		   }else{
			    $notif_img_url=base_url().'assets/images/default_store.png';
			   }
	  
	   $notif_url = base_url().'store_reviews/'.$user_notifications_info["store_code"];
	  ?>
	      <div class="redirect_php" id="<?php echo $user_notifications_info["rec_aid"]?>" url="<?php echo $user_notifications_info["url"]?>">
        <li class="click_friendRequest" style="<?php if($user_notifications_info["status"]==1){ echo "background-color: #fff;";}else{ echo "background-color: #eee;";}?>">
            <span class="np_messages_leftimagediv"><img src="<?php echo $notif_img_url?>" height="20" width="20"/></span>
            <span class="np_messages_rightcontentmaindiv"><a href="<?php echo $notif_url?>"><?php echo $user_notifications_info["profile_name"] ." Given  Review to  ".$user_notifications_info["store_name"] ;?></a> </span>
        </li>
    </div>
	<?php  }
  if($user_notifications_info['type']=='STORE_REPORTED'){ 
            
       if($user_notifications_info['profile_image_path']!=''){
            $notif_img_url=base_url().'stores/'.$user_notifications_info["store_code"].'/SDT/si/'.$user_notifications_info['profile_image_path'];
               
           }else{
                $notif_img_url=base_url().'assets/images/default_store.png';
               }
      
       $notif_url=$user_notifications_info["url"];
      ?>
          <div class="redirect_php" id="<?php echo $user_notifications_info["rec_aid"]?>" url="<?php echo $user_notifications_info["url"]?>">
        <li class="click_friendRequest" style="<?php if($user_notifications_info["status"]==1){ echo "background-color: #fff;";}else{ echo "background-color: #eee;";}?>">
            <span class="np_messages_leftimagediv"><img src="<?php echo $notif_img_url?>" height="20" width="20"/></span>
            <span class="np_messages_rightcontentmaindiv"><a href="<?php echo $notif_url?>"><?php echo $msg ;?></a> </span>
        </li>
    </div>
  <?php  }
  if($user_notifications_info['type']=='STORE_MESSAGES'){ 
            
       if($user_notifications_info['profile_image_path']!=''){
            $notif_img_url=base_url().'stores/'.$user_notifications_info["store_code"].'/SDT/si/'.$user_notifications_info['profile_image_path'];
               
           }else{
                $notif_img_url=base_url().'assets/images/default_store.png';
               }
      
       $notif_url=$user_notifications_info["url"];
      ?>
          <div class="redirect_php" id="<?php echo $user_notifications_info["rec_aid"]?>" url="<?php echo $user_notifications_info["url"]?>">
        <li class="click_friendRequest" style="<?php if($user_notifications_info["status"]==1){ echo "background-color: #fff;";}else{ echo "background-color: #eee;";}?>">
            <span class="np_messages_leftimagediv"><img src="<?php echo $notif_img_url?>" height="20" width="20"/></span>
            <span class="np_messages_rightcontentmaindiv"><a href="<?php echo base_url().$notif_url?>"><?php echo $msg ;?></a> </span>
        </li>
    </div>
  <?php  }
  if($user_notifications_info['type']=='ADMIN_PRODUCT_ADDED'){ 
            
       if($user_notifications_info['profile_image_path']!=''){
          $notif_img_url=base_url().'stores/'.$user_notifications_info["store_code"].'/SDT/si/'.$user_notifications_info['profile_image_path'];
               
        }else{
          $notif_img_url=base_url().'assets/images/default_store.png';
        }
      
       $notif_url=$user_notifications_info["url"];
      ?>
          <div class="redirect_php" id="<?php echo $user_notifications_info["rec_aid"]?>" url="<?php echo $user_notifications_info["url"]?>">
        <li class="click_friendRequest" style="<?php if($user_notifications_info["status"]==1){ echo "background-color: #fff;";}else{ echo "background-color: #eee;";}?>">
            <span class="np_messages_leftimagediv"><img src="<?php echo $notif_img_url?>" height="20" width="20"/></span>
            <span class="np_messages_rightcontentmaindiv"><a href="<?php echo $notif_url?>"><?php echo $msg ;?></a> </span>
        </li>
    </div>
    <?php  }
     if($user_notifications_info['type']=='ORDER_STATUS'){ 
            
       if($user_notifications_info['profile_image_path']!=''){
            $notif_img_url=base_url().'stores/'.$user_notifications_info["store_code"].'/SDT/si/'.$user_notifications_info['profile_image_path'];
               
           }else{
                $notif_img_url=base_url().'assets/images/default_store.png';
               }
      
       $notif_url=base_url().$user_notifications_info["url"];
      ?>
          <div class="redirect_php" id="<?php echo $user_notifications_info["rec_aid"]?>" url="<?php echo $user_notifications_info["url"]?>">
        <li class="click_friendRequest" style="<?php if($user_notifications_info["status"]==1){ echo "background-color: #fff;";}else{ echo "background-color: #eee;";}?>">
            <span class="np_messages_leftimagediv"><img src="<?php echo $notif_img_url?>" height="20" width="20"/></span>
            <span class="np_messages_rightcontentmaindiv"><a href="<?php echo $notif_url?>"><?php echo $msg ;?></a> </span>
        </li>
    </div>
    <?php  }
	if($user_notifications_info['type']=='PRODUCT_REVIEW' ){
		
		if($user_notifications_info['primary_image']!=''){
		   $productimg = $user_notifications_info['primary_image'] ;
			   
		   }else{
			   $productimg = 'default_product_40.png';
			   }
	   $notif_img_url=base_url().'stores/'.$user_notifications_info["store_code"].'/products/'.$user_notifications_info["entity_id"].'/si/'.$productimg;
	   $notif_url = base_url().'product_reviews?product_id='.base64_encode(base64_encode($user_notifications_info["entity_id"]));
	  ?>
	      <div class="redirect_php" id="<?php echo $user_notifications_info["rec_aid"]?>" url="<?php echo $user_notifications_info["url"]?>">
        <li class="click_friendRequest" style="<?php if($user_notifications_info["status"]==1){ echo "background-color: #fff;";}else{ echo "background-color: #eee;";}?>">
            <img src="<?php echo $notif_img_url?>" height="20" width="20"/><a href="<?php echo $notif_url?>"><?php echo $user_notifications_info["profile_name"] ." Given  Review  to  ".$user_notifications_info["product_name"] ;?></a>
        </li>
    </div>
	<?php  }
 
}
?>
<script>
    /*$(document).on("click",".redirect_php",function(){
      var nf_id=$(this).attr("id");
      var redirect_url=$(this).attr("url");
       $.ajax({
            type: 'POST',
            url: " http://" + window.location.hostname + "/oneshop/notification/update_notification",
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
    });*/
</script>
<?php
}
?>