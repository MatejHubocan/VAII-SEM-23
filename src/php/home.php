<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
    header('Location: index.html');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>DOTA2Hub</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../css/css.css">
</head>
<body>
<div class="menu">
    <a href="profile.php">Profile</a>
    <a href="logout.php">Logout</a>
    <a href="home.php">Home</a>
</div>
<div class="overhead">
    <h2>Home Page</h2>
    <p>Welcome back, <?=$_SESSION['name']?>!</p>
</div>

<div class="news">
    <div class ="article">
        <header> Header for article 1 </header>
        <p>
            Text for article. Text for article. Text for article. Text for article. Text for article.
            Text for article. Text for article. Text for article. Text for article. Text for article.
            Text for article. Text for article. Text for article. Text for article. Text for article.
            Text for article. Text for article. Text for article. Text for article. Text for article.
        </p>
    </div>
    <div class ="article">
        <header>
            Header for article 2
        </header>
        <p>
            Text for article. Text for article. Text for article. Text for article. Text for article.
            Text for article. Text for article. Text for article. Text for article. Text for article.
            Text for article. Text for article. Text for article. Text for article. Text for article.
            Text for article. Text for article. Text for article. Text for article. Text for article.
        </p>
    </div>
    <div class ="article">
        <header>Header for article 3</header>
        <p>
            Text for article. Text for article. Text for article. Text for article. Text for article.
            Text for article. Text for article. Text for article. Text for article. Text for article.
            Text for article. Text for article. Text for article. Text for article. Text for article.
            Text for article. Text for article. Text for article. Text for article. Text for article.
        </p>
    </div>
    <button style="margin-bottom: 50px">older articles</button>
</div>

<div class="foot">
    Author: M. Hubocan<br>
    Contact: some@email.com
</div>
</body>
</html>