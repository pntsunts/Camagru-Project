<?php
    date_default_timezone_set('Africa/Johannesburg');
?>
<?php
    session_start();
    if (!$_SESSION['username'])
    {
        header("location:../index.php");
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>WEB APP </title>
        <link rel="stylesheet" type = "text/css" href="../css/cam.css"/>
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
            <div>
                <form action="../servers/delete.php" method="POST">
                    <input type="text" name="filename" placeholder="name ">
                    <button type="submit" name="submit">DELETE FILE</button>
                </form>
            </div>
            <?php
                    if (isset($_GET['success']) == true)
                    {
                        echo '<p>DELETED</p>';
                    }
                ?>               
        </div>
    </header>
    <body>
        <div class = "container">
            <div class = "main">
                <div class = "div-sticker">
                    <ul class = "stickers">
                        <li><img id = "sticker1" src = "../Pictures/sticker1.png" with="100" height = "100"/></li>
                        <li><img id = "sticker2" src = "../Pictures/sticker2.png" with="100" height = "100"/></li>
                        <li><img id = "sticker3" src = "../Pictures/sticker3.png" with="100" height = "100"/></li>
                    </ul>
                </div>
                <div class = "preview">
                    <img id = 'chosen-img' width="400px" height="250p"/>
                    <img id = 'sticker-name' style = 'display:none'/>
                    <video id="New" autoplay width="400px" height="250px"></video>
                    <canvas id="canvas" width="400px" height="250px"></canvas>
                </div>
                <div id="Pick" class = "capture-btn">
                    <button class="btn btn-primary" id="capture-btn">CAPTURE</button><br/>
                    <label>Pick image instead</label>
                    <input type="file" accept="image/*" id="img-picker">
                </div>
            </div>
           
            <div class = "side">
                <?php
                    session_start();
                    $email = $_POST['email'];
                    $img_dir = "../UPLOADS/";
                    $images = scandir($img_dir);
                    $images = preg_grep('~^'.$_SESSION['username'].'.*\.png$~', $images);
                    $list = '<ul id = "list-side">';
                    foreach($images as $img) 	
                    { 
                        if($img === '.' || $img === '..')
                        {
                            continue;
                        } 
                        if (preg_match('/.png/',$img))
                        {				
                            $list.='<li class="li-img"><img src=" '.$img_dir.$img.'" width="100" height="100" /></li>';
                        } 
                        else 
                        { 
                            continue; 
                        }	
                    }
                    $list .= '</ul>';
                    echo $list; 
                ?>
            </div>
        </div>
        <script type = "text/javascript" src="../js/cam.js"></script>
        <?php
        echo "<form action='comment.php' method='POST'> 
                     <input type='hidden' name='uid' value='Anonymous'>
                    <input type='hidden' name='DATE' value='".DATE('y-m-d h:i:s')."'>
                    <textarea name='MESSAGE'></textarea><br>
                    <button type='submit' name='submit' >COMMENT</button>
              
        </form>";
        ?>
        <div>
                <h2>Email Notification??</h2>
                yes<input type="checkbox" value="yes" name="check"/>
        </div>
        <footer>
            <h1>Created by: Peter Ntsuntsha</h1>       
        </footer>
    </body>
</html>