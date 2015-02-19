<?php
    require_once (__DIR__ . "/Database.php");
    session_start();
    session_regenerate_id(true); //One way to prevent hackers from using hackers to hijack the session.
    
    $path = "/BasmajyanL-Blog/";
    
    $host = "localhost";
    $username = "root";
    $password = "root";
    $database = "blog_db";
    
    //Checks if a database is made.
    if(!isset($_SESSION["connection"])) {
        $connection = new Database($host, $username, $password, $database);
        $_SESSION["connection"] = $connection;
    }