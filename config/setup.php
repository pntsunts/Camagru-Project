<?php
    require 'database.php';

    try
    {
        $conn = new PDO($DB_DSN_LIGHT, $DB_USER, $DB_PASSWORD);
        // set the pdo to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "CREATE DATABASE IF NOT EXISTS $DB_NAME";
        // use exec() because no results are returned
        $conn->exec($sql);
    }
    catch(PDOException $e)
    {
        echo $sql . "<br>" . $e->getMessage();
    }
    //create tables
    try
    {
        $conn = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);

        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "CREATE TABLE IF NOT EXISTS USERS
        (id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY NOT NULL,
        Firstname VARCHAR(255) NOT NULL,
        Lastname VARCHAR(255) NOT NULL,
        username VARCHAR(255) NOT NULL,
        email VARCHAR(255) NOT NULL,
        `Pass2` VARCHAR(255) NOT NULL,
        verify INT(1) NOT NULL DEFAULT 0,
        token VARCHAR(255) NOT NULL
        )";
        $conn->exec($sql);
    }
    catch (PDOException $e)
    {
        echo $sql . "<br>" . $e->getMessage();
    }
    try
    {
        $conn = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);

        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $photo = "CREATE TABLE IF NOT EXISTS IMAGES
        (id INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
        name VARCHAR(255) NOT NULL,
        ipath VARCHAR(255) NOT NULL)";

        $conn->exec($photo);
    }
    catch (PDOException $e)
    {
        echo $photo ."<br>" . $e->getMessage();
    }
    try
    {
        $conn = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);

        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $comment = "CREATE TABLE IF NOT EXISTS COMMENTS
        (cid INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
        uid VARCHAR(128) NOT NULL,
        DATE DATETIME NOT NULL,
        MESSAGE TEXT NOT NULL)";
        $conn->exec($comment);
    }
    catch (PDOException $e)
    {
        echo $comment ."<br>" . $e->getMessage();
    }
    try
    {
        $conn = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);

        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $like = "CREATE TABLE IF NOT EXISTS LIKES
        (id INT AUTO_INCREMENT PRIMARY KEY NOT NULL)";
        $conn->exec($like);
    }
    catch (PDOException $e)
    {
        echo $like ."<br>" . $e->getMessage();
    }
?>
