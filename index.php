<?php
require_once("DB_CONFIG.php");
$connection = pg_connect(CONNECTION_STRING);

if(!$connection) {
    die("No connection");
}
$query = pg_prepare($connection, "query", "SELECT * FROM transaction");
$query = pg_execute($connection, "query", array());
$result = pg_fetch_all($query);
print_r($result);
?>