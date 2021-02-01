<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
if (!isset($_SESSION)) {
    session_start();
}
/* * ******************************************************************************
 * Purpose: Controller class to load the Create Group popup page .
 * Date Written: Apr 29, 2015
 * ***************************************************************************** */

class oshop_popup extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->module('memcaching');
        $ck_obj = $this->load->module("cookies");
        if ($_REQUEST) {
            $this->load->module("session_restart");
            if (isset($_REQUEST["skey"])) {
                $this->session_restart->key_check($_REQUEST["skey"]);
            }
        } elseif (!$ck_obj->getUserID()) {
            $this->redirect();
        }
    }

    function index() {
        
    }

    function user_id() {
        $obj = $this->load->module('cookies');
        return $obj->getUserID();
    }

    /* venkatesh test input */

    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        $data = str_replace("'", "&#39", $data);
        return $data;
    }

    function oshopmygroupsmemcache($reset = null) {
        $db_obj = $this->load->module('db_api');
        $keyName = "NP_MYGROUPS" . $this->user_id();
        // $this->memcaching->deleteKey($keyName);
        if (isset($reset)) {
            $sql = "select * from netpro_groups ng left join netpro_users_settings nus on nus.user_id_fk=ng.created_by where nus.user_id_fk=" . $this->user_id() . "  limit 6";
            $tmpResult = $db_obj->custom($sql);
            $this->memcaching->setKey($keyName, $tmpResult);
        } else {
            $result = $this->memcaching->getKey($keyName);
            if ($result) {
                return $result;
            } else {
                $sql = "select * from netpro_groups ng left join netpro_users_settings nus on nus.user_id_fk=ng.created_by where nus.user_id_fk=" . $this->user_id() . "  limit 6";
                $tmpResult = $db_obj->custom($sql);
                $this->memcaching->setKey($keyName, $tmpResult);
                return $tmpResult;
            }
        }
    }

    function getPopup_Info() {

        $this->load->view("oshop_popup/popup_group");
    }

    function setPopupGroup_Info() {

        $db = $this->load->module('db_api');
        $g_name = $this->input->post('group_name');
        $g_desc = $this->input->post('group_desc');

        $g_logo = $_FILES['group_logo']['name'];
        $g_code = $this->retrieve_Unique_Group_id();
        list($txt, $ext) = explode(".", $g_logo);
        $uploaddir_logo = "ndata/group_data/logos/";
        $report_group_logo = $uploaddir_logo . $g_logo;

        $g_cover = $_FILES['group_cover']['name'];
        list($txt, $ext) = explode(".", $g_cover);
        $uploaddir_cover = "ndata/group_data/covers/";
        $report_group_cover = $uploaddir_cover . $g_cover;

        if (file_exists($report_group_logo)) {
            unlink($report_group_logo);
        }
        if (move_uploaded_file($_FILES['group_logo']['tmp_name'], $report_group_logo) || move_uploaded_file($_FILES['group_cover']['tmp_name'], $report_group_cover)) {
            shell_exec('chmod -R 777 /var/www/html/netpro/');
            $fields = array('group_name' => $g_name, 'description' => $g_desc, 'logo_img_path' => $g_logo, 'cover_img_path' => $g_cover, "group_code" => $g_code, 'created_by' => $this->user_id());
            foreach ($fields as $key => $val) {
                $fields[$key] = $this->test_input($fields[$key]);
            }
            $group_data = $this->db_api->insert($fields, "netpro_groups");
            if ($group_data) {
                $this->netpromygroupsmemcache('reset');
            }
            $lastinserted_groupid = $this->db_api->last_insertid();
            $sql = "update iws_users_ownership_glance set netpro= CASE "
                    . "WHEN netpro = '' THEN CONCAT_WS(netpro , '$lastinserted_groupid') "
                    . "WHEN netpro != '' THEN CONCAT(netpro , ',$lastinserted_groupid') "
                    . "ELSE netpro   END where user_id_fk=" . $this->cookies->getUserID();
            $this->db_api->custom($sql);
            echo $group_data;
        } else {
            echo "fie not uploaded";
        }
        $this->delete_Group_id();
    }

    //09-06-2015 by gouthami this function using for create random string for groupid
    function retrieve_Unique_Group_id() {
        $myfile = fopen("assets/groupuniqueids.txt", "r") or die("Unable to open file!");
        while (!feof($myfile)) {
            $line = fgets($myfile);
            $line = trim($line);
            $lines[] = $line . "\n";
        }

        return $lines[0];
    }

    //09-06-2015 by gouthami : this function using for delete first line from groupuniqueids.txt file
    function delete_Group_id() {
        $lines = file('assets/groupuniqueids.txt');
        unset($lines[0]);
        $file = fopen('assets/groupuniqueids.txt', 'w');
        fwrite($file, implode('', $lines));
        fclose($file);
    }

    function all_endoserinfo() {

        $skillid = $this->input->post('netdev_skillid');

        if (isset($_REQUEST['net_dev_userid'])) {
            $user_id = $_REQUEST['net_dev_userid'];
            //  echo $endoserquery = "SELECT ns.user_id_fk ,ip.user_id , ns.profile_name,ns.image_path FROM `netpro_users_settings`  as ns left join iws_profiles as  ip  on ip.profile_id =ns.user_id_fk  where ns.user_id_fk in(select endorsed_by  from    `netpro_skills_endorsement` where  endorsed_by=$user_id and skill_id_fk=$skillid) ";
        } else {
            $user_id = $this->user_id();
        }
        $endoserquery = "SELECT ns.user_id_fk ,ip.user_id , ns.profile_name,ns.image_path FROM `netpro_users_settings`  as ns left join iws_profiles as  ip  on ip.profile_id =ns.user_id_fk  where ns.user_id_fk in(select endorsed_by  from    `netpro_skills_endorsement` where   user_id=$user_id  and skill_id_fk=$skillid) ";

        $db_obj = $this->load->module('db_api');
        $data['endoserdata'] = $db_obj->custom($endoserquery);

        $this->load->view("netpro_popup/popup_endoser", $data);
    }

    function reportproblem() {
        $myfields = "*";
        $mytable = "global_countries_info";
        $db_obj = $this->load->module('db_api');
        $data['country_info'] = $db_obj->select($myfields, $mytable, '');
        $this->load->view('netpro_popup/reportproblempage', $data);
    }

    function insert_new_report() {
//print_R($_REQUEST);die();
        $db_obj = $this->load->module('db_api');
        $ppic_image_name = "";

        if ($_FILES["report_problem_snapshot"]["name"]) {
            $snapshot_path = $_FILES["report_problem_snapshot"]["name"];
            $path = explode("/", $snapshot_path);
            $filename = end($path);
            $date = new DateTime();
            $time = $date->format('Y-m-d-H-i-s');

            $uploaddir = "pdata/images/report_snap_shots/";

            list($txt, $ext) = explode(".", $filename);
            $ppic_image_name = $uploaddir . $this->user_id() . $time . "." . $ext;
            shell_exec('chmod -R 777 /var/www/html/netpro');
            if (move_uploaded_file($_FILES['report_problem_snapshot']['tmp_name'], $ppic_image_name)) {
                shell_exec('chmod -R 777 ' . $ppic_image_name);
            } else {
                echo "fie not uploaded";
            }
        }


        $netdev_a_data = array(
            'module' => "Netpro",
            'title_of_problem' => $_REQUEST["report_problem_title"],
            'description' => $_REQUEST["report_problem_description"],
            'user_location' => $_REQUEST["location"],
            'attach_snapshot' => $ppic_image_name,
            'reported_by' => $this->user_id()
        );
        //$tundev_a_fields="module,title_of_problem,description,user_location,attach_snapshot";
        $netdev_s_table = "iws_reported_problem";
        foreach ($netdev_a_data as $key => $val) {
            $netdev_a_data[$key] = $this->test_input($netdev_a_data[$key]);
        }
        echo $result = $db_obj->insert($netdev_a_data, $netdev_s_table);
        //print_R($result);
    }

    function get_connections() {
        $obj = $this->load->module('db_api');
        return $obj->custom("SELECT oud.profile_name,oe.user_id_fk as associated_id_fk FROM oshop_explore oe INNER JOIN os_user_details oud ON oe.user_id_fk = oud.profile_id_fk WHERE oud.status='ACTIVE' and oe.associated_id_fk =" . $this->user_id());

    }

    function sendmessage() {
        //$hmeobj=$this->load->module("home");
        $data["oshop_connections"] = $this->get_connections();
        $this->load->view('oshop_popup/messagepopup', $data);
    }

    //15-06-2016 by shivajyothi
    function sendStoremessage() {
        $db_obj = $this->load->module("db_api");
        $result = $db_obj->custom("select * from oshop_stores where store_code='" . $_REQUEST["store_code"] . "'");
        $data['store_name'] = $result[0]['store_name'];
        $data['store_code'] = $_REQUEST["store_code"];
        // echo var_dump($data);
        $this->load->view('oshop_popup/storemessage_popup', $data);
    }

    function insert_store_message() {

        $db_obj = $this->load->module('db_api');
        $storecode = $this->input->post("storecode");
        $result = $db_obj->custom("select store_aid from oshop_stores where store_code='" . $storecode . "'");
        $fields = array('message' => $this->test_input($this->input->post("message")), 'store_id_fk' => $result[0]['store_aid'], 'user_id_fk' => $this->user_id());
        $result = $db_obj->insert($fields, "oshop_store_messages");
        $this->load->module('notification');
        $this->notification->all_notification("STORE_MESSAGES","",$this->user_id(),$storecode,"user");
        echo $result;
    }

    function insert_storereplay_message() {

        $db_obj = $this->load->module('db_api');
        $storecode = $this->input->post("storecode");
        $userid = $this->input->post("userid");
        $result = $db_obj->custom("select store_aid  from oshop_stores where store_code='" . $storecode . "'");
        $fields = array('message' => $this->test_input($this->input->post("message")), 'store_id_fk' => $result[0]['store_aid'], 'representative_id_fk' => $this->user_id(), 'user_id_fk' => $userid);
        $result = $db_obj->insert($fields, "oshop_store_messages");
        $this->load->module('notification');
        $this->notification->all_notification("STORE_MESSAGES","",$userid,$storecode,"store");
        echo $result;
    }

