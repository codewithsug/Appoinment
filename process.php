<?php
// $name = $_POST['name'];
// $email = $_POST['email'];
// $phone = $_POST['phone'];
// $class = $_POST['appoinment'];
// $rollno = $_POST['appoinment_date'];

$errors = array();

$mysqli = new mysqli('localhost', 'root', '', 'appoinment');
$query = "SELECT 'phone' FROM booked_appoinment where phone=".$_POST["phone"];
$result = $mysqli->query($query);


if (empty($_POST['name'])) {
    $errors['name'] = 'Name is required';
} else {
    $name = $_POST['name'];
}

// Validate email
if (empty($_POST['email'])) {
    $errors['email'] = 'Email is required';
} elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    $errors['email'] = 'Invalid email format';
}
else {
    $email = $_POST['email'];
  
}

// Validate phone
if (empty($_POST['phone'])) {
    $errors['phone'] = 'Phone is required';
} elseif (!preg_match('/^[0-9]{10}$/', $_POST['phone'])) {
    $errors['phone'] = 'Invalid phone number format';
} 
elseif($result->num_rows > 0){
    $errors['phone'] = "Phone must be unique";
} else {
    $phone = $_POST['phone'];
    
}

// Validate appoinment
if (empty($_POST['appoinment'])) {
    $errors['appoinment'] = 'Appoinment type is required';
} else {
    $appoinment = $_POST['appoinment'];
   
}

// Validate date 
if (empty($_POST["date"])) {
    $errors['date'] = 'Date is required';
} else {
    $appointmentDate = date("Y-m-d", strtotime($_POST["date"]));
}


if (empty($errors)) {
    // Establish database connection (replace 'your_username', 'your_password', and 'your_database' with your actual database credentials)
   

    // Check connection
    if ($mysqli->connect_error) {
        die("Connection failed: " . $mysqli->connect_error);
    }
    
    // Prepare and execute the SQL query to insert data into the 'registration' table
    $query = "INSERT INTO booked_appoinment (name, email, phone, appoinment, appoinment_date) VALUES ('$name', '$email', '$phone', '$appoinment', '$appointmentDate')";

    if ($mysqli->query($query) === TRUE) {
        $successMessage = "Appoinment Booked successful !";
        header("Location: ragistationform.php?message=" . urlencode($successMessage));
        // exit;
    } else {
        echo "Error: " . $query . "<br>" . $mysqli->error;
    }

    // Close database connection
    $mysqli->close();
}else{
    foreach ($errors as $value) {
        $error = $value;
        header("Location: ragistationform.php?error=" . urlencode($error));
    }
}
?>