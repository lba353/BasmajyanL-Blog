<?php
    require_once(__DIR__ . "/../Model/Config.php");
    
    //Creates the table "posts".
    $query = $_SESSION["connection"]->query("CREATE TABLE posts ("
            . "id int(11) NOT NULL AUTO_INCREMENT," 
            . "title varchar(255) NOT NULL,"
            . "timestamp timestamp(6) NOT NULL,"
            . "post text NOT NULL,"
            . "PRIMARY KEY (id))");
    
    //If query is created, echo successfully created posts.
    if($query) {
        echo "<p>Successfully created table: posts</p>";
    }
    else {
        echo "<p>" . $_SESSION["connection"]->error . "</p>";
    }
    
    //Creates the teble "users".
    $query = $_SESSION["connection"]->query("CREATE TABLE users ("
            . "id int(11) NOT NULL AUTO_INCREMENT,"
            . "username varchar(30) NOT NULL,"
            . "email varchar(50) NOT NULL,"
            . "password char(128) NOT NULL,"
            . "salt char(128) NOT NULL,"
            . "PRIMARY KEY (id))");
    
    //If query is created, echo successfully created users.
    if($query) {
        echo "<p>Successfully created table: users</p>";
    }
    else {
        echo "<p>" . $_SESSION["connection"]->error . "</p>";
    }