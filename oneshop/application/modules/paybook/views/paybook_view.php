<?php
$this->load->module('templates');
$this->templates->app_header();
$this->templates->os_mainmenu("find_stores");
// $prefill = DataFactory::PartnerReferral('prefill');
// $prefill['web_experience_preference']['return_url'] = $baseUrl.URL['redirect']['onBoarding']['return_url'];
// $prefill['web_experience_preference']['action_renewal_url'] = $baseUrl.URL['redirect']['onBoarding']['action_renewal_url'];
?> 
<div class="oneshop_container_sectionnew">

    <div class="clearfix"></div>  
    <div class="store_mainwrap">    
        <div class="hd_heading"><h2>Add Paybook Details <span></span> </h2></div>
        <div class="oneshop_container_middle_section mat15">
            <div class="oneshop_left_paybook mat15">
        <!-- <div class="oneshop_paymenttype_wrap"  id="addcards_div">    -->
            <div class="fll wi100pstg pab5 mab10">
                <p class="overflow fll"><span class="fll mar10 lh20"> Choose Type : </span> 
                    <br />
                <select name="scope_type" class="oneshop_specifiedselect_new" id="scope_type" onchange="removeerror(this.id)">
                    <option value="">--Select--</option>
                    <option value="NATIONAL">  National </option>
                    <option value="INTERNATIONAL"> International  </option>
                </select>
                </p>
            </div>

        <div class="fll wi100pstg pab5 mab10">
            <p class="overflow fll"><span class="fll mar10 lh20"> Card Number: </span> 
            <input class="input" type="text" name="card_no" id="card_no" placeholder="Enter 16 digit card number" onfocus="removeerror(this.id)"/>
        </div>
        <div class="fll wi100pstg pab5 mab10">
            <p class="overflow fll"><span class="fll mar10 lh20"> Choose Usage Type : </span> 
                    <br />
            <select name="card_usage" class="oneshop_specifiedselect_new" id="card_usage" onchange="removeerror(this.id)">
                <option value="">  Select </option>
                <option value="BUSINESS">  Business </option>
                <option value="PERSONAL"> Personal  </option>
                <option value="OFFSHORE"> Offshore  </option>
                <option value="GOVERNMENTAL"> Governmental  </option>
            </select>
            </p>
        </div>
        <div class="fll wi100pstg pab5 mab10">
            <p class="overflow fll"><span class="fll mar10 lh20"> Card Type: </span> 
                    <br />
            <select name="card_type" class="oneshop_specifiedselect_new " id="card_type" onchange="removeerror(this.id)">
                <option value="">  Select </option>
                <option value="VISA">  Visa </option>
                <option value="MASTERCARD"> Master Card </option>
                <option value="JCB"> Jcb  </option>
                <option value="AMEX"> Amex  </option>
                <option value="WESTERN_UNION"> Western Union  </option>
                <option value="CIRRUS"> Cirrus  </option>
                <option value="DISCOVER"> Discover  </option>
                <option value="MAESTRO">Maestro</option>
            </select>
            </p>
        </div>
        <div class="fll wi100pstg pab5 mab10">
            <p class="overflow fll"><span class="fll mar10 lh20"> Card Name: </span> </p>
            <input class="input" type="text" name="card_name" id="card_name" placeholder="Card Name"/>
        </div>
        <div class="fll wi100pstg pab5 mab10">
            <p class="overflow fll"><span class="fll mar10 lh20"> Name on card: </span> 
            <input class="input" type="text" name="name_on_card" id="name_on_card" placeholder="Name on card"/>
        </div>
        <div class="fll wi100pstg pab5 mab10">
            <p class="overflow fll" style="margin-right: 40px;"><span class="fll mar10 lh20"> Expiration Date: </span> 
                    <br />
            <input class="input" type="text" onfocus="removeerror(this.id)" name="expiry_month" id="expiry_month" placeholder="mm" style="width:40px;text-align: center;" maxlength = "2"/> / <input type="text" class="input" name="expiry_year" id="expiry_year" onfocus="removeerror(this.id)" placeholder="yy" style="width:50px;text-align: center;" maxlength = "2"/>

            <p class="overflow fll"><span class="fll mar10 lh20"> CVV: </span> 
                    <br />
            <input type="text" class="input" name="cvv" id="cvv" placeholder="CVV" style="width:60px" onfocus="removeerror(this.id)"/>
        </div>
        <div class="fll wi100pstg pab5 mab10">

        </div>
        
            <div class="oneshop_paybook_yesorno_buttons mat20 clearfix">
               <input type="button" value="Save" class="np_des_checkout_btn" name="button" id="save_card"> 
               <!-- <input type="button" value="Cancel" class="np_des_checkout_btn" name="button" id="cancel_card"> -->
            </div>

            </div>
             <div class="oneshop_right_stripe mat15">
                <div class="fll wi100pstg pab5 mab10">
                    <?php 
                        if($_SESSION['saccount']){
                         ?>
                            <p class="overflow fll"><span class="fll mar10 lh20" style="color: #1dad00"> Your Stripe Account Succefully Created : </span>
                            <br />
                            <br />
                            <p class="overflow fll"><span class="fll mar10 lh20"> Your Stripe Account No. : <h2><?php echo $_SESSION['saccount']; ?></h2></span>
                         <?php   
                        }else{
                    ?>
                    <p class="overflow fll"><span class="fll mar10 lh20"> Create Your Stripe Account To Getting Payout : </span>
                        <br />
                        <br />
                    <div class="fll wi100pstg pab5 mab10">
                        <p class="overflow fll"><span class="fll mar10 lh20"> Choose Your Country : </span> 
                        <select name="country" class="oneshop_specifiedselect_new" id="country" onchange="myFunction()">
                            <option value="">  Select Country </option>
                           <?php
                            foreach ($country_result as $country) {
                                echo "<option value='". $country['country_code'] ."'>" . $country['country_name'] . " </a> </li>";
                            }?>
                        </select>
                        </p>
                    </div>
                    <div id="individual-form" style="display: none;">
                    <form class="my-form" action="<?php echo base_url().'paybook/stripeINConnect'; ?>" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="token-account" id="token-account">
                        <fieldset style="padding: 10px;">
                        <legend> Personal Details </legend>
                        <div class="fll wi100pstg pab5 mab10">
                            <table>
                                <tr> 
                                <td style="width: 35%; padding: 10px">
                                <label> First Name  </label>
                                <div style="width: 100%">
                                    <input type="text" placeholder="First Name" id="First_Name" name="First_Name" class="input">
                                </div>
                                </td>
                                <td style="width: 35%;padding: 10px">
                                <label> Last Name  </label>
                                <div style="width: 100%">
                                    <input type="text" placeholder="Last Name" id="Last_Name" name="Lsst_Name" class="input">
                                </div> 
                                </td>
                                </tr>
                                <tr> 
                                <td style="width: 35%;padding: 10px">
                                <label> Email  </label>
                                <div style="width: 100%">
                                    <input type="text" placeholder="Email Address" id="Email_Add" name="Email_Add" class="input">
                                </div>
                                </td>
                                <td style="width: 35%;padding: 10px">
                                <label> Identity No. (Adhaar / PAN Card No.) </label>
                                <div style="width: 100%">
                                    <input type="text" placeholder="Adhaar / PAN Card No." id="Id_No" name="Id_No" class="input">
                                </div> 
                                </td>
                                </tr>
                                <tr> 
                                <td style="width: 35%;padding: 10px">
                                <label> Identity Document (Front Side)  </label>
                                <div style="width: 100%">
                                    <input type="file" id="Id_Front" name="Id_Front" class="input" required />
                                </div>
                                </td>
                                <td style="width: 35%;padding: 10px">
                                <label> Identity Document (Back Side)  </label>
                                <div style="width: 100%">
                                    <input type="file" id="Id_Back" name="Id_Back" class="input" required />
                                </div>
                                </td>
                                </tr>
                                <tr> 
                                <td style="padding: 10px">
                                <label> Address  </label>
                                <div style="width: 100%">
                                    <input type="text" placeholder="Address" id="Address" name="Address" class="input" multiple>
                                </div>
                                </td>
                                <td style="padding: 10px">
                                <label> City  </label>
                                <div style="width: 100%">
                                    <select name="City" class="input" id="City">
                                        <option value="">  Select Cities </option>
                                       <?php
                                        foreach ($cities_result as $city) {
                                            echo "<option value='". $city['city_name'] ."'>" . $city['city_name'] . " </a> </li>";
                                        }?>
                                    </select>
                                   <!--  <input type="text" placeholder="City" id="City" name="City" class="input"> -->
                                </div> 
                                </td>
                                </tr>
                                <tr>
                                <td style="padding: 10px">
                                <label> State  </label>
                                <div style="width: 100%">
                                   <!--  <select name="City" class="input" id="City">
                                        <option value="">  Select Cities </option>
                                       <?php
                                        foreach ($cities_result as $city) {
                                            echo "<option value='". $city['city_name'] ."'>" . $city['city_name'] . " </a> </li>";
                                        }?>
                                    </select> -->
                                    <input type="text" placeholder="State" id="State" name="State" class="input">
                                </div> 
                                </td>
                                <td style="padding: 10px">
                                <label> Zip Code  </label>
                                <div style="width: 100%">
                                    <input type="text" placeholder="Zip Code" id="Zip_Code" name="Zip_Code" class="input">
                                </div> 
                                </td>
                                </tr>
                                <tr> 
                                <td style="padding: 10px">
                                <label> Day (D.O.B)  </label>
                                <div>
                                    <input type="text" placeholder="Day" id="Day_Dob" name="Day_Dob" class="input">
                                </div>
                                </td>
                                <td style="padding: 10px">
                                <label> Month (D.O.B)  </label>
                                <div>
                                    <input type="text" placeholder="Month" id="Month_Dob" name="Month_Dob" class="input">
                                </div> 
                                </td>
                                <td style="padding: 10px">
                                <label> Year (D.O.B)   </label>
                                <div>
                                    <input type="text" placeholder="Year" id="Year_Dob" name="Year_Dob" class="input">
                                </div> 
                                </td>
                                </tr>
                            </table>
                        </div>
                        </fieldset>
                        <fieldset style="padding: 10px;">
                        <legend> Bank Account Details </legend>
                        <div class="fll wi100pstg pab5 mab10">
                            <table>
                                <tr> 
                                <td style="width: 50%; padding: 10px">
                                <label> Account Holder Name  </label>
                                <div style="width: 100%">
                                    <input type="text" placeholder="Holder Name" id="Aholder_Name" name="Aholder_Name" class="input">
                                </div>
                                </td>
                                <td style="width: 50%;padding: 10px">
                                <label> IFSC Code  </label>
                                <div style="width: 100%">
                                    <input type="text" placeholder="IFSC Code" id="Ifsc_Code" name="Ifsc_Code" class="input">
                                </div> 
                                </td>
                                </tr>
                                <tr> 
                                <td style="width: 50%; padding: 10px">
                                <label> Account Number  </label>
                                <div style="width: 100%">
                                    <input type="text" placeholder="Account Number" id="Acc_No" name="Acc_No" class="input">
                                </div>
                                </td>
                                </tr>
                            </table>
                        </div>
                        </fieldset>
                        <br />
                        <label>By registering your account, you agree to our <a href="#Terms">Services Agreement</a> and the <a href="https://stripe.com/us/connect-account/legal">Stripe Connected Account Agreement</a>.</label>
                        <br />
                        <button>
                        <img style="text-align: center;" width="40%" src="<?php echo base_url().'assets/images/stripe.png';?>">
                        </button>
                    </form>
                    </div>
                <?php }?>
                    <div id="express-form" style="display: none;">
                        <form action="<?php echo base_url().'paybook/stripeConnect'; ?>" method="post">
                        <input type="hidden" name="id" id="id">
                        <button>
                            <img style="text-align: center;" width="40%" src="<?php echo base_url().'assets/images/stripe.png';?>"> 
                        </button>
                        </form>
                    </div>
                    <script>
                      function myFunction(){
                            var x = document.getElementById("country").value;
                            if(x == 'IN')
                            {
                              document.getElementById("individual-form").style.display = 'block';
                              document.getElementById("express-form").style.display = 'none';
                            }
                            else
                            {
                              document.getElementById("individual-form").style.display = 'none';
                              document.getElementById("express-form").style.display = 'block';
                              document.getElementById("id").value = document.getElementById("country").value;
                            }
                          }
                    </script>
                </div>
             </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-5">
            </div>
        </div>
    </div>
    <div class="oneshop_container_middle_section">
            <div class="clearfix"></div>
        <div class="store_mainwrap"> 
        <div class="wi100pstg" id="order_result">
            <?php 
            if($paybook_details[0]['card_id']!="")
            {?>
            <div class="ttdes_flightsearch_topheadings_box fll">
                <div class="ttdes_flight_departure_box"> ID </div>
                <div class="ttdes_flight_arrival_box"> Card Name </div>
                <div class="ttdes_flight_duration_box"> Card Number </div>
                <div class="ttdes_flight_delivery_box"> Card Type </div>
                <div class="ttdes_flight_edit_box"> Card Usage </div>
                </div>
            <?php foreach($paybook_details as $paybookdata) {?>
            <div class="ttdes_flightsearch_history_content fll">
                <div class="ttdes_stores_orderid pat5"> 
                    <!-- <span class="fll mar10" style="margin-top:2px;">
                        <input type="checkbox" style="display: none;">
                    </span>  -->
                    <label id="labelid<?php echo $paybookdata['card_id'];?>"> <?php echo $paybookdata['card_id'];?> </label> 
                </div>
                <div class="ttdes_stores_date pat5">
                    <label id="labelnae<?php echo $paybookdata['card_id'];?>"><?php echo $paybookdata['card_name'];?> </label>  </div>
                <div class="ttdes_flight_duration_box">
                    <label id="labelnumber<?php echo $paybookdata['card_id'];?>"><?php echo $paybookdata['card_number'];?> </label>
                </div>
                <div class="ttdes_flight_delivery_box"> 
                    <label id="labeltype<?php echo $paybookdata['card_id'];?>"><?php echo $paybookdata['card_type'];?> </label>
                </div>
                <div class="ttdes_flight_edit_box">
                   <label id="labelusage<?php echo $paybookdata['card_id'];?>"><?php echo $paybookdata['usage_scope'];?> </label>
                </div>
                <!-- <div class="ttdes_flight_edit_box">
                    <input type="button" value="Edit" onclick="editorder(<?php echo $orderdata['order_aid'];?>)" id="editorder<?php echo $orderdata['order_aid'];?>">
                    <input type="button" value="Save" onclick="orderupdate(<?php echo $orderdata['order_aid'];?>)" id="orderupdate<?php echo $orderdata['order_aid'];?>" style="display: none;">
                </div> -->
            </div>
            <?php } } else { echo "No Cards Data is Available!"; }?>
            </div>
        </div>
    </div>
