<?php
$this->load->module('templates');
$this->templates->header();
$this->templates->onenet_header("promotions");
?>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/overview.css"> 
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/font-awesome.min.css"> 
<div class="clr">&nbsp;</div>
<input type="hidden" id="hgma_id" value="<?php echo $campaign_id?>"/>
<div class="new_wrapper">
    <div class="master-division">
        <div class="insights-body">
            <div class="insights-row">
                <div class="wid100">                    
                    <?php
                        $this->load->module("overview");
                        $this->overview->campaign_targets($campaign_id);                        
                    ?>                    
                </div>
            </div>
            <div class="insights-row">
                <div class="wid75">
                    <div class="insights-row">
                        <?php
                            $this->load->module("overview");
                            $this->overview->gma_today_stats($campaign_id);
                        ?>
                    </div>
                </div>
                <div class="wid25">
                    <div class="orders-container">
                        <div class="orders-header">
                            <h6>AUDIENCE VISITORS STATS</h6>
                        </div>
                        <div style="height:350px;overflow-y: scroll;width:100%" id="gma_audience_visitors_div">
                          <ul class="orders-list" id="audience_visitors_data">
                              <?php
                                  $this->load->module("overview");
                                  $this->overview->gma_audience_visitors($campaign_id);
                              ?>
                          </ul>
                            <span id="gma_audience_load_result" style="display:none;">Loading...</span>
                        </div>
<!--                        <div class="orders-footer">
                            <a class="show-all" href=""><i class="fa fa-angle-down"></i> Show All</a>
                            <div class="help">
                                <a href=""><i class="fa fa-question"></i></a>
                            </div>
                        </div>-->
                    </div>
                </div>
            </div>
            <div class="insights-row">
                <div class="wid33">
                    <div class="tasks">
                        <div class="tasks-header bordered-bottom bordered-colorprimary">
                            <i class="tasks-icon fa fa-tasks colorprimary"></i>
                            <span class="tasks-caption colorprimary">Other Campaigns Board</span>
                        </div><!--tasks Header-->
                        <div class="tasks-body no-padding">
                            <div class="task-container">
                                <div class="task-search">
                                    <span class="input-icon">
                                        <input type="text" class="insights-search-input" placeholder="Search Tasks" name="search_promotion" id="search_promotion">
                                        <input type="hidden" name="base_url" id="base_url" value="<?php echo base_url();?>">
                                        <i class="fa fa-search gray"></i>
                                    </span>
                                </div>
                                <div style="height:450px;overflow-y: scroll;" id="other_campaigns_div">
                                <ul class="tasks-list" id="gma_other_campaigns">
                                    <?php
                                        $this->overview->other_campaigns($campaign_id);
                                    ?>
                                </ul>
                                <span id="load_other_campaigns"></span>
                                </div>
                            </div>
                        </div><!--tasks Body-->
                    </div>

                </div>
                <div class="wid66">
                    <div class="insights-row">
                        <?php
                        $this->overview->campaign_insight($campaign_id);
                        ?>
                    </div>
                    <div class="insights-row">
                        <div class="wid100">
                            <div class="tasks">
                                <div class="tasks-header bordered-bottom bordered-colorsecondary">
                                    <i class="tasks-icon fa fa-tags colorsecondary"></i>
                                    <span class="tasks-caption colorsecondary">Promotion Target Strategies Roadmap</span>
                                </div><!--tasks Header-->
                                <div class="tasks-body  no-padding">
                                    <div class="tickets-container">
                                        <ul class="tickets-list">
                                            <?php
                                            $this->overview->match_overview($campaign_id,"GMA");
                                            ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="insights-row">
                <?php
                    $this->load->module("overview");
                    $this->overview->page_views($campaign_id,"GMA");
                    $this->overview->age_view($campaign_id,"GMA");
                ?> 
            </div>
            <div class="insights-row">                
                <?php
                    $this->load->module("overview");
                    $this->overview->interests_views($campaign_id,"GMA");
                    $this->overview->gender_view($campaign_id,"GMA");
                ?>               
            </div
            <div class="insights-row">                
                <?php
                    $this->load->module("overview");
                    $this->overview->interests_pages_views($campaign_id,"GMA");
                    $this->overview->marital_view($campaign_id,"GMA");
                ?>               
            </div>
            <div class="insights-row">
                <?php
                $this->overview->status_overview($campaign_id,"GMA");
                ?>                
            </div>
        </div>
        <!-- /Page Body -->
    </div>

