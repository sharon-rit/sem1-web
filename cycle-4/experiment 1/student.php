<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "studentDB";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$name= $_POST['name'];
$age= $_POST['age'];
$course= $_POST['course'];

$sqli = "INSERT INTO students(name,age,course)VALUES('$name','$age','$course')";
if ($conn->query($sqli) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sqli. "<br>" . $conn->error;
}



$sql = "SELECT id, name, age,course FROM students";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  echo "<table border='1'>
          <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Age</th>
            <th>Course</th>
          </tr>";
  while($row = $result->fetch_assoc()) {
    echo "<tr>
            <td>".$row["id"]."</td>
            <td>".$row["name"]."</td>
            <td>".$row["age"]."</td>
            <td>".$row["course"]."</td>
          </tr>";
  }
  echo "</table>";
} else {
  echo "0 results";
}

$conn->close();
?>
