<?php

class promotions extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->module('cookies');
        $this->load->module("db_api");
    }

    function get_userId() {
        $obj = $this->load->module('cookies');
        return $obj->getUserID();
    }

    function index() {
        $this->load->view("promotions/promotions_view");
    }

    function coffieCompanyPromotion() {
        $data["promotion_type"] = "Coffice_company";
        $this->load->view("promotions/PromotionForm/pagepromotions", $data);
    }
    function coffiejobPromotion() {
        $data["promotion_type"] = "Coffice_job";
        $this->load->view("promotions/PromotionForm/pagepromotions", $data);
    }
    function pagePromotions() {
        $data["promotion_type"] = "Click_page";
        $this->load->view("promotions/PromotionForm/pagepromotions", $data);
    }

    function groupPromotions() {
        $data["promotion_type"] = "Click_group";
        $this->load->view("promotions/PromotionForm/pagepromotions", $data);
    }

    function eventPromotions() {
        $data["promotion_type"] = "Click_event";
        $this->load->view("promotions/PromotionForm/pagepromotions", $data);
    }
    //mar-11-2016 by venkatesh
    function netproGroupPromotions(){
        $data["promotion_type"] = "Netpro_group";
        $this->load->view("promotions/PromotionForm/pagepromotions", $data);
    }
    
    //mar-11-2016 by venkatesh
    function oneshopstorePromotions(){
        $data["promotion_type"] = "Oneshop_store";
        $this->load->view("promotions/PromotionForm/pagepromotions", $data);
    }
    //mar-11-2016 by venkatesh
    function oneshopProductPromotions(){
        $data["promotion_type"] = "Oneshop_product";
        $this->load->view("promotions/PromotionForm/pagepromotions", $data);
    }
    
    //mar-11-2016 by venkatesh
    function tunnelChannelPromotion(){
        $data["promotion_type"] = "Tunnel_channel";
        $this->load->view("promotions/PromotionForm/pagepromotions", $data);
    }
    //mar-11-2016 by venkatesh
    function tunnelVideoPromotion(){
        $data["promotion_type"] = "Tunnel_video";
        $this->load->view("promotions/PromotionForm/pagepromotions", $data);
    }
    
    //mar-11-2016 by venkatesh
    function dealerxAuctionPromotion(){
        $data["promotion_type"] = "Dealerx_auction";
        $this->load->view("promotions/PromotionForm/pagepromotions", $data);
    }
    
    //mar-11-2016 by venkatesh
    function dealerxProfilePromotion(){
        $data["promotion_type"] = "Dealerx_profile";
        $this->load->view("promotions/PromotionForm/pagepromotions", $data);
    }
function newpromotions(){
//        echo 
        $dbobj=$this->load->module("db_api");
       $rlt= $dbobj->custom("select promo_code from onetwork_promotions where rec_aid=(select max(rec_aid) from onetwork_promotions where created_by=".$this->get_userId().")");
       
       redirect(base_url()."campaignDV?promo_id=".base64_encode(base64_encode($rlt[0]["promo_code"])));
    }


    //mar-15-2016 by gouthami
    function buzzinSnapperPromotion(){
        $data["promotion_type"] = "buzzin_quick_pic";
        $this->load->view("promotions/PromotionForm/pagepromotions", $data);        
    }
//mar-15-2016 by gouthami
    function buzzinShortfilmPromotion(){
        $data["promotion_type"] = "buzzin_quick_vid";
        $this->load->view("promotions/PromotionForm/pagepromotions", $data);        
    }



//mar-11-2016 by venkatesh
    function clickPagePromotionformheader() {
        $this->load->view("formheaders/clickPagePromotionformheader");
    }
//mar-11-2016 by venkatesh
    function clickGroupPromotionformheader() {
        $this->load->view("formheaders/clickGroupPromotionformheader");
    }
