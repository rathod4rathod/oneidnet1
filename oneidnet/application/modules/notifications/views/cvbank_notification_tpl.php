<div class="mmcMainSlideWrapper">
<?php
//var_dump($notifications);
if($cv_data!=0){ 
    $title_arry=array('U_UC_INTERVIEW_SCHEDULED'=>"Scheduled Interview",'U_UC_PROFILE_VIEWED_BY_COMPANY'=>"View(s)",'U_UC_PROFILE_SHORTLISTED_BY_COMPANY'=>"Shortlist",'U_UC_NETPRO_PROFILE_ACCESS_REQUEST'=>"Profile access",'U_UC_RESUME_DOWNLOADED_BY_COMPANY'=>"Download(s)",'U_UC_NETPRO_PROFILE_ACCESS_GIVEN'=>"Access given","C_UC_NETPRO_PROFILE_ACCESS_APPROVED"=>"Approval(s)");
    $imgs_arry=array('U_UC_INTERVIEW_SCHEDULED'=>"OD013_cschedule",'U_UC_PROFILE_VIEWED_BY_COMPANY'=>"OD010_cview",'U_UC_PROFILE_SHORTLISTED_BY_COMPANY'=>"OD014_cshort",'U_UC_NETPRO_PROFILE_ACCESS_REQUEST'=>"OD012_cpaccess",'U_UC_RESUME_DOWNLOADED_BY_COMPANY'=>"OD011_cdownloads",'U_UC_NETPRO_PROFILE_ACCESS_GIVEN'=>"OD012_cpaccess","C_UC_NETPRO_PROFILE_ACCESS_APPROVED"=>"OD010_capproval");
    $notify_cnt=0; 
    foreach($cv_data as $type=>$cnt){ 
       // $img_url=base_url().'assets/Images/contentImages/'.$imgs_arry[$type];
?>
    <div class="mmcMainInnerWrapper" id="cvnotify_<?php echo $notify_cnt?>">
      <span class="mmciconWrapper"><i class="sprite sprite-<?php echo $imgs_arry[$type]; ?>"></i></span>
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