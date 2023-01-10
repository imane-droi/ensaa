<?php
  // Connect to the database
  $db_host = "localhost";
  $db_user = "root";
  $db_password = "";
  $db_name = "ensa_timetable_db";
  
  $conn = mysqli_connect($db_host, $db_user, $db_password, $db_name);
  
  // Check if the add room form was submitted
  if (isset($_POST["name"]) && isset($_POST["capacity"])) {
    // Escape the entered data to prevent SQL injection attacks
    $name = mysqli_real_escape_string($conn, $_POST["name"]);
    $capacity = mysqli_real_escape_string($conn, $_POST["capacity"]);
    
    // Insert the new room into the "rooms" table
    $query = "INSERT INTO rooms (room_name, capacity) VALUES ('$name', '$capacity')";
    mysqli_query($conn, $query);
    
    // Redirect the user back to the page where they can view and manage the list of rooms
    header("Location: add_rooms.php");
  }
?>

<!-- Add Room form -->
<h1>Ajouter une salle</h1>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
  <label for="name">Nom de la salle:</label><br>
  <input type="text" id="name" name="name"><br>
  <label for="capacity">Capacité d'accueil:</label><br>
  <input type="text" id="capacity" name="capacity"><br><br>
  <button type="submit">Ajouter</button>
</form>
