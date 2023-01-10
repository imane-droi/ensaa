<?php
  // Connect to the database
  $db_host = "localhost";
  $db_user = "root";
  $db_password = "";
  $db_name = "ensa_timetable_db";
  
  $conn = mysqli_connect($db_host, $db_user, $db_password, $db_name);
  
  // Check if the login form was submitted
  if (isset($_POST["username"]) && isset($_POST["password"])) {
    // Escape the entered login credentials to prevent SQL injection attacks
    $username = mysqli_real_escape_string($conn, $_POST["username"]);
    $password = mysqli_real_escape_string($conn, $_POST["password"]);
    
    // Query the database to verify the login credentials
    $query = "SELECT user_type FROM users WHERE username='$username' AND password='$password'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    
    // If the login is successful, redirect the user to their respective profile page
    if (mysqli_num_rows($result) > 0) {
      if ($row["user_type"] == "admin") {
        header("Location: admin_profile.php");
      } else {
        header("Location: teacher_profile.php");
      }
    } else {
      // If the login is unsuccessful, display an error message
      echo "Invalid login credentials. Please try again.";
    }
  }
?>
<form id="login-form" method="post" action="index.php">
  <label for="username">Username:</label><br>
  <input type="text" id="username" name="username"><br>
  <label for="password">Password:</label><br>
  <input type="password" id="password" name="password"><br><br>
  <button type="submit">Log In</button>
</form> 
