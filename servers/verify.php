<?php

require '../config/setup.php';

if (isset($_GET['email']) && isset($_GET['token']))
{
    $email = $_GET['email'];
    $token = $_GET['token'];

    try
    {
        $sql = "UPDATE users SET verify = 1 WHERE email = ? AND token = ?";
        $result = $conn->prepare($sql);
        $result->bindParam(1, $email);
        $result->bindParam(2, $token);
        $result->execute();
        //$result->debugDumpParams();
        if ($result->rowCount())
        {
            echo "Verified, you good to go.";
            header('location:../servers/signin.php');
        }
        else
            echo "FAILURE.";
    }
    catch(PDOException $error)
    {
        echo "Error occured : ".$error->getMessage();
    }
}