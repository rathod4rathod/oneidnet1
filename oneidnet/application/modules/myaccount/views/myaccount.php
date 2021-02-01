<?php

$this->load->module("templates");
$this->templates->basic_info_header();
$this->templates->paybook_subheader()
?>
 </div>
<script type="text/javascript" >
	var oneid_url =  oneidnet_url;
function popup(id){ 
    document.getElementById('light').style.display='none';
    document.getElementById('fade').style.display='none';
		}
		
function popupdata(id){ 
	$.get(oneid_url+"myaccount/transactiondetail",{transactionid:id},function(data){
	//	alert(data);
		
	document.getElementById('light').style.display='block';
	document.getElementById('fade').style.display='block';
	$('#light').html(data);
	 
    });
    }</script>
<link href='https://fonts.googleapis.com/css?family=Lato:400,700,300,900' rel='stylesheet' type='text/css'>
<!--<script type="text/javascript" src="http://canvasjs.com/assets/script/canvasjs.min.js"></script>-->
  



 <style>
body {
            font-family: 'Lato', sans-serif;
            background-color: #f9f9f9;
        }
        
        .steps {
            margin: 0px 0 20px 4px;
            position: relative;
            margin-top: 111px;
        }
        
        .steps .line {
            /*border-bottom: 2px solid #404041;*/
            margin: 0 10%;
            position: absolute;
            top: 20px;
            width: 56%;
            z-index: 100;
        }
        
        .steps .step {
            display: inline-block;
            margin: 0 auto;
            position: relative;
            text-align: center;
            width: 208px;
            z-index: 200;
            /* Permalink - use to edit and share this gradient: http://colorzilla.com/gradient-editor/#00b7ea+0,009ec3+100;Blue+3D+%2315 */
            background: #00b7ea;
            /* Old browsers */
            background: -moz-linear-gradient(left, #00b7ea 0%, #009ec3 100%);
            /* FF3.6-15 */
            background: -webkit-linear-gradient(left, #00b7ea 0%, #009ec3 100%);
            /* Chrome10-25,Safari5.1-6 */
            background: linear-gradient(to right, #00b7ea 0%, #009ec3 100%);
            /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
            /*filter: progid: DXImageTransform.Microsoft.gradient( startColorstr='#00b7ea', endColorstr='#009ec3', GradientType=1);*/
            /* IE6-9 */
        }
        
        .steps .step .circle {
            background: #FFFFFF;
            /* border: 2px solid #404041; */
            border-radius: 20px;
            -moz-border-radius: 20px;
            -webkit-border-radius: 30px;
            color: #404041;
            display: inline-block;
            font-size: 20px;
            height: 50px;
            margin-top: 10px;
            line-height: 50px;
            text-align: center;
            width: 50px;
            z-index: 500;
        }
        
        .steps .step .circle.active {
            background: #323085;
            border: 2px solid #323085;
            color: #FFFFFF;
        }
        
        .steps .step .circle.complete {
            background: #f4f3f1;
            color: #7f8272;
        }
        
        .steps .step .label {
            color: #fff;
            display: block;
            font-weight: bold;
            height: 35px;
            margin-top: 10px;
        }
        
        table {
            border-collapse: collapse;
            width: 100%;
        }
        
        th {
            /*background-color:  Permalink - use to edit and share this gradient: http://colorzilla.com/gradient-editor/#00b7ea+0,009ec3+100;Blue+3D+%2315 */
            /*background: #00b7ea;*/
            /* Old browsers */
            /*background: -moz-linear-gradient(top, #00b7ea 0%, #009ec3 100%);*/
            /* FF3.6-15 */
            /*background: -webkit-linear-gradient(top, #00b7ea 0%, #009ec3 100%);*/
            /* Chrome10-25,Safari5.1-6 */
            /*background: linear-gradient(to bottom, #00b7ea 0%, #009ec3 100%);*/
            /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
            /*filter: progid: DXImageTransform.Microsoft.gradient( startColorstr='#00b7ea', endColorstr='#009ec3', GradientType=0);*/
            /* IE6-9 */
            color: #fff;
            font-weight: bold;
        }
        
        th,
        td {
            border: 1px solid #333;
            line-height: 1.5;
            padding: 0.75em;
            text-align: center;
            background-color: #f9f9f9;
        }
        /* Stack rows vertically on small screens */
        
        @media (max-width: 30em) {
            /* Hide column labels */
            thead tr {
                position: absolute;
                top: -9999em;
                left: -9999em;
            }
            tr {
                border: 0.125em solid #333;
                border-bottom: 0;
            }
            /* Leave a space between table rows */
            tr + tr {
                margin-top: 1.5em;
            }
            /* Get table cells to act like rows */
            tr,
            td {
                display: block;
            }
            td {
                border: none;
                border-bottom: 0.125em solid #333;
                /* Leave a space for data labels */
                padding-left: 50%;
            }
            /* Add data labels */
            td:before {
                content: attr(data-label);
                display: inline-block;
                font-weight: bold;
                line-height: 1.5;
                margin-left: -100%;
                width: 100%;
            }
        }
        /* Stack labels vertically on smaller screens */
        
        @media (max-width: 20em) {
            td {
                padding-left: 0.75em;
            }
            td:before {
                display: block;
                margin-bottom: 0.75em;
                margin-left: 0;
            }
        }
        
        .pending-transaction {
            width: 841px;
            margin-left: 4px;
        }
        
        .circle:hover {
            background-color: #000;
        }
        
        .completednow {
            /*background-color:  Permalink - use to edit and share this gradient: http://colorzilla.com/gradient-editor/#299a0b+0,299a0b+100;Green+Flat+%231 */
            /*background: #299a0b;*/
            /* Old browsers */
            /*background: -moz-linear-gradient(left, #299a0b 0%, #299a0b 100%);*/
            /* FF3.6-15 */
            /*background: -webkit-linear-gradient(left, #299a0b 0%, #299a0b 100%);*/
            /* Chrome10-25,Safari5.1-6 */
            /*background: linear-gradient(to right, #299a0b 0%, #299a0b 100%);*/
            /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
            /*filter: progid: DXImageTransform.Microsoft.gradient( startColorstr='#299a0b', endColorstr='#299a0b', GradientType=1);*/
            /* IE6-9 */
            padding: 5px;
            color: #fff;
            width: 100px;
            font-size: 10px;
            margin-left: 32%;
        }
        
        .webads {
            float: left;
            margin-left: 10px;
        }
        
        .pending-transaction {
            float: left;
        }
        
        .np_des_module_container_wrap {
            margin: 0;
            margin-left: 1%;
        }
        
        .box p {
            font-size: 15px;
            margin-top: 10px;
            BACKGROUND-COLOR: #f8f8f8;
            width: 600px;
            padding: 16px;
        }
        
        .box p:before {
            content: "";
            display: block;
            background: url("images/heart.png") no-repeat;
            width: 20px;
            height: 18px;
            float: left;
            margin: 0 6px 0 0;
        }
        
        .recentactivity {
            margin-top: -50PX;
        }
        
        .recentactivity h3 {
            font-size: 20px;
            font-weight: bold;
        }
        
        .black_overlay {
            display: none;
            position: absolute;
            top: 0%;
            left: 0%;
            width: 100%;
            height: 100%;
            background-color: #f8f8f8;
            z-index: 1001;
            -moz-opacity: 0.8;
            opacity: .80;
            filter: alpha(opacity=80);
        }
        
        .white_content {
            display: none;
            position:fixed ;
            margin: 20px 0 0 0;
            left: 25%;
            width: 50%;
            height: 280px;
            padding: 16px;
            box-shadow: 5px 10px 10px 5px rgba(0, 0, 0, 0.5);
            background-color: white;
            z-index: 1002;
        }
        
        .close_btnnew {
    background: #c96 none repeat scroll 0 0;
    border: 0 solid #fff;
    border-radius: 50px;
    color: #fff;
    float: right;
    font-size: 11px;
    font-weight: 700;
    height: 22px;
    line-height: 22px;
    margin: 0 5px 0 0;
    text-align: center;
    width: 22px;
}
        
        .cardlogotable {
            width: 400px;
        }
        
        .photo svg {
            width: 200px;
        }
        
        .card-logo {
            float: left;
        }
        
        .card-text {
            margin-left: 220px;
            line-height: 30px;
            background-color: #f0f0f0;
            padding: 10px;
        }
   
    .transaction-id {
        float: left;
        font-size: 16px;
        font-weight: bold;
    }
    .date {
        float: right;
        font-size: 16px;
        font-weight: bold;
    }
    .leftbar {
        float: left;
    }
    .leftbar h3 {
        font-size: 16px;
        font-weight: bold;
        line-height: 30px;
    }
    .type {
        margin-top: 20px;
    }
    .card {
        margin-top: 30px;
    }
    .box-header h2 {
        font-size: 20px;
        font-weight: bold;
    }
    .rightbar {
        float: right;
        position: relative;
        margin-left: 90px;
        margin-top: 20px;
    }
    .rightbar p:before {
        content: "";
        display: block;
        background: url("images/heart.png") no-repeat;
        width: 20px;
        height: 18px;
        float: left;
        margin: 0 6px 0 0;
    }

    </style>




            <!--<div class="steps row">
    <div class="line"></div>
    <a href="myaccount.html" target="new">
        <div class="step">
            <div class="circle complete">1</div>
            <div class="label">My<span class="responsive_hide"> Account</span></div>


        </div>
    </a>


    <a href="pendingtransaction.html" target="new">
        <div class="step">
            <div class="circle">2</div>
            <div class="label">Pending Transactions</div>

        </div>
    </a>


    <a href="#">
        <div class="step">
            <div class="circle">3</div>
            <div class="label">Transaction<span class="responsive_hide"> History</span></div>
        </div>
    </a>


    <a href="#">
        <div class="step">
            <div class="circle">4</div>
            <div class="label">Paybook<span class="responsive_hide"> Setting</span></div>
        </div>
    </a>


</div>-->




            <div class="clearfix"></div>



            <div class="np_des_module_container_wrap np_des_mat130">
                <!--module_container start here-->



                <h2 class="myaccount">Paybook Dashboard</h2><br>
                <p><h1 style="color:red">Attention:</h1> Please be informed that the Paybook system's core functionality is under implementation process. Current transactions are not valid are recorded in the simulation model until further notice. Paybook will be activated soon! We apologize for the inconvenience.</p>


                <div class="leftside">

                    <div>
                        <div class="personal">
                            <h3>PERSONAL EXPENSE ACCOUNT<br>
           <?php  echo $cardsdata[0]['personalcard'] ;?>
        
        </h3>
                        </div>

                        <div class="government">
                            <h3>GOVERNEMENT <br>ACCOUNT<br>
          <?php  echo $cardsdata[0]['govermentcard'] ;?>
          
        
        </h3>
                        </div>

                        <div class="offshoreaccount">
                            <h3>OFFSHORE<br> ACCOUNT<br>
           <?php  echo $cardsdata[0]['offshorecard'] ;?>
            
        
        </h3>
                        </div>


                    </div>

                    <div style="clear:both;">

                    </div>

<!----><div class="rightside">

                    <div>
                        <div class="personal">
                            <h3>BUSINESS<br>ACCOUNT<br>
          <?php  echo $cardsdata[0]['businesscard'] ;?>
             
        
        </h3>
                        </div>

                        <div class="government">
                            <h3>NATIONAL <br>ACCOUNT<br>
             <?php  echo $cardsdata[0]['nationalcard'] ;?>
             
        
        
        </h3>
                        </div>

                        <div class="offshoreaccount">
                             <h3>INTER NATIONAL <br>ACCOUNT<br>
            <?php  echo $cardsdata[0]['internationalcard'] ;?>
             
        
        </h3>
                        </div>


                    </div>

                    <div style="clear:both;">

                    </div>


      

                    <div style="clear:both;">

                    </div>
                    <div class="graph">
						
                        <div class="line-graph">
							<!--select ><option>select</option><option value=""></option></select>
							<div id="chartContainer" style="height: 360px; width: 200%;"></div>-->
               <img src="<?php  echo base_url().'assets/Images/linegraph.jpg'?>" alt="">
                       
                             </div>

                        <div class="bar-graph">
                            <img src="<?php  echo base_url().'assets/Images/linegraph.jpg'?>" alt="">
                       
 
                        </div>
                    </div>


                    <div style="clear:both;">

                    </div>




                    <div class="expenses-used">


                        <div class="expensestable CSSTableGenerator">



                            <table>

                                <tr>
                                    <td colspan="3">Expenses</td>

                                </tr>
                        <?php 
                        if($transactiondata['0']['transaction_aid']!=''){
                        foreach($transactiondata as $tansdata){ ?>
	                     <tr>
                                    <td><?php echo $tansdata['card_name'] ?></td>
                                    <td><?php echo $tansdata['amount'] ?></td>
                                </tr>
	
	                    <?php } }else{  ?>
							 <tr colspan="2">
                                    <td><?php echo "No data found"; ?></td>
                                    
                                </tr>
							
						<?php	} ?>
                               
                            </table>
                        </div>

                        <div class="used CSSTableGenerator" style="margin-left:20px;">
                            <table>

                                <tr>
                                    <td colspan="3">Failed Transactions </td>

                                </tr>


                               <?php 
                               if($failuredata['0']['transaction_aid']!=''){
                               foreach($failuredata as $faildata){ ?>
	                     <tr>
                                    <td><?php echo $faildata['card_name'] ?></td>
                                    <td><?php echo $faildata['amount'] ?></td>
                                </tr>
	
	                    <?php } }else{  ?>
							 <tr colspan="2">
                                    <td><?php echo "No data found"; ?></td>
                                    
                                </tr>
							
						<?php	} ?>
                            </table>
                        </div>
                    </div>




                    <div class="rightside"></div>


                    <div style="clear:both;">

                    </div>
    
    <div class="clearfix"></div>

    <div class="recentactivity" style="margin-top:30px;">

                        <h3>Recent Activity</h3>
                        <hr class="wi100pstg">
                        <div class="box">
                            <div>
								<?php
								 if($transactiondata['0']['transaction_aid']!=''){
								 foreach($transactiondata as $tdata){ ?>
                                <p>Payment  made Rs <?php echo $tdata['amount'] ?> To  <a href="#"><?php echo $tdata['first_name']. $tdata['middle_name']. $tdata['last_name']?>   </a> on the Date  <?php echo date('d-M-Y',strtotime($tdata['transaction_time']));?> with<a href="javascript:void(0)" onclick="popupdata(<?php echo $tdata['transaction_aid']  ?>)"> TXN</a></p>
                            <?php }}else{ 
								echo" <p>No Data Found  </p>";
								} ?>
                            </div>


                           

                        </div>
                         <h3>Failure Activity</h3>
                        <hr>
                        <div class="box">
                            <div>
								<?php
								 if($failuredata[0]['transaction_aid']!=''){
								 foreach($failuredata as $fdata){ ?>
                                <p>Payment failed Rs<?php echo $fdata['amount'] ?> To<a href="#"><?php echo $fdata['first_name']. $fdata['middle_name']. $fdata['last_name']?> </a> on the Date <?php echo date('d-M-Y',strtotime($tdata['transaction_time']));?> with <a href="javascript:void(0)" onclick="popupdata(<?php echo $fdata['transaction_aid']  ?>)"> TXN </a></p>
                            <?php } }else{ 
								echo" <p>No Data Found  </p>";
								}?>
                            </div>


                           

                        </div>
                       
                    </div>

                </div>






            </div>
            <!--module container end here-->

            <div class="clearfix"></div>

            
   <div class="np_des_footer"><!--footer start here-->
    <div class="np_des_footerleft"><span> Copyright &copy; ONEIDNET 2016 </span></div>
    <div class="np_des_footerright"><span><a href="#"><img src="<?php echo BASEINFO_PATH; ?>images/onenet.png" alt="logo"></a></span></div>
</div><!--footer closed here-->

</div><!--wrapper main closed here-->

</div> 
</body>
</html>

            <!--footer closed here-->




    <div id="light" class="white_content">
    </div>
    <div id="fade" class="black_overlay"></div>





<script type="text/javascript">
	
//Creating a multi-series line graph from 2 sets of data. Namely dps1 and dps2.

//var dps1 = [{ x: 2, y: 10 }, { x: 2, y: 17 }, { x: 3, y: 29 }]; //dataPoints – line 1
//var dps2 = [{ x: 1, y: 15 }, { x: 2, y: 28 }, { x: 3, y: 42 }]; //dataPoints. – line 2
//var dps2 = [ <?php echo $shed_query  ?>]; //dataPoints. – line 2

var chart = new CanvasJS.Chart("chartContainer", {
    title: {
        text: "Cards data "
    },
    axisX: {
        title: "cards used"
    },
    axisY: {
        title: "no of times"
    },
    
    // begin data for 2 line graphs. Note dps1 and dps2 are
    //defined above as a json object. See http://www.w3schools.com/json/
    data: [
    
    <?php echo $shed_query  ?>
      //  { type: "line", dataPoints: dps1 },
        //{ type: "line", dataPoints: dps2 }
    ]
    // end of data for 2 line graphs
    
}); // End of new chart variable

chart.render();
</script>
 
