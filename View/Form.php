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
?>

<!-- The following lines of code are the setup of posting a blog.-->
<h1 align="center">Create Blog Post</h1>

<form align="center" method="post" action="<?php echo $path . "Controller/Create-Post.php"; ?>">
    <div>
        <label for="title">Title: </label>
        <input type="text" name="title" />
    </div>
    
    <div>
        <label for="post">Post :</label>
        <textarea name="post"></textarea>
    </div>
    
    <div>
        <button class="btn btn-success btn-lg" type="submit">Submit</button>
    </div>
</form>