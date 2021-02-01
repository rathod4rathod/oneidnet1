<?php
if (!defined('BASEPATH'))   exit('No direct script access allowed');

class mycart extends CI_Controller {

  function __construct() {
    parent::__construct();
    $this->load->module("db_api");
  }

  function get_UserId() {
      $cookies_obj=$this->load->module("cookies");
        $user_id=$cookies_obj->getUserID();
        return $user_id;
    //return $_SESSION['user_id'];
  }

  /* ....Pavani on 29-05-2015.... */

  function mycart_View($store_id = 0) {
    $dbobj = $this->load->module("db_api");
    $userid = $this->get_UserId();
    //echo $store_id;
    $tmp = array();
    $s_query = "SELECT * FROM os_cart_items cart INNER JOIN os_products prods ON cart.product_id_fk=prods.product_aid WHERE cart.profile_id=" . $userid;
    if ($store_id != 0) {
      $s_query.=" AND cart.store_id_fk=" . $store_id;
      $s_store_qry = "SELECT * FROM os_all_store WHERE store_aid=" . $store_id;
      $store_res = $dbobj->custom($s_store_qry);
      $store_uid = $store_res[0]["store_id"];
    }
    //echo $s_query;   
    $carts_res = $dbobj->custom($s_query);
    $data["cart_items"] = $carts_res;
    $data["store_id"]=$store_id;
    $data["store_uid"] = $store_uid;
    $this->load->view('mycart/mycart_view', $data);
  }

  function addToCart() {
    $dbobj = $this->load->module("db_api");
    $userid = $this->get_UserId();
    $pid = $this->input->post("productid");
    $store_id = $this->input->post("storeid");
    //$store_id = $this->getStoreId($storeuid);
    //$store_aid = $store_id["store_aid"];
    //echo "store aid:".$store_aid;
    $s_where = "product_id_fk=" . $pid . " AND profile_id=" . $userid;
    $products_res = $dbobj->select("*", "os_cart_items", $s_where);
    //var_dump($products_res);
    if ($products_res == 0) {
      //echo "not exists";
      $fields = array("product_id_fk" => $pid, "profile_id" => $userid, "store_id_fk" => $store_id);
      $resins = $dbobj->insert($fields, "os_cart_items");
      if ($resins == 1) {
        $cart_cnt = $this->cartCount();
        echo $cart_cnt;
      }
    } else {
      echo "exists";
    }
  }

  function getStoreId($storeuid) {
    $dbapi = $this->load->module("db_api");
    $s_where = "store_id='" . $storeuid . "'";
    $res = $dbapi->select("*", "os_all_store", $s_where);
    return $res[0];
  }
  // function to get the number of items added to cart by the user by Pavani
  function cartCount(){
    $dbobj=$this->load->module("db_api");
    $userid=$this->get_UserId();
    $s_query="SELECT COUNT(*) AS cnt FROM os_cart_items cart INNER JOIN os_products prods ON cart.product_id_fk=prods.product_aid WHERE cart.profile_id=".$userid;
    $carts_res=$dbobj->custom($s_query);
    return $carts_res[0]["cnt"];
  }
  // function to get delete cart items by Pavani
  function deleteCart(){
    $dbobj=$this->load->module("db_api");
    $userid=$this->get_UserId();
    $product_id=$this->input->post("productid");
    $s_where="product_id_fk=".$product_id." AND profile_id=".$userid;
    $delres=$dbobj->delete("os_cart_items",$s_where);
    if($delres>0){
      $cart_cnt=$this->cartCount();
      echo $cart_cnt;
    }
  }
  // function to get the stores count added to cart by the user or the store ids based on the mode parameter value passed to it by Pavani
  function getStores($mode="default"){
    $userid=$this->get_UserId();
    $dbapi=$this->load->module("db_api");
    $s_query="select cart.store_id_fk as storeid,stores.store_name as store_name from os_cart_items cart inner join oshop_stores stores on cart.store_id_fk=stores.store_aid where profile_id=".$userid." group by cart.store_id_fk";
    $result=$dbapi->custom($s_query);
    $s_stores="";
    $cnt=0;
    foreach($result as $rows){
      $s_stores=$s_stores.$rows["storeid"]."~".$rows["store_name"]."-";
      $cnt++;
    }
    if ($mode == "count") {
      return $cnt;
    } else {
      return $s_stores;
    }
  }
  // function to get the store count added in the cart list by Pavani
  function getStoreCount(){
    $storecnt=$this->getStores("count");
    return $storecnt;
  }

