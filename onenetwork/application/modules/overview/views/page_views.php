<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/canvasjs.min.js"></script>
<input type="hidden" id="overview_type" value="<?php echo $overview_type?>"/>
<div class="wid50">
    <div class="insightbox insightbox-xxlg insightbox-vertical insightbox-inverted">
        <div class="insightbox-top bg-whitesmoke no-padding">
            <div class="insightbox-insights-row insights-row-2 bg-orange no-padding">
                <div class="insightbox-cell cell-1 text-align-center no-padding padding-top-5">
                    <span class="insightbox-number white"><i class="fa fa-bar-chart-o no-margin"></i></span>
                </div>
                <div class="insightbox-cell cell-8 no-padding padding-top-5 text-align-left">
                    <span class="insightbox-number white">Language Nationality Chart</span>
                </div>
                <div class="insightbox-cell cell-3 text-align-right padding-10">
<!--                    <span class="insightbox-text white">13 DECEMBER</span>-->
                </div>
            </div>
<!--            <div class="insightbox-insights-row insights-row-4 bg-white">
                <div class="insightbox-cell cell-6 no-padding padding-10 padding-left-20 text-align-left">
                    <span class="insightbox-number orange no-margin">534,908</span>
                    <span class="insightbox-text sky no-margin">OVERAL VIEWS</span>
                </div>
                <div class="insightbox-cell cell-2 no-padding padding-10 text-align-left">
                    <span class="insightbox-number orange no-margin">4,129</span>
                    <span class="insightbox-text darkgray no-margin">THIS WEEK</span>
                </div>
                <div class="insightbox-cell cell-2 no-padding padding-10 text-align-left">
                    <span class="insightbox-number orange no-margin">329</span>
                    <span class="insightbox-text darkgray no-margin">YESTERDAY</span>
                </div>
                <div class="insightbox-cell cell-2 no-padding padding-10 text-align-left">
                    <span class="insightbox-number orange no-margin">104</span>
                    <span class="insightbox-text darkgray no-margin">TODAY</span>
                </div>
            </div>-->
            <div class="insightbox-insights-row insights-row-6 no-padding bg-azure" id="langsChart">
                <!--<img draggable="false" src="<?php echo base_url() . 'assets/images/2.png' ?>" class="insightbox-sparkline" />-->
            </div>
        </div>
<!--        <div class="insightbox-bottom bg-sky no-padding">
            <div class="insightbox-cell cell-2 text-align-center no-padding padding-top-5">
                <span class="insightbox-header white">Mon</span>
            </div>
            <div class="insightbox-cell cell-2 text-align-center no-padding padding-top-5">
                <span class="insightbox-header white">Tues</span>
            </div>
            <div class="insightbox-cell cell-2 text-align-center no-padding padding-top-5">
                <span class="insightbox-header white">Wed</span>
            </div>
            <div class="insightbox-cell cell-2 text-align-center no-padding padding-top-5">
                <span class="insightbox-header white">Thu</span>
            </div>
            <div class="insightbox-cell cell-2 text-align-center no-padding padding-top-5">
                <span class="insightbox-header white">Fri</span>
            </div>
            <div class="insightbox-cell cell-2 text-align-center no-padding padding-top-5">
                <span class="insightbox-header white">Sat</span>
            </div>
        </div>-->
    </div>
</div>
<script type="text/javascript">
    var lang_result=[];    
    var opage_url=onenetwork_url+"overview/getChartLang";
    var overview_type=$("#overview_type").val();
    var entity_id=<?php echo $entity_id?>;
    var request_data="promo_id="+entity_id;
    if(overview_type=="GMA"){
        opage_url=onenetwork_url+"overview/getGMAChartLang";
        request_data="campaign_id="+entity_id;
    }    
    $.getJSON(opage_url,request_data, function (datas) {        
        chartsuccess(datas);
        var columnchart = new CanvasJS.Chart("langsChart", {
            axisX:{
                gridColor: "Silver",
                tickColor: "silver",
                valueFormatString: "DD/MMM"
            },
            data: lang_result
        });
        columnchart.render();
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
                          lang_result.push({
                            name : key,
                            type: "line",
                            showInLegend: true,
                            lineThickness:2,
                            dataPoints : []
                          });
                          dataSeriesMapping[key] = lang_result.length-1;
                        }
                        //alert(new Date(datas[i].activity_date)+"-"+datas[i][key]);
                        var activity_dte=datas[i].activity_date;
                        var pattern=/(\d{4})\-(\d{2})\-(\d{2})/;
                        var rep_date=activity_dte.replace(pattern,'$1,$2,$3');
                        lang_result[dataSeriesMapping[key]].dataPoints.push({x :new Date(rep_date), y: datas[i][key]});
                    }
                }
            }
        }
    });   
</script>