//mar-11-2016 by venkatesh
    function clickEventPromotionformheader() {
        $this->load->view("formheaders/clickEventPromotionformheader");
    }

    function defaultHeader() {
        $this->load->view("formheaders/defaultHeader");
    }

    function statesuggestion() {
        $db = $this->load->module("db_api");
        $searchTerm = $_REQUEST['q'];
        $query = $db->custom("SELECT state_id,state_name FROM global_states_info WHERE state_name LIKE '%" . $searchTerm . "%' ORDER BY country_name ASC");
        $states_arry=[];
        foreach ($query as $queryval) {
            $data["name"] = $queryval['state_name'];
            $data["id"] = $queryval['state_id'];
            array_push($states_arry,$data);
        }
        echo json_encode($states_arry);
    }
    function states() {
        $db = $this->load->module("db_api");
        $countryId= $_REQUEST['countryId'];
        $query = $db->custom("SELECT state_id,state_name FROM global_states_info WHERE country_id=". $countryId . " ORDER BY state_name ASC");
        $states_arry=[];
        foreach ($query as $queryval) {
            $data["name"] = $queryval['state_name'];
            $data["id"] = $queryval['state_id'];
            array_push($states_arry,$data);
        }
        echo json_encode($states_arry);
    }
    
    
    function cities() {
        $db = $this->load->module("db_api");
        $stateId = $_REQUEST['stateId'];
        $city_arry=[];
        //echo "SELECT city_id,city_name FROM global_cities_info WHERE state_id=" . $stateId . " ORDER BY city_name ASC";
        $query = $db->custom("SELECT city_id,city_name FROM global_cities_info WHERE state_id=" . $stateId . " ORDER BY city_name ASC");
        foreach ($query as $queryval) {
            $data['name'] = $queryval['city_name'];
            $data['id'] = $queryval['city_id'];
            array_push($city_arry,$data);
        }
        echo json_encode($city_arry);
    }
    function citysuggestion() {
        $db = $this->load->module("db_api");
        $searchTerm = $_REQUEST['q'];
        $city_arry=[];
        $query = $db->custom("SELECT city_id,ccity_name FROM global_cities_info WHERE city_name LIKE '%" . $searchTerm . "%' ORDER BY city_name ASC");
        foreach ($query as $queryval) {
            $data['name'] = $queryval['city_name'];
            $data['id'] = $queryval['city_id'];
            array_push($city_arry,$data);
        }
        echo json_encode($city_arry);
    }

    function getChartData() {
        $dbapi = $this->load->module("db_api");
        $result = $dbapi->custom("SELECT COUNT(*) AS total_cnt FROM cvbank_users_details");
        $data_points = array();
        array_push($data_points, array("x" => "ALL", "y" => $result[0]["total_cnt"], "name" => "ALL"));
        echo json_encode($data_points, JSON_NUMERIC_CHECK);
    }

    function getAudienceCount() {
        $dbapi = $this->load->module("db_api");
        $age = ($this->input->post("age_val") != "") ? $this->input->post("age_val") : "";
        $gender = ($this->input->post("gender_val") != "") ? $this->input->post("gender_val") : "";
        $marital_status = ($this->input->post("marital_val") != "") ? $this->input->post("marital_val") : "";
        $languages = ($this->input->post("languages") != "") ? $this->input->post("languages") : "";
        $nationality = ($this->input->post("nationality") != "") ? $this->input->post("nationality") : "";
        $pages = ($this->input->post("pages") != "") ? $this->input->post("pages") : "";
        $location = ($this->input->post("location") != "") ? $this->input->post("location") : "";
        $location_type = ($this->input->post("location_type") != "") ? $this->input->post("location_type") : "";
        $s_where = "";
        $query = "SELECT COUNT(*) as total_cnt";
        $promo_str = "";
        if ($age != "" && $age != "Any") {
            $age_str = $this->getAgeStr($age);
            $s_where.=$this->queryWhere($s_where, "age", $age_str);
            $query.=",(SELECT COUNT(*) FROM cvbank_users_details " . $s_where . ") AS age_cnt";
        }
        if ($gender != "" && $gender != "Any") {
            $s_where.=$this->queryWhere($s_where, "gender", $gender);
            $query.=",(SELECT COUNT(*) FROM cvbank_users_details " . $s_where . ") AS gender_cnt";
        }
        if ($marital_status != "" && $marital_status != "Any") {
            $s_where.=$this->queryWhere($s_where, "marital", $marital_status);
            $query.=",(SELECT COUNT(*) FROM cvbank_users_details " . $s_where . ") AS marital_cnt";
        }
        if ($languages != "") {
            $s_where.=$this->queryWhere($s_where, "languages", $languages);
            $query.=",(SELECT COUNT(*) FROM cvbank_users_details users INNER JOIN cvbank_languages lang ON users.iws_profile_id=lang.iws_profile_id " . $s_where . ") AS languages_cnt";
        }
        if ($nationality != "") {
            $s_where.=$this->queryWhere($s_where, "nationality", $nationality);
            $query.=",(SELECT COUNT(*) FROM cvbank_users_details " . $s_where . ") AS nationality_cnt";
        }
        if ($pages != "") {
            $s_where.=$this->queryWhere($s_where, "pages", $pages);
            $query.=",(SELECT COUNT(*) FROM cvbank_users_details users INNER JOIN click_page_likers pages ON users.iws_profile_id=pages.user_id_fk " . $s_where . ") AS pages_cnt";
        }
        if ($location != "") {
            if ($location_type == "State") {
                $s_where.=$this->queryWhere($s_where,$location_type,$location);
                $query.=",(SELECT COUNT(*) FROM cvbank_users_details " . $s_where . ") AS location_cnt";
            } elseif ($location_type == "City") {
                $s_where.=$this->queryWhere($s_where,$location_type,$location);
                //$s_where.=" AND city_id IN (" . $loc . ")";
                $query.=",(SELECT COUNT(*) FROM cvbank_users_details " . $s_where . ") AS location_cnt";
            } elseif ($location_type == "Country") {
                $s_where.=$this->queryWhere($s_where,$location_type,$location);
                //$query.=",(SELECT COUNT(*) FROM cvbank_users_details users INNER JOIN iws_countries_info countries ON users.country_id=countries.country_id " . $s_where . ") AS location_cnt";
                $query.=",(SELECT COUNT(*) FROM cvbank_users_details " . $s_where . ") AS location_cnt";
            }
            //$query.=",(SELECT COUNT(*) FROM cvbank_users_details users ".$s_where.") AS location_cnt";
        }
        $query.=" FROM cvbank_users_details";
        echo $query;        
        //$query="SELECT COUNT(*) as total_cnt,(SELECT COUNT(*) FROM cvbank_users_details ".$s_where.") as marital_cnt FROM cvbank_users_details";        
        $result = $dbapi->custom($query);
        $subtotal = 0;
        $res = $result[0];
        foreach ($res as $key => $val) {
            if (($key == "age_cnt" || $key == "gender_cnt" || $key == "marital_cnt" || $key == "nationality_cnt" || $key == "languages_cnt" || $key == "pages_cnt" || $key == "location_cnt") && $key != "total_cnt") {
                $subtotal = $val;
            }
        }
        $rest = $result[0]["total_cnt"] - $subtotal;
        $data_points = array();
        array_push($data_points, array("x" => "ALL", "y" => $rest, "name" => "ALL"));
        array_push($data_points, array("x" => "total", "y" => $subtotal, "name" => "total"));
        $json_data = json_encode($data_points);
        $promo_str = "total_cnt:" . $result[0]["total_cnt"] . "~age:" . $result[0]["age_cnt"] . "~gender:" . $result[0]["gender_cnt"] . "~marital:" . $result[0]["marital_cnt"] . "~languages:" . $result[0]["languages_cnt"] . "~nationality:" . $result[0]["nationality_cnt"] . "~pages:" . $result[0]["pages_cnt"] . "~location:" . $result[0]["location_cnt"] . "~" . $json_data;
        echo $promo_str;
    }

    function getAgeStr($age) {
        if (strpos($age, "-") === false) {
            if (strpos($age, "+") == false) {
                $date_from = date("Y-m-d", strtotime("-" . $age . " years", time()));
            } else {
                $to = rtrim($age, "+");
                $date_from = date("Y-m-d", strtotime("-" . $to . " years", time()));
            }
            $date_to = date("Y-m-d");
        } else {
            $age_arry = explode("-", $age);
            $date_to = date("Y-m-d", strtotime("-" . $age_arry[0] . " years", time()));
            $date_from = date("Y-m-d", strtotime("-" . $age_arry[1] . " years", time()));
        }
        return "BETWEEN '" . $date_from . "' AND '" . $date_to . "'";
    }

    function queryWhere($s_where, $type, $value = "") {
        $where = "";
        $fields = array("age" => "dob", "gender" => "gender", "marital" => "marital_status", "interests" => "page_category", "pages" => "page_aid_fk", "languages" => "iws_language_id", "nationality" => "nationality","State"=>"state_id","City"=>"city_id","Country"=>"country_id");
        if ($s_where == "") {
            $where.="WHERE ";
        } else {
            $where.=" AND ";
        }
        $field_str = $fields[$type];
        if ($type == "age") {
            $where.=" dob " . $value;
        } else {
            if ($type == "interests" || $type == "languages" || $type == "nationality" || $type == "pages" || $type == "state"|| $type == "city"|| $type == "country") {
                if($type == "state"|| $type == "city"|| $type == "country"){
                    $field = rtrim($value, ",");
                }else{
                    $field = ltrim($value, ",");
                }
                $rep_str = str_replace(",", "','", $field);
                $field_st = "'" . $rep_str . "'";
                $where.=" " . $field_str . " IN ($field_st)";
            } else {
                $where.=" " . $field_str . " IN ('" . $value . "')";
            }
        }
        return $where;
    }

    // function to display page options
    function getPageOptions() {
        $dbapi = $this->load->module("db_api");
        $page_interests = $this->input->post("val");
        //$page_interests=",Album,Movie";
        $field = ltrim($page_interests, ",");
        $rep_str = str_replace(",", "','", $field);
        $field_st = "'" . $rep_str . "'";
        $query = "SELECT page_aid,page_name FROM click_pages WHERE page_category IN (" . $field_st . ")";
        $result = $dbapi->custom($query);
        //print_r($result);
        $res_str = "";
        foreach ($result as $res) {
            if ($res_str == "") {
                $res_str.=$res["page_aid"] . ":" . $res["page_name"];
            } else {
                $res_str.="~" . $res["page_aid"] . ":" . $res["page_name"];
            }
        }
        echo $res_str;
    }

    function getChartJSON() {
        $data = $_REQUEST["json_data"];
        echo $data;
    }
    //written by Gouthami:Loading buzzin pic promotion view 
    function buzzinSnapcompitation() {
        $this->load->view('promotions/buzzin/pic_view');
    }

