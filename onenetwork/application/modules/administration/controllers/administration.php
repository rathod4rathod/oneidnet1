<?php

class administration extends CI_Controller {

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
        $this->load->view("administration/admprofile_view");
    }
    
    //Get Employee Code for Adminstration URL in template file
    function getAdministrationEmployCode(){
        $db_obj = $this->load->module("db_api");
        $employee_code = "";
        $user_id = $this->get_userId();
        $result = $db_obj->custom("select employee_code from iws_employees iwse INNER join iws_profiles iwsp on iwse.user_id_fk = iwsp.profile_id where iwsp.profile_id = '".$user_id."'");
        if ($result) {
            $employee_code = $result[0]["employee_code"];
        } else {
            log_message('error', 'AERPC116');
        }
        return $employee_code;
    }
    
    //Function for adminstration profile view 
    function admprofile($emp_code) {
        $data["user_id"] = $this->get_userId();
        $data["emp_code"] = $emp_code;
        $db_obj = $this->load->module("db_api");
        
        $result = $db_obj->custom("select iwse.full_name, iwse.employee_code,iwse.reporting_manager_id, iwse.user_id_fk, iwse.department, iwse.designation, iwsp.email,iwsp.dob,iwsp.mobile_no,iwsp.gender,iwse.blood_group,iwse.passport_number,iwse.employed_since,iwse.status,iwse.job_relieving_date,iwse.nationality,iwse.duty_location, iwcc.total_case_resolutions,iwcc.total_calls_attend,iwcc.total_tkt_generated,iwsp.address_line1,iwsp.address_line2,iwsp.city_id,iwsp.state_id,iwsp.country_id,iwsp.zip_code from iws_employees iwse left join iws_profiles iwsp on iwse.user_id_fk = iwsp.profile_id left join iws_customer_care_executives iwcc on iwse.user_id_fk = iwcc.user_id_fk where iwse.employee_code='".$emp_code."'");
        if ($result) {
            $data['emp_details'] = $result[0];
        } else {
            log_message('error', 'AERPC116');
        }
        
        $this->load->view("administration/admprofile_view", $data);
    }
    
    //Function for Employee team view
    function empteam($emp_code){
        $return_arr = array();
        $data["user_id"] = $this->get_userId();
        $data["emp_code"] = $emp_code;
        $db_obj = $this->load->module("db_api");
        if($data["emp_code"] != ""){
            $empQry = "SELECT team_id_fk FROM iws_employees WHERE employee_code = '".$data["emp_code"]."' ";
            $emp_res = $db_obj->custom($empQry);
            if($emp_res != ""){
                if( $emp_res[0]["team_id_fk"] > 0 ){
                    $teamQry = "SELECT e.team_id_fk, t.name as team_name, t.department, t.manager_id_fk, e.full_name as emp_name, e.designation, e.employee_code FROM  iws_employees e ".
                               "INNER JOIN iws_teams t ON e.team_id_fk = t.team_aid ".
                               "WHERE e.team_id_fk = '".$emp_res[0]["team_id_fk"]."'";
                    $team_res = $db_obj->custom($teamQry);
                    if($team_res != ""){
                        $return_arr = $team_res;
                    }else{
                        log_message('error', 'AERPC116');
                    }
                    
                }
            }else {
                log_message('error', 'AERPC116');
            }
        }    
        
        $data["team_details"] = $return_arr;
        $this->load->view("administration/empteam_view", $data);
    }
    
    //Add Employee view function
    function addempprofile($team_id = NULL) {
        $data["team_id"] = $team_id;
        $this->load->view("administration/addempprofile_view", $data);
    }
    
     // function to strip html tags
    function strip_data($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    
    //Function for add employee
    function insertemployee(){
        $db_obj = $this->load->module("db_api");
        $user_id = $this->get_userId();
        $profile_user_id = $_REQUEST["profile_user_id"];
        $a_data = array(
            "user_id_fk" => $profile_user_id,
            "full_name" => $_REQUEST["full_name"],
            "department" => $_REQUEST['department'],
            "designation" => $_REQUEST['designation'],
            "duty_location" =>$_REQUEST['duty_location'],
            "work_mobile_number" => $_REQUEST['work_mobile_number'],
            "blood_group" => $_REQUEST['blood_group'],
            "total_experience" => $_REQUEST['total_experience'],
             "passport_number" => $_REQUEST['passport_number'],
             "nationality" => $_REQUEST['nationality'],
            "highest_degree" => $_REQUEST['highest_degree'],
             "employed_since" => $_REQUEST['employed_since'],
             "job_relieving_date" => $_REQUEST['job_relieving_date'],
            "total_work_days" => $_REQUEST['total_work_days'],
            "team_id_fk" => $_REQUEST['team_id'],
            "status" => 'ACTIVE',
            "added_on" => date("Y-m-d H:i:s"),	
            "last_active_on" => date("Y-m-d H:i:s"),	
            "added_by" => $user_id
        );
        foreach($a_data as $key=>$val){
            $a_data[$key]=$this->strip_data($a_data[$key]);
        }
        $mytable = "iws_employees";
        $rlt = $db_obj->insert($a_data, $mytable);
        
        $retVal = "failed";
        if($rlt == 1){
            $empQry = "SELECT employee_code FROM iws_employees ORDER BY rec_aid DESC LIMIT 1";
            $emp_res = $db_obj->custom($empQry);
            if($emp_res != ""){
                $retVal = $emp_res[0]["employee_code"];
            }else {
                log_message('error', 'AERPC116');
            }
        }
      
        echo $retVal;
        
    }
    
    //Ajax call for added employee is oneidnet profile user or not
    function emailValidateEmployee(){
        $db_obj = $this->load->module("db_api");
        $emp_email = $_REQUEST["emp_email"];
        $profileQry = "SELECT count(*) as cnt,profile_id FROM iws_profiles WHERE email = '".$emp_email."'";
        $profile_res = $db_obj->custom($profileQry);
        if($profile_res != ""){
            $profile_cnt = $profile_res[0]["cnt"];
            $profile_id = $profile_res[0]["profile_id"];
            if($profile_cnt == 0){
                echo $profile_cnt;
            }else{
               echo $profile_cnt."|".$profile_id;
            }
        }else{
            log_message('error', 'AERPC116');
        }
    }
    
   
}
