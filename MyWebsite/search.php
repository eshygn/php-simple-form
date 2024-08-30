<?php

// This file sends data to the database

// query select all - To search for any type of comment a user made

if ($_SERVER["REQUEST_METHOD"]== "POST") {
    $userSearch = $_POST["usersearch"];

    try {
        require_once "../MyWebsite/includes/dbh.inc.php";
        

        $query = "SELECT * FROM comments WHERE username=:usersearch"; // usersearch = placeholder

        $stmt = $pdo->prepare($query); // to send a query
        
        // Named parametersf
        $stmt->bindParam(":usersearch", $userSearch);

        // similar as doing $stmt-> execute([$username, $password, $email]);

        $stmt-> execute(); // has to match up as the params in users (*params*) in $query

        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);// grabbing columns from the database as associative array


        $pdo = null;
        $stmt = null;


        // die(); // can use exit as well. Exit = for closing off script | Die = for closing off a connection
        // No die statement here cuz it will terminate the script and the program won't run
    } catch(PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }

}
else {
    header("Location: index.php");
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <!-- <meta http-equiv="X-UA-Compatible" content="IE=edge" -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">

    <title>Document</title>
</head>
<!-- //To search for any type of comment a user made -->
<body>

<section>

    <h3> Search Results: </h3>
    <?php 

    if (empty($results)) {
        echo "<div>";
        echo "<p> There were no results! </p>";
        echo "</div>";

    } else {
        // loop out all the multi-dimensional results from the array
    foreach($results as $row) {
        echo "<div:>";
        echo "<h4>" .htmlspecialchars($row["username"]) . "</h4>";
        echo "<p>" . htmlspecialchars($row["comments_text"]) . "</p>";
        echo "<p>" . htmlspecialchars($row["created_at"]) . "</p>";
        echo "</div:>";
    }
    }

    ?>

    </section>
    
    



</body>
</html>
