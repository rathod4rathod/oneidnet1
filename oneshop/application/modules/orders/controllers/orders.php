<?php

if (!isset($_SESSION)) {
    session_start();
}
if (!defined('BASEPATH'))    exit('No direct script access allowed');

class orders extends CI_Controller {

    function __construct() {
        parent::__construct();
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
        $cookies_obj = $this->load->module("cookies");
        $user_id = $cookies_obj->getUserID();
        return $user_id;
    }

    function get_store_ownerId() {
        $dbapi = $this->load->module("db_api");
        $store_owner_id = "";
        $rlt = $dbapi->custom("select created_by from os_all_store where created_by=" . $this->get_UserId());
        if ($rlt != 0) {
            $store_owner_id = $this->get_UserId();
        }
        return $store_owner_id;
    }

    function mystore_Orders() {
        $this->load->view('orders/mystore_orders');
    }

    function mystore_Myorders_search() {
        $this->load->view('orders/mystore_myorders_search');
    }

    // function to get display the orders list of the store based on the store id Pavani on 05-06-2015
    function mystore_Myorders_list($storeid = null) {
        $orderid = $this->input->post("order_no");
        $order_date = $this->input->post("order_dt");
        if ($order_date != "") {
            $s_date = date('Y-m-d H:i:s', strtotime($order_date));
            $date_arry = explode(" ", $s_date);
            $odate = $date_arry[0];
        }
        $i_storeid = $this->getStoreDetails($storeid);
        $dbapi = $this->load->module("db_api");
        $s_query = "SELECT stores.store_id,orders.quantity_str,orders.store_id_fk,orders.total_amount_str,orders.product_id_str,orders.order_num as order_num,stores.name,orders.total_amount_str as total_amount_str,orders.order_date,orders.status as status FROM os_orders orders INNER JOIN os_all_store stores ON orders.store_id_fk=stores.store_aid WHERE orders.store_id_fk=" . $i_storeid;
        if ($orderid != "") {
            $s_query.=" AND order_num='" . $orderid . "'";
        }
        if ($order_date != "") {
            $s_query.=" AND date(order_date)='" . $date_arry[0] . "'";
        }
        $s_query.=" GROUP BY orders.order_num ORDER BY order_date DESC";
        $result = $dbapi->custom($s_query);
        $sales_list = $this->getSales("stores", $i_storeid, $orderid, $odate);
        if ($sales_list != 0) {
            $tmp = array_merge($result, $sales_list);
        }
        if ($result == 0) {
            $tmp = $sales_list;
        }
        if ($sales_list == 0) {
            $tmp = $result;
        }
        $i = 0;
        foreach ($tmp as $rows) {
            $prods_str = $tmp[$i]["order_num"];
            $tmp[$i]["prods_name"] = $this->getProducts($prods_str);
            $i++;
        }
        $data["orders"] = $tmp;
        $this->load->view('orders/mystore_myorders_list', $data);
    }

    // function to get the products name based on the order number passed as parameter to it----Pavani on 10-06-2015
    function getProducts($order_no = "") {
        $dbapi = $this->load->module("db_api");
        $s_query = "SELECT * FROM os_orders orders INNER JOIN os_products prods ON orders.product_id_str=prods.product_aid WHERE orders.order_num='" . $order_no . "'";
        //echo $s_query;
        $orders_res = $dbapi->custom($s_query);
        $s_ret_prods = "";
        $s_ret_prods_name = "";
        $s_ret_prods_amount = "";
        $s_ret_prods_qty = "";
        $j = 0;
        foreach ($orders_res as $rows) {
            $img_url = explode(",", $rows["image_path"]);
            if ($s_ret_prods == "") {
                $s_ret_prods_name = $s_ret_prods_name . $rows["name"] . ":" . $img_url[0];
                $s_ret_prods_amount = $s_ret_prods_amount . $rows["total_amount_str"];
                $s_ret_prods_qty = $s_ret_prods_qty . $rows["quantity_str"];
            } else {
                $s_ret_prods_name = $s_ret_prods_name . "~" . $rows["name"] . ":" . $img_url[0];
                $s_ret_prods_amount = $s_ret_prods_amount . "~" . $rows["total_amount_str"];
                $s_ret_prods_qty = $s_ret_prods_qty . "~" . $rows["quantity_str"];
            }
            $s_ret_prods = $s_ret_prods_name . "|" . $s_ret_prods_amount . "|" . $s_ret_prods_qty;
            $j++;
        }
        return $s_ret_prods;
    }

