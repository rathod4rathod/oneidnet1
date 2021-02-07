<?php
$this->load->module('templates');
$this->templates->header();
?>
<style>

.codes_module_container_wrap_bgimages_fixed {
	background: #91ab4a url("../assets/nd/images/coff3.jpeg") repeat fixed center top;
}

.wrapper-inner {
    display: inline-block;
    margin: 10px 10px 10px;
    width: 98%;
}

.j-left-container {
    width: 70%;
	float:left;
}

.j-right-container {
    width: 28%;
    background: #f5f5f5;
    min-height: 650px;
    height: auto;
	float:left;
	margin:0 0 0 2%;
}



ul {
	list-style-type: none;
}
a {
	color: #e95846;
	text-decoration: none;
}
.pricing-table-title {
	text-transform: uppercase;
	font-weight: 700;
	font-size: 2.6em;
	color: #FFF;
	margin-top: 15px;
	text-align: left;
	margin-bottom: 25px;
	text-shadow: 0 1px 1px rgba(0,0,0,0.4);
}
.pricing-table-title a {
	font-size: 0.6em;
}
.clearfix:after {
	content: '';
	display: block;
	height: 0;
	width: 0;
	clear: both;
}
/** ========================
 * Contenedor
 ============================*/
.pricing-wrapper {
	
	margin: 10px auto 0;
}
.pricing-table {
	margin: 10px 20px;
	text-align: center;
	width: 44%;
	height:320px;
	float: left;
	-webkit-box-shadow: 0 0 15px rgba(0,0,0,0.4);
	box-shadow: 0 0 15px rgba(0,0,0,0.4);
	-webkit-transition: all 0.25s ease;
	-o-transition: all 0.25s ease;
	transition: all 0.25s ease;
}
.pricing-table:hover {
	-webkit-transform: scale(1.06);
	-ms-transform: scale(1.06);
	-o-transform: scale(1.06);
	transform: scale(1.06);
}
.pricing-title {
	color: #FFF;
	background: #e95846;
	padding: 20px 0;
	font-size: 1em;
	text-transform: uppercase;
	text-shadow: 0 1px 1px rgba(0,0,0,0.4);
}
.pricing-table.recommended .pricing-title {
	background: #2db3cb;
}
.pricing-table.recommended .pricing-action {
	background: #2db3cb;
}
.pricing-table .price {
	background: #403e3d;
	font-size: 2em;
	color: #fff;
	padding: 10px 0;
	text-shadow: 0 1px 1px rgba(0,0,0,0.4);
	background: rgba(0, 0, 0, 0.5) none repeat scroll 0 0;
}

.pricing-table .pricetwo {
	background: #e95846;
	font-size: 1.5em;
	color: #fff;
	padding: 10px 0;
	text-shadow: 0 1px 1px rgba(0,0,0,0.4);
}

.pricing-table .des {
	font-size: 1em;
	color: #000;
	line-height:18px;
	padding: 10px 10px 0 40px;
}



.pricing-table .price sup {
	font-size: 0.4em;
	position: relative;
	left: 5px;
}
.table-list {
	background: #FFF;
	color: #403d3a;
}
.table-list li {
	font-size: 1em;
	padding: 5px 5px;
}
.table-list li:before {
	font-family: 'FontAwesome';
	color: #3fab91;
	display: inline-block;
	position: relative;
	right: 5px;
	font-size: 12px;
}
.table-list li span {
	font-weight: 400;
}
.table-list li span.unlimited {
	color: #FFF;
	background: #e95846;
	font-size: 0.9em;
	padding: 5px 7px;
	display: inline-block;
	-webkit-border-radius: 38px;
	-moz-border-radius: 38px;
	border-radius: 38px;
}
.table-list li:nth-child(2n) {
	background: #F0F0F0;
}
.table-buy {
	background: rgba(255, 255, 255, 0.8) none repeat scroll 0 0;
	padding: 15px;
	text-align: left;
	overflow: hidden;
}
.table-buy p {
	float: left;
	color: #37353a;
	font-weight: 700;
	font-size: 2.4em;
}
.table-buy p sup {
	font-size: 0.5em;
	position: relative;
	left: 5px;
}
.table-buy .pricing-action {
	margin-left: 120px;
	margin-top:12px;
	float: left;
	color: #FFF;
	background: #e95846;
	padding: 10px 16px;
	-webkit-border-radius: 2px;
	-moz-border-radius: 2px;
	border-radius: 2px;
	font-weight: 700;
	font-size: 1.4em;
	-webkit-transition: all 0.25s ease;
	-o-transition: all 0.25s ease;
	transition: all 0.25s ease;
}
.table-buy .pricing-action:hover {
	background: #cf4f3e;
}
.recommended .table-buy .pricing-action:hover {
	background: #228799;
}
.vericaltext {
	width: 1px;
	word-wrap: break-word;
	font-family: monospace /* this is just for good looks */
}
.vertical-text {
	-ms-transform: rotate(90deg);
	-moz-transform: rotate(90deg);
	-webkit-transform: rotate(90deg);
	transform: rotate(90deg);
	-ms-transform-origin: left top 0;
	-moz-transform-origin: left top 0;
	-webkit-transform-origin: left top 0;
	transform-origin: left top 0;
	background: #E23737;
	color: #fff;
	margin-left: 26px;
	padding: 6px;
	border: 1px solid #ccc;
	text-transform: uppercase;
	border: 1px solid #B52C2C;
	text-transform: 1px 1px 0px rgba(0, 0, 0, 0.5);
	box-shadow: 2px -2px 0px rgba(0, 0, 0, 0.1);
	float: left;
	width: 305px;
}


