<?php
    class Database {
        private $query;
        private $conn;

        public function insert($table){
            $table = htmlspecialchars(trim($table));
            $this ->query = "INSERT INTO ".$table ;
            return $this;
        }
        public function parametters($fields){
            $this->query.=" (";
            $cols="";
            $value=" VALUE (";
            for($i=0; $i<count($fields); $i++){
                $cols.=$fields[$i].",";
            }
            $cols = trim($cols,",");
            $cols.=")";
            for($i=0; $i<count($fields); $i++){
                $value.="?,";
            }
            $value = trim($value,",");
            $value.=")";
            
            return $this;

        }
        public function getQuery(){
            echo $this->query;
        }


    }

    $db = new Database();
    $db ->insert("Personne")->parametters(["nom","prenom","adresse","mail"]);

?>