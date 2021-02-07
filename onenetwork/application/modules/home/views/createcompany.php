<?php
$this->load->module('templates');
$this->templates->header();
?>
<style>
        </style>

<div class="codes_module_container_wrap"> <!--module_container start here-->
    <div class="codes_wrapper-inner"><!--wrapper inner start here--> 
        <div class="codes_createcompany_banner"><!--company banner start here-->
            <img src="<?php echo base_url(); ?>assets/images/slide2.jpg"  alt="banner">
        </div> <!--company banner closed here-->
        <div class="codes_pagetitle"><!--page title start here-->
            <p>Create Company</p>
            
        </div><!--page title end here-->
        <div class="clearfix"></div>
        
        
        
        <form action="" name="createcompany_form" id="createcompany_form"  method="post" enctype="multipart/form-data" >
            <div class="codes_find_formgroup"><!--codes find form group start here-->
                <div style="padding:50px;">
                <form class="ble-form_danation">
                    <div class="ble-fg ble-fg-dantion">
                        <label> Company Name  </label>
                        <input id="org_name" name="org_name" placeholder="Please enter Company Name" type="text">
                    </div>
                    <div class="ble-fg ble-fg-dantion">
                        <label> Website Url  </label>
                        <input  id="web_url" name="web_url" placeholder="Please enter company Website Url" type="text">
                    </div>
                               <div class="ble-fg ble-fg-dantion">
                        <label> Country </label>
                    <select  name="codev_Country" id="codev_Country">
    <option value="">--select--</option>
    <?php foreach($countries_info as $countries_inf){
      ?>
    <option value="<?php echo $countries_inf["country_id"]; ?>"><?php echo $countries_inf["country_name"]; ?></option>
    <?php
    }?>
