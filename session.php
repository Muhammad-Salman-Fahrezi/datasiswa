<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
<h1>Masukan Data Siswa</h1>
<form action="" method="post">
    <label for="nama"> NAMA :</label>
    <input type="text" id="nama" name="nama"><br>
    <label for="nama">NIS :</label>
    <input type="number" id="nis" name="nis"><br>
    <label for="rayon">RAYON :</label>
    <input type="text" id="rayon" name="rayon"><br></br>
    <button type="submit" name="kirim" value="kirim"><i class='bx bx-plus' ></i>SUBMIT</button>
    <button type="submit" name="kirim" value="cetak"><a style="color : #ffff" href="cetak.php">CETAK</a></button>
    <form id="formHapusSemua" action="" method="post">
    <button type="submit" name="hapus_semua" onclick="return confirm('Apakah Anda yakin ingin menghapus semua data?')">Hapus Semua Data</button>
</form>
    </form>
    


<?php
session_start();

if(!isset($_SESSION['dataSiswa'])){
    $_SESSION['dataSiswa']= array ();
}

if(isset($_POST['nama']) && isset($_POST['nis']) && isset($_POST['rayon'])){
    $data = array(
        'nama' => $_POST['nama'],
        'nis' => $_POST['nis'],
        'rayon' => $_POST['rayon'],
    );
    array_push($_SESSION['dataSiswa'], $data);
};

// proses penghapusan data siswa
if(isset($_GET['hapus'])) {
    $index = $_GET['hapus'];
    unset($_SESSION['dataSiswa'][$index]);
    //redirect kembali ke halaman ini setelah penghapusan
    header("location: http://localhost/data siswa/session.php");
    exit;
    
}

if (isset($_POST['hapus_semua'])) {
    $_SESSION['dataSiswa'] = array(); // Mengosongkan array dataSiswa
    //redirect kembali ke halaman ini setelah penghapusan
    header("location: http://localhost/data siswa/session.php");
    exit;
}



// var_dump($_SESSION['dataSiswa']);

echo '<table border="1">';
echo '<tr>';
echo '<th>NAMA</th>';
echo '<th>NIS</th>';
echo '<th>RAYON</th>';
echo '<th>AKSI</th>';
echo '</tr>';

foreach($_SESSION['dataSiswa'] as $index => $value){
    echo '<tr>';
    echo '<td>' . $value['nama'] . '</td>';
    echo '<td>' . $value['nis'] . '</td>';
    echo '<td>' . $value['rayon'] . '</td>';
    echo '<td>
    <a href="?hapus='.$index.'">HAPUS</a></td>';
    echo '</tr>';
}

echo '</table>';


?>
</div>
</body>
</html>