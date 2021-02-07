<?php
$this->load->module('templates');
$this->templates->header();
$this->templates->onenet_header();
?>

<div class="new_wrapper">
  <div class="ondes_wrapper_main">
    <div class="ondes_module_container_wrap">
      <!--module_container start here-->
      <div class="ondes_wrapper_inner minheight600">
        <!--wrapper inner start here-->
        <div class="oneshop_getstarted ">
          <div class="oneshop_getstarted_bgwrap container_on mab30" style="position:relative;">
            <div class="header">
              <h1>Are you VIP?</h1>
              <div class="breadcrumbs">
                <ul style="list-style:none; float: left;">
                  <li><a href="javascript:void();">Buzzin</a></li>
                  <li><span>Are you VIP?</span></li>
                </ul>
              </div>
            </div>
            <div class="boxesnewleft_wrap subcontainer">
              <!--<div class="bold borderbottom" style="width:780px; padding:0 0 5px 0; margin:0 auto; line-height:24px;"> <span> <a href="#"> SAMPLE ONE </a> &nbsp;&nbsp;>&nbsp;&nbsp; </span> <span> <a href="#"> SAMPLE TWO </a> &nbsp;&nbsp;>&nbsp;&nbsp; </span> <span> <a href="#"> SAMPLE THREE </a> &nbsp;&nbsp;>&nbsp;&nbsp;</span> <span> <a href="#"> SAMPLE THREE </a></span> </div>-->
              <div class="pricing-wrapper clearfix">
                  <div class="sub_header"><h2> Popularity: Help us to know your  famous things! </h2></div>
                  <div id="SearchContainer">
                    <form id="vip_submit_buzzin" name="buzzin_promotion">
<!--                      <div class="form-group">
                        <label for="vip_whor">Request For <span class="mandatory">*</span></label>
                        <div class="select">
                          <select onchange="removeerror(this.id)" name="request" id="vip_whor" class="form-control">
                            <option value="">Select things</option>
                            <option value="PERSON">Person</option>
                            <option value="INSTITUTION">Institution</option>
                            <option value="COMPANY">Company</option>
                            <option value="PRODUCT">Product</option>
                            <option value="BANK">Bank</option>
                            <option value="NGO">NGO</option>
                            <option value="OTHER">Others</option>
                          </select>
                        </div>
                      </div>-->
                      <div class="form-group">
                        <label for="work_know"> Work Known For</label>
                        <div class="select">
                          <select name="work_know" id="work_know" class="form-control">
                            <option value="0">Select work known</option>
                            <option value="Fashion">Fashion</option>
                            <option value="Films">Films</option>
                            <option value="Food">Food</option>
                            <option value="Music">Music</option>
                            <option value="News">News</option>
                            <option value="Politics">Politics</option>
                            <option value="Religion">Religion</option>
                            <option value="Sports">Sports</option>
                            <option value="Technology">Technology</option>
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="screen_Name">Screen Name</label>
                        <input type="text" onclick="removeerror(this.id)" name="screen_Name" id="screen_Name" class="form-control">
                      </div>
                      <div class="form-group">
                        <label for="vip_desc">Description</label>
                        <!--<input type="text" onclick="removeerror(this.id)" name="vip_desc" id="vip_desc" class="form-control">-->
                        <textarea id="vip_desc" col="5" rows="10" class="form-control" name="desc"></textarea>
                      </div>
                      <div class="form-group">
                        <label for="vip_offc_mail">Official Mail</label>
                        <input type="email"  name="vip_offc_mail" id="vip_offc_mail" class="form-control">
                      </div>
                      <div class="form-group">
                        <label for="vip_offc_mno">Official Mobile No</label>
                        <input type="tel" name="vip_offc_mno"  id="vip_offc_mno" maxlength="17" class="form-control">
                      </div>
                      <div class="form-group">
                        <label for="Addr1_vip">Address Line1</label>
                        <input type="text" onclick="removeerror(this.id)" name="Addr1_vip" id="Addr1_vip" class="form-control">
                      </div>
                      <div class="form-group">
                        <label for="Addr2_vip">Address Line2</label>
                        <input type="text" onclick="removeerror(this.id)" name="Addr2_vip" id="Addr2_vip" class="form-control">
                      </div>
                       <div class="form-group">
                        <label for="vip_country">Country</label>
                        
                        <div class="select">
                          <select  name="vip_country" id="vip_country" class="form-control">
                            <option value="">Select Country</option>
                            <?php foreach($countries as $cont){
                            echo '<option value="'.$cont["country_id"].'">'.$cont["country_name"].'</option>';
                            }?>
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="vip_state">State</label>
                        <div class="select">
                          <select  name="vip_state" id="vip_state" class="form-control">
                            <option value="">Select state</option>
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="vip_city">City</label>
                        <div class="select">
                          <select  name="vip_city" id="vip_city" class="form-control">
                            <option value="">Select city</option>
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="vip_zipcode">Zip Code</label>
                        <input type="text"    name="vip_zipcode" id="vip_zipcode" class="form-control">
                      </div>
                      <div class="form-group">
                        <label for="vip_land_extn">Landline Extension</label>
                        <input type="text"    name="vip_land_extn" id="vip_land_extn" class="form-control">
                      </div>
                      <div class="form-group">
                        <label for="vip_city">Landline No</label>
                        <input type="text"   name="vip_landNo" id="vip_landNo" class="form-control">
                      </div>
                      <div class="form-group">
                        <label for="vip_com_web">Twitter Url</label>
                        <input type="text"  name="twitter" id="twitter" class="form-control">
                      </div>
                      <div class="form-group">
                        <label for="vip_com_web">Facebook Url</label>
                        <input type="text"  name="facebook" id="facebook" class="form-control">
                      </div>
                      <div class="form-group">
                        <label for="vip_com_web">Google+ Url</label>
                        <input type="text" name="instagram" id="instagram" class="form-control">
                      </div>
                      <div id="sucess_vip" class="fs14"></div>
                      <div class="form-group">
                        <label>&nbsp;</label>
                        <button  id="Send" class="btn btn-default"  name="request_account">Request for account</button>
                      </div>
                      <div class="clearfix"></div>
                    </form>
                  </div>
                
              </div>
            </div>
          </div>
        </div>
      </div>
      <!--wrapper inner closed here-->
    </div>
    <!--module container end here-->
  </div>
  <!--wrapper main closed here-->
  <?php
    $this->templates->right_container();
    ?>
