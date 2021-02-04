<?php
if($prData!=0){
  //print_r($prData);
  $campaign_url=base_url()."campaignDV?promo_id=".base64_encode(base64_encode($stats_data[0]["promo_code"]));
  $promo_id=base64_encode(base64_encode($stats_data[0]["promo_code"]));
  $xceldownload_url=base_url().'overview/generateExcel?promo_id='.$promo_id;
  $pdfdownload_url=base_url().'overview/downloadPDF?promo_id='.$promo_id;
  $startDate = explode(" ",$prData[0]['promotion_start_time']);
  $endDate = explode(" ",$prData[0]['promotion_end_time']);
  $start_time=strtotime($startDate[0]);
  $end_time=strtotime($endDate[0]);
  $today_date=date("Y-m-d");
  $today_time = strtotime($today_date);
  //echo $today_time."--->".$end_time."--->".$start_time;
  if($start_time>$today_time && $today_time<$end_time){
    $remaingDays=floor(($end_time-$today_time)/(60*60*24));
    $no_of_days=$end_time-$start_time;
    $past_days=$today_time-$start_time;
    $percentage=($past_days/$no_of_days)*100;
  }else{
    $remaingDays=0;
    $percentage=0;
  }
}else{
    $startDate = explode(" ",$campaign_details[0]['start_date']);
    $endDate = explode(" ",$campaign_details[0]['end_date']);
    $start_time=strtotime($startDate[0]);
    $end_time=strtotime($endDate[0]);
    $today_time = time();
    //echo $campaign_details[0]['start_date']."->".$campaign_details[0]['end_date'];
    //echo $start_time."->".$end_time."->".$today_time;
    if($start_time<$today_time && $today_time<$end_time){
      $remaingDays=floor(($end_time-$today_time)/(60*60*24));
      $no_of_days=$end_time-$start_time;
      $past_days=$today_time-$start_time;
      $percentage=($past_days/$no_of_days)*100;
    }else{
        $remaingDays=0;
        $percentage=0;
    }
    $xceldownload_url=base_url().'overview/generateExcel?campaign_id='.$campaign_details[0]["rec_aid"];
    $pdfdownload_url=base_url().'overview/downloadPDF?campaign_id='.$campaign_details[0]["rec_aid"];
    /*$remaingDays = $endDate->diff($today)->days;
    $totalDiff = $endDate->diff($startDate)->days;
    $startDiff = $startDate->diff($today)->days;
    $percentage = ($startDiff / $totalDiff) * 100;
     */
}
?>
<div class="wid100">
    <div class="dashboard-box">
        <div class="box-header">
            <div class="deadline">
                Remaining Days: <?php echo $remaingDays; ?>
            </div>
        </div>
        <div class="box-progress">
            <div class="progress-handle" style="left: -webkit-calc(<?php echo $percentage; ?>% - 35px); left: -moz-calc(<?php echo $percentage; ?>% - 35px);left: calc(<?php echo $percentage; ?>% - 35px);">Day <?php echo floor(($past_days)/(60*60*24)); ?></div>
            <div class="progress progress-xs progress-no-radius bg-whitesmoke">
                <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $percentage; ?>%">
                </div>
            </div>
        </div>
        <div class="box-tabbs">
            <div class="tabbable">
                <div class="tab-content tabs-flat no-padding">
                    <div id="sales" class="tab-pane animated fadeInUp no-padding-bottom" style="padding:20px 20px 0 20px; display:block;">
                        <div class="insights-row">
                            <div class="wid25">
                                <div class="insightbox insightbox-xlg insightbox-vertical insightbox-inverted insightbox-shadowed">
                                    <div class="insightbox-top">
                                        <div class="insightbox-sparkline">
                                            <span data-sparkline="line" data-height="125px" data-width="100%" data-fillcolor="false" data-linecolor="colorsecondary" data-spotcolor="#fafafa" data-minspotcolor="#fafafa" data-maxspotcolor="#ffce55" data-highlightspotcolor="#ffce55" data-highlightlinecolor="#ffce55" data-linewidth="1.5" data-spotradius="2"><canvas style="display: inline-block; width: 100px; height: 125px; vertical-align: top;" width="100" height="125"></canvas></span>
                                        </div>
                                    </div>
                                    <div class="insightbox-bottom no-padding text-align-center">
                                        <span class="insightbox-number lightcarbon no-margin"><?php echo $stats_data[0]["total_clicks"];?></span>
                                        <span class="insightbox-text lightcarbon no-margin">Total Clicks</span>

                                    </div>
                                </div>

                            </div>
                            <div class="wid25">
                                <div class="insightbox insightbox-xlg insightbox-vertical insightbox-inverted insightbox-shadowed">
                                    <div class="insightbox-top">
                                        <div class="insightbox-sparkline">
                                            <span data-sparkline="line" data-height="125px" data-width="100%" data-fillcolor="false" data-linecolor="colorfourthcolor" data-spotcolor="#fafafa" data-minspotcolor="#fafafa" data-maxspotcolor="#8cc474" data-highlightspotcolor="#8cc474" data-highlightlinecolor="#8cc474" data-linewidth="1.5" data-spotradius="2"><canvas style="display: inline-block; width: 100px; height: 125px; vertical-align: top;" width="100" height="125"></canvas></span>
                                        </div>
                                    </div>
                                    <div class="insightbox-bottom no-padding text-align-center">
                                        <span class="insightbox-number lightcarbon no-margin"><?php echo $stats_data[0]["total_views"];?></span>
                                        <span class="insightbox-text lightcarbon no-margin">Total Views</span>

                                    </div>
                                </div>

                            </div>
                            <div class="wid25">
                                <div class="insightbox insightbox-xlg insightbox-vertical insightbox-inverted insightbox-shadowed">
                                    <div class="insightbox-top">
                                        <div class="insightbox-piechart">
                                            <div data-toggle="insightPieChart" class="insightPieChart block-center" data-barcolor="colorprimary" data-linecap="butt" data-percent="80" data-animate="500" data-linewidth="8" data-size="125" data-trackcolor="#eee" style="width: 125px; height: 125px; line-height: 125px;">
                                                <span class="font-200"><i class="fa fa-gift colorprimary"></i></span>
                                                <canvas width="125" height="125"></canvas></div>
                                        </div>
                                    </div>
                                    <div class="insightbox-bottom no-padding text-align-center">
                                        <span class="insightbox-number lightcarbon no-margin"><?php echo $stats_data[0]["total_close"];?></span>
                                        <span class="insightbox-text lightcarbon no-margin">Close Factor</span>

                                    </div>
                                </div>
                            </div>
                            <div class="wid25">
                                <div class="insightbox insightbox-xlg insightbox-vertical insightbox-inverted  insightbox-shadowed">
                                    <div class="insightbox-top">
                                        <div class="insightbox-piechart">
                                            <div data-toggle="insightPieChart" class="insightPieChart block-center" data-barcolor="colorthirdcolor" data-linecap="butt" data-percent="40" data-animate="500" data-linewidth="8" data-size="125" data-trackcolor="#eee" style="width: 125px; height: 125px; line-height: 125px;">
                                                <span class="white font-200"><i class="fa fa-tags colorthirdcolor"></i></span>
                                                <canvas width="125" height="125"></canvas></div>
                                        </div>
                                    </div>
                                    <div class="insightbox-bottom no-padding text-align-center">
                                        <span class="insightbox-number lightcarbon no-margin">11</span>
                                        <span class="insightbox-text lightcarbon no-margin">NEW TICKETS</span>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="box-visits">
            <div class="insights-row">
                <div class="wid33">
                    <div class="notification">
                        <div class="clearfix">
                            <div class="notification-icon">
                                <i class="fa fa-gift palegreen bordered-1 bordered-palegreen"></i>
                            </div>
                            <div class="notification-body">
                                <span class="title"><a href="<?php echo $campaign_url;?>">Campaign Details</a></span>
                                <span class="description">08:30 pm</span>
                            </div>
                            <div class="notification-extra">
                                <i class="fa fa-calendar palegreen"></i>
                                <i class="fa fa-clock-o palegreen"></i>
                                <span class="description">at home</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="wid33">
                    <div class="notification">
                        <div class="clearfix">
                            <div class="notification-icon">
                                <i class="fa fa-check azure bordered-1 bordered-azure"></i>
                            </div>
                            <div class="notification-body">
                                <span class="title">Download Promotion Report</span>
                                <span class="description"><a href='<?php echo $pdfdownload_url?>' id="report_pdf">PDF</a> | <a href='<?php echo $xceldownload_url; ?>'>EXCEL</a> </span>
                            </div>
                            <div class="notification-extra">
                                <i class="fa fa-clock-o azure"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="wid33">
                    <div class="notification">
                        <div class="clearfix">
                            <div class="notification-icon">
                                <i class="fa fa-phone bordered-1 bordered-orange orange"></i>
                            </div>
                            <div class="notification-body">
                                <span class="title">Report Updated On</span>
                                <span class="description" style="font-weight: bold;font-size:12px;">01:00 pm</span>
                            </div>
                            <div class="notification-extra">
                                <i class="fa fa-clock-o orange"></i>
                                <span class="description">office</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
