<?php

include("config.php");

// cek apakah tombol daftar sudah diklik atau blum?
if(isset($_POST['daftar'])){

    // ambil data dari formulir
    $nama = $_POST['nama'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $jk = $_POST['jenis_kelamin'];
    $agama = $_POST['agama'];
    $sekolah = $_POST['sekolah_asal'];

    $namafile = $_FILES['pas_foto']['name'];
    $lokasifile = $_FILES['pas_foto']['tmp_name'];

    $upload_dir = 'file';
    if (is_dir($upload_dir) && is_writable($upload_dir)) {
        // do upload logic here
    } else {
        echo 'Upload directory is not writable, or does not exist.';
    }

    if ($namafile != "") {
        $moved = move_uploaded_file($lokasifile, "file/" . $namafile);

        if (!$moved) {
            echo "Not uploaded because of error #" . $_FILES["foto"]["error"];
        }
    }else{
        echo 'File does not exist.';
    }

    // buat query
    $sql = "INSERT INTO calon_siswa (nama, tanggal_lahir, jenis_kelamin, agama, sekolah_asal, pas_foto) VALUE ('$nama', '$tanggal_lahir', '$jk', '$agama', '$sekolah', 'file/$namafile')";
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