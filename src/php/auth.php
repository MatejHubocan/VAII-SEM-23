<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "pass";
$dbname = "dbtable";
$conn = mysqli_connect($servername, $username, $password, $dbname);

if ( mysqli_connect_errno() ) {
    exit('Failed to connect to MySQL: ' . mysqli_connect_error());
}

if ( !isset($_POST['username'], $_POST['password']) ) {
    exit('Please fill both the username and password fields!');
}

if ($stmt = $conn->prepare('SELECT id, heslo FROM users WHERE meno = ?')) {
    $stmt->bind_param('s', $_POST['username']);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $password);
        $stmt->fetch();
        if ($_POST['password'] === $password) {
            session_regenerate_id();
            $_SESSION['loggedin'] = TRUE;
            $_SESSION['name'] = $_POST['username'];
            $_SESSION['id'] = $id;
            header('Location: home.php');
        } else {
            echo 'Incorrect username and/or password!';
        }
    } else {
        echo 'Incorrect username and/or password!';
    }
    $stmt->close();
}