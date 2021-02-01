<?php
print_r($transactiondata);
if ($transactiondata[0]['transaction_aid'] != '') {
    foreach ($transactiondata as $tdata) {
        ?>
        <div class="ttdes_login_control_content fll">
            <div class="ttdes_stores_orderid"> <span class="fll" style="margin-left:-20px; margin-top:-5px;"><img width="60" height="50" src="images/logos/mail.png" class="fll os_des_margin_auto" alt="icon"> </span> </div>
            <div class="ttdes_stores_date pat5 os_des_pab5"> 
                <p> Entity Name  </p>
                <p class="np_des_mat5">  Date:<?php echo date('d-m-Y H:i:s', strtotimr($tdata['transaction_time'])); ?> </p>
            </div>
            <div class="ttdes_stores_date pat5 os_des_pab5"> 
                <div class="fll overflow bold np_des_mat5"> Rs: <?php echo $tdata['amount']; ?>   </div>
                <div class="completednow fll">Completed Now</div>
            </div>
        </div>
    <?php
    }
} else {
    echo"No data";
}
?>
