<?php
// used to connect to the database
$host = "localhost";
$database = "crud-php";
$username = "root";
$password = "";

try {
    $pdoCon = new PDO( "mysql:host={$host}; dbname={$database}", $username, $password );
}

// show error
catch( PDOException $exception ){
    echo "Connection error: " . $exception->getMessage();
}
