<?php
include "includes/autoload.php";
if(!isset($eerror)){
    $eerror = "";
}
if (isset($_POST['log'])){
    $email = filter_input(INPUT_POST, 'email');
    $password = filter_input(INPUT_POST, 'password');
    $login = new Login($email, $password);

    $eerror = $login->eerror;
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
        <input type="email" style="border:2px solid pink; border-radius:5% ; height:30px; width:30%" placeholder="email" name="email"><br>
        <p style="color:red;"><?php echo $eerror; ?></p>
        <br>
        <input type="password" style="border:2px solid pink; border-radius:5% ; height:30px; width:30%" placeholder="password" name="password"><br><br>
        <input type="submit" value="Login" style="height:40px; width:80px; background-color:pink; color:black;" name="log">
    </form>
</body>
</html>