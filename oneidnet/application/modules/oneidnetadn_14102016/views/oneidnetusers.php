<script src="<?php echo base_url().'assets/js/jquery-1.11.2.min.js'?>"></script>
<script src="<?php echo base_url().'assets/js/path.js'?>"></script>
<!DOCTYPE html>
<html>
    <head>
        <title>Oneidnet - Registered Users</title>
        <link rel="icon" href="<?php echo base_url(); ?>assets/Images/oneidlogo.png" type="image/png">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/regusers.css">
    </head>
    <body>
        <nav>
            <img src="<?php echo base_url(); ?>assets/Images/logo.png" class="logo" />
        </nav>
        <div class="main_wrap" id="usermainframes">
            <div class="heading">
                <h1>Registered Users                 
                <span class="total_users"><b>Inactive users:</b><?php echo $usercount[0]["inactiveusers"]; ?>  </span>
                <span class="total_users"><b>Active users:</b><?php echo $usercount[0]["activeusers"]; ?>  </span>
                <span class="total_users"><b>Total users:</b><?php echo $usercount[0]["totalusers"]; ?>  </span>
                </h1>
            </div>
            <div class="search_box">
                <form>
                    <div class="form-horizontal">
                        <div class="form-group">
                            <label class="form-label" for="country">Country:</label>
                            <div class="select">
                                <select class="form-control" id="regcountry">
                                    <option value="">Select country</option>
                                    <?php foreach($countrydata as $countrydatainfo){
                                        ?>
                                    <option value="<?php echo $countrydatainfo["country_id"] ?>"><?php echo $countrydatainfo["country_name"] ?></option>
                                            <?php
                                    }?>
                                    
                             </select> 
                            </div>
                       </div>
                        <div class="form-group">
                            <label class="form-label" for="status">Status:</label>
                            <div class="select">
                            <select class="form-control" id="regstatus">
                                    <option value="">Select status</option>
                                    <option value="1">Active</option>
                                    <option value="0">Inactive </option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="Date">Date</label>
                            <div class="select">
                            <select class="form-control" id="regdate">
                                    <option value="">Select date</option>
                                    <option value="1D">1 day ago</option>
                                    <option value="2D">2 days ago </option>
                                    <option value="1W">1 Week ago </option>
                                    <option value="2W">2 Weeks ago </option>
                                    <option value="1MON">1 Month ago </option>
                                    <option value="2MON">2 Months ago </option>                                    
                                </select>
                            </div>
                        </div>
                    </div>                    
                </form>
            </div>
         
        <table cellpadding="0" cellspacing="0" border="0" width="100%" class="table" >
            <tr>
                <th>Full Name</th>
                <th>Country</th>
                <th>Status</th>
                <th width="15%">Registered Date</th>
            </tr>
            <tbody id="users">
                
            </tbody>
        </table> 
        </div>
   </body>
</html>
<script>    
    var mtnhit = "yes",load_mtn_count=0;    
    function getusers(ucount){
    //     var regcountry:trim($("#regcountry").val()),regstatus:trim($("#regstatus").val()),regdate:trim($("#regdate").val());
   
        $("#usermainframes").append("<img style='margin-left:45%;' src='"+oneidnet_url+"assets/Images/wait_progress.gif'>");
    $.get(oneidnet_url+"oneidnetadn",{tk:"users",
        ucount:ucount,
        regcountry:$.trim($("#regcountry").val()),regstatus:$.trim($("#regstatus").val()),regdate:$.trim($("#regdate").val())},function(e){
        $("#usermainframes").find("img").remove();
        if($.trim(e)!="NOREC"){
			
            mtnhit = "yes";
        $("#users").append(e);
        load_mtn_count=load_mtn_count+30;
        }else{
            mtnhit == "no";            
             $("#users").append("<h1>No more records are found</h1>");
        }
    });    
    }
    
    
    
    
    
    
    
    
    
    
    getusers(load_mtn_count);
    $(window).scroll(function () {
        if (mtnhit == "yes")
        {
            if ((($(window).scrollTop() + window.innerHeight) >= $(document).height())) {
                    mtnhit = "no";
                getusers(load_mtn_count);
            }
        }
    });
$("#regcountry,#regstatus,#regdate").change(function(){
    $("#users").html("");
    load_mtn_count=0;mtnhit = "yes"
    getusers(load_mtn_count);
   
});
</script>
