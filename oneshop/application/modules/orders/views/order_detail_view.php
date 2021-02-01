<?php
$this->load->module('templates');
$this->templates->app_header();
$this->templates->os_mainmenu();
?>
<div class="oneshop_container_sectionnew">
    <div class="oneshop_container_middle_section mat10">
        <div class="left_oontainer">
            <div class="fll borderbottom wi100pstg">
                <div class="fll">
                    <h2 class="fs25 mat10"> ORDER DETAIL VIEW </h2>
                </div>
                <div class="flr wi200">
                    <div class="fll"> <h5 class="normal fll black"> Status : </h5> <h3 class="fll fs14 green lh20 mal10"> <?php echo $order_details[0]["status"];?></h3> </div>
                    <div class="fll"><span class="fll mar10"> Order on : </span> <span class="fll"> <?php echo date('d-m-Y',strtotime($order_details[0]["time"]));?> </span> </div>
                </div>
            </div>
            <div id="orders_div">
                
            </div>        
            
            <div class="wi100pstg fll mab10 mat30">
                <h2 class="mab10 pab5">  Shopping Details </h2>
                <div class="wi100pstg mat20 fll">
                    <P class="wi100pstg fs14 bold mab5"> Name : </P>
                    <P class="wi100pstg fs14 gray"> Samsung </P>
                </div>
                <div class="wi100pstg mat20 fll">
                    <P class="wi100pstg fs14 bold mab5"> Address Line : </P>
                    <P class="wi100pstg fs14 gray"> New deals. Every day. Shop our Deal of the Day, Lightning Deals and more daily deals and limited-time sales. See deals you're Watching here.
                    </P>
                </div>
            </div>
            <div class="wi100pstg fll mat30">
                <h2 class="mab10 pab5 fs25">  Track Your Order </h2>
                <img src="Images/track.png" width="943" height="65">
            </div>

        </div>
        <div class="right_container">
            <input type="hidden" id="horder_id" value="<?php echo $order_details[0]["order_aid"];?>"/>
            <?php
                $this->load->module("suggestions");
                $this->suggestions->getStoreSuggestions();
                $this->suggestions->getProductSuggestions();
            ?>
        </div>
    </div>
</div>          
<?php
$this->templates->app_footer();
?>
<script type="text/javascript">
    var order_id='<?php echo $order_details[0]["order_aid"]?>';
    $.get(oneshop_url+"/orderDetailsTpl",{order_id:order_id},function(data){
        $("#orders_div").html(data);
    });
</script>