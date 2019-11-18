<?php
$TO = "../Newimages/";
$file = $TO. basename($_FILES["image"]["name"]);
$FileType = strtolower(pathinfo($file,PATHINFO_EXTENSION));
$Format = array("jpg", "jpeg", "png");

if(isset($_POST["submit"])) 
{
    if (!(in_array($FileType, $Format)))
    {
        echo "file format is not allowed";
        exit();
    }
    if (file_exists($file)) 
    {
        echo "Sorry, file already exists.";
        exit();
    }
    if ($_FILES["fileToUpload"]["size"] > 500000) 
    {
        echo "Sorry, your file is too large.";
        exit();
    }
    if (move_uploaded_file($_FILES["image"]["tmp_name"], $file)) 
    {
        echo "The file ". basename( $_FILES["image"]["name"]). " has been uploaded.";
    }
    else 
    {
        echo "Sorry, there was an error uploading your file.";
    }
}
?>