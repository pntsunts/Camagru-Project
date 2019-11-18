<?php
    session_start();
    if (!$_SESSION['username'])
    {
        header("location:../index.php");
    }
?>
<?php session_start(); ?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Camagru</title>
        <link rel="stylesheet" href="../css/index.css"/>
    </head>
    
    <body>
        <div class = "login">
        <h1>UPDATE YOUR PROFILE</h1>
        <form action="../servers/updateuser.php" method="POST" >
            <div>
                <label for="username">Username</label>
                <input type="text" name="username" placeholder="enter your username" value ="<?php  if (isset($_SESSION['username'])) echo
                $_SESSION['username'];?>" require><br>
                <label for="email">Email</label>
                <input type="text" name="email" placeholder = "enter your email" value ="<?php if (isset($_SESSION['email'])) echo $_SESSION['email'];?>" require><br>
                <label for="email">Firstname</label>
                <input type="text" name="Firstname" placeholder = "enter your firstname" value ="<?php if (isset($_SESSION['Firstname'])) echo $_SESSION['Firstname'];?>" require><br>
                <label for="email">Lastname</label>
                <input type="text" name="Lastname" placeholder = "enter your Lastname" value ="<?php if (isset($_SESSION['Lastname'])) echo $_SESSION['Lastname'];?>" require><br>
            </div>
            <div>
                <button type="submit" name="submit">UPDATE</button>
            </div>
            <div>
                <h2>Email Notification??</h2>
                yes<input type="checkbox" value="yes" name="check"/>
            </div>
        </form>
        </div>
        <footer>
            <h1>Created by: Peter Ntsuntsha</h1>       
        </footer>
    </body>
</html>