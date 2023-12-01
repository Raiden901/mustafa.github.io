<?php
$serverName = "localhost";
$userName = "root";
$password = "))gSg2Kcug2OItJ1";
$dbName = "tests"; // Assuming "tests" is your database name

// Create connection
$conn = mysqli_connect($serverName, $userName, $password, $dbName);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Create table query
$sql = "CREATE TABLE IF NOT EXISTS contacts (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    Name VARCHAR(30) NOT NULL,
    email VARCHAR(50) NOT NULL,
    Message VARCHAR(255) NOT NULL,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

// Execute query
if (!mysqli_query($conn, $sql)) {
    echo "Error creating table: " . mysqli_error($conn);
}

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Sanitize and validate input
    $Name = mysqli_real_escape_string($conn, $_POST['myName']);
    $email = mysqli_real_escape_string($conn, $_POST['myemail']);
    $Message = mysqli_real_escape_string($conn, $_POST['myMessage']);

    // Insert data into the database
    $insertSql = "INSERT INTO contacts (Name, email, Message) VALUES ('$Name', '$email', '$Message')";

    if (mysqli_query($conn, $insertSql)) {
        echo "Message sent successfully!";
    } else {
        echo "Error: " . $insertSql . "<br>" . mysqli_error($conn);
    }
}

// Close the connection
mysqli_close($conn);
?>
