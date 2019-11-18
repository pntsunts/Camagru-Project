
<?php
    session_start();
    if (!$_SESSION['username'])
    {
        header("location:../index.php");
    }
?>
<?php
    session_start();
    if (isset($_POST['submit']))
    {
        $username = $_POST['username'];
        $email = $_POST['email']; 
        $first = $_POST['Firstname'];
        $last = $_POST['Lastname'];
        require "../config/setup.php";
        
        try
        {
           $sql = "UPDATE `camagru`.`users` SET username = '$username', email= '$email', Firstname = '$first', Lastname = '$last'";
           $result = $conn->prepare($sql);
           $result->bindParam(':username', $username);
           $result->execute();

           echo $result->rowCount() . " records UPDATED successfully";
           header("location:../servers/Home.php?success=1");
        }
        catch(PDOException $error)
        {
            echo "Error occured : ".$error->getMessage();
        }
    }
    else
    {
        die("You need to specify  username");
    }
    if (isset($_POST['check']))
    {
        $body = "RECORDS WERE UPDATED SUCCESSFULLY";
        $subject = "UPDATED";
        $receiver = $email;
        $sender = "From : Pntsunts@CAMA.com";
        mail($receiver, $subject, $body, $sender);
    }
?>