.row-two{margin-top:20px;}
</style>

<div class="codes_module_container_wrap_bgimages_fixed">
      <div class="wrapper-inner">
      
      
      
<div class="j-left-container">
<div class="fll overflow wi100pstg mab15"> <h2 class="mat8 border_bottom wi100pstg fll pab10 overflow"> Packages  </h2> </div>

<div class="wi100pstg fll overflow">

<div style="margin-top:40px;" class="pricing-wrapper clearfix">



<div class="pricing-wrapper clearfix" style="margin-top:40px;">




                                <div class="pricing-table">
                                    <h3 style="background-color:#09F;" class="pricing-title vertical-text"> 
                                        New Store </h3>

                                    <div class="price">

                                        <p> New <br><sup>4$&nbsp;50&nbsp;Cents / mo</sup></p></div>


                                    <!-- Lista de Caracteristicas / Propiedades -->
                                    <ul class="table-list">
                                        <li><span>Store Site Operation &nbsp;</span>150 </li>
                                        <li><span>Store Maintenance &nbsp;</span>150</li>
                                        <li> <span>Sale in initial Percentage &nbsp;</span>0.09</li>
                                        <li> <span>Store Data Storage &nbsp;</span>150</li>
                                    </ul>
                                    <!-- Contratar / Comprar -->
                                    <div class="table-buy"> <a id="1" class="pricing-action oneshopdev_plan" href="http://192.168.1.100/oneshop/create_store/New">Select Plan</a> </div>
                                </div>

                                <div class="pricing-table">
                                    <h3 style="background-color:#F0F;" class="pricing-title vertical-text"> 
                                            Extra Small Existing Store</h3>
                                    <div class="price"> Basic <br><sup>5$&nbsp;97&nbsp;Cents / mo</sup></div>
                                    <ul class="table-list">
                                        <li> <span>Store Site Operation &nbsp;</span>149 </li>
                                        <li><span>Store Maintenance &nbsp;</span>149</li>
                                        <li><span>Sale in initial Percentage &nbsp;</span>0.11 </li>
                                        <li><span>Store Data Storage &nbsp;</span>299 </li>
                                    </ul>

                                    <div class="table-buy"> <a id="2" class="pricing-action oneshopdev_plan" href="http://192.168.1.100/oneshop/create_store/Basic">Select Plan </a> </div>
                                </div>


                                <div class="pricing-table">
                                    <h3 style="background-color:#C00;" class="pricing-title vertical-text"> 
                                            Small Existing Store</h3>
                                    <div class="price"> Regular <br><sup>7$&nbsp;97&nbsp;Cents / mo</sup></div>
                                    <ul class="table-list">
                                        <li> <span>Store Site Operation &nbsp;</span>149 </li>
                                        <li><span>Store Maintenance &nbsp;</span>149</li>
                                        <li><span>Sale in initial Percentage &nbsp;</span>0.11 </li>
                                        <li><span>Store Data Storage &nbsp;</span>499 </li>
                                    </ul>
                                    <div class="table-buy"> <a id="3" class="pricing-action oneshopdev_plan" href="http://192.168.1.100/oneshop/create_store/Regular">Select Plan </a> </div>
                                </div>
                                <div style="    margin-top: 30px;" class="pricing-table">
                                    <h3 style="background-color:#03F;" class="pricing-title vertical-text"> 
