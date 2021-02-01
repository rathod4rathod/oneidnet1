<div class="mmHeader buzzin" onDblClick="mmRestore(this)">
		<span class="mmhoptions">
			<ul>
          <li class="mmhoDelete"><img src="<?php  echo base_url().'assets/'?>Images/delete.png"></li>
          <li class="mmhoRestore bzntf_count" style="display:none"><p id="buzzin_notification_cnt"></p></li>
			</ul>
		</span>
</div>
    
	<div class="mmContainer" id="buzzinContainer">
	<div class="microBuzzinContentWrapper buzzin">
		<div class="mmContentWrapperType1">
			<div class="mmcMainWrapper">
                
                <div class="mmcMainSlideWrapper">
                <?php
                $this->load->module("notifications");
                $this->notifications->buzzin_notify_tpl();
                ?>
                	
				</div>
                
			</div>            
		</div>
	</div>
	</div>
<script type="text/javascript">
  $(document).ready(function(){
    $.ajax({
      type:"post",
      url: oneidnet_url+"index.php/notifications/notification_total_count",
      success:function(data){  
          if(data!=0){
              $(".bzntf_count").show();
              $("#buzzin_notification_cnt").html(data);
          }else{
              $("#bzntf_count").hide();
          }
      }
    });
  });
</script>