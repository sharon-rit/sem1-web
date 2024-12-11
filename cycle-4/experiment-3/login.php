<?php
include 'db.php';

    $email = $_POST['email'];
    $phone = $_POST['phone'];

    $select_query = "SELECT * FROM $table_name WHERE email='$email' and phone='$phone'";

    $result = mysqli_query($conn, $select_query);   

    if (mysqli_num_rows($result) > 0) {
        $student = mysqli_fetch_assoc($result);

        //* SET COOKIES FOR THE USER 
        //setcookie(name, value, expire, path, domain, secure, httponly);
        // Set cookies for the logged-in user
        setcookie("user_id", $student['roll'], time() + (86400 * 30), "/"); // 30 days
        setcookie("first_name", $student['first_name'], time() + (86400 * 30), "/");
        setcookie("last_name", $student['last_name'], time() + (86400 * 30), "/");

        echo "
            <script type='text/javascript'>
                alert('Login Success!')
            </script>
        ";

        header("Location: profile.php");
    } else {
        echo "<p style='color:red;'> Invalid credentials </p>";
    }

    mysqli_close($conn);
?>