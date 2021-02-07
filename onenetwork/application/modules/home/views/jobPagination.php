<?php if($jobresult){ foreach($jobresult as $jobData){?>
    <div class="codes_discussion_rightboxdivnewcontent">
        <div class="codes_connections_leftandright_box fll">
            <span class="fll"> <a href="<?php echo base_url().'profile/companyProfile/'.$jobData['company_aid'];?>"><img alt="logo" src="<?php if($jobData['logo_path']!=""){ echo base_url().'data/images/logo/vsi/'.$jobData['logo_path'];}else{ echo base_url().'data/images/logo/vsi/noimage.png';} ?>"/> </a></span>
        </div>
        <div class="codes_whitebginsidediv flr">
            <div class="fll codes_whitebginsrightbox">
                <p class="fs16"> <a href="<?php echo base_url().'home/jobsView/'.$jobData['job_id'];?>"><?php echo $jobData['role'];?>  </a></p>
                <p> <span>posted by:</span><span class="gray"><?php echo $jobData['company_name'];?> </span>  </p>
            </div>
            <span class="flr np_des_mar10 fs11"> Date : <?php echo date('j F Y',strtotime($jobData['posted_on'])); ?></span>
            <div class="clearfix"></div>
            <p class="flr"><a href="<?php echo base_url().'home/jobsView/'.$jobData['job_id'];?>"><input type="button" value="view " class="codes_viewbtn np_des_mat25 np_des_mar5 flr" name="button"></a></p>
        </div>
    </div>
<?php }}else{ ?>
    <div class="nodata"> No Data Found </div>
<?php } ?>