    // function to get the sales list based on the logged in user/store owner id by Pavani --- to change
    function getSales($mode = "users", $store_user_id = "", $order_id = "", $orderdate = "") {
        $dbapi = $this->load->module("db_api");
        $s_query = "SELECT stores.store_id,sales.product_id_str,sales.quantity_str,sales.store_id_fk,sales.order_no as order_num,stores.name,sales.amount as total_amount_str,sales.ordered_on as order_date FROM os_sales sales INNER JOIN os_all_store stores ON sales.store_id_fk=stores.store_aid";
        if ($mode == "users") {
            $s_where = " WHERE ordered_by=" . $store_user_id;
        } else {
            $s_where = " WHERE sales.store_id_fk=" . $store_user_id;
            if ($order_id != "") {
                $s_where.=" AND order_no='$order_id'";
            }
            if ($orderdate != "") {
                $s_where.=" AND date(order_date)='" . $orderdate . "'";
            }
        }
        $s_query.=$s_where . " GROUP BY order_num ORDER BY ordered_on DESC";
        $sales_data = $dbapi->custom($s_query);
        $i = 0;
        foreach ($sales_data as $rows) {
            $sales_data[$i]["status"] = "Delivered";
            $i++;
        }
        return $sales_data;
    }

    /* function to get the list of recent orders by Pavani on 16-06-2015 */

    function mystore_recent($storeid) {
        $store_aid = $this->getStoreDetails($storeid);
        $dbapi = $this->load->module("db_api");
        $s_query = "SELECT * FROM os_orders WHERE store_id_fk=" . $store_aid . " GROUP BY order_num ORDER BY order_date DESC LIMIT 6";
        $orders_result = $dbapi->custom($s_query);
        $i = 0;
        foreach ($orders_result as $rows) {
            $prods_str = $rows["order_num"];
            $products_data = $this->getProducts($prods_str);
            $orders_result[$i]["prods_name"] = $products_data;
            $i++;
        }
        $data["orders"] = $orders_result;
        $data["mode"] = "recent";
        $this->load->view("orders/mystore_myorders_list", $data);
    }

    // function to display the list of users orders ---- Pavani on 10-06-2015 --- to change
    function user_Purchase_History() {
        $userid = $this->get_UserId();
        $order_id = $this->input->post("order_num");
        $order_date = $this->input->post("order_date");
        $dbapi = $this->load->module("db_api");
        $s_query = "SELECT stores.store_id,orders.quantity_str,orders.store_id_fk,orders.total_amount_str,orders.product_id_str,orders.order_num as order_num,stores.name,orders.total_amount_str as total_amount_str,orders.order_date,orders.status as status FROM os_orders orders INNER JOIN os_all_store stores ON orders.store_id_fk=stores.store_aid WHERE ordered_by=" . $userid;
        if ($order_id != "") {
            $order_id = trim($order_id);
            $s_query.=" AND orders.order_num='" . $order_id . "'";
        }
        if ($order_date != "") {
            $order_dt = explode(" ", $order_date);
            $order_formatted = date("Y-m-d", strtotime($order_dt[0]));
            $s_query.=" AND DATE(orders.order_date)='" . $order_formatted . "'";
        }
        $s_query.=" GROUP BY order_num";
        $prods_data = $dbapi->custom($s_query);
        $sales_list = $this->getSales("users", $userid, "", "");
        if ($sales_list != 0 && $prods_data != 0) {
            $tmp = array_merge($prods_data, $sales_list);
        } elseif ($sales_list != 0) {
            $tmp = $sales_list;
        } elseif ($prods_data != 0) {
            $tmp = $prods_data;
        }
        $i = 0;
        foreach ($tmp as $rows) {
            $prods_st = $tmp[$i]["order_num"];
            $tmp[$i]["prod_names"] = $this->getProducts($prods_st);
            $i++;
        }
        //var_dump($tmp);
        $data["orders_list"] = $tmp;
        $this->load->view('orders/user_purchase_history', $data);
    }

