<!-- modal_edit.php -->

<div class="modal fade" id="EditBuku<?= $id_buku; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit buku <?= $judul_buku; ?></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form method="POST" action="Data-Buku.php">
                <div class="modal-body">
                    <input type="number" class="form-control mt-2" name="id_buku" value="<?= $id_buku ?>">
                    <input type="text" class="form-control mt-2" name="judul_buku" value="<?= $judul_buku ?>">
                    <input type=" text" class="form-control mt-2" name="pencipta" value="<?= $pencipta ?>">
                    <input type=" text" class="form-control mt-2" name="kategori" value="<?= $kategori ?>">
                    <input type=" number" class="form-control mt-2" name="stok" value="<?= $stok ?>">
                    <select name="status" class="form-control mt-2">
                        <?php
                        //Gunakan SELECT DISTINCT untuk mengambil nilai unik dalam sebuah tabel, dalam kasus ini Status Buku
                        $sql = "SELECT DISTINCT status FROM buku";
                        $get = mysqli_query($koneksi, $sql);
                        while ($pl = mysqli_fetch_array($get)) {
                            $status = $pl['status'];
                        ?>
                            <option value="<?= $status; ?>"><?= $status; ?></option>
                        <?php };
                        ?>
                    </select>
                    <input type="file" name="foto" class="form-control mt-2" value="<?= $foto ?>">
                    <input type="hidden" name="idb" value="<?= $id_buku; ?>">
                </div>
                <div class="modal-footer">
                    <input type="submit" name="EditBuku" value="Simpan Data" class="btn btn-primary">
                </div>
            </form>
        </div>
    </div>
</div>