<?php
require_once "classes/Task.php";
require_once "check_user.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - My Tasks</title>
    <link href="style.css"
        rel="stylesheet">
</head>

<body class="bg-light">

    <div class="container mt-5">

        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h2>My Tasks</h2>
                <p class="text-muted">
                    Welcome <?= htmlspecialchars($_SESSION['user']) ?>!
                </p>
            </div>

            <div>
                <a href="add.php" class="btn btn-primary">+ Add Task</a>
                <a href="logout.php" class="btn btn-danger">Logout</a>
            </div>
        </div>

        <div class="card shadow-sm">
            <div class="card-body">

                <h5 class="card-title mb-3">Tasks List</h5>

                <?php if (empty($_SESSION['tasks'])) { ?>

                    <div class="alert alert-info">
                        No tasks yet. Add your first task!
                    </div>

                <?php } else { ?>

                    <div class="table-responsive">
                        <table class="table table-striped table-hover table-bordered align-middle">

                            <thead class="table-dark">
                                <tr>
                                    <th>ID</th>
                                    <th>Task name</th>
                                    <th>Description</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php foreach ($_SESSION['tasks'] as $task) {
                                ?>
                                    <tr>
                                        <td><?= htmlspecialchars($task->getId()) ?></td>
                                        <td><?= htmlspecialchars($task->getTitle()) ?></td>
                                        <td><?= htmlspecialchars($task->getDescription()) ?></td>
                                        <?php if ($task->getCompleted() == true) {
                                        ?><td><span class="badge bg-success">Completed</span></td>
                                        <?php
                                        } else {
                                        ?><td><span class="badge bg-warning text-dark">Pending</span></td>
                                        <?php                                                                                                                    } ?><td>
                                            <a href="edit.php?id=<?= $task->getId() ?>" class="btn btn-sm btn-warning">
                                                Edit
                                            </a>
                                            <a href="delete.php?id=<?= $task->getId() ?>" class="btn btn-sm btn-danger">
                                                Delete
                                            </a>
                                            <?php if ($task->getCompleted()) { ?>

                                                <a href="toggle.php?id=<?=$task->getId()?>"
                                                    class="btn btn-sm btn-secondary">
                                                    Mark as Pending
                                                </a>

                                            <?php } else { ?>

                                                <a href="toggle.php?id=<?=$task->getId()?>"
                                                    class="btn btn-sm btn-success">
                                                    Mark as Completed
                                                </a>

                                            <?php } ?>
                                        </td>
                                    </tr>

                                <?php }; ?>

                            </tbody>

                        </table>
                    </div>

                <?php } ?>

            </div>
        </div>

    </div>

</body>

</html>