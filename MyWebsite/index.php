
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <!-- <meta http-equiv="X-UA-Compatible" content="IE=edge" -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">

    <title>Document</title>
</head>

<body>
    <h3> Sign Up! </h3>
    <form action = "/MyWebsite/includes/formhandler.inc.php" method="post">
        <input type="text" name="username" placeholder="Username">
        <input type="password" name="password" placeholder="Password">
        <input type="text" name="email" placeholder="Email">
        <button>Signup</button>
    </form>
    
    <h3> Change Account </h3>
    <form action = "/MyWebsite/includes/userupdate.inc.php" method="post">
        <input type="text" name="username" placeholder="Username">
        <input type="password" name="password" placeholder="Password">
        <input type="text" name="email" placeholder="Email">
        <button>Update</button>
    </form>

    <h3> Delete Account </h3>
    <form action = "/MyWebsite/includes/userdelete.inc.php" method = "post">
    <input type="text" name="username" placeholder="Username">
    <input type="password" name="password" placeholder="Password">
    <button>Delete</button>

    </form>



</body>

</html>