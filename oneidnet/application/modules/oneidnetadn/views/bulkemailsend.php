<!DOCTYPE>
<html>
<head>
<script src="<?php echo base_url().'assets/js/jquery-1.11.2.min.js'?>"></script>
<script src="//cdn.ckeditor.com/4.5.11/standard/ckeditor.js"></script>
<meta charset="utf-8" />
<title>::Bulk Email-oneidnet::</title>

<style>
body{font-family:Arial, Helvetica, sans-serif; margin:0; padding:0;}
.form-wrapper{margin:0 auto; max-width:700px; width:100%; padding:20px;}
.form-wrapper .form-wrap .form-field{ border:1px solid #dadada; background:#fff; font-size:16px; padding:12px 15px; border-radius:3px; width:100%; resize:none; -webkit-box-shadow: inset 1px 1px 5px 0px rgba(235,235,235,1);
-moz-box-shadow: inset 1px 1px 5px 0px rgba(235,235,235,1);
box-shadow: inset 1px 1px 5px 0px rgba(235,235,235,1);}
.form-wrapper .form-wrap .form-field:focus{box-shadow:0px 0px 4px rgba(18, 190, 234, 0.4);}
.form-wrapper .form-wrap{margin-bottom:20px;}
.button{ float:right; background:#0a80a7; padding:12px 30px; color:#fff; border-radius:3px; border:none; font-size:16px; outline:none; cursor:pointer;}

.emails{min-height:60px; height: auto; max-height: 200px; overflow: auto;}

.fileUpload {
    position: relative;
    overflow: hidden;
	margin-bottom:20px;
	cursor:pointer;
}
.fileUpload input.upload {
    position: absolute;
    top: 0;
    left: 0;
    margin: 0;
    padding: 0;
    font-size: 20px;
    cursor: pointer;
    opacity: 0;
    filter: alpha(opacity=0);
	height:42px;
}

.upload-bg{background:#d3394c; display:inline-block; padding:12px 30px; border-radius:3px; color:#fff; cursor:pointer;}
</style>
</head>

<body>
	<div class="form-wrapper">
            <form id="upload_file" method="POST" name="sendmails" enctype="multipart/form-data">
        	<p>To</p>
            <div class="form-wrap">
                <textarea class="form-field emails" placeholder="Email" name="mails" id="emails" rows="1"></textarea>
            </div>
    <div class="fileUpload btn btn-primary">
    <span class="upload-bg">Choose CSV file</span>
    <input type="file" class="upload" id="csv_upload_file" name="csvfile"/>
    </div>
            <div class="form-wrap">
            <input type="text" class="form-field" placeholder="Subject" name="subject" id="subject">
            </div>
            <div class="form-wrap">
            <textarea class="form-field" rows="5" name="message" id="message" ></textarea>
            </div>
            

            <div class="form-wrap">
                <button name="send" class="button" id="send">Send</button>
            </div>
        </form>
    </div>
</body>
</html>

<script>
        $('#csv_upload_file').change(function(){
        var formData = new FormData();
        formData.append('csvfile', $('input[type=file]')[0].files[0]);

        $.ajax({
        url:"<?php echo base_url() ?>oneidnetadn/getdatacsv",
        type: "POST",             // Type of request to be send, called as method
        data: formData,         // Data sent to server, a set of key/value pairs (i.e. form fields and values)
        contentType: false,       // The content type used when sending data to the server.
        cache: false,             // To unable request pages to be cached
        processData:false,        // To send DOMDocument or non processed data file it is set to false
        success: function(data)   // A function to be called if request succeeds
        {
         $('#emails').val($.trim(data));
        }
        });
    
    });
    
    $('#send').click(function(e){
        e.preventDefault();
        var value = CKEDITOR.instances['message'].getData();
        var formData = new FormData();
        formData.append('emails', $('#emails').val());
        formData.append('subject', $('#subject').val());
        formData.append('message', value);

        //var formData =$('#upload_file').serialize();
        
        $.ajax({
        url:"<?php echo base_url() ?>oneidnetadn/bulkmails",
        type: "POST",             // Type of request to be send, called as method
        data: formData,         // Data sent to server, a set of key/value pairs (i.e. form fields and values)
        contentType: false,       // The content type used when sending data to the server.
        cache: false,             // To unable request pages to be cached
        processData:false,        // To send DOMDocument or non processed data file it is set to false
        success: function(data)   // A function to be called if request succeeds
        {
         if(data="error")
         alert(data);
        }
        });
    
    });
    CKEDITOR.replace( 'message' );
</script>
