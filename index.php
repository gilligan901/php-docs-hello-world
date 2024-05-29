<?php
$db = new SQLite3('mydatabase.db');

$results = $db->query('SELECT * FROM users');
while ($row = $results->fetchArray()) {
    var_dump($row);
}
?>
