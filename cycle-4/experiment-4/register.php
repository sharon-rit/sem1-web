<?php
include 'db.php'; // Database connection

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $dob = $_POST['dob'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    // Insert user into the database
    $sql = "INSERT INTO students (first_name, last_name, dob, email, phone) 
            VALUES ('$first_name', '$last_name', '$dob', '$email', '$phone')";
    
    if (mysqli_query($conn, $sql)) {
        echo "Registration successful!";
        header("Location: login.php");
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>

<form method="POST" action="register.php">
    <label>First Name:</label><br>
    <input type="text" name="first_name" required><br>

    <label>Last Name:</label><br>
    <input type="text" name="last_name" required><br>

    <label>Date of Birth:</label><br>
    <select name="dob" required>
        <option value="2000-01-01">2000-01-01</option>
        <option value="2001-02-15">2001-02-15</option>
        <option value="2001-03-25">2001-03-25</option>
        <option value="2001-04-30">2001-04-30</option>
    </select><br>

    <label>Email:</label><br>
    <input type="email" name="email" required><br>

    <label>Phone:</label><br>
    <input type="text" name="phone" required><br>

    <input type="submit" value="Register">
</form>
