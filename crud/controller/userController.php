<?php

    include "../model/user.php";
    include "../config.php";

    class userController {
        public function index() {
            global $conn;

            $users = [];

            $statement = $conn->query("SELECT * FROM users");
            while ($row = $statement->fetch_assoc()) {
                $users[] = new User($row["id"], $row["name"], $row["email"], $row["password"], $row["gender"]);

            }
            return $users;
        }
        public function create() {
            global $conn;
            $uname = $_POST["name"];
            $uemail = $_POST["email"];
            $upassword = password_hash($_POST["password"], PASSWORD_BCRYPT);
            $ugender = $_POST["gender"];

            $statement = $conn->query("INSERT INTO users (name, email, password, gender) VALUES ('$uname', '$uemail', '$upassword', '$ugender')");
            header("Location: index.php");
        }
        public function show($id) {
            global $conn;

            $statement = $conn->query("SELECT * FROM users WHERE id = $id");
            $row = $statement->fetch_assoc();
            $user = new User($row["id"], $row["name"], $row["email"], str_repeat("*", strlen("password")), $row["gender"]);

            return $user;
        }
        public function edit($id) {
            global $conn;

            $statement = $conn->query("SELECT * FROM users WHERE id = $id");
            $row = $statement->fetch_assoc();
            $user = new User($row["id"], $row["name"], $row["email"], str_repeat("*", strlen("password")), $row["gender"]);

            return $user;
        }
        public function update($id) {
            global $conn;

            $uname = $_POST["name"];
            $uemail = $_POST["email"];
            $upassword = password_hash($_POST["password"], PASSWORD_BCRYPT);
            $ugender = $_POST["gender"];

            $statement = $conn->query("UPDATE users SET name = '$uname', email = '$uemail', password = '$upassword', gender = '$ugender' WHERE id = '$id'");

            header("Location: ../index.php");
        }
        public function delete($id) {
            global $conn;

            $statement = $conn->query("DELETE FROM users WHERE id = '$id'");

            header("Location: ../index.php");
        }
    }