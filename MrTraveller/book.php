<?php

// Establish a database connection if needed
// Replace the following credentials with your database information
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
    // Extract form data
    $checkType = $_POST["checkType"];
    $email = $_POST["email"];
    $phone = $_POST["myphone"];
    $departureCity = $_POST["FCity"];
    $destinationCity = $_POST["TCity"];
    $package=$_POST["package"];
    $adult = $_POST["adults"];
    $children = $_POST["children"];
    $travelClass = $_POST["travelClass"];
    $departureDate = $_POST["departure-date"];
    $returnDate = $_POST["return-date"];

    // Insert data into the database
    $sql = "INSERT INTO bookings (check_type, email, myphone, departure_city, destination_city, package, adults, children, travel_class, departure_date, return_date)
            VALUES ('$checkType', '$email', '$phone', '$departureCity', '$destinationCity', '$package',  '$adult', '$children', '$travelClass', '$departureDate', '$returnDate')";

    if ($conn->query($sql) === TRUE) {
        echo "success";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>