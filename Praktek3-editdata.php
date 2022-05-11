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
// Take record in the url
$sql= "SELECT * FROM pegawai WHERE NIK=$_GET[key]";
$result= mysqli_query($conn, $sql);
$row=mysqli_fetch_array($result);

?>
<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<body>
<h1>Ubah Data</h1>
<!-- Make form to change record -->
<form method="POST" action="#">
  <table width="400" cellpadding="2" cellspacing="2">
    <tr>
      <td width="130">NIK</td>
      <td><input type="text" name="nik" value="<?php echo $row['NIK'] ?>" required></td>
    </tr>
    <tr>
      <td width="130">Nama</td>
      <td><input type="text" name="nama" value="<?php echo $row['Nama']?>" required></td>
    </tr>
    <tr>
      <td width="130">Alamat</td>
      <td><input type="text" name="alamat" value="<?php echo $row['Alamat']?>" required></td>
    </tr>
    <tr>
      <td>
        <input type="submit" name="btnUbah" value="Ubah">
      </td>
    </tr>
  </table>
</form>
<!-- Turn back to Praktek3-simpandanhapus.php -->
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

if(isset($_POST['btnUbah'])){

  // Upgrade record
  $sql= "UPDATE pegawai SET NIK='$_POST[nik]', Nama='$_POST[nama]', Alamat='$_POST[alamat]' WHERE IDJabatan='$_GET[key]'";
  if(mysqli_query($conn, $sql)){
    echo "Data berhasil diubah";
    //Move to Praktek3-simpandanhapus.php
    echo "<meta HTTP-EQUIV='REFRESH' content='1; url=Praktek3-simpandanhapus.php'>";
  } else{
    echo "Error: ". $sql ."<br>". mysqli_error($conn);
  }
  // Close Connection
  mysqli_close($conn);  
}

?>