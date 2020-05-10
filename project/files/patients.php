<!DOCTYPE html>
<html>
<body>
<head>
  <title>Patients</title>
  <link rel='stylesheet' href='style.css'>
</head>
<ul>
  <li><a class='active' href='patients.php'> Patients </a></li>
  <li><a href='new_patient.php'> New Patient Form </a></li>
</ul>
<?php
$config = parse_ini_file('/var/secure/config.ini');

$conn = mysqli_connect($config['server'],$config['username'],$config['password'],$config['db']);
if ($conn->connect_error) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * FROM patients";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0){
    while($row = mysqli_fetch_assoc($result)){
        $sArray[] = $row;
    }
}

$c = count($sArray, 0);
?>
<table>
  <tr>
    <th>Patient Name</th>
    <th>Age</th>
    <th>Reason for Stay</th>
    <th>Current Treatment</th>
    <th>Location</th>
    <th>Initial Check-in</th>
    <th>Additional Info</th>

<?php
for($x = 0; $x < $c; $x++){
		echo "<tr><td>" . $sArray[$x]['fname'] . " " . $sArray[$x]['lname'] . "</td><td>" . $sArray[$x]['age'] .
    "</td><td>" . $sArray[$x]['currentdiag'] . "</td><td>" . $sArray[$x]['currenttreatment'] .
    "</td><td>" . $sArray[$x]['location'] . "</td><td>" . $sArray[$x]['initialcheckin'] .
    "</td><td>" . "<form method='post' action='additional.php'><input type='hidden' name='id' value=" . $sArray[$x]['id'] .
    "><input type='submit' value='Full information on ". $sArray[$x]['fname'] . " " . $sArray[$x]['lname'] . "'></form>"
    . "</td></tr>";
	}
?>
</table>
</body>
</html>
