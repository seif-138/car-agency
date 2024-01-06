<?php
session_start();
include 'conn.php';
$_SESSION['carid']=$_POST['carid'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    
    <link rel='stylesheet' href='buy1.css'>
    <link rel='stylesheet' href='main.css'>
    <title>CAR AGENCY</title>
</head>

<body>
    <div class="head">
        <h1>CAR AGENCY</h1>
    </div>
    <div class="image"></div>
    <center>
<div class="center">
    <form action="confirm.php" method="POST">
    <div class="tixt"><h3>Enter your credit card to confirm purchase</h3></div><br>
    <div class="box"><input type="text" name="ccard" class="iol"></div>
    <input type="submit" class='btn'>
    </form>
</center>
</div>
</body>
</html>