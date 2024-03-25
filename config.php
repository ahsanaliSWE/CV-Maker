<?php
$http_host = '//' . $_SERVER['HTTP_HOST'] . '/resume-builder';
$http_root = $_SERVER['DOCUMENT_ROOT'] . '/resume-builder';


$host = "localhost";
$username = "root";
$password = "";
$database = "classdb";


$conn = mysqli_connect($host, $username, $password, $database);

// Check connection
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
