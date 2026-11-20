<?php
require_once "classes/Task.php";
require_once "check_user.php";
if (isset($_GET['id']) && isset($_SESSION['tasks'])) {
    $id = $_GET['id'];
    foreach ($_SESSION['tasks'] as $task) {
        if ($task->getId() == $id) {
            if (isset($_POST['btn'])) {
                $title = htmlspecialchars($_POST['taskname']);
                $desc = htmlspecialchars($_POST['desc']);
                if ($title !== "" && $desc !== "") {
                    $task->setTitle($title);
                    $task->setDescription($desc);
                    header("Location: dashboard.php");
                    exit;
                }
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style.css"
        rel="stylesheet">
    <title>Document</title>
</head>

<body>
    <form method="post">
        <div class="form-group">
            <label for="taskname">Task name</label>
            <input type="text" name="taskname" id="taskname" class="form-control" value="<?= $task->getTitle() ?>">
        </div>
        <div class="form-group">
            <label for="desc">Task description</label>
            <input type="text" name="desc" id="desc" class="form-control" value="<?= $task->getDescription() ?>">
        </div>
        <button type="submit" class="btn btn-primary" name="btn">Edit task</button>
    </form>
</body>

</html>