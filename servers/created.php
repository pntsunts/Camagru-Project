<?php
    require '../config/setup.php';

    session_start();

    $email = $_SESSION['email'];

    if (isset($_POST['signin']))
    {
        $pass1 = trim($_POST['password']);
        $pass2 = trim($_POST['Pass2']);
        //if ($_POST['password'] != $_POST['Pass2'])
        if ($pass1 != $pass2)
        {
            echo "Passwords do not Match";
            die();
        }
        else
        try
        {
            $passwordHash = hash("md5", $pass2, FALSE);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = "UPDATE users SET Pass2 = ? WHERE email='$email'";

			$result = $conn->prepare($sql);

            $result->bindParam(1, $passwordHash);

            $result->execute();

            echo $result->rowCount() . " records UPDATED successfully";
        }
        catch (PDOException $error)
        {
            echo "ERROR OCCURED.".$error->getMessage();
        }
        header('location:../servers/signin.php');
    }
?>
