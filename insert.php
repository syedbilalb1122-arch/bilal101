<?php
$servername = "localhost";   // default in XAMPP
$username   = "root";        // default in XAMPP
$password   = "";            // default in XAMPP
$dbname     = "php_form";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection 
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data (with basic sanitization)
$fullname = $_POST['fullname'];
$email    = $_POST['email'];
$course   = $_POST['course'];
$gender   = $_POST['gender'];
$dob      = $_POST['dob'];
$phone    = $_POST['phone'];
$address  = $_POST['address'];

// Insert into DB
$sql = "INSERT INTO students (fullname, email, course, gender, dob, phone, address)
        VALUES ('$fullname', '$email', '$course', '$gender', '$dob', '$phone', '$address')";

if ($conn->query($sql) === TRUE) {
    echo "<h3>✅ Student record inserted successfully!</h3>";
    echo "<a href='view.php'>View Records</a>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
