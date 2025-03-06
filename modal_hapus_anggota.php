<!-- modal_delete.php -->
<div class="modal fade" id="HapusAnggota<?= $id_anggota ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Hapus Anggota <?= $nama_anggota; ?></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form method="POST" action="Data-Anggota.php">
                <div class="modal-body">
                    Apakah Anda Yakin??
                    <input type="hidden" name="ida" value="<?= $id_anggota; ?>">
                </div>
                <div class="modal-footer">
                    <input type="submit" name="HapusAnggota" value="Saya Yakin!" class="btn btn-primary">
                </div>
            </form>
        </div>
    </div>
</div>