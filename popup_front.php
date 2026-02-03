<?php
$popup = mysqli_query($conn,"SELECT * FROM popup_pengumuman WHERE status='aktif' ORDER BY id DESC LIMIT 1");

if(mysqli_num_rows($popup) > 0){

$data = mysqli_fetch_assoc($popup);
?>

<div class="modal fade" id="popupModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title"><?= $data['judul']; ?></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" onclick="tutupPopupManual()"></button>
      </div>

      <div class="modal-body">
        <?= nl2br($data['isi']); ?>
      </div>

      <div class="modal-footer">
        <button class="btn btn-primary" data-bs-dismiss="modal" onclick="tutupPopupManual()">Tutup</button>
      </div>

    </div>
  </div>
</div>

<script>
// Fungsi cadangan untuk menutup modal secara paksa jika atribut bootstrap macet
function tutupPopupManual() {
    var element = document.getElementById('popupModal');
    var modalInstance = bootstrap.Modal.getInstance(element);
    if (modalInstance) {
        modalInstance.hide();
    }
    // Menghilangkan backdrop (layar hitam) jika masih tertinggal
    document.body.classList.remove('modal-open');
    var backdrop = document.querySelector('.modal-backdrop');
    if (backdrop) {
        backdrop.remove();
    }
}

document.addEventListener("DOMContentLoaded", function(){
    var popupElement = document.getElementById('popupModal');
    if(popupElement){
        var myModal = new bootstrap.Modal(popupElement, {
            keyboard: true,
            backdrop: 'static' // Agar tidak tertutup sembarang kecuali klik tombol
        });
        myModal.show();
    }
});
</script>

<?php } ?>
