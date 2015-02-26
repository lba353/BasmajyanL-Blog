<?php
    require_once (__DIR__ . "/../Model/Config.php");
    
    //Selects information from posts
    $query = "SELECT * FROM posts";
    $result = $_SESSION["connection"]->query($query);
    
    date_default_timezone_set("America/Los_Angeles");
    $today = date("M-j-Y, g:i a");
    
    //If there is a result, desplay the post.
    if($result) {
        while($row = mysqli_fetch_array($result)) {
            echo "<div align='center' class='post'>" ;
            echo "<h2>" . $row['title'] . "</h2>";
            echo "<br />";
            echo "<p>" . $row['post'] . "</p>";
            echo "<br />";
            echo "<p>" . $row['timestamp'] . "</p>";
            echo "<br />";
            echo "</div>";
        }
    }