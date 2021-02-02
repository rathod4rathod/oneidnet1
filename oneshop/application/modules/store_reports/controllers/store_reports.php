<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
class store_reports extends CI_Controller {

  function __construct() {
    parent::__construct();
    $this->load->module("db_api");
    $this->load->module("imageresize");
    /* session and cookies check */
       if ($_REQUEST) {
            $sobj= $this->load->module("session_restart");
            if (isset($_REQUEST["skey"])) {
                $sobj->key_check($_REQUEST["skey"]);
            }
        }
    /* session and cookies check */
  }

  function get_UserId() {
      $cookies_obj=$this->load->module("cookies");
        $user_id=$cookies_obj->getUserID();
        return $user_id;
  }
  function get_store_ownerId() {
//    if($_SESSION['store_owner_id']){
//      return $_SESSION['store_owner_id'];
//    }
      $dbapi=$this->load->module("db_api");
      $store_owner_id="";
      $rlt=$dbapi->custom("select created_by from oshop_stores where created_by=".$this->get_UserId());
        if($rlt!=0)
        {
          $store_owner_id=$this->get_UserId();
        }

//        $rltq=$dbapi->custom("select oas.created_by store_owner_id from os_store_settings oss left join os_all_store oas on oss.store_id_fk=oas.store_aid where order_manager_emails like '%~".$this->getUser_Id()."~%' or store_manager_emails like '%~".$this->get_UserId()."~%'");
//          if($rltq)                {
//            $store_owner_id=$rltq[0]["store_owner_id"];
//          }
          return $store_owner_id;
  }

  function order_recieved_chart($store_code) {

    $store_aid = $this->store_id_return($store_code);
    $month = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
    $db_obj = $this->load->Module("db_api");

    $query = "SELECT date(time) MONTH,COUNT(*) COUNT,YEAR(time) YEAR
  FROM oshop_orders  WHERE MONTH(time)=MONTH(CURRENT_DATE()) and store_id_fk=" . $store_aid . "
   GROUP BY date(time)";
      //echo $query;
    $rlt = $db_obj->custom($query);

    /* $rlt = array_reverse($rlt);
      for ($a = 0; $a < count($rlt); $a++) {
      for ($k = 0; $k < count($month); $k++) {
      if ($rlt[$a]["MONTH"] == $k + 1) {
      $rlt[$a]["MONTH_name"] = $month[$k];
      //$rlt[$a]["desc_value"]=$rlt[$a]["YEAR"].$rlt[$a]["MONTH"];
      }
      }
      } */

    $data["Order_recive_data"] = $rlt;
    $this->load->view("store_reports/order_recieved", $data);
  }

