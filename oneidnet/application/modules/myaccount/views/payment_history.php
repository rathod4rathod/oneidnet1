<?php 
require_once('vendor/autoload.php');

$stripe = new \Stripe\StripeClient('sk_test_51HqXE5IIelCwrUfqj2KqeSuXLlS3qYxU4vdcvN075v37Dl80gjmz0xloua7dMHt09VphfQzaVc0x84MkitxDHNQ000ZbUOc044');
$get_transfer = $stripe->transfers->all([
        'destination' => 'acct_1I2E8QRGzZCe2cMZ',
]);

foreach ($get_transfer as $chargeids) {
    $ch_data = $stripe->charges->retrieve(
        $chargeids['source_transaction'],
        []
    );
    $tr_data =$stripe->balanceTransactions->all([
        'source' => $ch_data['transfer'],
    ]);
    if($ch_data && $tr_data){
        $dbapi=$this->load->module("db_api");
        $payment_curr = "SELECT * FROM iws_currencies WHERE sc='".$ch_data['currency']."'";
        $curr_result=$dbapi->custom($payment_curr);
        $payment_exist = "SELECT * FROM stripe_payout WHERE pay_chid='".$ch_data['id']."'";
        $exist_result=$dbapi->custom($payment_exist);
        if($exist_result == 0){
            $fees = $ch_data['application_fee_amount'] / 100;
            $netamt = ($ch_data['amount'] / 100) - $fees;
            $payment_items_fields=array("pay_chid"=>$ch_data['id'],"pay_name"=>$ch_data['billing_details']['name'],"pay_on_acc"=>$ch_data['destination'],"pay_created"=>date('Y-m-d H:i:s', $tr_data['data'][0]['created']),"pay_available"=>date('Y-m-d H:i:s', $tr_data['data'][0]['available_on']),"pay_curr"=>$curr_result[0]['symbol'],"pay_fees"=>$fees,"pay_netamt"=>$netamt);
            $myacc = $this->load->module('myaccount');
            foreach ($payment_items_fields as $key => $val) {
                $payment_items_fields[$key] = $myacc->test_input($payment_items_fields[$key]);
            }
            $pay_result=$dbapi->insert($payment_items_fields,"stripe_payout");
            echo 'inserted';
        }
    }
}
?>
<?php
$this->load->module("templates");
//$this->templates->paybookheader();
$this->templates->basic_info_header();
$this->templates->paybook_subheader()
?>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css">
<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
<style type="text/css">
  th { white-space: nowrap; }
