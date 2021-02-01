<style>
    body{width:100%; height: 100%; margin: 0px; padding: 0px; background: #fff;}
    .login-expired-wrap{ position: relative; display: table; width: 100%; height: 100%;}
    .login-expired-wrap .login-message{ display: table-cell; vertical-align: middle; width: 100%; height: 100%; text-align: center;}
    .login-expired-wrap .login-message h1{ font-size: 28px; color: #e74e07; font-family: arial;}
    .login-expired-wrap .login-message h4{font-size: 18px; font-weight: normal; color: #28a0dd; font-family: arial; cursor: pointer;}
    .myText{
        margin:60px;
        padding: 50px;
        float: right;
    }
</style>
<!-- <div class="login-expired-wrap">
    <div class="login-message">
        <h1>Your login session has expired11</h1>
        <h4 id="demo">Please login to oneidnet</h4>
    </div>

</div> -->
<script>
var myhtml =''
myhtml += '<div class="np_newpopuup_bgcontainer">';
myhtml += '<div class="np_popupcontainer_middlebox">';
myhtml += '<div class="login-expired-wrap">';
myhtml += '<div class="login-message">';
myhtml += '<h1>Your login session has expired</h1>';
myhtml += '<h4 id="demo" class="myText">Please login to oneidnet</h4>';
myhtml += '</div>';
myhtml += '</div>';
myhtml += '</div>';        
  $("#os_popup").css("display","block").html(myhtml);
    document.getElementById("demo").addEventListener("click", myFunction);
    function myFunction() {
       window.top.location.href = "https://www.oneidnet.com/";
    }
</script>