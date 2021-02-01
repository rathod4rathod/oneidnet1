 <div class="bodycontent">
     
     <p  onclick="document.getElementById('light').style.display = 'none';document.getElementById('fade').style.display = 'none';"><a class="close_btnnew">X</a></p>
            <div class="box-header">
                <h2>Transaction Details View</h2>
                <hr>

                <div class="top-header">

                    <div class="transaction-id" style="font-size:16px; font-weight:bold;">
                        <h3><?php  echo $transactiondata[0]['transaction_code']?></h3>
                    </div>

                    <div class="date">
                        <h3><?php  echo date('D d-M-Y H:i:s',strtotime($transactiondata[0]['transaction_time']))?></h3>
                    </div>

                </div>

                <div class="transaction-body">

                    <div class="leftbar">
                        <div class="card">
                            <h3>Card </h3>
                            <hr>
                            <h3><?php  echo $transactiondata[0]['card_name']?> </h3>
                        </div>


                        <div class="type">
                            <h3>Type</h3>
                            <hr>
                            <h3><?php  echo $transactiondata[0]['card_type']?></h3>
                        </div>
                    </div>


                    <div class="rightbar">
                        <div>
                            <h3><?php if($transactiondata[0]['payment_type']=='INBOUND'){
								echo "Paid To " . $transactiondata[0]['first_name']. $transactiondata[0]['middle_name']. $transactiondata[0]['last_name'];
								
								}else if($transactiondata[0]['payment_type']=='OUTBOUND'){
								echo "Paid By ". $transactiondata[0]['first_name']. $transactiondata[0]['middle_name']. $transactiondata[0]['last_name'];	
									}?>
								
								</h3>
                            <hr>
                            <p> Rs<?php echo  $transactiondata[0]['amount'] ?> </p>
                        </div>
                        
                        <div>
                            <h3>Payment Status
								</h3>
                            <hr>
                            <p> <?php if($transactiondata[0]['status']=='SUCCESSFUL'){
								echo"Sucessful";
								}else if($transactiondata[0]['status']=='CANCELLED_DUE_TO_INSUFFICIENT_BALANCE'){
									echo"Cancelled due to Insufficient balance";
									
									}
								else if($transactiondata[0]['status']=='OTHER_REASONS_FAILURES'){
									echo"Failure";}
								else if($transactiondata[0]['status']=='CANCELLED_DUE_TO_AUTHENTICATION_FAILED'){
									echo"Cancelled due to Authentication failed";
									}?> </p>
                        </div>
                        
                         <div>
                            <h3>Module
								</h3>
                            <hr>
                            <p> <?php echo $transactiondata[0]['module']   ?> </p>
                        </div>
                    </div>
                    
                    
                    
                    
                </div>

            </div>
<a href="javascript:void(0)" onclick="document.getElementById('light').style.display='none';document.getElementById('fade').style.display='none'" style="float: right;
    position: relative;
    margin-top: -248px;"><img src="<?php echo base_url().'assets/Images/attachclose.png'  ?>" width="15" height="15"></a>