</div>
<?php
$this->templates->footer();
?>
<script>
    $("#Send").click(function(e) {
        e.preventDefault();
        var wrkknw=$('#work_know').val();
        var twitter=$('#twitter').val();
        var facebook=$('#facebook').val();
        var google=$('#instagram').val();
        var a=0;
        if(wrkknw == 0)
        {
            $('#work_know').addClass("redfoucusclass");
            a=1;
        }
        if(twitter == "")
        {
            $('#twitter').addClass("redfoucusclass");
            a=1;
        }
        if(facebook == "")
        {
            $('#facebook').addClass("redfoucusclass");
            a=1;
        }
        if(google == "")
        {
            $('#instagram').addClass("redfoucusclass");
            a=1;
        }
        if(a!=1)
        {
        $('*').removeClass("redfoucusclass");
        var formData=$("#vip_submit_buzzin").serialize();
        $.ajax({
            type: "POST",
            data:formData,
            url: onenetwork_url + "promotions/buzzinVipInsert",
            success: function(data) {
                alert(data);
            }
        })
        }
    })
    $("#vip_country").change(function(){
        var cid=$(this).val();
        $.ajax({
            type: "POST",
            data:{countryId:cid},
            url: onenetwork_url + "promotions/states",
            success: function(data) {
                var dataArray = jQuery.parseJSON(data);
                $('#vip_state').empty();
                $('#vip_state').append('<option>Select state</option>');
                $.each(dataArray, function (index, value) {
                $('#vip_state').append($('<option>', { 
                value: value.id,
                text : value.name 
                }));
                });
            }
        }) 
    });
    $("#vip_state").change(function(){
        var sid=$(this).val();
        $.ajax({
            type: "POST",
            data:{stateId:sid},
            url: onenetwork_url + "promotions/cities",
            success: function(data) {
                var dataArray = jQuery.parseJSON(data);
                $('#vip_city').empty();
                $('#vip_city').append('<option>Select city</option>');
                $.each(dataArray, function (index, value) {
                    $('#vip_city').append($('<option>', { 
                    value: value.id,
                    text : value.name 
                    }));
                });
            }
        }) 
    });
    </script>
