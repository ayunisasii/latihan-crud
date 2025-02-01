<?php
$title = "Formulir Pendaftaran Siswa Baru | SMK Coding";
include("header.php");
?>

<div class="container py-4">
    <div class="card">
    <div class="card-header pb-0 bg-warning">
        <div class="card-header pb-0 px-3">
            <h3 class="mb-0">Formulir Pendaftaran Siswa Baru</h3>
        </div>
        </div>
        <div class="card-body pt-4 p-3">
            <form action="proses-pendaftaran.php" method="POST" enctype="multipart/form-data">
                <div class="form-group py-1">
                    <label for="nama" class="form-control-label">Nama</label>
                    <input class="form-control" value="" type="text" placeholder="Nama Lengkap" name="nama" required>
                </div>
                <div class="form-group py-1">
                    <label for="tanggal_lahir" class="form-control-label">Tanggal Lahir</label>
                    <input class="form-control" value="" type="date" placeholder="tanggal_lahir Lengkap" name="tanggal_lahir" required>
                </div>
                <div class="form-group py-1">
                    <label for="jenis_kelamin">Jenis Kelamin</label>
                    <div class="form-check mb-3">
                        <input class="form-check-input" value="laki-laki" type="radio" name="jenis_kelamin" required>
                        <label class="custom-control-label" for="customRadio1">Laki-laki</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" value="perempuan" type="radio" name="jenis_kelamin">
                        <label class="custom-control-label" for="customRadio2">Perempuan</label>
                    </div>
                </div>
                <div class="form-group py-1">
                    <label for="agama" class="form-control-label">Agama</label>
                    <select name="agama" class="form-select" required>
                        <option value="">Silahkan Pilih</option>
                        <option value="Islam">Islam</option>
                        <option value="Kristen">Kristen</option>
                        <option value="Hindu">Hindu</option>
                        <option value="Budha">Budha</option>
                        <option value="Atheis">Atheis</option>
                    </select>
                </div>
                <div class="form-group py-1">
                    <label for="sekolah_asal" class="form-control-label">Sekolah Asal</label>
                    <input class="form-control" value="" type="text" placeholder="Sekolah Asal" name="sekolah_asal" required>
                </div>
                <div class="form-group py-1">
                    <label for="pas_foto" class="form-control-label">Pas Foto</label>
                    <input class="form-control" value="" type="file" placeholder="Pas Foto" name="pas_foto" required>
                </div>
                <div class="d-flex justify-content-end">
                    <button type="submit" name="daftar" class="btn btn-success btn-md mt-4 mb-4">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php include("footer.php"); ?>