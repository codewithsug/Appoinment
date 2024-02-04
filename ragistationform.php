<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title>Appoimnet Form</title>
 <link rel="stylesheet" href="./ragistationform.css">
</head>
<body>
 <?php
include_once 'navbar.php';
?>
 <div class="outer-box">
  <div class="inner-box">
   <header class="signup-header">
    <h1>Appoinment For</h1>
    <p>It just take 30 seconds</p>
   </header>
   <main class="signup-body">
    <?php 
    if (isset($_GET['message'])) {
        $successMessage = urldecode($_GET['message']);

    ?>
    <p style="color:green; font-weight:bold"><?php echo $successMessage?></p>
    <?php
    } 
    ?>

<?php 
    if (isset($_GET['error'])) {
        $error = urldecode($_GET['error']);

    ?>
    <p style="color:red; font-weight:bold"><?php echo $error?></p>
    <?php
    } 
    ?>

    <form action="process.php" method="post">
       
    <label for="appoinment" style="font-weight: bold; display: block;">Appointment Type:</label>
     <select id="appoinment" name="appoinment">
        <option disabled selected>---Select Type---</option>
         <option value="Regular Checkup">Regular Checkup</option>
        <option value="Consultation">Consultation</option>
        <option value="Procedure">Medical Procedure</option>
        <!-- Add more options as needed -->
    </select>
        <p>
        <label for="fullname">Full Name</label>
        <input type="text" id="fullname" placeholder="Enter full name" required name="name">
        </p>
        <p>
        <label for="email">Email</label>
        <input type="email" id="email" placeholder="Enter email" required name="email">
        </p>
        <p>
        <label for="phone">Phone</label>
        <input type="tel" id="phone" placeholder="+91-00000-00000" required name="phone">
        </p>
       
     
        <!-- <input type="number" id="rollno" placeholder="Enter Student Roll No." required name="rollno"> -->
        
        <p>
        <label for="date">Choose Date</label>
        <input type="date" id="date" name="date" placeholder="Choose Date" required>
        </p>
        <p>     
        <input type="submit" id="submit" value="Book Appoinment" style="width:100%">
        <input type="reset" id="reset" value="Reset">
        </p>
    </form>
    <a href="index.php"><< Back to Dashbord</a>
   </main>
   
  </div>
 </div>
 <?php
include_once 'footer.php';
?>
</body>
</html>