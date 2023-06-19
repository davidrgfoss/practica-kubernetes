<?php
class Database {
        public static $db;
        public static $con;
        function Database(){
                $this->user=getenv('user_bookmedik');$this->pass=getenv('pass_bookmedik');$this->host=getenv('host_database');$this->ddbb=getenv('db_name');
        }

        function connect(){
                $con = new mysqli($this->host,$this->user,$this->pass,$this->ddbb);
                $con->query("set sql_mode=''");
                return $con;
        }

        public static function getCon(){
                if(self::$con==null && self::$db==null){
                        self::$db = new Database();
                        self::$con = self::$db->connect();
                }
                return self::$con;
        }
}
?>
