<?php 

 if($genericresults[0]['id']!=''){
 foreach($genericresults as $genericresult){
       $todaydate = strtotime(date('m/d/y'));
       $enddate = strtotime($genericresult['enddate'])
     
	?>
	<li class="task-item">
<div class="ticket-user col-sm-12 pal10 pat10">

<span class="user-name padding-5 searchstring "> <?php echo $genericresult['name'] ?> </span>
</div>
<div class="task-time"> <?php if($enddate >$todaydate){echo "Active"; }else{ echo "Inactive" ;} ?> </div>
<div class="task-assignedto"><?php echo $genericresult['amount']  ?>/-</div>
</li>


<?php } } else{ echo "0";	 } ?>
