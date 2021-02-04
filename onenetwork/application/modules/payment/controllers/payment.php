<?php
if (!defined('BASEPATH'))    exit('No direct script access allowed');

class payment extends CI_Controller {

    function __construct() {
        parent::__construct();
        $ckobj = $this->load->module("cookies");
        if ($_REQUEST) {
            $this->load->module("session_restart");
                    if (isset($_REQUEST["skey"])) {
                    $this->session_restart->key_check($_REQUEST["skey"]);}
        }
    }
    function get_userId() {
        $obj = $this->load->module('cookies');
        return $obj->getUserID();
    }
    function index(){
        
    }
    // function to display the popup for the card details
    function addCardPopup(){
        $this->load->view("payment/addcard_popup");
    }
    // function to display the popup for the card details
    function payment_popup(){
        
$db_obj= $this->load->module("db_api");
$data["card_details"]=$db_obj->select("card_number,card_name","pb_cards","user_id_fk=".$this->get_userId());
$data["payment"]=$_REQUEST["payment"];
//print_R($data["card_details"]);
        $this->load->view("payment/payment_popup",$data);
    }
        
  //26-feb_2016 by venkatesh
  function memOnenetworkCardDetails($reset=null) {
        $mem0bj = $this->load->module('memcaching');
        $dbobj = $this->load->module("db_api");
        $keyName = "ONUSERCARDDETAILS_" . $this->getUserId();
        if (isset($reset)) {
            $result = $dbobj->select("card_number,card_name","pb_cards","user_id_fk=".$this->get_userId());
            $mem0bj->setKey($keyName, $result);
        } else {
            $result = $mem0bj->getKey($keyName);
            if ($result) {
                return $result;
            } else {
                $result = $dbobj->select("card_number,card_name","pb_cards","user_id_fk=".$this->get_userId());
                $mem0bj->setKey($keyName, $result);
                return $result;
            }
        }
   }

    
    
    //03-march-2016 by venkatesh
    function saveCardDetails() {
        $scope_type = $_REQUEST["scope_type"];
        $card_no = $_REQUEST["card_no"];
        $usagetype = $_REQUEST["usagetype"];
        $card_type = $_REQUEST["card_type"];
        $card_name = $_REQUEST["card_name"];
        $name_on_card = $_REQUEST["name_on_card"];
        $cvv = $_REQUEST["cvv"];
        $expiry_year = $_REQUEST["expiry_year"];
        $expiry_month = $_REQUEST["expiry_month"];
        $this->saveCardDetailsValidate($scope_type, $card_no, $usagetype, $card_type, $card_name, $name_on_card, $cvv, $expiry_year, $expiry_month);
        $db_obj = $this->load->module("db_api");
        $uid = $this->get_userId();
        $a_result = $db_obj->select("card_number", "pb_cards", "card_number=" . $card_no . " and user_id_fk=" . $uid);
        if ($a_result == 0) {
            $fields = ["usage_purpose" => $usagetype, "usage_scope" => $scope_type, "card_type" => $card_type, "card_name" => $card_name, "cvv_number" => $cvv, "card_number" => $card_no, "name_as_on_card" => $name_on_card, "expiry_month" => $expiry_month, "expiry_year" => $expiry_year, "user_id_fk" => $uid];
            $fields = $this->validations->checkinput($fields);            
            if ($db_obj->insert($fields, "pb_cards") == 1) {
                echo "ONINSSUCCESS";
            }
        } else {
            echo "Card No Already Exist";
        }
    }

