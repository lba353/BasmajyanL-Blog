<?php
    require_once(__DIR__ . "/../Model/config.php");
?>

<h1 align="center">Register</h1>

<!-- The following lines of code are the setup of registering a user.-->
<form align="center" method="post" action="<?php echo $path . "Controller/Create-User.php"; ?>">
    <div>
        <label for="email">Email: </label>
        <input type="text" name="email" />
    </div>
        
    <div>
        <label for="username">Username: </label>
        <input type="text" name="username" />
    </div>
    
    <div>
        <label for="password">Password: </label>
        <input type="password" name="password" />
    </div>
    
    <div>
        <button class="btn btn-success btn-lg" type="submit">Submit & Register</button>
    </div>
</form>