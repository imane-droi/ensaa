<html>
<body>

<h1>Add Semester</h1>

<!-- Add Semester form -->
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
  <label for="name">Name:</label><br>
  <input type="text" id="name" name="name"><br><br>
  <button type="submit">Add Semester</button>
</form>

<?php
  // Connect to the database
  $db_host = "localhost";
  $db_user = "root";
  $db_password = "";
  $db_name = "ensa_timetable_db";
  
  $conn = mysqli_connect($db_host, $db_user, $db_password, $db_name);
  
  // Check if the add semester form was submitted
  if (isset($_POST["name"])) {
    // Escape the entered data to prevent SQL injection attacks
    $name = mysqli_real_escape_string($conn, $_POST["name"]);
    
    // Insert the new semester into the "semesters" table
    $query = "INSERT INTO semesters (semester_name) VALUES ('$name')";
    mysqli_query($conn, $query);
  }
?>

</body>
</html>
