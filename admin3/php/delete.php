<?php
include('config.php');
$id = $_GET['id'];

$q = "SELECT resume FROM applicants WHERE id = $id";
$resume = mysqli_fetch_array(mysqli_query($conn, $q))[0];
$resume = '../assets/docs/'.$resume;

if (file_exists($resume)) {
  // This deletes the resume file from the directory
  unlink("$resume");
}

$query = "DELETE FROM applicants WHERE id = $id";

if (mysqli_query($conn, $query)) {
  $sn = 1;
  $query_all = mysqli_query($conn, "SELECT * FROM applicants ORDER BY id");

  // This is to iterate the id in ascending order
  while ($row = mysqli_fetch_assoc($query_all)) {
    mysqli_query($conn, "UPDATE applicants SET id = $sn WHERE id = " . $row['id']);
    $sn++;
  }

  // This is to reset the next auto-increment value 
  mysqli_query($conn, "ALTER TABLE applicants MODIFY id int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=$sn");

  // This is to rediect to the dashboard and set the alert to display success
  header('Location: ../index.php?alert=true&type=delete');
} else {
  // This is to rediect to the dashboard and set the alert to display failure
  header('Location: ../index.php?alert=false&type=delete');
}

// echo $resume;

?>