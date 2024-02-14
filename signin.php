<?php

include 'boot.php';

?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="resources/css/style.css">

<br>
<div class="container">
    <div class="row justify-content-md-center">
        <div class="col-md-5 " style="margin-top:20px;">
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
                        <h1 class="text-center" style="margin-top:30px; color: white;">Register a new account</h1>
                    </div>
                    <div class="container-content">
                        <form class="margin-t" action="code.php" method="POST">
                            <div class="form-group mb-3">
                                <input class="form-control" type="text" id="first_name" name="first_name"
                                    value="<?php echo (isset($_SESSION['first_name'])) ? $_SESSION['first_name'] : '';
                                    unset($_SESSION['first_name']) ?>"
                                    placeholder="Enter first name" required>
                            </div>
                            <div class="form-group mb-3">
                                <input class="form-control" type="text" id="last_name" name="last_name"
                                    value="<?php echo (isset($_SESSION['last_name'])) ? $_SESSION['last_name'] : '';
                                    unset($_SESSION['last_name']) ?>"
                                    placeholder="Enter last name" required>
                            </div>
                            <div class="form-group mb-3">
                                <input class="form-control" type="email" id="email" name="email"
                                    value="<?php echo (isset($_SESSION['email'])) ? $_SESSION['email'] : '';
                                    unset($_SESSION['email']) ?>"
                                    placeholder="Enter email" required>
                            </div>

                            <div class="form-group mb-3">
                                <input class="form-control" type="password" id="password" name="password"
                                    value="<?php echo (isset($_SESSION['password'])) ? $_SESSION['password'] : '';
                                    unset($_SESSION['password']) ?>"
                                    placeholder="Enter password" required>
                            </div>
                            <div class="form-group mb-3">
                                <input class="form-control" type="password" id="confirm" name="confirm"
                                    value="<?php echo (isset($_SESSION['confirm'])) ? $_SESSION['confirm'] : '';
                                    unset($_SESSION['confirm']) ?>"
                                    placeholder="Re-type password">
                            </div>
                            <button type="submit" name="register" class="form-button button-l margin-b">Sign Up</button>
                            <a href="login.php">Back</a>

                        </form>
                    </div>
                </div>
            </body>


        </div>