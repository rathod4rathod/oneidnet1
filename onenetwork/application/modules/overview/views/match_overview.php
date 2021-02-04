<?php
$best_cnt=0;
$medium_cnt=0;
$basic_cnt=0;
$random_cnt=0;
if($overview_type=="GMA"){
  foreach($match_cnt_data as $minfo){
      if($minfo["match_type"]=="BEST_MATCH"){
          $best_cnt=$minfo[0]["cnt"];
      }
      elseif($minfo["match_type"]=="MEDIUM_MATCH"){
          $medium_cnt=$minfo[0]["cnt"];
      }elseif($minfo["match_type"]=="BASIC_MATCH"){
          $basic_cnt=$minfo[0]["cnt"];
      }else{
          $random_cnt=$minfo[0]["cnt"];
      }
  }
}
else{
  $matches_data=explode("~",$matches);
  $best_cnt=$matches_data[0];
  $medium_cnt=$matches_data[1];
  $basic_cnt=$matches_data[2];
  $random_cnt=$matches_data[3];
}
$promo_start_date=$match_data[0]["start_time"];
$promo_end_date=$match_data[0]["end_time"];
$promo_st=explode(" ",$promo_start_date);
$promo_end=explode(" ",$promo_end_date);
$current_datetime=date("Y-m-d H:i:s");

$cdate_arry=explode(" ",$current_datetime);
$current_date=$cdate_arry[0];
$current_ts = strtotime($current_date);
$start_ts = strtotime($promo_st[0]);
$end_ts = strtotime($promo_end[0]);
$diff = $end_ts - $start_ts;
$no_of_days=round($diff / (60*60*24));
$pdiff=$end_ts-$current_ts;
$pdays=round($pdiff/(60*60*24));
$matches_percentage=floor(($pdays/$no_of_days)*100);
?>
<li class="ticket-item">
    <div class="insights-row">
        <div class="ticket-user wid50 col-sm-12">
            <img src="<?php echo base_url() . 'assets/images/BestMatch.png' ?>" class="user-avatar">
            <span class="user-name">BEST MATCH</span>
            <?php
            if($matches_percentage<60){
                echo '<span class="user-at">till</span><span class="user-company">';
                echo date('M d, Y',strtotime($current_date));
                //echo $current_date;
                echo '</span>';
            }
            ?>
            </span>
        </div>
        <div class="ticket-time  wid33">
            <div class="divider hidden-md hidden-sm hidden-xs"></div>
            <i class="fa fa-clock-o"></i>
            <span class="time"><?php echo $best_cnt;?> Target Covered</span>
        </div>
        <div class="ticket-type  col-lg-2">
            <span class="divider hidden-xs"></span>
            <span class="type">Not Applied</span>
        </div>
        <div class="ticket-state bg-palegreen">
            <i class="fa fa-check"></i>
        </div>
    </div>
</li>
<li class="ticket-item">
    <div class="insights-row">
        <div class="ticket-user wid50">
            <img src="<?php echo base_url() . 'assets/images/MediumMatch.png' ?>" class="user-avatar">
            <span class="user-name">MEDIUM MATCH</span>
            <?php
            if($matches_percentage>=61&&$matches_percentage<=80){
                echo '<span class="user-at">till</span><span class="user-company">';
                echo $current_date;
                echo "</span>";
            }
            ?>            
        </div>
        <div class="ticket-time  wid33">
            <div class="divider hidden-md hidden-sm hidden-xs"></div>
            <i class="fa fa-clock-o"></i>
            <span class="time"><?php echo $medium_cnt;?> Targets Covered</span>
        </div>
        <div class="ticket-type  col-lg-2">
            <span class="divider hidden-xs"></span>
            <span class="type">SKIPPED</span>
        </div>
        <div class="ticket-state bg-palegreen">
            <i class="fa fa-check"></i>
        </div>
    </div>
</li>
<li class="ticket-item">
    <div class="insights-row">
        <div class="ticket-user wid50 col-sm-12">
            <img src="<?php echo base_url() . 'assets/images/BasicMatch.png' ?>" class="user-avatar">
            <span class="user-name">BASIC MATCH</span>
            <?php
            if($matches_percentage>=81&&$matches_percentage<=90){
                echo '<span class="user-at">at</span><span class="user-company">';
                echo $current_date;
                echo '</span>';
            }
            ?>            
        </div>
        <div class="ticket-time  wid33">
            <div class="divider hidden-md hidden-sm hidden-xs"></div>
            <i class="fa fa-clock-o"></i>
            <span class="time"><?php echo $basic_cnt;?> Targets</span>
        </div>
        <div class="ticket-type  col-lg-2">
            <span class="divider hidden-xs"></span>
            <span class="type">SKIPPED</span>
        </div>
        <div class="ticket-state bg-darkorange">
            <i class="fa fa-times"></i>
        </div>
    </div>
</li>
<li class="ticket-item">
    <div class="insights-row">
        <div class="ticket-user wid50 col-sm-12">
            <img src="<?php echo base_url() . 'assets/images/RandomMatch.png' ?>" class="user-avatar">
            <span class="user-name">RANDOM</span>
            <?php
            if($matches_percentage>=91){
                echo '<span class="user-at">at</span><span class="user-company">';
                echo $current_date;
                echo '</span>';
            }
            ?>            
        </div>
        <div class="ticket-time  wid33">
            <div class="divider hidden-md hidden-sm hidden-xs"></div>
            <i class="fa fa-clock-o"></i>
            <span class="time"><?php echo $random_cnt;?> days Ago</span>
        </div>
        <div class="ticket-type  col-lg-2">
            <span class="divider hidden-xs"></span>
            <span class="type">Payment</span>
        </div>
        <div class="ticket-state bg-palegreen">
            <i class="fa fa-check"></i>
        </div>
    </div>
</li>
