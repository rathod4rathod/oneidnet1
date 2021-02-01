<?php
if($result[0]['user_id_fk']!=""){
foreach($result as $professionaluserdata){?>
<div class="peoples_box_mainwrap">
    <p class="peoples_box_leftlogo"> <img src="assets/basic_info/images/logos/netpro.png" width="50" height="50" > </p>
<!--    <p class="flr"> <input type="button" value="Add Connect" class="button_new">-->
    <div class="peoples_box_middle_image">
        <img src="<?php if($professionaluserdata['image_path']){
                      echo NETPROURL."udata/avatar/mi/".$professionaluserdata['image_path'];
                    }else{
                      echo NETPROURL."assets/images/avatar.png";
                    }?>"  width="50" height="50" >
    </div>
    <a href="<?php echo ONEIDNETURL."redirection?url=".NETPROURL.'pprofile/profilepage/';?><?php echo $professionaluserdata['user_id'];?>"><p class="peoples_box_middle_image_name"><?php echo ucfirst($professionaluserdata['profile_name']);?></p></a>
</div>
<?php }}
 else {
echo "No Data";
}
?>

