<?php


class Config{

    private $servername;
    private $username;
    private $password;
    private $dbname;

    public function connect(){
        $this ->servername= "localhost";
        $this ->username= "root";
        $this ->password= "";
        $this ->dbname= "servicedatabase";

        $conn = new mysqli($this->servername, $this-> username, $this-> password, $this-> dbname);
        return $conn;
    }
}


class Car extends Config{

    protected function getAllCars(){
        $sql = "SELECT * FROM car";
        $result = $this-> connect()->query($sql);
        $numRows = $result-> num_rows;
        if ($numRows>0){
            while ($row=$result->fetch_assoc()){
                $data[] = $row;
            }
            return $data;
        }
    }

    public function showCarOptions(){
        $datas = $this->getAllCars();
        foreach ($datas as $data){
            echo '<option value="'.$data['id'].'">'.$data['model'].'</option>';
        }
    }
}

?>