<?php
require_once('boot.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="icon" type="image/x-icon" href="resources/img/cat.jpg">
    <title>City Disaster Risk Reduction and Management Office</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="resources/css/nav_style.css">
    <link rel="stylesheet" type="text/css" href="resources/style.css">
    <link rel="stylesheet" type="text/css" href="resources/fontawesome-free-6.5.1-web/css/fontawesome.css">

    <link rel="stylesheet" type="text/css" href="resources/fontawesome-free-6.5.1-web/css/solid.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">


</head>
<header>

    <nav class="navbar navbar-expand-lg bg-body-tertiary-burlywood">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php"><strong>City Disaster Risk Reduction and Management
                    Office</strong></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">

                    </li>
                </ul>
                <div class="topbar-divider d-none d-sm-block"></div>

                <!-- Nav Item - User Information -->
                    <!-- Dropdown - User Information -->
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="logout.php" data-toggle="modal" data-target="#logoutModal">
                            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                            Logout
                        </a>
                    </div>



            </div>
        </div>
    </nav>
</header>

<body>
    <?php
    if (isset($_SESSION['error'])) {
        echo "<div class='alert alert-danger text-center'>
            <i class='fas fa-exclamation-triangle'></i> " . $_SESSION['error'] . "
          </div>";

        // unset error
        unset($_SESSION['error']);
    }

    if (isset($_SESSION['success'])) {
        echo "<div class='alert alert-success text-center'>
            <i class='fas fa-check-circle'></i> " . $_SESSION['success'] . "
          </div>";

        // unset success
        unset($_SESSION['success']);
    }
    ?>
    <br>