<?php
session_start();
if (!isset($_SESSION['loggedin'])) {
    header('Location: login.html');
    exit;
}
$servername = "localhost";
$username = "root";
$password = "pass";
$dbname = "dbtable";;
$conn = mysqli_connect($servername, $username, $password, $dbname);
if (mysqli_connect_errno()) {
    exit('Failed to connect to MySQL: ' . mysqli_connect_error());
}
//sleep(5);
$delname = $_SESSION['name'];
$sql = "DELETE FROM users WHERE meno ='$delname'";
$result=mysqli_query($conn,$sql);
header('Location: ../html/landing.html');
?>