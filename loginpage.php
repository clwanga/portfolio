<?php
session_start();
require_once 'db/connection.php';

//if data was submitted via post method then
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = trim($_POST['email']);
    $password = $_POST['password'];
    $new_password = md5($password . $email);

    //call a function to check if the user exists in our database
    $result = $user->getUser($email, $new_password);

    if (!$result) {
        //echo '<div class="alert alert-danger" role="alert">Incorrect username or password!</div>';
    } else {
        $_SESSION['username'] = $result['username'];
        $_SESSION['user_id'] = $result['id'];

        header("Location: index.php");
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/loginpage.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <script src="https://use.fontawesome.com/cc00a12483.js"></script>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-sm-4 left_aside">
                <a href="index.php">
                    <h6><i class="fa fa-grav" aria-hidden="true"></i> Home</h6>
                </a>
            </div>
            <div class="col-sm-8">
                        <form action="<?php htmlentities($_SERVER['PHP_SELF']); ?>" method="POST">
                            <div class="user_icon">
                                <h3>Log in</h3>
                                <h6>Enter your credentials to access your account.</h6>
                            </div>
                            <div class="input-icons">
                                <i class="fa fa-user icon"></i>
                                <input class="input-field" type="text" value="<?php if ($_SERVER['REQUEST_METHOD'] == 'POST') echo $_POST['email']; ?>" placeholder="Email" name="email">
                            </div>
                            <div class="input-icons">
                                <i class="fa fa-lock icon" aria-hidden="true"></i>
                                <input class="input-field" type="password" placeholder="Password" name="password">
                            </div>

                            <div>
                                <input type="submit" value="Login" id="login" class="general">
                            </div>
                            <div id="signup">
                                <p>Not a member? <span><a href="signup_page.php">Sign Up</a> </span></p>
                            </div>

                            <div class="container text-center">
                                <div class="row g-2">
                                    <div class="col">
                                        <hr>
                                    </div>
                                    <div class="col-2">
                                        <span class="or_text">OR</span>
                                    </div>
                                    <div class="col">
                                        <hr>
                                    </div>
                                </div>

                                <div class="container">
                                    <div class="row justify-content-around social_media">
                                        <div class="col-4">
                                            <i class="fa fa-google" aria-hidden="true"></i><span class="social_name"> Google</span>
                                        </div>
                                        <div class="col-4">
                                            <i class="fa fa-github" aria-hidden="true"></i><span class="social_name"> Github</span>
                                        </div>
                                    </div>
                                </div>
                        </form>
                    </div>   
                </div>
            </div>

        </div>
    </div>
    <script type="text/javascript" src="scripts/login.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>

</html>