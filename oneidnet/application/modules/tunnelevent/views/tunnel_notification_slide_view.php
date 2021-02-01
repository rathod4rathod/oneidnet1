<?php  //print_R($notify_type); ?>

<?php
if($notify_type!=0){
foreach($notify_type as $notify_type_info){
  if($notify_type_info["notification_type"]=="LIKE"){
    ?>
            <div class="mmcMainInnerWrapper">
          <span class="mmciconWrapper"><img src="<?php echo base_url() . 'assets/' ?>Images/contentImages/film.png"></span>
          <span class="mmcTextWrapper">
              <h2><?php echo $notify_type_info["TotalCount"]; ?></h2>
              <p><?php if($notify_type_info["TotalCount"]>1){ echo "Likes"; }else { echo "Like";  }; ?> </p>
          </span>
          <div class="mmcMarqueWrapper">
              <marquee class="mmcmarqueClass"><?php echo $notify_type_info["TotalCount"]; ?> Persons liked your video</marquee>
          </div>
      </div>

      <?php
  }
  
  if($notify_type_info["notification_type"]=="DISLIKE"){
    ?>
            <div class="mmcMainInnerWrapper">
          <span class="mmciconWrapper"><img src="<?php echo base_url() . 'assets/' ?>Images/contentImages/film.png"></span>
          <span class="mmcTextWrapper">
              <h2><?php echo $notify_type_info["TotalCount"]; ?></h2>
              <p><?php if($notify_type_info["TotalCount"]>1){ echo "Dislikes"; }else { echo "Dislike";  }; ?> </p>
          </span>
          <div class="mmcMarqueWrapper">
              <marquee class="mmcmarqueClass"> <?php echo $notify_type_info["TotalCount"]; ?> Persons disliked your video</marquee>
          </div>
      </div>

      <?php
  }
  
  if($notify_type_info["notification_type"]=="VIDEO_SHARE"){
    ?>

            <div class="mmcMainInnerWrapper">
          <span class="mmciconWrapper"><img src="<?php echo base_url() . 'assets/' ?>Images/contentImages/film.png"></span>
          <span class="mmcTextWrapper">
              <h2><?php echo $notify_type_info["TotalCount"]; ?></h2>
              <p><?php if($notify_type_info["TotalCount"]>1){ echo "Shares"; }else { echo "Share";  }; ?> </p>
          </span>
          <div class="mmcMarqueWrapper">
              <marquee class="mmcmarqueClass"><?php echo $notify_type_info["TotalCount"]; ?> persons share your video</marquee>
          </div>
      </div>
      <?php
  }
  
  if($notify_type_info["notification_type"]=="CHANNEL_SUBSCRIBE"){
    ?>

            <div class="mmcMainInnerWrapper">
          <span class="mmciconWrapper"><img src="<?php echo base_url() . 'assets/' ?>Images/contentImages/film.png"></span>
          <span class="mmcTextWrapper">
              <h2><?php echo $notify_type_info["TotalCount"]; ?></h2>
               <p><?php if($notify_type_info["TotalCount"]>1){ echo "Subscribes"; }else { echo "Subscribe";  }; ?> </p>
          </span>
          <div class="mmcMarqueWrapper">
              <marquee class="mmcmarqueClass"><?php echo $notify_type_info["TotalCount"]; ?> Persons Subscribe your tunnel</marquee>
          </div>
      </div>
      <?php
  }
  
  if($notify_type_info["notification_type"]=="COMMENT"){
    ?>
            <div class="mmcMainInnerWrapper">
          <span class="mmciconWrapper"><img src="<?php echo base_url() . 'assets/' ?>Images/contentImages/film.png"></span>
          <span class="mmcTextWrapper">
              <h2><?php echo $notify_type_info["TotalCount"]; ?></h2>
               <p><?php if($notify_type_info["TotalCount"]>1){ echo "Comments"; }else { echo "Comment";  }; ?> </p>
          </span>
          <div class="mmcMarqueWrapper">
              <marquee class="mmcmarqueClass"><?php echo $notify_type_info["TotalCount"]; ?> Persons Commented to your video</marquee>
          </div>
      </div>
      <?php
  }
  
  if($notify_type_info["notification_type"]=="COMMENT_REPLY"){
    ?>
            <div class="mmcMainInnerWrapper">
          <span class="mmciconWrapper"><img src="<?php echo base_url() . 'assets/' ?>Images/contentImages/film.png"></span>
          <span class="mmcTextWrapper">
              <h2><?php echo $notify_type_info["TotalCount"]; ?></h2>
              <p><?php if($notify_type_info["TotalCount"]>1){ echo "Replies"; }else { echo "Replie";  }; ?> </p>

          </span>
          <div class="mmcMarqueWrapper">
              <marquee class="mmcmarqueClass"><?php echo $notify_type_info["TotalCount"]; ?> Persons replied to your comment</marquee>
          </div>
      </div>

      <?php
  }
  
  if($notify_type_info["notification_type"]=="TUNNEL_SHARE"){
    ?>

<div class="mmcMainInnerWrapper">
    <span class="mmciconWrapper"><img src="<?php echo base_url() . 'assets/' ?>Images/contentImages/film.png"></span>
    <span class="mmcTextWrapper">
        <h2><?php echo $notify_type_info["TotalCount"]; ?></h2>
        <p><?php if($notify_type_info["TotalCount"]>1){ echo "Tunnel shares"; }else { echo "Tunnel share";  }; ?> </p>        
    </span>
    <div class="mmcMarqueWrapper">
        <marquee class="mmcmarqueClass"><?php echo $notify_type_info["TotalCount"]; ?> Persons share your tunnel</marquee>
    </div>
</div>


      <?php
  }
  ?>

    <?php
}}else{
  ?>
<div class="mmcMainInnerWrapper">
      <span class="mmciconWrapper"><img src="<?php echo base_url() . 'assets/' ?>Images/contentImages/film.png"></span>
      <span class="mmcTextWrapper">
          <h2>0</h2>
          <p>Notifications</p>
      </span>
  </div>
<!--  <div class="mmcMainInnerWrapper">
      <div class="mmContentWrapperType2">
          <video width="134px" height="72px">
              <source type="video/mp4" src="videos/Platinum Evara telugu.mp4">
          </video>
      </div>
  </div>-->
    
    <?php
}?>

