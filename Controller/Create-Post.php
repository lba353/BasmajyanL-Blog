<?php
    require_once (__DIR__ . "/../View/Header.php");
    require_once (__DIR__ . "/../Model/Config.php");
    require_once (__DIR__ . "/../Controller/Login-Verify.php");
    require_once (__DIR__ . "/../View/Footer.php");
    
    if (!authenticateUser()) {
        header("Location: " . $path . "index.php");
        die();
    }
    
    $title = filter_input(INPUT_POST, "title", FILTER_SANITIZE_STRING);
    $post = filter_input(INPUT_POST, "post", FILTER_SANITIZE_STRING);
    $today = date("M-j-Y, g:i a");
    
    $query = $_SESSION["connection"]->query("INSERT INTO posts SET title = '$title', post = '$post', timestamp = '$today'");
    
    if($query) {
        echo "<p>Successfully inserted post: $title</p>";
    }
    else {
        echo "<p>" . $_SESSION["connection"]->error . "</p>";
    }