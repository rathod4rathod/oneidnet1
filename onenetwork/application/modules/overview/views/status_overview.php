
<div class="statistics_single_table_wrap margin-5">

    <div class="statistics_total_wqrap_two wi100pstg">

        <div class="preference_top_heading_wrap_newbox">
            <div class="preference_top_heading_middle-content"> 
                <div class="statistics_preference_box2_newbox"> Country </div>
                <div class="statistics_preference_box2_newbox"> Count </div>
            </div>
        </div>
<?php
	$this->load->module("overview");
        if($overview_type=="GMA"){
            $headCount = $this->overview->getCountryData($entity_id);
        }else{
            $headCount = $this->overview->getcountByCountry($entity_id);
        }
 if($headCount) {
	foreach($headCount as $res_data) {
		if($res_data['UserCount'] > 0) {
	?>
		<div class="preference_bottom_content_wrap_new2box">
            <div class="preference_top_heading_middle-content">
                <div class="statistics_status_cont_newdiv"> <p class="fll"><?php echo $res_data['country_name']; ?></p> </div>
                <div class="statistics_status_cont_newdiv"> <p class="fll"><?php echo $res_data['UserCount']; ?></p> </div>
            </div>
        </div>
   <?php
	}  }}else {
            echo '<div class="preference_bottom_content_wrap_new2box">No Country Data</div>';
 }
?>

    </div>

</div>
<div class="statistics_single_table_wrap margin-5">

    <div class="statistics_total_wqrap_two wi100pstg">

        <div class="preference_top_heading_wrap_newbox">
            <div class="preference_top_heading_middle-content"> 
                <div class="statistics_preference_box2_newbox"> City </div>
                <div class="statistics_preference_box2_newbox"> Count </div>
            </div>
        </div>
<?php
	$this->load->module("overview");
        if($overview_type=="GMA"){
            $headCount = $this->overview->getCityData($entity_id);
        }else{
            $headCount = $this->overview->getcountByCity($entity_id);
        }
	//$headCount = $this->overview->getcountByCity($promo_id);	
        if($headCount) {
		foreach($headCount as $res_data) {
			if($res_data['UserCount'] > 0) {
		?>
			<div class="preference_bottom_content_wrap_new2box">
				<div class="preference_top_heading_middle-content">
					<div class="statistics_status_cont_newdiv"> <p class="fll"><?php echo $res_data['city_name']; ?></p> </div>
					<div class="statistics_status_cont_newdiv"> <p class="fll"><?php echo $res_data['UserCount']; ?></p> </div>
				</div>
			</div>
	   <?php
		}}} else {
			echo '<div class="preference_bottom_content_wrap_new2box">No City Data</div>';
		}
?>

    </div>

</div>

<!--
<div class="statistics_single_table_wrap margin-5">

    <div class="statistics_total_wqrap_two wi100pstg">

        <div class="preference_top_heading_wrap_newbox">
            <div class="preference_top_heading_middle-content"> 
                <div class="statistics_preference_box2_newbox"> FRIENDS </div>
                <div class="statistics_preference_box2_newbox"> STATUS </div>
            </div>
        </div>

        <div class="preference_bottom_content_wrap_new2box">
            <div class="preference_top_heading_middle-content">
                <div class="statistics_preference_box_content_new2box"> <p class="fll">360 mail</p> </div>
                <div class="statistics_preference_box_content_new2box"> <p class="fll">360 mail</p> </div>
            </div>
        </div>

        <div class="preference_bottom_content_wrap_new2box">
            <div class="preference_top_heading_middle-content">
                <div class="statistics_preference_box_content_new2box"> <p class="fll">360 mail</p> </div>
                <div class="statistics_preference_box_content_new2box"> <p class="fll">360 mail</p> </div>
            </div>
        </div>

        <div class="preference_bottom_content_wrap_new2box">
            <div class="preference_top_heading_middle-content">
                <div class="statistics_preference_box_content_new2box"> <p class="fll">360 mail</p> </div>
                <div class="statistics_preference_box_content_new2box"> <p class="fll">360 mail</p> </div>
            </div>
        </div>
    </div>

</div>-->


<!--<div class="statistics_single_table_wrap margin-5">

    <div class="statistics_total_wqrap_two wi100pstg">

        <div class="preference_top_heading_wrap_newbox">
            <div class="preference_top_heading_middle-content"> 
                <div class="statistics_preference_box2_newbox"> FRIENDS </div>
                <div class="statistics_preference_box2_newbox"> STATUS </div>
            </div>
        </div>

        <div class="preference_bottom_content_wrap_new2box">
            <div class="preference_top_heading_middle-content">
                <div class="statistics_preference_box_content_new2box"> <p class="fll">360 mail</p> </div>
                <div class="statistics_preference_box_content_new2box"> <p class="fll">360 mail</p> </div>
            </div>
        </div>

        <div class="preference_bottom_content_wrap_new2box">
            <div class="preference_top_heading_middle-content">
                <div class="statistics_preference_box_content_new2box"> <p class="fll">360 mail</p> </div>
                <div class="statistics_preference_box_content_new2box"> <p class="fll">360 mail</p> </div>
            </div>
        </div>

        <div class="preference_bottom_content_wrap_new2box">
            <div class="preference_top_heading_middle-content">
                <div class="statistics_preference_box_content_new2box"> <p class="fll">360 mail</p> </div>
                <div class="statistics_preference_box_content_new2box"> <p class="fll">360 mail</p> </div>
            </div>
        </div>
    </div>

</div>-->