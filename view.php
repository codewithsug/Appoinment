<?php
// echo $_GET['id'];

$field=array();

$mysqli = new mysqli('localhost', 'root', '', 'appoinment');
if ($mysqli->connect_error) {
  die("Connection failed: " . $mysqli->connect_error);
}
$query = "SELECT * FROM booked_appoinment where id=".$_GET["id"];
$result = $mysqli->query($query);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
            $field=$row;
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Details</title>
    <link rel="stylesheet" href="./view.css">
</head>
<body>

<?php
require 'navbar.php';
?>

<h1 style="text-align:center; margin-top:20px">Patient Appointment Details</h1>
    <table class="table">
            <tr class="table_tr">
                <td><b>Name</b></td>
                <td><?php  echo $field['name']?></td>
            </tr>
            <tr>
                <td><b>Email</b></td>
                <td><?php  echo $field['email']?></td>
            </tr>
            <tr>
                <td><b>Phone</b></td>
                <td><?php  echo $field['phone']?></td>
            </tr>
            <tr>
                <td><b>Appoinment Type</b></td>
                <td><?php  echo $field['appoinment']?></td>
            </tr>
            <tr>
                <td><b>Appoinment Date</b></td>
                <td><?php  echo $field['appoinment_date']?></td>
            </tr>
    </table>
    <?php
include_once 'footer.php';
?>
</body>
</html>