<?php 
 if($genericresults[0]['id']!=''){
 foreach($genericresults as $genericresult){
       $todaydate = strtotime(date('m/d/y'));
       $enddate = strtotime($genericresult['enddate'])
     
	?>
	<li class="task-item">
<div class="ticket-user col-sm-12 pal10 pat10">
<img class="new-avatar" src="img.jpg">
<span class="user-name padding-5"> <?php echo $genericresult['name'] ?> </span>
</div>
<div class="task-time"> <?php if($status=='WAITING'){ echo "Waiting"; }else if($status=='APPROVED'){ echo "Approved" ;}else{ echo "Rejected";} ?> </div>
<div class="task-assignedto"><?php //echo $genericresult['amount']  ?></div>
</li>


<?php } } else{  ?>
	
	<li class="task-item">
<div class="ticket-user col-sm-12 pal10 pat10">
<img class="new-avatar" src="img.jpg">
<span class="user-name padding-5"> <?php echo "No data"; ?> </span>
</div>
<div class="task-time"> </div>
<div class="task-assignedto"></div>
</li>
<?php	 } ?>
