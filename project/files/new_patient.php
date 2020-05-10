<!DOCTYPE html>
<html>
<body>
<head>
  <title>New Patient Form</title>
  <link rel='stylesheet' href='style.css'>
</head>
<ul>
  <li><a href='patients.php'> Patients </a></li>
  <li><a class='active' href='new_patient.php'> New Patient Form </a></li>
</ul>
<?php
$config = parse_ini_file('/var/secure/config.ini');
$id = $_POST['id'];

$conn = mysqli_connect($config['server'],$config['username'],$config['password'],$config['db']);
if ($conn->connect_error) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * from patients WHERE id = '$id'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0){
    while($row = mysqli_fetch_assoc($result)){
        $sArray[] = $row;
    }
}

$c = count($sArray, 0);
?>
<form class='form-vertical' method='post' action='new_query.php'>
<table>
<tbody>
  <tr>
    <td>First Name</td>
    <td><input type='text' name='fname' required></td>
  </tr>
  <tr>
    <td>Last Name</td>
    <td><input type='text' name='lname' required></td>
  </tr>
  <tr>
    <td>Age</td>
    <td><input type='text' name='age' required></td>
  </tr>
  <tr>
    <td>Reason for Stay</td>
    <td><input type='text' name='diag' required></td>
  </tr>
  <tr>
    <td>Current Treatment</td>
    <td><input type='text' name='treat' required></td>
  </tr>
  <tr>
    <td>Location</td>
    <td><input type='text' name='loc' required></td>
  </tr>
  <tr>
    <td>Initial Check-in</td>
    <td><input type='date' name='date' required></td>
  </tr>
  <tr>
    <td>Weight (lbs)</td>
    <td><input type='text' name='weight' required></td>
  </tr>
  <tr>
    <td>Allergies</td>
    <td><input type='text' name='aller' required></td>
  </tr>
  <tr>
    <td>Medical History</td>
    <td><textarea class='largeb' type='textarea' name='hist'></textarea></td>
  </tr>
  <tr>
    <td>Assessment</td>
    <td><textarea class='largeb' name='assess'></textarea></td>
  </tr>
  <tr>
    <td>Notes</td>
    <td><textarea class='largeb' type='textarea' name='notes'></textarea></td>
  </tr>
</tbody>
</table>
<input type='submit' value='Submit'>
</form>
</body>
</html>
