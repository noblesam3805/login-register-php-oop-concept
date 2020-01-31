<?php
include "db.php";

class Register extends DB{
    public function __construct($name, $email, $password){
    $db = new DB;
    $con = $db->con;
    $sql = "insert into user values('','$name','$email','$password')";
    mysqli_query($con, $sql);
    }
}