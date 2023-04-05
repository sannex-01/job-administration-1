<?php
include('config.php');

// This is to get data from the database and insert it into the form inputs
$id = $_GET['id'];

$query = mysqli_query($conn, "SELECT * FROM applicants WHERE id = $id");
$applicant = mysqli_fetch_array($query);

$phone = $applicant['phone'];
$address = $applicant['address'];
$qualification = $applicant['qualification'];
$institution = $applicant['institution'];
$skills = $applicant['skills'];
$experience = $applicant['experience'];

echo '
  <input type="hidden" name="id" value="' . $id . '">
  <div class="form-group row">  
    <label class="col-sm-4 col-form-label">Name</label>
    <div class="col-sm-8">
      <input id="name" name="name" type="text" class="form-control" value="' . $applicant['name'] . '" required>
    </div>
  </div>
  <div class="form-group row">
    <label class="col-sm-4 col-form-label">Email</label>
    <div class="col-sm-8">
      <input name="email" type="email" class="form-control" value="' . $applicant['email'] . '" required>
    </div>
  </div>
  <div class="form-group row">
    <label class="col-sm-4 col-form-label">Phone Number</label>
    <div class="col-sm-8">
      <input name="phone" type="text" class="form-control" value="' . $applicant['phone'] . '" required>
    </div>
  </div>
  <div class="form-group row">
    <label class="col-sm-4 col-form-label">Address</label>
    <div class="col-sm-8">
      <input name="address" type="text" class="form-control" value="' . $applicant['address'] . '" required>
    </div>
  </div>
  <div class="form-group row">
    <label class="col-sm-4 col-form-label">Qualification</label>
    <div class="col-sm-8">
      <input name="qualification" type="text" class="form-control" value="' . $applicant['qualification'] . '" required>
    </div>
  </div>
  <div class="form-group row">
    <label class="col-sm-4 col-form-label">Institute Name</label>
    <div class="col-sm-8">
      <input name="institution" type="text" class="form-control" value="' . $applicant['institution'] . '" required>
    </div>
  </div>
  <div class="form-group row">
    <label class="col-sm-4 col-form-label">Skills</label>
    <div class="col-sm-8">
      <input name="skills" type="text" class="form-control" value="' . $applicant['skills'] . '" required>
    </div>
  </div>
  <div class="form-group row">
    <label class="col-sm-4 col-form-label">Years of Experience</label>
    <div class="col-sm-8">
      <input name="experience" type="number" class="form-control" value="' . $applicant['experience'] . '"  required>
    </div>
  </div>
  <div class="form-group row">
    &nbsp; &nbsp; (Leave resume blank if you don\'t intend to change it!)
    <label class="col-sm-4 col-form-label">Upload Resume</label>
    <div class="col-sm-8">
      <input name="resume" type="file" class="form-control">
    </div>
  </div>
  
  <div class="modal-footer">
      <button name="update-application" type="submit" class="btn btn-primary" href="login.html">Apply</button>
  </div>
';