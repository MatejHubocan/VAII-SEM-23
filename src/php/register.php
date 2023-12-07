<!DOCTYPE html>
<html lang="sk">

<head>
    <title>register page</title>
</head>

<body>
<h1>Registracne udaje</h1>

<form action="register.php" method="post">
    <p>
        <label for="name">user name:</label>
        <input type="text" name="username" id="name" required minlength="3" maxlength="20">
    </p>

    <p>
        <label for="pass">user password:</label>
        <input type="text" name="password" id="pass" required minlength="4" maxlength="20">
    </p>

    <input type="submit" name="submit" value="Submit">

</form>
</body>

</html>
<?php
$name = $pass = "";

if (isset($_POST['submit'])) {
    $name =  $_REQUEST['username'];
    $pass = $_REQUEST['password'];

    if(strlen($name) < 3){
        echo "Meno bolo prilis kratke (menej ako 3 znaky).";
        exit();
    }

    if(strlen($name) > 20){
        echo "Meno bolo prilis dlhe (viac ako 20 znakov).";
        exit();
    }

    if(strlen($pass) < 4){
        echo "Heslo bolo prilis kratke (menej ako 4 znaky).";
        exit();
    }
    if(strlen($pass) > 20){
        echo "Heslo bolo prilis dlhe (viac ako 20 znakov).";
        exit();
    }


    $servername = "localhost";
    $username = "root";
    $password = "pass";
    $dbname = "dbtable";
    $conn = mysqli_connect($servername, $username, $password, $dbname);

    if($conn === false){
        die("ERROR: Could not connect. ". mysqli_connect_error());
    }

    $sql = "SELECT meno FROM users WHERE meno='".$name."'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        echo "Meno je uz obsadene.";
        exit();
    }

    try {
        $sql = "SELECT MAX(id) as maximum FROM users;";
        if ($result=mysqli_query($conn,$sql)) {
            $newID=mysqli_fetch_array($result);
        }
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "INSERT INTO users (id, meno, heslo) VALUES ('$newID[0]'+1,'$name', '$pass')";
        $conn->exec($sql);
        header('Location: ../html/login.html');
    } catch(PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
    }

    $conn = mysqli_connect($servername, $username, $password, $dbname);
    mysqli_close($conn);
}
?>