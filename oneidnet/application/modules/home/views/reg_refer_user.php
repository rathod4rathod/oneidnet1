<!DOCTYPE html>
<html lang="en">
<head>
  <title>ONE ID NET</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script src="<?php echo base_url() . 'assets/js/custom.js' ?>"></script> 
  <style>
    /* Remove the navbar's default margin-bottom and rounded borders */ 
    .navbar {
      margin-bottom: 0;
      border-radius: 0;
    }
    
    /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
    .row.content {height: 450px}
    
    /* Set gray background color and 100% height */
    .sidenav {
      padding-top: 20px;
      background-color: #f1f1f1;
      height: 100%;
    }
    
    /* Set black background color, white text and some padding */
    footer {
      background-color: #555;
      color: white;
      padding: 15px;
    }
    
    /* On small screens, set height to 'auto' for sidenav and grid */
    @media screen and (max-width: 767px) {
      .sidenav {
        height: auto;
        padding: 15px;
      }
      .row.content {height:auto;} 
    }
  </style>
</head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <!-- <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button> -->
      <a class="navbar-brand" style="height: 140px;text-align: center;" href="#"><img src="https://www.oneidnet.com/assets/Images/logo.png"></a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <!-- <ul class="nav navbar-nav">
        <li class="active"><a href="#">Home</a></li>
        <li><a href="#">About</a></li>
        <li><a href="#">Projects</a></li>
        <li><a href="#">Contact</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
      </ul> -->
    </div>
  </div>
</nav>
  
<div class="container-fluid text-center">    
  <div class="row content">
    <div class="col-sm-2 sidenav">
<!--       <p><a href="#">Link</a></p>
      <p><a href="#">Link</a></p>
      <p><a href="#">Link</a></p> -->
    </div>
    <div class="col-sm-8 text-left"> 
      <h1>Welcome</h1>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
      <hr>
        <div class="form-group">
          <label>Set Your Username:</label>
          <input type="text" class="form-control" style="width: 50%" name="n_username" id="n_username">
          <div id="res" class="suggestionForUserID" style=''></div>
          <input type="hidden" class="form-control" name="n_refer" id="n_refer" value="<?php echo $refercode ?>">
          <!-- <input type="hidden" class="form-control" name="n_username" id="n_username" value="<?php echo $nusername ?>">
          <input type="hidden" class="form-control" name="n_pass" id="n_pass" value="<?php echo $pass ?>"> -->
          <input type="hidden" class="form-control" name="n_store" id="n_store" value="<?php echo $storecode ?>">
          <p id="email_error" style="display: none;color: #d20000"> Please enter valid email address </p>
        </div>
        <div>
          <input type="checkbox"  value="true" id="nreg_termsconditions"> <a href="<?php echo base_url() . 'home/terms_conditions' ?>" target="_blank">You agree with our terms of service</a>
          <p id="term_error" style="display: none;color: #d20000"> Please Check the box</p>
        </div>
        <br/>
        <a href="javascript:void(0);"><button type="submit" id="nreg_btn" class="btn btn-default">Submit</button></a>
    </div>
    <div class="col-sm-2 sidenav">
    </div>
  </div>
</div>
</body>
<script type="text/javascript">
  function generateRandomString(length) {
    var text = "";
    var possible = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
     
    for (var i = 0; i < length; i++)
      text += possible.charAt(Math.floor(Math.random() * possible.length));
     
    return text;
  }
  function is_Valid_Email(e) {
    var s = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/,
        r = !1;
    return s.test(e) && (r = !0), r
  }

  function is_Alpha_Neumeric_Dot_Only(s_data) {
    var uname_pattern = /^[a-z][a-z0-9\.]*$/i;
    var flag = false;
    if (uname_pattern.test(s_data)) {
      flag = true;
    }
        return flag;
    }

    $(".n_username").blur(function (e) {
      e.preventDefault(  );
      var uname = $(this).val();
      var flag = true;
      if (uname.length != 0) {
        var firstchar = uname.slice(0, 1);
        if (isNaN(firstchar)) {
          if (!is_Alpha_Neumeric_Dot_Only(uname)) {
              flag = false;
              $('#n_username').addClass("redfoucusclass");
          }
        } else {
          flag = false;
          $('#n_username').addClass("redfoucusclass");
        }
      } else {
        flag = false;
      }

      if (flag == false) {
        return false;
      }

                var data = "username=" + uname;

                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url() . 'index.php/home/getUser_name' ?>",
                    data: data,
                    dataType: 'html',
                    beforeSend: function (  ) {
                    },
                    complete: function (  ) {
                    },
                    success: function (data) {
                        var obj = $.parseJSON(data);
                        var result = '';
                        if (obj.length > 0) {
                            $("#res").show();
                            result += "<span id='errormsg'>The username alreday exist. Try another?</span><br>";
                            result += "<table id='tbl'>";
                            result += "<tr><td>Available: </td>"
                            result += "<td><a href='' class='suggest1' id='" + obj[0] + "' >" + obj[0] + "</a></td>"
                            result += "<td><a href='' class='suggest1' id='" + obj[1] + "' >" + obj[1] + "</a></td></tr>";
                            result += "<tr><td></td>"
                            result += "<td><a href='' class='suggest1' id='" + obj[2] + "' >" + obj[2] + "</a></td>"
                            result += "<td><a href='' class='suggest1' id='" + obj[3] + "' >" + obj[3] + "</a></td></tr>";
                            result += "</table>";
                            $("#res").html(result);

                            $("#errormsg").css('color', '#f00');
                            $("#successmsg").css('color', '#009');

                            /** Add suggest name to the input box **/
                            $('.suggest1').click(function (e) {
                                e.preventDefault();
                                var suggestname = $(this).attr('id');
                                $(".n_username").addClass("search");
                                $(".n_username").val(suggestname);
                                $("#res").hide();
                            });
                        } else {
                            $("#res").hide();
                            $(".n_username").addClass("search");
                            $(".n_username").val(uname);
                        }
                    }//end of success
                });
            });

            $(".n_username").focus(function () {
                $("#res").hide();
                $(".n_username").removeClass("search");
            });

  $("#nreg_btn").click(function() {
        var e;
        var gpass = generateRandomString(6);
        // var nemail = $("#n_email").val();
        var nrefer = $("#n_refer").val();
        var nusername = $("#n_username").val();
        var npass = gpass;
        var nstore = $("#n_store").val();
          // if(0 == is_Valid_Email(nemail) || nemail==""){
          //   e=false;
          //   $("#email_error").css("display","block");
          // }

          // if($("#nreg_termsconditions").is(":checked")==false){
          //   e=false;
          //   $("#term_error").css("display","block");
          // }

          $.ajax({
            type: "post",
            data: {nrefer: nrefer,nusername: nusername,npass: npass,nstore: nstore},
            url: "https://www.oneidnet.com/registration/nregactivation_email",
            success: function(data) {
              if($.trim(data) == "exist"){
                alert("Username Already Exist! Please Try with different username");
                // window.location.href = "https://www.oneidnet.com/";
              }
              else {
                window.location.href = "https://www.oneidnet.com/" + data;
              }
              // alert(data);
            }
          });
    });
</script>
</html>
