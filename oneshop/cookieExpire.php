<style>
    body{width:100%; height: 100%; margin: 0px; padding: 0px; background: #fff;}
    .login-expired-wrap{ position: relative; display: table; width: 100%; height: 100%;}
    .login-expired-wrap .login-message{ display: table-cell; vertical-align: middle; width: 100%; height: 100%; text-align: center;}
    .login-expired-wrap .login-message h1{ font-size: 28px; color: #e74e07; font-family: arial;}
    .login-expired-wrap .login-message h4{font-size: 18px; font-weight: normal; color: #28a0dd; font-family: arial; cursor: pointer;}
</style>


<div class="login-expired-wrap">
    <div class="login-message">
        <h1>Your login session has expired</h1>
        <h4 id="demo">Please login to oneidnet</h4>
    </div>
</div>
<script>
    document.getElementById("demo").addEventListener("click", myFunction);
    function myFunction() {
       window.top.location.href = "https://www.oneidnet.com/";
    }
</script>