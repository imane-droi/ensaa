<html>

<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>
<body>

<h1>Teachers</h1>

<!-- Add Teacher button -->
<a class="btn btn-primary" style="background-color:#4CAF50;border:none;color:white;padding:15px 32px;text-align:center;text-decoration:none;display:inline-block;font-size:16px;margin:4px 2px;cursor:pointer;" href="add_teachers.php">Add Teacher</a>

<?php
  // Connect to the database
  $db_host = "localhost";
  $db_user = "root";
  $db_password = "";
  $db_name = "ensa_timetable_db";
  
  $conn = mysqli_connect($db_host, $db_user, $db_password, $db_name);
  
  // Retrieve the list of teachers from the "teachers" table
  $query = "SELECT * FROM teachers";
  $result = mysqli_query($conn, $query);
  
  // Display the list of teachers in a table
  echo "<table>";
  echo "<tr><th>Name</th><th>Email</th><th>Phone</th></tr>";
  while ($row = mysqli_fetch_array($result)) {
    $id = $row["teacher_id"];
    $name = $row["name"];
    $email = $row["email"];
    $phone = $row["phone"];
    echo "<tr>";
    echo "<td>$name</td>";
    echo "<td>$email</td>";
    echo "<td>$phone</td>";
    
  }
echo "</table>";
?>


</body>

</html>
