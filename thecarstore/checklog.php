<?php
session_start();
include 'conn.php';
$username=$_POST['namel'];
$password=$_POST['passwordl'];
$_SESSION['lname']=$username;
    
$query="SELECT * FROM users where username='$username'";
$result=$pdo->query($query);
$row = $result->fetch();
$row_count = $result->fetchColumn();
if($row){
    if($password==$row["password"]){
        $_SESSION['cardnumber']=$row['cardnumber'];
        $_SESSION['lid']=$row['id'];
        header("location:store.php");
        $x=true;
    }
    else{
    $popup = "Password is not correct";
    echo "<script>
    alert('Password is not correct');
    setTimeout(function() {
        window.location.href = 'loggingin.html';
    }, 200); // Delay for 2 seconds
    </script>";
    }
 
}
else{
    echo "<script>
    alert('Can not find this username');
    setTimeout(function() {
        window.location.href = 'loggingin.html';
    }, 200); // Delay for 2 seconds
    </script>";
}
 
?>