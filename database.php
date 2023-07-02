<?php 

    // Setting the DATABASE information as variables.
    $db_server = "localhost";
    $db_user = "root";
    $db_pass = "";
    $db_name = "businessdb";
    $conn = "";
    
    // Here we attempt the connection with the saved database information variables.
    try{
    $conn = mysqli_connect($db_server,
                            $db_user, 
                            $db_pass, 
                            $db_name);
    }

    // Here if the MySQL server is not started,and the above connection fails, instead of an ugly 303 error, we print out the below statement.
    catch(mysqli_sql_exception){
        echo "Could not connect!<br>";
    }

    // If the connection is successfull, we print out the below statement, but its not needed to let the user know he is connected, so we comment out this code. 
    
    /*
    if($conn){
        echo "You are connected!<br>";
    }
   */
?>