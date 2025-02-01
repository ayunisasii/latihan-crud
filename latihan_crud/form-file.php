<?php
include("config.php");

$title = "Penanganan file";
include("header.php");

$id = $_GET['id'];
?>

<div class="container-fluid py-4">
    <div class="card">
        <div class="card-header pb-0 px-3">
            <h3 class="mb-0">Upload Foto</h3>
        </div>
        <div class="card-body pt-4 p-3">

            <form method="post" action="" enctype="multipart/form-data">
                <input type="file" name="foto">
                <input type="submit" value="upload">
            </form>

        </div>
    </div>
</div>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $namafile = $_FILES['foto']['name'];
    $lokasifile = $_FILES['foto']['tmp_name'];

    $upload_dir = 'file';
    if (is_dir($upload_dir) && is_writable($upload_dir)) {
        // do upload logic here
    } else {
        echo 'Upload directory is not writable, or does not exist.';
    }

    if ($namafile != "") {
        $moved = move_uploaded_file($lokasifile, "file/" . $namafile);

        if ($moved) {
            $sql = "UPDATE calon_siswa SET foto='file/$namafile' WHERE id=$id";
            $query = mysqli_query($db, $sql);
            echo "Successfully uploaded";
            echo "<br><img src='file/$namafile' width='200'>";
        } else {
            echo "Not uploaded because of error #" . $_FILES["foto"]["error"];
        }
    }
}
?>

<?php include("footer.php"); ?>