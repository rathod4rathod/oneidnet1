<?php
//var_dump($notifications);
if($co_data!=0){ 
    $title_arry=array('C_UC_COMPANY_FOLLOWED_BY_USER'=>"Followers",'C_CJ_APPLICATION_RECEIVED_FOR_JOB'=>"Application(s)");
    $imgs_arry=array('C_UC_COMPANY_FOLLOWED_BY_USER'=>"OD022_followers",'C_CJ_APPLICATION_RECEIVED_FOR_JOB'=>"OD021_aplications");
    $notify_cnt=0;
    ?>
<div class="mmcMainSlideWrapper" id="coofficeNotifsBlk">
<?php
    foreach($co_data as $type=>$cnt){ 
       // $img_url=base_url().'assets/Images/contentImages/'.$imgs_arry[$type];
?>
    <div class="mmcMainInnerWrapper" id="conotify_<?php echo $notify_cnt?>">
      <span class="mmciconWrapper"><i class="sprite sprite-<?php echo $imgs_arry[$type] ?>"></i></span>
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