</select>                    </div>
         
                    <div class="ble-fg ble-fg-dantion">
                        <label> Password  </label>
                        <input  id="password_u" name="password_u" placeholder="Please enter company password" type="password">
                        <span id="messageValPwd">
                        </span>
                    </div>
                    <div class="ble-fg ble-fg-dantion">
                        <label> Re Enter Password  </label>
                        <input  id="password_ure" name="password_ure" placeholder="Please enter company password" type="password">
                        
                    </div>
                    
                    
         
                    <div class="ble-fg ble-fg-dantion">
                        <label>Industry Type</label>
                        
                                    <?php
                            $industry = ["Accounting", "Advertising", "Agriculture", "Airlines/Aviation", "Alternative Dispute Resolution", "Aluminium", "Alternative Medicine", "Alternative Medicine", "Animation", "Apparel & Accessories", "Architecture & Planning", "Arts and Crafts", "Automobile", "Aviation & Aerospace", "Banking", "Biotechnology", "Broadcast Media", "Building Materials", "Business Supplies and Equipment", "Copper Industry", "Construction Industry", "Civil Engineering", "Civic & Social Organization", "Chemicals", "Cement Industry", "Call Centers", "Capital Markets",
                                "Venture Capital & Private Equity", "Veterinary", "Wholesale", "Wine and Spirits", "Warehousing", "Zinc Industry", "Writing and Editing", "Wireless", "Facilities Services", "Executive Office", "Events Services", "Environmental Services", "Entertainment", "Electrical/Electronic Manufact", "E-Learning", "Education Management", "Diamond Industry", "Design", "Defense & Space", "Dairy", "Cotton Industry", "Cottage Industry", "Cosmetics", "Consumer Services", "Consumer Goods", "Consumer Electronics", "Construction", "Computer Software", "Computer Networking", "Computer Hardware", "Computer Games", "Computer & Network Security", "Commercial Real Estate", "Furniture", "Fund-Raising", "Food Production", "Food & Beverages", "Fishery", "Fine Art", "Financial Services", "Film industry", "Fertilizer Industry", "Fashion Industry", "Farming",
                                "Jute Industry", "Investment Banking", "Investment Management", "Judiciary", "Jewellary Industry", "International Trade and Development", "International Affairs", "Insurance", "Information Technology and Services", "Industrial Automation", "Information Services", "Individual & Family Services", "Import and Export", "Human Resources", "Hotel", "Hospitality", "Hospital & Health Care", "Higher Education", "Health, Wellness and Fitness", "Granite Industry", "Graphic Design", "Government Relations", "Government Administration", "Glass, Ceramics & Concrete", "Garmet Industry", "Gambling & Casinos", "Mechanical or Industrial Engine", "Market Research", "Marketing and Advertising", "Management Consulting", "Machinery", "Libraries", "Logistics and Supply Chain", "Luxury Goods & Jewelry", "Leisure, Travel & Tourism", "Legislative Office", "Legal Services", "Law Practice", "Law Enforcement",
                                "Publishing", "Public Relations and Communication", "Public Safety", "Public Policy", "Professional Training & Coachi", "Program Development", "Printing", "Primary/Secondary Education", "Political Organization", "Poultry Industry", "Plastics", "Photography", "Philanthropy", "Performing Arts", "Pharmaceuticals", "Pearls Industry", "Paper & Forest Products", "Package/Freight Delivery", "Packaging and Containers", "Rubber Industry", "Retail", "Research", "Restaurants", "Renewables & Environment", "Religious Institutions", "Recreational Facilities and Services", "Real Estate", "Ranching", "RailRoad Manufacture", "Railway", "Solar Industry", "Security and Investigations", "Semiconductors", "Shipbuilding", "Soap & Detergent", "Sporting Goods", "Sports", "Staffing and Recruiting", "Supermarkets", "Sugar Industry", "Steel Industry", "Utilities", "Turbine Industry", "Transportation/Trucking/Railroad", "Translation and Localization", "Toursim", "Toy Industry", "Tobacco", "Think Tanks", "Television", "Textiles", "Telecommunications",
                                "Media Production", "Medical Devices", "Mental Health Care", "Medical Practice", "Military", "Mining & Metals", "Ministary", "Museums and Institutions", "Motion Pictures and Film", "Music", "Nanotechnology", "Nonprofit Organization Management", "Newspapers", "Oil & Energy", "Defense & Space", "Outsourcing/Offshoring", "Online Media"
                            ];
                            sort($industry);
                            ?>

                            <select id="company_type" name="company_type">
                                <option value="">Select Industry</option>
                                <?php foreach ($industry as $industryinfo) {
                                    ?>
                                    <option value="<?php echo $industryinfo; ?>"><?php echo $industryinfo; ?></option>
                                    <?php }
                                ?>
                            </select>
                    </div>
                    <div class="ble-fg ble-fg-dantion">
                        <label> Founded Year  </label>
                        <input  id="found_on"  name="found_on" placeholder="Please enter Founded Year" type="text">
                    </div>
                    <div class="ble-fg ble-fg-dantion">
                        <label> Nature Of Organization</label>
                        
                        
                         <select id="n_orgd" name="n_orgd">
                                <option value="">Select Organization</option>
                                <option value="Privately Held">Privately Held</option>
                                <option value="Government">Government</option>
                                <option value="Public">Public</option>
                                <option value="Non-Profitable Organization">Non-Profitable Organization</option>
                                <option value="Self Owned">Self Owned</option>
                            </select>
                    </div>
                    
<!--
                    <div class="ble-submit">
                        <input name="button" class="case-btn-donation aright" value="SUBMIT" type="button">
                    </div>-->
                <!--</form>-->
    
                </div>
                <!--codes find form group right closed here-->
                
                <div id="messageValPacks" class="codes_errorMessage"></div>
                <div id="messageValIagre" class="codes_errorMessage"></div>
                <div id="messageValZip" class="codes_errorMessage"></div>
                <div id="messageValPwd" class="codes_errorMessage"></div>
                <div id="messageValConfPwd" class="codes_errorMessage"></div>
                <div id="messageValMob" class="codes_errorMessage"></div>
            </div><!--codes find form group closed here-->
            <div id="createcmpny_popservices" class="codes_createcomp_popup"><!--pop up start here-->
                <?php
                $this->load->module('home');
                $this->home->createcmpny_popPage();
                ?>
            </div><!--pop up closed here-->
        </form>
        <?php
        $this->load->module('paypal');
        $this->paypal->displayPaypalPage();
        ?>      
    </div> <!--codes wrapper inner closed here--> 
    <?php
    $this->templates->footer();
    ?>
