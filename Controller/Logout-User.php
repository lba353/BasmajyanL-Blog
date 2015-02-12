<?php
    require_once (__DIR__ . "/../Model/Config.php");
    
    unset($_SESSION["authenticated"]);
    
    session_destroy();
    header("Location: " . $path . "index.php");