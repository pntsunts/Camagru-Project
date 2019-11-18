<?php
    require '../config/setup.php';
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Camagru</title>
        <link rel="stylesheet" href="../css/index.css"/>
    </head>
    <header>
        <div id="">
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
        <h1>Reset your Password</h1>
        <p>Please enter your email address you used to sign up on this site and we will assist you in receiving a new password </p>
        <form action="../servers/request.php" method="POST">
            <input type="text" name="email" placeholder="enter your email here.." require>
            <button type="submit" name="requested">Receive new password</button>
        </form>
        <?php
            if (isset($_GET['success']) == true)
            {
                echo '<font color="white"><p allign="center">CHECK YOUR EMAIL TO GET A NEW PASSWORD</p></font>';
            }
        ?>
        <footer>
            <p>Created by: Peter Ntsuntsha</p>       
        </footer>
    </body>
</html>