<?php

include_once 'SQLiteConnection.php';


$$pdo = (new SQLiteConnection())->connect();
if ($pdo != null) {
    // Prepare a SELECT statement to fetch all records from the users table
    $sql = 'SELECT * FROM users';
    $stmt = $pdo->query($sql);

    // Fetch and display each row
    foreach ($stmt as $row) {
        echo 'Username: ' . $row['username'] . ' - Password: ' . $row['password'] . '<br>';
    }
} else {
    echo 'Whoops, could not connect to the SQLite database!';
    }