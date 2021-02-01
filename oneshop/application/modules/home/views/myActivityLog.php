<?php
$this->load->module("cookies");
$this->load->module('templates');
$this->templates->app_header();
$this->templates->os_mainmenu();
?>
<div class="oneshop_container_sectionnew">

    <div class="oneshop_container_middle_section mat10">

        <div class="left_oontainer">
			<div class="hd_heading">
            	<h1>Activity <span></span></h1>
            </div>
            <div id="myactivitylog_div">

            </div>
        </div>

    <div class="oneshop_right_newcontainer">
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
  var next_connection_flag=true;
  var starting_index=0;
  $.get(oneshop_url+"/home/getUsrActivityLogTpl",{start:starting_index},function(data){
    if(data.trim()!=0){
      $("#myactivitylog_div").html(data);
    }
    else{
      $("#myactivitylog_div").html("<h2>No activity</h2>");
    }
  });
  $(window).scroll(function () {
      if ($(window).scrollTop() == $(document).height() - $(window).height()) {
          if (next_connection_flag) {
              dataLoading();
          }
      }
  });
  function dataLoading(){
    callAJAX(oneshop_url+"/home/getUsrActivityLogTpl",{start:starting_index+1},function(data){
      if ($.trim(data) != 0) {
          $("#myactivitylog_div").append(data);
      }
      else {
          next_connection_flag = false;
      }
    });
    starting_index=starting_index+1;
  }
</script>