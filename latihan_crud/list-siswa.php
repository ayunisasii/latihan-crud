<?php include("config.php"); ?>
<?php include("header.php"); ?>

<div class="card my-4 mx-4">
    <div class="card-header pb-0 bg-warning">
        <div class="d-flex flex-row justify-content-between">
            <div>
                <h5 class="mb-0">Siswa yang sudah mendaftar</h5>
            </div>
            <a href="form-daftar.php" class="btn btn-primary btn-sm mb-2" type="button">+&nbsp; Tambah Baru</a>
        </div>
    </div>
    <div class="card-body px-0 pt-0 pb-2">
        <div class="table-responsive p-0">
            <table id="tahun_ajaran_table" class="table align-items-center mb-0">
                <thead>
                    <tr>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                            No
                        </th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                            tanggal_lahir
                        </th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                            Nama
                        </th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                            Jenis Kelamin
                        </th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                            Agama
                        </th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                            Sekolah Asal
                        </th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                            Pas Foto
                        </th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                            Aksi
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT * FROM calon_siswa";
                    $query = mysqli_query($db, $sql);

                    while ($siswa = mysqli_fetch_array($query)) {
                        echo "<tr>";

                        echo '<td class="ps-4"><p class="text-xs font-weight-bold mb-0">' . $siswa['id'] . "</p></td>";
                        echo "<td>" . date('d-F-Y', strtotime($siswa['tanggal_lahir'])) . "</td>";
                        echo "<td style='color: red'>" . $siswa['nama'] . "</td>";
                        echo "<td>" . $siswa['jenis_kelamin'] . "</td>";
                        echo "<td>" . $siswa['agama'] . "</td>";
                        echo "<td>" . $siswa['sekolah_asal'] . "</td>";
                        echo "<td><img src='".$siswa['pas_foto']."' width='70'></td>";

                        echo "<td>";
                        echo "<a href='form-edit.php?id=" . $siswa['id'] . "' class='btn btn-success btn-sm' type='button'>Edit</a> ";
                        echo "<a href='hapus.php?id=" . $siswa['id'] . "' class='btn btn-danger btn-sm' type='button'>Hapus</a>";
                        echo "</td>";

                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <div>
        <p>Total: <?php echo mysqli_num_rows($query) ?></p>
    </div>
</div>


<?php include("footer.php"); ?>