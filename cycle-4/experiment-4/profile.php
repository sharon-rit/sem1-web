<?php
session_start(); // Start the session

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    echo "You are not logged in!";
    exit;
}

// Fetch user data from session
$user_id = $_SESSION['user_id'];
$first_name = $_SESSION['first_name'];
$last_name = $_SESSION['last_name'];

// Optionally, fetch additional user info from the database
include 'db.php'; // Database connection

$sql = "SELECT * FROM students WHERE id = '$user_id'";
$result = mysqli_query($conn, $sql);
$user_data = mysqli_fetch_assoc($result);

?>

<h1>Welcome, <?php echo $first_name . " " . $last_name; ?></h1>
<p>Email: <?php echo $user_data['email']; ?></p>
<p>Phone: <?php echo $user_data['phone']; ?></p>

<!-- Logout Button -->
<form method="POST" action="logout.php">
    <button type="submit">Logout</button>
</form>
