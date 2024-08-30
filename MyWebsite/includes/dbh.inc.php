<?php

# dbh.inc.php -> database handler . includes. php


// no closing tag needed since it's a pure php file

$dsn = "mysql:host=localhost;dbname=myfirstdatabase";
$dbusername = "root"; // default username and password
$dbpassword = "";

try {
    // php data object = pdo
    $pdo = new PDO($dsn, $dbusername, $dbpassword); // main line of code for connecting to the database. All codes below is for error handling
    $pdo-> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // meaning if we get an error, throw an exception

} catch (PDOException $e) { // error handler. PDO exception which is called variable e
    echo "Connection failed; " . $e->getMessage();

}

// running a block of code and doing something else if an error occurs and doing something else with the error method