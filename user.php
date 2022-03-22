<?php

include("connect.php");

$id = $_GET ['id'];

$sql = " SELECT * FROM userinfo WHERE id=".$id;
$result = mysqli_query($connect, $sql);
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);

$Fname = $row['Fname'];
$Lname = $row['Lname'];
$Gender = $row['Gender'];
$Age = $row['Age'];
$Email = $row['Email'];


echo $Fname;
echo "<br />";
echo $Lname;
echo "<br />";
echo $Gender;
echo "<br />";
echo $Age;
echo "<br />";
echo $Email;
echo "<br />";




?>






    