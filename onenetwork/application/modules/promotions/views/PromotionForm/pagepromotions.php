<?php
$this->load->module('templates');
$this->templates->header();
?>
<div class="click_popUp" id="os_popup">
</div>
<?php
$this->templates->onenet_header("promotions");
?>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/jquery-ui.css"> 
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery-ui.js"></script>
<div class="clr">&nbsp;</div>
<div class="new_wrapper">
    <div class="ondes_wrapper_main">
        <div class="ondes_module_container_wrap">
            <!--module_container start here-->
            <div class="ondes_wrapper_inner minheight600">
                <!--wrapper inner start here-->
                <div class="oneshop_getstarted">
                    <input type="hidden" id="promo_id" value=""/>
                    <input type="hidden" id="audience_aid" value=""/>
                    <div class="oneshop_getstarted_bgwrap mab30" style="position:relative;">
                        <?php 
                           /*$proobj = $this->load->module("promotions");
                        switch ($promotion_type) {
                            case "Click_page":
                                $proobj->clickPagePromotionformheader();
                                break;
                            case "Click_group":
                                $proobj->clickGroupPromotionformheader();
                                break;
                            case "Click_event":
                                $proobj->clickEventPromotionformheader();
                                break;
                            default:
                                $proobj->defaultHeader();
                                break;
                        }*/
                        $this->load->module("generic");
                        $this->generic->breadcrumbs($promotion_type,$module_url);
                        ?>

                        <div id="formsection">

                        </div> 
                    </div>

                </div>
            </div>
        </div>
        <!--wrapper inner closed here-->

    </div>
    <!--module container end here-->
</div>
<!--wrapper main closed here-->


<?php

$this->templates->right_container();
?>
</div>

<div class="clr"></div>
<!--footer start here-->
<?php
$this->templates->footer();
?>

<!--footer closed here-->
<script type="text/javascript">
    $(document).ready(function () {
        $.get("<?php echo base_url();?>generic/genericBasicForm/<?php echo $promotion_type;?>",function (data) {
            $("#formsection").html(data);
        });
    });
</script>
