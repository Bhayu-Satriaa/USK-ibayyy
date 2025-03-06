<!-- modal_edit.php -->

<div class="modal fade" id="EditAnggota<?= $id_anggota ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Anggota <?= $nama_anggota; ?></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form method="POST" action="Data-Anggota.php">
                <div class="modal-body">
                    <input type="number" class="form-control mt-2" name="id_anggota" value="<?= $id_anggota ?>">
                    <input type="text" class="form-control mt-2" name="nama_anggota" value="<?= $nama_anggota ?>">
                    <input type=" text" class="form-control mt-2" name="alamat" value="<?= $alamat ?>">
                    <input type=" number" class="form-control mt-2" name="no_hp" value="<?= $no_hp ?>">
                    <input type=" file" class="form-control mt-2" name="foto" value="<?= $foto ?>">
                    <input type="hidden" name="ida" value="<?= $id_anggota; ?>">
                </div>
                <div class="modal-footer">
                    <input type="submit" name="EditAnggota" value="Simpan Data" class="btn btn-primary">
                </div>
            </form>
        </div>
    </div>
</div>