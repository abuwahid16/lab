<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of userLogin
 *
 * @author wahid
 */
class userLogin {
    //put your code here
    private $host = "localhost";
    private $user = "root";
    private $password = "";
    private $database = "photo-album";
    private $connection = "";
    
    public function __construct() {
        $this->connection = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->database, $this->user, $this->password);
    }
    
    public function loggedIn(){
        
    }
}

?>