</div>

<?php
$this->templates->footer();
?>
<script type="text/javascript">
  var gma_start=0;
  var gma_other_start=0;
  $('#gma_audience_visitors_div').scroll(function() {
    var gma_audience_cnt=$("#haudience_cnt").val();
    //alert(gma_audience_cnt);
    if(($(this).scrollTop() + $(this).innerHeight() >= $(this)[0].scrollHeight)&&(gma_start<gma_audience_cnt)) {
       gma_start+=6;
       loadGmaAudiResults(gma_start);
       if(gma_start>gma_audience_cnt){
           $("#gma_audience_load_result").css("display","block").html("No more data");
       }
    }
  });
  function loadGmaAudiResults(limitStart) {
      $("#gma_audience_load_result").show();
      var gma_audience_cnt=$("#haudience_cnt").val();
      var result_url=onenetwork_url+"overview/gma_audience_visitors/"+$("#hgma_id").val();
      callAJAX(result_url,{limit: gma_start},function(data){
        //alert(data);
          $("#audience_visitors_data").append(data);
          if(gma_start<gma_audience_cnt){
              $("#gma_audience_load_result").hide();
          }
      });
  }
  $('#other_campaigns_div').scroll(function() {
      var gma_audience_cnt=$("#hcampaigns_cnt").val();
      //alert(gma_audience_cnt);
      if(($(this).scrollTop() + $(this).innerHeight() >= $(this)[0].scrollHeight)&&(gma_other_start<gma_audience_cnt)) {
         gma_other_start+=4;
         loadGmaOtherCampaigns(gma_other_start);
         if(gma_other_start>gma_audience_cnt){
             $("#load_other_campaigns").css("display","block").html("No more data");
         }
      }
  });
  function loadGmaOtherCampaigns(limitStart) {
      $("#gma_audience_load_result").show();
      var gma_audience_cnt=$("#hcampaigns_cnt").val();
      var search_trm=$("#search_campaigns").val();
      var result_url=onenetwork_url+"overview/other_campaigns/"+$("#hgma_id").val();
      callAJAX(result_url,{limit: gma_other_start,search_term:search_trm},function(data){
        //alert(data);
          $("#gma_other_campaigns").append(data);
          if(gma_other_start<gma_audience_cnt){
              $("#load_other_campaigns").hide();
          }
      });
  }
  $("#search_campaigns").keypress(function(event){
      var key=event.keyCode;
      var search_trm=$(this).val();
      if(key==13){
          var promos_cnt=$("#hcampaigns_cnt").val();
          var result_url=onenetwork_url+"overview/other_campaigns/"+$("#hgma_id").val();
          callAJAX(result_url,{limit: gma_other_start,search_term:search_trm},function(data){
              $("#gma_other_campaigns").html(data);
              if(gma_other_start<promos_cnt){
                  $("#load_other_campaigns").hide();
              }
          });
      }
  });
  $(".fa-search").click(function(){
    var search_term=$("#search_campaigns").val();
    var promos_cnt=$("#hcampaigns_cnt").val();
    var result_url=onenetwork_url+"overview/other_campaigns/"+$("#hgma_id").val();
    callAJAX(result_url,{limit: gma_other_start,search_term:search_term},function(data){
      $("#gma_other_campaigns").html(data);
      if(gma_other_start<promos_cnt){
          $("#load_other_campaigns").hide();
      }
    });
  });
</script>