  //11-june-2015 by venkatesh : this function shows order recieved chart
  function order_recieved_chart1($store_code) {
    $store_aid = $this->store_id_return($store_code);
    $month = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
    $db_obj = $this->load->Module("db_api");

    $date = new DateTime($_REQUEST["fit_start_time"]);
    $start_date = $date->format('Y-m-d');
    $date = new DateTime($_REQUEST["fit_end_time"]);
    $end_date = $date->format('Y-m-d');
     $query = "SELECT date(time) MONTH,COUNT(*) COUNT,YEAR(time) YEAR
  FROM oshop_orders  WHERE DATE(time) BETWEEN '$start_date' AND '$end_date' and store_id_fk=" . $store_aid . "
   GROUP BY date(time)";
    /*$query = "SELECT date(order_date) MONTH,COUNT(*) COUNT,YEAR(order_date) YEAR
          FROM os_orders
          WHERE order_date BETWEEN '$start_date' AND '$end_date' and store_id_fk=" . $store_aid . "
          GROUP BY date(order_date)";*/
    

    $rlt = $db_obj->custom($query);
    $rlt = array_reverse($rlt);
    for ($a = 0; $a < count($rlt); $a++) {
      for ($k = 0; $k < count($month); $k++) {
        if ($rlt[$a]["MONTH"] == $k + 1) {
          $rlt[$a]["MONTH_name"] = $month[$k];
          //$rlt[$a]["desc_value"]=$rlt[$a]["YEAR"].$rlt[$a]["MONTH"];
        }
      }
    }
    $data["Order_recive_data"] = $rlt;
    $this->load->view("store_reports/order_recieved_chart", $data);
  }

//08-06-2015 by venkatesh : this function shows order cancellation chart
  function order_cancelation_chart() {
    $store_aid = $this->store_id_return();
    $month = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
    $db_obj = $this->load->Module("db_api");    
    $rlt = $db_obj->custom("SELECT date(`cancellation_time`) MONTH,COUNT(*) COUNT,YEAR(`cancellation_time`) YEAR FROM oshop_cancellation cancel inner join oshop_orders orders where MONTH(`cancellation_time`)=MONTH(CURRENT_DATE()) and orders.store_id_fk=73 GROUP BY date(`cancellation_time`)");

//    $rlt = array_reverse($rlt);
//    for ($a = 0; $a < count($rlt); $a++) {
//      for ($k = 0; $k < count($month); $k++) {
//        if ($rlt[$a]["MONTH"] == $k + 1) {
//          $rlt[$a]["MONTH_name"] = $month[$k];
//          //$rlt[$a]["desc_value"]=$rlt[$a]["YEAR"].$rlt[$a]["MONTH"];
//        }
//      }
//    }

    $data["Order_cancelation_data"] = $rlt;
    // echo "<pre>"; print_R($data["Order_cancelation_data"]);die();
    $this->load->view("store_reports/order_cancelation", $data);
  }
//08-06-2015 by venkatesh : this function shows order cancellation chart
  function order_cancelation_chart1() {
    // print_R($_REQUEST);
    $date = new DateTime($_REQUEST["fit_start_time"]);
    $start_date = $date->format('Y-m-d');
    $date = new DateTime($_REQUEST["fit_end_time"]);
    $end_date = $date->format('Y-m-d');
    $store_code=$_REQUEST["store_code"];
    $store_aid = $this->store_id_return($store_code);
    $month = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
    $db_obj = $this->load->Module("db_api");
    /*$rlt = $db_obj->custom("SELECT date(order_cancel_date) MONTH,COUNT(*) COUNT,YEAR(order_cancel_date) YEAR "
            . "FROM os_cancellation WHERE order_cancel_date BETWEEN '$start_date' AND '$end_date'"
            . "and store_id_fk=$store_aid GROUP BY date(order_cancel_date)");*/
    $rlt=$db_obj->custom("SELECT date(`cancellation_time`) MONTH,COUNT(*) COUNT,YEAR(`cancellation_time`) YEAR FROM oshop_cancellation cancel inner join oshop_orders orders where MONTH(`cancellation_time`)=MONTH(CURRENT_DATE()) and orders.store_id_fk=".$store_aid." GROUP BY date(`cancellation_time`)");
//    $rlt = array_reverse($rlt);
//    for ($a = 0; $a < count($rlt); $a++) {
//      for ($k = 0; $k < count($month); $k++) {
//        if ($rlt[$a]["MONTH"] == $k + 1) {
//          $rlt[$a]["MONTH_name"] = $month[$k];
//        }
//      }
//    }

    $data["Order_cancelation_data"] = $rlt;
    // echo "<pre>"; print_R($data["Order_cancelation_data"]);die();
    $this->load->view("store_reports/order_cancelation_chart", $data);
  }

//08-05-2015 by venkatesh : this function return store auto increment id based on current user id
    function store_id_return($store_code) {
        $db_obj = $this->load->module("db_api");
        $where = "created_by=" . $this->get_store_ownerId()." AND store_code='".$store_code."'";
        $result = $db_obj->select("store_aid", "oshop_stores", $where);
        return $result[0]["store_aid"];
    }

//08-06-2015 by venkatesh : this funcation shows store products and search fields
  function category_wise_sale_chart($store_code) {
    $db_obj = $this->load->module("db_api");
    $store_aid=$this->store_id_return($store_code);
    //echo "select distinct(oc.category_name) as category_name,op.product_name,oc.category_id_fk from oshop_products op left join oshop_categories oc on op.product_category_id_fk=oc.category_id_fk where store_id_fk=".$store_aid;
    //$data["store_products"] = $db_obj->custom("select distinct(op.Category),oc.name from oshop_products op left join oshop_category oc on op.Category=oc.category_aid  where store_id=" .$store_aid);
    //$data["store_products"] = $db_obj->custom("select distinct(oc.category_name) as category_name,op.product_name from oshop_products op left join oshop_categories oc on op.product_category_id_fk=oc.category_id_fk where store_id_fk=".$store_aid);
    $data["store_products"] = $db_obj->custom("SELECT COUNT(*) as cnt,op.product_category_id_fk,oc.category_name,oc.groups FROM `oshop_order_items` ooi LEFT JOIN  oshop_products op ON ooi.product_id_fk=op.product_aid LEFT JOIN oshop_categories oc ON op.product_category_id_fk=oc.category_id_fk WHERE store_id_fk=".$store_aid." group by oc.groups");
    $this->load->view("store_reports/category_wise_sale", $data);
  }

//08-june-2015 by venaktesh : this function shows  category wise sales chart
  function category_wise_sale($store_code) {
   // $month = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
    $store_id = $this->store_id_return();
    $db_obj = $this->load->module("db_api");
    $cattegory_id = $_REQUEST["category_id"];
    if ($_REQUEST["fit_start_time"]) {
        $date = new DateTime($_REQUEST["fit_start_time"]);
        $start_date = $date->format('Y-m-d');
        $date = new DateTime($_REQUEST["fit_end_time"]);
        $end_date = $date->format('Y-m-d');
        echo $query = "SELECT date(oss.delivered_on) MONTH,COUNT(*) COUNT,YEAR(oss.delivered_on) YEAR
      FROM os_sales oss left join oshop_products osp on oss.product_id_str=osp.product_aid
      WHERE oss.delivered_on BETWEEN '$start_date' AND '$end_date' and osp.Category=" . $cattegory_id . " and osp.store_id=" . $store_id . "
      GROUP BY date(oss.delivered_on)";
    } else {
        /*$query = "SELECT COUNT(*) COUNT,YEAR(oss.delivered_on) YEAR
        FROM oshop_orders oss left join oshop_products osp on oss.product_id_str=osp.product_aid
        WHERE MONTH(oss.delivered_on)=MONTH(CURRENT_DATE()) and osp.Category=" . $cattegory_id . " and osp.store_id=" . $store_id . "
        GROUP BY date(oss.delivered_on)";*/
        $query = "SELECT COUNT(*) COUNT,YEAR(oss.delivered_on) YEAR
        FROM oshop_orders oss left join oshop_products osp on oss.product_id_str=osp.product_aid
        WHERE MONTH(oss.delivered_on)=MONTH(CURRENT_DATE()) and osp.Category=" . $cattegory_id . " and osp.store_id=" . $store_id . "
        GROUP BY date(oss.delivered_on)";
    }

    $rlt = $db_obj->custom($query);
//
//    $rlt = array_reverse($rlt);
//    for ($a = 0; $a < count($rlt); $a++) {
//      for ($k = 0; $k < count($month); $k++) {
//        if ($rlt[$a]["MONTH"] == $k + 1) {
//          $rlt[$a]["MONTH_name"] = $month[$k];
//          //$rlt[$a]["desc_value"]=$rlt[$a]["YEAR"].$rlt[$a]["MONTH"];
//        }
//      }
//    }

    $data["category_wise_sale"] = $rlt;
    $this->load->view("store_reports/category_sale_chart", $data);
  }

//09-june-2015 by venkatesh : this function shows products list and search fields
  function product_wise_sale_chart($store_code) {
    $store_uid = $this->store_id_return($store_code);
    $db_obj = $this->load->module("db_api");
    //echo "select product_aid,product_name from oshop_products where store_id_fk=" . $store_uid;
    $data["own_store_products"] = $db_obj->custom("select product_aid,product_name from oshop_products where store_id_fk=" . $store_uid);
    $this->load->view("store_reports/product_wise_sale", $data);
  }

