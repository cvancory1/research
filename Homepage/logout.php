<?php
    session_start();
    session_unset();
    session_destroy();
    header( "refresh:1;url=https://lamp.salisbury.edu/~cvancory1/Loginpage/loginP.html");
?>