    // function to display the list of items saved by user ----Pavani on 10-06-2015 --- to change
    function user_Saved_Products() {
        $userid = $this->get_UserId();
        $dbapi = $this->load->module("db_api");
        $s_query = "SELECT list.product_id_fk as product_id,prods.discount,prods.cost_price,prods.image_path,stores.store_id,stores.name as storename,prods.name as productname,prods.product_aid,prods.brand_name as brand,stores.store_id as storeid FROM os_wishlist list INNER JOIN os_products prods ON list.product_id_fk=prods.product_aid INNER JOIN os_all_store stores ON prods.store_id=stores.store_aid WHERE list.profile_id=" . $userid;
        $prods_data = $dbapi->custom($s_query);
        $data["prods_data"] = $prods_data;
        $this->load->view('orders/user_saved_products', $data);
    }

    // function to cancel the order --- Pavani on 15-06-2015 --- to change
    function cancelOrder() {
        $order_no = $this->input->post("order_num");
        $dbapi = $this->load->module("db_api");
        $cancellation_date = date("Y-m-d H:i:s");
        $orders_arry = $this->getOrderDetails($order_no);
        //var_dump($orders_arry);
        $s_userid = $this->get_UserId();
        $i_res = 0;
        foreach ($orders_arry as $orders) {
            $store_aid = $orders_arry[0]["store_id_fk"];
            $a_fields = array("store_id_fk" => $orders_arry[0]["store_id_fk"], "payer_email" => $orders_arry[0]["payer_email"], "total_amount_str" => $orders_arry[0]["total_amount_str"], "ordered_by" => $s_userid, "order_num" => $orders_arry[0]["order_num"], "product_id_str" => $orders_arry[0]["product_id_str"], "quantity_str" => $orders_arry[0]["quantity_str"], "transaction_id" => $orders_arry[0]["transaction_id"], "ordered_on" => $orders_arry[0]["order_date"], "order_cancel_date" => $cancellation_date);
            foreach($a_fields as $key => $val) {
                $a_fields[$key] = $this->test_input($a_fields[$key]);
            }
            $ins_res = $dbapi->insert($a_fields, "os_cancellation");
            if ($ins_res == 1) {
                $quantity = $orders_arry[0]["quantity_str"];
                $prods_uquery = "UPDATE os_products set quantity=quantity+$quantity WHERE product_aid=$orders_arry[0]['product_id_str']";
                $uresult = $dbapi->custom($prods_uquery);
                $i_res++;
            }
        }
        //$a_fields = array("store_id_fk" => $orders_arry[0]["store_id_fk"], "payer_email" => $orders_arry[0]["payer_email"], "total_amount_str" => $orders_arry[0]["total_amount_str"], "ordered_by" => $s_userid, "order_num" => $orders_arry[0]["order_num"], "product_id_str" => $orders_arry[0]["product_id_str"], "quantity_str" => $orders_arry[0]["quantity_str"], "transaction_id" => $orders_arry[0]["transaction_id"], "ordered_on" => $orders_arry[0]["order_date"], "order_cancel_date" => $cancellation_date);
        //$ins_res = $dbapi->insert($a_fields, "os_cancellation");
        $msg = "";
        if ($i_res >= 1) {
            $s_del_where = "order_num='" . $order_no . "'";
            $retdel = $dbapi->delete("os_orders", $s_del_where);
            if ($retdel == 1) {
                $msg = "SUCCESS";
                $this->cancelMail($store_aid, $order_no);
            }
        } else {
            $msg = "ERROR";
        }
        $this->load->module("notification");
        $this->notification->order_cancelation_notifications($a_fields);
        echo $msg;
    }

