<?php

include "../classes/User.php";

// Collect the data
$username = $_POST['username'];
$password = $_POST['password'];

// Create an obj
$user = new User;

// Call the method
$user->login($username, $password);