<?php
session_start();
include('../config.php');


$email = mysqli_real_escape_string($conn, $_POST['email']);
$password = mysqli_real_escape_string($conn, $_POST['password']);

//-----Check if form datas are not filled-----

if (empty($email)) {
    header("Location:../index.php?error=empty");
    exit();
}
if (empty($password)) {
    header("Location:../index.php?error=empty");
    exit();
}
//-----Check if form datas are not filled-----

//-----Check For Hash Password and Dehash-----

$sql = "SELECT * FROM users WHERE email = '$email'";
$result = $conn->query($sql);
$row = mysqli_fetch_assoc($result);
$hash_password = $row['password'];
$dehash = password_verify($password, $hash_password);
if ($dehash == 0) {
    header("Location:../index.php?error=login");
    exit();
}

//-----End Check For Hash Password and Dehash-----  

else {
    $sql = "SELECT * FROM users WHERE email = '$email'  AND password = '$hash_password' ";
    $result = $conn->query($sql);

    if (!$row = $result->fetch_assoc()) {
        header("Location:../index.php?error=login");
        exit();
    } else {
        $_SESSION['user_id'] = $row['user_id'];
    }
    header("Location: ../dashboard");
}
