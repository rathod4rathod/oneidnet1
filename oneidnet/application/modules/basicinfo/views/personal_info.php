<div class="flr mat5"> 
    <input type="button" value="Edit" id='pdupdate' class="button_new os_des_mal10 flr">
    <!--<input type="button" value="Cancel" class="button_new os_des_mal10 flr">-->
</div>

<div class="clearfix">&nbsp;</div>
<div class="group np_des_wi420 fll" style="display:none;">
    <input type="text" required id="" class="np_des_wi420">
    <span class="highlight"></span>
    <span class="bar"></span>
    <label> Type Your First Name Here </label>
</div>
<?php // print_R($prf_dtls);?>
<input type="hidden" id="pdlts" value='<?php print_R(json_encode($prf_dtls)); ?>'>   
<p class="showingdata np_des_wi420 np_des_mab20">Name: <?php echo $prf_dtls[0]["first_name"] . " " . $prf_dtls[0]["middle_name"] . " " . $prf_dtls[0]["last_name"]; ?></p>
<p class="showingdata np_des_wi420 np_des_mab20">Mobile No: +<?php echo $prf_dtls[0]["mobile_no"]; ?></p>
<p class="showingdata np_des_wi420 np_des_mab20">Existing E-Mail: <?php echo $prf_dtls[0]["existing_email_id"]; ?></p>
<p class="showingdata np_des_wi420 np_des_mab20">DOB: <?php echo date('d-M-Y', strtotime($prf_dtls[0]["dob"]) ); ?></p>
<p class="showingdata np_des_wi420 np_des_mab20">Gender: <?php echo ucfirst(strtolower($prf_dtls[0]["gender"])); ?></p>
