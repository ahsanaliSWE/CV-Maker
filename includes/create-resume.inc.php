<?php
include '../config.php';
session_start();

if (isset($_POST['submit'])) {

    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $city = mysqli_real_escape_string($conn, $_POST['city']);
    $pincode = mysqli_real_escape_string($conn, $_POST['pincode']);
    $state = mysqli_real_escape_string($conn, $_POST['state']);
    $country = mysqli_real_escape_string($conn, $_POST['country']);
    $objective = mysqli_real_escape_string($conn, $_POST['objective']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $place = mysqli_real_escape_string($conn, $_POST['place']);
    //$photo = $_FILES['photo'];
    $signature = $_FILES['signature'];

    //-----Check if form datas are not filled-----
    if (empty($address) || empty($city) || empty($state) || empty($pincode)  || empty($country) ||  empty($objective) || empty($phone)) {
        header("Location:../create-resume?error=empty");
        exit();
    }

    //-----End Check if form datas are not filled-----

    else {
        $sql_resume = "INSERT INTO resume (user_id, objective, place)
            VALUES('$_SESSION[user_id]', '$objective', '$place');";
        $result_resume = $conn->query($sql_resume);
        $resume_id = $conn->insert_id;

        $sql_address = "INSERT INTO address ( resume_id, address, city, pincode, state, country, phone)
        			VALUES ('$resume_id','$address', '$city', '$pincode', '$state', '$country', '$phone');";
        $result_address = $conn->query($sql_address);

        //add coures
        $courses = $_POST['course'];
        $years = $_POST['year'];
        $institutes = $_POST['institute'];

        foreach ($courses as $index => $course) {
            $year = $years[$index];
            $institute = $institutes[$index];
            if ($course != "") {
                $sql_course = "INSERT INTO education ( resume_id, course, institute, year)
                VALUES ('$resume_id','$course', '$institute', '$year');";
                $result_course = $conn->query($sql_course);
            }
        }

        //add experiences
        $positions = $_POST['position'];
        $organizations = $_POST['organization'];
        $from_dates = $_POST['from'];
        $to_dates = $_POST['to'];

        foreach ($positions as $index => $position) {
            $organization = $organizations[$index];
            $from_date = $from_dates[$index];
            $to_date = $to_dates[$index];
            if ($position != "") {
                $sql_experience = "INSERT INTO experience ( resume_id, position, organization, from_date, to_date)
                VALUES ('$resume_id','$position', '$organization', '$from_date', '$to_date');";
                $result_experience = $conn->query($sql_experience);
            }
        }

        //add languages
        $sql_language = "INSERT INTO languages ( resume_id, lang1, lang2, lang3, lang4)
        VALUES ('$resume_id','$_POST[lang1]', '$_POST[lang2]', '$_POST[lang3]', '$_POST[lang4]');";
        $result_language = $conn->query($sql_language);

        //add skills
        $sql_skill = "INSERT INTO skills ( resume_id, skill1, skill2, skill3, skill4)
        VALUES ('$resume_id','$_POST[skill1]', '$_POST[skill2]', '$_POST[skill3]', '$_POST[skill4]');";
        $result_skill = $conn->query($sql_skill);
      
        header("Location: ../dashboard?success=created");
        exit();
    }
} else {
    header("Location:../create-resume?error=submit");
    exit();
}
