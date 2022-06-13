<?php
require_once "Database.php";

class User extends Database
{
    public function create($first_name, $last_name, $username, $password)
    {
        $password = password_hash($password, PASSWORD_DEFAULT);
        
        $sql = "INSERT INTO users (`first_name`, `last_name`, `username`, `password`)
                VALUES ('$first_name', '$last_name', '$username', '$password')";

        if ($this->conn->query($sql)){
            header('location: ../views');   // go to index.php
            exit;                           // same as die
        } else {
            die("Error creating user: " . $this->conn->error);
        }
    }

    public function login($username, $password)
    {
        $sql = "SELECT * FROM users WHERE username = '$username'";

        $result = $this->conn->query($sql);

        # Check the username
        if ($result->num_rows == 1){
            # Check if the password is correct
            
            $user = $result->fetch_assoc();
            // $user = ['id' => 1, 'username' => 'john', 'password' => '$2y$10$C9vpHt...'];
            
            if (password_verify($password, $user['password'])){
                # Create session variables
                session_start();

                $_SESSION['id']         = $user['id'];
                $_SESSION['username']   = $user['username'];
                $_SESSION['full_name']  = $user['first_name'] . " " . $user['last_name'];

                header('location: ../views/dashboard.php');
                exit;
            } else {
                die('Password is incorrect');
            }

        } else {
            die('Username not found.');
        }
    }

    public function getAllUsers($id)
    {
        $sql = "SELECT id, first_name, last_name, username FROM users WHERE id != $id";

        if ($result = $this->conn->query($sql)){
            return $result;
        } else {
            die('Error retrieving all users: ' . $this->conn->error);
        }
    }

    public function getUser($id)
    {
        $sql = "SELECT first_name, last_name, username FROM users WHERE id = $id";

        if ($result = $this->conn->query($sql)){
            return $result->fetch_assoc();
        } else {
            die('Error retrieving the user: ' . $this->conn->error);
        }
    }

    public function update($id, $first_name, $last_name, $username)
    {
        $sql = "UPDATE users SET first_name = '$first_name', last_name = '$last_name', username = '$username' WHERE id = $id";

        if ($this->conn->query($sql)){
            header('location: ../views/dashboard.php');
            exit;
        } else {
            die('Error updating the user: ' . $this->conn->error);
        }
    }

    public function delete($id)
    {
        $sql = "DELETE FROM users WHERE id = $id";

        if ($this->conn->query($sql)){
            header('location: ../views/dashboard.php');
            exit;
        } else {
            die('Error deleting the user: ' . $this->conn->error);
        }
    }
}