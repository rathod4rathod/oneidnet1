<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/canvasjs.min.js"></script>
<input type="hidden" id="hmaritalov_type" value="<?php echo $overview_type?>"/>
<div class="wid50">
    <div class="insightbox insightbox-xxlg insightbox-vertical insightbox-shadowed bg-white radius-bordered padding-5">
        <div class="insightbox-top">
            <div class="insightbox-insights-row insights-row-12">
                <div class="insightbox-cell cell-3 text-center">
                    <div class="insightbox-number number-xxlg sonic-silver">Marital</div>
                    <div class="insightbox-text storm-cloud">Chart</div>
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
            <div class="insightbox-insights-row insights-row-12" id="maritalChart">
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    var mentity_id=<?php echo $entity_id?>;
    var marital_overview_type=$("#hmaritalov_type").val();
    var marital_req_data="promo_id="+mentity_id;
    if(marital_overview_type=="GMA"){
        marital_req_data="campaign_id="+mentity_id;
    }
    $.getJSON(onenetwork_url+"overview/maritalChart",marital_req_data,function (result) {
            var mchart = new CanvasJS.Chart("maritalChart", {
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
            mchart.render();
        });
</script>