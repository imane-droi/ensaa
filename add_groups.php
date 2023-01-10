<html>
<body>
<h1>Ajouter un Groupe</h1>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
  <label for="group-name">Group Nom:</label><br>
  <input type="text" id="group-name" name="group-name"><br>
  <label for="group-type">Groupe Type:</label><br>
  <select id="group-type" name="group-type">
    
    <option value="cours">Groupe de cours</option>
    <option value="td">Groupe de TD</option>
    <option value="tp">Groupes de TP</option>
  </select><br>
  <label for="module">Module:</label><br>
  <select id="module" name="module">
    <!-- Add options for each module -->
    <?php
      // Connect to the database
      $db_host = "localhost";
      $db_user = "root";
      $db_password = "";
      $db_name = "ensa_timetable_db";

  $conn = mysqli_connect($db_host, $db_user, $db_password, $db_name);

  // Retrieve the list of modules from the "modules" table
  $query = "SELECT * FROM modules";
  $result = mysqli_query($conn, $query);

  // Add an option element for each module
  while ($row = mysqli_fetch_array($result)) {
    $module_id = $row["module_id"];
    $module_name = $row["module_name"];
    echo "<option value='$module_id'>$module_name</option>";
  }
?>
</select><br>
<label for="program">Filière:</label><br>
<select id="program" name="program">
<!-- Add options for each program -->
<?php
// Connect to the database
$db_host = "localhost";
$db_user = "root";
$db_password = "";
$db_name = "ensa_timetable_db";


  $conn = mysqli_connect($db_host, $db_user, $db_password, $db_name);

  // Retrieve the list of programs from the "programs" table
  $query = "SELECT * FROM programs";
  $result = mysqli_query($conn, $query);

  // Add an option element for each program
  while ($row = mysqli_fetch_array($result)) {
    $program_id = $row["program_id"];
    $program_name = $row["program_name"];
    echo "<option value='$program_id'>$program_name</option>";
  }
?>
</select><br><br>
<button type="submit">Ajouter</button>

</form>
<?php
  // Check if the form was submitted
  if (isset($_POST["name"]) && isset($_POST["type"]) && isset($_POST["module"]) && isset($_POST["program"])) {
    // Escape the entered data to prevent SQL injection attacks
    $name = mysqli_real_escape_string($conn, $_POST["name"]);
    $type = mysqli_real_escape_string($conn, $_POST["type"]);
    $module = mysqli_real_escape_string($conn, $_POST["module"]);
    $program = mysqli_real_escape_string($conn, $_POST["program"]);
    
    
    // Insert the new group into the "groups" table
    $query = "INSERT INTO groups (group_name, group_type, module_id, program_id) VALUES ('$name', '$type', '$module', '$program')";
    mysqli_query($conn, $query);
    
    // Redirect the user back to the page where they can view and manage the list of groups
    header("Location: groups.php");
    }
    ?>