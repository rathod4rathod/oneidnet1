<?php
if($result[0]['id']!=""){
foreach($result as $celebratyuserdata){?>
<div class="peoples_box_mainwrap">
    <p class="peoples_box_leftlogo"> <img src="assets/basic_info/images/logos/buzzin.png" width="50" height="50" > </p>
<!--    <p class="flr"> <input type="button" value="Click it" class="button_box2"> </p>-->
    <div class="peoples_box_middle_image">
        <img src="<?php if($celebratyuserdata['profile_image_path']){
                      echo BUZZINURL."udata/avatar/orig/".$celebratyuserdata['profile_image_path'];
                    }else{
                      echo BUZZINURL."assets/Images/avatar.png";
                    }?>"  width="50" height="50" >
    </div>
    <a href="<?php echo ONEIDNETURL."redirection/?url=".BUZZINURL."pviews/profile_Display/"?><?php echo $celebratyuserdata['id'];?>"><p class="peoples_box_middle_image_name"> <?php echo ucfirst($celebratyuserdata['orignal_name']);?> </p></a>
</div>
<?php }}
 else {
echo "No Data";
}
?>

