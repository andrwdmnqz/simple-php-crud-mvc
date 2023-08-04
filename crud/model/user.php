<?php
    class User {
        private $id;
        private $name;
        private $email;
        private $password;
        private $gender;

        public function __construct($id, $name, $email, $password, $gender) {
            $this->id = $id;
            $this->name = $name;
            $this->email = $email;
            $this->password = $password;
            $this->gender = $gender;
        }

        public function getId() {
            return $this->id;
        }

        public function getName() {
            return $this->name;
        }

        public function getEmail() {
            return $this->email;
        }
        public function getPassword() {
            return $this->password;
        }

        public function getGender() {
            return $this->gender;
        }
    }
?>