    function saveCardDetailsValidate($scope_type,$card_no,$usagetype,$card_type,$card_name,$name_on_card,$cvv,$expiry_year,$expiry_month){
        if($scope_type==""){
            $error["scope_type_error"]="You can't leave this empty.";
        }
        
         if($card_no=="" ||  $this->validations->is_number($card_no)==0){
             $error["card_no_error"]="You can't leave this empty and fill with numerics only";
             
         }else if(strlen($card_no)<12){
              $error["card_no_error"]="Card Number Invalid";
         }
         
         if($usagetype==""){
           $error["usagetype_error"]="You can't leave this empty.";
                }
         if($card_type==""){
             $error["card_type_error"]="You can't leave this empty.";
             
         }
         if($card_name=="" || $this->validations->is_AplhabeticSeriesOnly($card_name)==0){
             $error["card_name_error"]="You can't leave this empty and fill with alfabets only";
         }
         if($name_on_card=="" || $this->validations->is_AplhabeticSeriesOnly($name_on_card)==0){
            $error["name_on_card_error"]="You can't leave this empty and fill with alfabets only";
         }
         if($cvv=="" || $this->validations->is_number($cvv)==0){
                $error["cvv_error"]="You can't leave this empty  and fill with numerics only";
         }else if(strlen($cvv)<=4){
                             $error["cvv_error"]="Invalid CVV";
         }
         if($expiry_year=="" || $this->validations->is_number($expiry_year)==0 ||   $this->validations->is_number($expiry_month)==0 || $expiry_month==""){
            $error["expiry_year_error"]="You can't leave this empty  and filled with numerics only";

         }else if(strlen($expiry_year)<4 || $expiry_year<date('Y')){
             $error["expiry_year_error"]="Invalid Year";
         }else if(strlen($expiry_month)<2 || $expiry_month>12){
             $error["expiry_year_error"]="Invalid Month";
         }    
         if(isset($error)){
             echo json_encode($error);
//             echo date('Y')
             die();
         }

    }
    function promotion_payment() {

//        print_R($_REQUEST["skey"]);die();
        $uid = $this->get_userId();
        $entity_id = $_REQUEST["onenetwork_target"];
        $promo_type = $_REQUEST["module"];
        $campagin_name = $_REQUEST["onenetwork_campagin"];
        $campaignstart = $_REQUEST["onenetwork_campaignstart"];
        $campaignend = $_REQUEST["onenetwork_campaignend"];
        $budget = $_REQUEST["onenetwork_budget"];
        $entity_id = $_REQUEST["onenetwork_target"];
        if($_REQUEST["onenetwork_target1"]!="undefined"){
           $entity_id=  $_REQUEST["onenetwork_target1"];
        }
        
        $module=current(explode("_",$promo_type));
        $promotionpayment_card_no = $_REQUEST["promotionpayment_card_no"];
        $target_people=$_REQUEST["target_people"];
        
        $age=$_REQUEST["age"];
        $gender=$_REQUEST["gender"];
        $marital_status=$_REQUEST["marital_status"];
        $interests=$_REQUEST["interests"];
        $pages=$_REQUEST["pages"];
        $languages=$_REQUEST["languages"];
        //$nationality=$_REQUEST["nationality"];
        $cloation=$_REQUEST["cloation"];
        $campaignlocation=$_REQUEST["campaignlocation"];

        $dbobj = $this->load->module("db_api");
        $rlt = $dbobj->select("entity_id", "onetwork_promotions", "entity_id=" . $entity_id . " and promo_type='" . $promo_type . "' and created_by=" . $uid);
        if ($rlt == 0) {
            $cno = $_REQUEST["promotionpayment_card_no"];
            $rlt = $dbobj->select("card_id", "pb_cards", "card_number='" . $cno . "' and user_id_fk=" . $uid);
            if ($rlt[0]["card_id"]) {
                $fields=["sender_id_fk"=>$uid,"payment_type"=>"OUTBOUND","card_id_fk"=>$rlt[0]["card_id"],
                    "amount"=>$_REQUEST["onenetwork_budget"],"module"=>$module,"entity_id" => $entity_id,
                    "from_account"=>$rlt[0]["card_id"], "entity_type"=>$module."_ONEIDNET"];
                 $fields = $this->validations->checkinput($fields);  
                if( $dbobj->insert($fields,"pb_transactions")==1){
                   $tfid= $dbobj->custom("select max(transaction_aid) as transaction_id_fk from pb_transactions where sender_id_fk=".$uid);
                   $ST = new DateTime($campaignstart);
                   $ED= new DateTime($campaignend);
                    $promotionfields = ["promo_name" => $campagin_name,
                        "module" => $module, "promo_type" => $promo_type,
                        "entity_id" => $entity_id,
                        "each_day_budgets" => $_REQUEST["onenetwork_eachdaybudget"],
                        "total_cost" => $budget,
                        "transaction_id_fk" => $tfid[0]["transaction_id_fk"],
                        "promotion_start_time" => $ST->format('Y-m-d H:i:s'),
                        "promotion_end_time" => $ED->format('Y-m-d H:i:s'),
                        "created_by" => $uid,
                        "total_targets" => $_REQUEST["target_people"]];
                    
                  $onetwork_audience_lab_fields = ["age_group" => $age,
                        "gender" => $gender,
                        "languages_knows" => $languages,
                        "interest_entities" => $interests,
                        "exact_entities_ids" => $pages,
                        "marital_status" => $marital_status,
                        "transaction_id_fk" => $tfid[0]["transaction_id_fk"]
                        ];
                if($cloation=="Country"){
                            $onetwork_audience_lab_fields["country_id_str"]=$campaignlocation;
                }else if($cloation=="State"){
                    $onetwork_audience_lab_fields["state_id_fk"]=$campaignlocation;
                }else if($cloation=="City"){
                    $onetwork_audience_lab_fields["city_id_str"]=$campaignlocation;
                }
                 $onetwork_audience_lab_fields = $this->validations->checkinput($onetwork_audience_lab_fields);  
                 $promotionfields = $this->validations->checkinput($promotionfields);  

                    if( $dbobj->insert($onetwork_audience_lab_fields,"onetwork_audience_lab")==1){
                        $promotionfields["audience_id_fk"]= mysql_insert_id();
                    if($dbobj->insert($promotionfields,"onetwork_promotions")==1 ){
                    echo "AERPC101";                      
                  }
                  }
                }
            }else{
                echo "Card Invalid";
            }
        } else {
            echo "Campaign already Running";
        }
    }




function promotion_budget(){
 $budget=$_REQUEST["budget"];
 $amount=$_REQUEST["amount"];
 $promotiontype= $_REQUEST["promotiontype"];
 $db_obj=$this->load->module("db_api");
 $cookies=$this->load->module("Cookies");
// $rlt=$db_obj->select("unit_price,each_day_percentage","onetwork_promotion_rates","entity_type='".$promotiontype."' and country_id_fk=".$cookies->getUserCountryID()."");
 $rlt=$db_obj->select("unit_price,each_day_percentage","onetwork_promotion_rates","entity_type='".$promotiontype."' and country_id_fk=106");
 $arr["noof_target"]=ceil($amount/$rlt[0]["unit_price"]);
 $arr["eachdayTargetPeopleCount"]=ceil($budget/$rlt[0]["unit_price"]);
 $arr["totalamount"]=ceil((($amount*$rlt[0]["each_day_percentage"])/100)+$amount);
 
 echo json_encode($arr);
}

function officialbadgePayment()
{
    $this->load->module('db_api');
           $uid = $this->get_userId();
           $modulename = $_REQUEST['onenetwork_modulename'];
           $entityname = $_REQUEST['onenetwork_moduleentityname'];
           $category=$_REQUEST['onenetwork_categorytype'];
           $desc=$_REQUEST['onenetwork_description'];
           $website=$_REQUEST['onenetwork_website'];
           $email=$_REQUEST['onenetwork_emailid'];
           $mobile=$_REQUEST['onenetwork_mobileno'];
           $address1=$_REQUEST['onenetwork_addressline1'];
           $address2=$_REQUEST['onenetwork_addressline2'];
           $zipcode=$_REQUEST['onenetwork_zipcode'];
           $countryid=$_REQUEST['onenetwork_countries'];
           $stateid=$_REQUEST['onenetwork_states'];
           $cityid=$_REQUEST['onenetwork_cities'];
           $twitter=$_REQUEST['onenetwork_twitter'];
           $facebook=$_REQUEST['onenetwork_facebook'];
           $instagram=$_REQUEST['onenetwork_instagram'];
           $linkedin=$_REQUEST['onenetwork_linkedin'];
           $googleplus=$_REQUEST['onenetwork_googleplus'];
           $isd_code=$_REQUEST["onenetwork_isd_code"];
           $sql="select rec_aid from onetwork_official_badges where module= '$modulename' and entity_type='$entityname' and entity_id_fk=$category and requested_by=". $this->get_userId();
           $rlt=  $this->db_api->custom($sql);
           $rlt[0]['rec_aid'];
           if ($rlt[0]['rec_aid']== '') {
            $cno = $_REQUEST["promotionpayment_card_no"];
            $dbobj = $this->load->module("db_api");
            $rlt = $dbobj->select("card_id", "pb_cards", "card_number='" . $cno . "' and user_id_fk=" . $uid);
            if ($rlt[0]["card_id"]) {
                $fields=["sender_id_fk"=>$uid,"payment_type"=>"OUTBOUND","amount"=>$_REQUEST["onenetwork_rates"],"module"=>$modulename,"from_account"=>$rlt[0]["card_id"], "entity_type"=>$modulename."_ONEIDNET"];
                if( $dbobj->insert($fields,"pb_transactions")==1){
                   $tfid= $dbobj->custom("select max(transaction_aid) as transaction_id_fk from pb_transactions where sender_id_fk=".$uid);
                   $ratessql="select rec_aid from onetwork_official_badge_rates where module='$modulename' and entity_type='$entityname' and is_revised=0";
                   $rateresult=  $this->db_api->custom($ratessql);
                   $mobile_no=$isd_code.$mobile;
                   $officialbadgefields = ["module" => $modulename,
                        "entity_type" => $entityname,
                        "entity_id_fk" => $category,
                        "description" => $desc,
                        "address_line_1" => $address1,
                        "address_line_2" => $address2,
                        "zipcode"=>$zipcode,
                        "country_id_fk"=>$countryid,
                        "state_id_fk"=>$stateid,
                        "city_id_fk"=>$cityid,
                        "website"=>$website,
                        "official_emailid"=>$email,
                        "official_mobile"=>$mobile_no,
                        "twitter_account"=>$twitter,
                        "facebook_page_url"=>$facebook,
                        "instagram_profile_url"=>$instagram,
                        "linkedin_url"=>$linkedin,
                        "googleplus_url" => $googleplus,
                        "rates_id"=>$rateresult[0]['rec_aid'],
                        "requested_by"=>$uid,
                        "transaction_id_fk" => $tfid[0]["transaction_id_fk"]];

                    if($dbobj->insert($officialbadgefields,"onetwork_official_badges")==1){
                    echo "AERPC101";
                  }
                }
            }else{
                echo "Card Invalid";
            }
        } else {
            //echo "Campaign already Running";
            echo "Your request is under process, we will update the status to your oneidnet & Correspondence Email Address for further updates";
          }
}

}
