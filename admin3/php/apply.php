<?php
include('config.php');

$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$address = $_POST['address'];
$qualification = $_POST['qualification'];
$institution = $_POST['institution'];
$skills = $_POST['skills'];
$experience = $_POST['experience'];

$resume = $_FILES["resume"]["name"];
$tempname = $_FILES["resume"]["tmp_name"];
$resume_folder = "../assets/docs/" . $resume;

if (isset($_POST['submit-application'])) {
  // This uploads the new resume
  move_uploaded_file($tempname, $resume_folder);

  $query = "INSERT INTO applicants (name, email, phone, address, qualification, institution, skills, experience, resume)
    VALUES ('$name', '$email', '$phone', '$address', '$qualification', '$institution', '$skills', '$experience', '$resume')";

  if (mysqli_query($conn, $query)) {
    header('Location: ../index.php?alert=true&type=upload');
  } else {
    header('Location: ../index.php?alert=false&type=upload');
  }
}

if (isset($_POST['update-application'])) {
  $id = $_POST['id'];

  // We check if new resume is uploaded
  if ($resume == '') {
    $query = "UPDATE applicants SET name = '$name', email = '$email', phone = '$phone', address = '$address', 
    qualification = '$qualification', institution = '$institution', skills = '$skills', experience = '$experience' WHERE id = $id";
  } else {
    // This is to get the old resume file name
    $q = "SELECT resume FROM applicants WHERE id = $id";
    $old_resume = mysqli_fetch_array(mysqli_query($conn, $q))[0];
    $old_resume = '../assets/docs/' . $old_resume;

    // This checks if old resume exists and deletes it if it exist
    if (file_exists($old_resume)) {
      unlink("$old_resume");
    }

    // This uploads the new resume
    move_uploaded_file($tempname, $resume_folder);

    $query = "UPDATE applicants SET name = '$name', email = '$email', phone = '$phone', address = '$address', 
    qualification = '$qualification', institution = '$institution', skills = '$skills', experience = '$experience', 
    resume = '$resume' WHERE id = $id";
  }

  if (mysqli_query($conn, $query)) {
    header('Location: ../index.php?alert=true&type=edit');
  } else {
    header('Location: ../index.php?alert=false&type=edit');
  }
}

?>