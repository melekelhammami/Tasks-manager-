<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <h1>
        Welcome <?=$_SESSION['user'] ?> !
    </h1>

    <p>Welcome to your tasks manager.</p>

    <a href="logout.php">Déconnexion</a>

</body>
</html>
