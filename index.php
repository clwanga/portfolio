<?php
$title = "Home";
require_once 'includes/header.php';
require_once 'db/connection.php';

$result = $crud->getSpecialities();
?>
<div class="banner">
    <p id="bannerHeader">Charles Maungila</p>
    <p id="supportingText">A Creative Freelancer & Full Stack Developer </p>
    <p id="overview">Overview</p>
</div>

<!-- about start-->
<div class="card mb-3 pt-5 aboutMe">
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
                <p class="card-text">My name is Charles Lwanga Maungila. I'm a full stack developer based in Dar es salaam, Tanzania. I'm very passionate and dedicated to my work. With 2 years of experience as a professional Full stack developer, I have acquired the skills necessary to build great and premium websites. </p>
                <div class="container insideContainer">
                    <div class="row justify-content-start">
                        <div class="col-5">
                            <p>Name: Charles Lwanga Maungila</p>
                            <p>Phone: +255 758 607 205</p>
                            <p>Experience: 2 Years</p>
                            <p>LinkedIn: Charles Maungila</p>
                        </div>
                        <div class="col-5">
                            <p>Age: 26</p>
                            <p>Address: Dar-es-salaam, Tanzania</p>
                            <p>Freelance: Available</p>
                            <p>Github: clwanga</p>
                        </div>

                    </div>
                </div>
                <button type="button" class="btn btn-warning">Download CV</button>
            </div>
        </div>
    </div>
</div>
<!-- about end -->
<div class="servicesPart">
    <h6><span id="border_below">What I</span> Do</h6>
    <p id="services">My Services</p>
</div>
<div class="container my-5">
    <div class="row g-3">
        <div class="col-4">
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <p><i class="fa fa-cog fa-3x"></i></p>
                    <h5 class="card-title">Website Development</h5>
                    <p class="card-text">Building and maintenance of websites this includes the layout, design, interactivity and Hosting</p>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <p><i class="fa fa-laptop fa-3x" aria-hidden="true"></i></p>
                    <h5 class="card-title">IT Services</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <p><i class="fa fa-mobile fa-3x" aria-hidden="true"></i></p>
                    <h5 class="card-title">Mobile App Development</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="contact_section">
    <h6><span id="border_below">Inter</span>ested ?</h6>
    <p id="contact">Email Me</p>
</div>
<div class="container">
    <div class="row justify-content-around">
        <div class="col-4">
            <img src="images/member.png" alt="contact me photo">
        </div>
        <div class="col-4">
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title text-center"><i class="fa fa-telegram fa-3x fa-spin fa-fw" aria-hidden="true"></i></h5>
                    <!-- <h6 class="card-subtitle mb-2 text-muted">Send me an email</h6> -->
                    <div class="row">
                        <div class="col mb-3">
                            <label for="fname" class="form-label">First name</label>
                            <input type="text" class="form-control" aria-label="First name" id="fname">
                        </div>
                        <div class="col mb-3">
                            <label for="lname" class="form-label">Last name</label>
                            <input type="text" class="form-control" aria-label="Last name" id="lname">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="text" class="form-control" id="email">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text">Message</span>
                            <textarea class="form-control" aria-label="With textarea"></textarea>
                        </div>
                        <button type="button" class="btn btn-warning">send</button>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- start -->
<!-- <form class="w-50 p-3" method="post" action="success.php" enctype="multipart/form-data">
    <div class="form-group">
        <label for="first_name">First Name</label>
        <input type="text" class="form-control" id="first_name" placeholder="firstname" name="fname">
    </div>
    <div class="form-group">
        <label for="last_name">Last Name</label>
        <input type="text" class="form-control" id="last_name" placeholder="Lastname" name="lname">
    </div>
    <div class="form-group md-3">
        <label for="exampleInputEmail1">Email address</label>
        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" name="email">
        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    </div>
    <div class="form-group">
        <label for="contact_number">Contact Number</label>
        <input type="text" class="form-control" id="contact_number" placeholder="Number" name="contact">
    </div>
    <div class="form-group">
        <label for="dob">Date of Birth</label>
        <input type="date" class="form-control" id="dob" placeholder="Date" name="dob">
    </div>
    <div class="form-group">
        <label for="speciality">Area of Expertise</label>
        <select class="form-control" name="speciality" id="speciality">
            <?php while ($r = $result->fetch(PDO::FETCH_ASSOC)) { ?>
                <option value="<?php echo $r['speciality_id'] ?>"><?php echo $r['name'] ?></option>
            <?php } ?>
        </select>
    </div>
    <div class="custom-file">
        <input type="file" accept="image/*" class="custom-file-input" id="avatar" placeholder="avatar" name="avatar">
        <label class="custom-file-label" for="avatar">Choose file</label>
        <small id="avatar" class="form-text text-warning">File upload is optional</small>
    </div>
    <button type="submit" class="btn btn-primary" name="submit">Submit</button>
</form> -->
<!-- end -->

<?php
require_once 'includes/footer.php';
?>