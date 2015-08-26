<?php 
include_once "userLogged.php"; 
$logInfo = new userLogged();

$userEmail = $_POST["user-email"];
$userPassword = $_POST["user-password"];
//echo $userEmail;
if($logInfo->emailExist($userEmail)){
    echo "You are registered, did you forget your password?";
}else{
    $logInfo->userRegister($userEmail, $userPassword);
}
?>