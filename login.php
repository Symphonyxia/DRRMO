<?php
include 'boot.php';

?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
  integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

<link rel="stylesheet" type="text/css" href="resources/css/style.css">

<div class="container">

  <div class="row justify-content-md-center">
    <div class="col-md-5" style="margin-top:20px;">
      <?php
      if (isset($_SESSION['error'])) {
        echo "
                        <div class='alert alert-danger text-center'>
                            <i class='fas fa-exclamation-triangle'></i> " . $_SESSION['error'] . "
                        </div>
                    ";


        unset($_SESSION['error']);
      }

      if (isset($_SESSION['success'])) {
        echo "
                        <div class='alert alert-success text-center'>
                            <i class='fas fa-check-circle'></i> " . $_SESSION['success'] . "
                        </div>
                    ";


        unset($_SESSION['success']);
      }
      ?>




      <body class="main-bg">
        <div class="login-container text-c animated flipInX">
          <div>
            <h1 class="text-center" style="color: white;">Login</h1>
          </div>
          <div class="container-content">
            <form class="margin-t" action="resources/dir/logcode.php" method="POST">
              <div class="form-group mb-3">
                <input class="form-control" type="email" id="email" name="email" placeholder="Enter email" required>
              </div>
              <div class="form-group mb-3">
                <input class="form-control" type="password" id="password" name="password" placeholder="Enter password"
                  required>
              </div>
              <button type="submit" name="login" class="form-button button-l margin-b">Sign In</button>
              <p class="text-darkyellow"><small><a href="signin.php" class="btn-link">Register a new account</a></small>
              </p>
            </form>
          </div>
        </div>
      </body>


    </div>