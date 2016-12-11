<?php
	include 'login.php';
	// connect to server and test if successful
	$connection = mysqli_connect($db_hostname, $db_username, $db_password, $db_database);

    if(mysqli_connect_error()){
        die("Database Connection Failed: " .
                mysqli_connect_error() .
                " (" . mysqli_connect_errno() . ")"
           );
    }
?>