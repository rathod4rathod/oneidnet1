<?php 
session_start();
session_unset();
    $_SESSION['user_name'] = NULL;
    $_SESSION['user_full_name'] = NULL;
    $_SESSION['user_id'] =  NULL;
header("Location: index.php");        // you can enter home page here ( Eg : header("Location: " ."http://www.krizna.com"); 
?>
