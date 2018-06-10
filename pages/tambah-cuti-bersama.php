<?php
  if ($_SESSION["level"]!="admin") {
    header("location:index.php?page=cuti-bersama");
  }
?>

<?php
  // include
  include "module/tambah-cuti-bersama.php";
?>

<!-- Example Card-->
<div class="card mb-3">
  <div class="card-header">
    <h5><i class="fa fa-calendar-plus-o"></i> Tambah Cuti Bersama</h5>
  </div>
  <div class="card-body">

    <form class="" action="" method="post">

      <div class="form-group">
        <label for="tanggal_mulai"><b>Tanggal Mulai :</b></label>
        <input class="form-control" type="date" id="tanggal_mulai" name="tanggal_mulai" value="">
      </div>

      <div class="form-group">
        <label for="tanggal_selesai"><b>Tanggal Selesai :</b></label>
        <input class="form-control" type="date" id="tanggal_selesai" name="tanggal_selesai" value="">
      </div>

      <div class="form-group">
        <label for="keterangan_cuti"><b>Keterangan :</b></label>
        <textarea class="form-control" id="keterangan_cuti" name="keterangan_cuti" rows="8" cols="80"></textarea>
      </div>

      <button class="btn btn-default" type="submit" name="submit_add" value="true"><b>Ajukan cuti</b></button>

    </form>

  </div>
</div>
