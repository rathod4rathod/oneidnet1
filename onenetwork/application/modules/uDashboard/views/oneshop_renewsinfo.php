<?php
if($oneshoprenews!=0){
 foreach($oneshoprenews as $result){
      $path =  str_replace('/onenetwork', '/oneshop',base_url()); 
    if($result['profile_image_path']!=''){
         $profileimg = $path.'stores/'.$result['store_code'].'/SDT/'.$result['profile_image_path'];

}else{
        $profileimg =$path.'assets/images/default_store_100.png';
    }
        
               ?>
<li class="task-item">
<div class="ticket-user col-sm-12 pal10 pat10">
<img src="<?php  echo $profileimg ?>" class="new-avatar">
<span class="user-name padding-5 searchstring "> <?php echo $result['store_name'];  ?>  <br>
    <span class="pal40"> Buy on: <?php echo date('j M Y' ,strtotime($result['renewed_on'])) ?> </span>
</span>

</div>
<div class="task-time searchstring1"> <?php if($result['is_renewed']==0){ echo "Active" ;}else{ echo "Inactive" ;}  ?> </div>
<div class="task-assignedto">&nbsp;</div>
</li>
<?php } }else{ echo 0 ; } ?>