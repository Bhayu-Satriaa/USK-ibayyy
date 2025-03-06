<!-- modal_delete.php -->
<div class="modal fade" id="KembalikanPeminjaman<?= $id_peminjaman ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Kembalikan Peminjaman Nomor <?= $id_peminjaman ?></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form method="POST" action="Dashboard.php">
                <div class="modal-body">
                    Apakah Anda Yakin??
                    <input type="hidden" name="idp" value="<?= $id_peminjaman; ?>">
                </div>
                <div class="modal-footer">
                    <input type="submit" name="KembalikanPeminjaman" value="Saya Yakin!" class="btn btn-primary">
                </div>
            </form>
        </div>
    </div>
</div>