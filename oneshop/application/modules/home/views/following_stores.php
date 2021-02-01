<?php
$this->load->module('templates');
$this->templates->app_header(); 
$this->templates->os_mainmenu(); 
?>      
<!--Oneshop Content starts Here(Raviteja 31-12-2015)-->
<div class="oneshop_contentSection">
          
        	<div class="oneshop_findStorePage">
            <div class="hd_heading">
            	<h1>Stores You Are Following  <span></span></h1>
            </div>
           <!-- <div class="oneshop_cartItemsPageHead">
            	Stores You Are Following  
            </div>-->
            <?php
           $this->load->module('stores');
            $this->stores->followingStores_Info(); 
            ?>
            </div>
        </div>

    <!--Oneshop Content ends Here(vinod 19-05-2015)-->            
       <?php
$this->templates->app_footer(  ); 
?>    