  function cartBuyAll() {
    $msg = "";
    $id = $this->get_UserId();
    $dbapi = $this->load->module("db_api");
    $home = $this->load->module("home");
    //var_dump($_REQUEST);
    if ($_REQUEST['txn_id'] != 0 && $_REQUEST['payer_status'] == 'verified') {
      $mc_gross = $_REQUEST['mc_gross'];
      $order_no = $home->retrieve_order_number(); // to generate unique order number
      $payer_email = $_REQUEST['payer_email'];
      $custom = $_REQUEST['custom'];
      $custom_arry = explode("-", $custom);
      $store_id = $custom_arry[0];
      $product_str = $custom_arry[1];
      $quantity_str = $custom_arry[2];
      $amount = $custom_arry[3];
      $quantity = $_REQUEST["quantity"];
      $txn_id = $_REQUEST['txn_id'];
      $order_dt = date("Y-m-d H:i:s");
      if (!(strpos("~", $product_str)) || !(strpos("~", $quantity_str))) {
        $prods = explode("~", $product_str);
        $quantities = explode("~", $quantity_str);
        $amount_str = explode("~", $amount);
        for ($i = 0; $i < count($prods); $i++) {
          $qty_str = $quantities[$i];
          $products_str = $prods[$i];
          $price_str = $amount_str[$i];
          $fields = array('ordered_by' => $id, 'order_num' => $order_no, 'payer_email' => $payer_email,
              'product_id_str' => $products_str, 'transaction_id' => $txn_id, 'total_amount_str' => $price_str,
              'store_id_fk' => $store_id, "quantity_str" => $qty_str, "order_date" => $order_dt, "status" => "Got Request");
          $dbapi->insert($fields, "os_orders");
          $s_where = "profile_id=" . $id . " and store_id_fk=" . $store_id;
          $delres = $dbapi->delete("os_cart_items", $s_where);
          $update_qry = "UPDATE os_products set quantity=quantity-$qty_str WHERE product_aid=$products_str";
          $dbapi->custom($update_qry);
          $s_where = "profile_id=" . $id . " ORDER BY created_on DESC LIMIT 1";
          $ship_result = $this->db_api->select("*", "os_shipping_detail", $s_where);
          $rec_aid = $ship_result[0]["rec_aid"];
          $s_ushipquery = "UPDATE os_shipping_detail SET order_id='" . $order_no . "' WHERE rec_aid=" . $rec_aid;
          $ship_res = $this->db_api->custom($s_ushipquery);
        }
      } else {
        $fields = array('ordered_by' => $id, 'payer_email' => $payer_email, 'transaction_id' => $txn_id, 'total_amount_str' => $amount,
            'store_id_fk' => $store_id, "quantity_str" => $quantity_str, "order_date" => $order_dt, 'product_id_str' => $product_str,
            'order_num' => $order_no, "status" => "Got Request");
        $dbapi->insert($fields, "os_orders");
        $s_where = "profile_id=" . $id . " and store_id_fk=" . $store_id;
        $delres = $dbapi->delete("os_cart_items", $s_where);
        $update_qry = "UPDATE os_products set quantity=quantity-$quantity_str WHERE product_aid=$product_str";
        $dbapi->custom($update_qry);
        /* updating the order number in shipping detail after successful payment */
        $s_where = "profile_id=" . $id . " ORDER BY created_on DESC LIMIT 1";
        $ship_result = $this->db_api->select("*", "os_shipping_detail", $s_where);
        $rec_aid = $ship_result[0]["rec_aid"];
        $s_ushipquery = "UPDATE os_shipping_detail SET order_id='" . $order_no . "' WHERE rec_aid=" . $rec_aid;
        $ship_res = $this->db_api->custom($s_ushipquery);
        /* updating the order number in shipping detail after successful payment */
      }
      if ($delres) {
        $msg = "SUCCESS";
        $this->load->module("notification");
        $custom_arry = explode("-", $_REQUEST['custom']);
        $this->notification->cartbuynotification($custom_arry[1]);
        $home = $this->load->module("home");
        $this->deleteOrder_id();
        $home->orderMail($store_id, $order_no);
      } else {
        $msg = "ERROR";
      }
      echo $msg;
      /* $save_paypal_details = $this->db_api->insert($fields, 'os_orders');
        //echo "result:".$save_paypal_details;
        if ($save_paypal_details) {
        $msg = "SUCCESS";
        $this->orderMail($store_id,$order_no);
        } else {
        $msg = "ERROR";
        }
        echo $msg; */
    }
  }

  function deleteOrder_id() {
    $furl = "assets/order_id.txt";
    $lines = file($furl);
    unset($lines[0]);
    $file = fopen($furl, 'w');
    fwrite($file, implode('', $lines));
    fclose($file);
  }

  function deleteCartStore($store_id) {
    $db_api = $this->load->module("db_api");
    $s_dwhere = "profile_id=" . $this->get_UserId() . " AND store_id_fk=" . $store_id;
    //echo $s_dwhere;
    $del_res = $db_api->delete("os_cart_items", $s_dwhere);
    echo $del_res;
  }

  /* ....Pavani on 29-05-2015.... */
}
