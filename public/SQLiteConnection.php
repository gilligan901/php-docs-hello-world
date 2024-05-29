<?php
class SQLiteConnection {
    private $pdo;

    public function connect() {
        if ($this->pdo == null) {
            try {
                $this->pdo = new SQLite3('mydatabase.db', SQLITE3_OPEN_READWRITE | SQLITE3_OPEN_CREATE);
            } catch (Exception $e) {
                // Handle exception
            }
        }
        return $this->pdo;
    }
}