  //09-june-2015 by venkatesh : this function shows product_wise_sale chart
  function product_wise_sale($store_code) {
    //print_R($_REQUEST);die();
    $month = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
    $store_id = $this->store_id_return($store_code);
    $db_obj = $this->load->module("db_api");
    $product_id = $_REQUEST["product_id_forsale"];
    if ($_REQUEST["fit_start_time"]) {
      $date = new DateTime($_REQUEST["fit_start_time"]);
      $start_date = $date->format('Y-m-d');
      $date = new DateTime($_REQUEST["fit_end_time"]);
      $end_date = $date->format('Y-m-d');

      /*$query = "SELECT date(oss.delivered_on) MONTH,COUNT(*) COUNT,YEAR(oss.delivered_on) YEAR
    FROM os_sales oss left join os_products osp on oss.product_id_str=osp.product_aid
    WHERE oss.delivered_on  BETWEEN '$start_date' AND '$end_date' and osp.product_aid=" . $product_id . " and osp.store_id=" . $store_id . "
    GROUP BY date(delivered_on)";*/
      $query="SELECT date(oss.time) MONTH,COUNT(*) COUNT,YEAR(oss.time) YEAR FROM oshop_order_items osi left join oshop_orders oss ON osi.order_id_fk=oss.order_aid left join oshop_products osp on osi.product_id_fk=osp.product_aid WHERE WHERE oss.time  BETWEEN '$start_date' AND '$end_date' and osp.product_aid=" . $product_id . " and osp.store_id_fk=" . $store_id . " GROUP BY date(oss.time)";
    } else {
      /*$query = "SELECT date(oss.delivered_on) MONTH,COUNT(*) COUNT,YEAR(oss.delivered_on) YEAR
    FROM os_sales oss left join os_products osp on oss.product_id_str=osp.product_aid
    WHERE MONTH(oss.delivered_on)= MONTH(CURRENT_DATE()) and oss.delivered_on  and osp.product_aid=" . $product_id . " and osp.store_id=" . $store_id . "
    GROUP BY date(delivered_on)";*/
        $query = "SELECT date(oss.time) MONTH,COUNT(*) COUNT,YEAR(oss.time) YEAR FROM oshop_order_items osi left join oshop_orders oss ON osi.order_id_fk=oss.order_aid left join oshop_products osp on osi.product_id_fk=osp.product_aid WHERE MONTH(oss.time)= MONTH(CURRENT_DATE()) and osp.product_aid=".$product_id." and osp.store_id_fk=".$store_id." GROUP BY date(oss.time)";
    }

    //echo $query;die();
    $rlt = $db_obj->custom($query);
//
//    $rlt = array_reverse($rlt);
//    for ($a = 0; $a < count($rlt); $a++) {
//      for ($k = 0; $k < count($month); $k++) {
//        if ($rlt[$a]["MONTH"] == $k + 1) {
//          $rlt[$a]["MONTH_name"] = $month[$k];
//          //$rlt[$a]["desc_value"]=$rlt[$a]["YEAR"].$rlt[$a]["MONTH"];
//        }
//      }
//    }
    $data["product_wise_sale"] = $rlt;
    $this->load->view("store_reports/product_sale_chart", $data);
  }

//12-june-2015 by venkatesh: this function download the excell sheet
  function excel_download() {
    ob_clean();
    header("Content-Type: application/vnd.ms-excel");
    header("Content-Disposition: attachment; filename=aaaaaa.xls");
    header("Pragma: no-cache");
    header("Expires: 0");
    flush();
    require_once 'application/libraries/PHPExcel/Classes/PHPExcel.php';
    $objPHPExcel = new PHPExcel();
    $getActive = $objPHPExcel->getActiveSheet();
    $getActive->setCellValue("A1", "venkatesh");
    $getActive->setCellValue("A2", "venkatesh");
    $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
    $objWriter->save('php://output');
  }

