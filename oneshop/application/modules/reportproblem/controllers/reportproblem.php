<?php
if (!defined('BASEPATH'))
  exit('No direct script access allowed');

class ReportProblem extends CI_Controller {

  function __construct() {
    parent::__construct();
  }

  function report_problem() {
    $data['country_info'] = $this->globalCountriesInfo();
    $this->load->view("reportproblem/reportpopup", $data);
  }

  //5 june 2015 report problem insertion by ramadevi.
  function report_problem_insertion() {
        //require('application/libraries/oneshopconfig.php');
        $this->load->module('home');
        $ppic_image_name = "";
        $id = $this->home->get_UserId();
        if ($_FILES["report_problem_screenshot"]["name"]) {
            $snapshot_path = $_FILES["report_problem_screenshot"]["name"];
            $path = explode("/", $snapshot_path);
            $filename = end($path);
            $date = new DateTime();
            $time = $date->format('Y-m-d-H-i-s');
            $uploaddir = "data/report_snapshot/";
            //list($txt, $ext) = explode(".", $filename);
            $ext = end(explode(".", $filename));
            $snap = $id . $time . "." . $ext;
            $ppic_image_name = $uploaddir . $snap;
            if (move_uploaded_file($_FILES['report_problem_screenshot']['tmp_name'], $ppic_image_name)) {
                shell_exec('chmod -R 777 ' . $_SERVER["DOCUMENT_ROOT"] . $ppic_image_name);
            } else {
                echo "fie not uploaded";
            }
        }
        $dbobj = $this->load->module('db_api');
        $dev_os_a_data = array(
            'module' => "One Shop",
            'title_of_problem' => $_REQUEST["report_problem_name"],
            'description' => $_REQUEST["report_problem_description"],
            'user_location' => $_REQUEST['location'],
            'attach_snapshot' => $snap,
            'reported_by' => $id
        );
        foreach ($dev_os_a_data as $key => $val) {
            $dev_os_a_data[$key] = $this->strip_data($dev_os_a_data[$key]);
        }
        $result = $dbobj->insert($dev_os_a_data, "iws_reported_problem");
        if ($result) {
            $rlt = $dbobj->custom("select reporttoken from iws_reported_problem where reported_by=" . $id . " order by rec_aid desc limit 1 ");
            if ($rlt != 0) {
                echo "ON9###" . $rlt[0]["reporttoken"];
            }
        } else {
            echo "Sever busy,Please try after some time";
        }
    }

    //5 june 2015 to get countrieslist by ramadevi.
  function globalCountriesInfo() {
    $db_obj = $this->load->module("db_api");
    $myfields = "country_name,country_id";
    $where = "";
    $mytable = "iws_countries_info";
    $result = $db_obj->select($myfields, $mytable, $where);
    return $result;
  }
  // function to strip html tags
    function strip_data($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
      //june 30 by venkatesh    
    function upgradeShopCurrentPackage(){        
        //print_R($_REQUEST);        
        $currentrenewalPckgId=$_REQUEST["currentrenewalPckgId"];
        $pckprice=$_REQUEST["pckprice"];
         $newproducts=$_REQUEST["newproducts"];
         $remainingproducts=$_REQUEST["remainingproducts"];
        $pckremainingmoths=$_REQUEST["pckremainingmoths"];
         $pckduretion=$_REQUEST["pckduretion"];
         
        $store_id_fk=$_REQUEST["storeaid"];
        $package_id_fk=$_REQUEST["newpackageId"];
        $total_products=$remainingproducts+($newproducts*$pckduretion);
        $price=$pckprice*$pckduretion;
        $period_in_months=$pckremainingmoths+$pckduretion;
       $date = new DateTime("+".$period_in_months." months");
        $expired_on= $date->format("Y-m-d h:i:s");
        
         $updatequr="UPDATE `oshop_store_renewals_info` SET  `is_renewed`=1 WHERE" ;
        $dbobj=$this->load->module("db_api");
        if($dbobj->update(["is_renewed"=>1],"oshop_store_renewals_info","`renewal_pckg_id`=".$currentrenewalPckgId." and `store_id_fk`=".$store_id_fk)==1){
            $fields=["store_id_fk"=>$store_id_fk,
            "package_id_fk"=>$package_id_fk,
            "total_products"=>$total_products,
            "price"=>$price,
            "period_in_months"=>$period_in_months,
            "expired_on"=>$expired_on ];
            if( $dbobj->insert($fields,"oshop_store_renewals_info")!=1){
                echo "package Not Upgraded";
           $dbobj->update(["is_renewed"=>0],"oshop_store_renewals_info","`renewal_pckg_id`=".$currentrenewalPckgId." and `store_id_fk`=".$store_id_fk);
            }else{
                echo "PACKSUCCESS";
            }
        }else{
            echo "package Not Upgraded";
        }
        
        
        
        
//        print_R($fields);
    }
    
    
    
}
