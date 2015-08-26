<?php 
include_once "userLogged.php"; 
//$dbConnection = new userLogged();
//var_dump($dbConnection->userLoggedIn());
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
    <head>
        <title>Photo Album Management</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    </head>
    <body>
        <div style="width:860px; margin: 0 auto;">
            <h1>Photo Album Management</h1>
            <div style="width:420px; float: right;">
                <form name="log-in" action="log-post.php" id="log-in" method="post">
                    <div>
                        <div><lable>Email Address: </lable> <input type="text" name="user-email" value="" /></div>
                        <div><lable>Password: </lable> <input type="password" name="user-password" value=""/></div>
                        <div><input type="submit" name="log-in" value="Log In"/></div>
                    </div>
                </form>
            </div>
            <div style="width:420px; float:left;">
                <a href="register.php" title="Register">Click here to Register</a>
            </div>
        </div>
    </body>
</html>