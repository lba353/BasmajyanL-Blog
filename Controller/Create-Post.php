<?php
    require_once (__DIR__ . "/../View/Header.php");
    require_once (__DIR__ . "/../Model/Config.php");
    require_once (__DIR__ . "/../Controller/Login-Verify.php");
    require_once (__DIR__ . "/../View/Footer.php");
    
    //If you are not logged in, you will be redirected to the index.
    if (!authenticateUser()) {
        header("Location: " . $path . "index.php");
        die();
    }
    
    //Sets the timezone and the date.
    date_default_timezone_set("America/Los_Angeles");
    $today = date("M-j-Y, g:i a");
    
    //Sets the variables title and post.
    $title = filter_input(INPUT_POST, "title", FILTER_SANITIZE_STRING);
    $post = filter_input(INPUT_POST, "post", FILTER_SANITIZE_STRING);
    
    //Inserts the title of the post, the post's text, and the time the post was made into the database.
    $query = $_SESSION["connection"]->query("INSERT INTO posts SET title = '$title', post = '$post', timestamp = '$today'");
    
    //Says if you inserted the post or not.
    if($query) {
        echo "<p>Successfully inserted post: $title</p>";
        header("Location: " . $path . "index.php");
    }
    else {
        echo "<p>" . $_SESSION["connection"]->error . "</p>";
        header("Location: " . $path . "index.php");
    }