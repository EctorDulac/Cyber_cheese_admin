<?php

    if($_SESSION['is_admin'])
    {
        header('Location: /admin-login/admin.php');
    }

    function login($u, $p)
    {
        // TODO, connect to the Database
    }

    $post = false;

    if (isset($_POST['username']) && isset($_POST['password']))
    {
        $post = true;
        $username = $_POST['username'];
        $password = $_POST['password'];

        $login_ok = false;

        // For dev only
        if ($username=='admin' && $password=='f69fjg3jk8tv3ghmj90oh')
        {
            $login_ok = true;
            session_start();
            $_SESSION['is_admin']= true;
            header('Location: /admin-login/admin.php');
        }

        // Test username and password in DB
        if(login($username,$password))
        {
            $login_ok = true;
            session_start();
            $_SESSION['is_admin'] = true;
            header('Location: /admin-login/admin.php');
        }
     }
 ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Cybercheese Admin</title>
    <link href="./../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom fonts for this template -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link href="../css/cybercheese-admin.css" rel="stylesheet">
  </head>
  <body id="LoginForm">
    <div class="container">
      <div class="login-form">
        <div class="main-div">
          <div class="panel">
            <h2>Admin Login</h2>
            <p>Please enter your username and password</p>
          </div>
          <form id="Login" method="post" action="index.php">
            <div class="form-group">
              <input type="text" class="form-control" id="inputEmail"  name="username" placeholder="Username">
            </div>
            <div class="form-group">
              <input type="password" class="form-control" id="inputPassword" name="password" placeholder="Password">
            </div>
            <div class="message">
            <?php
            if ($post && !$login_ok)
            {
                echo 'Invalid username or password';
            }
            ?>
            </div>
            <button type="submit" class="btn btn-primary">Login</button>
          </form>
        </div>
        <p class="botto-text"> Designed by EctorDulac</p>
      </div>
    </div>
  </body>
</html>
