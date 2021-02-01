
<div class="form-group2 np_des_wi420 fll">
    <input type="text" required id="firstname" placeholder="Write Your First Name *"   class="form-control2 ng-valid ng-dirty ng-valid-editable error" value="<?php echo $prf_dtls[0]["first_name"]; ?>" readonly>
    <p id="fne" style="color:red;margin-top: 5px;font-size: 11px;"></p>
</div>
<div class="form-group2 np_des_wi420 fll">
    <input type="text" required id="middlename" placeholder="Write your Middle Name"  class="form-control2 ng-valid ng-dirty ng-valid-editable error" value="<?php echo $prf_dtls[0]["middle_name"]; ?>">
   <p id="mne" style="color:red;margin-top: 5px;font-size: 11px;"></p>
</div>

<div class="form-group2 np_des_wi420 fll">
    <input type="text" required id="lastname" placeholder="Write Your Last Name * " class="form-control2 ng-valid ng-dirty ng-valid-editable error" readonly="readonly" value="<?php echo $prf_dtls[0]["last_name"]; ?>">
     <p id="lne" style="color:red;margin-top: 5px;font-size: 11px;"></p>
</div>

<div class="form-group2 np_des_wi420 fll">
    <input type="text" required id="mbno" class="form-control2 ng-valid ng-dirty ng-valid-editable error"  placeholder="Write Your Mobile Number * " value="<?php echo $prf_dtls[0]["mobile_no"]; ?>">
     <p id="mobne" style="color:red;margin-top: 5px;font-size: 11px;"></p>
</div>
<div class="form-group2 np_des_wi420 fll">
    <input type="text" required id="existingemail" class="form-control2 ng-valid ng-dirty ng-valid-editable error" placeholder="Type Your Existing Alternate E-Mail Address"  value="<?php echo $prf_dtls[0]["existing_email_id"]; ?>">
   <p id="emailer" style="color:red;margin-top: 5px;font-size: 11px;"></p>
</div>

<div class="form-group2  np_des_wi420 fll">
    <!--<input type="text" required id="dob" class="form-control2 ng-valid ng-dirty ng-valid-editable error" placeholder="Write Your DOB * " readonly="readonly" value="<?php echo date('d-M-Y', strtotime($prf_dtls[0]["dob"]) ); ?>">-->
    <?php
    $d= date('d', strtotime($prf_dtls[0]["dob"]) );
  $m= date('m', strtotime($prf_dtls[0]["dob"]) ); 
    $y= date('Y', strtotime($prf_dtls[0]["dob"]) );
    $dateobj=new DateTime();
    $cy=$dateobj->format("Y");
    $month=["1"=>"Jan","2"=>"Feb","3"=>"Mar","4"=>"Apr","5"=>"May","6"=>"Jun","7"=>"Jul","8"=>"Aug","9"=>"Sep","10"=>"Oct","11"=>"Nov","12"=>"Dec"];
    
    ?>
    <select  class="form-controlselect" id="date">
        <option value="">--DD--</option>
        <?php
        for($i=1;$i<=31;$i++){
            if($d==$i){
                echo '<option value="'.$i.'" selected="selected">'.$i.'</option>';
            }else{
                echo '<option value="'.$i.'">'.$i.'</option>';
            }
            
        }
        ?>
    </select>
    
    <select class="form-controlselect"  id="month">
        <option value="">--MM--</option>
        <?php foreach($month as $key=>$month){
            if($key==$m){
                echo '<option value="'.$key.'"  selected="selected">'.$month.'</option>';
            }else{
                echo '<option value="'.$key.'">'.$month.'</option>';
            }            
        } ?>
        
    </select>
    <select class="form-controlselect" id="year">
        <option value="">--YY--</option>
        <?php
        for($i=1950;$i<=$cy;$i++){
            if($i==$y){
                echo '<option value="'.$i.'"  selected="selected">'.$i.'</option>';
            }else{
                echo '<option value="'.$i.'">'.$i.'</option>';
            }
            
        }
        ?>
    </select>
    
    <p id="dbe" style="color:red;margin-top: 5px;font-size: 11px;"></p>
                </label>
                </div>
                <div class="form-group2 fll mab10 wi100pstg">
                    <p class="fs14 np_des_mab2"> Gender </p>
                    <p class="fll np_des_mat5"> <span class="fll">
                            <input  type="radio" value="MALE" name="gender" <?php
                            if ($prf_dtls[0]["gender"] == "MALE") {
                                echo "checked";
                            }
                            ?> >
                        </span> <span class="bp_des_mat3 fll os_des_mal5">Male</span></p>
                    <p class="fll np_des_mat5 os_des_mal10"> <span class="fll"><input   name="gender" type="radio" value="FEMALE" <?php
                            if ($prf_dtls[0]["gender"] == "FEMALE") {
                                echo "checked";
                            }
                            ?>></span> <span class="bp_des_mat3 fll os_des_mal5">Female</span></p>
                </div>
                <p class="flr mat5"> 
                    <input type="button" value="Update" id='pd_upd_db' class="button_new os_des_mal10">
                    <input type="button" value="Cancel" id='pd_upd_cnl'  class="button_new os_des_mal10">
                </p>
