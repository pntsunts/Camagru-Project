
<?php
    require_once '../config/database.php';
try
{
    $conn = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
    //log in user from login page
    if (isset($_POST['signin']))
    {
        $user = $_POST['username'];
        $P1 = $_POST['Pass2'];
        $passwordHash = hash("md5", $P1, FALSE);
        $state = "SELECT * FROM users WHERE username= ? AND Pass2= ?";
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $result = $conn->prepare($state);
        $result->bindParam(1, $_POST['username']);
        $result->bindParam(2, $passwordHash);
        $result->execute();

        $count = $result->rowCount();
        if ($count > 0)
        {
            session_start();
            $_SESSION["username"] = $_POST['username'];
            header("location:../servers/Home.php");
        }
        else
        {
            header("location:../servers/signin.php?error=1");
        }
    }

}
catch (PDOException $error)
{
    echo "EEROR OCCURED.".$error->getMessage();
}
?>