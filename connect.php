<?php
// Retrieve values from the form
$username = $_GET['usernamephp'];
$password = $_GET['passwordphp'];
$email = $_GET['emailphp'];
$number = $_GET['numberphp'];

// Database connection
$dbcnx = mysqli_connect('localhost', 'root', '', 'shoehub');

// Check connection
if (!$dbcnx) {
    die("Connection failed: " . mysqli_connect_error());
}

// Hash the password (you should use a more secure method in a production environment)
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// SQL query to insert data into the 'register' table
$sql = "INSERT INTO register (susername, spassword, semail, snumber) VALUES ('$username', '$hashed_password', '$email', '$number')";

// Execute the query
if (mysqli_query($dbcnx, $sql)) {
    echo "Record inserted successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($dbcnx);
}

// Close the database connection
mysqli_close($dbcnx);
?>
