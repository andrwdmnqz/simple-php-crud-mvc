<?php
    include "../controller/UserController.php";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST["createname"]) && isset($_POST["createemail"]) &&
            isset($_POST["createpassword"]) && isset($_POST["creategender"])) {
            $user = new User(0, $_POST["createname"], $_POST["createemail"], password_hash($_POST["createpassword"], PASSWORD_BCRYPT), $_POST["creategender"]);

            $userController = new userController();
            $userController->create($user);
        }
    }