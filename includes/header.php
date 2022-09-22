<?php

//this includes a session file that contains code that starts a session
//by having it in the header page it will be included on every page. alloweing session capability to be used on every page across the website. 
include 'session.php';
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Portfolio | <?php echo $title ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="css/site.css">
    <script src="https://use.fontawesome.com/cc00a12483.js"></script>
</head>

<body>
    <!-- beginning of navbar -->
    <nav class="navbar navbar-expand-lg fixed-top">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <div class="navbar-nav mr-auto container pages">
                    <a class="nav-item nav-link active" aria-current="page" href="index.php">Home</a>
                    <a class="nav-item nav-link" href="viewrecords.php">About</a>
                    <a class="nav-item nav-link" href="viewrecords.php">Services</a>
                    <a class="nav-item nav-link" href="viewrecords.php">Contact</a>
                    <a class="nav-item nav-link" href="viewrecords.php">Challenge  <i class="fa fa-trophy fa-spin fa-fw" aria-hidden="true"></i></i></a>
                </div>
                <div class="navbar-nav ml-auto">
                    <?php if (!isset($_SESSION['user_id'])) { ?>
                        <button class="button"><a class="nav-item nav-link" aria-current="page" href="loginpage.php">Login</a></button>
                    <?php } else { ?>
                        <a class="nav-item nav-link salutation" aria-current="page" href="#"> <span>Hello <?php echo $_SESSION['username'] . '!' ?></span></a>
                        <button class="button"><a class="nav-item nav-link" aria-current="page" href="logout.php">Logout</a></button>
                    <?php } ?>
                </div>
            </div>
        </div>
    </nav>
    <!-- end of navbar -->
    <div class="container z-index-n1 main_container">