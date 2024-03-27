<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary" style="background-color: #20c997;">
        <div class="container">
            <a class="navbar-brand" href="dashboard">
                <img src="https://cdn-icons-png.flaticon.com/256/3135/3135742.png" alt="Bootstrap" width="30" height="35">
            </a>
            <a class="navbar-brand" href="dashboard" style=" font-weight: bold;">CV Maker</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="create-resume">Create CV</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="about-us">About us</a>
                    </li>
                </ul>
                <div class="d-flex">
                    <div class="logout"><a href='includes/logout.php'> <i class="fas fa-power-off"></i> Logout</a></div>
                </div>
            </div>
    </nav>

           <div class="card mt-4" style='border: none;'>
                <div class="card-body">
                    <div class="text-center"> 
                    <h1 style="font-family: Arial;font-weight:bold">About Us</h1>
                    </div>
                </div>
            </div>
            <div class="container">
        <div class="card shadow-sm" style='background-color: #7BEC9C; border: none;'>
            <div class="card-body">
                <p>Welcome to CV Maker! We are dedicated to helping you create professional CVs quickly and easily. Our platform provides a user-friendly interface to design and manage your resumes. Whether you're applying for your dream job or just updating your credentials, we've got you covered. Start crafting your perfect CV today!</p>
                <p>Our platform utilizes a variety of technologies including HTML, CSS, JavaScript, PHP, Bootstrap, and MySQL to offer you a seamless experience in designing and managing your resumes.</p>
                <p>To get started, simply fill out the intuitive forms provided. Your inputs will dynamically populate various sections of the CV template. Once completed, preview your CV in real-time, make any necessary adjustments, and generate a printable version with just a click of a button.</p>
            </div>
        </div>
    </div>

        <div class="card mt-3" style='border: none;'>
                <div class="card-body">
                    <div class="text-center"> 
                    <h1 style="font-family: Arial;font-weight:bold">Team</h1>
                    </div>
                </div>
            </div>
             
        <div class="wrapper">
    <div class="container-sm mt">
        <div class="row">
            <!-- First Team Member Card -->
            <div class="col-md-3">
                <div class="card shadow-sm" style="border: none;background-color: #DAFFD1">
                    <div class="card-body text-center">
                        <img src="Awais.jpeg" class="rounded-circle mb-3" alt="Team Member 1" width="150">
                        <h5>Awais Chandio</h5>
                        <p>20SW045</p>
                    </div>
                </div>
            </div>

            <!-- Second Team Member Card -->
            <div class="col-md-3">
                <div class="card shadow-sm" style="border: none;background-color: #DAFFD1">
                    <div class="card-body text-center">
                        <img src="Akash.jpeg" class="rounded-circle mb-3" alt="Team Member 2" width="150">
                        <h5>Akash Kumar</h5>
                        <p>20SW053</p>
                    </div>
                </div>
            </div>

            <!-- Third Team Member Card -->
            <div class="col-md-3">
                <div class="card shadow-sm" style="border: none;background-color: #DAFFD1">
                    <div class="card-body text-center">
                        <img src="Ahsan1.jpeg" class="rounded-circle mb-3" alt="Team Member 3" width="150">
                        <h5>Ahsan Ali</h5>
                        <p>20SW135</p>
                    </div>
                </div>
            </div>

            <!-- Fourth Team Member Card -->
            <div class="col-md-3">
                <div class="card shadow-sm" style="border: none;background-color: #DAFFD1">
                    <div class="card-body text-center">
                        <img src="Irfan.jpeg" class="rounded-circle mb-3" alt="Team Member 4" width="150">
                        <h5>Irfan Baloch</h5>
                        <p>20-19SW65</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


    <footer>
        <div class="container">
            &#169; <?php echo date("Y");  ?> CV Maker
        </div>
    </footer>
</body>

</html>
