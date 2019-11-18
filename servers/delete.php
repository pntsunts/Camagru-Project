<?php
$filename = $_POST['filename'];
$spaces = str_replace(" ", "", $filename);
$all = explode(",", $spaces);
$countall = count($countall);

for($i = 0; $i < $countall; $i++)
{
    if (file_exists("UPLOADS/".$all[$i]) == false)
    {
        header("location:../servers/webcam.php");
        exit();
    }
}
for($i = 0; $i < $countall; $i++)
{
    $path = "UPLOADS/".$all[$i];
    if (!unlink($path))
    {
        echo "You have an error";
    }
}
header("location:../servers/webcam.php?success=1");
?>