<?php
//print_r($insight_data);
$click_factor=floor(($insight_data[0]["total_clicks"]/$insight_data[0]["total_views"])*100);
$close_factor=floor(($insight_data[0]["total_close"]/$insight_data[0]["total_views"])*100);
$views_factor=floor(($click_factor*$close_factor)/100);
?>
<div class="wid33">
    <div class="insightbox insightbox-lg insightbox-inverted radius-bordered insightbox-shadowed insightbox-graded insightbox-vertical">
        <div class="insightbox-top bg-palegreen no-padding">
            <img draggable="false" src="<?php echo base_url() . 'assets/images/4.png' ?>" width="100%" height="100%" />
        </div>
        <div class="insightbox-bottom no-padding">
            <div class="insightbox-insights-row">
                <div class="insightbox-cell cell-6 text-align-left">
                    <span class="insightbox-text">Total Clicks</span>
                    <span class="insightbox-number"><?php if($insight_data[0]["total_clicks"]!=0){echo $insight_data[0]["total_clicks"];}else{echo "0";}?></span>
                </div>
                <div class="insightbox-cell cell-6 text-align-right">
                    <span class="insightbox-text">Click Factor</span>
                    <span class="insightbox-number font-70"><?php echo $click_factor;?>%</span>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="wid33">
    <div class="insightbox insightbox-lg insightbox-inverted radius-bordered insightbox-shadowed insightbox-graded insightbox-vertical">
        <div class="insightbox-top bg-orange no-padding">
            <img draggable="false" src="<?php echo base_url() . 'assets/images/3.png' ?>" width="100%" height="100%" />
        </div>
        <div class="insightbox-bottom no-padding">
            <div class="insightbox-insights-row">
                <div class="insightbox-cell cell-6 text-align-left">
                    <span class="insightbox-text">Total Close</span>
                    <span class="insightbox-number"><?php if($insight_data[0]["total_close"]!=0){echo $insight_data[0]["total_close"];}else{echo "0";}?></span>
                </div>
                <div class="insightbox-cell cell-6 text-align-right">
                    <span class="insightbox-text">Close Factor</span>
                    <span class="insightbox-number font-70"><?php echo $close_factor;?>%</span>
                </div>
            </div>
        </div>
    </div>

</div>
<div class="wid33">
    <div class="insightbox insightbox-lg insightbox-inverted radius-bordered insightbox-shadowed insightbox-graded insightbox-vertical">
        <div class="insightbox-top bg-azure no-padding">
            <img draggable="false" src="<?php echo base_url() . 'assets/images/5.png' ?>" width="100%" height="100%" />
        </div>
        <div class="insightbox-bottom no-padding">
            <div class="insightbox-insights-row">
                <div class="insightbox-cell cell-6 text-align-left">
                    <span class="insightbox-text">Total Views</span>
                    <span class="insightbox-number"><?php if($insight_data[0]["total_views"]!=0){echo $insight_data[0]["total_views"];}else{echo "0";}?></span>
                </div>
                <div class="insightbox-cell cell-6 text-align-right">
                    <span class="insightbox-text">Impression</span>
                    <span class="insightbox-number font-70"><?php echo $views_factor?>%</span>
                </div>
            </div>
        </div>
    </div>

</div>