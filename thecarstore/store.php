<?php
session_start();  
include 'conn.php';
if(isset($_SESSION['lname'])) $username=$_SESSION['lname'];
if(isset($_SESSION['sname'])) $username=$_SESSION['sname'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <link rel='stylesheet' href='body.css'>
  <link rel='stylesheet' href='main.css'>
  <title>CAR AGENCY</title>
</head>
<body>
  <div class="head">
    <h1><?php
     if(isset($username)) echo "hello ".$username;
     
    
     ?></h1>
  </div>
  <div class="image"></div>
  <div class="container">
    <?php include 'conn.php';
    $pdo = new PDO($attr, $user, $pass);
    $query = 'SELECT * from cars';
    $result = $pdo->query($query);
    while ($car = $result->fetch()): ?>
      <div class="col-lg-4 col-md-6"> <div class="card">
          <img src="car/<?php echo $car['image']; ?>" class="card-img-top" alt="<?php echo $car['name']; ?>">
          <div class="card-body">
            <h3 class="card-title"><?php echo $car['name']; ?></h3>
            <p class="card-text"><?php echo $car['company']; ?> | <?php echo $car['year']; ?></p>
            <p class="card-price">$<?php echo $car['price']; ?></p>
            <div class="card-quantity" style="
    display: inline-block; /* Keep it inline with other elements */
    padding: 5px 10px; /* Add some padding for visual appeal */
    background-color: #f0f0f0; /* Light gray background */
    border: 1px solid #ccc; /* Light gray border */
    border-radius: 5px; /* Rounded corners */
    font-size: 15px; /* Slightly smaller font for compactness */
    text-align: center;"><?php echo $car['quantity']; ?></div>
          

            <form action="buy.php" method="post">
          <input type="hidden" name="carid" value="<?php echo $car['id']; ?>">
            <button type="submit" class="btn2">Buy Now</button></form>
          </div>
        </div>
      </div>
    <?php endwhile; ?>
  </div>
</body>
</html>
