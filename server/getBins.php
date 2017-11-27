<?php
require 'DBlogin.php';

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    echo "connection error";
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM bins";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    echo '{';
    $i=0;
    while($row = $result->fetch_assoc()) {
        if($i!=0) {
            echo ', ';
        }
        echo '"'.$row["id"].'":["'.$row["name"].'", "'.$row["volume"].'", "'.$row["battery"].'", "'.$row["bCrushed"].'", "'.$row["timestamp"].'"]';
        $i++;
    }
    echo '}';
} else {
    echo "0 results";
}
$conn->close();
?>
