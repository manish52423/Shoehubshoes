<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = isset($_POST['usernamenew']) ? $_POST['usernamenew'] : '';
    $password = isset($_POST['passwordnew']) ? $_POST['passwordnew'] : '';

    $dbcnx = mysqli_connect('localhost', 'root', '', 'signup');

    if (!$dbcnx) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "SELECT * FROM signuptable WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($dbcnx, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        header("Location: shoehub.html");
        exit();
    } else {
        echo "Invalid username or password";
    }

    mysqli_close($dbcnx);
}

?>
