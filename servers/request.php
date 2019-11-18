<?php
    require "../config/setup.php";

    session_start();


   if (isset($_POST['requested']))
   {
       $email = $_POST['email'];
       $_SESSION['email']  = $email;

       try
       {
           $sql = "SELECT email FROM users WHERE email = :email";
           $result = $conn->prepare($sql);
           $result->bindValue(':email', $email);
           $result->execute();
           $value = $result->fetch(PDO::FETCH_ASSOC);

           if ($value == false)
               echo "FAILURE.";
            else
            {
                $body = "ENTER YOUR NEW PASSWORD HERE
                    http://localhost:8080/CAMA/servers/create.php?email=$email";
                $subject = "RESET YOUR PASSWORD";
                $receiver = $email;
                $sender = "From : Pntsunts@CAMA.com";
                mail($receiver, $subject, $body, $sender);
                header("location:../servers/reset.php?success=1");
            }
       }
       catch(PDOException $error)
       {
           echo "Error occured : ".$error->getMessage();
       }
    }
?>