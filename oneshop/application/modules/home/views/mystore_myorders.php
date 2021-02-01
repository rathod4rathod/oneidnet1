<?php
$this->load->module('templates');
$this->templates->os_Store_Header(); 
$this->templates->mystore_Menu(); 
$this->load->module("home");
//Imp $warn_msg=$this->home->displayWarn();
?>      
  <link rel="stylesheet" href="<?php echo base_url() . "assets/" ?>css/jquery-ui.css">
  <script src="<?php echo base_url() . "assets/" ?>scripts/jquery-ui.js"></script>
       

    <!--Oneshop Content starts Here(vinod 19-05-2015)-->
    <div class="oneshop_contentSection">
        <?php
          if($warn_msg!=""){
           echo "<h1 style='color:red;font-size:18px;'>$warn_msg</h1>";
          }
        ?>
		<?php
    $this->load->module("orders");
    $this->orders->mystore_Myorders_search();
    ?>
          <div class="oneshop_leftSection">
					<div class="oneshop_recentOrdersList">
                        <div id="myorders_header">
                        <span class="oneshop_recentOrdersHeader"><h4>My All Orders</h4></span>
                        </div>
            <div id="orders_div" style="float:left; width: 635px; height: 500px; overflow-X: hidden; overflow-Y: scroll;">                
						 <?php
                $this->orders->mystore_Myorders_list($store_id);
              ?>                                               
            </div>
          </div>                    
		</div>  
        </div>               
    <!--Oneshop Content ends Here(vinod 19-05-2015)-->            

<?php
  $this->templates->app_footer(  ); 
?>
