<!-- register -->

<?php
include 'db.php';

//? GET DATA FROM USER TO PHP
    $first_name = $_GET['first_name'];
    $last_name = $_GET['last_name'];
    $day = intval($_GET['day']);
    $month = intval($_GET['month']);
    $year = intval($_GET['year']);
    $email = $_GET['email'];
    $phone = $_GET['phone'];

    $dob = NULL;
    $age = NULL;

    if (checkdate($month, $day, $year)) {
        $dob = new DateTime("$year-$month-$day");
        //$age = (new DateTime())->diff($dob)->y;
        $dob_formatted = $dob->format("y-m-d");
    } else {
        header("Location: date_error.php");
    }
    
//? QUERY TO REGISTER THE STUDENT
    $insert_query = "INSERT INTO $table_name(first_name, last_name, dob, email, phone) VALUES('$first_name','$last_name','$dob_formatted','$email','$phone')";

//? REDIRECT USER AFTER REGISTRATION
    if(mysqli_query($conn, $insert_query)){
        echo "
            <script type='text/javascript'>
                alert('Registration successful!');
                window.location = 'login.html';
            </script>
        ";
    } else {
        echo "
            <script type='text/javascript'>
                alert('Error while execution of query!".mysqli_error()."')
            </script>
        ";
    }

    mysqli_close($conn);

    //echo "
    //    <div>
    //        <h3>First name : $first_name</h3>
    //        <h3>Last name : $last_name</h3>
    //        <h3>DOB: $day-$month-$year | Age : $age<h3>
    //        <h3>Email : $email </h3>
    //        <h3>Phone : $phone </h3>
    //    </div>
    //"
?>