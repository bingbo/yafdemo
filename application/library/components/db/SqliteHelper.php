<?php

class Components_Db_SqliteHelper{

    const DATABASE = APPLICATION_PATH . '/test.db';

    private $db = null;
    private static $_instance = null; 

    private function __construct(){
        $this->db = new SQLite3(self::DATABASE);
    }

    public static function getConnection(){
        if(self::$_instance == null){
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    public function query($sql){
        $res = $this->db->query($sql);
        $result = array();
        while($row = $res->fetchArray(SQLITE3_ASSOC)){
            $result[] = $row;
        }
        return $result;
    }

}
