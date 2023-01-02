<?php
$title = "Home";
require_once 'includes/header.php';
require_once 'db/connection.php';

$results = $user->getPersonalDetails();
//convert the results into an array
$fetched_values = $results->fetch(PDO::FETCH_ASSOC);

?>

<div class="banner">
    <p id="bannerHeader"><?php echo $fetched_values['name']; ?></p>
    <p id="supportingText"><?php echo $fetched_values['bio']; ?></p>
</div>

<!-- about start-->
<div class="card aboutMe" id="about">
    <p id="overview">Overview</p>
    <div class="row g-0">
        <div class="col-md-4">
            <img src="images/me.jpg" class="img-fluid rounded-start" alt="my display picture">
        </div>
        <div class="col-md-8">
            <div class="card-body">
                <div class="cardHeading">
                    <h6>Discover</h6>
                    <h5 class="card-title"><span id="border_below">Abou</span>t Me</h5>
                </div>
                <p class="card-text"><?php echo $fetched_values['description']; ?> </p>
                <div class="container insideContainer">
                    <div class="row justify-content-start">
                        <div class="col-5">
                            <p>Name: <?php echo $fetched_values['name']; ?></p>
                            <p>Phone: <?php echo "+255" . $fetched_values['phone']; ?></p>
                            <p>Experience: <?php echo $fetched_values['experience']; ?></p>
                            <p>LinkedIn: <?php echo $fetched_values['linkedin']; ?></p>
                        </div>
                        <div class="col-5">
                            <p>Age:
                                <?php
                                $current_year = date("Y");
                                $date_of_birth = $fetched_values['dob']; //from the database

                                $date = date_create($date_of_birth); //created a new datetime object
                                $year_of_birth = date_format($date, "Y"); //formatted the new date time created object to return year only

                                $age = $current_year - $year_of_birth;
                                
                                echo $age;
                                ?>
                            </p>
                            <p>Address: <?php echo $fetched_values['address']; ?>, Tanzania</p>
                            <p>Freelance: <?php echo $fetched_values['freelancer']; ?></p>
                            <p>Github: <?php echo $fetched_values['github']; ?></p>
                        </div>

                    </div>
                </div>
                <button type="button" class="cv-button">Download CV</button>
            </div>
        </div>
    </div>
</div>
<!-- about end -->

<div id="service">
    <div class="servicesPart">
        <h6><span id="border_below">What I</span> Do</h6>
        <p id="services">My Services</p>
    </div>
    <div class="row g-3 mx-auto">
        <div class="col-4">
            <div class="card details-card">
                <div class="card-body">
                    <p><i class="fa fa-cog fa-3x"></i></p>
                    <h5 class="card-title">Website Development</h5>
                    <h6 class="card-text">Building and maintenance of websites this includes the layout, design, interactivity and Hosting</h6>
                </div>
            </div>
        </div>
    </div>
</div>


<div id="contact-me">
    <div class="contact_section">
        <h6><span id="border_below">Inter</span>ested ?</h6>
        <p id="contact">Email Me</p>
    </div>
    <div class="row justify-content-around">
        <div class="col-4">
            <img src="images/member.png" alt="contact me photo">
        </div>
        <div class="col-4">
            <div class="card send_email" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title text-center"><i class="fa-sharp fa-solid fa-envelope fa-2x"></i></h5>
                    <div class="row">
                        <form action="">
                            <div>
                                <input type="text" class="input-fields" id="name" placeholder="Name">
                            </div>
                            <div>
                                <input type="text" class="input-fields" id="email" placeholder="Email">
                            </div>
                            <div>
                                <textarea class="input-fields" placeholder="Message" id="message"></textarea>
                            </div>
                            <button type="button" id="send_email">send</button>
                        </form>

                    </div>
                </div>
            </div>

        </div>
    </div>
</div>


<?php
require_once 'includes/footer.php';
?>