 <?php
    include 'function.php';

    // Fungsi untuk mendapatkan data anggota dari table anggota
    $query = "SELECT * FROM anggota";
    $result = mysqli_query($koneksi, $query);

    $anggota = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $anggota[] = $row;
    }
    ?>


 <!-- The Modal -->
 <div class="modal fade" id="PinjamBuku">
     <div class="modal-dialog">
         <div class="modal-content">

             <!-- Modal Header -->
             <div class="modal-header">
                 <h4 class="modal-title">Pinjam Buku <?= $judul_buku ?></h4>
                 <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
             </div>

             <!-- Modal body -->
             <form method="POST" action="Dashboard-Pengunjung.php">
                 <div class="modal-body">
                     <!-- Hidden fields untuk menyimpan id_buku dan judul_buku -->
                     <input type="hidden" name="judul_buku" id="judul_buku" value="<?= $judul_buku ?>">

                     <label for="nama_anggota" class="form-label">Nama Anggota</label>
                     <select name="nama_anggota" class="form-control" required>
                         <option value="">Pilih Anggota</option>
                         <?php foreach ($anggota as $a): ?>
                             <option value="<?= $a['nama_anggota'] ?>"><?= $a['nama_anggota'] ?></option>
                         <?php endforeach; ?>
                     </select>
                     <div class="mb-3">
                         <label for="tanggal_pinjam" class="form-label">Tanggal Pinjam</label>
                         <input type="date" class="form-control" name="tanggal_pinjam" id="tanggal_pinjam">
                     </div>
                     <div class="mb-3">
                         <label for="tanggal_kembali" class="form-label">Tanggal Kembali</label>
                         <input type="date" class="form-control" name="tanggal_kembali" id="tanggal_kembali">
                     </div>
                 </div>

                 <!-- Modal footer -->
                 <div class="modal-footer">
                     <input type="submit" name="PinjamBuku" value="Pinjam Buku" class="btn btn-primary">
                     <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                 </div>
             </form>
         </div>
     </div>
 </div>