</style>
 </div>

    <div class="clearfix"></div>
    <div class="np_des_module_container_wrap np_des_mat130 minheight700"> <!--module_container start here-->
      
      <h1 class="wi100pstg os_des_borderbottom fs22 os_des_pab5 normal np_des_mab10">  Payment History </h1>
      
      <div class="right_cont_newwrapper" style="display: flex;grid-column-gap: 30px;width: 100%">
          <div class="w3-card-4" style="width:30%;text-align: center;">
            <header class="w3-container" style="background-color: khaki;">
              <h3 style="font-weight: bolder;">Today</h3>
            </header>
            <?php if($today != null){
              echo '<div class="w3-container" style="padding: 1.01em 16px;">
                <p style="color: green;font-weight: bolder;font-size: x-large;">'.$today[0]['pay_curr'].' '.$today[0]['value_sum'].'</p>
              </div>';
            }else
            {
              echo '<div class="w3-container" style="padding: 1.01em 16px;">
                <p style="color: green;font-weight: bolder;font-size: x-large;">0.00</p>
              </div>';
            }
            ?>
            <header class="w3-container" style="background-color: coral;color: white;">
              <h3 style="font-weight: bolder;">Yesterday</h3>
            </header>
            <?php if($yesterday != null){
              echo '<div class="w3-container" style="padding: 1.01em 16px;">
              <p style="color: green;font-weight: bolder;font-size: x-large;">'.$yesterday[0]['pay_curr'].' '.$yesterday[0]['value_sum'].'</p>
            </div>';
            }else
            {
              echo '<div class="w3-container" style="padding: 1.01em 16px;">
              <p style="color: green;font-weight: bolder;font-size: x-large;">$ 0.00</p>
            </div>';
            }
            ?>
          </div>
          <div class="w3-card-4" style="width:30%;text-align: center;">
            <header class="w3-container" style="background-color: khaki;">
              <h3 style="font-weight: bolder;">This Week</h3>
            </header>
            <?php if($week != null){
              echo '<div class="w3-container" style="padding: 1.01em 16px;">
              <p style="color: green;font-weight: bolder;font-size: x-large;">'.$week[0]['pay_curr'].' '.$week[0]['value_sum'].'</p>
            </div>';
            }else
            {
              echo '<div class="w3-container" style="padding: 1.01em 16px;">
              <p style="color: green;font-weight: bolder;font-size: x-large;">$ 0.00</p>
            </div>';

            }?>
            <header class="w3-container" style="background-color: coral;color: white;">
              <h3 style="font-weight: bolder;">Last Week</h3>
            </header>
            <?php if($lastweek != null){
              echo '<div class="w3-container" style="padding: 1.01em 16px;">
              <p style="color: green;font-weight: bolder;font-size: x-large;">'.$lastweek[0]['pay_curr'].' '.$lastweek[0]['value_sum'].'</p>
            </div>';
            }else
            { 
              echo '<div class="w3-container" style="padding: 1.01em 16px;">
              <p style="color: green;font-weight: bolder;font-size: x-large;">$ 0.00</p>
            </div>';
            }?>
          </div>
          <div class="w3-card-4" style="width:30%;text-align: center;">
            <header class="w3-container" style="background-color: khaki;">
              <h3 style="font-weight: bolder;">This Month</h3>
            </header>
            <?php if($month != null){
              echo '<div class="w3-container" style="padding: 1.01em 16px;">
              <p style="color: green;font-weight: bolder;font-size: x-large;">'.$month[0]['pay_curr'].' '.$month[0]['value_sum'].'</p>
            </div>';
            }else
            { 
              echo '<div class="w3-container" style="padding: 1.01em 16px;">
              <p style="color: green;font-weight: bolder;font-size: x-large;">$ 0.00</p>
            </div>';
            }?>
            <header class="w3-container" style="background-color: coral;color: white;">
              <h3 style="font-weight: bolder;">last Month</h3>
            </header>
            <?php if($lastmonth != null){
              echo '<div class="w3-container" style="padding: 1.01em 16px;">
              <p style="color: green;font-weight: bolder;font-size: x-large;">'.$lastmonth[0]['pay_curr'].' '.$lastmonth[0]['value_sum'].'</p>
            </div>';
            }else
            { 
               echo '<div class="w3-container" style="padding: 1.01em 16px;">
              <p style="color: green;font-weight: bolder;font-size: x-large;">$ 0.00</p>
            </div>';
            }?>
          </div>
          <div class="w3-card-4" style="width:30%;text-align: center;">
            <header class="w3-container" style="background-color: khaki;">
              <h3 style="font-weight: bolder;">This Year<span style="font-size: 15px"> so far</span></h3>
            </header>
            <?php if($year != null){
              echo '<div class="w3-container" style="padding: 1.01em 16px;">
              <p style="color: green;font-weight: bolder;font-size: x-large;">'.$year[0]['pay_curr'].' '.$year[0]['value_sum'].'</p>
            </div>';
            }else
            { 
              echo '<div class="w3-container" style="padding: 1.01em 16px;">
              <p style="color: green;font-weight: bolder;font-size: x-large;">$ 0.00</p>
            </div>';
            }?>
            <header class="w3-container" style="background-color: coral;color: white;">
              <h3 style="font-weight: bolder;">Last Year</h3>
            </header>
            <?php if($lastyear != null){
              echo '<div class="w3-container" style="padding: 1.01em 16px;">
              <p style="color: green;font-weight: bolder;font-size: x-large;">'.$lastyear[0]['pay_curr'].' '.$lastyear[0]['value_sum'].'</p>
            </div>';
            }else
            {
              echo '<div class="w3-container" style="padding: 1.01em 16px;">
              <p style="color: green;font-weight: bolder;font-size: x-large;">$ 0.00</p>
            </div>';
            }?>
          </div>
        </div>

<table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Charge(Oneidnet)</th>
                <th>Amount</th>
                <th>Transaction Created On</th>
                <th>Balance Available On</th>
            </tr>
        </thead>
        <tbody style="text-align: center;">
        </tbody>
        <tfoot>
            <tr>
                <th colspan="1" style="text-align:right;">Total:</th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
            </tr>
        </tfoot>
    </table>
      </div>
     <!--  <div class="oneshop_right_newcontainer np_des_mat25"> <img src="images/ad1.jpg" class="hotel_news_imgbox"> </div> -->
    </div>
    <!--module container end here-->
    
    <div class="clearfix"></div>
    <div class="np_des_footer"><!--footer start here-->
      <div class="np_des_footerleft"><span> Copyright &copy; ONEIDNET 2016 </span></div>
      <div class="np_des_footerright"><span><a href="#"><img src="images/onenet.png" alt="logo"></a></span></div>
    </div>
    <!--footer closed here--> 
    
  </div>
  <!--wrapper main closed here--> 
  
</div>
</body>
</html>
<script>
$(document).ready(function() {
    var dataRecords = $('#example').DataTable({
        "footerCallback": function ( row, data, start, end, display ) {
            var api = this.api(), data;
 
            // Remove the formatting to get integer data for summation
            var intVal = function ( i ) {
                return typeof i === 'string' ?
                    i.replace(/[\$,]/g, '')*1 :
                    typeof i === 'number' ?
                        i : 0;
            };
             total1 = api
                .column( 2 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
 
            // Total over this page
            pageTotal1 = api
                .column( 2, { page: 'current'} )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
 
            // Update footer
            $( api.column( 2 ).footer() ).html(
                pageTotal1
            );
            // Total over all pages
            total = api
                .column( 3 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
 
            // Total over this page
            pageTotal = api
                .column( 3, { page: 'current'} )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
 
            // Update footer
            $( api.column( 3 ).footer() ).html(
                pageTotal
            );
        },
        "processing":true,
        "serverSide":true,              
        "order":[],
        "ajax":{
            url: oneidnet_url+"myaccount/payment_list",
            type:"POST",
        },
        "columnDefs":[
            {
                "targets":[1],
                "orderable":false,
            },
        ],
            "pageLength": 10
    });
});
 $.get(oneidnet_url+"myaccount/transactionhistory_v",function(data){
    
    $('#transaction_history').html(data);
});
</script>