<?php
    require_once(__DIR__ . "/Database.php");
    $path = "/BasmajyanL-Blog/";
    
    $host = "localhost";
    $username = "root";
    $password = "root";
    $database = "blog_db";
    
    $connection = new Database($host, $username, $password, $database);