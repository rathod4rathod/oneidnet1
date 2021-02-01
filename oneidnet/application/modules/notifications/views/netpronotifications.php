<?php
if($netpro_notifications!=0){
    $ncnt=0;
    $title_arry=array('MESSAGE'=>"New Message(s)",'New Connection'=>"Connection Request",'Like'=>"Like(s)",'Comment'=>"Comments",'Post'=>"New Posts",'Recommendation Received'=>"Recommendation received",'Endorsement'=>"endrosement(s)",'View'=>"View(s)",'Member Request to join Group'=>"Group Join Request(s)",'Recommendation Request'=>"Recommendation request(s)",'REQUEST_TO_VIEW_PROFILE'=>"Profile Request(s)");
    $imgs_arry=array('MESSAGE'=>"OD038_tcomments",'New Connection'=>"OD004_nconection",'Like'=>"OD007_nlike",'Comment'=>"OD009_ncomments",'Post'=>"OD006_npost",'Recommendation Received'=>"OD002_nrecomend",'Endorsement'=>"OD008_nendorse",'View'=>"OD005_nviews",'Member Request to join Group'=>"OD003_ngroup",'Recommendation Request'=>"OD002_nrecomend",'REQUEST_TO_VIEW_PROFILE'=>"OD003_ngroup");
    foreach($netpro_notifications as $type=>$cnt){ 
       // $img_url=base_url().'assets/Images/contentImages/'.$imgs_arry[$type];
?>
    <div class="mmcMainInnerWrapper" id="nnotify_<?php echo $ncnt?>">
        <span class="mmciconWrapper3"><!--<img src="<?php echo $img_url;?>">--><i class="sprite sprite-<?php echo $imgs_arry[$type]?>" style="margin: 2px 0 0 14px;"></i></span>
        <span class="mmcTextWrapper3">
            <h2><?php echo $cnt." ".$title_arry[$type]?></h2>
        </span>
    </div>
<?php
        $ncnt++;
    }
}else{
    
}
?>