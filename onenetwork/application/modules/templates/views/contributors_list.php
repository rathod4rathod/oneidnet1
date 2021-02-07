<?php
$this->load->module('templates');
$this->templates->header();
$this->templates->onenet_header();
?>

<style>


    .contributors-title
{
	font-size:24px;
	color:#333;
	padding:5px 0px;

}

    .table-fill {
  background: white;
 /* border-radius:3px;*/
  border-collapse: collapse;
  margin: 0 auto;
  width: 100%;
  box-shadow: 0 5px 5px rgba(0, 0, 0, 0.1);
  margin-bottom:20px;


}

th {
  color:#333;
  background:#fff;
  /*border-bottom:4px solid #9ea7af;*/

  font-size:18px;
  font-weight: bold;
  padding:10px 10px;
  text-align:left;
  text-shadow: 0 1px 1px rgba(0, 0, 0, 0.1);
  vertical-align:middle;
}

th:first-child {
<!--  border-top-left-radius:3px;-->
}

th:last-child {
<!--  border-top-right-radius:3px;-->
  border-right:none;
}

tr {
  border-top: 1px solid #C1C3D1;
  border-bottom-: 1px solid #C1C3D1;
  color:#666B85;
  font-size:14px;
  font-weight:normal;
  text-shadow: 0 1px 1px rgba(256, 256, 256, 0.1);
}

tr:hover td {
  background:#606060;
  color:#FFFFFF;
  border-top: 1px solid #22262e;
  border-bottom: 1px solid #22262e;
}

tr:first-child {
  border-top:none;
}

tr:last-child {
  border-bottom:none;
}

tr:nth-child(odd) td {
  background:#EBEBEB;
}

tr:nth-child(odd):hover td {
  background:#4E5066;
}

tr:last-child td:first-child {
  border-bottom-left-radius:3px;
}

tr:last-child td:last-child {
  border-bottom-right-radius:3px;
}

td {
  background:#FFFFFF;
    padding:8px 10px;
  text-align:left;
  vertical-align:middle;
  font-weight:300;
  font-size:16px;
  text-shadow: -1px -1px 1px rgba(0, 0, 0, 0.1);
  border-right: 1px solid #C1C3D1;
}

td:last-child {
  border-right: 0px;
}

th.text-left {
  text-align: left;
}

th.text-center {
  text-align: center;
}

th.text-right {
  text-align: right;
}

td.text-left {
  text-align: left;
}

td.text-center {
  text-align: center;
}

td.text-right {
  text-align: right;
}
.table-form
{
  color:#D5DDE5;;
  background:#dbe3e6 !important;
  font-size:23px;
  font-weight: 100;
  padding:25px 10px;
  text-align:left;
  text-shadow: 0 1px 1px rgba(0, 0, 0, 0.1);
  vertical-align:middle;
  margin:0 auto;
  width:98%;
  overflow:hidden;

}
.table-form th
{
	background:none !important;
}
.table-form-box1
{
	float:left;
	width:30%;
}

.box-left
{
	width:30%;
	background:#000;
	float:left;
	margin-left:5px;
}
.box-left-text
{
	width:4%;
	float:left;
	margin:0px 5px;
	text-align:center;
	font-size:20px;
	color:#078;
	padding-top:5px;

}
.box-right-text
{
	float:right;
	color:#999;
	font-size:18px;

}
.table-form-first-child p
{
	float:left;
}
select
{
	width:100%;
	padding:5px;
	border:1px solid #fcfcfc !important;
	font-size:14px;
	color:#bbb;
}
.person-pp
{
	max-width:35px;
	max-height:35px;
	border-radius:1px;
	vertical-align:middle;
	margin-left:10px;
}
 .person-name
{
	text-decoration:none;
	color:#666B85;
	padding-left:10px;
}
.person-title
{
	font-size:12px;
	vertical-align:middle;
	color:000;
	padding-left:10px;
}
tr:hover .person-name
{
	color:#ffffff;
}
 tr:hover .person-title
{
	color:#ffffff;
}
@media (min-width:900px) and (max-width:1000px)
{
	.table-fill
	{
		max-width:91% !important;
	}
}

</style>

<div class="np_des_module_container_wrap"> <!--module_container start here-->

<div class="np_des_wrapper-inner"><!--wrapper inner start here-->


<div class="np_des_left_container fll" style="width:90%"> <!--left container start here-->
 <p class="contributors-title" style="margin-top:20px">  Our Contributor's List </p>

   <table class="table-fill">
   <div class="table-form">

       <div class="box-left">
       		<select id="filter_type">
                <option value="All" >All</option>
                <option value="PEER" >Peer</option>
                <option value="KING" >King</option>
            </select>
       </div>

   </div><!--table form end here -->
     <div class="clr"></div>
<thead>
<tr>
<th class="text-left">Rank</th>
<th class="text-left">Name</th>
<th class="text-left">Developer Bugs</th>
<th class="text-left">Design Issues</th>
<th class="text-left">Feedbacks</th>
<th class="text-left">Security Loop Holes</th>
</tr>
</thead>
<tbody class="table-hover" id="contributors_list">


</tbody>
</table>
</div> <!--left container end here-->

<div class="np_des_right_container flr"> <!--right container start here-->

    
</div>
<!--right container end here-->

</div> <!--wrapper inner closed here-->
</div> <!--module container end here-->
<div class="clearfix"></div>
<?php
$this->load->module('templates');
$this->templates->footer();
?>