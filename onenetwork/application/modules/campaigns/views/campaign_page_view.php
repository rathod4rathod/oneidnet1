<?php
$this->load->module('templates');
$this->templates->header();
$this->templates->onenet_header();
?>


<div class="clr">&nbsp;</div>


<div class="new_wrapper">

    <div class="ondes_wrapper_main">


        <div class="ondes_module_container_wrap">
            <!--module_container start here-->
            <div class="ondes_wrapper_inner minheight600">
                <!--wrapper inner start here-->

                <div class="oneshop_getstarted mat30">

                    <div class="oneshop_getstarted_bgwrap mat40 mab30" style="position:relative; margin-top:-5%;">
                        <h1 class="normal fs24" style="width:880px; border-bottom:1px #ccc solid; padding:0 0 10px 0; margin:0 auto; line-height:32px;"> Oneshop Store Promotion </h1>

                        <div style="width:880px; padding:0 0 5px 0; margin:20px 0 0 0; line-height:24px;" class="bold borderbottom"> 
                            <span> <a href="#"> Promotions </a> &nbsp;&nbsp;&gt;&nbsp;&nbsp; </span> <span> <a href="#"> Oneshop </a> &nbsp;&nbsp;&gt;&nbsp;&nbsp; </span> 
                            <span> <a href="#"> Category </a> &nbsp;&nbsp;&gt;&nbsp;&nbsp;</span> <span> <a href="#"> Stores </a></span>
                        </div>


                        <p class="fs18 fll mat30 bgcolor3 wi100pstg"> <span class="fll"> <img  src="<?PHP echo base_url().'assets/images/next.png'; ?>" width="22" height="22"> </span> <span class="fll mal10"> Complete your Compaign </span>  </p>

                        <div class="mat20 fll" style="width:500px;">
                            <div class="click_tabs_wrap"> 
                                <ul id="tabs">
                                    <li><a id="current" class="oneiddev_budbase" href="<?PHP echo base_url().'budget_page'?>" name="#tab1"> 1 </a> <p style="float:left; font-weight:bold; padding:0 0 0 0; margin:65px 0px 10px -85px;"> BASIC INFORMATION </p> </li>
                                   <li><a href="#" name="#tab2" id="oneiddev_budsec"> 2 </a> <p style="float:left; font-weight:bold; padding:0 0 0 0; margin:65px 0 10px -70px;"> AUDIENCE LAB </p>  </li>
                                    <li><a href="" name="#tab3" id="oneiddev_budthrd"> 3 </a> <p style="float:left; font-weight:bold; padding:0 0 0 0; margin:65px 0 10px -50px;"> PAYMENT</p>   </li>
                                </ul>
                            </div>

                            <div id="content">
                                <?php
                                $this->load->module('budget_page');
                                $this->budget_page->getBudgetbasic_Info();
                                ?>
                                
                            </div>
                        </div>   



                        <div id="onedev_content" class="hotel_pachagesummary_box mab10 mat40 fll">
                            <p class="bgcolor3 bold fs14"> Quick Links ! </p>
                            <ul>
                                <li><p class="fll mat3 mar5"> <img width="10" height="14" src="images/downarrow2.png"> </p> Initiated Yet. </li>
                                <li><p class="fll mat3 mar5"> <img width="10" height="14" src="images/downarrow2.png"> </p> This Shipment. </li>
                                <li><p class="fll mat3 mar5"> <img width="10" height="14" src="images/downarrow2.png"> </p> Hasn't Initiated Yet. </li>
                                <li><p class="fll mat3 mar5"> <img width="10" height="14" src="images/downarrow2.png"> </p> This Shipment Initiated Yet. </li>
                                <li><p class="fll mat3 mar5"> <img width="10" height="14" src="images/downarrow2.png"> </p> Shipment hasn't Initiated Yet. </li>
                                <li><p class="fll mat3 mar5"> <img width="10" height="14" src="images/downarrow2.png"> </p> This Shipment. </li>
                                <li><p class="fll mat3 mar5"> <img width="10" height="14" src="images/downarrow2.png"> </p> Hasn't Initiated Yet. </li>
                                <li><p class="fll mat3 mar5"> <img width="10" height="14" src="images/downarrow2.png"> </p> This Shipment Initiated Yet. </li>
                                <li><p class="fll mat3 mar5"> <img width="10" height="14" src="images/downarrow2.png"> </p> Shipment hasn't Initiated Yet. </li>
                                <li><p class="fll mat3 mar5"> <img width="10" height="14" src="images/downarrow2.png"> </p> This Shipment. </li>
                                <li><p class="fll mat3 mar5"> <img width="10" height="14" src="images/downarrow2.png"> </p> Hasn't Initiated Yet. </li>
                                <li><p class="fll mat3 mar5"> <img width="10" height="14" src="images/downarrow2.png"> </p> This Shipment Initiated Yet. </li>
                                <li><p class="fll mat3 mar5"> <img width="10" height="14" src="images/downarrow2.png"> </p> Shipment hasn't Initiated Yet. </li>
                            </ul>
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



