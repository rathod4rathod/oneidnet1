<?php
$db_obj = $this->load->module("db_api");
if($result != 0){
foreach ($result as $pendingtransdata) {
    ?>

    <div class="ttdes_login_control_content fll">

        <?php
        if ($pendingtransdata['beneficiary_type'] == 'ONESHOP_STORE_OWNER') {
            $sql = "select store_name from oshop_stores where store_aid=" . $pendingtransdata['entity_id'];
            $data["pen_trans_data"] = $db_obj->custom($sql);
            ?>
            <div class="ttdes_stores_orderid"> <span class="fll" style="margin-left:-20px; margin-top:-5px;"><img width="60" height="50" src="<?php echo base_url() . 'assets/Images/Logos/oneshop.png' ?>" class="fll os_des_margin_auto" alt="icon"> </span> </div>
            <div class="ttdes_stores_date pat5 os_des_pab5">
                <p> <strong> <?php echo ucfirst($data['pen_trans_data'][0]['store_name']); ?> </strong> </p>
            <?php
            } else if ($pendingtransdata['beneficiary_type'] == 'DEALERX_ONEIDNET') {
                $sql = "select company_name from  dx_dealers  where dealer_id=" . $pendingtransdata['entity_id'];
                $data["pen_trans_data"] = $db_obj->custom($sql);
                ?>
                <div class="ttdes_stores_orderid"> <span class="fll" style="margin-left:-20px; margin-top:-5px;"><img width="60" height="50" src="<?php echo base_url() . 'assets/Images/Logos/dealerx.png' ?>" class="fll os_des_margin_auto" alt="icon"> </span> </div>
                <div class="ttdes_stores_date pat5 os_des_pab5">
                    <p> <strong><?php echo ucfirst($data['pen_trans_data'][0]['company_name']); ?> </strong> </p>
                <?php
                } else if ($pendingtransdata['beneficiary_type'] == 'CORPORATE_OFFICE_ONEIDNET') {
                    $sql = "select company_name from  iws_employers  where company_aid=" . $pendingtransdata['entity_id'];
                    $data["pen_trans_data"] = $db_obj->custom($sql);
                    ?>
                    <div class="ttdes_stores_orderid"> <span class="fll" style="margin-left:-20px; margin-top:-5px;"><img width="60" height="50" src="<?php echo base_url() . 'assets/Images/Logos/cooffice.png' ?>" class="fll os_des_margin_auto" alt="icon"> </span> </div>
                    <div class="ttdes_stores_date pat5 os_des_pab5">
                        <p> <strong><?php echo ucfirst($data['pen_trans_data'][0]['company_name']); ?></strong>  </p>
                    <?php } else { ?>
                        <div class="ttdes_stores_orderid"> <span class="fll" style="margin-left:-20px; margin-top:-5px;"><img width="60" height="50" src="" class="fll os_des_margin_auto" alt="icon"> </span> </div>
                    <div class="ttdes_stores_date pat5 os_des_pab5">
                        <p>  </p>
                    <?php } ?>
                    <p class="np_des_mat5">  Date:<?php echo date('d-m-Y', strtotime($pendingtransdata['saved_on'])); ?></p>
                </div>
                <div class="ttdes_stores_date pat5 os_des_pab5">
                    <div class="fll overflow bold np_des_mat5"> Rs: <?php echo $pendingtransdata['amount']; ?>/-   </div>
                    <div class="completednow fll">Completed Now</div>
                </div>
            </div>
<?php } } else { echo "No Pending Transactions";} ?>
