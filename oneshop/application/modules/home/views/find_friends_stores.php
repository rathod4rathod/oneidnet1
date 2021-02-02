
<?php
$this->load->module('templates');
$this->templates->app_header(  ); 
$this->templates->os_mainmenu(  ); 
?>      

    <!--Oneshop Content starts Here(vinod 19-05-2015)-->
    	<div class="oneshop_contentSection">
       
          
       <?php
              $this->load->module('friends_store');
             $this->friends_store->friends_store_search( ); 

       ?>
          
          
        	<div class="oneshop_friendStorePage">
            <div class="oneshop_cartItemsPageHead">
            	Friend Stores
            </div>
           <?php
             $this->friends_store->friends_store_search_result( ); 
           ?>
                       
            </div>
        </div>
    <!--Oneshop Content ends Here(vinod 19-05-2015)-->            

      <?php
$this->templates->app_footer(  ); 
?>