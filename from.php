<?php
$servername="localhost";
$username="root";
$password="";
$database_name="eunoiadb";

$conn=mysqli_connect($servername,$username,$password,$database_name);

if($conn)
{
    die("Connetion failed: ",mysqli_connect_error());
}
if(isset($_POST['save']))
{
    $name=$_POST['Name'];
    $phone=$_POST['Phone'];
    $place=$_POST['Place'];
    $prgms=$_POST['Programms'];
    $pkgs=$_POST['Packages'];
}
$sql_query "INSERT INTO booking details( Name, Phone, Place, Programms, Packages)
VALUES ('$name', '$phone', '$place', '$prgms', '$pkgs')";
if (mysqli_query($conn, $sql_query))
{
echo "New Details Entry inserted successfully !";
}
else
{
echo "Error: " . $sql mysqli_error($conn);
****
}
mysqli_close($conn);