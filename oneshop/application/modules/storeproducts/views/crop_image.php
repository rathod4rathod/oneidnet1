
<script type="text/javascript" src="<?php echo base_url();?>assets/scripts/jquery.Jcrop.js"></script>
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/jquery.Jcrop.css" type="text/css">
  <!DOCTYPE html>
<html lang="en">
    <head>
        <title>Live Cropping Demo</title>
       
        <script type="text/javascript">

            $(function () {

                $('#cropbox').Jcrop({
                    aspectRatio: 1,
                    onSelect: updateCoords
                });

            });

            function updateCoords(c)
            {
                $('#x').val(c.x);
                $('#y').val(c.y);
                $('#w').val(c.w);
                $('#h').val(c.h);
            }
            ;

            function checkCoords()
            {
                if (parseInt($('#w').val()))
                    return true;
                alert('Please select a crop region then press submit.');
                return false;
            }
            ;

        </script>
        <style type="text/css">
            #target {
                background-color: #ccc;
                width: 500px;
                height: 330px;
                font-size: 24px;
                display: block;
            }
        </style>
    </head>
    <body>
        <div class="jc-demo-box">


            <!-- This is the image we're attaching Jcrop to -->

            <!-- This is the form that our event handler fills -->
            <!--<form action="crop.php" method="post" onsubmit="return checkCoords();" enctype="multipart/form-data">-->
            <form  id="cropimage_sub" method="post"  enctype="multipart/form-data">
              <?php
                $ini_filename =  "temp/".$crp_img;
                $size = 350;
                 list($originalWidth, $originalHeight) = getimagesize($ini_filename);
                $ratio = $originalWidth / $originalHeight;
                $targetWidth = $targetHeight = min($size, max($originalWidth, $originalHeight));

                if ($ratio < 1) {
                    $targetWidth = $targetHeight * $ratio;
                } else {
                    $targetHeight = $targetWidth / $ratio;
                }
                $ini_x_size = getimagesize($ini_filename)[0];
                if($ini_x_size>350){
                     $acpt_ratio = $ini_x_size/350;
                }                ?>
                <img src='<?php echo base_url()."temp/".$crp_img;?>' id="cropbox"  width="<?php echo $targetWidth ?>" height="<?php echo $targetHeight ?>" />
                <?php
                if(isset($acpt_ratio)){
                    ?>
                        <input type="hidden"  name="acpt_ratio" id="acpt_ratio" value="<?php echo $acpt_ratio; ?>"/>
                <?php
                }
                ?>
                
                <input type="hidden" value="<?php echo $crp_img;?>" name="temp_name" id="temp_name" />
                <input type="hidden" id="x" name="x" />
                <input type="hidden" id="y" name="y" />
                <input type="hidden" id="w" name="w" />
                <input type="hidden" id="h" name="h" />
                <input type="submit" id="cropimage" name="cropimage" value="Crop Image" class="button_new cropbutton" />
                
            </form>
        </div>
    </body>
</html>
       
