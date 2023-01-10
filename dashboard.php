<html>

<head>
    <style>
        /* Add some styling to the table */
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid #dddddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #dddddd;
        }
    </style>
</head>

<body>

<h1>Dashboard</h1>

<!-- Rooms and capacity section -->
<h2>Rooms and Capacity</h2>
<table>
  <tr>
    <th>Room Name</th>
    <th>Capacity</th>
    <th>Occupied</th>
  </tr>
  <?php
    // Connect to the database
    $db_host = "localhost";
    $db_user = "root";
    $db_password = "";
    $db_name = "ensa_timetable_db";
  
    $conn = mysqli_connect($db_host, $db_user, $db_password, $db_name);
  
    // Retrieve the number of rooms and their total capacity
    $query = "SELECT room_name, capacity FROM rooms";
    $result = mysqli_query($conn, $query);
  
    // Display the rooms and capacity in a table
    while ($row = mysqli_fetch_array($result)) {
      $name = $row["room_name"];
      $capacity = $row["capacity"];
      
      echo "<tr>";
      echo "<td>$name</td>";
      echo "<td>$capacity</td>";
      
      echo "</tr>";
    }
  ?>
</table>

<!-- Time Table section -->
<h2>Time Table</h2>
<table>
  <tr>
    <th>Module</th>
    <th>Teacher</th>
    <th>Group</th>
    <th>Room</th>
    <th>Start Time</th>
    <th>End Time</th>
    <th>Day</th>
  </tr>
  <?php
    // Connect to the database
    $db_host = "localhost";
    $db_user = "root";
    $db_password = "";
    $db_name = "ensa_timetable_db";

    $conn = mysqli_connect($db_host, $db_user, $db_password, $db_name);

    // Retrieve the time table data from the "timetable" table
    $query = "SELECT module.module_name, teachers.name, groups.group_name, rooms.room_name, timetable.start_time, timetable.end_time, timetable.day
    FROM timetable
    JOIN modules module ON timetable.module_id = module.module_id
    JOIN teachers ON timetable.teacher_id = teachers.teacher_id
    JOIN groups ON timetable.group_id = groups.group_id
    JOIN rooms ON timetable.room_id = rooms.room_id;";
    $result = mysqli_query($conn, $query);

    // Display the time table data in a table
    while ($row = mysqli_fetch_array($result)) {
        $module = $row["module_name"];
        $teacher = $row["name"];
        $group = $row["group_name"];
        $room = $row["room_name"];
        $start_time = $row["start_time"];
        $end_time = $row["end_time"];
        $day = $row["day"];
        echo "<tr>";
        echo "<td>$module</td>";
        echo "<td>$teacher</td>";
        echo "<td>$group</td>";
        echo "<td>$room</td>";
        echo "<td>$start_time</td>";
        echo "<td>$end_time</td>";
        echo "<td>$day</td>";
        echo "</tr>";
        }
        echo "</table>";
        ?>
        
        </body>
        </html>
        <?php
            mysqli_close($conn);
        ?>


<!-- Teachers section -->

<h2>Teachers</h2>
<table>
  <tr>
    <th>Name</th>
    <th>Email</th>
    <th>Phone</th>
  </tr>
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
while ($row = mysqli_fetch_array($result)) {
  $name = $row["name"];
  $email = $row["email"];
  $phone = $row["phone"];
  echo "<tr>";
  echo "<td>$name</td>";
  echo "<td>$email</td>";
  echo "<td>$phone</td>";
  echo "</tr>";
}
?>