</div>


<!-- jQuery --> 
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<!-- jQuery easing plugin --> 
<script src="scripts/jquery.easing.min.js" type="text/javascript"></script> 
<script>
    $(function () {

        //jQuery time
        var current_fs, next_fs, previous_fs; //fieldsets
        var left, opacity, scale; //fieldset properties which we will animate
        var animating; //flag to prevent quick multi-click glitches

        $(".next").click(function () {
            if (animating)
                return false;
            animating = true;

            current_fs = $(this).parent();
            next_fs = $(this).parent().next();

            //activate next step on progressbar using the index of next_fs
            $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");

            //show the next fieldset
            next_fs.show();
            //hide the current fieldset with style
            current_fs.animate({opacity: 0}, {
                step: function (now, mx) {
                    //as the opacity of current_fs reduces to 0 - stored in "now"
                    //1. scale current_fs down to 80%
                    scale = 1 - (1 - now) * 0.2;
                    //2. bring next_fs from the right(50%)
                    left = (now * 50) + "%";
                    //3. increase opacity of next_fs to 1 as it moves in
                    opacity = 1 - now;
                    current_fs.css({'transform': 'scale(' + scale + ')'});
                    next_fs.css({'left': left, 'opacity': opacity});
                },
                duration: 800,
                complete: function () {
                    current_fs.hide();
                    animating = false;
                },
                //this comes from the custom easing plugin
                easing: 'easeInOutBack'
            });
        });

        $(".previous").click(function () {
            if (animating)
                return false;
            animating = true;

            current_fs = $(this).parent();
            previous_fs = $(this).parent().prev();

            //de-activate current step on progressbar
            $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");

            //show the previous fieldset
            previous_fs.show();
            //hide the current fieldset with style
            current_fs.animate({opacity: 0}, {
                step: function (now, mx) {
                    //as the opacity of current_fs reduces to 0 - stored in "now"
                    //1. scale previous_fs from 80% to 100%
                    scale = 0.8 + (1 - now) * 0.2;
                    //2. take current_fs to the right(50%) - from 0%
                    left = ((1 - now) * 50) + "%";
                    //3. increase opacity of previous_fs to 1 as it moves in
                    opacity = 1 - now;
                    current_fs.css({'left': left});
                    previous_fs.css({'transform': 'scale(' + scale + ')', 'opacity': opacity});
                },
                duration: 800,
                complete: function () {
                    current_fs.hide();
                    animating = false;
                },
                //this comes from the custom easing plugin
                easing: 'easeInOutBack'
            });
        });

        $(".submit").click(function () {
            return false;
        })

    });
</script>


<script src="http://code.jquery.com/jquery-1.7.2.min.js"></script>

<script>
    function resetTabs() {
        $("#content > div").hide(); //Hide all content
        $("#tabs a").attr("id", ""); //Reset id's      
    }

    var myUrl = window.location.href; //get URL
    var myUrlTab = myUrl.substring(myUrl.indexOf("#")); // For localhost/tabs.html#tab2, myUrlTab = #tab2     
    var myUrlTabName = myUrlTab.substring(0, 4); // For the above example, myUrlTabName = #tab

    (function () {
        $("#content > div").hide(); // Initially hide all content
        $("#tabs li:first a").attr("id", "current"); // Activate first tab
        $("#content > div:first").fadeIn(); // Show first tab content

        $("#tabs a").on("click", function (e) {
            e.preventDefault();
            if ($(this).attr("id") == "current") { //detection for current tab
                return
            }
            else {
                resetTabs();
                $(this).attr("id", "current"); // Activate this
                $($(this).attr('name')).fadeIn(); // Show content for current tab
            }
        });

        for (i = 1; i <= $("#tabs li").length; i++) {
            if (myUrlTab == myUrlTabName + i) {
                resetTabs();
                $("a[name='" + myUrlTab + "']").attr("id", "current"); // Activate url tab
                $(myUrlTab).fadeIn(); // Show url tab content        
            }
        }
    })();
    $(".oneiddev_budbase").click(function () {
        $.ajax({
            type: 'POST',
            url: "campaigns/create_campaign",
            success: function (data) {
                $("#content").html(data);

            }
        });
    });
 $("#oneiddev_budsec").click(function () {
        $.ajax({type: 'POST',url: "campaigns/getcampaignsScondpage_Info",success: function (data){
                $("#content").html(data);
                //$("#onedev_content").html("");
            }
        });
         $.ajax({type: 'POST',url: "campaigns/getcamsecsubpage",success: function (data){               
                $("#onedev_content").html(data);
            }
        });
        
        
    });
     $("#oneiddev_budthrd").click(function () {
        $.ajax({
            type: 'POST',
            url: "campaigns/getcampaignstrd_Info",
            success: function (data) {
                $("#content").html(data);
                 $("#onedev_content").html("");

            }
        });
    });
</script>   




</body>

</html>
