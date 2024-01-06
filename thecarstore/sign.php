<?php
session_start();
include 'conn.php';
$usernames=$_POST["names"];
$passwords=$_POST["passwords"];
$cardnums=$_POST["cards"];
$_SESSION['sname']=$usernames;
$_SESSION['scard']=$cardnums;
$query="INSERT into users(username,password,cardnumber) values('$usernames','$passwords','$cardnums')";
$pdo->query($query);

    $query1="SELECT * FROM users where username='$usernames'";
    $result1=$pdo->query($query1);
    $row1 = $result1->fetch();
    $_SESSION['sid']=$row1['id'];

    
header("location:store.php");
?>