<?php
    require_once (__DIR__ . "/../View/Header.php");
    require_once (__DIR__ . "/../Model/Config.php");
    require_once (__DIR__ . "/../View/Footer.php");
    
    //Adds username and password input to login your user.
    $username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_STRING);
    $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_STRING);

    //Gets the salt and password from the users table where the username is the same as the variable username.
    $query = $_SESSION["connection"]->query("SELECT salt, password FROM users WHERE BINARY username = '$username'");
    
    //Checks to see if the login information is true or not.
    if($query->num_rows == 1) {
        $row = $query->fetch_array();
        
        if($row["password"] === crypt($password , $row["salt"])) {
            $_SESSION["authenticated"] = true;
            header("Location: " . $path . "index.php");
            echo "<p>Login successful!</p>";
        }
        else {
            header("Location: " . $path . "index.php");
            echo "<p>Invalid username and password.</p>";
        }
    }
    else {
        header("Location: " . $path . "index.php");
        echo "<p>Invalid username and password.</p>";
    }