<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <title>Dashbord</title>
</head>
<body>
<?php
include_once 'navbar.php';
?>

  <div class="content">
    <h1 style="text-align: center;">Welcome to Sugandha Hospital</h1>
    <div id ="button-view">
        <div class="btn-child">
                <button class="btn-registration" ><a href="./ragistationform.php">Book Apponment</a></button>
        </div>
        <div class="btn-child">
                <button class="btn-view"><a href="viewpatient.php">View Apponment</a></button>
        </div>
    </div>
  </div>
  <?php
include_once 'footer.php';
?>
  
</body>
</html>
