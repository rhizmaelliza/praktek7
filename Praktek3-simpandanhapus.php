<!DOCTYPE html>
<html>
<head>
  <title>Data Pegawai Kecamatan</title>
</head>
<body>
<center><h1>Data Pegawai Kecamatan</h1></center>
<?php
// Declaration servername, username, password, and database
$servername="localhost";
$username="root";
$password="";
$dbname="kecamatan";

// Create Connection
$conn = mysqli_connect ($servername, $username, $password, $dbname);

// Check Connection
if(!$conn){
  die("Connection failed: ". mysqli_connect_error());
}

// take all record in pegawaitable
$sql= "SELECT * FROM pegawai";
$result= mysqli_query($conn, $sql);

if(mysqli_num_rows($result) > 0){
  // Output
  //'?key=$row[NIK]' used for write selected NIK and show to url
  while ($row = mysqli_fetch_assoc($result)) {
    echo "================================";
    echo "<br>";
    echo "NIK: ". $row["NIK"] ."<br>Nama: ". $row["Nama"] ."<br>Alamat: ". $row["Alamat"] ."<br>";
    echo "<tr>
    <td><a href='Praktek3-editdata.php?key=$row[NIK]'>ubah</a></td>
    &emsp;|&emsp;
    <td><a href='?key=$row[NIK]'>Hapus</a></td>
    </tr><br>";
  }
} else{
  echo "Empty";
}
// go to next page
echo"<br><br><form action='Praktek3-tambahdata.php'><input type='submit' name='btnTambah' value='Tambah Data'></form>";

mysqli_close($conn);
?>
</body>
</html>
<?php
// Declaration servername, username, password, and database
$servername="localhost";
$username="root";
$password="";
$dbname="kecamatan";

// Create Connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check Connection
if(!$conn){
  die("Connection failed: ". mysqli_connect_error());
}

if(isset($_GET['key'])){

  // Delete record pegawai depend on selected NIK
  $sql= "DELETE FROM pegawai WHERE NIK='$_GET[key]'";
  if(mysqli_query($conn, $sql)){
    echo "Data berhasil dihapus";
    // Re-open Praktek3-simpandanhapus.php
    echo "<meta HTTP-EQUIV='REFRESH' content='1; url=Praktek3-simpandanhapus.php'>";
  } else{
    echo "Error: ". $sql ."<br>". mysqli_error($conn);
  }
  // Close Connection
  mysqli_close($conn);  
}

?>