    // function to send mail to customer and store owner by Pavani on 16-05-2015
    function cancelMail($storeid, $order_no) {
        $dbapi = $this->load->module("db_api");
        $s_where = "store_id_fk=" . $storeid;
        $mresult = $dbapi->select("*", "os_store_settings", $s_where);
        $cancel_status = $mresult[0]["notify_cancel"];
        if ($cancel_status == "Y") {
            /* mail to send store owner and customer */
            $s_cquery = "select cancel.payer_email,cancel.order_num,stores.store_aid,profiles.profile_id,profiles.username,profiles.email from os_cancellation cancel inner join os_all_store stores on cancel.store_id_fk=stores.store_aid inner join iws_profiles profiles on stores.created_by=profiles.profile_id where cancel.order_num='" . $order_no . "';";
            $cresult = $dbapi->custom($s_cquery);
            $order_no = $cresult[0]["order_num"];
            $emailid_to = $cresult[0]["email"];
            $customer_email = $cresult[0]["payer_email"];
            $to_emails = $emailid_to . "," . $customer_email;
            $path = APPPATH . 'libraries/My_PHPMailer.php';
            $mailobj = new My_PHPMailer();
            $subject = "Order cancelled:" . $order_no;
            $mresult = $mailobj->send_mail($to_emails, $subject, "This is the mail to test the mail services");
            /* mail to send store owner and customer */
        }
    }

    //function to get the order details by Pavani on 15-06-2015
    function getOrderDetails($order_id) {
        $dbobj = $this->load->module("db_api");
        $s_where = "order_num='" . $order_id . "'";
        $result = $dbobj->select("*", "os_orders", $s_where);
        return $result;
    }

    //04-05-2015 by venkatesh : this function update the store banner
    function update_store_banner() {
        //print_R($_REQUEST["current_store_banner"]);    //print_R($_FILES);
        $store_id = explode('/', $_REQUEST["STORE_UID"]);
        $store_id = $store_id[count($store_id) - 1];
        $uploaddir = "stores/$store_id/cover/orig/";
        $product_image = basename($_FILES['osdev_store_banner']['name']);
        //list($txt, $ext) = explode(".", $product_image);
        $ext = end(explode(".", $product_image));
        $uid = $this->get_UserId();
        $user_profilepic_name = $store_id . rand(111, 999) . "." . $ext;
        unlink("stores/$store_id/cover/li/" . $_REQUEST["current_store_banner"]);
        unlink("stores/$store_id/cover/mi/" . $_REQUEST["current_store_banner"]);
        shell_exec('chmod -R 777 /data/');
        if (move_uploaded_file($_FILES['osdev_store_banner']['tmp_name'], $uploaddir . $user_profilepic_name)) {
            shell_exec('chmod -R 777 ' . $uploaddir . $user_profilepic_name);
            $this->imageresize->resize($uploaddir . $user_profilepic_name, "stores/$store_id/cover/li/" . $user_profilepic_name, 800, 600);
            $this->imageresize->resize($uploaddir . $user_profilepic_name, "stores/$store_id/cover/mi/" . $user_profilepic_name, 400, 300);
            unlink($uploaddir . $user_profilepic_name);
        }
        $db_obj = $this->load->module("db_api");
        $db_obj->custom("update os_all_store set cover_path= '" . $user_profilepic_name . "' where store_id='$store_id'");
        echo $user_profilepic_name;
    }

    //04-05-2015 by venkatesh : this function update the store logo
    function update_store_logo() {
        //print_R($_REQUEST);//    print_R($_FILES);die();
        $store_id = explode('/', $_REQUEST["STORE_UID"]);
        $store_id = $store_id[count($store_id) - 1];
        $uploaddir = "stores/$store_id/logo/orig/";
        $product_image = basename($_FILES['store_logo_update']['name']);
        //list($txt, $ext) = explode(".", $product_image);
        $ext = end(explode(".", $product_image));
        $uid = $this->get_UserId();
        $user_profilepic_name = $store_id . rand(111, 999) . "." . $ext;
        unlink("stores/$store_id/logo/li/" . $_REQUEST["current_store_logo"]);
        unlink("stores/$store_id/logo/mi/" . $_REQUEST["current_store_logo"]);
        unlink("stores/$store_id/logo/si/" . $_REQUEST["current_store_logo"]);
        shell_exec('chmod -R 777 /data/');
        if (move_uploaded_file($_FILES['store_logo_update']['tmp_name'], $uploaddir . $user_profilepic_name)) {
            shell_exec('chmod -R 777 ' . $uploaddir . $user_profilepic_name);
            $this->imageresize->resize($uploaddir . $user_profilepic_name, "stores/$store_id/logo/li/" . $user_profilepic_name, 130, 150);
            $this->imageresize->resize($uploaddir . $user_profilepic_name, "stores/$store_id/logo/mi/" . $user_profilepic_name, 70, 90);
            $this->imageresize->resize($uploaddir . $user_profilepic_name, "stores/$store_id/logo/si/" . $user_profilepic_name, 35, 35);
            unlink($uploaddir . $user_profilepic_name);
        }
        $db_obj = $this->load->module("db_api");
        $db_obj->custom("update os_all_store set logo_path= '" . $user_profilepic_name . "' where store_id='$store_id'");
        echo $user_profilepic_name;
    }

