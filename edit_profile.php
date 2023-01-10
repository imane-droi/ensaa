<?php
  // Connect to the database
  $db_host = "localhost";
  $db_user = "root";
  $db_password = "";
  $db_name = "ensa_timetable_db";
  
  $conn = mysqli_connect($db_host, $db_user, $db_password, $db_name);
  
  // Check if the edit profile form was submitted
  if (isset($_POST["password"]) || isset($_FILES["profile-pic"])) {
    // Escape the entered password to prevent SQL injection attacks
    $password = mysqli_real_escape_string($conn, $_POST["password"]);
    
    // If a new profile picture was uploaded, move it to the desired location and get its file path
    if (isset($_FILES["profile-pic"]) && $_FILES["profile-pic"]["error"] == 0) {
      $upload_dir = "uploads/";
      $upload_file = $upload_dir . basename($_FILES["profile-pic"]["name"]);
      move_uploaded_file($_FILES["profile-pic"]["tmp_name"], $upload_file);
      $profile_pic = $upload_file;
    }
    
    // Update the password and profile picture in the database
    if (isset($password) && !empty($password)) {
      $query = "UPDATE users SET password='$password' WHERE user_type='admin'";
      mysqli_query($conn, $query);
    }
    if (isset($profile_pic) && !empty($profile_pic)) {
      $query = "UPDATE users SET profile_pic='$profile_pic' WHERE user_type='admin'";
      mysqli_query($conn, $query);
    }
    
    // Redirect the user back to the profile page
    header("Location: admin_profile.php");
  }
?>
