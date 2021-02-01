
<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery-1.11.2.min.js"></script>
<form id="profile_image" method="post" enctype="multipart/form-data">
         <input type="file" id="profile_image_path" name="bgChangeField">
       </form>
<div id="crp"></div>
<script>
$('input[type="file"]#profile_image_path').bind('change', function (e) {

         e.preventDefault();
         var files = e.originalEvent.target.files;
         var file_name = files[0].name;
         var file_size = files[0].size;
         var file_type = files[0].type;
         if (file_size <= 512000 && (file_type == 'image/gif' || file_type == 'image/jpg' || file_type == 'image/png' || file_type == 'image/jpeg')) {
             $('#profile_image').submit();

         } else {

             if (file_size > 512000) {
                 alert("Allow file size should be below 500kb");
             } else {
                 alert("Allow file type should be jpg|png|gif|jpeg");
             }
         }
     });

     $('#profile_image').submit(function () {
         $.ajax({
             type: 'POST',
             url: oneidnet_url+ "index.php/home/basic_profile_image_update",
             data: new FormData(this),
             processData: false,
             contentType: false,
             success: function (data) {
                 
                 $.get(oneidnet_url + "index.php/basicinfo/crop_here/"+$.trim(data),function(data){
                         
                        $("#crp").html(data);
                   });
             }
         });
         return false;
     });
</script>








       