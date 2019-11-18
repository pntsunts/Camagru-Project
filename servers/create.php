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
        <div>
            <div>
                <h1>CREATE NEW PASS HERE</h1>
            </div>
            <form action="../servers/created.php" method="POST">
                <div>
                    <label for="password">Password</label>
                    <input type="text" name="password" required>
                </div>

                <div>
                    <label for="password">Confirm Password</label>
                    <input type="text" name="Pass2" required>
                </div>

                <div>
                    <button type="submit" name="signin">SUBMIT</button>
                </div>
                <footer>
                    <p>Created by: Peter Ntsuntsha</p>       
                </footer>
            </form>
        </div>
	</body>
</html>