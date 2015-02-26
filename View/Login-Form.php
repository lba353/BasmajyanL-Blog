<?php
    require_once (__DIR__ . "/../Model/Config.php");
?>

<h1 align="center">Login</h1>

<!-- The following lines of code are the setup of logging into the blog.-->
<form align="center" method="post" action="<?php echo $path . "Controller/Login-User.php"; ?>">
    <div>
        <label for="username">Username: </label>
        <input type="text" name="username" />
    </div>
    
    <div>
        <label for="password">Password: </label>
        <input type="password" name="password" />
    </div>
    
    <div>
        <button class="btn btn-success btn-lg" type="submit">Login</button>
    </div>
</form>