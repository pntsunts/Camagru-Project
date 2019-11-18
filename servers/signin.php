
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Camagru</title>
        <link rel="stylesheet" href="../css/index.css"/>
    </head>
    <header>
        <div id="container">
            <div class="inner">
                <h1>CAMAGRU</h1>
            </div> 
            <div id="log">
                <form method="post" action="../servers/logout.php">
                    <input type="submit" name="logout" value="logout">
                </form>
            </div>             
        </div>
    </header>
    <body>
        <div class="login">
            <div>
                <h1>SIGN IN HERE</h1>
            </div>
            <form action="login.php" method="POST">
                <div>
                    <label for="username">Username</label>
                    <input type="text" name="username" required>
                </div>

                <div>
                    <label for="password">Password</label>
                    <input type="password" name="Pass2" required>
                </div>

                <div>
                    <button type="submit" name="signin">SIGN IN</button>
                </div>
                <p>Not a user?<a href="../index.php"><b>SIGN UP</b></p>
                <a href="reset.php">Forgot your Password?</a>
                <input type="submit" name="logout" value="logout">
                <?php
                    if (isset($_GET['error']) == true)
                    {
                        echo '<font color="red"><p allign="center">SORRY !!! INCORRECT PASSWORD OR USERNAME PLEASE TRY AGAIN OR SIGN UP FIRST</p></font>';
                    }
                ?>
            </form>
        </div>
        <footer>
            <p>Created by: Peter Ntsuntsha</p>       
        </footer>
    </body>
</html>