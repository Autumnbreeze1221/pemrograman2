<?php
$con = mysqli_connect("localhost", "root", "", "lat_dbase");

if (!$con) {
    die('Could not connect: ' . mysqli_connect_error());
}

$firstname = mysqli_real_escape_string($con, $_POST['firstname']);
$lastname  = mysqli_real_escape_string($con, $_POST['lastname']);
$age       = intval($_POST['age']);

$sql = "INSERT INTO tbl_mhs (FirstName, LastName, Age) VALUES ('$firstname', '$lastname', $age)";

if (!mysqli_query($con, $sql)) {
    die('Error: ' . mysqli_error($con));
}

echo "1 record added";

mysqli_close($con);
?>