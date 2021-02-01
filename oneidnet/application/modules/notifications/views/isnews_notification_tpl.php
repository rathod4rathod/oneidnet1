<div class="mmcMainSlideWrapper">
<?php
//var_dump($notifications);
if($cv_data!=0){ 
    $title_arry=array('FAKED_NEWS_VOTE'=>"Faked News Votes",'GOOD_NEWS_VOTE'=>"Good News Votes",'SAD_NEWS_VOTE'=>"Sad news votes",'HEART_NEWS_VOTE'=>"Heart Touching News Votes",'SUBSCRIBE_CHANNEL_VOTE'=>"Channel Subscriptions");
    $imgs_arry=array('FAKED_NEWS_VOTE'=>"OD043_falsenews",'GOOD_NEWS_VOTE'=>"OD047_goodnews",'SAD_NEWS_VOTE'=>"OD040_sadnews",'HEART_NEWS_VOTE'=>"OD045_heartnews",'SUBSCRIBE_CHANNEL_VOTE'=>"OD091_subscribe");
    $notify_cnt=0; 
    foreach($cv_data as $type=>$cnt){ 
        //$img_url=base_url().'assets/Images/contentImages/isn/'.$imgs_arry[$type];
?>
    <div class="mmcMainInnerWrapper" id="isnnotify_<?php echo $notify_cnt?>">
      <span class="mmciconWrapper"><i class="sprite sprite-<?php echo $imgs_arry[$type] ?>" style="margin:2px 0 0 2px;"></i></span>
      <span class="mmcTextWrapper">
          <h2><?php echo $cnt;?></h2>
          <p><?php echo $title_arry[$type];?></p>
      </span>      
    </div>
<?php
        $notify_cnt++;
    }
}
  else{
?>
  <div class="mmcMainInnerWrapper">
    <span class="mmciconWrapper3"><img src="<?php echo base_url() . 'assets/' ?>Images/contentImages/persons.png"></span>
    <span class="mmcTextWrapper3">
        <h2>0 Notifications</h2>
    </span>
  </div>
<?php
}
?>
</div>
