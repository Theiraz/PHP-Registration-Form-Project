<?php 
    include("database.php");
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action <?php htmlspecialchars($_SERVER["PHP_SELF"])?> method = "POST">
    <h2>Welcome to FakeBook!</h2>
    Username: <br>
    <input type = "text" name = "username"> <br>
    Password: <br>
    <input type = "password" name = "password"> <br>
    <input type = "submit" name = "submit" value = "Register"> 
    </form>
</body>
</html>


<?php 
    if($_SERVER["REQUEST_METHOD"] == "POST"){

        $username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_SPECIAL_CHARS);
        $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_SPECIAL_CHARS);

        if(empty($username)){
            echo "Please type in a username!";
        }

        elseif(empty($password)){
            echo "Please type in a password!";
        }

        else{
            $hash = password_hash($password, PASSWORD_DEFAULT);
            $sql = "INSERT INTO users(user, password)
                    VALUES('$username' ,'$hash')";
        }
    

        try{
            mysqli_query($conn, $sql);
                echo "You have succesfully registered!";
        }

        catch(mysqli_sql_exception){
            echo "Username is already taken!";

        }


        mysqli_close($conn);
    }


?>





