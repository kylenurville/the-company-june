<?php
include "../classes/User.php";

// Collect the data
$first_name = $_POST['first_name'];
$last_name  = $_POST['last_name'];
$username   = $_POST['username'];
$password   = $_POST['password'];

// Create an obj
$user = new User;

// Call the method
$user->create($first_name, $last_name, $username, $password);