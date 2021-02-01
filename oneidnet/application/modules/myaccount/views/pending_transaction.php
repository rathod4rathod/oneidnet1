<?php
$this->load->module("templates");
$this->templates->basic_info_header();
$this->templates->paybook_subheader()
?>
 </div>
    <div class="clearfix"></div>
    <div class="np_des_module_container_wrap np_des_mat130 minheight700"> <!--module_container start here-->

      <h1 class="wi100pstg os_des_borderbottom fs22 os_des_pab5 normal np_des_mab10"> Pending Transaction </h1>

      <div class="right_cont_newwrapper">
        <div class="fll overflow">
          <div class="ttdes_login_control fll">
            <div class="ttdes_flight_departure_box"> Cart </div>
            <div class="ttdes_flight_arrival_box"> Name </div>
            <div class="ttdes_flight_duration_box"> Amount </div>
          </div>
            <div id="pending_transactions"></div>















        </div>
      </div>
      <div class="oneshop_right_newcontainer np_des_mat25"> <img src="images/ad1.jpg" class="hotel_news_imgbox"> </div>
    </div>
    <!--module container end here-->

    <div class="clearfix"></div>
    <div class="np_des_footer"><!--footer start here-->
      <div class="np_des_footerleft"><span> Copyright &copy; ONEIDNET 2016 </span></div>
      <div class="np_des_footerright"><span><a href="#"><img src="images/onenet.png" alt="logo"></a></span></div>
    </div>
    <!--footer closed here-->

  </div>
  <!--wrapper main closed here-->

</div>
</body>
</html>
<script>


 $.get(oneidnet_url+"myaccount/pending_transactions",function(data){
    $('#pending_transactions').html(data);
});
</script>