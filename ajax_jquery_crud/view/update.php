<?php
    include "../controller/UserController.php";

    if (isset($_POST["id"])) {
        $controller = new UserController();
        $result = $controller->readUser($_POST["id"]);
        $response = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $response = $row;
        }

        echo json_encode($response);
    } else {
        $response["status"] = 204;
        $response["message"] = "Invalid id or data not found";
    }

    if (isset($_POST["hiddenid"])) {
        $controller = new UserController();

        $id = $_POST["hiddenid"];
        $name = $_POST["updatename"];
        $email = $_POST["updateemail"];
        $password = password_hash($_POST["updatepassword"], PASSWORD_BCRYPT);
        $gender = $_POST["updategender"];

        $user = new User($id, $name, $email, $password, $gender);
        $controller->updateUser($user);
    }
?>