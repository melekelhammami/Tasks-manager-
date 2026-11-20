<?php
require_once "classes/Task.php";
require_once "check_user.php";
if (isset($_GET['id']) && isset($_SESSION['tasks'])) {
    $id = $_GET['id'];
    foreach ($_SESSION['tasks'] as $key => $task) {
        if ($task->getId() === $id) {
            unset($_SESSION['tasks'][$key]);

            header("Location: dashboard.php");
            exit;
        }
    }
}
