<?php
// Establish a database connection
$servername = "localhost";
$username = "root";
$password = "Boss@068436#art";
$dbname = "travel_agency";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $full_name = $_POST["full_name"];
    $email = $_POST["email"];
    $phone_number = $_POST["phone_number"];
    $comments = $_POST["comments"];

    // Insert the data into the database
    $sql = "INSERT INTO contact (full_name, email, phone_number, comments)
            VALUES ('$full_name', '$email', '$phone_number', '$comments')";

    if ($conn->query($sql) === TRUE) {
        echo "success";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
}
?>