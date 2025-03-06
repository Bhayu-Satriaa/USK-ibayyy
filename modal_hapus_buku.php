<!-- modal_delete.php -->
<div class="modal fade" id="HapusBuku<?= $id_buku ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Hapus Buku <?= $judul_buku; ?></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form method="POST" action="Data-Buku.php">
                <div class="modal-body">
                    Apakah Anda Yakin??
                    <input type="hidden" name="idb" value="<?= $id_buku; ?>">
                </div>
                <div class="modal-footer">
                    <input type="submit" name="HapusBuku" value="Saya Yakin!" class="btn btn-primary">
                </div>
            </form>
        </div>
    </div>
</div>