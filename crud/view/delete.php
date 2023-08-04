<?php
    require_once "../controller/userController.php";

    if (isset($_POST["delete"])) {
        $userController = new userController();
        $userController->delete($_GET["id"]);
    }

    if (isset($_GET["id"])) {
        $userController = new userController();
        $user = $userController->show($_GET["id"]);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Delete user</title>
</head>
<body>
    <h1>User info</h1>
    <p><b>ID: </b><?php echo $user->getId(); ?></p>
    <p><b>Name: </b><?php echo $user->getName(); ?></p>
    <p><b>Email: </b><?php echo $user->getEmail(); ?></p>
    <p><b>Gender: </b><?php echo $user->getGender(); ?></p>

    <form action="" method="post">
        <input type="submit" name="delete" value="delete">
    </form>
    <p>
        <a href="../index.php">Back to list of users</a>
        <a href="edit.php?id=<?= $user->getId(); ?>">Edit user <?php echo $user->getId(); ?></a>
        <a href="delete.php?id=<?= $user->getId(); ?>">Delete user <?php echo $user->getId(); ?></a>
    </p>
    <?php
    }
    ?>
</body>
</html>