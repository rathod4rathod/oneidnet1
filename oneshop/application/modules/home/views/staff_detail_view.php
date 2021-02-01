
<h4>Manage Staff</h4>
<?php
if ($staff_info[0]["order_manager_emails"] != 0) {
  foreach ($staff_info as $staff_info_f) {   
    ?>
     <div id="manage_staff_main_append">
        <div id="manage_staff_main1">
            <div class="oneshop_mystoreSettinsField">
                <span class="onshop_formsFieldLables"><h5>Order Manager :</h5></span>                        
                <span class="oneshop_mystoreField"><h5><?PHP  print_R($staff_info_f["order_manager_emails"][0]["first_name"]); ?></h5></span>                        
                
                <span class="order_Manager" id="order_Manager_error1" style="">Invalid Email</span>   
            </div>     
            <div class="oneshop_mystoreSettinsField">
                <span class="onshop_formsFieldLables"><h5>Stock Manager :</h5></span>                        
                <span class="oneshop_mystoreField"><h5><?PHP  print_R($staff_info_f["store_manager_emails"][0]["first_name"]); ?></h5></span>                        
                <span class="order_Manager" id="stock_Manager_error1" style="">Invalid Email</span>   
            </div>
        </div>
    </div>
             <?php
  }
  echo '<button class="oneshop_basicInfoBtn" id="mystaff_edit">edit</button>';
} else {
  ?>
  <?php if ($store_info[0]["package"] != "Basic") {
    ?>
    <div id="manage_staff_main_append">
        <div id="manage_staff_main1">
            <div class="oneshop_mystoreSettinsField">
                <span class="onshop_formsFieldLables"><h5>Order Manager :</h5></span>                        
                <input type="text" class="oneshop_mystoreField" placeholder="Order Manager Email" name="order_manager" id="order_manager_id1">
                <span class="order_Manager" id="order_Manager_error1" style="">Invalid Email</span>   
            </div>     

            <div class="oneshop_mystoreSettinsField">
                <span class="onshop_formsFieldLables"><h5>Stock Manager :</h5></span>                        
                <input type="text" class="oneshop_mystoreField" placeholder="Stock Manager Email" name="stock_manager"id="stock_manager_id1">
                <span class="order_Manager" id="stock_Manager_error1" style="">Invalid Email</span>   
            </div>

        </div>
    </div>
    <button class="oneshop_basicInfoBtn" id="mystaff_add_save">Save</button>
    <button class="oneshop_basicInfoBtn" id="manage_staff_remove" style="display:none">Remove</button>
    <?php if ($store_info[0]["package"] != "Premium") {
      ?>
      <button class="oneshop_basicInfoBtn" id="add_staff"> + Add Person</button>
      <?php
    }
    ?>

    <?php
  } else {
    echo "<br><br><br><h2>This service not available for Basic package Users </h2>";
  }
  ?>

  <?php
}
?>
                

      <script>
         $("#mystaff_edit").click(function(){
      $("#manage_staff_div").load(oneshop_url +"/home/staff_edit/"+$("#stuid").val());
  });
  
      </script>