<?php
session_start();
include_once "userAlbum.php";
$imageAlbum = new userAlbum();

if (isset($_POST['file_submit'])) {
    $allowedExts = array("gif", "jpeg", "jpg", "png");
    $temp = explode(".", $_FILES["image_file"]["name"]);
    $extension = end($temp);
    if ((($_FILES["image_file"]["type"] == "image/gif")
            || ($_FILES["image_file"]["type"] == "image/jpeg")
            || ($_FILES["image_file"]["type"] == "image/jpg")
            || ($_FILES["image_file"]["type"] == "image/pjpeg")
            || ($_FILES["image_file"]["type"] == "image/x-png")
            || ($_FILES["image_file"]["type"] == "image/png"))
            //&& ($_FILES["image_file"]["size"] < 20000)
            && in_array($extension, $allowedExts)) {
        if ($_FILES["image_file"]["error"] > 0) {
            echo "Return Code: " . $_FILES["image_file"]["error"] . "<br>";
        } else {
            echo "Upload: " . $_FILES["image_file"]["name"] . "<br>";
            echo "Type: " . $_FILES["image_file"]["type"] . "<br>";
            echo "Size: " . ($_FILES["image_file"]["size"] / 1024) . " kB<br>";
            echo "Temp file: " . $_FILES["image_file"]["tmp_name"] . "<br>";
            //$imageAlbum->imageResize("upload/" . $_FILES["image_file"]["name"] );
            //echo "<br/>" . dirname(__FILE__) . "/upload/" . $_FILES["image_file"]["name"] . "<br/>";
            if (file_exists("upload/" . $_FILES["image_file"]["name"])) {
                $_SESSION['msg'] = $_FILES["image_file"]["name"] . " already exists. ";
                header('Location: http://localhost/photo-album/dashboard.php');
            } else {                
                move_uploaded_file($_FILES["image_file"]["tmp_name"], "upload/" . $_FILES["image_file"]["name"]);
                //$imageAlbum->imageResize("upload/" . $_FILES["image_file"]["name"] );
                //echo "Stored in: " . "upload/" . $_FILES["image_file"]["name"];
                $image_name = $_FILES["image_file"]["name"];
                $image_src = $_FILES["image_file"]["name"];
                if($imageAlbum->insertData("image-info", array('image_name', 'image_src', 'user_id'), array($image_name, $image_src, $_SESSION['user_id']) )){
                    $_SESSION['msg'] = "Image Succefully Uploaded.";
                    header('Location: http://localhost/photo-album/dashboard.php');
                }
            }
        }
    } else {
        echo "Invalid file";
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
            <a href="show-all.php">Show All</a>
            <form name="upload-image" id="upload-image" action="" method="post" enctype="multipart/form-data">
                <input type="text" name="image_name" value="Image" />
                <input type="file" name="image_file" id="image_file"></input>
                <input type="submit" name="file_submit" value="Upload Image"/>
            </form>
        </div>
    </body>
</html>