    /* To get the store details based on the store unique id by Pavani on 05-06-2015 */

    function getStoreDetails($id) {
        $dbapi = $this->load->module("db_api");
        $s_where = "store_id='$id'";
        $result = $dbapi->select("*", "os_all_store", $s_where);
        $store_aid = $result[0]["store_aid"];
        return $store_aid;
    }

    // function to display the cancellation list by Pavani on 23062015
    function getCancellationList($store_uid) {
        $cancel_date = $this->input->post("cancellation_date");
        $order_date = $this->input->post("order_dt");
        $order_no = $this->input->post("order_no");
        $dbobj = $this->load->module("db_api");
        $a_store_result = $this->getStoreDetails($store_uid);
        $store_aid = $a_store_result[0]["store_aid"];
        $s_query = "SELECT * FROM os_cancellation WHERE store_id_fk=" . $store_aid;
        if ($order_date != "") {
            $order_dt = date("Y-m-d", strtotime($order_date));
            $s_query.=" AND DATE(ordered_on)='" . $order_dt . "'";
        }
        if ($cancel_date != "") {
            $cancel_dt = date("Y-m-d", strtotime($cancel_date));
            $s_query.=" AND DATE(order_cancel_date)='" . $cancel_dt . "'";
        }
        if ($order_no != "") {
            $s_query.=" AND order_num='" . $order_no . "'";
        }
        $s_query.=" GROUP BY order_num";
        //echo $s_query;
        $result = $dbobj->custom($s_query);
        $i = 0;
        foreach ($result as $rows) {
            $order_no = $rows["order_num"];
            $products = $this->getCancelProducts($order_no);
            $result[$i]["prod_names"] = $products;
            $i++;
        }
        //var_dump($result);
        $data["cancellations"] = $result;
        $this->load->view("orders/cancel_orders", $data);
    }

    // function to get the list of products from cancellation based on the order number  by Pavani on 23062015
    function getCancelProducts($order_id) {
        $dbapi = $this->load->module("db_api");
        $s_query = "SELECT * FROM os_cancellation cancel INNER JOIN os_products prods ON cancel.product_id_str=prods.product_aid WHERE cancel.order_num='" . $order_id . "'";
        $orders_res = $dbapi->custom($s_query);
        $s_ret_prods = "";
        $s_ret_prods_name = "";
        $s_ret_prods_amount = "";
        $s_ret_prods_qty = "";
        $j = 0;
        foreach ($orders_res as $rows) {
            $img_url = explode(",", $rows["image_path"]);
            if ($s_ret_prods == "") {
                $s_ret_prods_name = $s_ret_prods_name . $rows["name"] . ":" . $img_url[0];
                $s_ret_prods_amount = $s_ret_prods_amount . $rows["total_amount_str"];
                $s_ret_prods_qty = $s_ret_prods_qty . $rows["quantity_str"];
            } else {
                $s_ret_prods_name = $s_ret_prods_name . "~" . $rows["name"] . ":" . $img_url[0];
                $s_ret_prods_amount = $s_ret_prods_amount . "~" . $rows["total_amount_str"];
                $s_ret_prods_qty = $s_ret_prods_qty . "~" . $rows["quantity_str"];
            }
            $s_ret_prods = $s_ret_prods_name . "|" . $s_ret_prods_amount . "|" . $s_ret_prods_qty;
            $j++;
        }
        return $s_ret_prods;
    }

