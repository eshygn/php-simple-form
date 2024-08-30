<?php

// This file sends data to the database

// copy-pasted from formhandler and edited

if ($_SERVER["REQUEST_METHOD"]== "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];


    try {
        require_once "dbh.inc.php";

        $query = "DELETE FROM users WHERE username = :username AND pwd=:pwd;";

        $stmt = $pdo->prepare($query);
        
        // Named parameters
        $stmt->bindParam(":username", $username);
        $stmt->bindParam(":pwd", $password);
        // similar as doing $stmt-> execute([$username, $password, $email]);

        $stmt-> execute(); // has to match up as the params in users (*params*) in $query


        $pdo = null;
        $stmt = null;

        header("Location: ../index.php");

        echo "Hello";


        die(); // can use exit as well. Exit = for closing off script | Die = for closing off a connection
    } catch(PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }

}
else {
    header("Location: ../index.php");
}