<?php 
include_once "userLogged.php"; 
$logInfo = new userLogged();

$userEmail = $_POST["user-email"];
$userPassword = $_POST["user-password"];
if($logInfo->loggedUser($userEmail, md5($userPassword))){
    echo $_SESSION['user_type'];
    if($_SESSION['user_type'] == 0){
        header('Location: http://localhost/photo-album/dashboard.php');
    }else{
        header('Location: http://localhost/photo-album/admin-dashboard.php');
    }
}
?>