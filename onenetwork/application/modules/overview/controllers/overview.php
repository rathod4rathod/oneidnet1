<?php

class Overview extends CI_Controller {

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
        //$this->load->view("overview/promo_overview");
    }

    function promotion_dashboard() {
        if (isset($_REQUEST["promo_id"])) {
            $data["promo_id"] = $_REQUEST["promo_id"];
            $this->load->view("overview/promo_overview", $data);
        } else {
            $url = base_url();
            header("Location:" . $url);
        }
    }

    function page_views($promo_id,$overview_type='') {
        if($overview_type!=''){
            $type=$overview_type;
        }else{
            $type="PROMOTIONS";
        }
        $data["entity_id"] = $promo_id;
        $data["overview_type"]=$type;
        $this->load->view("overview/page_views", $data);
    }

    function age_view($promo_id,$overview_type='') {
        if($overview_type!=''){
            $type=$overview_type;
        }else{
            $type="PROMOTIONS";
        }
        $data["entity_id"] = $promo_id;
        $data["overview_type"]=$type;
        $this->load->view("overview/age_overview", $data);
    }

    function gender_view($entity_id,$overview_type='') {
        if($overview_type!=''){
            $type=$overview_type;
        }else{
            $type="PROMOTIONS";
        }
        $data["entity_id"] = $entity_id;
        $data["overview_type"]=$type;
        $this->load->view("overview/gender_overview", $data);
    }

    function marital_view($entity_id,$overview_type='') {
        if($overview_type!=''){
            $type=$overview_type;
        }else{
            $type="PROMOTIONS";
        }
        $data["entity_id"] = $entity_id;
        $data["overview_type"]=$type;
        $this->load->view("overview/marital_overview", $data);
    }

    function status_overview($entity_id,$overview_type="PROMOTIONS") {
        $data["entity_id"]=$entity_id;
        $data["overview_type"]=$overview_type;
        $this->load->view("overview/status_overview",$data);
    }

    function getcountByCity($promo_id) {
        $dbapi = $this->load->module("db_api");
        $sql = "SELECT oal.city_id_str FROM onetwork_audience_lab oal inner join onetwork_promotions as op on op.audience_id_fk= oal.rec_aid where op.rec_aid = $promo_id";
        $audienceData = $dbapi->custom("SELECT oal.city_id_str FROM onetwork_audience_lab oal inner join onetwork_promotions as op on op.audience_id_fk= oal.rec_aid where op.rec_aid = $promo_id");
        $couData = $audienceData[0]['city_id_str'];
        $sql = "select gci.city_name, count(ip.profile_id) as UserCount from iws_profiles as ip left join global_cities_info as gci on gci.city_id=ip.city_id left join onetwork_promotion_targets opt on opt.target_id_fk = ip.profile_id where ip.city_id in($couData) and opt.promotion_id_fk=$promo_id GROUP BY ip.city_id";
        $result = $dbapi->custom($sql);
        return $result;
    }

    function getcountByCountry($promo_id) {
        $dbapi = $this->load->module("db_api");
        $audienceData = $dbapi->custom("SELECT oal.country_id_str FROM onetwork_audience_lab oal inner join onetwork_promotions op on op.audience_id_fk= oal.rec_aid where op.rec_aid = $promo_id");
        $couData = $audienceData[0]['country_id_str'];
        $sql = "select gci.country_name, count(ip.profile_id) as UserCount from iws_profiles as ip left join global_countries_info as gci on gci.country_id=ip.country_id left join onetwork_promotion_targets opt on opt.target_id_fk = ip.profile_id where ip.country_id in($couData) and opt.promotion_id_fk=$promo_id GROUP BY ip.country_id";
        $result = $dbapi->custom($sql);
        return $result;
    }

    // pavani
    function audience_visitors($promo_id) {
      $dbapi = $this->load->module("db_api");
      $limit = ($this->input->post("limit") != "") ? $this->input->post("limit") : 0;
      //$result = $dbapi->custom("SELECT first_name,last_name,total_views,added_on,match_type FROM iws_profiles profiles INNER JOIN onetwork_promotion_targets targets ON profiles.profile_id=targets.target_id_fk WHERE promotion_id_fk=" . $promo_id . " LIMIT 5");
      //echo "SELECT first_name,last_name,total_views,added_on,match_type FROM iws_profiles profiles INNER JOIN onetwork_promotion_targets targets ON profiles.profile_id=targets.target_id_fk WHERE promotion_id_fk=" . $promo_id." LIMIT $limit,6";
      $result = $dbapi->custom("SELECT first_name,last_name,total_views,added_on,match_type FROM iws_profiles profiles INNER JOIN onetwork_promotion_targets targets ON profiles.profile_id=targets.target_id_fk WHERE promotion_id_fk=" . $promo_id." LIMIT $limit,6");
      $cnt_result = $dbapi->custom("SELECT COUNT(*) as cnt FROM iws_profiles profiles INNER JOIN onetwork_promotion_targets targets ON profiles.profile_id=targets.target_id_fk WHERE promotion_id_fk=" . $promo_id);
      $data["visitors_data"] = $result;
      $data["audience_cnt"] = $cnt_result;
      $this->load->view("overview/visitors_overview", $data);
    }

    function promotion_target() {
        $this->load->view("overview/targets_overview");
    }

    function other_promotions($promo_id) {
        $search = ($this->input->post("search_term") != "") ? $this->input->post("search_term") : "";
        $limit = ($this->input->post("limit") != "") ? $this->input->post("limit") : 0;
        $db_obj = $this->load->module("db_api");
        $sqlQry = "select status, promotion_start_time, promotion_end_time, total_cost, promo_code, promo_name, module, promo_type, created_on,entity_id from onetwork_promotions WHERE created_by=".$this->get_userId();
        if ($search != "") {
            $sqlQry.=" AND promo_name LIKE '%" . $search . "%'";
        }
        $sqlQry.=" ORDER BY created_on DESC LIMIT ".$limit.",4";
        $result = $db_obj->custom($sqlQry);
        $sqlCntQry="SELECT COUNT(*) AS cnt FROM onetwork_promotions WHERE created_by=".$this->get_userId();
        if ($search != "") {
          $sqlCntQry.=" AND promo_name LIKE '%" . $search . "%'";
        }
        $cnt_result = $db_obj->custom($sqlCntQry);
        //echo $sqlQry;
        $i = 0;
        foreach ($result as $res) {
            $entity_id = $res["entity_id"];
            $module_qry = "";
            if (trim($res["promo_type"]) == "ONESHOP_PRODUCTS") {
                //$module_qry="SELECT product_name as entity_name FROM oshop_products WHERE product_aid=".$entity_id;
                $module_qry = "SELECT product_name as entity_name,product_code as entity_code,store_code as parent_code FROM oshop_products prods INNER JOIN oshop_stores stores ON prods.store_id_fk=stores.store_aid WHERE product_aid=" . $entity_id;
            }
            if (trim($res["promo_type"]) == "ONESHOP_STORES") {
                $module_qry = "SELECT store_name as entity_name,store_code as entity_code,'' as parent_code FROM oshop_stores WHERE store_aid=" . $entity_id;
            }
            $module_result = $db_obj->custom($module_qry);
            if ($module_result[0]["parent_code"] != "") {
                $parent_node = $module_result[0]["parent_code"];
            }
            $result[$i]["entity_name"] = $module_result[0]["entity_name"];
            $result[$i]["entity_code"] = $module_result[0]["entity_code"];
            $result[$i]["parent_code"] = $parent_node;
            $i++;
        }
        //print_r($result);
        $data["promotion_data"] = $result;
        $data["promos_cnt"]=$cnt_result;
        $this->load->view("overview/other_promotions", $data);
    }

    function match_overview($entity_id,$overview_type='PROMOTIONS') {
        $best_match_cnt = 0;
        $medium_match_cnt = 0;
        $basic_match_cnt = 0;
        $random_match_cnt = 0;
        $match_str = "";
        $dbapi = $this->load->module("db_api");
        if($overview_type=="GMA"){
            $match_cnt_result = $dbapi->custom("SELECT COUNT(*),match_type FROM onetwork_gma_targets WHERE gma_aid_fk=" . $entity_id . " GROUP BY match_type");
            $match_result = $dbapi->select("start_date as start_time,end_date as end_time", "onetwork_gma_advertisments", "rec_aid=" . $entity_id);
            $match_date_result = $dbapi->custom("SELECT COUNT(user_id_fk) AS target_cnt,match_type FROM onetwork_gma_targets WHERE gma_aid_fk=" . $entity_id . " GROUP BY match_type");
        }else{
            //$match_cnt_result = $dbapi->custom("SELECT COUNT(*),match_type FROM onetwork_gma_targets WHERE gma_aid_fk=" . $entity_id . " GROUP BY match_type");
            $match_result = $dbapi->select("promotion_start_time as start_time,promotion_end_time as end_time", "onetwork_promotions", "rec_aid=" . $entity_id);
            $match_date_result = $dbapi->custom("SELECT COUNT(target_id_fk) AS target_cnt,match_type FROM onetwork_promotion_targets WHERE promotion_id_fk=" . $entity_id . " GROUP BY match_type");
        }
        foreach ($match_date_result as $res) {
            if (isset($res["match_type"]) && $res["match_type"] == "BEST_MATCH") {
                $best_match_cnt = $res["target_cnt"];
            } elseif (isset($res["match_type"]) && $res["match_type"] == "MEDIUM_MATCH") {
                $medium_match_cnt = $res["target_cnt"];
            } elseif (isset($res["match_type"]) && $res["match_type"] == "BASIC_MATCH") {
                $basic_match_cnt = $res["target_cnt"];
            } elseif (isset($res["match_type"]) && $res["match_type"] == "RANDOM_MATCH") {
                $random_match_cnt = $res["target_cnt"];
            }
        }
        $match_str = $best_match_cnt . "~" . $medium_match_cnt . "~" . $basic_match_cnt . "~" . $random_match_cnt;
        $data["match_cnt_data"] = $match_cnt_result;
        $data["match_data"] = $match_result;
        $data["matches"] = $match_str;
        $data["overview_type"]=$overview_type;
        $this->load->view("overview/match_overview", $data);
    }

    function promo_insight($promo_id) {
        $dbapi = $this->load->module("db_api");
        $result = $dbapi->custom("SELECT promo_code,promotion_id_fk,SUM(total_clicks) AS total_clicks,SUM(total_views) AS total_views,SUM(`total_close`) AS total_close FROM `onetwork_promotion_targets` targets INNER JOIN onetwork_promotions promos ON promos.rec_aid=targets.promotion_id_fk WHERE promotion_id_fk=" . $promo_id);
        $data["insight_data"] = $result;
        $this->load->view("overview/promo_insight", $data);
    }

    function today_stats($promo_id) {
        $dbapi = $this->load->module("db_api");
        $result = $dbapi->custom("SELECT promo_code,promotion_id_fk,SUM(total_clicks) AS total_clicks,SUM(total_views) AS total_views,SUM(`total_close`) AS total_close FROM `onetwork_promotion_targets` targets INNER JOIN onetwork_promotions promos ON promos.rec_aid=targets.promotion_id_fk WHERE promotion_id_fk=" . $promo_id);
        $data['prData'] = $dbapi->custom("select promotion_start_time,promotion_end_time from onetwork_promotions where rec_aid=$promo_id");
        $data["stats_data"] = $result;
        $this->load->view("overview/promo_sales", $data);
    }

    // pavani
    function promotion_targets($promo_id) {
        $dbapi = $this->load->module("db_api");
        $promo_data = $dbapi->select("rec_aid,promo_code,promo_name,module,promo_type,total_cost,total_targets,promotion_start_time,promotion_end_time", "onetwork_promotions", "rec_aid=" . $promo_id);
        $targets_data = $dbapi->custom("SELECT COUNT(*) AS target_cnt FROM onetwork_promotion_targets WHERE promotion_id_fk=" . $promo_id);
        $data["promotions_data"] = $promo_data;
        $data["targets_data"] = $targets_data;
        $this->load->view("overview/promotion_targets", $data);
    }

    function getChartData() {
        $promo_id = isset($_REQUEST["promo_id"])?$_REQUEST["promo_id"]:"";
        $campaign_id = isset($_REQUEST["campaign_id"])?$_REQUEST["campaign_id"]:"";
        $dbapi = $this->load->module("db_api");
        if($promo_id!=""){
            $result = $dbapi->select("total_targets", "onetwork_promotions", "rec_aid=" . $promo_id);
            $aresult = $dbapi->custom("SELECT dob FROM cvbank_users_details users INNER JOIN onetwork_promotion_targets targets ON targets.target_id_fk=users.iws_profile_id WHERE promotion_id_fk=" . $promo_id);
        }
        if($campaign_id){
            $result = $dbapi->select("total_targets", "onetwork_gm_advertisments", "rec_aid=" . $campaign_id);
            $aresult = $dbapi->custom("SELECT dob FROM cvbank_users_details users INNER JOIN onetwork_gma_targets targets ON targets.user_id_fk=users.iws_profile_id WHERE gma_aid_fk=" . $campaign_id);
        }
        //print_r($aresult);
        $current_date = date("Y-m-d");
        $age1520 = 0;
        $age2135 = 0;
        $age3650 = 0;
        $age5170 = 0;
        $age70 = 0;
        foreach ($aresult as $rows) {
            $dob = $rows["dob"];
            $no_years = $this->yearsDifference($current_date, $dob);
            if ($no_years > 15 && $no_years <= 20) {
                $age1520++;
            } elseif ($no_years >= 21 && $no_years <= 35) {
                $age2135++;
            } elseif ($no_years >= 36 && $no_years <= 50) {
                $age3650++;
            } elseif ($no_years >= 51 && $no_years <= 70) {
                $age5170++;
            } else {
                $age70++;
            }
        }
        $subtotal = $age1520 + $age2135 + $age3650 + $age5170 + $age70;
        $remaining = $result[0]["total_targets"] - $subtotal;
        $data_points = array();
        array_push($data_points, array("y" => $remaining, "legendText" => "Remaining"));
        if ($age1520 > 0) {
            array_push($data_points, array("y" => $age1520, "legendText" => "15-20"));
        }
        if ($age2135 > 0) {
            array_push($data_points, array("y" => $age2135, "legendText" => "21-35"));
        }
        if ($age3650 > 0) {
            array_push($data_points, array("y" => $age3650, "legendText" => "36-50"));
        }
        if ($age5170 > 0) {
            array_push($data_points, array("y" => $age5170, "legendText" => "51-70"));
        }
        if ($age70 > 0) {
            array_push($data_points, array("y" => $age70, "legendText" => "70+"));
        }
        //array_push($data_points, array("y" => $presult[0]["age_cnt1"],"legendText"=>"age_cnt"));        
        echo json_encode($data_points, JSON_NUMERIC_CHECK);
    }

    function yearsDifference($endDate, $beginDate) {
        $date_parts1 = explode("-", $beginDate);
        $date_parts2 = explode("-", $endDate);
        return $date_parts2[0] - $date_parts1[0];
    }

    function maritalChart() {
        //$promo_id = $this->input->get("promo_id");
        $promo_id=isset($_REQUEST["promo_id"])?$_REQUEST["promo_id"]:"";
        $campaign_id=isset($_REQUEST["campaign_id"])?$_REQUEST["campaign_id"]:"";
        $dbapi = $this->load->module("db_api");
        if($promo_id!=""){
            $result = $dbapi->custom("SELECT gender,total_targets FROM onetwork_promotions promos INNER JOIN onetwork_audience_lab audi ON promos.transaction_id_fk=audi.transaction_id_fk WHERE promos.rec_aid=" . $promo_id);
            $mresult = $dbapi->custom("SELECT gender FROM cvbank_users_details users INNER JOIN onetwork_promotion_targets targets ON targets.target_id_fk=users.iws_profile_id WHERE promotion_id_fk=" . $promo_id);
        }
        if($campaign_id!=""){
            $result = $dbapi->custom("SELECT marital_status,total_targets FROM onetwork_gm_advertisments campaigns INNER JOIN onetwork_audience_lab audi ON campaigns.transaction_aid_fk=audi.transaction_id_fk WHERE campaigns.rec_aid=" . $campaign_id);
            $mresult = $dbapi->custom("SELECT marital_status FROM cvbank_users_details users INNER JOIN onetwork_gma_targets targets ON targets.user_id_fk=users.iws_profile_id WHERE gma_aid_fk=" . $campaign_id);
        }
        $single_cnt = 0;
        $married_cnt = 0;
        $data_points = array();
        foreach ($mresult as $rows) {
            if ($rows == "Single") {
                $single_cnt++;
            } else {
                $married_cnt++;
            }
        }
        if ($single_cnt > 0) {
            array_push($data_points, array("y" => $single_cnt, "legendText" => "Single"));
        }
        if ($married_cnt > 0) {
            array_push($data_points, array("y" => $married_cnt, "legendText" => "Married"));
        }
        $marital_cnt = $single_cnt + $married_cnt;
        $remaining = $result[0]["total_targets"] - $marital_cnt;
        array_push($data_points, array("y" => $remaining, "legendText" => "Remaining"));
        echo json_encode($data_points, JSON_NUMERIC_CHECK);
    }

    // pavani
    function genderChart() {
        //$promo_id = $this->input->get("promo_id");
        $promo_id=isset($_REQUEST["promo_id"])?$_REQUEST["promo_id"]:"";
        $campaign_id=isset($_REQUEST["campaign_id"])?$_REQUEST["campaign_id"]:"";
        $dbapi = $this->load->module("db_api");
        if($promo_id!=""){
            $result = $dbapi->custom("SELECT gender,total_targets FROM onetwork_promotions promos INNER JOIN onetwork_audience_lab audi ON promos.transaction_id_fk=audi.transaction_id_fk WHERE promos.rec_aid=" . $promo_id);
            $gresult = $dbapi->custom("SELECT gender FROM cvbank_users_details users INNER JOIN onetwork_promotion_targets targets ON targets.target_id_fk=users.iws_profile_id WHERE promotion_id_fk=" . $promo_id);
        }
        if($campaign_id!=""){
            $result = $dbapi->custom("SELECT gender,total_targets FROM onetwork_gm_advertisments campaigns INNER JOIN onetwork_audience_lab audi ON campaigns.transaction_aid_fk=audi.transaction_id_fk WHERE campaigns.rec_aid=" . $campaign_id);
            $gresult = $dbapi->custom("SELECT gender FROM cvbank_users_details users INNER JOIN onetwork_gma_targets targets ON targets.user_id_fk=users.iws_profile_id WHERE gma_aid_fk=" . $campaign_id);
        }
        $female_cnt = 0;
        $male_cnt = 0;
        $data_points = array();
        foreach ($gresult as $rows) {
            //array_push($data_points, array("y" => $rows["gender_cnt"],"legendText"=>$rows["gender"]));
            if ($rows == "Female") {
                $female_cnt++;
            } else {
                $male_cnt++;
            }
        }
        if ($male_cnt > 0) {
            array_push($data_points, array("y" => $male_cnt, "legendText" => "Male"));
        }
        if ($female_cnt > 0) {
            array_push($data_points, array("y" => $female_cnt, "legendText" => "Female"));
        }
        $gender_cnt = $female_cnt + $male_cnt;
        $remaining = $result[0]["total_targets"] - $gender_cnt;
        array_push($data_points, array("y" => $remaining, "legendText" => "Remaining"));
        echo json_encode($data_points, JSON_NUMERIC_CHECK);
    }

    function getChartLang() {
        $promo_id = $_REQUEST["promo_id"];
        $dbapi = $this->load->module("db_api");
        //$query = "SELECT promos.rec_aid,last_activity_date,target_id_fk,promos.transaction_id_fk AS transaction_id_fk,(SELECT count(*) FROM cvbank_languages lang WHERE iws_language_id IN (SELECT languages_knows FROM onetwork_audience_lab WHERE transaction_id_fk=transaction_id_fk) AND iws_profile_id=target_id_fk) AS lang_cnt,(SELECT count(*) FROM cvbank_users_details users WHERE nationality IN (SELECT nationality FROM onetwork_audience_lab WHERE transaction_id_fk=transaction_id_fk) AND iws_profile_id=target_id_fk) AS nationality_cnt FROM onetwork_promotions promos INNER JOIN onetwork_promotion_targets targets ON promos.rec_aid=targets.promotion_id_fk WHERE promos.rec_aid=" . $promo_id . " GROUP BY last_activity_date";
        $query = "SELECT promos.rec_aid,last_activity_date,target_id_fk,promos.transaction_id_fk AS transaction_id_fk,(SELECT count(*) FROM cvbank_languages lang WHERE iws_language_id IN (SELECT languages_knows FROM onetwork_audience_lab WHERE transaction_id_fk=transaction_id_fk) AND iws_profile_id=target_id_fk) AS lang_cnt,(SELECT count(*) FROM iws_profiles users WHERE nationality IN (SELECT nationality FROM onetwork_audience_lab WHERE transaction_id_fk=transaction_id_fk) AND iws_profile_id=target_id_fk) AS nationality_cnt FROM onetwork_promotions promos INNER JOIN onetwork_promotion_targets targets ON promos.rec_aid=targets.promotion_id_fk WHERE promos.rec_aid=" . $promo_id . " GROUP BY last_activity_date";
        $result = $dbapi->custom($query);
        $data_points = [];
        for ($i = 0; $i < count($result); $i++) {
            $res = $result[$i];
            $rep_date = str_replace("-", ",", $res["last_activity_date"]);
            array_push($data_points, array("activity_date" => $res["last_activity_date"], "lang_cnt" => (int) $res["lang_cnt"], "nationality_cnt" => (int) $res["nationality_cnt"]));
            //array_push($tmp["nationality_cnt"],array("x"=>$res["last_activity_date"],"y"=>$res["nationality_cnt"]));
        }
        echo json_encode($data_points);
    }

    function interests_views($entity_id,$overview_type='') {
        if($overview_type!=''){
            $type=$overview_type;
        }else{
            $type="PROMOTIONS";
        }
        $data["entity_id"] = $entity_id;
        $data["overview_type"]=$overview_type;
        $this->load->view("overview/interests_view", $data);
    }

    function getInterestsChart() {
        $dbapi = $this->load->module("db_api");
        //$promo_id = $this->input->get("promo_id");
        $promo_id=isset($_REQUEST["promo_id"])?$_REQUEST["promo_id"]:"";
        $campaign_id=isset($_REQUEST["campaign_id"])?$_REQUEST["campaign_id"]:"";
        if($promo_id!=""){
            $query = "SELECT promos.rec_aid,last_activity_date,target_id_fk,promos.transaction_id_fk AS transaction_id_fk FROM onetwork_promotions promos INNER JOIN onetwork_promotion_targets targets ON promos.rec_aid=targets.promotion_id_fk WHERE promos.rec_aid=" . $promo_id . " GROUP BY last_activity_date,target_id_fk";
        }
        if($campaign_id!=""){
            $query = "SELECT campaigns.rec_aid,last_activity_time as last_activity_date,user_id_fk,campaigns.transaction_aid_fk AS transaction_id_fk FROM onetwork_gm_advertisments campaigns INNER JOIN onetwork_gma_targets targets ON campaigns.rec_aid=targets.gma_aid_fk WHERE campaigns.rec_aid=" . $campaign_id . " GROUP BY last_activity_time,user_id_fk";
        }
        $result = $dbapi->custom($query);
        $interests_query = "SELECT interest_entities FROM onetwork_audience_lab WHERE transaction_id_fk=" . $result[0]["transaction_id_fk"];
        $iresult = $dbapi->custom($interests_query);
        $interests_array = explode(",", $iresult[0]["interest_entities"]);
        $data_points = [];
        $tmp = [];
        $current_date = "";
        $profile_str = "";
        foreach ($result as $info) {
            if ($current_date == "") {
                if ($profile_str == "") {
                    $profile_str = $info["target_id_fk"];
                } else {
                    $profile_str.="," . $info["target_id_fk"];
                }
                $tmp[$info["last_activity_date"]] = $info["target_id_fk"];
            } else {
                if ($current_date == $info["last_activity_date"]) {
                    if ($profile_str == "") {
                        $profile_str = $info["target_id_fk"];
                    } else {
                        $profile_str.="," . $info["target_id_fk"];
                    }
                    $tmp[$info["last_activity_date"]] = $profile_str;
                } else {
                    $tmp[$info["last_activity_date"]] = $info["target_id_fk"];
                }
            }
            $current_date = $info["last_activity_date"];
        }
        foreach ($tmp as $key => $val) {
            $tarry = [];
            for ($j = 0; $j < count($interests_array); $j++) {
                $iquery = "SELECT COUNT(*) AS cnt,page_category FROM click_page_likers plikers INNER JOIN click_pages pages ON plikers.page_aid_fk=pages.page_aid WHERE user_id_fk IN (" . $val . ") and page_category='" . $interests_array[$j] . "'";
                $ires = $dbapi->custom($iquery);
                $tarry[$interests_array[$j]] = (int) $ires[0]["cnt"];
            }
            $data_pts = array_merge(array("activity_date" => $key), $tarry);
            array_push($data_points, $data_pts);
        }
        //print_r($data_points);
        echo json_encode($data_points);
    }

    // pavani
    function getPagesChart() {
        $dbapi = $this->load->module("db_api");
        //$promo_id = $this->input->get("promo_id");
        $promo_id=isset($_REQUEST["promo_id"])?$_REQUEST["promo_id"]:"";
        $campaign_id=isset($_REQUEST["campaign_id"])?$_REQUEST["campaign_id"]:"";
        if($promo_id!=""){
            $query = "SELECT promos.rec_aid,last_activity_date,target_id_fk,promos.transaction_id_fk AS transaction_id_fk FROM onetwork_promotions promos INNER JOIN onetwork_promotion_targets targets ON promos.rec_aid=targets.promotion_id_fk WHERE promos.rec_aid=" . $promo_id . " GROUP BY last_activity_date,target_id_fk";
        }
        if($campaign_id!=""){
            $query = "SELECT campaigns.rec_aid,DATE(last_activity_time) as last_activity_date,user_id_fk as target_id_fk,campaigns.transaction_aid_fk AS transaction_id_fk FROM onetwork_gm_advertisments campaigns INNER JOIN onetwork_gma_targets targets ON campaigns.rec_aid=targets.user_id_fk WHERE campaigns.rec_aid=" . $campaign_id . " GROUP BY last_activity_time,user_id_fk";
        }
        $result = $dbapi->custom($query);
        $pages_query = "SELECT exact_entities_ids FROM onetwork_audience_lab WHERE transaction_id_fk=" . $result[0]["transaction_id_fk"];
        $presult = $dbapi->custom($pages_query);
        $current_date = "";
        $profile_str = "";
        $data_points = [];
        $pages_array = explode(",", $presult[0]["exact_entities_ids"]);
        foreach ($result as $info) {
            if ($current_date == "") {
                if ($profile_str == "") {
                    $profile_str = $info["target_id_fk"];
                } else {
                    $profile_str.="," . $info["target_id_fk"];
                }
                $tmp[$info["last_activity_date"]] = $info["target_id_fk"];
            } else {
                if ($current_date == $info["last_activity_date"]) {
                    if ($profile_str == "") {
                        $profile_str = $info["target_id_fk"];
                    } else {
                        $profile_str.="," . $info["target_id_fk"];
                    }
                    $tmp[$info["last_activity_date"]] = $profile_str;
                } else {
                    $tmp[$info["last_activity_date"]] = $info["target_id_fk"];
                }
            }
            $current_date = $info["last_activity_date"];
        }
        foreach ($tmp as $key => $val) {
            $tarry = [];
            for ($j = 0; $j < count($pages_array); $j++) {
                $pquery = "SELECT count(*) AS cnt,page_aid_fk,(SELECT page_name FROM click_pages WHERE page_aid=" . $pages_array[$j] . ") AS page_name  from click_page_likers plikers WHERE page_aid_fk IN (" . $pages_array[$j] . ") and user_id_fk IN (" . $val . ")";
                $pres = $dbapi->custom($pquery);
                $tarry[$pres[0]["page_name"]] = (int) $pres[0]["cnt"];
            }
            $data_pts = array_merge(array("activity_date" => $key), $tarry);
            array_push($data_points, $data_pts);
        }
        echo json_encode($data_points);
    }

    function interests_pages_views($entity_id,$overview_type='') {
        if($overview_type!=''){
            $type=$overview_type;
        }else{
            $type="PROMOTIONS";
        }
        $data["entity_id"] = $entity_id;
        $data["overview_type"]=$type;
        $this->load->view("overview/pages_interests_view", $data);
    }

    // pavani
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

    function downloadPDF() {
        $dbapi = $this->load->module("db_api");
        $promo_id = isset($_REQUEST["promo_id"])?$_REQUEST["promo_id"]:"";
        $campaign_id = isset($_REQUEST["campaign_id"])?$_REQUEST["campaign_id"]:"";
        if($promo_id!=""){
            $query = "SELECT promo_name,module,promo_type,promotion_start_time,promotion_end_time,total_cost,total_targets FROM onetwork_promotions WHERE rec_aid=" . $promo_id;
            $result = $dbapi->custom($query);
            $pquery = "SELECT DATE(added_on) AS added_on,total_clicks,total_views,total_close,impression FROM onetwork_promotion_targets WHERE promotion_id_fk=" . $promo_id;
            $presult = $dbapi->custom($pquery);
            $mquery = "SELECT COUNT(*) AS cnt,match_type FROM onetwork_promotion_targets WHERE promotion_id_fk=" . $promo_id . " GROUP BY match_type";
            $mresult = $dbapi->custom($mquery);
        }else{
            $query = "SELECT campaign_name,module_target,campaign_type,start_date,end_date,total_cost,total_targets FROM onetwork_gm_advertisments WHERE rec_aid=" . $campaign_id;
            $result = $dbapi->custom($query);
            $pquery = "SELECT DATE(added_on) AS added_on,total_clicks,total_views,total_close FROM onetwork_gma_targets WHERE gma_aid_fk=" . $campaign_id;
            $presult = $dbapi->custom($pquery);
            $mquery = "SELECT COUNT(*) AS cnt,match_type FROM onetwork_gma_targets WHERE gma_aid_fk=" . $campaign_id . " GROUP BY match_type";
            $mresult = $dbapi->custom($mquery);
        }
        $best_match = 0;
        $medium_match = 0;
        $basic_match = 0;
        $random_match = 0;
        foreach ($mresult as $mres) {
            if (isset($mres["match_type"]) && ($mres["match_type"] == "BEST_MATCH")) {
                $best_match = $mres["cnt"];
            }
            if (isset($mres["match_type"]) && ($mres["match_type"] == "MEDIUM_MATCH")) {
                $medium_match = $mres["cnt"];
            }
            if (isset($mres["match_type"]) && ($mres["match_type"] == "BASIC_MATCH")) {
                $basic_match = $mres["cnt"];
            }
            if (isset($mres["match_type"]) && ($mres["match_type"] == "RANDOM_MATCH")) {
                $random_match = $mres["cnt"];
            }
        }
        $this->load->library("Pdf");
        $pdf = new Pdf('p', 'mm', 'A4');
        $pdf->AddPage();
        $pdf->setFont('Arial', '', 12);
        $total_clicks = 0;
        $total_views = 0;
        $total_close = 0;
        foreach ($presult as $res) {
            if ($res["total_clicks"]) {
                $total_clicks+=$res["total_clicks"];
            }
            if ($res["total_views"]) {
                $total_views+=$res["total_views"];
            }
            if ($res["total_close"]) {
                $total_close+=$res["total_close"];
            }
        }
        $click_factor = floor(($total_clicks / $total_views) * 100);
        $close_factor = floor(($total_close / $total_views) * 100);
        $views_factor = floor(($click_factor * $close_factor) / 100);
        $pdf->Ln(10);
        if($promo_id!=""){
            $pdf->Cell(40, 10, "Promotion name:" . $result[0]["promo_name"], 0);
            $pdf->Ln(5);
            $pdf->Cell(80, 10, "Module:" . $result[0]["module"], 0);
            $pdf->Cell(80, 10, "Module Name:" . str_replace("_", " ", $result[0]["promo_type"]), 0);
            $pdf->Ln(5);
            $pdf->Cell(80, 10, "Start Time:" . $result[0]["promotion_start_time"], 0);
            $pdf->Cell(80, 10, "End Time:" . $result[0]["promotion_end_time"], 0);
        }else{
            $pdf->Cell(40, 10, "Campaign name:" . $result[0]["campaign_name"], 0);
            $pdf->Ln(5);
            $pdf->Cell(80, 10, "Module:" . $result[0]["module_target"], 0);
            $pdf->Cell(80, 10, "Module Type:" . str_replace("_", " ", $result[0]["campaign_type"]), 0);
            $pdf->Ln(5);
            $pdf->Cell(80, 10, "Start Time:" . $result[0]["start_date"], 0);
            $pdf->Cell(80, 10, "End Time:" . $result[0]["end_date"], 0);
        }
        $pdf->Ln(15);
        $header = array('Date', 'Clicks', 'Views', 'Close', 'Impression');
        $pdf->BasicTable($header, $presult);
        $pdf->Ln(15);
        $pdf->SetFillColor(204, 204, 255);
        $pdf->setFont('Arial', 'B', 13);
        $pdf->Cell(190, 10, "Quality Score", 1, 0, 'L', true);
        //rgb(30,0,55)        
        $pdf->Ln();
        $pdf->setFont('Arial', '', 12);
        $pdf->Cell(40, 10, "Clicks:" . $total_clicks, 1);
        $pdf->Cell(40, 10, "Click Factor:" . $click_factor . "%", 1);
        $pdf->Ln();
        $pdf->Cell(40, 10, "Close:" . $total_close, 1);
        $pdf->Cell(40, 10, "Close Factor:" . $close_factor . "%", 1);
        $pdf->Ln();
        $pdf->Cell(40, 10, "Views:" . $total_views, 1);
        $pdf->Cell(40, 10, "Views Factor:" . $views_factor . "%", 1);
        $pdf->Ln(20);
        $pdf->SetFillColor(204, 204, 255);
        $pdf->setFont('Arial', 'B', 13);
        $pdf->Cell(190, 10, "Factor Table", 1, 0, 'L', true);
        $pdf->Ln(15);
        $pdf->setFont('Arial', 'B', 12);
        $pdf->Cell(40, 10, "Match Type", 1);
        $pdf->Cell(40, 10, "Target", 1);
        $pdf->Ln(10);
        $pdf->setFont('Arial', '', 12);
        $pdf->Cell(40, 10, "Best Match", 1);
        $pdf->Cell(40, 10, $best_match, 1);
        $pdf->Ln();
        $pdf->Cell(40, 10, "Medium Match", 1);
        $pdf->Cell(40, 10, $medium_match, 1);
        $pdf->Ln();
        $pdf->Cell(40, 10, "Basic Match", 1);
        $pdf->Cell(40, 10, $basic_match, 1);
        $pdf->Ln();
        $pdf->Cell(40, 10, "Random Match", 1);
        $pdf->Cell(40, 10, $random_match, 1);
        ob_clean();
        $pdf->output('CampaignReport.pdf', 'D');
        //print_r($presult);
    }
    
    //RAVITEJA -24032016
    function generateExcel() {
	
		$dbapi=$this->load->module("db_api");
		$promo_id=isset($_REQUEST["promo_id"])?$this->input->get("promo_id"):"";
                $campaign_id=isset($_REQUEST["campaign_id"])?$this->input->get("campaign_id"):"";
		$table = "onetwork_promotions";
		if($promo_id!=""){
                    $query = $dbapi->custom("select prom.promo_name,prom.module,prom.promo_type,prom.each_day_budgets,prom.total_cost,prom.total_targets,prom.each_day_budgets,date(prom.promotion_end_time) as Date,sum(tt.total_views) as total_views,sum(tt.total_clicks) as total_clicks,sum(tt.total_close) as total_closed from $table prom inner join onetwork_promotion_targets tt on prom.rec_aid = tt.promotion_id_fk where prom.rec_aid='".$promo_id."'");
                }else{
                    $query = $dbapi->custom("select ogma.campaign_name,ogma.module_target,ogma.campaign_type,ogma.total_cost,ogma.total_targets,date(ogma.end_date) as Date,sum(targets.total_views) as total_views,sum(targets.total_clicks) as total_clicks,sum(targets.total_close) as total_closed from onetwork_gm_advertisments ogma inner join onetwork_gma_targets targets on ogma.rec_aid = targets.gma_aid_fk where ogma.rec_aid=".$campaign_id);
                }
		$this->excel->setActiveSheetIndex(0);
		//name the worksheet
                if($promo_id!=""){
                    $this->excel->getActiveSheet()->setTitle('Promotions');
                }else{
                    $this->excel->getActiveSheet()->setTitle('Campaigns');
                }
		$i = 1;
		foreach($query[0] as $key => $value) {
			$key   = ucwords(str_replace('_',' ',$key));
			$value = ucwords(str_replace('_',' ',$value));
			if(!is_numeric($key)) {
				$this->excel->getActiveSheet()->setCellValue('A'.$i, $key);
				$this->excel->getActiveSheet()->setCellValue('B'.$i, $value);
				$i++;
			}
		} 
		for($col = ord('A'); $col <= ord('B'); $col++){
			//set column dimension
			$this->excel->getActiveSheet()->getColumnDimension(chr($col))->setAutoSize(true);
			//change the font size
			$this->excel->getActiveSheet()->getStyle(chr($col))->getFont()->setSize(12);

			$this->excel->getActiveSheet()->getStyle(chr($col))->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
		}
		
		// 2)
		$this->excel->createSheet(1);
		$this->excel->setActiveSheetIndex(1);
		$targetable = "onetwork_promotion_targets";
		//name the worksheet
		$this->excel->getActiveSheet()->setTitle('Datewise Reports');
                if($promo_id!=""){
                    $dquery = $dbapi->custom("select sum(tt.total_views) as stv,sum(tt.total_clicks) as stt,sum(tt.total_close) as stc ,sum(tt.impression) as sti,date(tt.added_on) as date from $targetable tt inner join $table pt on tt.promotion_id_fk = pt.rec_aid where pt.rec_aid='".$promo_id."' group by date(tt.added_on)");
                }else{
                    $dquery = $dbapi->custom("select sum(targets.total_views) as stv,sum(targets.total_clicks) as stt,sum(targets.total_close) as stc ,date(targets.added_on) as date from onetwork_gma_targets targets inner join onetwork_gm_advertisments ogma on targets.gma_aid_fk = ogma.rec_aid where ogma.rec_aid=".$campaign_id." group by date(targets.added_on)");
                }
		$i = 1;
		$this->excel->getActiveSheet()->setCellValue('A1','Date');
		$this->excel->getActiveSheet()->setCellValue('B1', 'Total Clicks');
		$this->excel->getActiveSheet()->setCellValue('C1', 'Total Views');
		$this->excel->getActiveSheet()->setCellValue('D1', 'Total Closed');
		$this->excel->getActiveSheet()->setCellValue('E1', 'Total Impression');
		foreach($dquery as $key => $dateres) {
			$key = $key + 2;
			$this->excel->getActiveSheet()->setCellValue('A'.$key, $dateres['date']);
			$this->excel->getActiveSheet()->setCellValue('B'.$key, $dateres['stt']);
			$this->excel->getActiveSheet()->setCellValue('C'.$key, $dateres['stv']);
			$this->excel->getActiveSheet()->setCellValue('D'.$key, $dateres['stc']);
                        if($promo_id!=""){
                            $this->excel->getActiveSheet()->setCellValue('E'.$key, $dateres['sti']);
                        }
			
		} 
                if($promo_id!=""){
                    for($col = ord('A'); $col <= ord('E'); $col++){
			//set column dimension
			$this->excel->getActiveSheet()->getColumnDimension(chr($col))->setAutoSize(true);
			//change the font size
			$this->excel->getActiveSheet()->getStyle(chr($col))->getFont()->setSize(12);

			$this->excel->getActiveSheet()->getStyle(chr($col))->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
                    }
                }else{
                    for($col = ord('A'); $col <= ord('D'); $col++){
			//set column dimension
			$this->excel->getActiveSheet()->getColumnDimension(chr($col))->setAutoSize(true);
			//change the font size
			$this->excel->getActiveSheet()->getStyle(chr($col))->getFont()->setSize(12);

			$this->excel->getActiveSheet()->getStyle(chr($col))->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
		}
                }
		
		
		// 3)
		
		$this->excel->createSheet(2);
		$this->excel->setActiveSheetIndex(2);
		//name the worksheet
		$this->excel->getActiveSheet()->setTitle('Factor Table');
                if($promo_id!=""){
                    $factqry = $dbapi->custom("select sum(tt.total_views) as ttv,sum(tt.total_clicks) as ttc,sum(tt.total_close) as ttcl from $targetable tt inner join $table pt on tt.promotion_id_fk = pt.rec_aid where pt.rec_aid='".$promo_id."'");
                }else{
                    $factqry = $dbapi->custom("select sum(tt.total_views) as ttv,sum(tt.total_clicks) as ttc,sum(tt.total_close) as ttcl from onetwork_gma_targets tt inner join onetwork_gm_advertisments pt on tt.gma_aid_fk = pt.rec_aid where pt.rec_aid=".$campaign_id);
                }
		$i = 1;
		$factqry = $factqry[0];
		$this->excel->getActiveSheet()->setCellValue('A1', 'Total Views');
		$this->excel->getActiveSheet()->setCellValue('B1', $factqry['ttv']);
				
		$this->excel->getActiveSheet()->setCellValue('A2', 'Total Clicks');
		$this->excel->getActiveSheet()->setCellValue('B2', $factqry['ttc']);
				
		$this->excel->getActiveSheet()->setCellValue('A3', 'Total Closed');
		$this->excel->getActiveSheet()->setCellValue('B3', $factqry['ttcl']);
		
		$clickfactor = round(($factqry['ttc']/$factqry['ttv'])*100,2);
		$this->excel->getActiveSheet()->setCellValue('A4', 'Clicks Factor');
		$this->excel->getActiveSheet()->setCellValue('B4', $clickfactor);
		$closefactor = round(($factqry['ttcl']/$factqry['ttv'])*100,2);
		$this->excel->getActiveSheet()->setCellValue('A5', 'Close Factor');
		$this->excel->getActiveSheet()->setCellValue('B5', $closefactor);
		
		for($col = ord('A'); $col <= ord('B'); $col++){
			//set column dimension
			$this->excel->getActiveSheet()->getColumnDimension(chr($col))->setAutoSize(true);
			//change the font size
			$this->excel->getActiveSheet()->getStyle(chr($col))->getFont()->setSize(12);

			$this->excel->getActiveSheet()->getStyle(chr($col))->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
		}
			
		// 4)
		$this->excel->createSheet(3);
		$this->excel->setActiveSheetIndex(3);
		//name the worksheet
		$this->excel->getActiveSheet()->setTitle('Quality Score');
                if($promo_id!=""){
                    $qualityquery = $dbapi->custom("select sum(tt.total_views) as stv,sum(tt.total_clicks) as stt,sum(tt.total_close) as stc ,sum(tt.impression) as sti,tt.match_type as type from $targetable tt inner join $table pt on tt.promotion_id_fk = pt.rec_aid where pt.rec_aid='".$promo_id."' group by match_type");
                }else{
                    $qualityquery=$dbapi->custom("select sum(tt.total_views) as stv,sum(tt.total_clicks) as stt,sum(tt.total_close) as stc,tt.match_type as type from onetwork_gma_targets tt inner join onetwork_gm_advertisments pt on tt.gma_aid_fk = pt.rec_aid where pt.rec_aid=".$campaign_id." group by match_type");
                }
		//$factorquery = $dbapi->custom("select total_views,total_clicks,total_close,impression from $targetable tt inner join $table pt on tt.promotion_id_fk = pt.rec_aid where pt.promo_code='".$promo_id."'");
		$i = 1;
		$this->excel->getActiveSheet()->setCellValue('A1','Type');
		$this->excel->getActiveSheet()->setCellValue('B1', 'Total Clicks');
		$this->excel->getActiveSheet()->setCellValue('C1', 'Total Views');
		$this->excel->getActiveSheet()->setCellValue('D1', 'Total Closed');
                if($promo_id!=""){
                    $this->excel->getActiveSheet()->setCellValue('E1', 'Total Impression');
                }
		foreach($qualityquery as $key => $typeres) {
			$key = $key + 2;
			$this->excel->getActiveSheet()->setCellValue('A'.$key, ucwords(str_replace('_',' ',$typeres['type'])));
			$this->excel->getActiveSheet()->setCellValue('B'.$key, $typeres['stt']);
			$this->excel->getActiveSheet()->setCellValue('C'.$key, $typeres['stv']);
			$this->excel->getActiveSheet()->setCellValue('D'.$key, $typeres['stc']);
                        if($promo_id!=""){
                            $this->excel->getActiveSheet()->setCellValue('E'.$key, $typeres['sti']);
                        }
			
		} 
                if($promo_id!=""){
                    for($col = ord('A'); $col <= ord('E'); $col++){
                            //set column dimension
                            $this->excel->getActiveSheet()->getColumnDimension(chr($col))->setAutoSize(true);
                            //change the font size
                            $this->excel->getActiveSheet()->getStyle(chr($col))->getFont()->setSize(12);

                            $this->excel->getActiveSheet()->getStyle(chr($col))->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
                    }
                }else{
                    for($col = ord('A'); $col <= ord('D'); $col++){
                            //set column dimension
                            $this->excel->getActiveSheet()->getColumnDimension(chr($col))->setAutoSize(true);
                            //change the font size
                            $this->excel->getActiveSheet()->getStyle(chr($col))->getFont()->setSize(12);

                            $this->excel->getActiveSheet()->getStyle(chr($col))->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
                    }
                }
		
		
		
		$filename = $promo_id.'.xlsx'; //save our workbook as this file name
		header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
		header("Content-Disposition: attachment; filename=\"PHPExcelDemo.xlsx\"");
		header("Cache-Control: max-age=0");

		//save it to Excel5 format (excel 2003 .XLS file), change this to 'Excel2007' (and adjust the filename extension, also the header mime type)
		//if you want to save it as .XLSX Excel 2007 format
		$objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel2007');  
		//$objWriter->setInputEncoding('');
		//force user to download the Excel file without writing it to server's HD
		
		
		//$data["promo_id"]=$_REQUEST["promo_id"];
        //$this->load->view("overview/promo_overview",$data);
        $objWriter->save('results.xlsx');
		ob_clean();
		$objWriter->save('php://output');
	}
    // pavani
    function gma_dashboard(){
        if(!isset($_REQUEST["campaign_id"])){
            header('Location:'.base_url());
        }
        $campaign_id= base64_decode(base64_decode($_REQUEST["campaign_id"]));        
        $cresult=$this->db_api->select("campaign_name","onetwork_gm_advertisments","rec_aid=".$campaign_id);
        if($cresult==0){
            header('Location:'.base_url());
        }
        $data["campaign_id"]=$campaign_id;
        $this->load->view("overview/campaign_overview",$data);
    }
    // pavani
    function campaign_targets($campaign_id) {
        $dbapi = $this->load->module("db_api");
//        $promo_data = $dbapi->select("rec_aid,promo_code,promo_name,module,promo_type,total_cost,total_targets,promotion_start_time,promotion_end_time", "onetwork_promotions", "rec_aid=" . $promo_id);
//        $targets_data = $dbapi->custom("SELECT COUNT(*) AS target_cnt FROM onetwork_promotion_targets WHERE promotion_id_fk=" . $promo_id);
        $campaigns_data=$dbapi->select("rec_aid,campaign_code,campaign_name,module_target,start_date,end_date,total_targets,campaign_type","onetwork_gm_advertisments","rec_aid=".$campaign_id);
        $targets_data = $dbapi->custom("SELECT COUNT(*) AS target_cnt FROM onetwork_gma_targets WHERE gma_aid_fk=" . $campaign_id);
        $data["campaigns_data"] = $campaigns_data;
        $data["targets_data"] = $targets_data;
        $this->load->view("overview/promotion_targets", $data);
    }
    function gma_today_stats($campaign_id) {
        $dbapi = $this->load->module("db_api");
        //$result = $dbapi->custom("SELECT promo_code,promotion_id_fk,SUM(total_clicks) AS total_clicks,SUM(total_views) AS total_views,SUM(`total_close`) AS total_close FROM `onetwork_promotion_targets` targets INNER JOIN onetwork_promotions promos ON promos.rec_aid=targets.promotion_id_fk WHERE promotion_id_fk=" . $promo_id);
        //$data['prData'] = $dbapi->custom("select promotion_start_time,promotion_end_time from onetwork_promotions where rec_aid=$promo_id");        
        $result = $dbapi->custom("SELECT campaign_code,gma_aid_fk,SUM(total_clicks) AS total_clicks,SUM(total_views) AS total_views,SUM(`total_close`) AS total_close FROM `onetwork_gma_targets` targets INNER JOIN onetwork_gm_advertisments cmps ON cmps.rec_aid=targets.gma_aid_fk WHERE gma_aid_fk=" . $campaign_id." AND DATE(last_activity_time)=CURRENT_DATE");
        $data['campaign_details'] = $dbapi->custom("select rec_aid,start_date,end_date from onetwork_gm_advertisments where rec_aid=".$campaign_id);
        $data["stats_data"] = $result;
        $this->load->view("overview/promo_sales", $data);
    }
    // pavani
    function gma_audience_visitors($campaign_id) {
      $start=isset($_REQUEST["limit"])?$_REQUEST["limit"]:0;
      $dbapi = $this->load->module("db_api");
      //$result = $dbapi->custom("SELECT first_name,last_name,total_views,added_on,match_type FROM iws_profiles profiles INNER JOIN onetwork_promotion_targets targets ON profiles.profile_id=targets.target_id_fk WHERE promotion_id_fk=" . $promo_id . " LIMIT 5");
      $result = $dbapi->custom("SELECT first_name,last_name,total_views,added_on,match_type FROM iws_profiles profiles INNER JOIN onetwork_gma_targets targets ON profiles.profile_id=targets.user_id_fk WHERE gma_aid_fk=" . $campaign_id . " LIMIT $start,6");
      $cnt_result = $dbapi->custom("SELECT COUNT(*) as cnt FROM iws_profiles profiles INNER JOIN onetwork_gma_targets targets ON profiles.profile_id=targets.user_id_fk WHERE gma_aid_fk=" . $campaign_id);
      $data["visitors_data"] = $result;
      $data["audience_cnt"] = $cnt_result;
      $this->load->view("overview/visitors_overview", $data);
    }
    function campaign_insight($campaign_id) {
        $dbapi = $this->load->module("db_api");
        //echo "SELECT campaign_code,gma_aid_fk,SUM(total_clicks) AS total_clicks,SUM(total_views) AS total_views,SUM(`total_close`) AS total_close FROM `onetwork_gma_targets` targets INNER JOIN onetwork_gm_advertisments campaigns ON campaigns.rec_aid=targets.gma_id_fk WHERE gma_aid_fk=" . $campaign_id;
        $result = $dbapi->custom("SELECT campaign_code,gma_aid_fk,SUM(total_clicks) AS total_clicks,SUM(total_views) AS total_views,SUM(`total_close`) AS total_close FROM `onetwork_gma_targets` targets INNER JOIN onetwork_gm_advertisments campaigns ON campaigns.rec_aid=targets.gma_aid_fk WHERE gma_aid_fk=" . $campaign_id);
        $data["insight_data"] = $result;
        $this->load->view("overview/promo_insight", $data);
    }
    function other_campaigns($campaign_id) {
        $search = ($this->input->post("search_term") != "") ? $this->input->post("search_term") : "";
        $start=isset($_REQUEST["limit"])?$_REQUEST["limit"]:0;
        $db_obj = $this->load->module("db_api");
        $sqlQry = "SELECT gma.status,start_date, end_date, total_cost, campaign_code, campaign_name,inside_entity_type,inside_entity_id,module_target FROM onetwork_gm_advertisments gma INNER JOIN pb_transactions pbt ON gma.transaction_aid_fk=pbt.transaction_aid WHERE sender_id_fk=".$this->get_userId()." AND rec_aid!=".$campaign_id;
        if ($search != "") {
            $sqlQry.=" AND campaign_name LIKE '%" . $search . "%'";
        }
        $sqlQry.=" LIMIT $start,4";
        $sqlCntQry="SELECT COUNT(*) AS cnt FROM onetwork_gm_advertisments gma INNER JOIN pb_transactions pbt ON gma.transaction_aid_fk=pbt.transaction_aid WHERE sender_id_fk=".$this->get_userId()." AND rec_aid!=".$campaign_id;
        if ($search != "") {
          $sqlCntQry.=" AND campaign_name LIKE '%" . $search . "%'";
        }
        $cnt_result = $db_obj->custom($sqlCntQry);
        //echo $sqlQry;
        //echo $sqlCntQry;
        $result = $db_obj->custom($sqlQry);
        $i = 0;
        foreach ($result as $res) {
            $entity_id = $res["inside_entity_id"];
            $module_qry = "";
            if (trim($res["inside_entity_type"]) == "ONESHOP_PRODUCTS") {
                //$module_qry="SELECT product_name as entity_name FROM oshop_products WHERE product_aid=".$entity_id;
                $module_qry = "SELECT product_name as entity_name,product_code as entity_code,store_code as parent_code FROM oshop_products prods INNER JOIN oshop_stores stores ON prods.store_id_fk=stores.store_aid WHERE product_aid=" . $entity_id;
            }
            if (trim($res["inside_entity_type"]) == "ONESHOP_STORES") {
                $module_qry = "SELECT store_name as entity_name,store_code as entity_code,'' as parent_code FROM oshop_stores WHERE store_aid=" . $entity_id;
            }
            if(trim($res["inside_entity_type"]) == "CLICK_PAGES"){
                $module_qry = "SELECT page_name as entity_name,page_code as entity_code,'' as parent_code FROM click_pages WHERE page_aid=" . $entity_id;
            }
            $module_result = $db_obj->custom($module_qry);
            if ($module_result[0]["parent_code"] != "") {
                $parent_node = $module_result[0]["parent_code"];
            }
            $result[$i]["entity_name"] = $module_result[0]["entity_name"];
            $result[$i]["entity_code"] = $module_result[0]["entity_code"];
            $result[$i]["parent_code"] = $parent_node;
            $i++;
        }
        //print_r($result);
        $data["campaigns_data"] = $result;
        $data["promos_cnt"]=$cnt_result;
        $this->load->view("overview/other_promotions", $data);
    }
    function gma_match_overview($campaign_id) {
        $best_match_cnt = 0;
        $medium_match_cnt = 0;
        $basic_match_cnt = 0;
        $random_match_cnt = 0;
        $match_str = "";
        $dbapi = $this->load->module("db_api");
        $match_cnt_result = $dbapi->custom("SELECT COUNT(*),match_type FROM onetwork_gma_advertisments WHERE gma_aid_fk=" . $campaign_id . " GROUP BY match_type");
        $match_result = $dbapi->select("promotion_start_time,promotion_end_time", "onetwork_promotions", "rec_aid=" . $campaign_id);
        $match_date_result = $dbapi->custom("SELECT COUNT(target_id_fk) AS target_cnt,match_type FROM onetwork_promotion_targets WHERE promotion_id_fk=" . $campaign_id . " GROUP BY match_type");
        foreach ($match_date_result as $res) {
            if (isset($res["match_type"]) && $res["match_type"] == "BEST_MATCH") {
                $best_match_cnt = $res["target_cnt"];
            } elseif (isset($res["match_type"]) && $res["match_type"] == "MEDIUM_MATCH") {
                $medium_match_cnt = $res["target_cnt"];
            } elseif (isset($res["match_type"]) && $res["match_type"] == "BASIC_MATCH") {
                $basic_match_cnt = $res["target_cnt"];
            } elseif (isset($res["match_type"]) && $res["match_type"] == "RANDOM_MATCH") {
                $random_match_cnt = $res["target_cnt"];
            }
        }
        $match_str = $best_match_cnt . "~" . $medium_match_cnt . "~" . $basic_match_cnt . "~" . $random_match_cnt;
        $data["match_cnt_data"] = $match_cnt_result;
        $data["match_data"] = $match_result;
        $data["matches"] = $match_str;
        $this->load->view("overview/match_overview", $data);
    }
    function getGMAChartLang() {
        $campaign_id = $_REQUEST["campaign_id"];
        $dbapi = $this->load->module("db_api");
        //$query = "SELECT campaigns.rec_aid,last_activity_date,user_id_fk,campaigns.transaction_aid_fk AS transaction_id_fk,(SELECT count(*) FROM cvbank_languages lang WHERE iws_language_id IN (SELECT languages_knows FROM onetwork_audience_lab WHERE transaction_id_fk=transaction_id_fk) AND iws_profile_id=target_id_fk) AS lang_cnt,(SELECT count(*) FROM cvbank_users_details users WHERE nationality IN (SELECT nationality FROM onetwork_audience_lab WHERE transaction_id_fk=transaction_id_fk) AND iws_profile_id=target_id_fk) AS nationality_cnt FROM onetwork_gm_advertisments campaigns INNER JOIN onetwork_gma_targets targets ON campaigns.rec_aid=targets.gma_aid_fk WHERE campaigns.rec_aid=" . $campaign_id . " GROUP BY last_activity_time";
        $query="SELECT campaigns.rec_aid,last_activity_time,user_id_fk,campaigns.transaction_aid_fk AS transaction_id_fk,(SELECT count(*) FROM cvbank_languages lang WHERE iws_language_id IN (SELECT languages_knows FROM onetwork_audience_lab WHERE transaction_id_fk=transaction_id_fk) AND iws_profile_id=user_id_fk) AS lang_cnt FROM onetwork_gm_advertisments campaigns INNER JOIN onetwork_gma_targets targets ON campaigns.rec_aid=targets.gma_aid_fk WHERE campaigns.rec_aid=".$campaign_id." GROUP BY last_activity_time";
        $result = $dbapi->custom($query);
        $data_points = [];
        for ($i = 0; $i < count($result); $i++) {
            $res = $result[$i];
            $rep_date = str_replace("-", ",", $res["last_activity_time"]);
            array_push($data_points, array("activity_date" => $res["last_activity_time"], "lang_cnt" => (int) $res["lang_cnt"], "nationality_cnt" => (int) $res["nationality_cnt"]));
            //array_push($tmp["nationality_cnt"],array("x"=>$res["last_activity_date"],"y"=>$res["nationality_cnt"]));
        }
        echo json_encode($data_points);
    }
    function getCountryData($campaign_id) {
        $dbapi = $this->load->module("db_api");
        //echo "SELECT oal.country_id_str FROM onetwork_audience_lab oal inner join onetwork_gm_advertisments op on op.audience_id_fk=oal.rec_aid where op.rec_aid =".$campaign_id;
        $audienceData = $dbapi->custom("SELECT oal.country_id_str FROM onetwork_audience_lab oal inner join onetwork_gm_advertisments op on op.audience_id_fk=oal.rec_aid where op.rec_aid =".$campaign_id);
        $couData = $audienceData[0]['country_id_str'];
        //echo "select gci.country_name, count(ip.profile_id) as UserCount from iws_profiles as ip left join global_countries_info as gci on gci.country_id=ip.country_id left join onetwork_gma_targets ogt on ogt.user_id_fk = ip.profile_id where ip.country_id in($couData) and opt.promotion_id_fk=$campaign_id GROUP BY ip.country_id";
        $sql = "select gci.country_name, count(ip.profile_id) as UserCount from iws_profiles as ip left join global_countries_info as gci on gci.country_id=ip.country_id left join onetwork_gma_targets ogt on ogt.user_id_fk = ip.profile_id where ip.country_id in($couData) and ogt.gma_aid_fk=$campaign_id GROUP BY ip.country_id";
        $result = $dbapi->custom($sql);
        return $result;
    }
    function getCityData($campaign_id){
        $dbapi = $this->load->module("db_api");
        //echo $sql = "SELECT oal.city_id_str FROM onetwork_audience_lab oal inner join onetwork_gm_advertisments as ogma on ogma.audience_id_fk= oal.rec_aid where ogma.rec_aid =".$campaign_id;
        $audienceData = $dbapi->custom("SELECT oal.city_id_str FROM onetwork_audience_lab oal inner join onetwork_gm_advertisments as ogma on ogma.audience_id_fk= oal.rec_aid where ogma.rec_aid =".$campaign_id);
        $couData = $audienceData[0]['city_id_str'];
        $csql = "select gci.city_name, count(ip.profile_id) as UserCount from iws_profiles as ip left join global_cities_info as gci on gci.city_id=ip.city_id left join onetwork_gma_targets opt on opt.user_id_fk = ip.profile_id where ip.city_id in($couData) and opt.gma_aid_fk=$campaign_id GROUP BY ip.city_id";
        $result = $dbapi->custom($csql);
        return $result;
    }
}
