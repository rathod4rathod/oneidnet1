<?php
$this->load->module('templates');
$this->templates->os_Store_Header();
$this->templates->mystore_Menu();
$this->load->module("home");
//Imp $warn_msg=$this->home->displayWarn();

?>      

<!--Oneshop Content starts Here(vinod 19-05-2015)-->
<div class="oneshop_contentSection">    
    <div class="oneshop_leftSection">
        <?php
          if($warn_msg!=""){
           echo "<h1 style='color:red;font-size:18px;'>$warn_msg</h1>";
          }
        ?> 
        <span class="oneshop_leftSectionHeader">
            <h3>Home</h3>
        </span>
        <div class="oneshop_gridSection">
        <div class="oneshop_homeGrid">
            <span class="oneshop_homeGridTitle"><h5>Number of Orders</h5></span>
            <span class="oneshop_homeGridCount"><h2><?php echo $number_of_orders;?></h2></span>
        </div>
        <div class="oneshop_homeGrid">
            <span class="oneshop_homeGridTitle"><h5>Total Sales</h5></span>
            <span class="oneshop_homeGridCount"><h2><?php echo number_format($number_of_sales);?></h2></span>
        </div>
        <div class="oneshop_homeGrid">
            <span class="oneshop_homeGridTitle"><h5>Total space</h5></span>
            <span class="oneshop_homeGridCount"><h2 ><?php echo $used_space[0]["total_space"]." GB ";?></h2></span>                
        </div>
        <div class="oneshop_homeGrid">
            <span class="oneshop_homeGridTitle"><h5>Used Space Customers</h5></span>
            <span class="oneshop_homeGridCount"><h2><h2 class="space_dec"><?php echo number_format($used_space[0]["total_space"]*($used_space[0]["used_space"]/100),"3")."%";?></h2></h2></span>                
        </div>
        <div class="oneshop_homeGrid">
            <span class="oneshop_homeGridTitle"><h5>Total Cancellations</h5></span>
            <span class="oneshop_homeGridCount"><h2><?php echo $number_of_cancels;?></h2></span>                
        </div>
        <div class="oneshop_homeGrid">
            <span class="oneshop_homeGridTitle"><h5>Total Products</h5></span>
            <span class="oneshop_homeGridCount"><h2><?php echo $number_of_product; ?></h2></span>
        </div>
        <div class="oneshop_homeGrid">
            <span class="oneshop_homeGridTitle"><h5>Total Views</h5></span>
            <span class="oneshop_homeGridCount"><h2><?php echo $used_space[0]["visit_count"];?></h2></span>                
        </div>
        <div class="oneshop_homeGrid">
            <span class="oneshop_homeGridTitle"><h5>Average Rating</h5></span>
            <span class="oneshop_homeGridCount"><h2><?php echo $store_rating;?>   </h2></span>                
        </div>
        <div class="oneshop_homeGrid">
            <span class="oneshop_homeGridTitle"><h5>Team Staff</h5></span>
            <span class="oneshop_homeGridCount"><h2><?php echo $number_of_staff;?></h2></span>                
        </div> 
        <div class="oneshop_homeGrid">
            <span class="oneshop_homeGridTitle"><h5>My Package</h5></span>
            <span class="oneshop_homeGridCount"><h2><?php echo $used_space[0]["package"];?></h2></span>                
        </div>  
        <button class="oneshop_basicInfoBtn upgradeBtn" id="upgrade_btn">Upgrade Your Package</button> 
        </div>
        <div class="oneshop_recentOrdersList">
            <span class="oneshop_recentOrdersHeader"><h4>My Recent Orders</h4></span>
            <?php
            $this->load->module("orders");
            $this->orders->mystore_recent($store_aid);
          //  $this->orders->mystore_Orders();
            ?>

        </div> 
    </div>
    <?php
    $this->load->module("ads");
    $this->ads->ads_view();
    ?>
</div>
<!--Oneshop Content ends Here(vinod 19-05-2015)-->            

<?php
$this->templates->app_footer();
?>
