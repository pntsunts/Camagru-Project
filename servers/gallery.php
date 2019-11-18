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
<div class="gallery">
    <H1>PICTURES</H1>
<table>
<?php

require "../config/setup.php";
$pageno;
if (isset($_GET['pageno'])) {
    $pageno = $_GET['pageno'];
} else {
    $pageno = 1;
}
$per_page = 5;
$offset = ($pageno-1) * $per_page; 
try
{
    $sql = "SELECT * FROM IMAGES";
    $result = $conn->prepare($sql);
    $result->execute();
    $total_rows = $result->rowCount();
    $total_pages = ceil($total_rows / $per_page);
    $sql = "SELECT * FROM IMAGES LIMIT $offset, $per_page";
    $result = $conn->prepare($sql);
    $result->execute();
  //$value = $result->fetch(PDO::FETCH_ASSOC);

    foreach ($result as $row)
    {
        echo "<tr>";
        echo "<td><img src ='".$row['ipath'].$row['name']."' height='100' width='100'> </td>";
        echo "<td>".$row['name']."</td>";
        echo "</tr>";
    }
}
catch(PDOException $error)
{
    echo "Error occured : ".$error->getMessage();
}
?>
</table>
<ul class="pagination">
    <li><a href="?pageno=1">First</a></li>
    <li class="<?php if($pageno <= 1){ echo 'disabled'; } ?>">
        <a href="<?php if($pageno <= 1){ echo '../servers/gallery.php'; } else { echo "?pageno=".($pageno - 1); } ?>">Prev</a>
    </li>
    <li class="<?php if($pageno >= $total_pages){ echo 'disabled'; } ?>">
        <a href="<?php if($pageno >= $total_pages){ echo '../servers/gallery.php'; } else { echo "?pageno=".($pageno + 1); } ?>">Next</a>
    </li>
    <li><a href="?pageno=<?php echo $total_pages; ?>">Last</a></li>
</ul>
</div>
<footer>
    <p>Created by: Peter Ntsuntsha</p>       
</footer>
</body>
</html>