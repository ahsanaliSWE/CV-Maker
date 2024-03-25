<?php
session_start();
include('../config.php');
$sql = "DELETE FROM resume WHERE resume_id = '$_GET[resume_id]'";
$result = $conn->query($sql);
header("location: ../dashboard?success=deleted");
exit();
