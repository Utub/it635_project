<?php
$config = parse_ini_file('/var/secure/config.ini');
if(isset($_POST)){
  $fname = $_POST['fname'];
  $lname = $_POST['lname'];
  $age = $_POST['age'];
  $diag = $_POST['diag'];
  $treat = $_POST['treat'];
  $loc = $_POST['loc'];
  $date = $_POST['date'];
  $weight = $_POST['weight'];
  $aller = $_POST['aller'];
  $hist = $_POST['hist'];
  $assess = $_POST['assess'];
  $notes = $_POST['notes'];
  $conn = mysqli_connect($config['server'],$config['username'],$config['password'],$config['db']);
  if ($conn->connect_error) {
      die("Connection failed: " . mysqli_connect_error());
  }

  $sql = "INSERT INTO patients(fname, lname, age, currentdiag, currenttreatment, location, initialcheckin, weight, allergies, medicalh, assessment, notes) values('$fname','$lname','$age','$diag','$treat','$loc','$date','$weight','$aller','$hist','$assess','$notes')";
  $result = mysqli_query($conn, $sql);
  header("Location: patients.php");
}

?>
