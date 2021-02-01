<?php
$this->load->module("templates");
$this->templates->basic_info_header();
$this->templates->basic_info_subheader()
?>
<input type="hidden" value="<?php echo $sid; ?>" id="qid">
<input type="hidden" value="<?php echo $sval; ?>" id="qval">
</div>

<style type="text/css">

label {
	color: #999;
	font-size: 12px;
	font-weight: normal;
	position: absolute;
	pointer-events: none;
	left: 5px;
	top: 10px;
	transition: 0.2s ease all;
	-moz-transition: 0.2s ease all;
	-webkit-transition: 0.2s ease all;
}
</style>




<div class="clearfix"></div>
<div class="oneidnet_wraper">

    <div class="oneidusers_wrap">
    	<ul id="pageusers">
        </ul>
        <div class="notfound">Sorry, data not found</div>
    </div>

</div>


 <!--module container end here-->

<div class="clearfix"></div>

<?php $this->templates->basic_info_footer();?>

<script src="<?php echo base_url()."assets/microjs/addcontacts.js"; ?>"></script>
