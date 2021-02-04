<?php
$prm = "";
$this->load->module('templates');
$this->templates->header();
$this->templates->onenet_header();
$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
$oneshop_url = $protocol . $_SERVER['HTTP_HOST'] . '/oneshop/create_store';
if ($type) {
    $oneshop_url = $protocol . $_SERVER['HTTP_HOST'] . '/oneshop/packages/upgradePackage';
    $prm = "/" . $type . "/" . $str;
}
?>
<div class="new_wrapper">
    <div class="ondes_wrapper_main">
        <div class="ondes_module_container_wrap">
            <!--module_container start here-->
            <div class="ondes_wrapper_inner minheight600">
                <!--wrapper inner start here-->
                <div class="oneshop_getstarted mat30">
                    <div class="oneshop_getstarted_bgwrap mat40 mab30" style="position:relative; margin-top:-5%;">
                        <h1 class="acenter normal fs24" style="width:700px; border-bottom:1px #ccc solid; padding:0 0 10px 0; margin:30px auto; line-height:32px;"> COFFICE PACKAGES </h1>
                        <div class="boxesnewleft_wrap">
                            <div style="margin-top:40px;" class="pricing-wrapper clearfix">

                                <?php // echo "<pre>";print_R($copackages[0]);echo "</pre>"; ?>
                                <?php
                                if ($copackages != 0) {
                                    foreach ($copackages as $copackagesinfo) {
                                        ?>
                                        <div class="pricing-table">
                                            <h3 class="pricing-title vertical-text"  style="background-color:#09F;"> <br>
                                                <?php echo $copackagesinfo["package_name"]; ?> </h3>
                                            <div class="price">
                                                <p><?php echo current(explode(" ", $copackagesinfo["package_name"])); ?> <br>
                                                    <sup> <?PHP echo "$ " . $copackagesinfo["price"] . " / month "; ?></sup></p></div>                        
                                            <ul class="table-list">
                                                <li>virtualization <b><?php echo $copackagesinfo["virtualization"]; ?></b> </li>                                        
                                                <li><span class="blue"><b>Price Breakups</b></span></li>
                                                <li><span>CV download &nbsp; : </span><?php echo $copackagesinfo["cv_download"]; ?></li>
                                                <li><span>admin &nbsp; : </span><?php echo $copackagesinfo["admin"]; ?></li>
                                                <li> <span>HR &nbsp; : </span><?php echo $copackagesinfo["hr"]; ?></li>
                                                <li> <span>CV Search &nbsp;: </span><?php echo $copackagesinfo["search_tool"]; ?></li>
                                                <li> <span>Total Interview Requests &nbsp; : </span><?php echo $copackagesinfo["total_request_for_interview"]; ?></li>                                        
                                            </ul>
                                            <div class="table-buy"> 
                                                <a  class="pricing-action oneshopdev_plan pckid" pckid="<?php echo $copackagesinfo["package_id"]; ?>" class="pricing-action">Select Plan</a> </div>
                                        </div>         
                                        <?php
                                    }
                                }
                                ?>

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
<?php
$this->templates->footer();
?>
<script>
    $(document).on("click",".pckid",function(){
       window.location.replace(coffice_url+"home/createCompany/"+$(this).attr("pckid"));
    });
</script>