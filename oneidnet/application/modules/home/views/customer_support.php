<?php
$this->load->module('templates');
$this->templates->content_header();
?>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css"/>
<div class="middle_content">
    <!-- Start Left -->
    <div class="main_content_left">
        <div class="left_links">
            <ul>
                <li class="about_img"><a href="<?php echo base_url() . 'home/aboutus' ?>" ></a></li>
                <li class="policies_img"><a href="<?php echo base_url() . 'home/policies' ?>" ></a></li>
                <li class="foundation_img"><a href="<?php echo base_url() . 'home/foundation' ?>"></a></li>
                <li class="privacy_img"><a href="<?php echo base_url() . 'home/privacy' ?>"></a></li>
                <li class="tc_img"><a href="<?php echo base_url() . 'home/termsconditions' ?>"></a></li>
                <?php if($type == 'module' && $type != 'representative' && $type != 'add'){?>
                    <li class="cs_img_active"><a href="<?php echo base_url() . 'home/customersupport' ?>"></a></li>
                <?php }else{?>
                    <li class="cs_img"><a href="<?php echo base_url() . 'home/customersupport' ?>"></a></li>
                <?php } ?>
                <li class="cu_img"><a href="<?php echo base_url() . 'home/contactus' ?>"></a></li>
                <li class="all_img"><a href="<?php echo base_url() . 'home/allinone' ?>"></a></li>
                    <?php 
                    $obj = $this->load->module('cookies');
                    $db_api = $this->load->module('db_api');
                    $sup_query = "SELECT * FROM iws_profiles iws INNER JOIN oneid_support os ON os.one_email = iws.email WHERE profile_id='".$obj->getUserID()."'";
                    $emp_rest = $db_api->custom($sup_query);
                    if($emp_rest){?>
                        <li class="sacc_img"><a href="<?php echo base_url() . 'home/emp_support_access'?>"></a></li>
                    <?php } ?>
                <?php 
                    if($add_repre_support != "" || $repre != ""){
                        if($type != 'module' && $type != 'representative' && $type == 'add'){?>
                        <li class="asupp_img_active"><a href="<?php echo base_url() . 'home/createsupport_emp' ?>"></a></li>
                <?php }else{?>
                        <li class="asupp_img"><a href="<?php echo base_url() . 'home/createsupport_emp' ?>"></a></li>
                    <?php }
                    } ?>
                    <?php
                    if($add_repre_support != ""){
                        if($type != 'module' && $type != 'add' && $type == 'representative'){?>
                            <li class="arepre_img_active"><a href="<?php echo base_url() . 'home/add_representative' ?>"></a></li>
                    <?php }else{?>
                            <li class="arepre_img"><a href="<?php echo base_url() . 'home/add_representative' ?>"></a></li>
                    <?php }
                    } ?>
            </ul>
        </div>
    </div>
    <!-- End Left -->
    <!-- Start Right -->
    <div class="main_content_right">
        <?php if($type == 'add'){?>
            <div class="form_area" style="width: 40%">
                <div class="fll">
                        <div class="ble-fg ble-fg-dantion" style="padding-bottom: 20px;">
                            <label>  EMAIL ID </label>
                            <input type="text" placeholder="Please enter email address here" id="support_email" name="support_email">
                            <p id="support_err_0" class='fs11 red clearfix'></p>
                        </div>
                        <div class="ble-fg ble-fg-dantion" style="padding-bottom: 20px;">
                            <label>  MODULE  </label>
                            <input type="text" placeholder="Module" id="support_module" name="support_module" value="<?php echo $mode?>">
                            <p id="support_err_1" class='fs11 red clearfix'></p>
                        </div>
                        <div class="ble-fg ble-fg-dantion" style="padding-bottom: 20px;">
                            <label>  TYPE  </label>
                            <select id="support_type" name="support_type">
                                <?php 
                                    $db_api = $this->load->module('db_api');
                                    $onesup_query = "SELECT * FROM oneid_support";
                                    $result = $db_api->custom($onesup_query);
                                    foreach ($result as $support) {
                                    echo '<option value="'.$support['one_type'].'">'.$support['one_type'].'</option>';
                                    }
                                    echo '<option value="all" selected>ALL</option>';
                                ?>
                            </select>
                            <input type="text" placeholder="Support Type" id="support_type1" name="support_type1" value="">
                            <p id="contact_subject_error" class='fs11 red clearfix'></p>
                        </div>
                        <div class="ble-fg ble-fg-dantion" style="padding-bottom: 20px;">
                            <label>Mail Address (SUPPORT EMPLOYEE)</label>
                            <input type="text" placeholder="Enter E-mail address (SUPPORT EMPLOYEE)" id="support_usename" name="support_usename" value="">
                            <p id="support_err_2" class='fs11 red clearfix'></p>
                        </div>
                        <div class="ble-fg ble-fg-dantion" style="padding-bottom: 20px;">
                            <label>PASSWORD (SUPPORT EMPLOYEE)</label>
                            <input type="password" placeholder="Enter password (SUPPORT EMPLOYEE)" id="support_pass" name="support_pass" value="">
                            <p id="support_err_3" class='fs11 red clearfix'></p>
                        </div>
                        <div class="arrows_box" style="color:#fff;display:none">
                            
                        </div>
                        <div class="ble-submit">
                            <input type="submit" class="btn btn-primary btn-large" id="support_submit" value="Submit">
                        </div>
                </div>
            </div>
            <div style="width: 50%;float: right;">
                <h1 style="margin-bottom: 50px;text-align: center;color: aliceblue;">SUPPORT TEAM RECORDS</h1>
            <table id="recordListing" width="30%">
                <thead>
                    <tr>
                        <th>#</th>
                        <th style="width: 30%">E-MAIL</th>    
                        <th>MODULE</th>  
                        <th>TYPE</th>    
                        <th></th>    
                        <th></th>                   
                    </tr>
                </thead>
            </table>
            </div>
<script type="text/javascript" src="<?php echo base_url().'assets/microjs/support.js'?>"></script>
        <?php }else if($type != 'add' && $type != 'module' && $type != 'representative'){?>
            <div class="form_area">
                <div class="mat40 wi90 fll">
                        <div class="ble-fg ble-fg-dantion">
                            <label>  Support (<?php echo $mode?>)  </label>
                            <label style="color: aqua;margin-bottom: 27px;"> <?php echo $type?> </label>
                            <input type="hidden" name="supp_module" id="supp_module" value="<?php echo $mode?>">
                            <input type="hidden" name="supp_type" id="supp_type" value="<?php echo $type?>">
                        </div>
                        <div class="ble-fg ble-fg-dantion" style="padding-bottom: 20px;">
                            <label>  SUBJECT  </label>
                            <input type="text" placeholder="Please enter subject here" id="supp_subject" name="supp_subject">
                            <p id="user_err_0" class='fs11 red clearfix'></p>
                        </div>

                        <div class="ble-fg ble-fg-dantion" style="padding-bottom: 20px;">
                            <label>Message</label>
                            <textarea rows="6" placeholder="Please enter your message here" name="supp_message" id="supp_message"></textarea>
                            <p id="user_err_1" class='fs11 red clearfix'></p>
                        </div>
                        <div class="arrows_box" style="color:#fff;display:none">
                            
                        </div>
                        <div class="ble-submit">
                            <input type="submit" class="btn btn-primary btn-large" id="user_submit" value="Submit">
                        </div>
                </div>
            </div>
<script type="text/javascript" src="<?php echo base_url().'assets/microjs/send_support.js'?>"></script>
        <?php }else if($type == 'representative') {?>
            <div class="form_area" style="width: 40%">
                <div class="mat40 wi90 fll">
                        <div class="ble-fg ble-fg-dantion" style="padding-bottom: 20px;">
                            <label>  Representative E-Mail  </label>
                            <input type="text" placeholder="Please enter email (ex. xyz@oneidnet.com)" id="repre_mail" name="repre_mail">
                            <p id="repre_err_0" class='fs11 red clearfix'></p>
                        </div>
                        <div class="arrows_box" style="color:#fff;display:none">
                        </div>
                        <div class="ble-submit">
                            <input type="submit" class="btn btn-primary btn-large" id="repre_submit" value="Submit">
                        </div>
                </div>
            </div>
            <div style="width: 50%;float: right;">
                <h1 style="margin-bottom: 50px;text-align: center;color: aliceblue;">REPRESENTATIVE RECORDS</h1>
            <table id="recordListing_repre">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>E-MAIL</th>
                        <th></th>                   
                    </tr>
                </thead>
            </table>
            </div>
<script type="text/javascript" src="<?php echo base_url().'assets/microjs/send_representative.js'?>"></script>
        <?php } else{?>
        <div class="heading_content">CUSTOMER SUPPORT</div>
        <div STYLE="font-size: 16px;color:#ffb700;margin-bottom:15px;" >THIS FUNCTIONALITY HAS BEEN DISCONTINUED, WILL RESUME SHORTLY</div>
        <div class="main_content_right_scroll">

          

            <div class="icons_names showhidedropdown">

                <ul>

                    <li >
                        <a href="#">
                            <img src="<?php echo base_url() . 'assets/Images/onenetwork.png' ?>"  width="40" height="40px" class="image_place"/>
                            <div class="images_text">ONE NETWORK</div>
                        </a>
                    </li>

                    <li >
                        <a href="#">
                            <img src="<?php echo base_url() . 'assets/Images/mail.png' ?>"  width="40" height="40px" class="image_place"/>
                            <div class="ima<?php echo base_url() . 'assets/Images/onenetwork.png' ?>ges_text">360 MAIL</div>
                        </a>
                    </li>

                    <li >
                        <a href="#">
                            <img src="<?php echo base_url() . 'assets/Images/click.png' ?>"  width="40" height="40px" class="image_place"/>
                            <div class="images_text">CLICK</div>
                        </a>
                    </li>

                    <li >
                        <a href="#">
                            <img src="<?php echo base_url() . 'assets/Images/buzzin.png' ?>"  width="40" height="40px" class="image_place"/>
                            <div class="images_text">BUZZIN</div>
                        </a>
                    </li>


                    <li >
                        <a href="#">
                            <img src="<?php echo base_url() . 'assets/Images/tunnel.png' ?>"  width="40" height="40px" class="image_place"/>
                            <div class="images_text">THE TUNNEL</div>
                        </a>
                    </li>

                    <li >
                        <a href="#">
                            <img src="<?php echo base_url() . 'assets/Images/vcom.png' ?>"  width="40" height="40px" class="image_place"/>
                            <div class="images_text">VCOM</div>
                        </a>
                    </li>

                    <li >
                        <a href="#">
                            <img src="<?php echo base_url() . 'assets/Images/oneshop.png' ?>"  width="40" height="40px" class="image_place"/>
                            <div class="images_text">ONESHOP</div>
                        </a>

                        <ul class="dropdown">
                            <?php 
                                $db_api = $this->load->module('db_api');
                                $onesup_query = "SELECT * FROM `oneid_support`";
                                $result = $db_api->custom($onesup_query);
                                foreach ($result as $support) {
                                echo '<li class="text_style"><a href="'.base_url().'home/customersupport_form?type='.$support["one_type"].'&mod=ONESHOP">'.$support['one_type'].'</a></li>';
                                }
                                echo '<li class="text_style"><a href="'.base_url().'home/customersupport_form?type=All&mod=ONESHOP">All</a></li>';
                            ?>
                        </ul>
                    </li>

                    <li >
                        <a href="#">
                            <img src="<?php echo base_url() . 'assets/Images/netpro.png' ?>"  width="40" height="40px" class="image_place"/>
                            <div class="images_text">NETPRO</div>
                        </a>
                    </li>


                    <li >
                        <a href="#">
                            <img src="<?php echo base_url() . 'assets/Images/cooffice.png' ?>"  width="40" height="40px" class="image_place"/>
                            <div class="images_text">CORPORATE OFFICE</div>
                        </a>
                    </li>

                    <li >
                        <a href="#">
                            <img src="<?php echo base_url() . 'assets/Images/cvbank.png' ?>"  width="40" height="40px" class="image_place"/>
                            <div class="images_text">CVBANK</div>
                        </a>
                    </li>

                    <li >
                        <a href="#">
                            <img src="<?php echo base_url() . 'assets/Images/traveltime.png' ?>"  width="40" height="40px" class="image_place"/>
                            <div class="images_text">TRAVEL TIME</div>
                        </a>
                    </li>

                    <li >
                        <a href="#">
                            <img src="<?php echo base_url() . 'assets/Images/oneidship.png' ?>"  width="40" height="40px" class="image_place"/>
                            <div class="images_text">ONEIDSHIP</div>
                        </a>
                    </li>


                    <li >
                        <a href="#">
                            <img src="<?php echo base_url() . 'assets/Images/findit.png' ?>"  width="40" height="40px" class="image_place"/>
                            <div class="images_text">FIND IT</div>
                        </a>
                    </li>

                    <li >
                        <a href="#">
                            <img src="<?php echo base_url() . 'assets/Images/isnews.png' ?>"  width="40" height="40px" class="image_place"/>
                            <div class="images_text">IS NEWS</div>
                        </a>
                    </li>

                    <li >
                        <a href="#">
                            <img src="<?php echo base_url() . 'assets/Images/onevision.png' ?>"  width="40" height="40px" class="image_place"/>
                            <div class="images_text">ONE VISION</div>
                        </a>
                    </li>

                    <li >
                        <a href="#">
                            <img src="<?php echo base_url() . 'assets/Images/dealerx.png' ?>"  width="40" height="40px" class="image_place"/>
                            <div class="images_text">DEALER X</div>
                        </a>
                    </li>

                </ul>

            </div>


            <div class="sub_heading_content">DIRECT SUPPORT</div>


            <div class="icons_names1">

                <ul>

                    <li >
                        <a href="#">

                            <div class="images_text">ADMINISTRATION</div>
                        </a>
                    </li>

                    <li >
                        <a href="#">

                            <div class="images_text">SERVICE AGREEMENTS</div>
                        </a>
                    </li>

                    <li >
                        <a href="#">

                            <div class="images_text">SECURITY</div>
                        </a>
                    </li>

                    <li >
                        <a href="#">

                            <div class="images_text">TECHNICAL SUPPORT</div>
                        </a>
                    </li>

                </ul>
            </div>

            <div class="sub_heading_content">REQUEST SUPPORT FROM OUR ONE NETWORK DIVISIONS</div>

            <div class="icons_names1">

                <ul>

                    <li >
                        <a href="#">

                            <div class="images_text">ADMINISTRATION</div>
                        </a>
                    </li>

                    <li >
                        <a href="#">

                            <div class="images_text">OPERATIONS</div>
                        </a>
                    </li>

                    <li >
                        <a href="#">

                            <div class="images_text">LOGISTICS</div>
                        </a>
                    </li>

                    <li >
                        <a href="#">

                            <div class="images_text">ENGINEERING</div>
                        </a>
                    </li>

                    <li >
                        <a href="#">

                            <div class="images_text">RESEARCH AND DEVELOPMENT</div>
                        </a>
                    </li>

                    <li >
                        <a href="#">

                            <div class="images_text">LABORATORIES</div>
                        </a>
                    </li>

                    <li >
                        <a href="#">

                            <div class="images_text">TECHNOLOGY</div>
                        </a>
                    </li>

                    <li >
                        <a href="#">

                            <div class="images_text">ACCOUNTING AND FINANCE</div>
                        </a>
                    </li>


                    <li >
                        <a href="#">

                            <div class="images_text">HUMAN RESOURCES</div>
                        </a>
                    </li>

                    <li >
                        <a href="#">

                            <div class="images_text">CONTRACTING</div>
                        </a>
                    </li>


                </ul>
            </div>


            <div class="sub_heading_content"> HOW CAN WE HELP YOU? </div>


            <div class="icons_names2 showhidedropdown">

                <ul >


                    <li>
                        <a href="#">CONTROL PANEL &#9662;</a>
                        <ul class="dropdown" >
                            <li class="text_style"><a href="#">Compatibility</a></li>
                            <li class="text_style"><a href="#">Notifications</a></li>
                            <li class="text_style"><a href="#">Use</a></li>
                            <li class="text_style"><a href="#">Data</a></li>
                            <li class="text_style"><a href="#">Collaboration</a></li>
                            <li class="text_style"><a href="#">Verification</a></li>
                            <li class="text_style"><a href="#">Other</a></li>
                        </ul>
                    </li>


                    <li>

                        <a href="#">MODULE SUPPORT &#9662;</a>
                        <ul class="dropdown" >
                            <li class="text_style"><a href="#">Use</a></li>
                            <li class="text_style"><a href="#">Interface</a></li>
                            <li class="text_style"><a href="#">Services</a></li>
                            <li class="text_style"><a href="#">Data</a></li>
                            <li class="text_style"><a href="#">Technical</a></li>
                            <li class="text_style"><a href="#">Register</a></li>
                            <li class="text_style"><a href="#">Other</a></li>
                        </ul>

                    </li>

                    <li >

                        <a href="#">SERVICES REGISTER &#9662;</a>
                        <ul class="dropdown" >
                            <li class="text_style"><a href="#">Agreements</a></li>
                            <li class="text_style"><a href="#">Packages</a></li>
                            <li class="text_style"><a href="#">Services</a></li>
                            <li class="text_style"><a href="#">Details</a></li>
                            <li class="text_style"><a href="#">Representation</a></li>
                            <li class="text_style"><a href="#">Verification</a></li>
                            <li class="text_style"><a href="#">Other</a></li>
                        </ul>

                    </li>

                    <li >

                        <a href="#">SPECIAL SERVICES &#9662;</a>
                        <ul class="dropdown" >
                            <li class="text_style"><a href="#">Type</a></li>
                            <li class="text_style"><a href="#">OneNetwork</a></li>
                            <li class="text_style"><a href="#">DealerX</a></li>
                            <li class="text_style"><a href="#">Events</a></li>
                            <li class="text_style"><a href="#">Sponsor</a></li>
                            <li class="text_style"><a href="#">Calendar</a></li>
                            <li class="text_style"><a href="#">Other</a></li>
                        </ul>
                    </li>
                    <li >


                        <a href="#">PAYMENT &#9662;</a>
                        <ul class="dropdown" >
                            <li class="text_style"><a href="#">NetPro</a></li>
                            <li class="text_style"><a href="#">PayBook</a></li>
                            <li class="text_style"><a href="#">Verification</a></li>
                            <li class="text_style"><a href="#">Credit Cards</a></li>
                            <li class="text_style"><a href="#">Transactions</a></li>
                            <li class="text_style"><a href="#">Penalties</a></li>
                            <li class="text_style"><a href="#">Other</a></li>
                        </ul>


                    </li>

                    <li >
                        <a href="#">PROMOTIONS &#9662;</a>
                        <ul class="dropdown" >
                            <li class="text_style"><a href="#">Premier</a></li>
                            <li class="text_style"><a href="#">Government</a></li>
                            <li class="text_style"><a href="#">Private</a></li>
                            <li class="text_style"><a href="#">Public</a></li>
                            <li class="text_style"><a href="#">Partners</a></li>
                            <li class="text_style"><a href="#">Initiate</a></li>
                            <li class="text_style"><a href="#">Other</a></li>
                        </ul>
                    </li>


                    <li >
                        <a href="#">TECHNICAL ISSUE &#9662;</a>
                        <ul class="dropdown" >
                            <li class="text_style"><a href="#">Error Report</a></li>
                            <li class="text_style"><a href="#">Malfunction</a></li>
                            <li class="text_style"><a href="#">Compatibility</a></li>
                            <li class="text_style"><a href="#">System</a></li>
                            <li class="text_style"><a href="#">Module</a></li>
                            <li class="text_style"><a href="#">Devices</a></li>
                            <li class="text_style"><a href="#">Other</a></li>
                        </ul>
                    </li>

                    <li >
                        <a href="#">SYSTEM SUPPORT &#9662;</a>
                        <ul class="dropdown" >
                            <li class="text_style"><a href="#">Use</a></li>
                            <li class="text_style"><a href="#">Interface</a></li>
                            <li class="text_style"><a href="#">Services</a></li>
                            <li class="text_style"><a href="#">Data</a></li>
                            <li class="text_style"><a href="#">Personalization</a></li>
                            <li class="text_style"><a href="#">Network</a></li>
                            <li class="text_style"><a href="#">Other</a></li>
                        </ul>
                    </li>
                    <li >
                        <a href="#">DELAYS &#9662;</a>
                        <ul class="dropdown" >
                            <li class="text_style"><a href="#">Services</a></li>
                            <li class="text_style"><a href="#">User</a></li>
                            <li class="text_style"><a href="#">Staff</a></li>
                            <li class="text_style"><a href="#">Store</a></li>
                            <li class="text_style"><a href="#">Office</a></li>
                            <li class="text_style"><a href="#">Activation</a></li>
                            <li class="text_style"><a href="#">Other</a></li>
                        </ul>
                    </li>

                    <li >
                        <a href="#">ADMINISTRATION &#9662;</a>
                        <ul class="dropdown" >
                            <li class="text_style"><a href="#">Complaint</a></li>
                            <li class="text_style"><a href="#">Suggestions</a></li>
                            <li class="text_style"><a href="#">Meet</a></li>
                            <li class="text_style"><a href="#">Escalation</a></li>
                            <li class="text_style"><a href="#">People Care</a></li>
                            <li class="text_style"><a href="#">Visit</a></li>
                            <li class="text_style"><a href="#">Other</a></li>
                        </ul>
                    </li>

                    <li >
                        <a href="#">REPORT &#9662;</a>
                        <ul class="dropdown" >
                            <li class="text_style"><a href="#">User</a></li>
                            <li class="text_style"><a href="#">Group</a></li>
                            <li class="text_style"><a href="#">Violations</a></li>
                            <li class="text_style"><a href="#">Scams</a></li>
                            <li class="text_style"><a href="#">Intrusion</a></li>
                            <li class="text_style"><a href="#">Crimes</a></li>
                            <li class="text_style"><a href="#">Other</a></li>
                        </ul>
                    </li>

                    <li >
                        <a href="#">FRAUD &#9662;</a>
                        <ul class="dropdown" >
                            <li class="text_style"><a href="#">User</a></li>
                            <li class="text_style"><a href="#">Group</a></li>
                            <li class="text_style"><a href="#">Government</a></li>
                            <li class="text_style"><a href="#">Action</a></li>
                            <li class="text_style"><a href="#">Legal</a></li>
                            <li class="text_style"><a href="#">Response</a></li>
                            <li class="text_style"><a href="#">Other</a></li>
                        </ul>
                    </li>

                    <li >
                        <a href="#">SERVICE &#9662;</a>
                        <ul class="dropdown" >
                            <li class="text_style"><a href="#">Praise</a></li>
                            <li class="text_style"><a href="#">Complaint</a></li>
                            <li class="text_style"><a href="#">Suggestions</a></li>
                            <li class="text_style"><a href="#">Add</a></li>
                            <li class="text_style"><a href="#">Packages</a></li>
                            <li class="text_style"><a href="#">Expand</a></li>
                            <li class="text_style"><a href="#">Other</a></li>
                        </ul>

                    <li >
                        <a href="#">ONEIDNET EVENTS &#9662;</a>
                        <ul class="dropdown" >
                            <li class="text_style"><a href="#">Schedule</a></li>
                            <li class="text_style"><a href="#">Participate</a></li>
                            <li class="text_style"><a href="#">Sponsor</a></li>
                            <li class="text_style"><a href="#">Attendance</a></li>
                            <li class="text_style"><a href="#">Pre-Event</a></li>
                            <li class="text_style"><a href="#">Special Guests</a></li>
                            <li class="text_style"><a href="#">Other</a></li>
                        </ul>
                    </li>

                    <li >
                        <a href="#">ONENETWORK &#9662;</a>
                        <ul class="dropdown" >
                            <li class="text_style"><a href="#">Organization</a></li>
                            <li class="text_style"><a href="#">Personnel</a></li>
                            <li class="text_style"><a href="#">Register</a></li>
                            <li class="text_style"><a href="#">Events</a></li>
                            <li class="text_style"><a href="#">Assistance</a></li>
                            <li class="text_style"><a href="#">Careers</a></li>
                            <li class="text_style"><a href="#">Other</a></li>
                        </ul>
                    </li>

                    <li >
                        <a href="#">SUCCESS &#9662;</a>
                        <ul class="dropdown" >
                            <li class="text_style"><a href="#">Story Request</a></li>
                            <li class="text_style"><a href="#">Congratulations</a></li>
                            <li class="text_style"><a href="#">Publish</a></li>
                            <li class="text_style"><a href="#">Be a Speaker</a></li>
                            <li class="text_style"><a href="#">Annual</a></li>
                            <li class="text_style"><a href="#">Contributions</a></li>
                            <li class="text_style"><a href="#">Other</a></li>
                        </ul>
                    </li>

                    <li >
                        <a href="#">CONTRIBUTE &#9662;</a>
                        <ul class="dropdown" >
                            <li class="text_style"><a href="#">Environment</a></li>
                            <li class="text_style"><a href="#">Energy</a></li>
                            <li class="text_style"><a href="#">Resources</a></li>
                            <li class="text_style"><a href="#">Pollution</a></li>
                            <li class="text_style"><a href="#">Water</a></li>
                            <li class="text_style"><a href="#">Special Project</a></li>
                            <li class="text_style"><a href="#">Other</a></li>
                        </ul>
                    </li>

                    <li >
                        <a href="#">PARTNER &#9662;</a>
                        <ul class="dropdown" >
                            <li class="text_style"><a href="#">Devices</a></li>
                            <li class="text_style"><a href="#">Services</a></li>
                            <li class="text_style"><a href="#">Technology</a></li>
                            <li class="text_style"><a href="#">Science</a></li>
                            <li class="text_style"><a href="#">History</a></li>
                            <li class="text_style"><a href="#">People</a></li>
                            <li class="text_style"><a href="#">Other</a></li>
                        </ul>
                    </li>

                </ul>

            </div>


            





            <div class="main_content" >

                Customer Representatives will go through their regular script until the User raises issues, which the Customer Representative

                cannot handle, at which point they will consult with their immediate supervisor.
                </iframe>
            </div>

            <div class="sub_heading_content">HELP RESOURCES</div>

            <div class="icons_names1">

                <ul>

                    <li >
                        <a href="#">

                            <div class="images_text">QUICK SYSTEM GUIDE</div>
                        </a>
                    </li>

                    <li >
                        <a href="#">

                            <div class="images_text">GENERAL CONTACT</div>
                        </a>
                    </li>

                    <li >
                        <a href="#">

                            <div class="images_text">YOUR ACCOUNT</div>
                        </a>
                    </li>

                    <li >
                        <a href="#">

                            <div class="images_text">PAYBOOK</div>
                        </a>
                    </li>

                    <li >
                        <a href="#">

                            <div class="images_text">SYSTEM SETTINGS</div>
                        </a>
                    </li>


                    <li >
                        <a href="#">

                            <div class="images_text">REGISTER FOR SERVICES</div>
                        </a>
                    </li>
                </ul>
            </div>
        <?php } ?>
        </div>
        <!-- End Right -->
    </div>
</div>
</body>
</html>
<script type="text/javascript">
    var dataRecords = $('#recordListing').DataTable({
        "processing":true,
        "serverSide":true,              
        "order":[],
        "ajax":{
            url: oneidnet_url+"home/support_list",
            type:"POST",
        },
        "columnDefs":[
            {
                "targets":[1, 2, 3, 4, 5],
                "orderable":false,
            },
        ],
            "pageLength": 10
    });    
    var dataRecords = $('#recordListing_repre').DataTable({
        "processing":true,
        "serverSide":true,              
        "order":[],
        "ajax":{
            url: oneidnet_url+"home/repre_list",
            type:"POST",
        },
        "columnDefs":[
            {
                "targets":[1, 2],
                "orderable":false,
            },
        ],
            "pageLength": 10
    });
</script>