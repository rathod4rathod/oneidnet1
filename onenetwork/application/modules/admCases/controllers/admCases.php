<?php

class admCases extends CI_Controller {

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
        
        $data["user_id"] = $this->get_userId();
        $db_obj = $this->load->module("db_api");
        
        $result = $db_obj->custom("SELECT cases.case_code, cases.priority, cases.created_on, iwsp.first_name, iwsp.last_name, rep.title_of_problem
FROM iws_cases cases
LEFT JOIN iws_reported_problem rep ON cases.reported_problem_id_fk = rep.rec_aid
INNER JOIN iws_profiles iwsp ON iwsp.profile_id = rep.reported_by
LIMIT 0 , 30");
        if ($result) {
            $data['case_details'] = $result;
        } else {
            log_message('error', 'AERPC116');
        }
        
        $this->load->view("admCases/admcases_view", $data);
    }
    
    function admCaseDetails($casecode) {
        $data["user_id"] = $this->get_userId();
        $db_obj = $this->load->module("db_api");
        echo "SELECT cases.rec_aid,cases.case_code,cases.created_by, cases.status, cases.priority,rep.attach_snapshot,
            cases.created_on, rep.reported_by,iwsp.first_name, iwsp.last_name, rep.title_of_problem,rep.description,rep.module,rep.user_location,
            clog.assigned_to,clog.assigned_on,clog.live_case_status
FROM iws_cases cases
LEFT JOIN iws_reported_problem rep ON cases.reported_problem_id_fk = rep.rec_aid
LEFT JOIN iws_profiles iwsp ON iwsp.profile_id = rep.reported_by 
LEFT JOIN iws_cases_handle_log clog on cases.rec_aid = clog.case_id_fk
where cases.case_code='".$casecode."'";
        $result = $db_obj->custom("SELECT cases.rec_aid,cases.case_code,cases.created_by, cases.status, cases.priority,rep.attach_snapshot,
            cases.created_on, rep.reported_by,iwsp.first_name, iwsp.last_name, rep.title_of_problem,rep.description,rep.module,rep.user_location,
            clog.assigned_to,clog.assigned_on,clog.live_case_status
FROM iws_cases cases
LEFT JOIN iws_reported_problem rep ON cases.reported_problem_id_fk = rep.rec_aid
LEFT JOIN iws_profiles iwsp ON iwsp.profile_id = rep.reported_by 
LEFT JOIN iws_cases_handle_log clog on cases.rec_aid = clog.case_id_fk
where cases.case_code='".$casecode."'");
        if ($result) {
            $data['case'] = $result[0];
            $data['case_createdby'] = $this->getCreatedby($result[0]['created_by']);
            $data['case_assignedto'] = $this->getCreatedby($result[0]['assigned_to']);
            $data['case_reportedby'] = $this->getCreatedby($result[0]['reported_by']);
            $data['chat_logs'] = $this->getChatLogs($result[0]['rec_aid']);
        } else {
            log_message('error', 'AERPC116');
        }
        $this->load->view("admCases/dv/case_detailview", $data);
    }
    function getCreatedby($uid) {
		$db_obj = $this->load->module("db_api");
		$myfields = "first_name, last_name";
        $mytable = 'iws_profiles';
        $where = " profile_id ='".$uid."' ";
        $result = $db_obj->select($myfields, $mytable,$where);
        if($result) {
			return $result[0]['first_name']." ".$result[0]['last_name'];
		} else {
			log_message('error', 'AERPC116');
		}
	}
	function getChatLogs($cid) {
		$db_obj = $this->load->module("db_api");
		$myfields = "message, sender";
        $mytable = 'iws_archieved_chats';
        $where = " case_id_fk ='".$cid."' ";
        $result = $db_obj->select($myfields, $mytable,$where);
        if($result) {
			return $result;
		} else {
			log_message('error', 'AERPC116');
		}
	
	}
    
}
