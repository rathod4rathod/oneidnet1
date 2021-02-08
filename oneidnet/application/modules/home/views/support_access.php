<?php
$this->load->module('templates');
$this->templates->content_header();
?>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css"/>
<div class="middle_content">
    <!-- Start Left -->

    <div class="main_content_left">
        <div class="left_links">
            <ul>
            	<?php 
                    $obj = $this->load->module('cookies');
                    $db_api = $this->load->module('db_api');
                    $sup_query = "SELECT * FROM iws_profiles iws INNER JOIN oneid_support os ON os.one_email = iws.email WHERE profile_id='".$obj->getUserID()."'";
                    $emp_rest = $db_api->custom($sup_query);
                    if($emp_rest){
                    	foreach($emp_rest as $elist){
                    echo 
                    '<div style="margin-bottom: 16px;background: rgba(255, 255, 255, .2);padding: 19px;border-radius: 8%;">
                        <span style="font-size: 20px;"><a href="'.base_url().'home/emp_support_access?suser='.$elist['one_username'].'" style="color: cornflowerblue;">'.$elist['one_username'].'</a></span>
                        <br />
                        <br />
                        <span style="font-size: 15px;color: white;">'.$elist['one_module'].'</span>
                        </div>';
                } } ?>
            </ul>
        </div>
    </div>
    <div class="main_content_right">
        <div class="main_content_right_scroll">
        	<a name="top"></a>
            <div class="main_content_video" style=" text-align: center">
                <iframe width="100%" height="100%" src="https://tszmail.oneidnet.com" frameborder="0" allowfullscreen></iframe>
            </div>
	    </div>
	</div>
</div>
</body>
</html>
<script type="text/javascript">
</script>