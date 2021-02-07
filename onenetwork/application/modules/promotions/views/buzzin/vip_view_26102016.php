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

                <div class="oneshop_getstarted mat30">
                    <div class="oneshop_getstarted_bgwrap mat40 mab30" style="position:relative; margin-top:-5%;">
                        <h1 class="acenter normal fs24" style="width:700px; border-bottom:1px #ccc solid; padding:0 0 10px 0; margin:0 auto; line-height:32px;"> Buzzin Promotions Category </h1>



                        <div class="boxesnewleft_wrap">
                            <div class="bold borderbottom" style="width:780px; padding:0 0 5px 0; margin:0 auto; line-height:24px;"> 
                                <span> <a href="#"> SAMPLE ONE </a> &nbsp;&nbsp;>&nbsp;&nbsp; </span> <span> <a href="#"> SAMPLE TWO </a> &nbsp;&nbsp;>&nbsp;&nbsp; </span> 
                                <span> <a href="#"> SAMPLE THREE </a> &nbsp;&nbsp;>&nbsp;&nbsp;</span> <span> <a href="#"> SAMPLE THREE </a></span>

                            </div>

                            <div style="margin-top:40px;" class="pricing-wrapper clearfix">
                                <div class="">

                                    <p class="mat10">
                                    </p><h1> Popularity: Help us to know your  famous things!  </h1>
                                    <hr>
                                    <p></p>



                                    <div style="width:75%;" id="SearchContainer">
                                        <form id="vip_submit_buzzin" action="<?php echo base_url().'promotions/buzzin_campaincreate';?>">

                                            <div class="group fs14">Request For:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                <select onchange="removeerror(this.id)" name="vip_whor" id="vip_whor">
                                                    <option value="">select things</option>
                                                    <option value="PERSON">Person</option>
                                                    <option value="INSTITUTION">Institution</option>
                                                    <option value="COMPANY">Company</option>
                                                    <option value="PRODUCT">Product</option>
                                                    <option value="BANK">Bank</option>
                                                    <option value="NGO">NGO</option>
                                                    <option value="OTHER">Others</option>
                                                </select>                           
                                            </div>
                                            <div style="display: none;" class="group vip_rfToOthers">
                                                <input type="text" onclick="removeerror(this.id)" name="work_ref" id="work_ref">
                                                <span class="highlight"></span>
                                                <span class="bar"></span>
                                                <label>Reference To Others</label>
                                            </div>

                                            <div class="group fs14"> Work Known For:
                                                <select onchange="removeerror(this.id)" name="work_know" id="work_know">
                                                    <option value="">select Work Known</option>
                                                    <option value="Actor">Actor</option>
                                                    <option value="Singer">Singer</option>
                                                    <option value="Musician">Musician</option>
                                                    <option value="Credit Manager">Credit Manager</option>
                                                    <option value="Bank Manager">Bank Manager</option>
                                                    <option value="Bank Director">Bank Director</option>
                                                    <option value="Accounts Manager">Accounts Manager</option>
                                                </select>                           
                                            </div>
                                            <p class="mab10 fs14"></p>
                                            <div class="group fs14">Audience Type:&nbsp;&nbsp;&nbsp;
                                                <select onchange="removeerror(this.value)" name="audencetype_vip" id="audencetype_vip">
                                                    <option value="">Audience Type</option>
                                                    <option value="National">National</option>
                                                    <option value="Inter National">Inter National</option>
                                                </select>
                                            </div> 
                                            <div class="group">
                                                <input type="text" onclick="removeerror(this.id)" name="screen_Name" id="screen_Name">
                                                <span class="highlight"></span>
                                                <span class="bar"></span>
                                                <label>Screen Name</label>
                                            </div>

                                            <div class="group">
                                                <input type="text" onclick="removeerror(this.id)" name="vip_desc" id="vip_desc">
                                                <span class="highlight"></span>
                                                <span class="bar"></span>
                                                <label>Description</label>
                                            </div>

                                            <div class="group">
                                                <input type="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" onblur="is_Valid_Email(this.value)" onclick="removeerror(this.id)" name="vip_offc_mail" id="vip_offc_mail">
                                                <span class="highlight"></span>
                                                <span class="bar"></span>
                                                <label>Official Mail</label>
                                            </div>

                                            <div class="group">
                                                <input type="tel"  onblur="is_Valid_Mobile_Number(this.value)" onclick="removeerror(this.id)" name="vip_offc_mno" placeholder="+91-9523656123" id="vip_offc_mno" maxlength="17">
                                                <span class="highlight"></span>
                                                <span class="bar"></span>
                                                <label>Official Mobile No</label>
                                            </div>          	



                                            <div class="group">
                                                <input type="text" onclick="removeerror(this.id)" name="Addr1_vip" id="Addr1_vip">
                                                <span class="highlight"></span>
                                                <span class="bar"></span>
                                                <label>Address Line1</label>
                                            </div>



                                            <div class="group">
                                                <input type="text" onclick="removeerror(this.id)" name="Addr2_vip" id="Addr2_vip">
                                                <span class="highlight"></span>
                                                <span class="bar"></span>
                                                <label>Address Line2</label>
                                            </div>



                                            <div class="group fs14">Country:
                                                <select onclick="removeerror(this.id)" name="vip_country" id="vip_country">
                                                    <option value="">Select Country</option>
                                                </select>
                                            </div>

                                            <div class="group fs14">State:&nbsp;&nbsp;&nbsp;&nbsp;
                                                <select onchange="removeerror(this.id)" name="vip_state" id="vip_state">
                                                    <option value="">Select State</option>
                                                </select>
                                            </div>
                                            <p class="mab10 fs14"></p>
                                            <div class="group fs14">City:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                <select onchange="removeerror(this.id)" name="vip_city" id="vip_city">
                                                    <option value="">Select City</option>
                                                </select>

                                            </div>
                                            <div class="group">
                                                <input type="text"  onblur="is_Valid_zipcode(this.value)" onclick="removeerror(this.id)" name="vip_zipcode" id="vip_zipcode">
                                                <span class="highlight"></span>
                                                <span class="bar"></span>
                                                <label>Enter the zip code</label>
                                            </div>
                                            <div class="group">
                                                <input type="text"  onblur="is_Valid_extn(this.value)" onclick="removeerror(this.id)" name="vip_land_extn" id="vip_land_extn">
                                                <span class="highlight"></span>
                                                <span class="bar"></span>
                                                <label>Landline Extension</label>
                                            </div>
                                            <div class="group">
                                                <input type="text" onblur="is_Valid_land(this.value)" onclick="removeerror(this.id)" name="vip_landNo" id="vip_landNo">
                                                <span class="highlight"></span>
                                                <span class="bar"></span>
                                                <label>Landline No</label>
                                            </div>                      
                                            <div class="group busness_name_vip">
                                                <input type="text" onclick="removeerror(this.id)" name="vip_comname" id="vip_comname">
                                                <span class="highlight"></span>
                                                <span class="bar"></span>
                                                <label>Enter the Business name</label>
                                            </div>





                                            <div class="group busness_site_vip">
                                                <input type="text" onclick="removeerror(this.id)" name="vip_com_web" id="vip_com_web">
                                                <span class="highlight"></span>
                                                <span class="bar"></span>
                                                <label>Business Web Site</label>
                                            </div>
                                            <div id="sucess_vip" class="fs14"></div>


                                            <button onclick="vip_sumbit_popl()" id="Send" class="os_vip_sumbmit" type="submit">Request for account</button>
                                        </form>
                                    </div>


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
<script src="<?php echo base_url().'assets/js/buzzin.js' ?>"></script>