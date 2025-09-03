<?php
$servername = "localhost";
$username   = "root";
$password   = "";
$dbname     = "php_form";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection 
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch records
$sql = "SELECT * FROM students ORDER BY id DESC";
$result = $conn->query($sql);

echo "<h2>📋 Student Records</h2>";
echo "<table border='1' cellpadding='10'>
        <tr>
            <th>ID</th>
            <th>Full Name</th>
            <th>Email</th>
            <th>Course</th>
            <th>Gender</th>
            <th>DOB</th>
            <th>Phone</th>
            <th>Address</th>
            <th>Created At</th>
        </tr>";

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>".$row['id']."</td>
                <td>".$row['fullname']."</td>
                <td>".$row['email']."</td>
                <td>".$row['course']."</td>
                <td>".$row['gender']."</td>
                <td>".$row['dob']."</td>
                <td>".$row['phone']."</td>
                <td>".$row['address']."</td>
                <td>".$row['created_at']."</td>
            </tr>";
    }
} else {
    echo "<tr><td colspan='9'>No records found</td></tr>";
}

echo "</table>";

$conn->close();
?>
