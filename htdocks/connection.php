<?php      
    $host = "localhost";
    $user = "root";
    $password = 'toor';
    $db_name = "login";
      
    $con = mysqli_connect($host, $user, $password, $db_name);  
    if(mysqli_connect_errno()) {  
        die("Failed to connect with MySQL: ". mysqli_connect_error());  
    }  
?>  