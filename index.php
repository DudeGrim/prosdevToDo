<?php
    include('login.php'); // Includes Login Script

    if(isset($_SESSION['iduser']))
    {
        header("location: task.php");
    }
?>
<html>
    <head>
        <title> Log in </title>
        <link rel="stylesheet" type="text/css"
            href="style.css">
        <body>
            <div class="container">
                <div class="wrap">
                    <p class="form-title">
                        Sign In</p>
                    <form class="login" action="" method="post">
                        <input type="text" name = "email" placeholder="Email" required="true" />
                        <input type="password" name = "password"  placeholder="Password" required="true" />
                        <input type="submit" name="submit" value="login" class="btn btn-success btn-sm" />
                        <span><?php echo $error; ?></span>
                        <div class="forgot">
                            <div class="forgot-password">
                                <a href="">Forgot Password</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </body>
    </head>
</html>
