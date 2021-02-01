<?php
//var_dump($notifications);
if($notifications!=0){ 
    $title_arry=array('MESSAGE'=>'Message(s)','LIKED_YOUR_POST'=>"clicks",'SHARED_YOUR_POST'=>"shares",'INVITATION_FOR_EVENT'=>"invitations",'INVITATION_RCVD_TO_LIKE_PAGE'=>"page invitations",'POST_IN_YOUR_PAGE'=>"page post(s)",'COMMENTED_ON_EVENT_POST'=>"comments",'POST_FOR_YOUR_EVENT'=>"event posts",'NEW_REQUEST_RCVD_TO_JOIN_GROUP'=>"group join requests",'FRIENDS_BIRTHDAY'=>"Friends Birthday",'COMMENTED_ON_GROUP_POST'=>"comments",'COMMENTED_ON_PAGE_POST'=>"comments",'COMMENTED_ON_YOUR_POST'=>"comments",'LIKED_PAGE_POST'=>0,'LIKED_GROUP_POST'=>0,'FRIENDS_REQUEST'=>"Friend(s) requests");
    $marquee_arry=array('MESSAGE'=>'New Message(s)','LIKED_YOUR_POST'=>"clicks on your post",'SHARED_YOUR_POST'=>"shared your post",'INVITATION_FOR_EVENT'=>"You received invitation(s) from your friends network",'INVITATION_RCVD_TO_LIKE_PAGE'=>"You received invitations to click page",'POST_IN_YOUR_PAGE'=>"You received post(s) to your page(s)",'COMMENTED_ON_EVENT_POST'=>"comment(s) to your post(s)",'POST_FOR_YOUR_EVENT'=>"You received post(s) to the event(s) you created",'NEW_REQUEST_RCVD_TO_JOIN_GROUP'=>"You received request(s) to join your group(s)",'FRIENDS_BIRTHDAY'=>"Today friend(s) birthday",'COMMENTED_ON_GROUP_POST'=>"comment(s) to your post(s)",'COMMENTED_ON_PAGE_POST'=>"comment(s) to your post(s)",'COMMENTED_ON_YOUR_POST'=>"comment(s) to your post(s)",'LIKED_PAGE_POST'=>0,'LIKED_GROUP_POST'=>0,'FRIENDS_REQUEST'=>"You received friends requests");
    $imgs_arry=array('MESSAGE'=>"OD038_tcomments",'LIKED_YOUR_POST'=>"OD29_cclicks",'SHARED_YOUR_POST'=>"OD054_cshares",'INVITATION_FOR_EVENT'=>"OD056_cpage-invitation",'INVITATION_RCVD_TO_LIKE_PAGE'=>"OD030_connection-request",'POST_IN_YOUR_PAGE'=>"OD055_cpostpage",'COMMENTED_ON_EVENT_POST'=>"OD031_commen",'POST_FOR_YOUR_EVENT'=>"OD026_cevents",'NEW_REQUEST_RCVD_TO_JOIN_GROUP'=>"OD023_cgroupjoin",'FRIENDS_BIRTHDAY'=>"OD024_cfriendbday",'COMMENTED_ON_GROUP_POST'=>"OD031_commen",'COMMENTED_ON_PAGE_POST'=>"OD031_commen",'COMMENTED_ON_YOUR_POST'=>"ccomments",'LIKED_PAGE_POST'=>"OD032_likes",'LIKED_GROUP_POST'=>"OD032_likes",'FRIENDS_REQUEST'=>"OD025_cfriend-request");
    $notify_cnt=0; 
    foreach($notifications as $type=>$cnt){ 
        $cimg_url=base_url()."assets/Images/contentImages/".$imgs_arry[$type];
        if($type=="INVITATION_FOR_EVENT"){
            $marquee_txt="You received ".$cnt." invitation(s) from your friends network";
        }elseif($type=="INVITATION_RCVD_TO_LIKE_PAGE"){
            $marquee_txt="You received ".$cnt." invitations to click page";
        }elseif($type=="POST_IN_YOUR_PAGE"){
            $marquee_txt="You received ".$cnt." post(s) to your page(s)";
        }elseif($type=="POST_FOR_YOUR_EVENT"){
            $marquee_txt="You received ".$cnt." post(s) to the event(s) you created";
        }elseif($type=="NEW_REQUEST_RCVD_TO_JOIN_GROUP"){
            $marquee_txt="You received ".$cnt." request(s) to join your group(s)";
        }elseif($type=="FRIENDS_BIRTHDAY"){
            $marquee_txt="Today ".$cnt." friend(s) birthday";
        }elseif($type=="FRIENDS_REQUEST"){
            $marquee_txt="You received ".$cnt." friends requests";
        }else{
            $marquee_txt=$cnt." ".$marquee_arry[$type];
        }
?>
    <div class="mmcMainInnerWrapper" id="cnotify_<?php echo $notify_cnt?>">
      <span class="mmciconWrapper"><i class="sprite sprite-<?php echo $imgs_arry[$type] ?>"></i></span>
      <span class="mmcTextWrapper">
          <h2><?php echo $cnt;?></h2>
          <p><?php echo $title_arry[$type];?></p>
      </span>
      <div class="mmcMarqueWrapper">
          <marquee class="mmcmarqueClass"><?php echo $marquee_txt;?></marquee>
      </div>
    </div>
<?php
        $notify_cnt++;
    }
}
  else{
?>
  <div class="mmcMainInnerWrapper">
    <span class="mmciconWrapper3"><img src="<?php echo base_url() . 'assets/' ?>Images/contentImages/ccomments.png"></span>
    <span class="mmcTextWrapper3">
        <h2>0 Notifications</h2>
    </span>
  </div>
<?php
}
?>