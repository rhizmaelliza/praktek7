<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<body>
<h1>Tambah Data Baru</h1>
<!-- Make form pegawai -->
<form method="POST" action="#">
  <table width="400" cellpadding="2" cellspacing="2">
    <tr>
      <td width="130">NIK</td>
      <td><input type="text" name="nik" required></td>
    </tr>
    <tr>
      <td width="130">Nama</td>
      <td><input type="text" name="nama" required></td>
    </tr>
    <tr>
      <td width="130">Alamat</td>
      <td><input type="text" name="alamat" required></td>
    </tr>
    <tr>
      <td>
        <input type="submit" name="tmblSimpan" value="Simpan">
        <input type="reset" name="tmblReset" value="Reset">
      </td>
    </tr>
  </table>
</form>
<!-- When click batal button move to Praktek3-simpandanhapus.php -->
<form action="Praktek3-simpandanhapus.php">
    <input type="submit" value="Batal" />
</form>
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

// If clicl tmblSimpan 
if(isset($_POST['tmblSimpan'])){

  // Create record
  $sql= "INSERT INTO pegawai(NIK, Nama, Alamat, IDJabatan) VALUES ('$_POST[nik]', '$_POST[nama]', '$_POST[alamat]', '1')";
  if(mysqli_query($conn, $sql)){
    echo "New record created succesfully";
    // Move to Praktek3-simpandanhapus.php
    echo "<meta HTTP-EQUIV='REFRESH' content='1; url=Praktek3-simpandanhapus.php'>";
  } else{
    echo "Error: ". $sql ."<br>". mysqli_error($conn);
  }
  // Close Connection
  mysqli_close($conn);  
}

?>