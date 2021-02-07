<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/canvasjs.min.js"></script>
<input type="hidden" id="hpintov_type" value="<?php echo $overview_type?>"/>
<div class="wid50">
    <div class="insightbox insightbox-xxlg insightbox-vertical insightbox-inverted">
        <div class="insightbox-top bg-whitesmoke no-padding">
            <div class="insightbox-insights-row insights-row-2 bg-orange no-padding">
                <div class="insightbox-cell cell-1 text-align-center no-padding padding-top-5">
                    <span class="insightbox-number white"><i class="fa fa-bar-chart-o no-margin"></i></span>
                </div>
                <div class="insightbox-cell cell-8 no-padding padding-top-5 text-align-left">
                    <span class="insightbox-number white">PAGE INTERESTS GRAPH</span>
                </div>
                <div class="insightbox-cell cell-3 text-align-right padding-10">
<!--                    <span class="insightbox-text white">13 DECEMBER</span>-->
                </div>
            </div>
            <div class="insightbox-insights-row insights-row-6 no-padding bg-azure" id="pagesChart">
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    var page_result=[];  
    var pintov_type=$("#hpintov_type").val();
    var pentity_id=<?php echo $entity_id?>;
    var page_req_data="promo_id="+pentity_id;
    if(pintov_type=="GMA"){
        page_req_data="campaign_id="+pentity_id;
    }
    $.getJSON(onenetwork_url+"overview/getPagesChart",page_req_data, function (datas) {
        chartsuccess(datas);
        var colchart = new CanvasJS.Chart("pagesChart", {
            axisX:{
                gridColor: "Silver",
                tickColor: "silver",
                valueFormatString: "DD/MMM"
            },
            data: page_result
        });
        colchart.render();
        function chartsuccess(datas){
            var i,j, key,
              keys = [],
              dataSeriesMapping = {};
            for(i = 0; i< datas.length; i++){
                if(datas[i].activity_date){
                    keys = Object.keys(datas[i]);
                    //alert(keys);
                    for(j = 0; j< keys.length; j++){
                        if(keys[j] === "activity_date")
                        continue;
                        key = keys[j];
                        //alert(key);
                        if(typeof(dataSeriesMapping[key]) === "undefined")
                        {
                          page_result.push({
                            name : key,
                            type: "line",
                            showInLegend: true,
                            lineThickness:2,
                            dataPoints : []
                          });
                          dataSeriesMapping[key] = page_result.length-1;
                        }
                        //alert(new Date(datas[i].activity_date)+"-"+datas[i][key]);
                        var activity_dte=datas[i].activity_date;
                        var pattern=/(\d{4})\-(\d{2})\-(\d{2})/;
                        var rep_date=activity_dte.replace(pattern,'$1,$2,$3');
                        page_result[dataSeriesMapping[key]].dataPoints.push({x :new Date(rep_date), y: datas[i][key]});
                    }
                }
            }
        }
    });   
</script>