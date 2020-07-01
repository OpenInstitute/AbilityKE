<?php require_once 'classes/cls.constants.php'; 
session_start();
if(isset($_SESSION['name'])){
    session_destroy();
    header("location: index.php?type=");
}
?>