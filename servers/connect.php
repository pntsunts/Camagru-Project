<?php
    SESSION_START();
    require '../config/setup.php';

    if (isset($_POST['signup']))
    {
        $user = $_POST['username'];
        $mail = $_POST['email'];
        $P1 = $_POST['Pass1'];
        $P2 = $_POST['Pass2'];
        $first = $_POST['First'];
        $last = $_POST['Last'];

        $upper = preg_match('@[A-Z]@', $P2);
        $lower = preg_match('@[a-z]@', $P2);
        $Digits   = preg_match('@[0-9]@', $P2);
        $Chars = preg_match('@[^\w]@', $P2);

        if(!$upper || !$lower || ! $Digits || !$Chars || strlen($P2) < 8) 
        {
            header("location:../index.php?signup=chars");
            die();
        }

        if (empty($user) || empty($mail) || empty($P1) || empty($P2))
        {
            header("location:../index.php?signup=empty");
            die();
        }
        else if (!preg_match("/^[a-zA-Z ]*$/",$user))
        {
            header("location:../index.php?signup=alpha");
            die();
        }
        else if (!filter_var($mail, FILTER_VALIDATE_EMAIL))
        {
            header("location:../index.php?signup=email");
            die();
        }
        else if ($P1 != $P2)
        {
            header("location:../index.php?signup=match");
            die();
        }
        else
        {
            header("location:../index.php?signup=success");
        }
        $passwordHash = hash("md5", $P2, FALSE);
        $token = rand(10,10000);
        $token = hash("md5", $token, FALSE);
        // if the are no errors save user to database

    try
    {
        $conn = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "INSERT INTO users (username, email, Pass2, token, Firstname, Lastname)
        VALUES ('$user', '$mail','$passwordHash', '$token', '$first', '$last')";
        $VALUE = $conn->exec($sql);
        $body = "CLICK THIS LINK TO VERIFY YOUR EMAIL
                http://localhost:8080/CAMA/servers/verify.php?email=$mail&token=$token";
        $subject = "VERIFY YOUR EMAIL";
        $receiver = $mail;
        $sender = "From : Pntsunts@CAMA.com";
        mail($receiver, $subject, $body, $sender);
        echo "Rows affected.$VALUE";
        echo "CHECK YOUR EMAIL FOR VERIFICATION";
    }
    catch (PDOException $e)
    {
        echo "ERROR OCCURED. " . $e->getMessage();
    }
}