<?php
$this->load->module('templates');
$this->templates->os_Store_Header(); 
$this->templates->mystore_Menu(); 
//$this->load->helper("url");
//$store_id=$this->uri->segment(3);
?>      
    <link rel="stylesheet" href="<?php echo base_url() . "assets/" ?>css/jquery-ui.css">
<script src="<?php echo base_url() . "assets/" ?>scripts/jquery-ui.js"></script>      

    <!--Oneshop Content starts Here(vinod 19-05-2015)-->
  <div class="oneshop_contentSection">
    <?php        
      $this->load->module("orders");
      $this->orders->mystore_orders_cancellation_search();
    ?>  
    <div id="cancellation_div">      
      <?php 
        $this->load->module("orders");       
        $this->orders->getCancellationList($store_id);
      ?>
    </div> 
  </div>
       
    <!--Oneshop Content ends Here(vinod 19-05-2015)-->            

<?php
  $this->templates->app_footer(  ); 
?>