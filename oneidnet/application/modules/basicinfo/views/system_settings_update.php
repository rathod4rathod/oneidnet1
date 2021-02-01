<?php // print_R($sys_setting);  ?>

<div class="clearfix">&nbsp;</div>

<div class="form-group2 np_des_wi420 fll">
    <p class="fs14 np_des_mab2 np_des_mab10"> Timezone </p>


    <select class="form-control2 ng-valid ng-dirty ng-valid-editable error" id="tz">
        <?php foreach ($time_zone as $time_zonein) {
            ?>
            <option <?php if ($sys_setting[0]["time_zone"] == $time_zonein["timezone_name"]) {
            echo "selected='selected'";
        } ?> value="<?php echo $time_zonein["timezone_name"]; ?>"><?php echo $time_zonein["timezone_name"]; ?> </option>
    <?php }
?>                           
    </select>
</div>

<div class="form-group2 np_des_wi420 fll">
    <p class="fs14 np_des_mab2 np_des_mab10"> System Language  </p>
    <select class="form-control2 ng-valid ng-dirty ng-valid-editable error"  id="system_language">
        <option value="English" <?php if ($sys_setting[0]["language"] == 'English') {
    echo "selected='selected'";
} ?> >English</option>
        <option value="Chinese" <?php if ($sys_setting[0]["language"] == 'Chinese') {
    echo "selected='selected'";
} ?>>Chinese</option>
        <option value="Hindi" <?php if ($sys_setting[0]["language"] == 'Hindi') {
    echo "selected='selected'";
} ?>>Hindi</option>
        <option value="Spanish" <?php if ($sys_setting[0]["language"] == 'Spanish') {
    echo "selected='selected'";
} ?>>Spanish</option>
        <option value="Arabic" <?php if ($sys_setting[0]["language"] == 'Arabic') {
    echo "selected='selected'";
} ?>>Arabic</option>
    </select>
</div>


<div class="form-group2 np_des_wi420 fll">
    <p class="fs14 np_des_mab2 np_des_mab10" > Country </p>
        <?php // print_R($country);?>
    <select class="form-control2 ng-valid ng-dirty ng-valid-editable error" id="country">
        <?php foreach ($country as $country_info) {
            ?>
            <option <?php if ($sys_setting[0]["country_id"] == $country_info["country_id"]) {
            echo "selected='selected'";
        } ?>  value="<?php echo $country_info["country_id"]; ?>"><?php echo $country_info["country_name"]; ?></option>
    <?php }
?>


    </select>
</div>

<div class="form-group2 np_des_wi420 fll">
    <p class="fs14 np_des_mab2 np_des_mab10"> State </p>
    <select class="form-control2 ng-valid ng-dirty ng-valid-editable error" id="state">
        <option value="">--Select--</option>
        <?php foreach ($state as $state_info) {
            ?>
            <option <?php if ($sys_setting[0]["state_id"] == $state_info["state_id"]) {
                echo "selected='selected'";
            } ?>  value="<?php echo $state_info["state_id"]; ?>"><?php echo $state_info["state_name"]; ?></option>
    <?php }
?>
    </select>
</div>

<div class="form-group2 np_des_wi420 fll"><?php // print_R($city);?>
    <p class="fs14 np_des_mab2 np_des_mab10"> City </p>
    <select class="form-control2 ng-valid ng-dirty ng-valid-editable error"  id="city">

        <option value="">--Select--</option>
<?php if ($city) {
    foreach ($city as $city_info) {
        ?>
                <option <?php if ($sys_setting[0]["city_id"] == $city_info["city_id"]) {
            echo "selected='selected'";
        } ?> value="<?php echo $city_info["city_id"]; ?>" ><?php echo $city_info["city_name"]; ?></option>
        <?php }
}
?>
    </select>
</div>





<div class="clearfix">&nbsp;</div>    

<div class="flr mat5"> 
    <input type="button" class="button_new os_des_mal10 flr" id="sys_stg_sub" value="Update">
    <input type="button" class="button_new os_des_mal10 flr" id="sys_stg_sub_cnl" value="Cancel">
</div>

