<?php
/**************************************************************
 * Class : mycart
 * Description : Displays the cart items list
 * Author : Pavani
***************************************************************/
if (!defined('BASEPATH'))   exit('No direct script access allowed');

class mycart extends CI_Controller {
    function __construct() {
        parent::__construct();
        /* session and cookies check */
        $this->load->library('paypal_lib'); 
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
    function myCartView1(){
        $db_api=$this->load->module("db_api");
        $user_id=$this->get_UserId();
        $mode=(isset($_REQUEST["mode"]))?$_REQUEST["mode"]:"cart";
        if($mode=="buy"){
            $cart_aid=$_REQUEST["cart_id"];
            $query="SELECT stores.store_aid,store_name,profile_image_path,store_code FROM oshop_cart_items cart INNER JOIN oshop_stores stores ON cart.store_id_fk=stores.store_aid WHERE profile_id=".$user_id." AND cart_aid=".$cart_aid." GROUP BY store_id_fk";
            $data["cart_id"]=$cart_aid;
        }else{
            $query="SELECT stores.store_aid,store_name,profile_image_path,store_code FROM oshop_cart_items cart INNER JOIN oshop_stores stores ON cart.store_id_fk=stores.store_aid WHERE profile_id=".$user_id." GROUP BY store_id_fk";
        }
        $store_details=$db_api->custom($query);
        $address_result=$db_api->custom("SELECT mobile_number,person_name,zipcode,address_line,city_name,state_name,country_name,countries.country_id,states.state_id,cities.city_id FROM `ois_pickup_address` address INNER JOIN iws_countries_info countries ON address.country=countries.country_id INNER JOIN global_states_info states ON address.state=states.state_id INNER JOIN global_cities_info cities ON address.city=cities.city_id WHERE saved_by=".$user_id);
        $data["address_details"]=$address_result;
        $data["store_details"]=$store_details;
        $data["mode"]=$mode;
        $this->load->view("mycart/cart_view",$data);
    }
    function myCartView(){
      $this->load->view("mycart/cart_view");
    }
    function cartViewTpl(){
      $db_api=$this->load->module("db_api");
      $user_id=$this->get_UserId();
//Edited By mitesh => query ;
      $cartcount="SELECT store_name,store_aid,store_code,profile_image_path,currency,iws.symbol,cart.product_id_fk FROM oshop_stores stores INNER JOIN oshop_cart_items cart ON stores.store_aid=cart.store_id_fk INNER JOIN iws_currencies iws ON stores.currency=iws.sc WHERE profile_id=". $user_id ." GROUP BY stores.currency";
      $cc_result=$db_api->custom($cartcount);
      $cart_query="SELECT store_name,store_aid,store_code,profile_image_path,currency,iws.symbol,cart.product_id_fk FROM oshop_stores stores INNER JOIN oshop_cart_items cart ON stores.store_aid=cart.store_id_fk INNER JOIN iws_currencies iws ON stores.currency=iws.sc WHERE profile_id=". $user_id ." GROUP BY cart.store_id_fk";
      $cart_result=$db_api->custom($cart_query);
      $cart_arry=[];
      if($cart_result!=0){

        foreach($cart_result as $key=>$val){
          $cart_arry[$cart_result[$key]["store_aid"]]=$val;
        }

        foreach($cart_arry as $key=>$val){
          $query="SELECT product_aid,product_name,primary_image,sale_price,cost_price,discount,product_code,shipping,handling FROM oshop_products prods INNER JOIN oshop_cart_items cart ON prods.product_aid=cart.product_id_fk WHERE cart.store_id_fk=".$key." AND profile_id=".$user_id;
          $result=$db_api->custom($query);
          $cart_arry[$key]["products"]=$result;
        }

        foreach($cart_arry as $key=>$val){
         $query="SELECT tax_name,tax_perc FROM oshop_tax_details tax INNER JOIN oshop_stores os ON os.store_aid=tax.tax_store_id INNER JOIN oshop_products prods ON prods.product_aid=tax.tax_product_id WHERE tax.tax_store_id=".$key;
          $result=$db_api->custom($query);
          $cart_arry[$key]["tax"]=$result; 
        }
      }
      else{
        $cart_arry=0;
        // $cart_parry=0;
      }
      $data["cart_details"]=$cart_arry;
      $data["cart_count"]=$cc_result;
      $this->load->view("mycart/cart_view_tpl",$data);
    }
    function cartViewTpl1($store_id,$mode="cart",$cart_id=""){
        $db_api=$this->load->module("db_api");
        $user_id=$this->get_UserId();
        $store_details=$this->load->module("stores");
        $result=$store_details->getStoreDtlsByStoreId($store_id);
        if($mode=="buy"){
            $query="SELECT product_code,product_name,product_aid,prods.primary_image,sale_price FROM oshop_cart_items cart INNER JOIN oshop_products prods ON cart.product_id_fk=prods.product_aid WHERE cart.cart_aid=".$cart_id." and profile_id=".$user_id;
        }else{
            $query="SELECT product_code,product_name,product_aid,prods.primary_image,sale_price FROM oshop_cart_items cart INNER JOIN oshop_products prods ON cart.product_id_fk=prods.product_aid WHERE cart.store_id_fk=".$store_id." and profile_id=".$user_id;
        }
        $prod_details=$db_api->custom($query);
        $data["cart_details"]=$prod_details;
        $data["store_details"]=$result;
        $this->load->view("mycart/cart_view_tpl",$data);
    }
    function getCountriesList(){
        $db_api=$this->load->module("db_api");
        $countries_result=$db_api->select("country_code,country_id,country_name","iws_countries_info","");
        return $countries_result;
    }
    function getCountriesListStr(){
        $db_api=$this->load->module("db_api");
        $countries_result=$db_api->select("country_code,country_id,country_name","iws_countries_info","");
        $countries_arry=$countries_result;
        $countries_str="";
        foreach($countries_arry as $clist){
            if($countries_str==""){
                $countries_str.=$clist["country_id"]."-".$clist["country_name"];
            }else{
                $countries_str.="~".$clist["country_id"]."-".$clist["country_name"];
            }
        }
        echo $countries_str;
    }
    function getStatesList(){
        $country_id=$this->input->post("country_id");
        $db_api=$this->load->module("db_api");
        $states_result=$db_api->select("state_id,state_name","global_states_info","country_id=".$country_id);
        $states_str="";
        foreach($states_result as $slist){
            if($states_str==""){
                $states_str=$slist["state_id"]."-".$slist["state_name"];
            }else{
                $states_str.="~".$slist["state_id"]."-".$slist["state_name"];
            }
        }
        echo $states_str;
    }
    function getCitiesList(){
        $state_id=$this->input->post("state_id");
        $db_api=$this->load->module("db_api");
        $cities_result=$db_api->select("city_id,city_name","global_cities_info","state_id=".$state_id);
        $cities_str="";
        foreach($cities_result as $clist){
            if($cities_str==""){
                $cities_str=$clist["city_id"]."-".$clist["city_name"];
            }else{
                $cities_str.="~".$clist["city_id"]."-".$clist["city_name"];
            }
        }
        echo $cities_str;
    }
    function shippingAddress(){
      $person_name=$this->input->post("person_name");
      $address=$this->input->post("address");
      $mobile=$this->input->post("mobile_no");
      $alt_mobile=($this->input->post("alt_mobile_no")!="")?$this->input->post("alt_mobile_no"):0;
      $zipcode=$this->input->post("zipcode");
      $del_option=$this->input->post("doption");
      $state_id=$this->input->post("state_id");
      $city_id=$this->input->post("city_id");
      $country_id=$this->input->post("country_id");
      $dbapi=$this->load->module("db_api");
      $user_id=$this->get_UserId();
      $user_details=$dbapi->select("profile_id,username","iws_profiles","profile_id=".$user_id);
      $address_details=$dbapi->custom("SELECT COUNT(*) AS cnt FROM ois_pickup_address WHERE saved_by=".$this->get_UserId());
      if($address_details[0]["cnt"]==0){
        $a_fields=array("saved_by"=>$user_details[0]["profile_id"],"person_name"=>$person_name,"mobile_number"=>$mobile,"alternate_contact"=>$alt_mobile,"address_line"=>$address,"zipcode"=>$zipcode,"city"=>$city_id,"state"=>$state_id,"country"=>$country_id,"del_type"=>$del_option);
        foreach($a_fields as $key => $val) {
            $a_fields[$key] = $this->test_input($a_fields[$key]);
        }
        $result=$dbapi->insert($a_fields,"ois_pickup_address");
      }
      else{
        $a_fields=array("saved_by"=>$user_id,"person_name"=>$person_name,"mobile_number"=>$mobile,"alternate_contact"=>$alt_mobile,"address_line"=>$address,"zipcode"=>$zipcode,"city"=>$city_id,"state"=>$state_id,"country"=>$country_id,"del_type"=>$del_option);
        foreach($a_fields as $key => $val) {
            $a_fields[$key] = $this->test_input($a_fields[$key]);
        }
        $result=$dbapi->update($a_fields,"ois_pickup_address","saved_by=".$this->get_UserId());
      }
      echo $result;
    }
//Edited By Mitesh => add curr value for get total price with currency symbol in paybook
    function paybookPopup(){
        $user_id=$this->get_UserId();
        $total_price=$this->input->post("total_price");
        $store_id=$this->input->post("store_id");
        $curr=$this->input->post("curr");
        $ship=$this->input->post("ship");
        $handle=$this->input->post("handle");
        //$product_ids=$this->input->post("product_ids");
        $checkout_str=$this->input->post("chkout_str");
        $mode=($this->input->post("mode")!="")?"buy":"cart";
        $dbapi=$this->load->module("db_api");
        $curr_result=$dbapi->select("currency","oshop_stores","store_aid=".$store_id);
        $paybook_result=$dbapi->custom("SELECT * FROM pb_cards WHERE user_id_fk='".$user_id."' ORDER BY added_on DESC");
        $data["total_price"]=$total_price;
        $data["curr"]=$curr;
        $data["ship"]=$ship;
        $data["handle"]=$handle;
        $data["store_id"]=$store_id;
        $data["checkout_str"]=$checkout_str;
        $data["paybook_result"]=$paybook_result;
        $data["curr_result"]=$curr_result;
        $data["mode"]=$mode;
        $this->load->view("mycart/paybookPopup",$data);
    }

    function paybookFull(){
        $user_id=$this->get_UserId();
        $total_price=$this->input->post("total_price");
        $curr=$this->input->post("curr");
        $mode=($this->input->post("mode")!="")?"buy":"cart";
        $full=($this->input->post("full"));
        $dbapi=$this->load->module("db_api");
        $paybook_result=$dbapi->select("*","pb_cards","user_id_fk=".$user_id);
        $data["total_price"]=$total_price;
        $data["curr"]=$curr;
        $data["paybook_result"]=$paybook_result;
        $data["mode"]=$mode;
        $data["full"]=$full;
        $this->load->view("mycart/paybookPopup",$data);
    }

    // function paybookOspackage(){
    //     $dbapi=$this->load->module("db_api");
    //     $user_id=$this->get_UserId();
    //     $ptype=$this->uri->segment(2);
    //     $packagedata_res = $this->db_api->select("package_id , price", "oshop_packages", "package_id=" . $ptype);
    //     if($packagedata_res != ""){
    //         $package_price=$packagedata_res[0]["price"];
    //         $paybook_result=$dbapi->select("*","pb_cards","user_id_fk=".$user_id);
    //         $data["total_price"]=$package_price;
    //         $data["curr"]='$';
    //         $data["paybook_result"]=$paybook_result;
    //         $data["package"]=$paybook_result;
    //     }        
    //     $this->load->view("mycart/paybookPopup",$data);
    // }

    function cardsdata(){
      $user_id=$this->get_UserId();
      $dbapi=$this->load->module("db_api");
      $data['paybook_result']=$dbapi->select("*","pb_cards","user_id_fk=".$user_id);
      $this->load->view("mycart/card_data",$data);
    }

    function makePayment1(){
        $userid=$this->get_UserId();
        $dbapi=$this->load->module("db_api");
        $stores=$this->load->module("stores");
        $stores_details=$stores->getStoreDtlsByStoreId($store_id);
        $card_id=$this->input->post("card_id");
        $to_account=$stores_details[0]["default_card"];
        $receiver_id=$stores_details[0]["created_by"];
        $cartdetailquery = "SELECT * FROM oshop_cart_items WHERE profile_id='$userid'";
        $cartdetail=$dbapi->custom($cartdetailquery);
        for($c=0;$c<sizeof($cartdetail);$c++)
        {
            $cart=$cartdetail[$c];
            $store_id=$cart['store_id_fk'];
            $pcrt_detail_id="SELECT * FROM oshop_products WHERE product_aid='".$cart['product_id_fk']."'";
            $pcrt_detail=$dbapi->custom($pcrt_detail_id);
            for($pc=0;$pc<sizeof($pcrt_detail);$pc++){
                $p_cart=$pcrt_detail[$pc];
                if($p_cart['discount']!=0){
                   $p_amt = $p_cart['sale_price'];
                   $p_ship = $p_cart['shipping'];
                   $p_handle = $p_cart['handling'];
                   $oneidnet_charge=+($p_amt*5/100);
                   $tprice+=$p_amt + +$p_ship + +$p_handle + +$oneidnet_charge;
                   $price+=$p_amt + +$p_ship + +$p_handle;
                }
                else
                {
                   $p_amt = $p_cart['cost_price'];
                   $p_ship = $p_cart['shipping'];
                   $p_handle = $p_cart['handling'];
                   $oneidnet_charge=+($p_amt*5/100);
                   $tprice+=$p_amt + +$p_ship + +$p_handle + +$oneidnet_charge;
                   $price+=$p_amt + +$p_ship + +$p_handle;
                }

                $checkout_str.=$p_amt."-".$p_cart['product_aid']."-"."1"."~";
                $chkout_str=rtrim($checkout_str, "~");

                $a_fields=array("amount"=>$tprice,"from_account"=>$card_id,"to_account"=>'4',"status"=>"SUCCESSFUL","sender_id_fk"=>$userid,"payment_type"=>"OUTBOUND","module"=>"ONESHOP","entity_type"=>"ONESHOP_STORE_OWNER","receiver_id_fk"=>$receiver_id);

                foreach ($a_fields as $key => $val) {
                    $a_fields[$key] = $this->test_input($a_fields[$key]);
                }

                $ins_result=$dbapi->insert($a_fields,"pb_transactions");
                $inserted_id=mysql_insert_id();
                $txn_id="TXN1000".$inserted_id;
                $orders_items_ins_cnt=0;
                $result="";
                if($ins_result==1){
                    $a_fields=array("store_id_fk"=>$store_id,"transaction_id_fk"=>$inserted_id,"total_amount"=>$price,"order_shipping"=>$p_ship,"order_handling"=>$p_handle,"ordered_by"=>$userid,"order_status"=>'0');
                    foreach ($a_fields as $key => $val) {
                        $a_fields[$key] = $this->test_input($a_fields[$key]);
                    }
                    $orders_ins=$dbapi->insert($a_fields,"oshop_orders");
                    $order_inserted_id=mysql_insert_id();
                    $oquery="SELECT order_code FROM oshop_orders WHERE order_aid=".$order_inserted_id;
                    $order_result=$dbapi->custom($oquery);
                    $order_code=$order_result[0]["order_code"];
                    //$order_code="OSVAP".$order_inserted_id;
                    if(strpos("~",$chkout_str)!==true){
                        $checkout_arry=explode("~",$chkout_str);
                        for($p=0;$p<count($checkout_arry);$p++){
                            $chk_item=$checkout_arry[$p];
                            $checkout_arry[$p]=explode("-",$chk_item);
                            $order_items_fields=array("order_id_fk"=>$order_inserted_id,"product_id_fk"=>$checkout_arry[$p][1],"quantity"=>$checkout_arry[$p][2],"price"=>$checkout_arry[$p][0]);
                            foreach ($order_items_fields as $key => $val) {
                                $order_items_fields[$key] = $this->test_input($order_items_fields[$key]);
                                
                            }
                            $o_result=$dbapi->insert($order_items_fields,"oshop_order_items");
                            if($o_result==1){
                                $orders_items_ins_cnt++;
                                $dbapi->delete("oshop_cart_items","product_id_fk=".$checkout_arry[$p][1]);
                                $notify_obj=$this->load->module("notification");
                                $notify_obj->all_notification("BUY",$checkout_arry[1],"","","");
                            }
                        }
                    }else{
                      $checkout_arry[$p]=explode("-", $chkout_str);
                        $order_items_fields=array("order_id_fk"=>$order_inserted_id,"product_id_fk"=>$checkout_arry[$p][1],"quantity"=>$checkout_arry[$p][2],"price"=>$checkout_arry[$p][0]);
                        foreach ($order_items_fields as $key => $val) {
                            $order_items_fields[$key] = $this->test_input($order_items_fields[$key]);
                        }
                        $o_result=$dbapi->insert($order_items_fields,"oshop_order_items");
                        if($o_result==1){
                            $orders_items_ins_cnt++;
                            $dbapi->delete("oshop_cart_items","product_id_fk=".$checkout_arry[$p][1]);
                        }
                        $notify_obj=$this->load->module("notification");
                        $notify_obj->all_notification("BUY",$checkout_arry[1],"","","");;
                    }
                    echo "YES-".$store_id."-".$txn_id."-".base64_encode(base64_encode($order_code));
                }else{
                    echo "NO";
                }
            }
            
        }
        
    }

     function buy(){ 
        $db_api=$this->load->module("db_api");
        $user_id=$this->get_UserId();
        // echo var_dump($_REQUEST["pid"]);
        if($_REQUEST["cs"]){

            $chkout_str=rtrim($_REQUEST["cs"], "~");
            $data["product"]=$chkout_str;
            // $data["price"]=$_REQUEST["price"];
            $data["storeid"]=$_REQUEST["store"];
            // $data["qnty"]=$_REQUEST["qnty"];
            // $data["curr"]=$_REQUEST["curr"];
            $proid="SELECT created_by FROM oshop_stores WHERE store_aid='".$_REQUEST["store"]."'";
            $proid_result=$db_api->custom($proid);
            $sacc_id="SELECT s_account FROM iws_profiles WHERE profile_id='".$proid_result[0]['created_by']."'";
            $sacc_result=$db_api->custom($sacc_id);
            $data["sacc"]=$sacc_result; 
        }
        $this->load->view('mycart/stripe_checkout',$data);
        // $dbapi=$this->load->module("db_api");

        // // Set variables for paypal form 
        // $returnURL = base_url().'paypal/success'; //payment success url 
        // $cancelURL = base_url().'paypal/cancel'; //payment cancel url 
        // $notifyURL = base_url().'paypal/ipn'; //ipn url 
         
        // // Get product data from the database 
        // $product = $dbapi->custom("SELECT * FROM oshop_products WHERE product_aid='" . $id . "'");
        // $currency = $dbapi->custom("SELECT currency FROM oshop_stores WHERE store_aid='" . $store . "'");

        // // Get current user ID from the session (optional) 
        // // $userID = !empty($_SESSION['userID'])?$_SESSION['userID']:1; 
        // $userid=$this->get_UserId();
         
        // // Add fields to paypal form 
        // $this->paypal_lib->add_field('return', $returnURL); 
        // $this->paypal_lib->add_field('cancel_return', $cancelURL); 
        // $this->paypal_lib->add_field('notify_url', $notifyURL); 
        // $this->paypal_lib->add_field('item_name', $product[0]['product_name']); 
        // $this->paypal_lib->add_field('custom', $userid); 
        // $this->paypal_lib->add_field('item_number',  $product[0]['product_aid']); 
        // $this->paypal_lib->add_field('amount',  '73.68'); 
        // // $this->paypal_lib->add_field('currency_code',  $currency[0]['currency']);
         
        // // Render paypal form 
        // $this->paypal_lib->paypal_auto_form(); 
    } 

    function makePayment(){
        $userid=$this->get_UserId();
        $price=$this->input->post("amount");
        $ship=$this->input->post("ship_charge");
        $handle=$this->input->post("handle_charge");
        // echo $ship;
        $store_id=$this->input->post("store_id");
        /*$product_ids=$this->input->post("product_ids_str");
        $quantity_str=$this->input->post("quantity_str");
        $price_str=$this->input->post("price_str");*/
        $stores=$this->load->module("stores");
        $stores_details=$stores->getStoreDtlsByStoreId($store_id);
        $dbapi=$this->load->module("db_api");
        $card_id=$this->input->post("card_id");
        $to_account=$stores_details[0]["default_card"];
        $receiver_id=$stores_details[0]["created_by"];
        $checkout_str=$this->input->post("checkout_str");
        $chkout_str=rtrim($checkout_str, "~");
        // $productid=explode("-", $chkout_str);

        //$user_id_str=$userid.",".$stores_details[0]["created_by"];
        //$presult=$dbapi->select("*","pb_cards","user_id_fk=".$stores_details[0]["created_by"]);

        $a_fields=array("amount"=>$price,"from_account"=>$card_id,"to_account"=>'4',"status"=>"SUCCESSFUL","sender_id_fk"=>$userid,"payment_type"=>"OUTBOUND","module"=>"ONESHOP","entity_type"=>"ONESHOP_STORE_OWNER","receiver_id_fk"=>$receiver_id);

        foreach ($a_fields as $key => $val) {
            $a_fields[$key] = $this->test_input($a_fields[$key]);
        }
        $ins_result=$dbapi->insert($a_fields,"pb_transactions");
        $inserted_id=mysql_insert_id();
        $txn_id="TXN1000".$inserted_id;
        $orders_items_ins_cnt=0;
        $result="";
        if($ins_result==1){
            $a_fields=array("store_id_fk"=>$store_id,"transaction_id_fk"=>$inserted_id,"total_amount"=>$price,"order_shipping"=>$ship,"order_handling"=>$handle,"ordered_by"=>$userid,"order_status"=>'0');
            foreach ($a_fields as $key => $val) {
                $a_fields[$key] = $this->test_input($a_fields[$key]);
            }
            $orders_ins=$dbapi->insert($a_fields,"oshop_orders");
            $order_inserted_id=mysql_insert_id();
            $oquery="SELECT order_code FROM oshop_orders WHERE order_aid=".$order_inserted_id;
            $order_result=$dbapi->custom($oquery);
            $order_code=$order_result[0]["order_code"];
            //$order_code="OSVAP".$order_inserted_id;
            if(strpos("~",$chkout_str)!==true){
                $checkout_arry=explode("~",$chkout_str);
                for($p=0;$p<count($checkout_arry);$p++){
                    $chk_item=$checkout_arry[$p];
                    $checkout_arry[$p]=explode("-",$chk_item);
                    $order_items_fields=array("order_id_fk"=>$order_inserted_id,"product_id_fk"=>$checkout_arry[$p][1],"quantity"=>$checkout_arry[$p][2],"price"=>$checkout_arry[$p][0]);
                    foreach ($order_items_fields as $key => $val) {
                        $order_items_fields[$key] = $this->test_input($order_items_fields[$key]);
                        
                    }
                    $o_result=$dbapi->insert($order_items_fields,"oshop_order_items");
                    if($o_result==1){
                        $orders_items_ins_cnt++;
                        $dbapi->delete("oshop_cart_items","product_id_fk=".$checkout_arry[$p][1]);
                        $notify_obj=$this->load->module("notification");
                        $notify_obj->all_notification("BUY",$checkout_arry[1],"","","");
                    }
                }
            }else{
              $checkout_arry=explode("-", $chkout_str);
                $order_items_fields=array("order_id_fk"=>$order_inserted_id,"product_id_fk"=>$checkout_arry[1],"quantity"=>$checkout_arry[2],"price"=>$checkout_arry[0]);
                foreach ($order_items_fields as $key => $val) {
                    $order_items_fields[$key] = $this->test_input($order_items_fields[$key]);
                }
                $o_result=$dbapi->insert($order_items_fields,"oshop_order_items");
                if($o_result==1){
                    $orders_items_ins_cnt++;
                    $dbapi->delete("oshop_cart_items","product_id_fk=".$checkout_arry[$p][1]);
                }
                $notify_obj=$this->load->module("notification");
                $notify_obj->all_notification("BUY",$checkout_arry[1],"","","");;
            }
            echo "YES-".$store_id."-".$txn_id."-".base64_encode(base64_encode($order_code));
        }else{
            echo "NO";
        }
    }

    function myCartList(){
		 $store_code = $_REQUEST['store_code'];
        $userid=$this->get_UserId();
        $dbapi=$this->load->module("db_api");
        $storeQuery="SELECT store_aid FROM oshop_stores WHERE store_code = '".$store_code."'";
        $storeRes = $dbapi->custom($storeQuery);
        $store_aid = $storeRes[0]["store_aid"];
        $query="SELECT prods.product_aid,product_name,primary_image FROM oshop_cart_items cart INNER JOIN oshop_products prods ON cart.product_id_fk=prods.product_aid WHERE cart.profile_id=".$userid." AND cart.store_id_fk = '".$store_aid."'";
        $data['cart_list']=$dbapi->custom($query);
       $this->load->view("mycart/cart",$data);

    }
    // function to delete the items in cart items
    function deleteCartItem(){
        $dbapi=$this->load->module("db_api");
        $product_id=($this->input->post("product_id")!="")?$this->input->post("product_id"):"";
        $store_id=($this->input->post("store_id")!="")?$this->input->post("store_id"):"";
        $cart_result=$dbapi->custom("SELECT COUNT(*) AS cnt FROM oshop_cart_items WHERE profile_id=".$this->get_UserId()." AND store_id_fk=".$store_id);
        $cart_cnt=$cart_result[0]["cnt"];
        if($product_id!=""){
            $where="product_id_fk=".$product_id;
        }else{
            $where="store_id_fk=".$store_id;
        }
        //echo $where;
        $result=$dbapi->delete("oshop_cart_items",$where);
        if($result==1){
          $cart_cnt--;
        }
        echo $result."~".$cart_cnt;
    }
    function deleteCart(){
      $store_id=($this->input->post("store_id")!="")?$this->input->post("store_id"):"";
      $where="";
      $dbapi=$this->load->module("db_api");
      if($store_id!=""){
        $where="profile_id=".$this->get_UserId()." AND store_id_fk=".$store_id;
        $result=$dbapi->delete("oshop_cart_items",$where);
        echo $result;
      }
    }
    // function to get the count of cart items
    function cartCount($store_code){
        $user_id=$this->get_UserId();
        $dbapi=$this->load->module("db_api");
        $cart_query="SELECT COUNT(*) AS cnt FROM oshop_cart_items cart INNER JOIN oshop_stores stores ON cart.store_id_fk=stores.store_aid WHERE stores.store_code='".$store_code."' AND profile_id=".$user_id;
        $result=$dbapi->custom($cart_query);
        return $result[0]["cnt"];
    }
    // function to display the popup for the card details
    function addCardPopup(){
        $this->load->view("mycart/addcard_popup");
    }
    //function to save the card details
    function saveCardDetails(){
//Edited by Mitesh -> save card detail 
        $db_api=$this->load->module("db_api");
        $userid=$this->get_UserId();
        $current_date=date("Y-m-d H:i:s");
        $name_on_card=$this->input->post("name_on_card");
        $card_type=$this->input->post("card_type");
        $cvv_no=$this->input->post("cvv_no");
        $card_name=$this->input->post("card_name");
        $card_no=$this->input->post("card_no");
        $expiry_year=$this->input->post("expiry_year");
        $expiry_month=$this->input->post("expiry_month");
        $card_usage=$this->input->post("card_usage");
        $scope_type=$this->input->post("scope_type");
         $card_a_fields=array("usage_scope"=>$scope_type,"usage_purpose"=>$card_usage,"card_type"=>$card_type,"card_name"=>$card_name,"cvv_number"=>$cvv_no,"card_number"=>$card_no,"name_as_on_card"=>$card_name,"expiry_month"=>$expiry_month,"expiry_year"=>$expiry_year,"user_id_fk"=>$userid,"last_used_on"=>$current_date,"name_as_on_card"=>$name_on_card);
        foreach ($card_a_fields as $key => $val) {
            $card_a_fields[$key] = $this->test_input($card_a_fields[$key]);
        }
 $result_arry=array();
        $status;


		if($this->validations->is_number($card_no)==0){
			$result_arry['card_no']="error";
		 }
		if($this->validations->is_number($cvv_no)==0){

		 		$result_arry['cvv']="error";
		}
        if((strlen($card_type)==0)){
				$result_arry['card_type']="error";
		}
		if($this->validations->is_number($expiry_year)==0){

				$result_arry['expiry_year']="error";
		}

		if($this->validations->is_number($expiry_month)==0){

        		$result_arry['expiry_month']="error";
		}
        if((strlen($card_usage)==0)){
				$result_arry['card_usage']="error";
		}
        if((strlen($scope_type)==0)){
				$result_arry['scope_type']="error";
		}
        if(count($result_arry)!=0){

			  echo $status=json_encode($result_arry);
		}else{
          $card_res=$db_api->insert($card_a_fields,"pb_cards");
          global $connection;
          $last_insert_id=mysql_insert_id($connection);
          $insert_result="";
          if($card_res==1){
            $cdetails_res=$db_api->custom("SELECT * FROM pb_cards WHERE card_id='".$last_insert_id."'");
            $insert_result="SUCCESS~".$cdetails_res[0]["card_number"]."~".$cdetails_res[0]["last_used_on"];
            $this->paybookPopup();
          }else{
            $insert_result="ERROR";
          }
          echo $insert_result;
        }
    }
    // function to strip tags
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        $data = str_replace("'","&#39",$data);
        return $data;
    }
}