  function getProducts($prods_str = "") {
    $dbapi = $this->load->module("db_api");
    $prods_arry = str_replace("~", ",", $prods_str);
    $s_where = "product_aid IN ($prods_arry)";
    //echo $s_where;
    $result = $dbapi->select("name", "os_products", $s_where);
    $result_cnt = $dbapi->select("count(*) as cnt", "os_products", $s_where);
    $cnt = $result_cnt[0]["cnt"];
    $j = 0;
    $s_ret_prods = "";
    foreach ($result as $rows) {
      $img_url = explode(",", $rows["image_path"]);
      if ($j == $cnt - 1) {
        $s_ret_prods = $s_ret_prods . $rows["name"];
      } else {
        $s_ret_prods = $s_ret_prods . $rows["name"] . ",";
      }
      $j++;
    }
    return $s_ret_prods;
  }

  //10-06-2015 by venkatesh : this function down load the order recieved report in excel format
  function order_recieved_report_download() {
        $store_code=$_REQUEST["store_code"];
        $store_aid = $this->store_id_return($store_code);
    if ($_REQUEST["fit_start_time"] and $_REQUEST["fit_end_time"]) {
      $date = new DateTime($_REQUEST["fit_start_time"]);
      $start_date = $date->format('Y-m-d');
      $date = new DateTime($_REQUEST["fit_end_time"]);
      $end_date = $date->format('Y-m-d');
      //$query = "SELECT osr.*,osp.name as product_name FROM os_orders osr left join os_products osp on osr.product_id_str=osp.product_aid  WHERE order_date BETWEEN '$start_date' AND '$end_date' and store_id_fk=" . $store_aid;
      $query = "SELECT prods.product_name,oitems.price,oitems.quantity,orders.time,orders.order_code FROM oshop_order_items oitems INNER JOIN oshop_products prods ON prods.product_aid=oitems.product_id_fk LEFT JOIN oshop_orders orders ON oitems.order_id_fk=orders.order_aid WHERE orders.store_id_fk=".$store_aid." AND DATE(time) BETWEEN '$start_date' AND '$end_date'";
    } else {
      //$query = "SELECT osr.*,osp.name as product_name FROM os_orders osr left join os_products osp on osr.product_id_str=osp.product_aid  WHERE MONTH(order_date)=MONTH(CURRENT_DATE()) and store_id_fk=" . $store_aid;
        $query = "SELECT prods.product_name,oitems.price,oitems.quantity,orders.time,orders.order_code FROM oshop_order_items oitems INNER JOIN oshop_products prods ON prods.product_aid=oitems.product_id_fk LEFT JOIN oshop_orders orders ON oitems.order_id_fk=orders.order_aid WHERE orders.store_id_fk=".$store_aid." AND MONTH(time)=MONTH(CURRENT_DATE())";
    }
    //echo $query;
    $db_obj = $this->load->Module("db_api");
    $rlt = $db_obj->custom($query);    
    //$this->order_recieved_report_download1($rlt);
    ob_clean();
    header("Content-Type: application/vnd.ms-excel");
    header("Content-Disposition: attachment; filename=RECIEVED_ORDERS_REPORT.xls");
    header("Pragma: no-cache");
    header("Expires: 0");
    flush();
    require_once 'application/libraries/PHPExcel/Classes/PHPExcel.php';
    $objPHPExcel = new PHPExcel();
    $getActive = $objPHPExcel->getActiveSheet();
    $getActive->getColumnDimension('B')->setAutoSize(true);
    $getActive->getColumnDimension('C')->setAutoSize(true);
    $getActive->getColumnDimension('D')->setAutoSize(true);
    $getActive->getColumnDimension('E')->setAutoSize(true);
    $getActive->getColumnDimension('F')->setAutoSize(true);
    //$getActive->getColumnDimension('G')->setAutoSize(true);
    
     if($_REQUEST["fit_start_time"])
    {
      $getActive->setCellValue("A1", "From");
    $getActive->setCellValue("B1", $_REQUEST["fit_start_time"]);
    $getActive->setCellValue("C1", "To");
    $getActive->setCellValue("D1", $_REQUEST["fit_end_time"]);
    }else{
      $first_day_this_month = date('m-01-Y'); // hard-coded '01' for first day
    $last_day_this_month  = date('m-t-Y');
    $getActive->setCellValue("A1", "From");
    $getActive->setCellValue("B1", $first_day_this_month);
    $getActive->setCellValue("C1", "To");
    $getActive->setCellValue("D1", $last_day_this_month);
    }
    
    
    $getActive->setCellValue("A2", "Sno");
    $getActive->setCellValue("B2", "Order number");
    $getActive->setCellValue("C2", "Product Name");
    $getActive->setCellValue("D2", "Quanitity");
    //$getActive->setCellValue("E2", "Transaction Id");
    $getActive->setCellValue("E2", "Order Date");
    $getActive->setCellValue("F2", "Amount");
    $amount="";
    for ($i = 0; $i < count($rlt); $i++) {
      $t = $i + 3;
      $t1 = $i + 1;
      echo "A$t" . $t1;
      $getActive->setCellValue("A$t", $t1);
      $getActive->setCellValue("B$t", $rlt[$i]["order_code"]);
      $getActive->setCellValue("C$t", $rlt[$i]["product_name"]);
      $getActive->setCellValue("D$t", $rlt[$i]["quantity"]);
      //$getActive->setCellValue("E$t", $rlt[$i]["transaction_id"]);
      $getActive->setCellValue("E$t", $rlt[$i]["time"]);
      $getActive->setCellValue("F$t", $rlt[$i]["price"]);
      $amount=$amount+$rlt[$i]["price"];
      if(count($rlt)==$i+1){
        $y=$t+1;
         $getActive->setCellValue("G$y","TOTAL");
         $getActive->setCellValue("H$y",$amount);
      }
    }
    $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
    ob_clean();
    $objWriter->save('php://output');
  }