    //To update status of order by ramadevi 18 june2015.  
    function updateStatusOrder() {
        $templates_obj = $this->load->module("templates");
        $products_obj = $this->load->module("products");
        $rlt = $templates_obj->store_manager_return($products_obj->store_id_return());
        $rlt[0]["order_manager_emails"] = str_replace("~", "R", $rlt[0]["order_manager_emails"]);
        $rlt[0]["order_manager_emails"] = str_replace("RR", "R,R", $rlt[0]["order_manager_emails"]);

        if (preg_match("/\bR" . $_SESSION['user_id'] . "R\b/i", $rlt[0]["order_manager_emails"]) || $_SESSION['store_owner_id'] == $_SESSION['user_id']) {

            $db_obj = $this->load->module('db_api');
            $order_number = $_REQUEST['order_id'];
            $order_status = trim($_REQUEST['status_change']);
            $current_datetime = date("Y-m-d H:i:s");
            $a_data = array("status" => $order_status);
            foreach ($a_data as $key => $val) {
                $a_data[$key] = $this->test_input($a_data[$key]);
            }
            if ($order_status == "Delivered") {
                $r = 0;
                $order_result = $this->getOrderDetails($order_number);
                foreach ($order_result as $res) {
                    $a_fields = array("order_no" => $order_result[0]["order_num"], "ordered_by" => $order_result[0]["ordered_by"], "store_id_fk" => $order_result[0]["store_id_fk"], "payer_email" => $order_result[0]["payer_email"], "product_id_str" => $order_result[0]["product_id_str"], "quantity_str" => $order_result[0]["quantity_str"], "transaction_id" => $order_result[0]["transaction_id"], "amount" => $order_result[0]["total_amount_str"], "ordered_on" => $order_result[0]["order_date"], "delivered_on" => $current_datetime);
                    foreach($a_fields as $key => $val) {
                        $a_fields[$key] = $this->test_input($a_fields[$key]);
                    }
                    $result = $db_obj->insert($a_fields, "os_sales");
                    $r++;
                }
                $s_where = "order_num='" . $order_number . "'";
                $this->db_api->delete("os_orders", $s_where);
                $chn_ord_dtl["order_id"] = $_REQUEST["order_id"];
                $chn_ord_dtl["status_change"] = $order_status;
                $this->load->module("notification");
                $this->notification->order_change_delivered_notification($chn_ord_dtl);
            } elseif ($order_status == "Cancel") {
                $r = 0;
                $order_res = $this->getOrderDetails($order_number);
                foreach ($order_res as $res) {
                    $a_fields = array("order_num" => $order_res[0]["order_num"], "ordered_by" => $order_res[0]["ordered_by"], "store_id_fk" => $order_res[0]["store_id_fk"], "payer_email" => $order_res[0]["payer_email"], "product_id_str" => $order_res[0]["product_id_str"], "quantity_str" => $order_res[0]["quantity_str"], "transaction_id" => $order_res[0]["transaction_id"], "total_amount_str" => $order_res[0]["total_amount_str"], "ordered_on" => $order_res[0]["order_date"], "order_cancel_date" => $current_datetime);
                    foreach($a_fields as $key => $val) {
                        $a_fields[$key] = $this->test_input($a_fields[$key]);
                    }
                    $cresult = $db_obj->insert($a_fields, "os_cancellation");
                    $r++;
                }
                //var_dump($a_fields);
                $s_where = "order_num='" . $order_number . "'";
                $this->db_api->delete("os_orders", $s_where);
                $chn_ord_dtl["order_id"] = $_REQUEST["order_id"];
                $chn_ord_dtl["status_change"] = $order_status;
                $this->load->module("notification");
                $this->notification->order_change_notification($chn_ord_dtl);
            } else {
                $s_where = "order_num ='" . $order_number . "'";
                $result = $db_obj->update($a_data, "os_orders", $s_where);
                $chn_ord_dtl["order_id"] = $_REQUEST["order_id"];
                $chn_ord_dtl["status_change"] = $order_status;
                $this->load->module("notification");
                $this->notification->order_change_notification($chn_ord_dtl);
                $r++;
            }
            echo $r;
        } else {
            echo "505";
            unset($_SESSION["store_owner_id"]);
        }
        die();
    }

