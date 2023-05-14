<?php
$serverName = "localhost";
$userName = "dfdf@gmaio.oma";
$password = "qz]58s3mq9U(To41";
$dbName = "test_sql";

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
    echo "Table created successfully!";
} else {
    echo "Error creating table: " . mysqli_error($conn);
}

$Name = mysqli_real_escape_string($conn, $_POST['Name']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$Message = mysqli_real_escape_string($conn, $_POST['Message']);

$sql = "INSERT INTO contacts (Name, email, Message) VALUES ('$Name', '$email', '$Message')";

if (mysqli_query($conn, $sql)) {
    echo "Message sent successfully!";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>
