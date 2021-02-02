<?php
$this->load->module("cookies");
$this->load->module('templates');
$this->templates->app_header();
$this->templates->os_mainmenu();
//echo  $timezone;
?>

<div class="oneshop_container_sectionnew">

    <div class="oneshop_container_middle_section mat10">

        <div class="oneshop_left_newcontainer pab10">
        <div class="hd_heading">
      		  <h1>Stores Updates<span></span></h1>
        </div>
            <div class="featured_product_product_mainwrap">

                <div class="oneshop_products_main_wrap mat10" id="oshop_ajaxload">


                </div>
            </div>
            <div  id="oshopdev_spinner" >
                <div class="spinner-md" style="margin-left:250px;"></div>
            </div>
            <div class="osdes_rightbar_headingsbg_wrap mat20"  style="display:none;" id="oshopdev_nomoreposts" >

                <div class="nodata_found_bgwrap">
                    No More Products
                </div>
            </div>
        </div>
        <div class="oneshop_right_newcontainer mat10">
          <?php
            $this->load->module("suggestions");
            $this->suggestions->getStoreSuggestions();
            $this->suggestions->getProductSuggestions();
          ?>
        </div>
    </div>
</div>
</div>
<!--Oneshop Content ends Here(vinod 19-05-2015)-->

<!--Oneshop Footer starts Here(vinod 19-05-2015)-->
<?php $this->templates->app_footer(); ?>
<!--Oneshop Footer ends Here(vinod 19-05-2015)-->

<script>
  var oshop_url = oneshop_url;

  var starting_index = 10;
  function dataLoading() {
      s_url = oshop_url + "/home/usertimeline_data"
      $.ajax({
          type: "POST",
          url: s_url,
          data: {start_id: starting_index},
          beforeSend: function () {
              $("#oshopdev_spinner").css('display', "block");

          },
          success: function (data) {

              if ($.trim(data) != 0) {
                  $("#oshopdev_spinner").css('display', "none");

                  $('#oshop_ajaxload').append(data);
              } else {
                  next_posts_flag = false;
                  $("#oshopdev_spinner").css('display', "none");

                  $('#oshopdev_nomoreposts').css('display', "block");
              }
          }
      });
      starting_index = starting_index + 3;
  }
  var next_posts_flag = true;
  $(window).scroll(function () {
      if ($(window).scrollTop() == $(document).height() - $(window).height()) {
          if (next_posts_flag) {
              dataLoading();
          }
          //   alert("fffg");
      }
  });
  $.get(oshop_url + "/home/usertimeline_data", function (data) {
      $("#oshopdev_spinner").css('display', "none");
      //alert("fffg");
      if ($.trim(data) != 0) {
          $("#oshop_ajaxload").html(data);
      } else {
          $('#oshopdev_nomoreposts').css('display', "block");
      }
  });
</script>
