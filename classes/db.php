<?php

class DB {
public $con;
public function __construct(){
    $this->con = mysqli_connect('localhost','root','','oop');
    
        if (!$this->con){
            echo 'no connection could be made';
        }
    }
}

