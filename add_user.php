<?php

include_once 'SQLiteConnection.php';

// Function to sanitize user input
function sanitizeInput($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize user input
    $username = sanitizeInput($_POST['username']);
    $password = sanitizeInput($_POST['password']);

    // Hash the password for security
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Create a new SQLite connection
    $pdo = (new SQLiteConnection())->connect();
    if ($pdo != null) {
        // Prepare an INSERT statement
        $stmt = $pdo->prepare('INSERT INTO users (username, password) VALUES (:username, :password)');
        $stmt->bindValue(':username', $username, SQLITE3_TEXT);
        $stmt->bindValue(':password', $hashed_password, SQLITE3_TEXT);

        // Execute the statement
        if ($stmt->execute()) {
            echo 'User added successfully!';
        } else {
            echo 'Error adding user.';
        }
    } else {
        echo 'Whoops, could not connect to the SQLite database!';
    }
}