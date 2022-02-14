<?php

include("connect.php");

// cek apakah tombol daftar sudah diklik atau blum?
if(isset($_POST['kirim'])){

    // ambil data dari formulir
    
    $jl = $_POST['jenis_layanan'];
    $nik = $_POST['nik'];
    $nama = $_POST['nama'];
    


    // buat query
    $sql = "INSERT INTO layanan_umum (jenis_layanan, nik, nama) VALUE ('$jl', '$nik', '$nama')";
    $query = mysqli_query($db, $sql);

    // apakah query simpan berhasil?
    if( $query ) {
        // kalau berhasil alihkan ke halaman index.php dengan status=sukses
        header('Location: index.php?status=sukses');
    } else {
        // kalau gagal alihkan ke halaman indek.php dengan status=gagal
        header('Location: index.php?status=gagal');
    }


} else {
    die("Akses dilarang...");
}

?>