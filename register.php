<?php 
include "includes/autoload.php";
include "includes/alerts.php";
if(isset($_POST['reg'])){
    $nregex = "/^[a-zA-Z]+$/";
    $pregex = "/^[a-zA-Z]{6}+[\_\@]{2}$/";
    $name = filter_input(INPUT_POST, 'name');
    $email = filter_input(INPUT_POST, 'email');
    $password = filter_input(INPUT_POST, 'password');
    $cpassword = filter_input(INPUT_POST, 'cpassword');
    $mpass = md5($cpassword);

    if(!preg_match($nregex, $name)){
        $nerror = 'name format not supported';
    }elseif(!preg_match($pregex, $password)){
        $perror = 'password format not supported';
    }
    elseif($cpassword != $password){
        $cperror = 'passwords do not match';
    }
    else{
    $register = new Register($name, $email, $mpass);
    $success = "Successfully registered, redirecting...";?>
    <script>setTimeout(()=>{window.location="login.php"}, 6000)</script>
    <?php
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form method="post" style="margin:10% 0 0 40%;">
        <p style="color:white; background-color:green;margin-right:70%;"><?php echo $success ?></p>
        <input type="text" style="border:2px solid pink; border-radius:5% ; height:30px; width:30%" value="<?php echo $name ?>" placeholder="your name" name="name"><br>
        <p style="color:red"><?php echo $nerror ?></p>
        <br>
        <input type="email" style="border:2px solid pink; border-radius:5% ; height:30px; width:30%" placeholder="email" name="email"><br><br>
        <input type="password" style="border:2px solid pink; border-radius:5% ; height:30px; width:30%" placeholder="password" name="password"><br>
        <p style="color:red"><?php echo $perror ?></p>
        <br>
        <input type="password" style="border:2px solid pink; border-radius:5%; height:30px; width:30%" placeholder="confirm password" name="cpassword"><br>
        <p style="color:red"><?php echo $cperror ?></p>
        <br>
        <input type="submit" value="Register" style="height:40px; width:80px; background-color:pink; color:black;" name="reg">
    </form>
</body>
</html>