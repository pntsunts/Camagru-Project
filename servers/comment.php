<?php
    require '../config/setup.php';

    if (isset($_POST['submit']))
    {
        $uid = $_POST['uid'];
        $date = $_POST['DATE'];
        $mess = $_POST['MESSAGE'];
        $email = $_POST['email'];
        
        try
        {
            $conn = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO COMMENTS (uid, DATE, MESSAGE)
                    VALUES ('$uid', '$date', '$mess')";
            $result = $conn->prepare($sql);
            $result->execute();
        }
        catch (PDOException $e)
        {
            echo "ERROR OCCURED. " . $e->getMessage();
        }

       try
       {
           $out = "SELECT * FROM COMMENTS";
           $result = $conn->prepare($out);
           $result->execute();
           $value = $result->fetch();

           foreach ($value as $row)
           {
               echo $row["MESSAGE"]."<br>";
           }
        }
        catch (PDOException $e)
        {
            echo "ERROR OCCURED. " . $e->getMessage();
        }
        if (isset($_POST['check']))
        {
            $body = "COMMENTED SUCCESSFULLY";
            $subject = "COMMENT";
            $receiver = "peterntsuntsha24@gmail.com";
            $sender = "From : Pntsunts@CAMA.com";
            mail($receiver, $subject, $body, $sender);
        }
        header("location:../servers/webcam.php");

    }
?>