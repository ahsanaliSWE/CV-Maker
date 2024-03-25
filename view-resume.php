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
    <title>View Resume</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;0,700;1,400&display=swap" rel="stylesheet">
</head>

<body style="font-family: 'Roboto', sans-serif; color: #444;">
    <?php
    $sql_users = "SELECT * from users where user_id = '$_SESSION[user_id]';";
    $result_users = $conn->query($sql_users);
    $row_users = mysqli_fetch_assoc($result_users);

    $resume_id = $_GET['resume_id'];
    $sql_resume = "SELECT * from resume where resume_id = '$resume_id';";
    $result_resume = $conn->query($sql_resume);
    $row_resume = mysqli_fetch_assoc($result_resume);
    ?>
    <div style="display: flex; justify-content: space-between;">
        <div style="display: flex; flex-direction: column;">
            <div class="name"><?php echo $row_users['firstname'] . ' ' . $row_users['middlename'] . ' ' . $row_users['lastname']; ?></div>
            <div class="objective"><?php echo $row_resume['objective'] ?></div>
        </div>
    </div>
    <div style="display: flex; justify-content: space-between; margin-top: 20px;">
        <div>
            <div class="resume-heading">EDUCATION</div>
            <?php
            $sql_course = "SELECT * from education where resume_id = '$resume_id';";
            $result_course = $conn->query($sql_course);
            while ($row_course = mysqli_fetch_assoc($result_course)) {
                echo "
                    <div class='course'>
                        <b>$row_course[course]</b> - $row_course[institute]<br>
                        Year of passing: $row_course[year]
                    </div> <br> 
                ";
            }
            ?>

        </div>
        <div style='text-align: left; width: 200px;'>
            <div class="resume-heading">ADDRESS</div>
            <?php
            $sql_address = "SELECT * from address where resume_id = '$resume_id';";
            $result_address = $conn->query($sql_address);
            $row_address = mysqli_fetch_assoc($result_address);
            echo "$row_address[address], $row_address[city]<br>
            $row_address[state] - $row_address[pincode] <br>
            $row_address[country] <br>
            +91 7002072619 <br>
            $row_users[email]";
            ?>

        </div>
    </div>
    <div style="display: flex; justify-content: space-between; margin-top: 20px;">
        <div>
            <div class="resume-heading">EXPERIENCE</div>
            <?php
            $sql_experience = "SELECT * from experience where resume_id = '$resume_id';";
            $result_experience = $conn->query($sql_experience);
            while ($row_experience = mysqli_fetch_assoc($result_experience)) {
                echo "
                    <div class='experience'>
                        <b>$row_experience[position]</b> <i>at</i> $row_experience[organization]<br>
                        <i>From: $row_experience[from_date]- To:$row_experience[to_date]</i>
                    </div> <br>
                ";
            }
            ?>

        </div>
        <div style='text-align: left; width: 200px;'>
            <div class="resume-heading">PERSONAL DETAILS</div>
            <?php
            echo "
            Gender: $row_users[gender] <br>
            DOB: $row_users[dob] <br>
            Marital Status: $row_users[marital_status] <br>
            Nationality: $row_users[nationality]";
            ?>

        </div>
    </div>
    <div style="display: flex; justify-content: space-between; margin-top: 20px;">
        <div>
            <div class="resume-heading">SKILLS</div>
            <div class="language">
                <?php
                $sql_skills = "SELECT * from skills where resume_id = '$resume_id';";
                $result_skills = $conn->query($sql_skills);
                $row_skills = mysqli_fetch_assoc($result_skills);
                echo "&#x2022; $row_skills[skill1] <br>";
                echo "&#x2022; $row_skills[skill2] <br>";
                echo "&#x2022; $row_skills[skill3] <br>";
                echo "&#x2022; $row_skills[skill4] <br>";
                ?>

            </div> <br>

        </div>
        <div style='text-align: left; width: 200px;'>
            <div class="resume-heading">LANGUAGE</div>
            <?php
            $sql_lang = "SELECT * from languages where resume_id = '$resume_id';";
            $result_lang = $conn->query($sql_lang);
            $row_lang = mysqli_fetch_assoc($result_lang);
            echo "&#x2022; $row_lang[lang1] <br>";
            echo "&#x2022; $row_lang[lang2] <br>";
            echo "&#x2022; $row_lang[lang3] <br>";
            echo "&#x2022; $row_lang[lang4] <br>";
            ?>
        </div>
    </div>
    <div style="display: flex; justify-content: space-between; margin-top: 20px;">
        <div>
            <div class="language">
                Date: <?php echo $row_resume['date']; ?> <br>
                Place: <?php echo $row_resume['place']; ?>
            </div> <br>

        </div>
    </div>
    <div style="text-align: center; margin-top: 20px;">
        <button onclick="printResume()" class="btn btn-primary" id="printButton">Print Resume</button>
    </div>


    <script>
        function printResume() {
            // Hide the print button
            var printButton = document.getElementById('printButton');
            printButton.style.display = 'none';

            // Print the resume
            window.print();

            // Show the print button again after printing
            printButton.style.display = 'inline-block';
        }
    </script>
</body>

</html>