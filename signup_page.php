<?php
session_start();
require_once 'db/connection.php';

//if data was submitted via post method then
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $full_name = $_POST['name'];
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $new_password = md5($password . $email);

    //call a function to check if the email exists in our database
    $email_exists = $user->selectEmail($email);
    $username_exists = $user->selectUsername($username);

    if ($email_exists) {
        // $result_message = '<div class="alert alert-danger" id="message" role="alert">Email Account already exists!</div>';
        $result_message = 'Email Account already exists!';
    } else if ($username_exists) {
        $result_message = '<div class="alert alert-danger" id="message" role="alert">Username exists! Try a different one</div>';
    } else {
        $result = $crud->createAccount($full_name, $username, $email, $new_password);

        if (!$result) {
            $result_message = '<div class="alert alert-danger" id="message" role="alert">Operation failed !</div>';
        } else {
            $result_message = '<div class="alert alert-success" id="message" role="alert">Account created successfully!</div>';
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PY | Signup</title>
    <link rel="stylesheet" href="css/signup_page.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <script src="https://use.fontawesome.com/cc00a12483.js"></script>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-sm-8 left_aside">
                <a href="index.php">
                    <h6><i class="fa fa-grav" aria-hidden="true"></i> Home</h6>
                </a>
            </div>
            <div class="col-sm-4">
                <form action="<?php htmlentities($_SERVER['PHP_SELF']); ?>" method="POST">
                    <div class="form_head">
                        <h6>START FOR FREE</h6>
                        <h3>Create a new account<span>.</span></h3>
                        <h6>Already a Member? <a href="loginpage.php">Log In</a></h6>
                    </div>
                    <div>
                        <input class="input-field" type="text" value="" placeholder="Full name" name="name">
                    </div>
                    <div>
                        <input class="input-field" type="text" placeholder="Username" name="username">
                    </div>
                    <div>
                        <input class="input-field" type="email" placeholder="Email" name="email">
                    </div>
                    <div>
                        <input class="input-field" type="password" placeholder="Password" name="password">
                    </div>
                    <div>
                        <input type="submit" value="Create account" id="signup">
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