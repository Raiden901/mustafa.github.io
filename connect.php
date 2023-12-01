<?php
$serverName = "localhost";
$userName = "root";
$password = "))gSg2Kcug2OItJ1";
$dbName = "tests.sql";

$conn = mysqli_connect($serverName, $userName, $password, $dbName);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "CREATE TABLE IF NOT EXISTS contacts (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    Name VARCHAR(30) NOT NULL,
    email VARCHAR(50) NOT NULL,
    Message VARCHAR(255) NOT NULL,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if (mysqli_query($conn, $sql)) {
    // echo "Table created successfully!";
} else {
    echo "Error creating table: " . mysqli_error($conn);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $Name = mysqli_real_escape_string($conn, $_POST['myName']);
    $email = mysqli_real_escape_string($conn, $_POST['myemail']);
    $Message = mysqli_real_escape_string($conn, $_POST['myMessage']);

    $sql = "INSERT INTO contacts (myName, myemail, myMessage) VALUES ('$myName', '$myemail', '$myMessage')";

mt    if (mysqli_query($conn, $sql)) {
        echo "Message sent successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>
