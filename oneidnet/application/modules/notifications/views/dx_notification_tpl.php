<?php
//var_dump($notifications);
if($dx_data!=0){ 
    $title_arry=array("MESSAGE"=>"New Message(s)",'CONNECTION_REQUEST_RECEIVED'=>'Request(s)','YOU_ARE_WINNER'=>'Winner','YOU_ARE_SECOND_RUNNER_UP'=>'Second runner up','CONNECTION_REQUEST_APPROVED'=>'Approval(s)','YOU_ARE_FIRST_RUNNER_UP'=>'First runnerup','AUCTION_RESULT_ANNOUNCED'=>'Auction announce','FOLLOWING_YOUR_DEALER_PROFILE'=>'Following(s)');
    $imgs_arry=array('MESSAGE'=>"OD038_tcomments",'CONNECTION_REQUEST_RECEIVED'=>'OD049_d-requests"','YOU_ARE_WINNER'=>'OD051_dauctionwin','YOU_ARE_SECOND_RUNNER_UP'=>'Second runner up','CONNECTION_REQUEST_APPROVED'=>'OD053_daprovel','YOU_ARE_FIRST_RUNNER_UP'=>'First runnerup','AUCTION_RESULT_ANNOUNCED'=>'OD052_dauction-announe','FOLLOWING_YOUR_DEALER_PROFILE'=>'OD050_dreq');
    $notify_cnt=0;
    ?>
<div class="mmcMainSlideWrapper">
<?php
    foreach($dx_data as $type=>$cnt){ 
       //  $img_url=base_url().'assets/Images/contentImages/'.$imgs_arry[$type];
        //echo $type."--->".$cnt;
        if($type!=="YOU_ARE_WINNER"&&$type!=="YOU_ARE_FIRST_RUNNER_UP"&&$type!=="YOU_ARE_SECOND_RUNNER_UP"){
?>
    <div class="mmcMainInnerWrapper" id="dxnotify_<?php echo $notify_cnt?>">
      <span class="mmciconWrapper"><i class="sprite sprite-<?php echo $imgs_arry[$type] ?>"></i></span>
      <span class="mmcTextWrapper">
          <h2><?php echo $cnt;?></h2>
          <p><?php echo $title_arry[$type];?></p>
      </span>      
    </div>
    <?php
        }
        else{
            if($type==="YOU_ARE_WINNER"&&$cnt!=0){
    ?>
        <div class="mmcMainInnerWrapper" id="dxnotify_<?php echo $notify_cnt?>">
            <span class="mmciconWrapper"><img src="<?php echo $img_url;?>"></span>
            <span class="mmcTextWrapper">                
                <p>Winner</p>
            </span>      
        </div>
    <?php
            }
            if($type==="YOU_ARE_FIRST_RUNNER_UP"&&$cnt!=0){
    ?>
        <div class="mmcMainInnerWrapper" id="dxnotify_<?php echo $notify_cnt?>">
            <span class="mmciconWrapper"><img src="<?php echo $img_url;?>"></span>
            <span class="mmcTextWrapper">                
                <p>First Runner up</p>
            </span>      
        </div>
    <?php
            }
            if($type==="YOU_ARE_SECOND_RUNNER_UP"&&$cnt!=0){
    ?>
        <div class="mmcMainInnerWrapper" id="dxnotify_<?php echo $notify_cnt?>">
            <span class="mmciconWrapper"><img src="<?php echo $img_url;?>"></span>
            <span class="mmcTextWrapper">                
                <p>Second Runner up</p>
            </span>      
        </div>   
    <?php
            }
        }
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