<?php
$popup = mysqli_query($conn,"SELECT * FROM popup_pengumuman WHERE status='aktif' ORDER BY id DESC LIMIT 1");

if(mysqli_num_rows($popup) > 0){
    $data = mysqli_fetch_assoc($popup);
?>

<style>
  .modal-backdrop {
    z-index: 1040 !important;
  }
  #popupModal {
    z-index: 1050 !important;
    display: none; /* Default sembunyi, akan dibuka via JS */
  }
  .modal.show {
    display: block !important;
    background: rgba(0, 0, 0, 0.5); /* Background gelap manual */
  }
</style>

<div class="modal fade" id="popupModal" tabindex="-1" role="dialog" aria-labelledby="popupTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title" id="popupTitle"><?= $data['judul']; ?></h5>
        <button type="button" class="btn-close" onclick="forceClosePopup()" aria-label="Close" style="border:none; background:none; font-size:1.5rem;">&times;</button>
      </div>

      <div class="modal-body">
        <?= nl2br($data['isi']); ?>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-primary" onclick="forceClosePopup()">Tutup</button>
      </div>

    </div>
  </div>
</div>

<script>
// Fungsi Tutup Paksa (JavaScript Murni)
function forceClosePopup() {
    var modal = document.getElementById('popupModal');
    
    // 1. Hilangkan class 'show' dan ubah display
    modal.classList.remove('show');
    modal.style.display = 'none';
    
    // 2. Hilangkan class modal-open di body agar web bisa di-scroll lagi
    document.body.classList.remove('modal-open');
    document.body.style.overflow = 'auto';
    
    // 3. Cari dan hapus semua elemen backdrop (layar hitam)
    var backdrops = document.getElementsByClassName('modal-backdrop');
    while(backdrops[0]) {
        backdrops[0].parentNode.removeChild(backdrops[0]);
    }
}

// Fungsi Buka Modal
window.onload = function() {
    var modal = document.getElementById('popupModal');
    if(modal) {
        modal.classList.add('show');
        modal.style.display = 'block';
        document.body.classList.add('modal-open');
    }
};
</script>

<?php } ?>
