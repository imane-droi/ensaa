<?php include 'menu.php'; ?>
<html>
<body>

<h1 style="font-family: Arial, Helvetica, sans-serif; font-size: 30px; text-align: center; color: #000000;">Ajouter filière</h1>
<div style="width: 500px; margin: auto;">
  <form method="post" style="border:1px solid #ccc;background-color:#f1f1f1;padding:20px" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <label for="name" style="font-weight:bold;margin-bottom:10px;display:block;">Name:</label>
    <input type="text" style="width:100%;padding:12px;border:1px solid #ccc;margin-bottom:10px;box-sizing:border-box;" id="name" name="name"><br>
    <label for="id" style="font-weight:bold;margin-bottom:10px;display:block;">ID:</label>
    <input type="text" style="width:100%;padding:12px;border:1px solid #ccc;margin-bottom:10px;box-sizing:border-box;" id="id" name="id"><br><br>
    <button type="submit" style="background-color:#4CAF50;border:none;color:white;padding:15px 32px;text-align:center;text-decoration:none;display:inline-block;font-size:16px;margin:4px 2px;cursor:pointer;">Add Program</button>
  </form>
</div>
<?php
  // Connect to the database
  $db_host = "localhost";
  $db_user = "root";
  $db_password = "";
  $db_name = "ensa_timetable_db";
  
  $conn = mysqli_connect($db_host, $db_user, $db_password, $db_name);
  
  // Check if the add program form was submitted
  if (isset($_POST["name"]) && isset($_POST["id"])) {
    // Escape the entered data to prevent SQL injection attacks
    $name = mysqli_real_escape_string($conn, $_POST["name"]);
    $id = mysqli_real_escape_string($conn, $_POST["id"]);
    
    // Insert the new program into the "programs" table
    $query = "INSERT INTO programs (program_name, program_id) VALUES ('$name', '$id')";
    mysqli_query($conn, $query);
  }
?>

</body>
</html>
