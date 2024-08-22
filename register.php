<?php
    include('connect.php');

    if(isset($_POST['reg']))
    {
        $rdate = date('Y-m-d');
        $name = $_POST['name'];
        $contact = $_POST['contact'];
        $email = $_POST['email'];
        $pass = $_POST['pass'];

        mysqli_query($con,"INSERT INTO register(rdate,name,contact,email,pass) VALUES('$rdate','$name','$contact','$email','$pass')");
        echo"<script>
            alert('Registration Successful...');
            window.location.href='index.php';
        </script>";

    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Registration Page</title>
    <?php include('bootcdn.php') ?>
    <style>
        *{
            margin: 0;
            padding: 0;
        }
        body{
            background-image: url('images/background-login.png');
            background-attachment: fixed;
            background-size: cover;
        }
    </style>
</head>
<body>
    <div class="conatainer">
        <br><br><br><br>
        <div class="row">
            <div class="col-sm-3">

            </div>
            <div class="col-sm-6">
                <!-- user logi  form start -->
                 <form method="post">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h2>Create Account</h2>
                        </div>
                        <div class="panel-body">
                            <label for="">Username:</label>
                            <input type="text" name="name" class="form-control" placeholder="" require autofocus>
                            <br>
                            <label for="">Contact :</label>
                            <input type="number" name="contact" class="form-control" require>
                            <br>
                            <label for="">Email :</label>
                            <input type="email" name="email" class="form-control" require>
                            <br>
                            <label for="">Set Password :</label>
                            <input type="text" name="pass" class="form-control" require>
                        </div>
                        <div class="panel-footer">
                            <button type="submit" name="reg" class="btn-warning btn-block" style="color: black; padding:6px; border-radius:10px">Register</button>
                            <br>
                            <p>
                                Go to <span class="glyphicon glyphicon-hand-right"> </span> <a href="index.php">Login Panel</a>
                            </p>
                        </div>

                    </div>

                 </form>
                 <!-- user login form end -->
            </div>
        </div>
    </div>
    
</body>
</html>