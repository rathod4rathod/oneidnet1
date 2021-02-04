<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Home extends CI_Controller {

    function __construct() {
        parent::__construct();
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

    function index() {
        $this->load->view('home');
    }

    function buzzin_qucikansp() {

        $this->load->view('home/buzz_snappopup');
    }
//written by Gouthami:Getting Details of Quick Pics Data From "buzzin_quick_pics" Table
    function buzzinQuickpic() {
        $dbj = $this->load->module('db_api');
        $sql = "select rec_aid,pics_url from buzzin_quick_pics where user_id_fk=".$this->get_userId();
        $result['quick_img'] = $dbj->custom($sql);       
        $this->load->view("home/buzzin_quickpics", $result);
    }
    //written by Gouthami:Loding View For Create New QuickPic
     function buzzinNewpic() {
        $this->load->view("buzzin_newpic");
    }
    //written by Gouthami:Geting Details of Quick Videos Data From "buzzin_quick_vids" Table
    function buzzinQuickvids() {
        $db_obj = $this->load->module("db_api");
        $data["bqvids"] = $db_obj->custom("select rec_aid,pics_url,likes_count from buzzin_quick_vids order by rand() desc limit 0,15");
        $this->load->view("home/buzzin_quickvids", $data);
    }     
    //written by gouthami:uploding quick pic to onenetwork floder and inserting data into "buzzin_quick_pics" table 
    function buzzinQuickSnap() {
        $this->load->module('db_api');
        $uploaddir = "module_data/buzzin/quick_pics/";
        $id = $this->get_userId();
       // print_r($_POST);
       // buzzinsnap_validate($_POST);exit();
        $caption = filter_var(($this->input->post('buzsnap_caption')),FILTER_SANITIZE_STRING);     
        $snap = $_FILES['buzzdev_snapQuic']['name'];        
        //$p_id = mysql_insert_id();        
        $udata = bin2hex(date('Y-m-d-H-i-s') . $id);
        list($txt, $ext) = explode(".", $snap);
        $buzz_image_name = $uploaddir . $udata . '.' . $ext;
        if (file_exists($buzz_image_name)) {
            unlink($buzz_image_name);
        }
        if (move_uploaded_file($_FILES['buzzdev_snapQuic']['tmp_name'], $buzz_image_name)) {
            shell_exec('chmod -R 777 /var/www/html/onenetwork');
            $fields = array('user_id_fk' => $id, 'pics_url' => $buzz_image_name, 'caption' => $caption);
            $buzzsnap = $this->db_api->insert($fields, "buzzin_quick_pics", "1");
            if ($buzzsnap == 1) {//AERPC114                
                echo mysql_insert_id();
            } else {//AERPC115
                echo 'not inserted';
            }
        } else {
            echo 'file not uploaded';
        }
    }
    function onetwork_official_badges() {
        $this->load->module('db_api');
        $sql = "select rec_aid from onetwork_official_badges where requested_by=" . $this->get_userId();
        $data['officialbadgedata'] = $this->db_api->custom($sql);
        $data['countriesList'] = $this->getCountries();
        $this->load->view("onenetwork_official_badges", $data);
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
            'city_id_fk' => xss_clean($this->input->post('onenetwork_cities')),);
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
            $a_data['entity_type'] = 'BUZZIN_FAMOUS_PERSONALITY';
            foreach ($a_data as $key => $val) {
                $a_data[$key] = $this->test_input($a_data[$key]);
            }
            $result = $this->db_api->insert($a_data, 'onetwork_official_badges');
            echo $result;
        }
    }
    //july 01 2016 by venkatesh
function downloadfile($file) { // $file = include path
    $file="assets/doc/".$file.".pdf";
        if(file_exists($file)) {
            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename='.basename($file));
            header('Content-Transfer-Encoding: binary');
            header('Expires: 0');
            header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
            header('Pragma: public');
            header('Content-Length: ' . filesize($file));
            ob_clean();
            flush();
            readfile($file);
            exit;
        }

    }
        //november 23 2016 by venkatesh
    function friendrequest(){

        $db_obj=$this->load->module("db_api");
            $uid=$this->get_userid();

        if($_REQUEST["requestforupdate"]=="YES"){
            $db_obj->update(["read_or_not"=>'1'],'blog_users_connections',"`friend_id_fk`=$uid and followed_via_module='ONENETWORK' and `read_or_not`='0' and `status`='PND'");
        }

        $qur="SELECT `connected_time`,profile_id,user_id,replace(concat(first_name,' ',middle_name,' ',last_name),'  ',' ') as fullname,img_path FROM `blog_users_connections` buc left join iws_profiles ip on buc.my_id_fk=ip.profile_id WHERE `friend_id_fk`=$uid and followed_via_module='ONENETWORK' and buc.`status`='PND' order by `connected_time` desc";

       $data["cofriend_request"]= $db_obj->custom($qur);

       $this->load->view("home/friendrequest",$data);

    }
    //november 23 2016 by venkatesh

    function friendrequestcount(){
        $uid=$this->get_userid();
        $db_obj=$this->load->module("db_api");
        $qur="SELECT count(`friend_id_fk`) as cnt FROM `blog_users_connections` WHERE `friend_id_fk`=$uid and followed_via_module='ONENETWORK' and `read_or_not`='0' and `status`='PND'";
        $uid=$this->get_userid();
        $rlt= $db_obj->custom($qur);
        echo $rlt[0]['cnt'];
    }
    //november 23 2016 by venkatesh
    function userAccept(){
        $uid=$this->get_userId();
        $fid= hex2bin($_REQUEST["profileid"]);
        $db_obj=$this->load->module("db_api");
        echo $db_obj->update(["status"=>"ACPT"],"blog_users_connections","friend_id_fk=$uid and my_id_fk=$fid and followed_via_module='ONENETWORK'");
    }
    //november 23 2016 by venkatesh
    function ignoreconnection(){
                        $uid=$this->get_userId();
                $fid= hex2bin($_REQUEST["profileid"]);
        $db_obj=$this->load->module("db_api");
        echo $db_obj->delete("blog_users_connections","friend_id_fk=$uid and my_id_fk=$fid and followed_via_module='ONENETWORK'");

    }

}