//29-01--2016 by venkatesh
    function insert_new_message() {
        $db_obj = $this->load->module('db_api');
        //$connectids = explode(",",$this->input->post("connectids"));
        $connectids = $this->input->post("connectids");
        $connectarr=explode(",",$connectids);
        
        $ins_cnt = 0;
        //Subject Insertion
        $fields = array('subject' => $this->input->post("subject"));
        $db_obj->insert($fields, "vcom_protalk_subjects");
        $sub_res = $db_obj->custom("SELECT subject_aid FROM vcom_protalk_subjects ORDER BY subject_aid DESC LIMIT 1");
        $sub_insert_id = $sub_res[0]['subject_aid'];
        // if()
        for ($i = 0; $i <count($connectarr); $i++) {
            $fields = array('subject_id_fk' => $sub_insert_id, 'message_type' => 'PLAINTEXT', 'message' => addslashes($this->input->post("message")), 'sender_id_fk' => $this->user_id(), 'receiver_id_fk' => $connectarr[$i], 'sent_on' => date("Y-m-d H:i:s"), 'module' => 'ONESHOP');
            $db_obj->insert($fields, "vcom_protalk");
            $ins_cnt++;
        }
        echo $ins_cnt;
    }

    function getAllRecievedMessages() {
        $db_obj = $this->load->module('db_api');
        $user_id = $this->user_id();
        $data["uid"] = $user_id;
        $msgQry = "select * from (
			  select * from (
			  select * from (
			  (SELECT t.`sender_id_fk`, t.receiver_id_fk, p.user_id, s.subject_aid,`message`,read_or_not, nus.profile_img, s.subject, p.first_name, p.middle_name,
			  p.last_name, t.sent_on FROM vcom_protalk t INNER JOIN vcom_protalk_subjects s ON s.subject_aid = t.subject_id_fk INNER JOIN iws_profiles 
			  p ON p.profile_id = t.`receiver_id_fk` INNER JOIN os_user_details nus ON p.profile_id = nus.profile_id_fk WHERE
			  t.module = 'ONESHOP' AND t.`sender_id_fk` = '$user_id') UNION (SELECT t.`sender_id_fk`, t.receiver_id_fk, p.user_id,
			  s.subject_aid,`message`,read_or_not, nus.profile_img, s.subject, p.first_name, p.middle_name, p.last_name, t.sent_on FROM vcom_protalk t 
			  INNER JOIN vcom_protalk_subjects s ON s.subject_aid = t.subject_id_fk INNER JOIN iws_profiles p ON p.profile_id = t.`sender_id_fk` 
			  INNER JOIN os_user_details nus ON p.profile_id = nus.profile_id_fk WHERE t.module = 'ONESHOP' AND t.`receiver_id_fk` = '$user_id') ) a order by `sent_on` desc)  b group by subject_aid) c order by `sent_on` desc  limit 10";

        $rlt = $db_obj->custom($msgQry);
        if($_REQUEST["osntfupdate"]!=""){
        $db_obj->custom("UPDATE `vcom_protalk` SET `read_or_not`='1' where receiver_id_fk=" . $user_id . "    AND module='ONESHOP' and read_or_not='0'");    
}

        $data["msgList"] = $rlt;
        $this->load->view("oshop_popup/oshopmessages", $data);
    }

//oct-16-2016 by venkatesh
    function oshopmsgcount() {
        $db_obj = $this->load->module('db_api');
        $rlt = $db_obj->custom("SELECT count(DISTINCT(`subject_id_fk`)) as count FROM `vcom_protalk` WHERE module='ONESHOP' and `receiver_id_fk`=" . $this->user_id() . " and `read_or_not`='0'");
        echo $rlt[0]["count"];
    }

    //oct 17 2016 by venkatesh
    function updatemsgnotify() {
        $db_obj = $this->load->module('db_api');
        $db_obj->custom("UPDATE `vcom_protalk` SET `read_or_not`='2' where receiver_id_fk=" . $this->user_id() . "  and `subject_id_fk`=" . $_REQUEST["subj_id"]);
        header('Location: ' . $_REQUEST["url"]);
    }

}
