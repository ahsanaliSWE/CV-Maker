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
    <div class="register-auth">
        <h3>Register</h3>
        <div class="register-card mt-5">
            <div class="card shadow">
                <div class="card-body">
                    <form action="includes/register.inc.php" method="post">
                        <form>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Email</label>
                                <input type="email" class="form-control" name="email" required>
                            </div>

                            <div class="mb-3">
                                <div class="row">
                                    <div class="col">
                                        <label class="form-label">Firstname</label> <br>
                                        <input type="text" class="form-control" name="firstname" required>
                                    </div>
                                    <div class="col">
                                        <label class="form-label">Middlename</label> <br>
                                        <input type="text" class="form-control" name="middlename">
                                    </div>
                                    <div class="col">
                                        <label class="form-label">Lastname</label> <br>
                                        <input type="text" class="form-control" name="lastname" required>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="row">
                                    <div class="col">
                                        <label class="form-label">Gender</label> <br>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="gender" value="Male" required>
                                            <label class="form-check-label">Male</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="gender" value="Female" required>
                                            <label class="form-check-label">Female</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="gender" value="Other" required>
                                            <label class="form-check-label">Other</label>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <label class="form-label">Marital Status</label> <br>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="marital_status" value="Single" required>
                                            <label class="form-check-label">Single</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="marital_status" value="Married" required>
                                            <label class="form-check-label">Married</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="row">
                                    <div class="col">
                                        <label class="form-label">Date of Birth</label> <br>
                                        <input type="date" name="dob" class="form-control" required>
                                    </div>
                                    <div class="col">
                                        <label class="form-label">Nationality</label> <br>
                                        <input type="text" name="nationality" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="row">
                                    <div class="col">
                                        <label class="form-label">Password</label> <br>
                                        <input type="password" name="password" class="form-control" required>
                                    </div>
                                    <div class="col">
                                        <label class="form-label">Confirm Password</label> <br>
                                        <input type="text" name="c_password" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" name="submit" class="btn btn-primary">Login</button> <br> <br>
                            Already registered? <a href="index.php">Login Here</a>
                        </form>
                    </form>
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