<?php
require_once 'requirements.php';
session_start();
if(isset($_SESSION['email'])){
    unset($_SESSION['email']);
    echo "<SCRIPT>window.location = 'index.php';</SCRIPT>";
}else{
    RedirectAfterMsg("Please Login","index.php");
}
?>