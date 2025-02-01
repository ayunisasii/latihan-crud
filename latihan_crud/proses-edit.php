<?php

include("config.php");

// cek apakah tombol simpan sudah diklik atau blum?
if(isset($_POST['simpan'])){

    // ambil data dari formulir
    $id = $_POST['id'];
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

        if ($moved) {
            $sql = "UPDATE calon_siswa SET pas_foto='file/$namafile' WHERE id=$id";
            $query = mysqli_query($db, $sql);
        }else{
            echo "Not uploaded because of error #" . $_FILES["foto"]["error"];
        }
    }

    // buat query update
    $sql = "UPDATE calon_siswa SET nama='$nama', tanggal_lahir='$tanggal_lahir', jenis_kelamin='$jk', agama='$agama', sekolah_asal='$sekolah' WHERE id=$id";
    $query = mysqli_query($db, $sql);

    // apakah query update berhasil?
    if( $query ) {
        // kalau berhasil alihkan ke halaman list-siswa.php
        header('Location: list-siswa.php');
    } else {
        // kalau gagal tampilkan pesan
        die("Gagal menyimpan perubahan...");
    }


} else {
    die("Akses dilarang...");
}

?>