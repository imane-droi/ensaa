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
    
    // Redirect the admin back to the profile page
    header("Location: admin_profile.php");
  }
?>
<head>
  <style>

#edit-profile-form {
  padding: 25px;
  background-color: #F2F2F2;
  margin: 0 auto;
  width: 300px;
  text-align: center;
  border: 1px solid #CCC;
}

#edit-profile-form label {
  font-size: 1.2em;
}

#edit-profile-form input {
  padding: 10px;
  margin: 10px 0;
  width: 100%;
  border: 1px solid #CCC;
}

#edit-profile-form button {
  background-color: #4CAF50;
  color: white;
  padding: 10px 20px;
  margin: 10px 0;
  border: none;
}
 

div {
  width: 300px;
  height: 100%;
  position: fixed;
  top: 0;
  left: 0;
  background-color: #F1F1F1;
  padding: 20px;
  box-sizing: border-box;
  border-right: 1px solid #CCC;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

ul {
  list-style-type: none;
  padding: 0;
  margin: 0;
  display: flex;
  flex-direction: column;
  align-items: left;
  justify-content: center;
}

ul li {
  padding: 5px 0;
  margin: 20px 0;
}

ul li a {
  font-size: 1.1em;
  color: #2B2B2B;
  text-decoration: none;
}

ul li a:hover {
  color: #4CAF



  </style>
</head>

<div style="width:200px; height:100%; position:fixed; top:0; left:0; background-color:#f1f1f1;">
  <ul style="list-style-type:none; padding:0; margin:0;">
    <li><a href="edit_profile.php">Modifier votre profil</a></li>
    <li><a href="add_teachers.php">Ajouter enseignants</a></li>
    <li><a href="add_programs.php">Ajouter les filières</a></li>
    <li><a href="add_semesters.php">Ajouter les semestres</a></li>
    <li><a href="add_modules.php">Ajouter les modules</a></li>
    <li><a href="add_groups.php">Ajouter les groupes</a></li>
    <li><a href="add_rooms.php">Ajouter les salles</a></li>
    <li><a href="dashboard.php">Le tableau de bord</a></li>
    <li><a href="index.php">logout</a></li>
  </ul>
</div>

<form id="edit-profile-form" method="post" action="edit_profile.php" enctype="multipart/form-data">
  <label for="password">New Password:</label><br>
  <input type="password" id="password" name="password"><br><br>
  <label for="profile-pic">New Profile Picture:</label><br>
  <input type="file" id="profile-pic" name="profile-pic"><br><br>
  <button type="submit">Update Profile</button>
</form> 
