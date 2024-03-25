<?php
include '../config.php';

session_start();
if (isset($_POST['submit'])) {

    $firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
    $middlename = mysqli_real_escape_string($conn, $_POST['middlename']);
    $lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $c_password = mysqli_real_escape_string($conn, $_POST['c_password']);
    $gender = mysqli_real_escape_string($conn, $_POST['gender']);
    $marital_status = mysqli_real_escape_string($conn, $_POST['marital_status']);
    $dob = mysqli_real_escape_string($conn, $_POST['dob']);
    $nationality = mysqli_real_escape_string($conn, $_POST['nationality']);

    //-----Check if form datas are not filled-----
    if (empty($firstname) || empty($lastname) || empty($email) || empty($password)  || empty($c_password) || empty($gender) || empty($marital_status) || empty($dob) || empty($nationality)) {
        header("Location:../register?error=empty");
        exit();
    }

    //-----End Check if form datas are not filled-----

    else {
        if ($password != $c_password) {
            header("Location:../register?error=password-mismatched#contact");
            exit();
        } else {
            //check if email is valid
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                header("Location:../register?error=email-invalid#contact");
                exit();
            } else {
                //-----Check if email is already exists----- 

                $sql = "SELECT * FROM users WHERE email = '$email'";
                $result = $conn->query($sql);
                $emailCheck = mysqli_num_rows($result);

                if ($emailCheck > 0) {
                    header("Location:../register?error=email-already-exists#contact");
                    exit();
                } else {
                    $encrypted_password = password_hash($password, PASSWORD_DEFAULT); //hashing password

                    $sql = "INSERT INTO users ( firstname, middlename, lastname, email, password, gender, marital_status, dob, nationality)
							VALUES ('$firstname', '$middlename', '$lastname', '$email', '$encrypted_password', '$gender', '$marital_status', '$dob', '$nationality');";
                    $result = $conn->query($sql);

                    header("Location:../index?success=registered");
                    exit();
                }
            }
        }
    }
} else {
    header("Location:../register?error=submit#contact");
    exit();
}
