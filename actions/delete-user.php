<?php
require "../classes/User.php";

$id = $_POST['id'];

$user = new User;
$user->delete($id);