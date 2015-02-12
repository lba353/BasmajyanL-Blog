<?php
    //Requires the Header, Navigation, Create-DB, Footer, and Read Posts files once.
    require_once (__DIR__ . "/Controller/Login-Verify.php");
    require_once (__DIR__ . "/View/Header.php");
    if(authenticateUser()) {
        require_once (__DIR__ . "/View/Navigation.php");
    }
    require_once (__DIR__ . "/Controller/Create-DB.php");
    require_once (__DIR__ . "/View/Footer.php");
    require_once (__DIR__ . "/Controller/Read-Posts.php");