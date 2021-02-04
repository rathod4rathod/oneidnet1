<?php
if (!defined('BASEPATH'))    exit('No direct script access allowed');

class generic extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->module('cookies');
        $this->load->module("db_api");
        $this->load->helper('security');
        $ckobj = $this->load->module("cookies");
        if ($_REQUEST) {
            $this->load->module("session_restart");
            if (isset($_REQUEST["skey"])) {
                $this->session_restart->key_check($_REQUEST["skey"]);
            }
    }
    }

    function get_userId() {
        $obj = $this->load->module('cookies');
        return $obj->getUserID();
    }
function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        $data = str_replace("'", "&#39", $data);
        return $data;
    }
    function index(){
        $this->load->view("generic/promotions_view");
    }
    // to load the basic promotion 
    function genericBasicForm($promotion_type) {

        $data["promotion_type"]=$promotion_type;
	$this->load->view("generic/basic_cr",$data) ;
    }
    // to load the basic form
    function basicFormView( $s_str,$input_data=""){
//		$i_url = $this->uri->total_segments();   // to get the count of parameters passed to the url in the browser  
//echo $s_str;
        if ($s_str  != "") {
			 $sdata = explode("_",$s_str);
			$module =  $sdata[0];
		     $target  = $sdata[1];
//		     $string = file_get_contents(base_url()."/vardefs/vardefs.json");
//             $json_a = json_decode($string, true);
//             $table = $json_a ["$module"]["$target"]['table'];
//            
		switch ( $module) {
                    case "Coffice":
                        if($target=="company"){
                            $sql = "SELECT `company_aid`,`company_name` FROM `iws_employers` WHERE `registered_by`=" . $this->get_userId();
                        $hidden = "<input type='hidden' id='promotiontype' value='COFFICE_PROFILE'>"
                                . "<input type='hidden' name='' value='" . $s_str . "' id='onenetwork_target' >"
                                . "<input type='hidden' name='' value='' id='onenetwork_target1' >";
                        $Htmlres = $this->genericDataLevel1($sql, $s_str, $hidden, $input_data);
                        }
                        if($target=="job"){
                            $sql = "SELECT cj.`job_id`,cj.`role` FROM `co_jobs` cj left join  iws_employers ie on cj.`company_id_fk`=ie.company_aid where ie.registered_by=" . $this->get_userId();
                        $hidden = "<input type='hidden' id='promotiontype' value='COFFICE_JOBS'>"
                                . "<input type='hidden' name='' value='" . $s_str . "' id='onenetwork_target' >"
                                . "<input type='hidden' name='' value='' id='onenetwork_target1' >";
                        $Htmlres = $this->genericDataLevel1($sql, $s_str, $hidden, $input_data);
                        }
                        break;
		case "Dealerx": 
                    if ($target == "auction") {
                          $sql = "SELECT da.auction_id , da.auction_name FROM `dx_auctions` da left join dx_dealers dd on da.dealer_id_fk =dd.dealer_id where dd.created_by=".$this->get_userId()." and start_on< now() and end_on>=now()";
                        $hidden = "<input type='hidden' id='promotiontype' value='DEALERX_AUCTION'>"
                                . "<input type='hidden' name='' value='" . $s_str . "' id='onenetwork_target' >"
                                . "<input type='hidden' name='' value='' id='onenetwork_target1' >";
                        $Htmlres = $this->genericDataLevel1($sql, $s_str, $hidden, $input_data);
                    }
                    if ($target == "profile") {
                        $sql = "SELECT dealer_id , company_name  FROM `dx_dealers` where  created_by =" . $this->get_userId();
                        $hidden = "<input type='hidden' id='promotiontype' value='DEALERX_PROFILE'>"
                                . "<input type='hidden' name='' value='" . $s_str . "' id='onenetwork_target' >"
                                . "<input type='hidden' name='' value='' id='onenetwork_target1' >";
                        $Htmlres = $this->genericDataLevel1($sql, $s_str, $hidden, $input_data);
                    }

                    break;	
        case "Netpro": 
 			$sql ="select   group_id , group_name   from  netpro_groups where created_by = ".$this->get_userId() ;
			$hidden="<input type='hidden' id='promotiontype' value='NETPRO_GROUPS'>"
                                . "<input type='hidden' name='' value='". $s_str ."' id='onenetwork_target' >"
                                . "<input type='hidden' name='' value='' id='onenetwork_target1' >";
			 $Htmlres = $this->genericDataLevel1($sql, $s_str ,$hidden,$input_data);
		    break;
        case "Tunnel":
			$sql ="select   rec_id , channel_name   from  tunnel_all_channels where created_by = ".$this->get_userId() ;
			if($target=="channel"){
				$hidden="<input type='hidden' id='promotiontype' value='TUNNEL_CHANNELS'>"
                                        . "<input type='hidden' name='onenetwork_target'  value='". $s_str ."'  id='onenetwork_target' >"
                                        . "<input type='hidden' name='' value='' id='onenetwork_target1' >";
                            $this->genericDataLevel1($sql, $s_str,$hidden,$input_data);
			}
			if($target=="video"){
				 $string1 ="Tunnel_channel";
				 /*$Htmlres =  $this->genericDataLevel1($sql, $string1);
				 $Htmlres1 =  $this->genericDataLevel2($s_str);*/
				//echo $result =  $Htmlres.$Htmlres1."<input type='hidden' name='' value='". $string1 ."' id='onenetwork_target' >"."<input type='hidden' name='' value='". $s_str ."' id='onenetwork_target1' >"; 
                            $hidden="<input type='hidden' id='promotiontype' value='TUNNEL_VIDEOS'>"
                                    . "<input type='hidden' name='' value='". $string1 ."' id='onenetwork_target' >"
                                    ."<input type='hidden' name='' value='". $s_str ."' id='onenetwork_target1' >";
                            $this->genericDataLevel1($sql, $string1,$hidden,$input_data);
                            $this->genericDataLevel2($s_str,$input_data);
			}
		
           break;
        case "Click":
			if($target=="event"){
				$sql ="select   event_aid , event_subject   from  click_events where created_by = ".$this->get_userId() ;
                                $hidden="<input type='hidden' id='promotiontype' value='CLICK_EVENTS'>"
                                        . "<input type='hidden' name='' value='". $s_str  ."' id='onenetwork_target' >"
                                        . "<input type='hidden' name='' value='' id='onenetwork_target1' >";			     
                                $this->genericDataLevel1($sql, $s_str ,$hidden,$input_data);
			}
			if($target=="group"){
				$sql ="select   group_aid , group_name   from  click_groups where created_by = ".$this->get_userId() ;
                                $hidden="<input type='hidden' id='promotiontype' value='CLICK_GROUPS'><input type='hidden' name='' value='".  $s_str  ."' id='onenetwork_target' ><input type='hidden' name='' value=' ' id='onenetwork_target1' >";
                                $this->genericDataLevel1($sql, $s_str ,$hidden,$input_data);
			}
		   if($target=="page"){
				$sql ="select   page_aid , page_name   from  click_pages where created_by = ".$this->get_userId() ;
                                $hidden="<input type='hidden' id='promotiontype' value='CLICK_PAGES'><input type='hidden' name='' value='".  $s_str  ."' id='onenetwork_target' ><input type='hidden' name='' value='' id='onenetwork_target1' >";
                                $this->genericDataLevel1($sql, $s_str ,$hidden,$input_data);
			
			}
		
           break;
        case "Oneshop":
            $sql ="select   store_aid , store_name   from  oshop_stores where created_by = ".$this->get_userId() ;
            if($target=="store"){
                		
                                $hidden="<input type='hidden' id='promotiontype' value='ONESHOP_STORES'><input type='hidden' name='' value='".  $s_str  ."' id='onenetwork_target' ><input type='hidden' name='' value='' id='onenetwork_target1' >";
                                $this->genericDataLevel1($sql, $s_str ,$hidden,$input_data);
            }
            if($target=="product"){
                                $string1 ="Oneshop_store";
                            $hidden="<input type='hidden' id='promotiontype' value='ONESHOP_PRODUCTS'>"
                                    . "<input type='hidden' name='' value='". $string1 ."' id='onenetwork_target' >"
                                    ."<input type='hidden' name='' value='". $s_str ."' id='onenetwork_target1' >";
                            $this->genericDataLevel1($sql, $string1,$hidden,$input_data);
                            $this->genericDataLevel2($s_str,$input_data);
            }
            	
            break;  
            case "Buzzin":
            $sql ="select  rec_aid, pics_url  from  buzzin_quick_pics where user_id_fk = ".$this->get_userId() ;
            if($target=="snapper"){                		
                                $hidden="<input type='hidden' id='promotiontype' value='ONESHOP_STORES'><input type='hidden' name='' value='".  $s_str  ."' id='onenetwork_target' ><input type='hidden' name='' value='' id='onenetwork_target1' >";
                                
            }
            if($target=="shortfilm"){
                            $string1 ="Oneshop_store";
                            $hidden="<input type='hidden' id='promotiontype' value='ONESHOP_PRODUCTS'>"
                                    . "<input type='hidden' name='' value='". $string1 ."' id='onenetwork_target' >"
                                    ."<input type='hidden' name='' value='". $s_str ."' id='onenetwork_target1' >";
                            $this->genericDataLevel1($sql, $string1,$hidden,$input_data);
                            $this->genericDataLevel2($s_str,$input_data);
            }
            	
            break;
        default:
            break;
    }
	}
		}
    function genericDataLevel1($sql, $s_string ,$hidden,$input_data=""){
        //echo $s_string;exit;
        $data['sdata'] = explode("_", $s_string );
        $dbobj = $this->load->module("db_api");
        $result = $dbobj->custom($sql);       
        $user_id=$this->get_userId();
        $d_result=$dbobj->select("promo_name","onetwork_promotions","created_by=".$user_id." order by created_on desc limit 1");
        $data["basic_info"]=$d_result;
        $data["s_string"]=$s_string;
        $data["hidden_input"]=$hidden;
        $data["result"]=$result;
        $data["input_data"]=$input_data;
        $this->load->view("generic/dataLevel1_view",$data);                 
    }
    function genericDataLevel2( $string,$input_data=""){        
        $data["string"]=$string;
        $data["input_data"]=$input_data;
        $user_id=$this->get_userId();
        //$d_result=$db_api->select("promo_name","onetwork_promotions","created_by=".$user_id." order by created_on desc limit 1");
        //$data["basic_info"]=$d_result;
        $this->load->view("generic/dataLevel2_view",$data);         
    }
	
	function getVideosInfo(){
	    $this->load->module("db_api");
	    $channelid = $_REQUEST['channelid'];
		$sql = 'SELECT  rec_id ,video_name  FROM `tunnel_all_videos` where channel_id ='.$channelid;
		$tunnelvideos =$this->db_api->custom($sql);
		?>
		<option value="">Select</option>
		<?php
		 foreach($tunnelvideos as $tvideos){?>
	     <option value="<?php echo $tvideos['rec_id'] ?>"><?php echo $tvideos['video_name'] ?></option>
	     <?php } 
	     
}
//march-14-2015 by venkatesh
function getProductsInfo(){
    $storeid=$_REQUEST["storeid"];
    $dbobj=$this->load->module("db_api");
    $products =$this->db_api->custom("select product_aid,product_name from oshop_products where store_id_fk=".$storeid);
    echo "<option value=''>Select</option>";
    if($products!=0){
    foreach($products as $productsinfo){
        echo "<option value=  ".$productsinfo['product_aid']." >  ".$productsinfo['product_name']." </option>";
    }    
    }
    
	     
	     
    
    
    
}
        //pavani
        /* oneshop module promotions */
    function oshop_store_view(){
        $dbapi=$this->load->module("db_api");
        $result=$dbapi->custom("SELECT COUNT(*) AS cnt FROM cvbank_users_details");
        $lang_result=$dbapi->custom("SELECT * FROM global_languages");
        $page_result=$dbapi->custom("SELECT page_category FROM click_pages GROUP BY page_category");
        $data["total_data"]=$result;
        $data["languages"]=$lang_result;
        $data["page_data"]=$page_result;
        $this->load->view("promotions/oshop_store_view",$data);
    }
    function getChartData(){
        $dbapi=$this->load->module("db_api");
        $result=$dbapi->custom("SELECT COUNT(*) AS total_cnt FROM iws_profiles");
        $data_points=array();     
        array_push($data_points,array("x"=>"ALL","y"=>$result[0]["total_cnt"],"name"=>"ALL"));
        echo json_encode($data_points, JSON_NUMERIC_CHECK);
    }    
    function getAudienceCount(){
        $dbapi=$this->load->module("db_api");
        /*$age=($this->input->post("age_val")!="")?$this->input->post("age_val"):"15-20";
        $gender=($this->input->post("gender_val")!="")?$this->input->post("gender_val"):"";
        $marital_status=($this->input->post("marital_val")!="")?$this->input->post("marital_val"):"";*/
        $age="15-20";
        $gender="FEMALE";
        $marital_status="";        
        $s_where="";
        $query="SELECT COUNT(*) as total_cnt";
        $subtotal=0;
        if($age!=""){            
            $age_str=$this->getAgeStr($age);
            $s_where.=$this->queryWhere($s_where,"age",$age_str);
            $query.=",(SELECT COUNT(*) FROM cvbank_users_details ".$s_where.") AS age_cnt";
        }
        if($gender!=""){
            $s_where.=$this->queryWhere($s_where,"gender",$gender);
            $query.=",(SELECT COUNT(*) FROM cvbank_users_details ".$s_where.") AS gender_cnt";
        }
        if($marital_status!=""){
            $s_where.=$this->queryWhere($s_where,"marital",$marital_status);
            $query.=",(SELECT COUNT(*) FROM cvbank_users_details ".$s_where.") AS marital_cnt";
        }
        $query.=" FROM cvbank_users_details";
        echo $query;
        //$query="SELECT COUNT(*) as total_cnt,(SELECT COUNT(*) FROM cvbank_users_details ".$s_where.") as marital_cnt FROM cvbank_users_details";        
        $result=$dbapi->custom($query);
    }    
    function getAgeStr($age){
        if(strpos($age, "-")===false){
            if(strpos($age,"+")==false){
                $date_from=date("Y-m-d",strtotime("-".$age." years",time()));
            }else{
                $to=rtrim($age,"+");
                $date_from=date("Y-m-d",strtotime("-".$to." years",time()));
            }
            $date_to=date("Y-m-d");
        }else{
            $age_arry=explode("-",$age);
            $date_to=date("Y-m-d",strtotime("-".$age_arry[0]." years",time()));
            $date_from=date("Y-m-d",strtotime("-".$age_arry[1]." years",time()));
        }
        return "BETWEEN '".$date_from."' AND '".$date_to."'";
    }
    function queryWhere($s_where,$type,$value=""){
        $where="";
        $fields=array("age"=>"dob","gender"=>"gender","marital"=>"marital_status","interests"=>"page_category","pages"=>"page_name");
        if($s_where==""){
            $where.="WHERE ";
        }else{
            $where.=" AND ";
        }
        $field_str=$fields[$type];
        if($type=="age"){
            $where.=" dob ".$value;
        }else{
            if($type=="interests"){
                $field=ltrim($value,",");
                $rep_str=str_replace(",", "','",$field );
                $field_st="'".$rep_str."'";
                $where.=" ".$field_str." IN ($field_st)";
            }else{
                $where.=" ".$field_str." IN ('".$value."')";
            }            
        }
        return $where;
    }
    
    function getAudienceLabTab(){
        $dbapi=$this->load->module("db_api");
        $result=$dbapi->custom("SELECT COUNT(*) AS cnt FROM cvbank_users_details");
        $lang_result=$dbapi->custom("SELECT * FROM global_languages");
        $nationality_result=$dbapi->custom("SELECT nationality FROM iws_countries_info");
        $data["total_data"]=$result;
        $data["languages"]=$lang_result;
        $data["nationality_list"]=$nationality_result;
        $audience_id=$this->input->post("audience_id");
        $data["audience_data"]=$audience_id;
        $this->load->view("generic/audience_lab",$data);
    }
    function getPaymentTab(){
        $this->load->view("generic/payment");
    }
     function getmarketingTab(){
     
        $this->load->view("generic/basicinfo_GMA");
    }
    function insertBasicInfo(){
        $dbapi=$this->load->module("db_api");        
        //if(!isset($_REQUEST["promo_id"]) && $_REQUEST["promo_id"]==""){
            //print_r($_REQUEST);
            $user_id=$this->get_userId();            
            $fields=array("promo_name"=>$_REQUEST["onenetwork_campagin"],"promo_type"=>"TUNNEL_VIDEOS","each_day_budgets"=>$_REQUEST["onenetwork_budget"],"total_expenses"=>$_REQUEST["onenetwork_eachday"],"from_time"=>$_REQUEST["on_campaignstart"],"to_time"=>$_REQUEST["on_campaignend"],"created_by"=>$user_id);            
            $result=$dbapi->insert($fields,"onetwork_promotions");
            $rec_aid=mysql_insert_id();
        //}
            //print_r($_REQUEST);
        echo $rec_aid;
    }
    function insertAudience(){
        $age=($_REQUEST["age_val"]!="")?$_REQUEST["age_val"]:"15-20";
        $gender=($_REQUEST["gender_val"]!="")?$_REQUEST["gender_val"]:"";
        //$marital_status=($this->input->post("marital_val")!="")?$this->input->post("marital_val"):"";
        $a_fields=array("age_group"=>$age.' YEARS',"gender"=>$gender);
        $dbapi=$this->load->module("db_api");
        print_r($a_fields);
        //$result=$dbapi->insert($a_fields,"onetwork_audience_lab");
        //$rec_aid=  mysql_insert_id();        
        //echo $rec_aid;
    }
    //
    function basicinfo_tab($promotion_type){
        
        $this->load->view("generic/basicinfo_tab");
    }
  // to load the basic promotion
    function genericBasicFormOB($purl) {
//        $sql = "select rec_aid from onetwork_official_badges where requested_by=" . $this->get_userId();
//        $data['officialbadgedata'] = $this->db_api->custom($sql);
        $data['countriesList'] = $this->getCountries();
        $this->load->view("basicinfo_OB",$data);
    }

    // to load the basic form
    function basicFormViewOB($s_str) {
        $i_url = $this->uri->total_segments();   // to get the count of parameters passed to the url in the browser
        if ($s_str != "" && $i_url <= 3) {
            $sdata = explode("_", $s_str);
            $module = $sdata[0];
            $target = $sdata[1];
            switch ($module) {
                case "Netpro": $sql = "select   group_id , group_name   from  netpro_groups  where created_by = " . $this->get_userId();
                    $Htmlres = $this->genericDataLevelOB($sql, $s_str);
                    echo $Htmlres . "<input type='hidden' name='' value='" . $s_url . "' id='onenetwork_target' >";
                    break;

                case "Tunnel": $sql = "select   rec_id , channel_name   from  tunnel_all_channels where created_by = " . $this->get_userId();
                    $Htmlres = $this->genericDataLevelOB($sql, $s_str);
                    echo $result = $Htmlres . $Htmlres1 . "<input type='hidden' name='onenetwork_target'  value='" . $s_str . "'  id='onenetwork_target' >";
                    break;

                case "Oneshop": $sql = "SELECT store_aid , store_name  FROM `oshop_stores` where  created_by =" . $this->get_userId();
                    $Htmlres = $this->genericDataLevelOB($sql, $s_str);
                    echo $Htmlres . "<input type='hidden' name='' value='" . $s_url . "' id='onenetwork_target' >";
                    break;

                case "Dealerx": $sql = "SELECT dealer_id , company_name  FROM `dx_dealers` where  representative_id =" . $this->get_userId();
                    $Htmlres = $this->genericDataLevelOB($sql, $s_str);
                    echo $Htmlres . "<input type='hidden' name='' value='" . $s_url . "' id='onenetwork_target' >";
                    break;

                case "Click":
                    if ($target == "Page") {
                        $sql = "select   page_aid , page_name   from  click_pages where created_by = " . $this->get_userId();
                        $Htmlres = $this->genericDataLevelOB($sql, $s_str);
                        echo $Htmlres . "<input type='hidden' id='promotiontype' value='CLICK_PAGES'><input type='hidden' value='CLICK' id='module'><input type='hidden' name='' value='" . $s_str . "' id='onenetwork_target' ><input type='hidden' name='' value='' id='onenetwork_target1' >";
                    }
                    if ($target == "Event") {
                        $sql = "select   event_aid , event_subject   from  click_events where created_by = " . $this->get_userId();
                        $Htmlres = $this->genericDataLevelOB($sql, $s_str);
                        echo $Htmlres . "<input type='hidden' id='promotiontype' value='CLICK_EVENTS'><input type='hidden' value='CLICK' id='module'><input type='hidden' name='' value='" . $s_str . "' id='onenetwork_target' ><input type='hidden' name='' value='' id='onenetwork_target1' >";
                    }
                    break;

                case "Coffice": $sql = "SELECT company_aid , company_name  FROM iws_employers where  registered_by =" . $this->get_userId();
                    $Htmlres = $this->genericDataLevelOB($sql, $s_str);
                    echo $Htmlres . "<input type='hidden' name='' value='" . $s_url . "' id='onenetwork_target' >";
                    break;

                default:
                    break;
            }
        }
    }

    function genericDataLevelOB($sql, $s_string) {

        $sdata = explode("_", $s_string);
        $dbobj = $this->load->module("db_api");
        $result = $dbobj->custom($sql);

        $str_mid = '';

        $str_start = "<div class='basic_info'><div class='mab10 mat10 form_width'><p class='label_name'> Choose " . $sdata[1] . " </p><p> ";

        $str_start .= "<select class='flight_searchfield_adult_and_childcontainer onenetwork_categorytype'  id='" . $s_string . "'><option value=''>Select your item</option>";
        $i = 0;
        foreach ($result as $key => $value) {
            $str_mid.= "<option  value='" . $value[$i] . "'>" . ucfirst($value[$i + 1]) . "</option>";
        }
        $str_end = $str_start . $str_mid . "</select></p>
                                        </div> </div> ";
        // print_r( $result ); exit;
        return $str_end;
    }

    function getCountries() {
        $this->load->module('db_api');
        return $this->db_api->custom("SELECT country_name,country_id FROM global_countries_info");
    }

    function getStates() {
        $countryID = xss_clean($this->input->post('countryid'));
        //$countryID = $this->input->post('countryid');
        $this->load->module('db_api');
        $results = $this->db_api->custom("SELECT state_name ,state_id from global_states_info WHERE country_id=" . $countryID);
        echo "<option value=''>select state</option>";
        foreach ($results as $state) {
            ?>
            <option value="<?php echo $state['state_id']; ?>"><?php echo $state['state_name']; ?></option>
            <?php
        }
    }

    function getCities() {
        $stateID = xss_clean($this->input->post('stateid'));
        $this->load->module('db_api');
        $results = $this->db_api->custom("SELECT `city_name` AS 'cityName', `city_id` AS 'cityID' FROM `global_cities_info` WHERE `state_id`='" . $stateID . "'");
        echo "<option value=''>select city</option>";
        foreach ($results as $state) {
            ?>
            <option value="<?php echo $state['cityID']; ?>"><?php echo $state['cityName']; ?></option>
            <?php
        }
    }

    // generic basic info official badge

    function saveBasicInfoOfficialBadge(){
         $this->load->module('db_api');
         $a_data = array('module' => xss_clean($this->input->post('onenetwork_modulename')),
            'entity_type' => xss_clean($this->input->post('onenetwork_moduleentityname')),
            'entity_id_fk' => xss_clean($this->input->post('onenetwork_categorytype')),
            'description' => xss_clean($this->input->post('onenetwork_description')),
            'website' => xss_clean($this->input->post('onenetwork_website')),
            'official_emailid' => xss_clean($this->input->post('onenetwork_emailid')),
            'official_mobile' => xss_clean($this->input->post('onenetwork_mobileno')),
            'address_line_1' => xss_clean($this->input->post('onenetwork_addressline1')),
            'address_line_2' => xss_clean($this->input->post('onenetwork_addressline2')),
            'zipcode' => xss_clean($this->input->post('onenetwork_zipcode')),
            'country_id_fk' => xss_clean($this->input->post('onenetwork_countries')),
            'state_id_fk' => xss_clean($this->input->post('onenetwork_states')),
            'city_id_fk' => xss_clean($this->input->post('onenetwork_cities')),
            'twitter_account' => xss_clean($this->input->post('onenetwork_twitter')),
            'facebook_page_url' => xss_clean($this->input->post('onenetwork_facebook')),
            'instagram_profile_url' => xss_clean($this->input->post('onenetwork_instagram')),
            'linkedin_url' => xss_clean($this->input->post('onenetwork_linkedin')),
            'googleplus_url' => xss_clean($this->input->post('onenetwork_googleplus')),);
        $result_arry = array();
        $status = "";
        if (($this->validations->is_Valid_Email($a_data['official_emailid']) == 0) || (strlen($a_data['official_emailid']) == 0)) {
            $result_arry['onenetwork_emailid'] = "error";
        }
        if (($this->validations->is_number($a_data['official_mobile']) == 0) || (strlen($a_data['official_mobile']) == 0)) {
            $result_arry['onenetwork_mobileno'] = "error";
        }
        if ((strlen($a_data['country_id_fk']) == 0)) {
            $result_arry['onenetwork_countries'] = "error";
        }
        if ((strlen($a_data['state_id_fk']) == 0)) {
            $result_arry['onenetwork_states'] = "error";
        }
        if ((strlen($a_data['city_id_fk']) == 0)) {
            $result_arry['onenetwork_cities'] = "error";
        }
        if ((strlen($a_data['description']) == 0)) {
            $result_arry['onenetwork_description'] = "error";
        }
        if ((strlen($a_data['website']) == 0)) {
            $result_arry['onenetwork_website'] = "error";
        }
        if ((strlen($a_data['address_line_1']) == 0)) {
            $result_arry['onenetwork_addressline1'] = "error";
        }
        if ((strlen($a_data['address_line_2']) == 0)) {
            $result_arry['onenetwork_addressline2'] = "error";
        }
        if ((strlen($a_data['zipcode']) == 0)) {
            $result_arry['onenetwork_zipcode'] = "error";
        }
        if (count($result_arry) != 0) {
            echo $status = json_encode($result_arry);
        } else {
            $a_data['requested_by'] = $this->get_userId();
            foreach ($a_data as $key => $val) {
                $a_data[$key] = $this->test_input($a_data[$key]);
            }
            $modulename = $a_data['module'];
            $entitytype = $a_data['entity_type'];
            $sql="select rec_aid from onetwork_official_badges where module= '$modulename' and entity_type='$entitytype' and entity_id_fk=".$a_data['entity_id_fk']. " and requested_by=". $this->get_userId();
            $resultdata=  $this->db_api->custom($sql);
            $resultdata[0]['rec_aid'];
            if($resultdata[0]['rec_aid'] == ''){
                $ratessql="select rec_aid from onetwork_official_badge_rates where module='$modulename' and entity_type='$entitytype' and is_revised=0";
                $rateresult=  $this->db_api->custom($ratessql);
                $a_data['rates_id'] = $rateresult[0]['rec_aid'];
                $result = $this->db_api->insert($a_data, 'onetwork_official_badges');
                echo $result;
                }else{ echo "You are already inserted for this entity";}
        }
    }

    //buzzin basic info for official badge view page
    function officialBadgeBuzzin(){
            $this->load->module('db_api');
            $sql = "select rec_aid from onetwork_official_badges where module='BUZZIN' and requested_by=" . $this->get_userId();
            $data['officialbadgedata'] = $this->db_api->custom($sql);
            $data['countriesList'] = $this->getCountries();
            $this->load->view("basicinfo_buzzin_ob", $data);
    }

    //basic info official badge for  buzzin
    function saveOfficialBadge() {
        $this->load->module('db_api');
        $a_data = array('popularity_type' => xss_clean($this->input->post('onenetwork_popularity_type')),
            'field_of_popularity' => xss_clean($this->input->post('onenetwork_field_of_popularity')),
            'screen_name' => xss_clean($this->input->post('onenetwork_screenname')),
            'description' => xss_clean($this->input->post('onenetwork_description')),
            'website' => xss_clean($this->input->post('onenetwork_website')),
            'official_emailid' => xss_clean($this->input->post('onenetwork_emailid')),
            'official_mobile' => xss_clean($this->input->post('onenetwork_mobileno')),
            'address_line_1' => xss_clean($this->input->post('onenetwork_addressline1')),
            'address_line_2' => xss_clean($this->input->post('onenetwork_addressline2')),
            'zipcode' => xss_clean($this->input->post('onenetwork_zipcode')),
            'country_id_fk' => xss_clean($this->input->post('onenetwork_countries')),
            'state_id_fk' => xss_clean($this->input->post('onenetwork_states')),
            'city_id_fk' => xss_clean($this->input->post('onenetwork_cities')),
            'twitter_account' => xss_clean($this->input->post('onenetwork_twitter')),
            'facebook_page_url' => xss_clean($this->input->post('onenetwork_facebook')),
            'instagram_profile_url' => xss_clean($this->input->post('onenetwork_instagram')),
            'linkedin_url' => xss_clean($this->input->post('onenetwork_linkedin')),
            'googleplus_url' => xss_clean($this->input->post('onenetwork_googleplus')),);
        $result_arry = array();
        $status = "";
        if (($this->validations->is_AplhabeticSeriesOnly($a_data['screen_name']) == 0) || (strlen($a_data['screen_name']) == 0)) {
            $result_arry['onenetwork_screenname'] = "error";
        }
        if (($this->validations->is_Valid_Email($a_data['official_emailid']) == 0) || (strlen($a_data['official_emailid']) == 0)) {
            $result_arry['onenetwork_emailid'] = "error";
        }
        if (($this->validations->is_number($a_data['official_mobile']) == 0) || (strlen($a_data['official_mobile']) == 0)) {
            $result_arry['onenetwork_mobileno'] = "error";
        }
        if ((strlen($a_data['country_id_fk']) == 0)) {
            $result_arry['onenetwork_countries'] = "error";
        }
        if ((strlen($a_data['state_id_fk']) == 0)) {
            $result_arry['onenetwork_states'] = "error";
        }
        if ((strlen($a_data['city_id_fk']) == 0)) {
            $result_arry['onenetwork_cities'] = "error";
        }
        if ((strlen($a_data['popularity_type']) == 0)) {
            $result_arry['onenetwork_popularity_type'] = "error";
        }
        if ((strlen($a_data['field_of_popularity']) == 0)) {
            $result_arry['onenetwork_field_of_popularity'] = "error";
        }
        if ((strlen($a_data['description']) == 0)) {
            $result_arry['onenetwork_description'] = "error";
        }
        if ((strlen($a_data['website']) == 0)) {
            $result_arry['onenetwork_website'] = "error";
        }
        if ((strlen($a_data['address_line_1']) == 0)) {
            $result_arry['onenetwork_addressline1'] = "error";
        }
        if ((strlen($a_data['address_line_2']) == 0)) {
            $result_arry['onenetwork_addressline2'] = "error";
        }
        if ((strlen($a_data['zipcode']) == 0)) {
            $result_arry['onenetwork_zipcode'] = "error";
        }
        if (count($result_arry) != 0) {
            echo $status = json_encode($result_arry);
        } else {
            $a_data['requested_by'] = $this->get_userId();
            $a_data['module'] = 'BUZZIN';
            $a_data['entity_type'] = 'BUZZIN_FAMOUSPERSONALITY';
            foreach ($a_data as $key => $val) {
                $a_data[$key] = $this->test_input($a_data[$key]);
            }
            $result = $this->db_api->insert($a_data, 'onetwork_official_badges');
            echo $result;
        }
    }
    // function to display the breadcrumbs in promotions
    function breadcrumbs($type,$moduleurl){
        $data["promotion_type"]=$type;
        $data["moduleurl"]=$moduleurl;
        $this->load->view("generic/breadcrumbs",$data);
    }
    
}

