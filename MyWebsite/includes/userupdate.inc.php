<?php

// This file sends data to the database

// Copy-pasted from formhandler and edited. Manually editing the user id/password

if ($_SERVER["REQUEST_METHOD"]== "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $email = $_POST["email"];

    try {
        require_once "dbh.inc.php";

        $query = "UPDATE users set username=:username, pwd=:pwd, email=:email WHERE id=2;"; // :x = placeholder
        // changes the username, password and email of id 2 which is basse

        $stmt = $pdo->prepare($query);
        
        // Named parameters
        $stmt->bindParam(":username", $username);
        $stmt->bindParam(":pwd", $password);
        $stmt->bindParam(":email", $email);
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