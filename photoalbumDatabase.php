<?php
/**
 * Description of photoalbumDatabase
 * All Database Operation
 * @author abu wahid
 */
class photoalbumDatabase {

    private $host = "localhost";
    private $database = "photo-album";
    private $user = "root";
    private $password = "";
    public $connection = "";

    public function __construct() {
        $this->connection = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->database, $this->user, $this->password);
    }

    public function connectDb() {
        return new PDO("mysql:host=" . $this->host . ";dbname=" . $this->database, $this->user, $this->password);
    }

    /**
     * 
     * @param type $table string
     * @param type $columns array
     * @param type $data array
     * @return boolean
     */
    public function insertData($table, $columns, $data) {
        $sql = "INSERT INTO `" . $table . "` SET ";
        for ($i = 0; $i < count($columns); $i++) {
            $sql .= $columns[$i] . "=:" . $columns[$i] . ",";
            $exe_query[":" . $columns[$i]] = $data[$i];
        }
        $q = $this->connectDb()->prepare(substr($sql, 0, strlen($sql) - 1));
        $q->execute($exe_query);
        return TRUE;
    }

    /**
     * 
     * @param type $table
     * @param type $columns
     * @param type $data
     * @param type $id
     * @param type $idVal
     * @return boolean
     */
    public function updateData($table, $columns, $data, $id = NULL, $idVal = NULL) {
        $sql = "UPDATE `" . $table . "` SET ";
        for ($i = 0; $i < count($columns); $i++) {
            $sql .= $columns[$i] . "=:" . $columns[$i] . ",";
            $exe_query[":" . $columns[$i]] = $data[$i];
        }
        $sql = substr($sql, 0, strlen($sql) - 1);
        $sql .= " WHERE ". $id ."=:" . $id;
        $exe_query[":" . $id] = $idVal;
        $q = $this->connectDb()->prepare($sql);
        $q->execute($exe_query);
        return TRUE;
    }

    /**
     * 
     * @param type $table
     * @return type
     */
    public function showAll($table) {
        $sql = "SELECT * FROM `" . $table . "`";
        $query = $this->connection->query($sql) or die("Please Try Again");

        while ($r = $query->fetch(PDO::FETCH_ASSOC)) {
            $data[] = $r;
        }
        return $data;
    }

    /**
     * 
     * @param type $table
     * @param type $key_id
     * @param type $key_val
     * @return type
     */
    public function getById($table, $key_id, $key_val) {
        $sql = "SELECT * FROM `" . $table . "` WHERE " . $key_id . " = " . $key_val;
        $query = $this->connection->query($sql) or die("Please Try Again");
        while ($r = $query->fetch(PDO::FETCH_ASSOC)) {
            $data[] = $r;
        }
        return $data;
    }

    /**
     * 
     * @param type $table
     * @param type $field_name
     * @param type $id
     * @return boolean
     */
    public function removeById($table, $field_name, $id) {
        $sql = "DELETE FROM `" . $table . "` WHERE " . $field_name . "=:id";
        $q = $this->connection->prepare($sql);
        $q->execute(array(':id' => $id));
        return true;
    }

    /**
     * 
     * @param type $leftTable
     * @param type $rightTable
     */
    public function showAllLeftJoin($leftTable, $rightTable) {
        $sql = "SELECT user_id, url, thirdparty, lc.category FROM " . $leftTable;
        $sql .= " LEFT JOIN " . $rightTable . " as lc ON lc.id = links.category_fk ";
        $sql .= "ORDER BY thirdparty ASC ";
        $q = $this->connection->prepare($sql);
        $q->prepare($sql);
        $q->execute();
    }

}

?>
