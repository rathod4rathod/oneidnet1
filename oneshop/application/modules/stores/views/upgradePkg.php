<?php
$this->load->module('templates');
$this->templates->app_header();
$this->templates->os_mainmenu();
?>
<div class="oneshop_container_middle_section mat10">


           <div class="oneshop_left_newcontainer pab10">


           <div class="popupbox_new_wrapper">

           <div class="fll borderbottom mab10 pab5 mat10 wi100pstg">
           <h2> Packages </h2>
           </div>

           <div class="wi100pstg fll">


       <div class="statistics_total_wqrap">

       <div class="preference_top_heading_wrap">
       <div class="statistics_preference_box1 bold"> Package Name </div>
       <div class="statistics_preference_box2 bold"> Total Products </div>
       <div class="statistics_preference_box2 bold"> Duration </div>
       <div class="statistics_preference_box2 bold"> Expiration Status </div>
       </div>


       <div class="preference_bottom_content_wrap">
       <div class="preference_module_names acenter"> <span class="green2">  Current Package </span> <br> <strong> ( New ) </strong>  </div>
       <div class="statistics_preference_box_content acenter">  100 <strong> <span class="gray"> ( Remaining ) </span> </strong> </div>
       <div class="statistics_preference_box_content acenter">  3 Months </div>
       <div class="statistics_preference_box_content acenter"> <span class="red2"> Expired </span>  </div>
       </div>

       <div class="preference_bottom_content_wrap">
       <div class="preference_module_names acenter"> <span class="dark_gray"> Renewal Package Name </span> <br> <strong> ( New ) </strong> </div>
       <div class="statistics_preference_box_content acenter"> 100 + 100 </div>
       <div class="statistics_preference_box_content acenter">  1 Month </div>
       <div class="statistics_preference_box_content acenter">  23 March 2016 </div>
       </div>

       <div class="preference_bottom_content_wrap_highleted_box">
       <div class="preference_module_names_highlated acenter">  Current Package with carry over <br> <strong> ( New ) </strong> </div>
       <div class="statistics_preference_box_content bold acenter">  200 </div>
       <div class="statistics_preference_box_content bold acenter">  6 Months </div>
       <div class="statistics_preference_box_content bold acenter">  23 March 2016 </div>
       </div>

       </div>

       <p class="flr mat20"><a class="btn btn-primary btn-large" href="#"> View Package Histories </a></p>


       </div>

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

<?php
$this->templates->app_footer();
?>
