<?php include 'menu.php'; ?>
<html>
<body>

<h1 style="font-family: Arial, Helvetica, sans-serif; font-size: 30px; text-align: center; color: #000000;">Ajouter un Module</h1>

<!-- Add Module form -->
<div style="width: 500px; margin: auto;">
  <form method="post" style="border:1px solid #ccc;background-color:#f1f1f1;padding:20px" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <label for="name" style="font-weight:bold;margin-bottom:10px;display:block;">Name:</label>
    <input type="text" style="width:100%;padding:12px;border:1px solid #ccc;margin-bottom:10px;box-sizing:border-box;" id="name" name="name"><br>
    <label for="semester" style="font-weight:bold;margin-bottom:10px;display:block;">Semester:</label>
    <select style="width:100%;padding:12px;border:1px solid #ccc;margin-bottom:10px;box-sizing:border-box;" id="semester" name="semester">
      <?php
      
        // Connect to the database
        $db_host = "localhost";
        $db_user = "root";
        $db_password = "";
        $db_name = "ensa_timetable_db";

        $conn = mysqli_connect($db_host, $db_user, $db_password, $db_name);

        // Retrieve the list of semesters from the "semesters" table
        $query = "SELECT * FROM semesters";
        $result = mysqli_query($conn, $query);

        // Generate an option for each semester
        while ($row = mysqli_fetch_array($result)) {
          $id = $row["semester_id"];
          $name = $row["semester_name"];
          echo "<option value='$id'>$name</option>";
        }
      ?>
    </select><br><br>
    <button type="submit" style="background-color:#4CAF50;border:none;color:white;padding:15px 32px;text-align:center;text-decoration:none;display:inline-block;font-size:16px;margin:4px 2px;cursor:pointer;">Add Module</button>
  </form>
</div>

<?php
  // Connect to the database
  $db_host = "localhost";
  $db_user = "root";
  $db_password = "";
  $db_name = "ensa_timetable_db";
  
  $conn = mysqli_connect($db_host, $db_user, $db_password, $db_name);
  
  // Check if the add module form was submitted
  if (isset($_POST["name"]) && isset($_POST["semester"])) {
    // Escape the entered data to prevent SQL injection attacks
    $name = mysqli_real_escape_string($conn, $_POST["name"]);
    $semester = mysqli_real_escape_string($conn, $_POST["semester"]);
    
    // Insert the new module into the "modules" table
    $query = "INSERT INTO modules (module_name, semester_id) VALUES ('$name', '$semester')";
    mysqli_query($conn, $query);
  }
?>

</body>
</html>
