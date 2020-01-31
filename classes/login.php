<?php
include "db.php";
class Login extends DB{
    public $eerror;
    public function __construct($email, $password){
        $db = new DB;
        $con = $db->con;
        $sql = "select * from user";
        $res = mysqli_query($con, $sql);
        if(!$res){
            print_r(mysqli_error($con));
        }
        while($row = mysqli_fetch_array($res)){
            if ($row['email'] == $email){
              header("Location: index.php");
            }
            else{
               $this->eerror = "email not registered";
            }
        }
       
    }
}