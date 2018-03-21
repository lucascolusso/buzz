<?php
$servername = "localhost";
$username = "";
$password = "";
$dbname = "";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "INSERT INTO responses (user_ip, Q1, Q2, Q3, Q4, Q5, Q6, Q7, Q8, Q9, Q10) 
VALUES ('$_SERVER[REMOTE_ADDR]','$_POST[Q1]','$_POST[Q2]','$_POST[Q3]','$_POST[Q4]','$_POST[Q5]','$_POST[Q6]','$_POST[Q7]','$_POST[Q8]','$_POST[Q9]','$_POST[Q10]');";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