  //10-june-2015 ny venkatesh : this function down load the order cancel report in excel format
  function order_cancel_report_download() {
      $store_code=$_REQUEST["store_code"];
    $store_aid = $this->store_id_return($store_code);
    $month = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
    $db_obj = $this->load->Module("db_api");
    if ($_REQUEST["fit_start_time"] and $_REQUEST["fit_end_time"]) {
      $date = new DateTime($_REQUEST["fit_start_time"]);
      $start_date = $date->format('Y-m-d');
      $date = new DateTime($_REQUEST["fit_end_time"]);
      $end_date = $date->format('Y-m-d');
      //$query = "SELECT osc.*,osp.name as product_name FROM os_cancellation osc left join os_products osp on osc.product_id_str=osp.product_aid WHERE order_cancel_date BETWEEN '$start_date' AND '$end_date' and store_id_fk=$store_aid";
      $query="SELECT prods.product_name,oitems.price,oitems.quantity,orders.time,orders.order_code,ocancel.cancellation_time FROM oshop_cancellation ocancel LEFT JOIN oshop_orders orders ON ocancel.order_id_fk=orders.order_aid LEFT JOIN oshop_order_items oitems ON orders.order_aid=oitems.order_id_fk LEFT JOIN oshop_products prods ON prods.product_aid=oitems.product_id_fk WHERE orders.store_id_fk=".$store_aid." AND DATE(time) BETWEEN '$start_date' AND '$end_date'";
    } else {
      //$query = "SELECT osc.*,osp.name as product_name FROM os_cancellation osc left join os_products osp on osc.product_id_str=osp.product_aid where MONTH(order_cancel_date)=MONTH(CURRENT_DATE()) and store_id_fk=$store_aid";
        $query="SELECT prods.product_name,oitems.price,oitems.quantity,orders.time,orders.order_code,ocancel.cancellation_time FROM oshop_cancellation ocancel LEFT JOIN oshop_orders orders ON ocancel.order_id_fk=orders.order_aid LEFT JOIN oshop_order_items oitems ON orders.order_aid=oitems.order_id_fk LEFT JOIN oshop_products prods ON prods.product_aid=oitems.product_id_fk WHERE orders.store_id_fk=".$store_aid." AND MONTH(time)=MONTH(CURRENT_DATE())";
    }
    $rlt = $db_obj->custom($query);
    //echo "<pre>";print_R($rlt);echo "</pre>";
    ob_clean();
    header("Content-Type: application/vnd.ms-excel");
    header("Content-Disposition: attachment; filename=RECIEVED_CANCELLATIONS_REPORT.xls");
    header("Pragma: no-cache");
    header("Expires: 0");
    flush();
    require_once 'application/libraries/PHPExcel/Classes/PHPExcel.php';
    $objPHPExcel = new PHPExcel();
    $getActive = $objPHPExcel->getActiveSheet();
    $getActive->getColumnDimension('B')->setAutoSize(true);
    $getActive->getColumnDimension('C')->setAutoSize(true);
    $getActive->getColumnDimension('D')->setAutoSize(true);
    $getActive->getColumnDimension('E')->setAutoSize(true);
    $getActive->getColumnDimension('F')->setAutoSize(true);
    $getActive->getColumnDimension('G')->setAutoSize(true);
 
    if($_REQUEST["fit_start_time"])
    {
      $getActive->setCellValue("A1", "From");
    $getActive->setCellValue("B1", $_REQUEST["fit_start_time"]);
    $getActive->setCellValue("C1", "To");
    $getActive->setCellValue("D1", $_REQUEST["fit_end_time"]);
    }else{
      $first_day_this_month = date('m-01-Y'); // hard-coded '01' for first day
    $last_day_this_month  = date('m-t-Y');
    $getActive->setCellValue("A1", "From");
    $getActive->setCellValue("B1", $first_day_this_month);
    $getActive->setCellValue("C1", "To");
    $getActive->setCellValue("D1", $last_day_this_month);
    }
    
    
    
    $getActive->setCellValue("A2", "Sno");
    $getActive->setCellValue("B2", "Order Number");
    $getActive->setCellValue("C2", "Product Name");
    $getActive->setCellValue("D2", "Quanitity");
    //$getActive->setCellValue("E2", "transaction Id");
    $getActive->setCellValue("E2", "Order Date");
    $getActive->setCellValue("F2", "Price");
    $getActive->setCellValue("G2", "Order Cancelled Date");
    $total_amt=0;
    for ($i = 0; $i < count($rlt); $i++) {
      $t = $i + 3;
      $t1 = $i + 1;
      echo "A$t" . $t1;
      $getActive->setCellValue("A$t", $t1);
      $getActive->setCellValue("B$t", $rlt[$i]["order_code"]);
      $getActive->setCellValue("C$t", $rlt[$i]["product_name"]);
      $getActive->setCellValue("D$t", $rlt[$i]["quantity"]);
      //$getActive->setCellValue("E$t", $rlt[$i]["transaction_id"]);
      $getActive->setCellValue("E$t", $rlt[$i]["time"]);
      $getActive->setCellValue("F$t", $rlt[$i]["price"]);
      $getActive->setCellValue("G$t", $rlt[$i]["cancellation_time"]);
      $total_amt+=$rlt[$i]["price"];
      if(count($rlt)==$i+1){
        $y=$t+1;
         $getActive->setCellValue("G$y","TOTAL");
         $getActive->setCellValue("H$y",$total_amt);
      }
    }
    $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
    ob_clean();
    $objWriter->save('php://output');
  }

