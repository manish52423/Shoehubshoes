<?php

$username = isset($_POST['up']) ? $_POST['up'] : '';
$password = isset($_POST['pp']) ? $_POST['pp'] : '';
$email = isset($_POST['ep']) ? $_POST['ep'] : '';
$number = isset($_POST['np']) ? $_POST['np'] : '';

$dbcnx = mysqli_connect('localhost', 'root', '', 'signup');

if (!$dbcnx) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "INSERT INTO signuptable (username, password, email, number) VALUES ('$username', '$password', '$email', '$number')";

if (mysqli_query($dbcnx, $sql)) {
    header("Location: shoehub.html");
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($dbcnx);
}

mysqli_close($dbcnx);

?>
