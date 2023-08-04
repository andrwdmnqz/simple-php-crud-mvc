<?php
    require_once "../controller/userController.php";

    if (isset($_POST["update"])) {
        $userController = new userController();
        $userController->update($_GET["id"]);
    }

    $user = null;
    if (isset($_GET["id"])) {
        $userController = new userController();
        $user = $userController->edit($_GET["id"]);
    }

    if ($user != null) {
        $name = $user->getName();
        $email = $user->getEmail();
        $password = $user->getPassword();
        $gender = $user->getGender();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update user</title>
</head>
<body>
    <h1>Update user</h1>
    <form method="post" action="">
        <label for="name">Name: </label>
        <input type="text" name="name" id="name" value="<?php echo $name; ?>" required> <br> <br>
        <label for="email">Email: </label>
        <input type="email" name="email" id="email" value="<?php echo $email; ?>" required> <br> <br>
        <label for="password">Password: </label>
        <input type="password" name="password" id="password" value="<?php echo $password; ?>" required> <br> <br>
        <label for="name">Gender: </label>
        <input type="radio" name="gender" value="male" <?php if ($gender == "male") {echo "checked";}?> >Male
        <input type="radio" name="gender" value="female" <?php if ($gender == "female") {echo "checked";}?>>Female <br> <br>
        <input type="submit" name="update" value="Update">
    </form>
    <?php
    }
    ?>
</body>
</html>