//written by Gouthami:Loading buzzin video promotion view 
    function buzzinFlimcompitation() {
        $this->load->view('promotions/buzzin/video_view');
    }
 function buzzinVipInsert()
 {
        $dbobj=$this->load->module("db_api");
        $pid=$this->get_userId();
        //$request=$_REQUEST['request'];
        //$work_ref=$_REQUEST['work_ref'];
        $work_know=$_REQUEST['work_know'];
        $screen_Name=$_REQUEST['screen_Name'];
        $desc=$_REQUEST['desc'];
        $vip_offc_mail=$_REQUEST['vip_offc_mail'];
        $vip_offc_mno=$_REQUEST['vip_offc_mno'];
        $Addr1_vip=$_REQUEST['Addr1_vip'];
        $Addr2_vip=$_REQUEST['Addr2_vip'];
        $vip_country=$_REQUEST['vip_country'];
        $vip_state=$_REQUEST['vip_state'];
        $vip_city=$_REQUEST['vip_city'];
        $vip_zipcode=$_REQUEST['vip_zipcode'];
        $vip_land_extn=$_REQUEST['vip_land_extn'];
        $vip_landNo=$_REQUEST['vip_landNo'];
        $twitter=$_REQUEST['twitter'];
        $facebook=$_REQUEST['facebook'];
        $instagram=$_REQUEST['instagram'];
        // ,"verified_on"=>"","requested_on"=>"";
        $data_array=array("work_known_for"=>$work_know,"screen_name"=>$screen_Name,"description"=>$desc,"official_email_addr"=>$vip_offc_mail,"official_mob_no"=>$vip_offc_mno,"landline_extn"=>$vip_land_extn,"landline_no"=>$vip_landNo,"address_line1"=>$Addr1_vip,"address_line2"=>$Addr2_vip,"city_fk_id"=>$vip_city,"state_fk_id"=>$vip_state,"country_fk_id"=>$vip_country,"zipcode"=>$vip_zipcode,"is_verified"=>0,"twitter_url"=>$twitter,"fb_page_url"=>$facebook,"instagram_url"=>$instagram,"profile_id"=>$pid);
        $prinsert=$dbobj->insert($data_array,"iws_vip_requests"); 
   }
    function buzzinVip() {
        $db=$this->load->module("db_api");
        $countries_arry=[];
        $data['countries'] = $db->custom("SELECT country_name,country_id FROM iws_countries_info ORDER BY country_name ASC");
        
        $this->load->view('promotions/buzzin/vip_view',$data);
    }
