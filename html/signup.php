<?php
include "config.php";

if (isset($_POST['submit'])) {


    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $fetchUsers = "SELECT * FROM `USERS` WHERE `username` = '$username' OR `email`='$email'";
    $users =  mysqli_query($conn, $fetchUsers);
    $userData =  mysqli_num_rows($users);
echo $userData;
    // print_r($userData);

    if ($userData > 0) {

        echo "<script>alert('user already exist')</script>";
        echo "<script>window.location.href = 'index.php#'</script>";
    } else {

        $query = "INSERT INTO `users` ( `username`, `email`, `password`) 
VALUES ('$username', '$email', '$password')";

        if (mysqli_query($conn, $query)) {

            echo "<script>alert('Register Successfully')</script>";
            echo "<script>window.location.href = 'index.php'</script>";
        }
    }
}
