<?php
require_once "connection.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/index.css">


    <script src="js\sweetalert\jquery-3.6.1.min.js"></script>
    <script src="js\sweetalert\sweetalert2.all.min.js"></script>
    
</head>
<body>
<img src="img/wave.png" class="wave">
  <div class="container">
      <div class="img">
            <img src="img/index.svg">
      </div>
      <div class="login-content">
          <form method="POST">
              <img src="img/sac.png">
              <h2 class="title">Welcome To Quadex</h2>
              
                  <div class="input-div one focus">
                      <div class="i">
                          <i class="fas fa-user"></i>
                      </div>
                      <div class="div">
                          <h5>Students Full Name</h5>
                          <input type="text" class="form-control" name="name">
                      </div>
                  </div>

                <div class="input-div pass focus">
                      <div class="i">
                          <i class="fas fa-lock"></i>
                      </div>
                      <div class="div">
                          <h5>Examination Code</h5>
                          <input type="password" class="form-control" name="code">
                      </div>
                  </div>
                  <a href="admin_login.php">Admin</a>
                  <input type="submit" class="btn" value="Start Exam">
          </form>

      </div>
  </div>
  
  <!-- <script type="text/javascript" src="main.js"></script> -->
</body>
</html>