<?php

    if($connection=@mysqli_connect('localhost', 'wlucas1', 'wlucas1', 'AlumniDB')){
        ;
    }
    else{
        print '<p>ERROR: connecting to MySQL.</p>';
    }


    if(isset($_POST["submit_button"]) ) {
        $usersCount = count($_POST["username"]);
        echo $usersCount;
        for($i=0;$i<$usersCount;$i++) {

            $username = $_POST['username'][$i];
            $privilege = $_POST['Privilege'][$i];
            echo $delete . " ". $birthdate . " ";
            $sql = " UPDATE USERS SET privelege= $privilege WHERE username=$username;
            

            echo $sql;
            $resuli = mysqli_query($connection, $sql);

            if (!$result) {
                echo 'Invalid query: ' . mysql_error();
            }
        }
    }

    mysqli_close($connection);
    header( "refresh:5;url=https://lamp.salisbury.edu/~cvancory1/Homepage/test.php" );


?>