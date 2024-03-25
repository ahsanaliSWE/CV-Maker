<?php
session_start();
include('config.php');
if (!isset($_SESSION['user_id'])) {
    header("location: index");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container">
            <a class="navbar-brand" href="dashboard">Resume Builder</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="dashboard">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="create-resume">Create Resume</a>
                    </li>
                </ul>
                <div class="d-flex">
                    <div class="logout"><a href='includes/logout.php'> <i class="fas fa-power-off"></i> Logout</a></div>
                </div>
            </div>
    </nav>
    <div class="wrapper">
        <div class="container mt-5">
            <?php
            $url = "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
            if (strpos($url, 'success=deleted') !== false) {
                echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                Resume Deleted!
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                </div>";
            } else if (strpos($url, 'success=created') !== false) {
                echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                Resume Created!
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                </div>";
            }
            ?>
            <div class="card shadow-sm" style='background-color: #e8dcff; border: none;'>
                <div class="card-body">
                    <div class="card-inside">
                        <h5>Create Resume</h5>
                        <a href="create-resume"><button class="btn btn-primary">Create</button></a>
                    </div>
                </div>
            </div>
            <div class="card shadow-sm my-5">
                <div class="card-body">
                    <?php
                    $sql = "SELECT * FROM resume where user_id = '$_SESSION[user_id]'";
                    $result = $conn->query($sql);
                    $row = mysqli_num_rows($result);
                    $resume_no = 0;
                    if ($row > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            $resume_no++;
                            echo "<div class='resume-list mb-3'>
                            <h6>Resume No $resume_no</h6>
                            <div>
                            <a href='view-resume?resume_id=$row[resume_id]' target=_blank><button class='btn btn-primary'>View</button></a>
                            <a href='includes/delete-resume.inc?resume_id=$row[resume_id]' ><button class='btn btn-danger'>Delete</button></a>
                            </div>
                        </div>";
                        }
                    } else {
                        echo " No Resume Found";
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
    <footer>
        <div class="container">
            &#169; <?php echo date("Y");  ?> Resume Builder
        </div>
    </footer>
</body>

</html>