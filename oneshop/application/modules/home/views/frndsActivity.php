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
            	<h1>Chronoline <span></span></h1>
            </div>
            <!--<div class="fll borderbottom wi100pstg">
            
                <div class="fll">
                    <h2 class=" bold fs25 mat10"> Chronoline </h2>
                </div>
            </div>-->
            <div id="frndsactivity_div">

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
  $.get(oneshop_url+"/home/frndsActivityLogTpl",{start:starting_index},function(data){
    var result=data.trim();
    if(result!=0){
      $("#frndsactivity_div").html(data);
    }
    else{
      $("#frndsactivity_div").html("<h3>No activity</h3>");
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
    starting_index=starting_index+2;
    callAJAX(oneshop_url+"/home/frndsActivityLogTpl",{start:starting_index},function(data){
      if ($.trim(data) != 0) {
          $("#frndsactivity_div").append(data);
      }
      else {
          next_connection_flag = false;
      }
    });
  }
</script>