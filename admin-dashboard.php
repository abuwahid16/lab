<?php 
session_start();
require_once 'photoalbumDatabase.php';
$dbAction = new photoalbumDatabase();
$photoAlbum = $dbAction->showAllLeftJoin("user-info", array('user_id','user_email','is_active',), "image-info", array('','',''));
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
    <head>
        <title>Photo Album Management</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    </head>
    <body>
        <div style="width:860px; margin: 0 auto;">
            <h1>Photo Album Admin</h1>
            <div style="width:420px; float: right;">
                <table>
                    <tr>
                        <th>User Id</th>
                        <th>User Email</th>
                        <th>Is Active</th>
                        <th>Edit</th>
                    </tr>
                    <?php foreach ($photoAlbum as $value): ?>
                    <tr>
                        <td>User Id</td>
                        <td>User Email</td>
                        <td>Is Active</td>
                        <td>Edit</td>
                    </tr>
                    <?php endforeach; ?>
                </table>
            </div>
        </div>
    </body>
</html>