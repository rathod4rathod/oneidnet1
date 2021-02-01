<?php // print_R($sys_setting);?>
<div class="flr mat5"> 
 <input type="button" class="button_new os_des_mal10 flr" id ="sys_set_update" value="Edit">
</div>

<div class="clearfix">&nbsp;</div>

<div class="group np_des_wi420 fll">
    <p class="fs14 np_des_mab2 np_des_mab10"> Timezone:  <?php echo $sys_setting[0]["time_zone"]; ?></p>
    
</div>


<div class="group np_des_wi420 fll">
    <p class="fs14 np_des_mab2 np_des_mab10"> Country:   <?php echo $sys_setting[0]["country_name"]; ?></p>
    
</div>

<div class="group np_des_wi420 fll">
    <p class="fs14 np_des_mab2 np_des_mab10"> State:  <?php if($sys_setting[0]["state_name"]){ echo $sys_setting[0]["state_name"];  }else{ echo "-----"; } ?> </p>
    
</div>

<div class="group np_des_wi420 fll">
    <p class="fs14 np_des_mab2 np_des_mab10"> City:  <?php if($sys_setting[0]["city_name"]){ echo $sys_setting[0]["city_name"];  }else{ echo "-----"; } ?>  </p>
    
</div>


<div class="group np_des_wi420 fll">
    <p class="fs14 np_des_mab2 np_des_mab10"> System Language: <?php echo $sys_setting[0]["language"]; ?> </p>
    </div>



<div class="clearfix">&nbsp;</div>    


