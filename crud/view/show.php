<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Show user</title>
</head>
<body>
    <h1>User info</h1>
    <p><b>ID: </b><?php echo $user->getId(); ?></p>
    <p><b>Name: </b><?php echo $user->getName(); ?></p>
    <p><b>Email: </b><?php echo $user->getEmail(); ?></p>
    <p><b>Gender: </b><?php echo $user->getGender(); ?></p>

    /*EDIT LINKS
    */
    <p>
        <a href="index.php">Back to list of users</a>
        <a href="index.php">Edit user <?php echo $user->getId(); ?></a>
        <a href="index.php">Delete user <?php echo $user->getId(); ?></a>
    </p>
</body>
</html>