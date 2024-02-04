<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Appoinment Information</title>
  <link rel="stylesheet" href="viewpatient.css">
<script>
    $(window).on("load resize ", function() {
  var scrollWidth = $('.tbl-content').width() - $('.tbl-content table').width();
  $('.tbl-header').css({'padding-right':scrollWidth});
}).resize();
</script>

</head>
<body>
<?php
require 'navbar.php';
?>
<section>
  
  <h1>Appoinment Information</h1>
  <div>
    <form action="viewstudent.php" method="post">
      <input type="text" name="phone" required placeholder="Enter phone">
      <input type="submit" name="submit"  value="Search">
    </form>
  </div>

    <?php

      if(isset($_POST['submit'])){
        $mysqli = new mysqli('localhost', 'root', '', 'appoinment');
        if ($mysqli->connect_error) {
          die("Connection failed: " . $mysqli->connect_error);
        }
        $query = "SELECT * FROM booked_appoinment where phone=".$_POST["phone"];
        $result = $mysqli->query($query);
       ?>
        <div class="tbl-header">
    <table cellpadding="0" cellspacing="0" border="0">
      <thead>
        <tr>
          <th><b>ID</b></th>
          <th><b>Name</b></th>
          <th><b>Email</b></th><b></b>
          <th><b>Phone</b></th>
          <th><b>Appoinment Type</b></th>
          <th><b>Appoinment Date</b></th>
          <th><b>Action</b></th>
        </tr>
      </thead>
    </table>
  </div>
  <div class="tbl-content">
    <table cellpadding="0" cellspacing="0" border="0">
      <tbody>
      <?php
  
          
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo '<tr>';
                    echo '<td>' . $row['id'] . '</td>';
                    echo '<td>' . $row['name'] . '</td>';
                    echo '<td>' . $row['email'] . '</td>';
                    echo '<td>' . $row['phone'] . '</td>';
                    echo '<td>' . $row['appoinment'] . '</td>';
                    echo '<td>' . $row['appoinment_date'] . '</td>';
                    echo '<td>
                        <form action="view.php" method="get">
                        <input type="hidden" name="id" value="'.$row['id'].'">
                        <input class="view_btn" type="submit" name="submit" value="View">
                        </form>
                    </td>';
                    echo '</tr>';
                }
            } else {
                echo 'No records found.';
            }
          }
            ?>
      </tbody>
    </table>
  </div>
</section>


<div class="back-dashbord">
  <a href="index.php" ><< Back to Dashbord</a>
</div>
<?php
include_once 'footer.php';
?>

</body>
</html>