Intermediate Existing Store</h3>
                                    <div class="price"> Bronze <br><sup>10$&nbsp;97&nbsp;Cents / mo</sup></div>
                                    <ul class="table-list">
                                        <li> <span>Store Site Operation &nbsp;</span>199 </li>
                                        <li><span>Store Maintenance &nbsp;</span>199</li>
                                        <li><span>Sale in initial Percentage &nbsp;</span>0.11 </li>
                                        <li><span>Store Data Storage &nbsp;</span>699 </li>
                                    </ul>
                                    <div class="table-buy"> <a id="4" class="pricing-action oneshopdev_plan" href="http://192.168.1.100/oneshop/create_store/Bronze">Select Plan </a> </div>
                                </div>
                                <div style="margin-top:30px;" class="pricing-table">
                                    <h3 style="background-color:#F0F;" class="pricing-title vertical-text"> 
                                        Medium Existing Store</h3>
                                    <div class="price"> Silver <br><sup>24$&nbsp;97&nbsp;Cents / mo</sup></div>
                                    <ul class="table-list">
                                        <li> <span>Store Site Operation &nbsp;</span>499 </li>
                                        <li><span>Store Maintenance &nbsp;</span>499</li>
                                        <li><span>Sale in initial Percentage &nbsp;</span>0.11 </li>
                                        <li><span>Store Data Storage &nbsp;</span>1499 </li>
                                    </ul>
                                    <div class="table-buy"> <a id="5" class="pricing-action oneshopdev_plan" href="http://192.168.1.100/oneshop/create_store/Silver">Select Plan </a> </div>

                                </div>


                                <div style="margin-top:30px;" class="pricing-table">
                                    <h3 style="background-color:#C00;" class="pricing-title vertical-text"> 
Large Existing Store</h3>
                                    <div class="price"> Gold <br><sup>89$&nbsp;97&nbsp;Cents / mo</sup></div>
                                    <ul class="table-list">
                                        <li><span>Store Site Operation &nbsp;</span>1999  </li>
                                        <li><span>Store Maintenance &nbsp;</span>1999</li>
                                        <li> <span>Sale in initial Percentage  &nbsp;</span>0.11</li>
                                        <li><span>Store Data Storage  &nbsp;</span>4999 </li>
                                    </ul> 
                                    <div class="table-buy"> <a id="6" class="pricing-action oneshopdev_plan" href="http://192.168.1.100/oneshop/create_store/Gold">Select Plan </a> </div>
                                </div>

                                <div style="    margin-top: 30px;" class="pricing-table">
                                    <h3 style="background-color:#03F;" class="pricing-title vertical-text"> 
Extra Large Store</h3>
                                    <div class="price"> Platinum <br><sup>199$&nbsp;97&nbsp;Cents / mo</sup></div>
                                    <ul class="table-list">
                                        <li><span> Store Site Operation &nbsp;</span>4999  </li>
                                        <li><span>Store Maintenance &nbsp;</span>4999</li>
                                        <li><span>Sale in initial Percentage &nbsp;</span>0.11 </li>
                                        <li><span>Store Data Storage &nbsp;</span>9999 </li>
                                    </ul>
                                    <div class="table-buy"> <a id="7" class="pricing-action oneshopdev_plan" href="http://192.168.1.100/oneshop/create_store/Platinum">Select Plan </a> </div>
                                </div>





                                <div style="margin-top:30px;" class="pricing-table">
                                    <h3 style="background-color:#F0F;" class="pricing-title vertical-text"> 
Mega Stores</h3>
                                    <div class="price"> Unlimited <br><sup>289$&nbsp;97&nbsp;Cents / mo</sup></div>
                                    <ul class="table-list">
                                        <li><span> Store Site Operation &nbsp;</span>7999  </li>
                                        <li><span>Store Maintenance  &nbsp;</span>7999</li>
                                        <li><span>Sale in initial Percentage  &nbsp;</span>0.11 </li>
                                        <li><span>Store Data Storage  &nbsp;</span>12999 </li>
                                    </ul> 
                                    <div class="table-buy"> <a class="pricing-action" href="http://192.168.1.100/oneshop/create_store/Unlimited">Select Plan </a> </div>
                                </div>
                            </div>





</div>


</div>






      
</div>
      
      
      
      
      
<div class="j-right-container mat30">
<img width="297" height="468" src="images/ad2.jpg">
</div>

      
      
</div>
     

	
    
    
    

         
         

         
         





</div>
<!--module container end here-->
<?php
$this->templates->footer();
?>
