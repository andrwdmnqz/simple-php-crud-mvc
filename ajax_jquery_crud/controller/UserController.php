<?php
    include "../config.php";
    include "../model/User.php";

    class UserController {
        public function create($user) {
            global $conn;

            $sql = "INSERT INTO users (name, email, password, gender) VALUES ('".$user->getName()."', '".$user->getEmail()."', 
                                            '".$user->getPassword()."', '".$user->getGender()."')";

            $result = mysqli_query($conn, $sql);
        }
        public function readAll() {
            global $conn;

            $sql = "SELECT * FROM users";
            $result = mysqli_query($conn, $sql);

            return $result;
        }
        public function deleteUser($id) {
            global $conn;

            $sql = "DELETE FROM users WHERE id = '$id'";
            $result = mysqli_query($conn, $sql);
        }
        public function readUser($id) {
            global $conn;

            $sql = "SELECT * FROM users WHERE id = '$id'";

            $result = mysqli_query($conn, $sql);
            return $result;
        }
        public function updateUser($user) {
            global $conn;

            $sql = "UPDATE users SET name = '".$user->getName()."', email = '".$user->getEmail()."', 
                password = '".$user->getPassword()."', gender = '".$user->getGender()."' WHERE id = '".$user->getId()."'";

            $result = mysqli_query($conn, $sql);
        }
    }
?>