    //20-june-2015 by venkatesh : this function insert the product id into user's wish list    
    function addtowishlist() {
        $db_obj = $this->load->module("db_api");
        $product_aid = $_REQUEST["product_aid"];
        $user_id = $this->get_UserId();
        $wlist_res = $db_obj->select("count(*) as cnt", "oshop_saved_products", "profile_id=" . $user_id . " and product_id_fk=" . $product_aid);
        $exists = "yes";
        //print_r($wlist_res);
        //echo $wlist_res[0]["cnt"];
        if ($wlist_res[0]["cnt"] == 0) {
            $a_fields = array("product_id_fk" => $product_aid, "profile_id" => $user_id);
            $chrono_fields = array("productid" => $product_aid, "chrono_type" => "3", "userid" => $user_id);
            foreach($chrono_fields as $key => $val) {
                $chrono_fields[$key] = $this->test_input($chrono_fields[$key]);
            }
            $db_obj->insert($chrono_fields, "chronoline_order");
            foreach($a_fields as $key => $val) {
                $a_fields[$key] = $this->test_input($a_fields[$key]);
            }
            $ins_res = $db_obj->insert($a_fields, "oshop_saved_products");
            /* notification for wishlist */
            // $this->load->module("notification");
            // $this->notification->wishlist_notification($product_aid);
            /* notification for wishlist */
            $exists = "no";
        }
        echo $exists;
    }

    function mystore_orders_cancellation_search() {
        $this->load->view("orders/mystore_cancellation_search");
    }

    public function order_view() {
        //print_r($_REQUEST);       
        if (!$_REQUEST["order_id"]) {
            redirect(base_url());
        }
        //$product_id = base64_decode(base64_decode($_REQUEST["product_id"]));
        $user_id=$this->get_UserId();
        $order_id = base64_decode(base64_decode($_REQUEST["order_id"]));
        $db_obj = $this->load->module("db_api");

        $orders_res = $db_obj->custom("select * from oshop_orders where order_code ='" . $order_id . "'");
        $order_store = $db_obj->custom("select store_name from oshop_stores where store_aid ='". $orders_res[0]["store_id_fk"]."'");
         $order_tax = $db_obj->custom("select tax_perc from oshop_tax_details tax inner join oshop_products prod on tax.tax_product_id = prod.product_aid where tax_store_id ='". $orders_res[0]["store_id_fk"]."' ");
        if($orders_res[0]["order_code"]!==$order_id || $orders_res[0]["ordered_by"]!=$user_id){
          redirect(base_url());
        }
        $data["order_stores"] = $order_store;
        $data["order_tax"] = $order_tax;
        $data["order_details"] = $orders_res;
        $data["orderitems"] = $this->getOrderItems($orders_res[0]['order_aid']);
        $data["user_details"] = $this->getUserDetails($orders_res[0]['ordered_by']);
        $this->load->view("orders/order_view", $data);
    }

    public function getOrderItems($orderid) {
        $db_obj = $this->load->module("db_api");
        $items_sql = "select (SELECT COUNT(*) AS cnt FROM oshop_cancellation WHERE product_id_fk=prod.product_aid) AS status,prod.product_aid,prod.product_name,prod.product_code,stores.store_code,ord.quantity,ord.price,stores.currency,iws.symbol from oshop_order_items ord inner join oshop_products prod on ord.product_id_fk = prod.product_aid inner join oshop_stores stores on prod.store_id_fk=stores.store_aid inner join iws_currencies as iws on iws.sc = stores.currency where ord.order_id_fk ='" . $orderid . "'";
        $oitems_res = $db_obj->custom($items_sql);

        return $oitems_res;
    }

    public function getUserDetails($userid) {
        $db_obj = $this->load->module("db_api");
        //$users_sql = "select * from iws_profiles where profile_id='" . $userid . "'";
        $users_sql="SELECT person_name,mobile_number,address_line,zipcode,(SELECT city_name FROM global_cities_info WHERE city_id=addr.city) AS city_name,(SELECT state_name FROM global_states_info WHERE state_id=addr.state) AS state_name,(SELECT country_name FROM iws_countries_info WHERE country_id=addr.country) AS country_name FROM ois_pickup_address addr INNER JOIN os_user_details users ON addr.saved_by=users.profile_id_fk WHERE saved_by=".$userid." ORDER BY saved_on DESC LIMIT 1";
        $user_res = $db_obj->custom($users_sql);

        return $user_res;
    }