</div>

         
<?php
    $this->templates->app_footer();
?>
<script src="https://js.stripe.com/v3/"></script>
<script type="text/javascript" src="<?php echo base_url() . "assets/microjs/"; ?>individual.js"></script>
<script type="text/javascript" src="<?php echo base_url() . "assets/microjs/"; ?>validation.js"></script>
<script src="<?php echo base_url() . "assets/scripts/"; ?>script1.js"></script>
<script type="text/javascript">
     $(document).ready(function(){  
      var dataTable = $('#paybook_data').DataTable({  
           "processing":true,  
           "serverSide":true,  
           "order":[],  
           "ajax":{  
                url: oneshop_url+"/paybook/fetchPaybook/",  
                type:"post"  
           },  
           "columnDefs":[  
                {  
                     "targets":[1,2,3,4,5],  
                     "orderable":false,  
                },  
           ],  
      });  
 });  
    $("#save_card").click(function(){
        var name_on_card=$("#name_on_card").val();
        var card_type=$("#card_type").val();
        var cvv_number=$("#cvv").val();
        var card_name=$("#card_name").val();
        var card_number=$("#card_no").val();
        var expiry_year=$("#expiry_year").val();
        var expiry_month=$("#expiry_month").val();
        var card_usage=$("#card_usage").val();
        var scope_type=$("#scope_type").val();
        var today = new Date(); // gets the current date
        var today_mm = today.getMonth() + 1; // extracts the month portion
        var today_yy = today.getFullYear() % 100;// extracts the year portion and changes it from yyyy to yy format
        var flag=true;

        if(today_mm < 10) { // if today's month is less than 10
            today_mm = '0' + today_mm // prefix it with a '0' to make it 2 digits
        } 

        var mm = expiry_month.substring(0, 2); // get the mm portion of the expiryDate (first two characters)
        var yy = expiry_year.substring(0, 2);
        // get the yy portion of the expiryDate (from index 3 to end)


        if (card_number.length == 0 || card_number == ''){
          $('#card_no').addClass('redfoucusclass');
          flag =false;
         }else{
             if(onlyNumeric(card_number)==false){
                  $('#card_no').addClass('redfoucusclass');
                  flag =false;
                  }
             }
         if (cvv_number.length == 0 || cvv_number == ''){
            $('#cvv').addClass('redfoucusclass');
              flag =false;
         }else{
            
        if(onlyNumeric(cvv_number)==false){
            $('#cvv').addClass('redfoucusclass');
            flag =false;
            }
             
        }
          
         if (expiry_month.length == 0 || expiry_month== ''){
            $('#expiry_month').addClass('redfoucusclass');
              flag =false;
         }
         else if (yy >= today_yy && mm >= today_mm && mm <= 12) {
            // all good because the yy from expiryDate is greater than the current yy
            // or if the yy from expiryDate is the same as the current yy but the mm
            // from expiryDate is greater than the current mm
         }
         else
         {
           $('#expiry_month').addClass('redfoucusclass');
              flag =false;
         }
         if (expiry_year.length == 0 || expiry_year== ''){
            $('#expiry_year').addClass('redfoucusclass');
              flag =false;
         }
         else if (yy > today_yy || yy == today_yy) {
             // all good because the yy from expiryDate is greater than the current yy
             // or if the yy from expiryDate is the same as the current yy but the mm
             // from expiryDate is greater than the current mm
         }
         else
         {
           $('#expiry_year').addClass('redfoucusclass');
              flag =false;
         }
         
         if ( card_type.length == 0 ||  card_type== ''){
            $('#card_type').addClass('redfoucusclass');
              flag =false;
         }
         if ( card_usage.length == 0 ||  card_usage== ''){
            $('#card_usage').addClass('redfoucusclass');
              flag =false;
         }
         if ( scope_type.length == 0 ||  scope_type== ''){
            $('#scope_type').addClass('redfoucusclass');
              flag =false;
         }
         
         if(flag==true){ 
         $.ajax({
            type:"post",
            url: oneshop_url+"/mycart/saveCardDetails/",
            data:{scope_type:scope_type,name_on_card:name_on_card,card_type:card_type,cvv_no:cvv_number,card_name:card_name,card_no:card_number,expiry_year:expiry_year,expiry_month:expiry_month,card_usage:card_usage},
            success:function(data){
            
              if (isJson(data) == true) {
              error_data(data);
              } else {

                var result=data.trim();
                if(result.indexOf("ERROR")===-1){
                  var result_arry=result.split("~");
                  //var card_res=result_arry[]."";
                  alert(result_arry[1]);
                  location.reload();
                }
                else{
                  alert("There might be some problem while processing.Please try again....");
                }
            }
          }
        });
    }else{
        return false;
        }
    });
     
</script>