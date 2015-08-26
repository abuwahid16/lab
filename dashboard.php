<?php
session_start();
include_once "photoalbumDatabase.php";
$photoalbumDatabase = new photoalbumDatabase();
if(isset($_GET['id'])){
    if($photoalbumDatabase->removeById("image-info", "image_id", $_GET['id'])){
        $_SESSION['msg'] = "Image Successfully Removed.";
    }
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
    <head>
        <title>Photo Album Management</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    </head>
    <body>
        <div style="width:860px; margin: 0 auto;">
            <h1>Welcome, <?php echo $_SESSION['user_email'] ?>, Photo Album Management</h1>
            <a href="upload-image.php">Add New Image</a>
            <table align="left" width="500">
                <tr>
                    <th><input type="button" name="remove-all" value="Remove All" onclick="removeAll();" /> &nbsp; <input type="button" name="remove-selected" onclick="removeSelected()" value="Remove Selected" /> </th>
                    <th width="30%" align="left">Image Name</th>
                    <th width="40%" align="left">Image Source</th>
                    <th width="30%" align="left">Edit</th>
                </tr>
                <?php foreach ($photoalbumDatabase->getById('image-info', 'user_id', $_SESSION['user_id']) as $value) { ?>
                    <tr>
                        <td><input type="checkbox" name="select-img" value="0"/></td>
                        <td align="left"><a href="#"><?php echo $value['image_name']; ?></a></td>
                        <td align="left"><img src="<?php echo "http://" . $_SERVER['HTTP_HOST'] . "/photo-album/upload/" . $value['image_src']; ?>" width="200px" /></td>
                        <td align="left"><a href="dashboard.php?id=<?php echo $value['image_id'] ?>">Delete</a></td>
                    </tr>
                <?php } ?>
            </table>            
        </div>
        <script type="text/javascript">
            function removeAll(){
                
            }
        </script>
    </body>
</html>