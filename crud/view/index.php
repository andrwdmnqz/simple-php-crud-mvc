<?php
require_once "../controller/userController.php";

$userController = new userController();

$users = $userController->index();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User list</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
<h1>User list</h1>
<p>
    <a href="create.php">Create new user</a>
</p>
<div class="container">
    <table class="table">
        <head>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Email</th>
                <th>Gender</th>
                <th>Action</th>
            </tr>
        </head>
        <tbody>
        <?php
        foreach ($users as $user) {
            ?>
            <tr>
                <td><?php echo $user->getId(); ?></td>
                <td><?php echo $user->getName(); ?></td>
                <td><?php echo $user->getEmail(); ?></td>
                <td><?php echo $user->getGender(); ?></td>
                <td>
                    <a href="edit.php?id=<?= $user->getId(); ?>">Edit</a>
                    <a href="delete.php?id=<?= $user->getId(); ?>">Delete</a>
                </td>
            </tr>
            <?php
        }
        ?>
        </tbody>
    </table>
</div>
</body>
</html>