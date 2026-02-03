<?php
session_start();
require '../config.php';

$data = mysqli_query($conn, "SELECT * FROM popup_pengumuman ORDER BY id DESC");
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>3MS GAMING INFORMATION</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<style>

body{
background:radial-gradient(circle at top,#12001f,#050510);
color:#fff;
padding:20px;
font-family:Arial;
}

.card{
background:rgba(20,20,40,.9);
border:1px solid #00ffff40;
box-shadow:0 0 20px #ff00ff55;
border-radius:15px;
}

h4,h5{
color:#00ffff;
text-shadow:0 0 10px #00ffff;
}

label{
color:#ff4dff;
}

.form-control,
.form-select{
background:#050510;
border:1px solid #00ffff55;
color:white;
}

.form-control:focus{
background:#050510;
color:white;
box-shadow:0 0 10px #00ffff;
border-color:#00ffff;
}

.btn-primary{
background:linear-gradient(45deg,#ff00ff,#00ffff);
border:none;
}

.btn-success{
background:#00ffff;
border:none;
color:black;
}

.btn-danger{
background:#ff00ff;
border:none;
}

.table-dark{
--bs-table-bg:#050510;
}

.badge{
box-shadow:0 0 10px currentColor;
}

</style>

</head>

<body>

<div class="container">

<div class="card shadow-lg p-4 mb-4">

<h4 class="mb-3">ðŸ“¢ 3MS STORE INFORMATION</h4>

<form method="POST" action="popup_save.php">

<div class="mb-3">
<label>Judul</label>
<input type="text" name="judul" class="form-control" required>
</div>

<div class="mb-3">
<label>Isi Pengumuman</label>
<textarea name="isi" class="form-control" rows="4" required></textarea>
</div>

<div class="mb-3">
<label>Status</label>
<select name="status" class="form-select">
<option value="nonaktif">Nonaktif</option>
<option value="aktif">Aktif</option>
</select>
</div>

<button class="btn btn-primary">Simpan Popup</button>

</form>
</div>

<div class="card shadow-lg p-4">

<h5>Daftar Popup</h5>

<table class="table table-dark table-striped mt-3">

<thead>
<tr>
<th>Judul</th>
<th>Status</th>
<th width="200">Aksi</th>
</tr>
</thead>

<tbody>

<?php while($row=mysqli_fetch_assoc($data)){ ?>

<tr>
<td><?= $row['judul']; ?></td>

<td>
<?php if($row['status']=="aktif"){ ?>
<span class="badge bg-success">Aktif</span>
<?php } else { ?>
<span class="badge bg-secondary">Nonaktif</span>
<?php } ?>
</td>

<td>

<a href="popup_update.php?id=<?= $row['id']; ?>&status=aktif" class="btn btn-success btn-sm">
Aktifkan
</a>

<a href="popup_update.php?id=<?= $row['id']; ?>&status=nonaktif" class="btn btn-warning btn-sm">
Nonaktifkan
</a>

<a href="javascript:void(0)" onclick="hapusPopup(<?= $row['id']; ?>)" class="btn btn-danger btn-sm">
Hapus
</a>

</td>

</tr>

<?php } ?>

</tbody>
</table>

</div>

</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
function hapusPopup(id){

Swal.fire({
title: 'Yakin hapus?',
text: "Data tidak bisa dikembalikan!",
icon: 'warning',
showCancelButton: true,
confirmButtonColor: '#00ffff',
cancelButtonColor: '#ff00ff',
confirmButtonText: 'Hapus'
}).then((result) => {
if (result.isConfirmed) {
window.location='popup_delete.php?id='+id;
}
});

}
</script>
</body>
</html>
