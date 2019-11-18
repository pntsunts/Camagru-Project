<?php
    //Log out
    if ($_POST['logout'] == 'logout')
    {  
        session_start();
        session_destroy();
        unset($_SESSION['user']);
        header('location:../index.php');
    }
?>