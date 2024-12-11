<?php 
    include 'db.php';

    if(isset($_COOKIE['user_id'])) {
        $user_id = $_COOKIE['user_id'];
        $first_name = $_COOKIE['first_name'];
        $last_name = $_COOKIE['last_name'];


        $select_query = "SELECT * FROM $table_name WHERE roll='$user_id'";

        $result = mysqli_query($conn, $select_query);

        if(mysqli_num_rows($result) > 0) {
            $student = mysqli_fetch_assoc($result);

            if(!$student) {
                echo "No student matched with the roll number : $user_id";
            } else {
                echo $student['first_name']." ".$student['last_name'];
            }
        } else {
            echo "database is empty!. No data found.";
        }
    }

    if(isset($_POST['logout'])) {
        //clear all cookies 

        setcookie('user_id', "", time() - 3600, '/');
        setcookie('first_name', "", time() - 3600, "/");
        setcookie('last_name', "" ,time() - 3600, "/");

        header("Location: login.html");
        echo "logging out...!";
        exit;
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
</head>

<body>
    <h1>Cookie Data</h1>

    <div>
        <?php $student ?>
    </div>

    <form method='POST'>
        <input type="submit" name='logout' value="Logout">
    </form>
</body>

</html>