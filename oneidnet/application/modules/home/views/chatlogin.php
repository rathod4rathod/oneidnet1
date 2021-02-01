<?php
session_start();




if(!isset($_SESSION["vuser"])){
//    echo "<pre>";print_R($_REQUEST);echo "</pre>";
    if(isset($_REQUEST["user"])){
        $_SESSION["vuser"]=$_REQUEST["user"];
        header('Location: v.php');
    }
    
?>


<form action="https://www.oneidnet.com/home/chatlogin"' method="post">
    <label>User :</label><input name="user" type="text"></br>
        <label>password :</label><input name="pass" type="password"></br>
        <input type="submit" value="Submit">
</form>


<?php }else{
    header('Location: '.base_url()."home/v");
}

?>

