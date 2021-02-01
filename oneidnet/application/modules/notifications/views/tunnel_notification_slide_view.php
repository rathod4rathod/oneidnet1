<?php
//print_r($notify_type);
if($notify_type!=0){  
    $t=0;
    $notif_title_arry=array('MESSAGE'=>'Message(s)','LIKE'=>"Like(s)",'DISLIKE'=>"Dislike(s)",'VIDEO_SHARE'=>"Share(s)",'CHANNEL_SUBSCRIBE'=>"Subscribe(s)",'COMMENT'=>"Comment(s)",'COMMENT_REPLY'=>"Reply/Replies",'TUNNEL_SHARE'=>"Tunnel shares");
    $notif_marquee_arry=array('MESSAGE'=>'New Message(s)','LIKE'=>"Person(s) liked your video",'DISLIKE'=>"Person(s) disliked your video",'VIDEO_SHARE'=>"person(s) share your video",'CHANNEL_SUBSCRIBE'=>"Person(s) Subscribe your tunnel",'COMMENT'=>"Person(s) Commented to your video",'COMMENT_REPLY'=>"Person(s) replied to your comment",'TUNNEL_SHARE'=>"Person(s) share your tunnel");
    $images_arry=array('MESSAGE'=>"OD038_tcomments",'LIKE'=>"OD036_tlikes",'DISLIKE'=>"OD037_tdislikes",'VIDEO_SHARE'=>"OD033_tvideoshares",'CHANNEL_SUBSCRIBE'=>"OD034_tsubscribe",'COMMENT'=>"OD038_tcomments",'COMMENT_REPLY'=>"OD035_treply",'TUNNEL_SHARE'=>"OD033_tvideoshares");
foreach($notify_type as $type=>$count){
  //if($notify_type_info["notification_type"]=="LIKE"){
    //$timg_url=base_url()."assets/Images/contentImages/".$images_arry[$type];
    ?>
            <div class="mmcMainInnerWrapper" id="tnotify_<?php echo $t?>">
          <span class="mmciconWrapper"><i class="sprite sprite-<?php echo $images_arry[$type] ?>"></i></span>
          <span class="mmcTextWrapper">
              <h2><?php echo $count; ?></h2>
              <p><?php echo $notif_title_arry[$type]; ?> </p>
          </span>
          <div class="mmcMarqueWrapper">
              <marquee class="mmcmarqueClass"><?php echo $count."  ".$notif_marquee_arry[$type]?></marquee>
          </div>
      </div>

      <?php
  //}
  $t++;  
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

