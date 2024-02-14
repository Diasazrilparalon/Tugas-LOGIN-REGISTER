<?php
include 'koneksi.php';
$username = $_POST['username'];
$password= $_POST['password'];
$email = $_POST['email'];
$nama= $_POST['namalengkap'];
$alamat = $_POST['alamat'];

$sql = "INSERT INTO user (username, password, email, namalengkap, alamat)
VALUE ('$username','$password', '$email', '$nama', '$alamat')";
$query = mysqli_query($conn, $sql);

if($sql){

echo"<script>

alert('Pendaftaran Akun Berhasil');

</script>";

header('Location:login.php?status=sukses');

}else{

echo"<script>

alert('Pendaftaran Akun Gagal');

</script>";

header('Location:register.php?status=gagal');

}

?>