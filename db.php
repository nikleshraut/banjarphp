<?php
class DB{
    public $conn;
    static $table_name;
    function __construct(){
        include_once("config.php");
        $this->conn = mysqli_connect($servername,$username,$password,$dbname);
    }
    static function table($table_name){
        $DB = new DB();
        self::$table_name = $table_name;
        return $DB;
    }
    function get(){
        $sql  = "SELECT * FROM ".self::$table_name;
        $result = mysqli_query($this->conn,$sql);
        $rows = array();
        while($row = mysqli_fetch_all($result,MYSQLI_ASSOC))
        {
            $rows[] = $row;
        }
        return json_decode(json_encode($rows[0]),false);
    }
}
?>