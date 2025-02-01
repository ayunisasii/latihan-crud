<?php
include("config.php");

$title = "Formulir Edit MHS";
include("header.php");

// kalau tidak ada id di query string
if (!isset($_GET['id'])) {
    header('Location: list-siswa.php');
}

//ambil id dari query string
$id = $_GET['id'];

// buat query untuk ambil data dari database
$sql = "SELECT * FROM calon_siswa WHERE id=$id";
$query = mysqli_query($db, $sql);
$siswa = mysqli_fetch_assoc($query);

// jika data yang di-edit tidak ditemukan
if (mysqli_num_rows($query) < 1) {
    die("data tidak ditemukan...");
}

?>

<div class="container-fluid py-4">
    <div class="card">
    <div class="card-header pb-0 bg-warning">
        <div class="card-header pb-0 px-3">
            <h3 class="mb-0">Formulir Edit Siswa</h3>
        </div>
        </div>
        <div class="card-body pt-4 p-3">
            <form action="proses-edit.php" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?php echo $siswa['id'] ?>" />
                <div class="form-group py-1">
                    <label for="nama" class="form-control-label">Nama</label>
                    <input class="form-control" value="<?php echo $siswa['nama'] ?>" type="text" placeholder="Nama Lengkap" name="nama" required>
                </div>
                <div class="form-group py-1">
                    <label for="tanggal_lahir" class="form-control-label">Tanggal Lahir</label>
                    <input class="form-control" value="<?php echo $siswa['tanggal_lahir'] ?>" type="date" placeholder="tanggal_lahir Lengkap" name="tanggal_lahir" required>
                </div>
                <div class="form-group py-1">
                    <label for="jenis_kelamin">Jenis Kelamin</label>
                    <?php $jk = $siswa['jenis_kelamin']; ?>
                    <div class="form-check mb-3">
                        <input class="form-check-input" value="laki-laki" type="radio" name="jenis_kelamin" <?php echo ($jk == 'laki-laki') ? "checked" : "" ?> required>
                        <label class="custom-control-label" for="customRadio1">Laki-laki</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" value="perempuan" type="radio" name="jenis_kelamin" <?php echo ($jk == 'perempuan') ? "checked" : "" ?>>
                        <label class="custom-control-label" for="customRadio2">Perempuan</label>
                    </div>
                </div>
                <div class="form-group py-1">
                    <label for="sekolah_asal" class="form-control-label">Agama</label>
                    <?php $agama = $siswa['agama']; ?>
                    <select name="agama" class="form-select" required>
                        <option value="">Silahkan Pilih</option>
                        <option value="Islam" <?php echo ($agama == 'Islam') ? "selected" : "" ?>>Islam</option>
                        <option value="Kristen" <?php echo ($agama == 'Kristen') ? "selected" : "" ?>>Kristen</option>
                        <option value="Hindu" <?php echo ($agama == 'Hindu') ? "selected" : "" ?>>Hindu</option>
                        <option value="Budha" <?php echo ($agama == 'Budha') ? "selected" : "" ?>>Budha</option>
                        <option value="Atheis" <?php echo ($agama == 'Atheis') ? "selected" : "" ?>>Atheis</option>
                    </select>
                </div>
                <div class="form-group py-1">
                    <label for="sekolah_asal" class="form-control-label">Sekolah Asal</label>
                    <input class="form-control" value="<?php echo $siswa['sekolah_asal'] ?>" type="text" placeholder="Sekolah Asal" name="sekolah_asal" required>
                </div>
                <div class="form-group py-1">
                    <label for="pas_foto" class="form-control-label">Pas Foto</label>
                    <input class="form-control" value="" type="file" placeholder="Pas Foto" name="pas_foto">
                </div>
                <div class="d-flex justify-content-end">
                    <button type="submit" name="simpan" class="btn btn-success btn-md mt-4 mb-4">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php include("footer.php"); ?>