<?php

require ('connection.php');
$fname = $_POST['name'];
$St_lname = $_POST['St_lname'];
$sap = $_POST['sap'];
$Semester = $_POST['Semester'];
// $email = $_POST['email'];

$sql = "INSERT INTO std (fname, lname, sap_id, semester) VALUES ('$fname', '$St_lname', '$sap', '$Semester')";

if(isset($_POST["register"])){
    if(mysqli_query($conn,$sql))
    {
        echo"Data Insert!";
    }
    else
    {
        echo"Error";
    }
}

?>