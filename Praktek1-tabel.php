<?php
// Declaration server, username, password, and database
$servername="localhost";
$username="root";
$password="";
$dbname="tamu";

// Create Connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check Connection
if(!$conn){
  die("Connection failed: ". mysqli_connect_error());
}

// Create Table
$sql= "CREATE TABLE buku_tamu(
id_bt INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
nama VARCHAR(200) NOT NULL,
email VARCHAR(50) NOT NULL,
isi text
)";
if(mysqli_query($conn, $sql)){
  echo "Table created succesfully";
} else{
  echo "Error creating table". mysqli_error($conn);
}

// Stop Connection
mysqli_close($conn);
?>