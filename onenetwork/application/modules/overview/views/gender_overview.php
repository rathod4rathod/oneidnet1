<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/canvasjs.min.js"></script>
<div class="wid50">
    <input type="hidden" id="hgenderov_type" value="<?php echo $overview_type?>"/>
    <div class="insightbox insightbox-xxlg insightbox-vertical insightbox-shadowed bg-white radius-bordered padding-5">
        <div class="insightbox-top">
            <div class="insightbox-insights-row insights-row-12">
                <div class="insightbox-cell cell-3 text-center">
                    <div class="insightbox-number number-xxlg sonic-silver">Gender</div>
                    <div class="insightbox-text storm-cloud">chart</div>
                </div>
                <div class="insightbox-cell cell-9 text-align-center">
<!--                    <div class="insightbox-insights-row insights-row-6 text-left">
                        <span class="notify notify-palegreen notify-empty margin-left-5"></span>
                        <span class="insightbox-inlinetext uppercase darkgray margin-left-5">NEW</span>
                        <span class="notify notify-yellow notify-empty margin-left-5"></span>
                        <span class="insightbox-inlinetext uppercase darkgray margin-left-5">RETURNING</span>
                    </div>
                    <div class="insightbox-insights-row insights-row-6">
                        <div class="progress bg-yellow progress-no-radius">
                            <div class="progress-bar progress-bar-palegreen" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 78%">
                            </div>
                        </div>
                    </div>-->
                </div>
            </div>
        </div>
        <div class="insightbox-bottom">
            <div class="insightbox-insights-row insights-row-12" id="genderChart">
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    var gentity_id=<?php echo $entity_id?>;
    var genov_type=$("#hgenderov_type").val();
    var gen_req_data="promo_id="+gentity_id;
    if(genov_type=="GMA"){
        gen_req_data="campaign_id="+gentity_id;
    }
    //alert(gen_req_data+"---->"+genov_type);
    $.getJSON(onenetwork_url+"overview/genderChart",gen_req_data,function (result) {
            var gchart = new CanvasJS.Chart("genderChart", {
                width:300,
                data: [
                    {
                        type:"doughnut",
                        toolTipContent:"{legendText}: {y}",
                        startAngle: 60,
                        showInLegend: true,
                        dataPoints: result
                    }
                ]
            });
            gchart.render();
        });
</script>