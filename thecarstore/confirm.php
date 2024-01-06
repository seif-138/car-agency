<?php
session_start();
include 'conn.php';
$inputcard=$_POST['ccard'];
if(isset($_SESSION['lname'])) $username=$_SESSION['lname'];
if(isset($_SESSION['sname'])) $username=$_SESSION['sname'];
if(isset($_SESSION['sid'])) $id=$_SESSION['sid'];
if(isset($_SESSION['lid'])) $id=$_SESSION['lid'];
if(isset($_SESSION['cardnumber'])) $card=$_SESSION['cardnumber'];
if(isset($_SESSION['scard'])) $card=$_SESSION['scard'];

$sql = "SELECT * FROM users WHERE id='$id'";
$result = $pdo->query($sql);

$sql3 = "SELECT * FROM cars WHERE id='$_SESSION[carid]'";
$result3 = $pdo->query($sql3);
$row=$result3->fetch();
$quantity=$row['quantity'];
echo var_dump($result3);
if($inputcard==$card){
    $sql2 = "UPDATE cars SET quantity='$quantity'-1 WHERE id='$_SESSION[carid]'";
    $pdo->query($sql2);
$sql4 = "INSERT INTO transactions (user_id, car_id,total_price) VALUES ('$id', '$_SESSION[carid]',$row[price])";
$pdo->query($sql4);
    echo "<script>
    alert('You have successfully bought the car');
    setTimeout(function() {
        window.location.href = 'store.php';
    }, 20); 
    </script>";
}
else{
    echo "<script>
    alert('Your card number is not correct');
    setTimeout(function() {
        window.location.href = 'store.php';
    }, 20); 
    </script>";
}

?>