<?php

include_once 'SQLiteConnection.php';


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