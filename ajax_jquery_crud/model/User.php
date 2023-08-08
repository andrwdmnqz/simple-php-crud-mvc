<?php

class User {

    private $id;
    private $name;
    private $email;
    private $password;
    private $gender;

    function __construct($id, $name, $email, $password, $gender) {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
        $this->gender = $gender;
    }

    function getId() {
        return $this->id;
    }
    function getName() {
        return $this->name;
    }
    function getEmail() {
        return $this->email;
    }
    function getPassword() {
        return $this->password;
    }
    function getGender() {
        return $this->gender;
    }
}