$result = $crud->getSpecialities();

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