function priceReturn($promo_type){
    $dbobj = $this->load->module("db_api");
   $rlt= $dbobj->custom ("select unit_price from onetwork_promotion_rates where country_id_fk=106 and entity_type='".$promo_type."'");
   echo  $rlt[0]["unit_price"];
}
//by venkatesh 
    function buzzinPrCreate() {
//        print_R($_REQUEST);die();
        $dbobj = $this->load->module("db_api");
        $uid = $this->get_userId();
        $entity_id = $_REQUEST["buzz_oneidev"];
        $competition_abstract = $_REQUEST["buzz_pr_abs"];
         $competition_theme = $_REQUEST["oneBuzz_theme"];
        $module="BUZZIN";
        $promo_name = $_REQUEST["buzz_pr_name"];
        $promo_type = $_REQUEST["promotiontype"];
        $totalcost = $_REQUEST["total_price"];
         
        $module=current(explode("_",$promo_type));
        $promotionpayment_card_no = $_REQUEST["promotionpayment_card_no"];
        
        $rlt = $dbobj->select("entity_id", "onetwork_promotions", "entity_id=" . $entity_id . " and promo_type='" . $promo_type . "' and created_by=" . $uid);
        if ($rlt == 0) {
            $cno = $_REQUEST["promotionpayment_card_no"];
            $rlt = $dbobj->select("card_id", "pb_cards", "card_number='" . $cno . "' and user_id_fk=" . $uid);
            if ($rlt[0]["card_id"]) {
                $fields=["sender_id_fk"=>$uid,"payment_type"=>"OUTBOUND","amount"=>$total_cost,"module"=>$module,"from_account"=>$rlt[0]["card_id"], "entity_type"=>$module."_ONEIDNET"];
                 $fields = $this->validations->checkinput($fields);  
                if( $dbobj->insert($fields,"pb_transactions")==1){
                   $tfid= $dbobj->custom("select max(transaction_aid) as transaction_id_fk from pb_transactions where sender_id_fk=".$uid);
                    $promotionfields = ["promo_name" => $promo_name,
                        "module" => $module, "promo_type" => $promo_type,
                        "entity_id" => $entity_id,
                        "total_cost" => $totalcost,
                         "competition_abstract"=>$competition_abstract,
                        "competition_theme"=>$competition_theme,
                            "created_by"=> $uid];
                 $promotionfields = $this->validations->checkinput($promotionfields);  
                    if($dbobj->insert($promotionfields,"onetwork_promotions")==1 ){
                    echo "AERPC101";                      
                  }
                }
            }else{
                echo "Card Invalid";
            }
        } else {
            echo "Campaign already Running";
        }

    }
//written by Gouthami:Loading traveltime Tour promotion view 
    function traveltimeTourpromotions() {
        $this->load->view('promotions/traveltime/tour_cr');
    }
//written by Gouthami:Loading traveltime Agent Profile promotion view 
    function traveltimeAgentpromotions() {
        $this->load->view('promotions/traveltime/agent_profile_cr');
    }

}
