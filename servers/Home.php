<?php
    session_start();
    if (!$_SESSION['username'])
    {
        header("location:../index.php");
    }
?>
<?php
    require 'connect.php';
    $_SESSION['username'];
?>

<!DOCTYPE html>
<html>
<head>
        <meta charset="UTF-8">
        <title>Camagru</title>
        <link rel="stylesheet" href="../css/index.css"/>
    </head>
    <header>
        <div class="container">
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
    <div class = "login">
        <div>
            <h1>HOME PAGE</h1>
        </div>
        <div>
            <?php
                if (isset($_SESSION['success']))
            ?>
            <div>
               <?php
                    echo $_SESSION['success'];
               ?>
            </div>

            <?php if (isset($_SESSION["username"])) ?>
                <p>WELCOME <strong>
                <?php
                    echo $_SESSION['username'];
                ?>
                </strong></p>
                <form method="post" action="">
                    <p>GALLERY click here to view pictures<a href="../servers/webcam.php"><b>VIEW PICTURES</b></p>
                    <p><a href="../servers/user.php"><b>EDIT PROFILE</b></p> 
                    <?php
                        if (isset($_GET['success']) == true)
                        {
                            echo '<font color="Black">PROFILE UPDATED SUCCESSFULLY</p></font>';
                        }
                    ?>
                </form>
        </div>
        </div>
        <footer>
            <p>Created by: Peter Ntsuntsha</p>       
        </footer>
    </body>
</html>