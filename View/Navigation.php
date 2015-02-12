<?php
    require_once (__DIR__ . "/../Model/Config.php");
    require_once(__DIR__ . "/../Controller/Login-Verify.php");
    
    if (!authenticateUser()) {
        header("Location: " . $path . "index.php");
        die();
    }
?>    
<nav>
    <ul>
        <li><a href="<?php echo $path . "Post.php" ?>">Blog Post Form</a></li>
    </ul>
</nav>