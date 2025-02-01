<?php include("header.php"); ?>
<main>
    <div class="px-4 py-5 my-5 text-center">
        <h3 class="display-5 fw-bold">Pendaftaran Mahasiswa Baru</h3>
        <h1 class="display-3 fw-bold">Universitas Wiralodra</h1>
        <img src='LOGO-UNWIR.webp' width='150'>
        <div class="col-lg-6 mx-auto my-4">
            <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
                <button type="button" onclick="location.href='form-daftar.php';" class="btn btn-primary btn-lg px-4 gap-3">Daftar Baru</button>
                <button type="button" onclick="location.href='list-siswa.php';" class="btn btn-outline-secondary btn-lg px-4">Pendaftar</button>
            </div>
        </div>
    </div>
</main>

<?php include("footer.php"); ?>