    public function getCity($cityid) {
        $db_obj = $this->load->module("db_api");
        $city_sql = "select city.city_name,state.state_name,con.country_name from global_cities_info city inner join global_states_info state on city.state_id = state.state_id inner join iws_countries_info con on con.country_code = state.country_code where city.city_id='" . $cityid . "'";
        $city_res = $db_obj->custom($city_sql);
        return $city_res[0];
    }
    // function to cancel the order by user
    public function user_order_cancel(){
        $order_aid=$this->input->post("order_aid");
        $product_aid=$this->input->post("product_aid");
        $db_api=$this->load->module("db_api");
        $query="SELECT product_name,product_aid,sale_price,order_id_fk FROM oshop_order_items oitems INNER JOIN oshop_products prods ON oitems.product_id_fk=prods.product_aid WHERE order_id_fk=".$order_aid." AND product_id_fk=".$product_aid;
        $order_details=$db_api->custom($query);
        $a_fields=array("order_id_fk"=>$order_details[0]["order_id_fk"],"product_id_fk"=>$order_details[0]["product_aid"],"refund_amount_to_customer"=>$order_details[0]["sale_price"]);
        foreach($a_fields as $key => $val) {
            $a_fields[$key] = $this->test_input($a_fields[$key]);
        }
        $ins_result=$db_api->insert($a_fields,"oshop_cancellation");
        if($ins_result==1){
          $res_code="OININSSUCCESS";
        }
        else{
          $res_code="OININSERROR";
        }
        // notification
        /*if($ins_result==1){
            $this->load->module("notification");
            $this->notification->all_notification("USER_ORDER_CANCEL",$order_details[0]["product_aid"],$order_details[0]["order_id_fk"],"","");
        }*/
        echo $res_code;
    }
    // function to strip tags
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        $data = str_replace("'","&#39",$data);
        return $data;
    }
    // function to display the order detailed view page by Pavani on 29-03-2016
    function orderDetailedView(){
        //$order_code='OSVAP155864879819819';
        $order_code=$_REQUEST["order_code"];
        $dbapi=$this->load->module("db_api");
        $order_result=$dbapi->select("order_aid,time,status","oshop_orders","order_code='".$order_code."'");
        $data["order_details"]=$order_result;
        $this->load->view("orders/order_detail_view",$data);
    }
    // function for order detailed view page template
    function orderDetailedTpl(){        
        $dbapi=$this->load->module("db_api");
        $order_id=$_REQUEST["order_id"];
        $query="SELECT product_aid,product_code,product_name,oitems.quantity,price,sale_price,store_code,primary_image FROM oshop_order_items oitems inner join oshop_products prods ON oitems.product_id_fk=prods.product_aid LEFT JOIN oshop_stores stores ON prods.store_id_fk=stores.store_aid WHERE oitems.order_id_fk=".$order_id." AND oitems.product_id_fk NOT IN (select product_id_fk FROM oshop_cancellation where order_id_fk=".$order_id.")";
        $order_res=$dbapi->custom($query);
        $data["order_data"]=$order_res;
        $this->load->view("orders/order_detailed_tpl",$data);
    }
    // function to cancel the order on 29-03-2016
    /*function orderCancel(){
        $dbapi=$this->load->module("db_api");
        $order_id=$this->input->post("order_id");
        $product_id=$this->input->post("product_id");
        $query="SELECT price FROM oshop_order_items WHERE order_id_fk=".$order_id." AND product_id_fk=".$product_id;
        $order_res=$dbapi->custom($query);
        $order_a_fields=array("order_id_fk"=>$order_id,"product_id_fk"=>$product_id,"refund_amount_to_customer"=>$order_res[0]["price"],"refund_status"=>"WAITING");
        $cancel_res=$dbapi->insert($order_a_fields,"oshop_cancellation");
        echo $cancel_res;
    }*/
}
