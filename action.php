<?php
require_once 'photoalbumDatabase.php';
$dbAction = new photoalbumDatabase();
if(isset($_GET['id'])){
    $dbAction->removeRow($_GET['token'] . "_" .$_GET['id'], $_GET['token'] . "_info");
}
?>
