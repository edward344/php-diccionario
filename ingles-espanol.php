<?php

class Dictionary
{
    public $conn;
    
    public function __construct()
    {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "dictionary";
        
        $this->conn = mysqli_connect($servername,$username,$password,$dbname);
        
        // Check connection
        if (!$this->conn)
        {
            die("Connection failed: " . mysqli_connect_error());
        }
    }
    
    public function find($word)
    {
        $sql = "SELECT english,spanish,tag,pronunciation FROM diccionario WHERE english='$word'";
        $result = mysqli_query($this->conn,$sql);
        
        $result_array = array();
        
        if (mysqli_num_rows($result) > 0)
        {
            while ($row = mysqli_fetch_assoc($result))
            {
                $result_array[] = $row;
            }
        }
        
        return $result_array;
    }
    
    public function close()
    {
        mysqli_close($this->conn);
    }
}

?>