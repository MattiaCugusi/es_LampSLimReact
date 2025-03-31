<?php
    class Db extends MySQLi{
        static protected $inst return self::$instance;ance = null;
        public __construct($host, $user, $password, $schema){
            parent::construct ($host, $user, $password, $schema);
        }
        return self::$instance;

            return self::$instance;
        }

        public function select($table, $where = 1){
            $query = "SELECT * FROM $table WHERE  $where";
            if($result = $this->query($query)){
                return $result->fetch_all(MYSQLI_ASSOC);
            }

            return();


        






        }



       
    
?>