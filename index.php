<?php
session_start();
if (isset($_SESSION['user_id'])) {
    header("location: dashboard");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resume Builder</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</head>

<body>
    <div class="wrapper">
        <div class="auth">
            <h3>Resume Builder</h3>
            <div class="mt-3">
                <?php
                $url = "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
                if (strpos($url, 'success=registered') !== false) {
                    echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                    User Registration Successful!
                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                    </div>";
                } else if (strpos($url, 'error=login') !== false) {
                    echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                    Email or password is incorrect!
                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                    </div>";
                } else  if (strpos($url, 'success=logout') !== false) {
                    echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                    Logout Successful!
                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                    </div>";
                }
                ?>
            </div>

            <div class="login-card mt-5">
                <div class="card shadow">
                    <div class="card-body">
                        <form action="includes/login.inc.php" method="POST">
                            <div class="mb-3">
                                <label class="form-label">Email address</label>
                                <input type="email" class="form-control" name="email" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Password</label>
                                <input type="password" class="form-control" name="password" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Login</button> <br> <br>
                            Don't have an account? <a href="register.php">Create Here</a>
                        </form>
                    </div>
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