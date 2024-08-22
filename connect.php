<?php
// function to connect server
    $servername = "localhost";
    $username = "root";
    $password = "";

    $con = mysqli_connect($servername,$username,$password);
    if($con)
    {
        mysqli_select_db($con,"E-commerce");
        // echo "Yes connect...";
    }
?>