  //10-june-2015 ny venkatesh : this function down load the order category wise sales report in excel format
  function categorywise_sales_report_download() {

    $store_id = $this->store_id_return();
    $db_obj = $this->load->module("db_api");
    $cattegory_id = $_REQUEST["category_id"];
    if ($_REQUEST["fit_start_time"]) {
      $date = new DateTime($_REQUEST["fit_start_time"]);
      $start_date = $date->format('Y-m-d');
      $date = new DateTime($_REQUEST["fit_end_time"]);
      $end_date = $date->format('Y-m-d');
      $query = "SELECT oss.order_no,        oss.quantity_str,        oss.payer_email,        oss.transaction_id,        oss.amount,        oss.ordered_on,        oss.delivered_on,        osp.name as product_name,        osc.name as category_name,        ossub.name as subcategory_name        FROM os_sales oss left join os_products osp on oss.product_id_str=osp.product_aid        left join os_category osc on osc.category_aid=osp.Category         left join os_subcategory ossub on ossub.subcategory_aid=osp.subcategory_id    WHERE oss.delivered_on BETWEEN '$start_date' AND '$end_date' and osp.Category=" . $cattegory_id . " and osp.store_id=" . $store_id . "";
    } else {
      $query = "SELECT oss.order_no,        oss.quantity_str,        oss.payer_email,        oss.transaction_id,        oss.amount,        oss.ordered_on,        oss.delivered_on,        osp.name as product_name,        osc.name as category_name,        ossub.name as subcategory_name        FROM os_sales oss left join os_products osp on oss.product_id_str=osp.product_aid        left join os_category osc on osc.category_aid=osp.Category         left join os_subcategory ossub on ossub.subcategory_aid=osp.subcategory_id    WHERE MONTH(oss.delivered_on)=MONTH(CURRENT_DATE())  and osp.Category=" . $cattegory_id . " and osp.store_id=" . $store_id . "";
    }
    $rlt = $db_obj->custom($query);
    // echo "<pre>";print_R($rlt);echo "</pre>";
    ob_clean();
    header("Content-Type: application/vnd.ms-excel");
    header("Content-Disposition: attachment; filename=CATEGORY_WISE_SALES_REPORT.xls");
    header("Pragma: no-cache");
    header("Expires: 0");
    flush();
    require_once 'application/libraries/PHPExcel/Classes/PHPExcel.php';
    $objPHPExcel = new PHPExcel();
    $getActive = $objPHPExcel->getActiveSheet();
    $getActive->getColumnDimension('B')->setAutoSize(true);
    $getActive->getColumnDimension('C')->setAutoSize(true);
    $getActive->getColumnDimension('D')->setAutoSize(true);
    $getActive->getColumnDimension('E')->setAutoSize(true);
    $getActive->getColumnDimension('F')->setAutoSize(true);
    $getActive->getColumnDimension('G')->setAutoSize(true);
    
     if($_REQUEST["fit_start_time"])
    {
      $getActive->setCellValue("A1", "From");
    $getActive->setCellValue("B1", $_REQUEST["fit_start_time"]);
    $getActive->setCellValue("C1", "To");
    $getActive->setCellValue("D1", $_REQUEST["fit_end_time"]);
    }else{
      $first_day_this_month = date('m-01-Y'); // hard-coded '01' for first day
    $last_day_this_month  = date('m-t-Y');
    $getActive->setCellValue("A1", "From");
    $getActive->setCellValue("B1", $first_day_this_month);
    $getActive->setCellValue("C1", "To");
    $getActive->setCellValue("D1", $last_day_this_month);
    }
    
    
    
    
    $getActive->setCellValue("A2", "Sno");
    $getActive->setCellValue("B2", "Order number");
    $getActive->setCellValue("C2", "Category");
    $getActive->setCellValue("D2", "Sub category");
    $getActive->setCellValue("E2", "Product Name");
    $getActive->setCellValue("F2", "Quantity");
    $getActive->setCellValue("G2", "Order Date");
    $getActive->setCellValue("H2", "Delivered Date");
    $getActive->setCellValue("I2", "Amount");
    $amount="";
    for ($i = 0; $i < count($rlt); $i++) {
      $t = $i + 3;
      $t1 = $i + 1;
      echo "A$t" . $t1;
      $getActive->setCellValue("A$t", $t1);
      $getActive->setCellValue("B$t", $rlt[$i]["order_no"]);
      $getActive->setCellValue("C$t", $rlt[$i]["category_name"]);
      $getActive->setCellValue("D$t", $rlt[$i]["subcategory_name"]);
      $getActive->setCellValue("E$t", $rlt[$i]["product_name"]);
      $getActive->setCellValue("F$t", $rlt[$i]["quantity_str"]);
      $getActive->setCellValue("G$t", $rlt[$i]["ordered_on"]);
      $getActive->setCellValue("H$t", $rlt[$i]["delivered_on"]);
      $getActive->setCellValue("I$t", $rlt[$i]["amount"]);
      $amount=$amount+$rlt[$i]["amount"];
       if(count($rlt)==$i+1){
        $y=$t+1;
         $getActive->setCellValue("H$y","TOTAL");
         $getActive->setCellValue("I$y",$amount);
      }
    }
    $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
    ob_clean();
    $objWriter->save('php://output');
  }
    //10-june-2015 ny venkatesh : this function down load the order product wise sales report in excel format
    function productwise_sales_report_download() {
        $month = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
        $store_code=$_REQUEST["store_code"];
        $store_id = $this->store_id_return($store_code);
        $db_obj = $this->load->module("db_api");
        $product_id = $_REQUEST["product_id_forsale"];    
        if ($_REQUEST["fit_start_time"]) {
            $date = new DateTime($_REQUEST["fit_start_time"]);
            $start_date = $date->format('Y-m-d');
            $date = new DateTime($_REQUEST["fit_end_time"]);
            $end_date = $date->format('Y-m-d');
            //$query = "SELECT   oss.order_no,        oss.quantity_str,        oss.payer_email,        oss.transaction_id,        oss.amount,        oss.ordered_on,        oss.delivered_on,        osp.name as product_name,        osc.name as category_name,        ossub.name as subcategory_name        FROM os_sales oss left join os_products osp on oss.product_id_str=osp.product_aid        left join os_category osc on osc.category_aid=osp.Category         left join os_subcategory ossub on ossub.subcategory_aid=osp.subcategory_id    WHERE oss.delivered_on  BETWEEN '$start_date' AND '$end_date' and osp.product_aid=" . $product_id . " and osp.store_id=" . $store_id . " ";
            $query = "SELECT prods.product_name,oc.groups,oc.category_name,orders.order_code,oitems.quantity,oitems.price,orders.order_code FROM `oshop_order_items` oitems LEFT JOIN oshop_orders orders ON oitems.order_id_fk=orders.order_aid LEFT JOIN oshop_products prods ON oitems.product_id_fk=prods.product_aid LEFT JOIN oshop_categories oc ON prods.product_category_id_fk=oc.category_id_fk WHERE orders.store_id_fk=".$store_id." AND MONTH(DATE(time))=MONTH(CURRENT_DATE())SELECT prods.product_name,oc.groups,oc.category_name,orders.order_code,oitems.quantity,oitems.price,orders.order_code FROM `oshop_order_items` oitems LEFT JOIN oshop_orders orders ON oitems.order_id_fk=orders.order_aid LEFT JOIN oshop_products prods ON oitems.product_id_fk=prods.product_aid LEFT JOIN oshop_categories oc ON prods.product_category_id_fk=oc.category_id_fk WHERE orders.store_id_fk=".$store_id." AND DATE(time) BETWEEN '$start_date' AND '$end_date'";
        } else {
          //$query = "SELECT  oss.order_no,        oss.quantity_str,        oss.payer_email,        oss.transaction_id,        oss.amount,        oss.ordered_on,        oss.delivered_on,        osp.name as product_name,        osc.name as category_name,        ossub.name as subcategory_name        FROM os_sales oss left join os_products osp on oss.product_id_str=osp.product_aid left join os_category osc on osc.category_aid=osp.Category         left join os_subcategory ossub on ossub.subcategory_aid=osp.subcategory_id    WHERE MONTH(oss.delivered_on)= MONTH(CURRENT_DATE()) and oss.delivered_on  and osp.product_aid=" . $product_id . " and osp.store_id=" . $store_id . "";
            $query = "SELECT prods.product_name,oc.groups,oc.category_name,orders.order_code,oitems.quantity,oitems.price FROM `oshop_order_items` oitems LEFT JOIN oshop_orders orders ON oitems.order_id_fk=orders.order_aid LEFT JOIN oshop_products prods ON oitems.product_id_fk=prods.product_aid LEFT JOIN oshop_categories oc ON prods.product_category_id_fk=oc.category_id_fk WHERE orders.store_id_fk=".$store_id." AND MONTH(DATE(time))=MONTH(CURRENT_DATE())";
        }
        $rlt = $db_obj->custom($query);
        //echo "<pre>";print_R($rlt);echo "</pre>";
        ob_clean();
        header("Content-Type: application/vnd.ms-excel");
        header("Content-Disposition: attachment; filename=PRODUCT_WISE_SALES_REPORT.xls");
        header("Pragma: no-cache");
        header("Expires: 0");
        flush();
        require_once 'application/libraries/PHPExcel/Classes/PHPExcel.php';
        $objPHPExcel = new PHPExcel();
        $getActive = $objPHPExcel->getActiveSheet();
        $getActive->getColumnDimension('B')->setAutoSize(true);
        $getActive->getColumnDimension('C')->setAutoSize(true);
        $getActive->getColumnDimension('D')->setAutoSize(true);
        $getActive->getColumnDimension('E')->setAutoSize(true);
        $getActive->getColumnDimension('F')->setAutoSize(true);
        $getActive->getColumnDimension('G')->setAutoSize(true);

        if($_REQUEST["fit_start_time"])
        {
            $getActive->setCellValue("A1", "From");
            $getActive->setCellValue("B1", $_REQUEST["fit_start_time"]);
            $getActive->setCellValue("C1", "To");
            $getActive->setCellValue("D1", $_REQUEST["fit_end_time"]);
        }else{
            $first_day_this_month = date('m-01-Y'); // hard-coded '01' for first day
            $last_day_this_month  = date('m-t-Y');
            $getActive->setCellValue("A1", "From");
            $getActive->setCellValue("B1", $first_day_this_month);
            $getActive->setCellValue("C1", "To");
            $getActive->setCellValue("D1", $last_day_this_month);
        }

        $getActive->setCellValue("A2", "Sno");
        $getActive->setCellValue("B2", "Order number");
        $getActive->setCellValue("C2", "Category");
        $getActive->setCellValue("D2", "Sub category");
        $getActive->setCellValue("E2", "Product Name");
        $getActive->setCellValue("F2", "Quantity");
        $getActive->setCellValue("G2", "Order Date");
        //$getActive->setCellValue("H2", "Delivered Date");
        $getActive->setCellValue("H2", "Amount");

        for ($i = 0; $i < count($rlt); $i++) {
            $t = $i + 3;
            $t1 = $i + 1;
            echo "A$t" . $t1;
            $getActive->setCellValue("A$t", $t1);
            $getActive->setCellValue("B$t", $rlt[$i]["order_code"]);
            $getActive->setCellValue("C$t", $rlt[$i]["groups"]);
            $getActive->setCellValue("D$t", $rlt[$i]["category_name"]);
            $getActive->setCellValue("E$t", $rlt[$i]["product_name"]);
            $getActive->setCellValue("F$t", $rlt[$i]["quantity"]);
            $getActive->setCellValue("G$t", $rlt[$i]["time"]);
            //$getActive->setCellValue("H$t", $rlt[$i]["delivered_on"]);
            $getActive->setCellValue("H$t", $rlt[$i]["price"]);
            $amount=$amount+$rlt[$i]["price"];
            if(count($rlt)==$i+1){
                $y=$t+1;
                $getActive->setCellValue("G$y","TOTAL");
                $getActive->setCellValue("H$y",$amount);
            }
        }
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
        ob_clean();
        $objWriter->save('php://output');
    }

}
