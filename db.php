<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $db = "practice_crud_op";

    $conn = mysqli_connect($servername,$username,$password,$db);
    if(!$conn){
        die("we are facing some issues with the db connection so please give us time.".mysqli_error($conn));
    }
?>