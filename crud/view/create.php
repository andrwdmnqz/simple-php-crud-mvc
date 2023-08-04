<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        require_once "../controller/userController.php";

        $userController = new userController();
        $userController->create();
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Show user</title>
</head>
<body>
    <h1>Create user</h1>
    <form method="post" action="">
        <label for="name">Name: </label>
        <input type="text" name="name" id="name" required> <br> <br>
        <label for="email">Email: </label>
        <input type="email" name="email" id="email" required> <br> <br>
        <label for="password">Password: </label>
        <input type="password" name="password" id="password" required> <br> <br>
        <label for="name">Gender: </label>
        <input type="radio" name="gender" value="male">Male
        <input type="radio" name="gender" value="female">Female <br> <br>
        <input type="submit" name="submit" value="submit">
    </form>
</body>
</html>