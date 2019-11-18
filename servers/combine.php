<?php
    require "../config/setup.php";
    session_start();
    $filteredData = str_replace("data:image/png;base64,", "", $_POST['nameimg']);
    $filteredData = str_replace(" ", "+", $filteredData);
    $unencodedData=base64_decode($filteredData);
    $name = $_SESSION['username'].time().'.png';
    file_put_contents('../UPLOADS/'.$name, $unencodedData);

    function super_impose($src,$dest,$added)
    {
        $base = imagecreatefrompng($src);
        $superpose= imagecreatefrompng($added);
        list($width, $height) = getimagesize($src);
        list($width_small, $height_small) = getimagesize($added);
        imagecopyresampled($base , $superpose,  0, 0, 0, 0, 200, 200,$width_small, $height_small);
        imagepng($base, $dest);
    }
    super_impose('../UPLOADS/'.$name,'../UPLOADS/'.$name,'../Pictures/'.$_POST['images']);
    echo "success";
    try
    {
        $path = "../UPLOADS/";
        $sql = "INSERT INTO IMAGES (name, ipath)
        VALUES (?, ?)";
        $result = $conn->prepare($sql);
        $result->bindParam(1, $name);
        $result->bindParam(2, $path);
        $result->execute();

    }
    catch (PDOException $e)
    {
        echo "ERROR OCCURED. " . $e->getMessage();
    }
?>