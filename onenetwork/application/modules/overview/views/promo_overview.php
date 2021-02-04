<?php
$this->load->module('templates');
$this->templates->header();
$this->templates->onenet_header("promotions");
?>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/overview.css"> 
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/font-awesome.min.css"> 
<div class="clr">&nbsp;</div>
<input type="hidden" id="hpromotion_id" value="<?php echo $promo_id?>"/>
<div class="new_wrapper">
    <div class="master-division">
        <div class="insights-body">
            <div class="insights-row">
                <div class="wid100">                    
                    <?php
                        $this->load->module("overview");
                        $this->overview->promotion_targets($promo_id);                        
                    ?>                    
                </div>
            </div>
            <div class="insights-row">
                <div class="wid75">
                    <div class="insights-row">
                        <?php
                            $this->load->module("overview");
                            $this->overview->today_stats($promo_id);
                        ?>
                    </div>
                </div>
                <div class="wid25">
                    <div class="orders-container">
                        <div class="orders-header">
                            <h6>AUDIENCE VISITORS STATS</h6>
                        </div>
                        <div style="height:350px;overflow-y: scroll;width:100%" id="audience_visitors_div">
                          <ul class="orders-list" id="audience_visitors_data">
                            <?php
                                $this->load->module("overview");
                                $this->overview->audience_visitors($promo_id);
                            ?>
                          </ul>
                            <span id="audience_load_result" style="display:none;">Loading...</span>
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
                            <span class="tasks-caption colorprimary">Other Promotions Board</span>
                        </div><!--tasks Header-->
                        <div class="tasks-body no-padding">
                            <div class="task-container">
                                <div class="task-search">
                                    <span class="input-icon">
                                        <input type="text" class="insights-search-input" placeholder="Search Other Promotions" name="search_promotion" id="search_promotion">
                                        <input type="hidden" name="base_url" id="base_url" value="<?php echo base_url();?>">
                                        <i class="fa fa-search gray"></i>
                                    </span>
                                </div>
                                <div style="height:450px;overflow-y: scroll;" id="other_promos_div">
                                  <ul class="tasks-list">
                                      <span id="other_prom_search_check">
                                    <?php
                                        $this->overview->other_promotions($promo_id);
                                    ?>
                                      </span>
                                  </ul>
                                    <span id="promos_load_result" style="display:none;">Loading...</span>
                                </div>
                            </div>
                        </div><!--tasks Body-->
                    </div>

                </div>
                <div class="wid66">
                    <div class="insights-row">
                        <?php
                        $this->overview->promo_insight($promo_id);
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
                                            $this->overview->match_overview($promo_id);
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
                    $this->overview->page_views($promo_id);
                    $this->overview->age_view($promo_id);
                ?> 
            </div>
            <div class="insights-row">                
                <?php
                    $this->load->module("overview");
                    $this->overview->interests_views($promo_id);
                    $this->overview->gender_view($promo_id);
                ?>               
            </div>
            <div class="insights-row">                
                <?php
                    $this->load->module("overview");
                    $this->overview->interests_pages_views($promo_id);
                    $this->overview->marital_view($promo_id);
                ?>               
            </div>
            <div class="insights-row">
<!--                <div class="wid50">-->
                    <?php
                    $this->overview->status_overview($promo_id);
                    ?>
                <!--</div>-->

                <!--<div class="wid50">-->
                    
                <!--</div>-->
            </div>
        </div>
        <!-- /Page Body -->
    </div>

</div>
<script src="<?php echo base_url() . "assets/js/campaigns.js" ?>"></script>

<?php
$this->templates->footer();
?>
<style type="text/css">
  #promos_load_result{
    text-align: center;
    font-weight:bold;
  }
</style>
