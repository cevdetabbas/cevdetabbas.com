<?php
    include('connection.php');
    $username = $_POST['user'];
    $password = $_POST['pass'];

        //to prevent from mysqli injection
        $username = stripcslashes($username);
        $password = stripcslashes($password);
        $username = mysqli_real_escape_string($con, $username);
        $password = mysqli_real_escape_string($con, $password);

        $sql = "select *from login where username = '$username' and password = '$password'";
        $result = mysqli_query($con, $sql);
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        $count = mysqli_num_rows($result);

        if($count == 1){
            echo "<h1><center> Login successful </center></h1>";
            echo "<h1><center> When Everything Goes Wrong Keep Calm and Trust the Plan </center></h1>";
            echo "<h1><center>  Your current UUID </center></h1>";
            echo "<h1><center> f5acca1630cf11ee99c90242ac1211e5 </center></h1>";
            echo "<h1><center> 08/02/2023 01:00 </center></h1>";
            
            
        }
        else{
            echo "<h1> Login failed. Invalid username or password.</h1>";
        }
?>