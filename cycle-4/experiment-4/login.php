<?php
session_start(); // Start the session

include 'db.php'; // Database connection

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    // Query to verify the login credentials
    $sql = "SELECT * FROM students WHERE email = '$email' AND phone = '$phone'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);

        // Set session variables for logged-in user
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['first_name'] = $user['first_name'];
        $_SESSION['last_name'] = $user['last_name'];

        // Redirect to profile page
        header("Location: profile.php");
        exit;
    } else {
        echo "Invalid login credentials!";
    }
}
?>

<form method="POST" action="login.php">
    <label>Email:</label><br>
    <input type="email" name="email" required><br>

    <label>Phone:</label><br>
    <input type="text" name="phone" required><br>

    <input type="submit" value="Login">
</form>
