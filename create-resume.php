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

    <?php
    $sql = "SELECT * FROM users where user_id = '$_SESSION[user_id]'";
    $result = $conn->query($sql);
    $row = mysqli_fetch_assoc($result);
    ?>
    <div class="container mt-5">
        <h5>Create Resume</h5>
        <form action="includes/create-resume.inc.php" method="post" enctype="multipart/form-data">
            <div class="card shadow-sm mt-5 mb-4">
                <div class="card-body">
                    <h6>Objective <span class="required">*</span></h6>
                    <textarea class="form-control" name="objective" rows="3"></textarea>
                </div>
            </div>
            <div class="card shadow-sm">
                <div class="card-body">
                    <h6>Personal Details</h6>
                    <div class="mb-3">
                        <div class="row">
                            <div class="col">
                                <label class="form-label">Firstname</label> <br>
                                <input type="text" class="form-control" name="firstname" value="<?php echo $row['firstname']; ?>" required disabled>
                            </div>
                            <div class="col">
                                <label class="form-label">Middlename</label> <br>
                                <input type="text" class="form-control" name="middlename" value="<?php echo $row['middlename']; ?>" disabled>
                            </div>
                            <div class="col">
                                <label class="form-label">Lastname</label> <br>
                                <input type="text" class="form-control" name="lastname" value="<?php echo $row['lastname']; ?>" required disabled>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="row">
                            <div class="col">
                                <label class="form-label">Gender</label> <br>
                                <input type="text" class="form-control" name="firstname" value="<?php echo $row['gender']; ?>" required disabled>
                            </div>
                            <div class="col">
                                <label class="form-label">DOB</label> <br>
                                <input type="text" class="form-control" name="middlename" value="<?php echo $row['dob']; ?>" disabled>
                            </div>
                            <div class="col">
                                <label class="form-label">Nationality</label> <br>
                                <input type="text" class="form-control" name="lastname" value="<?php echo $row['nationality']; ?>" required disabled>
                            </div>
                            <div class="col">
                                <label class="form-label">Marital Status</label> <br>
                                <input type="text" class="form-control" name="lastname" value="<?php echo $row['marital_status']; ?>" required disabled>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="row">
                            <div class="col">
                                <label class="form-label">Address <span class="required">*</span></label> <br>
                                <input type="text" class="form-control" name="address" required>
                            </div>
                            <div class="col">
                                <label class="form-label">City <span class="required">*</span></label> <br>
                                <input type="text" class="form-control" name="city" required>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="row">
                            <div class="col">
                                <label class="form-label">Pincode <span class="required">*</span></label> <br>
                                <input type="number" class="form-control" name="pincode" required>
                            </div>
                            <div class="col">
                                <label class="form-label">State <span class="required">*</span></label> <br>
                                <input type="text" class="form-control" name="state" required>
                            </div>
                            <div class="col">
                                <label class="form-label">Country <span class="required">*</span></label> <br>
                                <input type="text" class="form-control" name="country" required>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="row">
                            <div class="col">
                                <label class="form-label">Phone <span class="required">*</span></label> <br>
                                <input type="number" class="form-control" name="phone" required>
                            </div>
                            <div class="col"></div>
                            <div class="col"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card shadow-sm mt-5">
                <div class="card-body">
                    <h6>Education</h6>
                    <div class="mb-3">
                        <div class="row">
                            <div class="col">
                                <label class="form-label">Course <span class="required">*</span></label> <br>
                                <input type="text" class="form-control" name="course[]" required>
                            </div>
                            <div class="col">
                                <label class="form-label">Institute <span class="required">*</span></label> <br>
                                <input type="text" class="form-control" name="institute[]" required>
                            </div>
                            <div class="col">
                                <label class="form-label">Year <span class="required">*</span></label> <br>
                                <input type="number" class="form-control" name="year[]" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <label class="form-label">Course</label> <br>
                                <input type="text" class="form-control" name="course[]">
                            </div>
                            <div class="col">
                                <label class="form-label">Institute</label> <br>
                                <input type="text" class="form-control" name="institute[]">
                            </div>
                            <div class="col">
                                <label class="form-label">Year</label> <br>
                                <input type="number" class="form-control" name="year[]">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <label class="form-label">Course</label> <br>
                                <input type="text" class="form-control" name="course[]">
                            </div>
                            <div class="col">
                                <label class="form-label">Institute</label> <br>
                                <input type="text" class="form-control" name="institute[]">
                            </div>
                            <div class="col">
                                <label class="form-label">Year</label> <br>
                                <input type="number" class="form-control" name="year[]">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card shadow-sm mt-5">
                <div class="card-body">
                    <h6>Experience</h6>
                    <div class="mb-3">
                        <div class="row">
                            <div class="col">
                                <label class="form-label">Position</label> <br>
                                <input type="text" class="form-control" name="position[]">
                            </div>
                            <div class="col">
                                <label class="form-label">Organization</label> <br>
                                <input type="text" class="form-control" name="organization[]">
                            </div>
                            <div class="col">
                                <label class="form-label">From</label> <br>
                                <input type="date" class="form-control" name="from[]">
                            </div>
                            <div class="col">
                                <label class="form-label">To</label> <br>
                                <input type="date" class="form-control" name="to[]">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <label class="form-label">Position</label> <br>
                                <input type="text" class="form-control" name="position[]">
                            </div>
                            <div class="col">
                                <label class="form-label">Organization</label> <br>
                                <input type="text" class="form-control" name="organization[]">
                            </div>
                            <div class="col">
                                <label class="form-label">From</label> <br>
                                <input type="date" class="form-control" name="from[]">
                            </div>
                            <div class="col">
                                <label class="form-label">To</label> <br>
                                <input type="date" class="form-control" name="to[]">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <label class="form-label">Position</label> <br>
                                <input type="text" class="form-control" name="position[]">
                            </div>
                            <div class="col">
                                <label class="form-label">Organization</label> <br>
                                <input type="text" class="form-control" name="organization[]">
                            </div>
                            <div class="col">
                                <label class="form-label">From</label> <br>
                                <input type="date" class="form-control" name="from[]">
                            </div>
                            <div class="col">
                                <label class="form-label">To</label> <br>
                                <input type="date" class="form-control" name="to[]">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card shadow-sm mt-5">
                <div class="card-body">
                    <h6>Language</h6>
                    <div class="mb-3">
                        <div class="row">
                            <div class="col">
                                <label class="form-label">Language 1 <span class="required">*</span></label> <br>
                                <input type="text" class="form-control" name="lang1" required>
                            </div>
                            <div class="col">
                                <label class="form-label">Language 2 <span class="required">*</span></label> <br>
                                <input type="text" class="form-control" name="lang2" required>
                            </div>
                            <div class="col">
                                <label class="form-label">Language 3</label> <br>
                                <input type="text" class="form-control" name="lang3">
                            </div>
                            <div class="col">
                                <label class="form-label">Language 4</label> <br>
                                <input type="text" class="form-control" name="lang4">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card shadow-sm mt-5 mb-4">
                <div class="card-body">
                    <h6>Skills</h6>
                    <div class="mb-3">
                        <div class="row">
                            <div class="col">
                                <label class="form-label">Skill 1 <span class="required">*</span></label> <br>
                                <input type="text" class="form-control" name="skill1" required>
                            </div>
                            <div class="col">
                                <label class="form-label">Skill 2 <span class="required">*</span></label> <br>
                                <input type="text" class="form-control" name="skill2" required>
                            </div>
                            <div class="col">
                                <label class="form-label">Skill 3</label> <br>
                                <input type="text" class="form-control" name="skill3">
                            </div>
                            <div class="col">
                                <label class="form-label">Skill 4</label> <br>
                                <input type="text" class="form-control" name="skill4">
                            </div>
                            <div class="col">
                                <label class="form-label">Skill 5</label> <br>
                                <input type="text" class="form-control" name="skill5">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card shadow-sm mt-5 mb-4">
                <div class="card-body">
                    <h6>Place <span class="required">*</span></h6>
                    <div class="mb-3">
                        <div class="row">
                            <div class="col">
                                <input type="text" class="form-control" name="place" required>
                            </div>
                            <div class="col"></div>
                            <div class="col"></div>
                        </div>
                    </div>
                </div>
            </div>
            <span class="required">*</span> Fields are mandatory.
            <div class=" mt-3 mb-5">
                <button type="submit" name="submit" class="btn btn-primary">Submit</button> <br>
            </div>
        </form>
    </div>
    <footer>
        <div class="container">
            &#169; <?php echo date("Y");  ?> Resume Builder
        </div>
    </footer>
</body>

</html>