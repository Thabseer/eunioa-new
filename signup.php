<?php

$servername="localhost";
$username="root";
$password="";
$database_name="eunoiadb";

$conn=mysqli_connect($servername,$username,$password,$database_name);

if(!$conn)
{
    die("Connection failed: ".mysqli_connect_error());
}
if(isset($_POST['submit']))
{
    $email=$_POST['email'];
    $pass=$_POST['password'];

    $sql_query = "INSERT INTO login (email,password) VALUES ('$email', '$pass')";
    if (mysqli_query($conn, $sql_query))
    {
        readfile('success.html');
    }
    else
    {
    echo "Error: " . mysqli_error($conn);
    }
    mysqli_close($conn);
}
?>