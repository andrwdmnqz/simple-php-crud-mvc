<?php
    include "../controller/UserController.php";

    if (isset($_POST["id"])) {
        $controller = new UserController();
        $controller->deleteUser($_POST["id"]);
    }

?>