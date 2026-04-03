<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$conn = mysqli_connect("localhost", "root", "", "equipment_db");
if (!$conn) { die("Connection failed: " . mysqli_connect_error()); }
?>