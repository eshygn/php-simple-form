<?php

// This file sends data to the database

// check to see if user submitted the data

// -> : represents reference to method

if ($_SERVER["REQUEST_METHOD"]== "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $email = $_POST["email"];

    try {
        require_once "dbh.inc.php";

        $query = "INSERT INTO users (username, pwd, email) VALUES (:username, :pwd, :email);";

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