<?php
session_start(); // Start the session

// Destroy the session to log out
session_destroy();

// Redirect to the login page
header("Location: login.php");
exit;
