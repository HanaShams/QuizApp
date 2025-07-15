<?php
// db.php
$conn = new mysqli("localhost", "root", "", "quizdb");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
