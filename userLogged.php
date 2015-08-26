<?php

/**
 * Description of userLogged
 * Basic User functionality
 * @author abu wahid
 */
require_once 'photoalbumDatabase.php';

class userLogged extends photoalbumDatabase {

    private $userEmail = "";
    private $userPassword = "";
    public $connection = "";

    /**
     * 
     */
    public function __construct() {
        parent::__construct();
        $this->connection = parent::connectDb();
    }

    /**
     * 
     * @param type $email string
     * @return type 
     */
    public function emailExist($email) {
        $qString = "SELECT `user_id` FROM `user-info` WHERE `user_email` = :user_email";
        $q = $this->connection->prepare($qString);
        $q->execute(array(":user_email" => $email));
        return $q->fetchColumn();
    }

    /**
     * 
     * @param type $email string
     * @param type $password string
     * @return boolean
     */
    public function loggedUser($email, $password) {
        if ($this->emailExist($email)) {
            $qString = "SELECT `user_id`, `user_email`, `user_type`, `is_active` FROM `user-info` WHERE `user_email` = :user_email and `user_password` = :user_password and `is_active` = :is_active";
            $q = $this->connection->prepare($qString);
            $q->execute(array(":user_password" => $password, ":user_email" => $email,
                ":is_active" => 1));
            $data = $q->fetch(PDO::FETCH_ASSOC);

            if ($data['user_id'] != "") {
                session_start();
                $_SESSION['user_id'] = $data['user_id'];
                echo $_SESSION['user_id'];

                $_SESSION['user_email'] = $data['user_email'];
                $_SESSION['user_type'] = $data['user_type'];
                return true;
            } else {
                $_SESSION['log-msg'] = "Invalid Email address or Password.";
                return false;
            }
        } else {
            $_SESSION['log-msg'] = "Invalid Email address or Password.";
            return false;
        }
        return false;
    }

    /**
     * 
     * @param type $userEmail
     * @param type $userPassword
     * @return boolean
     */
    public function userRegister($userEmail, $userPassword) {
        if (parent::insertData("user-info", array('user_email', 'user_password', 'is_active', 'user_type'), array($userEmail, MD5($userPassword), '0', '0'))) {
            $str = 'abcdefghijklmnopqrstuvwxyz1234567890';
            $shuffled = str_shuffle($str);
            
            $message = "Please got to http://localhost/photo-album/activate.php and use '" . $shuffled . "' to activate your account \r\n";
            if(mail($userEmail, 'Please Activate Your Account', $message)){
                parent::updateData("user-info", array('activate_code'), array($shuffled), 'user_email', $userEmail);
                $_SESSION['log-msg'] = "You have successfuly Registered, Please check your email to activate.";
            }
            return true;
        } else {
            $_SESSION['log-msg'] = "Please Try again later";
            return false;
        }
    }

}

?>
