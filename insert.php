<?php
$servername = "localhost";
$username = "admin";
$password = "password";
$dbname = "intrusion_detector";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 


$query=mysqli_query($conn,"SELECT id FROM records") or die("mysql error");
$no = mysqli_num_rows($query) + 1;
echo mysqli_num_rows($query);

$sql = "INSERT INTO records (id, title, shortdesc, image)
VALUES ('', 'intruder$no',CURRENT_TIMESTAMP,'1','1','http:\/\/IP address\/MyApi\/$no.png');";

if ($conn->multi_query($sql) === TRUE) {
    echo "New records created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}



$conn->close();
?>
