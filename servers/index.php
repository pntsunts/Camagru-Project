<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Camagru</title>
        <link rel="stylesheet" href="css/index.css"/>
    </head>
    <header>
        <div class="container">
            <div class="inner">
                <h1>CAMAGRU</h1>
            </div>              
        </div>
    </header>
    <body id="Image">
        <div class="Container">
            <div>
                <h1>SIGN UP HERE</h1>
            </div>
            <form action="servers/connect.php" method="POST">
                <div>
                    <label for="Firstname">Firstname</label>
                    <input type="text" name="First" required>
                </div>
                <div>
                    <label for="Lastname">Lastname</label>
                    <input type="text" name="Last" required>
                </div>
                <div>
                    <label for="username">Username</label>
                    <input type="text" name="username" required>
                </div>
                <div>
                    <label for="email">Email</label>
                    <input type="text" name="email" required>
                </div>
                <div>
                    <label for="password">Password</label>
                    <input type="password" name="Pass1" required>
                </div>
                <div>
                    <label for="password">confirm Password</label>
                    <input type="password" name="Pass2" required>
                </div>
                <div>
                    <button type="submit" name="signup">SIGNUP</button>
                </div>
                <p>Already a user?<a href="servers/Signin.php"><b>SIGN IN</b></p>
                <a href="servers/gallery.php"><b>VIEW PICTURES</b>
            </form>
            <?php
                $URL = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
                {
                    if (strpos($URL, "signup=chars") == true)
                    {
                        echo '<p class="error"><b>Password should be at least 8 characters in length and should include at least one upper case letter, 
                        one number, and one special character.</b></p>';
                        exit();
                    }
                    else if (strpos($URL, "signup=empty") == true)
                    {
                        echo '<p class="error"><b>you did not fill all the fields</b></p>';
                        exit();
                    }
                    else if (strpos($URL, "signup=alpha") == true)
                    {
                        echo '<p class="error"><b>Only Letter are allowed for Usename</p></b>';
                        exit();
                    }
                    else if (strpos($URL, "signup=email") == true)
                    {
                        echo '<p class="error"><b>Invalid Email</p></b>';
                        exit();
                    }
                    else if (strpos($URL, "signup=match") == true)
                    {
                        echo '<p class="error"><b>Password do Not Match</p></b>';
                        exit();
                    }
                    else if (strpos($URL, "signup=success") == true)
                    {
                        echo '<p class="success"><b>SUCCESS!!! PLEASE CHECK YOUR EMAIL FOR VERIFICATION</p></b>';
                    }
                }
            ?>
        </div>
        <footer>
            <h1>Created by: Peter Ntsuntsha</h1>       
        </footer>
	</body>
</html>