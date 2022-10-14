<?php

//this includes a session file that contains code that starts a session
//by having it in the header page it will be included on every page. alloweing session capability to be used on every page across the website. 
require_once "includes/session.php";
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Portfolio | <?php echo $title ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="css/site.css">
    <script src="https://kit.fontawesome.com/b3f5a27ff1.js" crossorigin="anonymous"></script>
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
                    <a class="nav-item nav-link" href="#about">About</a>
                    <a class="nav-item nav-link" href="#services">Services</a>
                    <a class="nav-item nav-link" href="#contact-me">Contact Me</a>
                </div>
                <div class="navbar-nav ml-auto">
                    <?php if (!isset($_SESSION['user_id'])) { ?>
                        <button class="button"><a class="nav-item nav-link" aria-current="page" href="loginpage.php">Login</a></button>
                    <?php } else { ?>
                        <a class="nav-item nav-link salutation" aria-current="page" href="#"><span><?php echo $_SESSION['username']; ?></span> <i class="fa fa-circle fa-beat" aria-hidden="true"></i></a>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                More
                            </a>
                            <ul class="dropdown-menu">
                                <li><button type="button" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                        Update Profile
                                    </button>
                                </li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><button type="button" class="dropdown-item">
                                        Donate <span><i class="fa-sharp fa-solid fa-sack-dollar fa-shake"></i></span>
                                    </button>
                                </li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="logout.php">Sign Out  <span><i class="fa-sharp fa-solid fa-right-from-bracket"></i></span></a></li>
                            </ul>
                        </li>

                    <?php } ?>
                </div>
            </div>
        </div>
    </nav>

    <!-- update profile model -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save Changes</button>
                </div>
            </div>
        </div>
    </div>
    <!-- update profile model end -->
    <!-- end of navbar -->
    <div class="z-index-n1 main_container">