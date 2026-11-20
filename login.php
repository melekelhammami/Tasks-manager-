<?php
session_start();
$erreur = "";
$pwhash = password_hash("1234", PASSWORD_DEFAULT);
if (isset($_POST['btn'])) {
    if (empty($_POST['username']) || empty($_POST['password'])) {
        $erreur = "Enter all your informations";
    } else {
        $user = htmlspecialchars($_POST['username']);
        $pw = htmlspecialchars($_POST['password']);
        if ($user === "admin" && password_verify($pw, $pwhash)) {
            $_SESSION['user'] = $user;
            header("Location: dashboard.php");
            exit;
        } else {
            $erreur = "Username or Password incorrect";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <form method="post">

        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" name="username" id="username" class="form-control">
        </div>

        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary" name="btn">Se connecter</button>

    </form>

    <?php if (!empty($erreur)) : ?>
        <p class="error">
            <?= htmlspecialchars($erreur) ?>
        </p>
    <?php endif; ?>

</body>

</html>