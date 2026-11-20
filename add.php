<?php
require_once "classes\Task.php";
include "check_user.php";
$erreur = "";
if (!isset($_SESSION['tasks'])) {
    $_SESSION['tasks'] = [];
}
if (isset($_POST['btn'])) {
    if (!empty(trim($_POST['taskname'])) && !empty(trim($_POST['desc']))) {
        $title = trim(htmlspecialchars($_POST['taskname']));
        $desc = trim(htmlspecialchars($_POST['desc']));
        $task = new Task(uniqid(), $title, $desc);
        $_SESSION['tasks'][] = $task;
        header("Location: dashboard.php");
        exit;
    } else {
        $erreur = "Enter your task and description";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add task !</title>
    <link rel="stylesheet" href="style.css">

</head>

<body>
    <form method="post">

        <div class="form-group">
            <label for="taskname">Task name</label>
            <input type="text" name="taskname" id="taskname" class="form-control">
        </div>

        <div class="form-group">
            <label for="desc">Task description</label>
            <input type="text" name="desc" id="desc" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary" name="btn">Add task</button>

    </form>
    <?php if (!empty($erreur)) : ?>
        <p class="error">
            <?= htmlspecialchars($erreur) ?>
        </p>
    <?php endif; ?>
</body>

</html>