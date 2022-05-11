<?php
// Declaration server, username, and password
$servername="localhost";
$username="root";
$password="";

// Create Connection
$conn = mysqli_connect($servername, $username, $password);

// Check Connection
if(!$conn){
  die("Connection failed: ". mysqli_connect_error());
}

// Create Database
$sql= "CREATE DATABASE tamu";
if(mysqli_query($conn, $sql)){
  echo "Database created succesfully";
} else{
  echo "Error creating database". mysqli_error($conn);
}

// Stop Connection
mysqli_close($conn);
?>