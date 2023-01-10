
<?php include 'menu.php'; ?>

<html>


<body>

<h1 style="font-family: Arial, Helvetica, sans-serif; font-size: 30px; text-align: center; color: #000000;">Ajouter Enseignant</h1>
<div style="width: 500px; margin: auto;">
  <form method="post" style="border:1px solid #ccc;background-color:#f1f1f1;padding:20px" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <label for="name" style="font-weight:bold;margin-bottom:10px;display:block;">Name:</label>
    <input type="text" style="width:100%;padding:12px;border:1px solid #ccc;margin-bottom:10px;box-sizing:border-box;" id="name" name="name"><br>
    <label for="email" style="font-weight:bold;margin-bottom:10px;display:block;">Email:</label>
    <input type="email" style="width:100%;padding:12px;border:1px solid #ccc;margin-bottom:10px;box-sizing:border-box;" id="email" name="email"><br>
    <label for="phone" style="font-weight:bold;margin-bottom:10px;display:block;">Phone Number:</label>
    <input type="text" style="width:100%;padding:12px;border:1px solid #ccc;margin-bottom:10px;box-sizing:border-box;" id="phone" name="phone"><br><br>
    <button type="submit" style="background-color:#4CAF50;border:none;color:white;padding:15px 32px;text-align:center;text-decoration:none;display:inline-block;font-size:16px;margin:4px 2px;cursor:pointer;">Add Teacher</button>
  </form>
</div>
<?php

  // Connect to the database
  $db_host = "localhost";
  $db_user = "root";
  $db_password = "";
  $db_name = "ensa_timetable_db";
  
  $conn = mysqli_connect($db_host, $db_user, $db_password, $db_name);
  
   // Check if the add teacher form was submitted
   if (isset($_POST["name"]) && isset($_POST["email"]) && isset($_POST["phone"])) {
    // Escape the entered data to prevent SQL injection attacks
    $name = mysqli_real_escape_string($conn, $_POST["name"]);
    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $phone = mysqli_real_escape_string($conn, $_POST["phone"]);
    
    // Insert the new teacher into the "teachers" table
    $query = "INSERT INTO teachers (name, email, phone) VALUES ('$name', '$email', '$phone')";
    mysqli_query($conn, $query);
    
    // Generate a random password
$password = bin2hex(random_bytes(8));

// Insert the new teacher into the "users" table
$query = "INSERT INTO users (username, password, user_type) VALUES ('$name', '$password', 'teacher')";
mysqli_query($conn, $query);

    
    // Redirect the user back to the page where they can view and manage the list of teachers
    header("Location: teachers.php");
  }
  
?>


</body>
</html>

