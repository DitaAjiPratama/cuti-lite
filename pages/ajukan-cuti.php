<?php
  // include
  include "module/ajukan-cuti.php";
?>

<!-- Example Card-->
<div class="card mb-3">
  <div class="card-header">
    <h5><i class="fa fa-calendar-check-o"></i> Ajukan cuti</h5>
  </div>
  <div class="card-body">

    <form class="" action="" method="post">

      <h6>Tanggal Mulai</h6>
      <input class="form-control" type="date" name="tanggal_mulai" value="">

      <h6>Tanggal Selesai</h6>
      <input class="form-control" type="date" name="tanggal_selesai" value="">

      <h6>Jenis cuti</h6>
      <select class="form-control" name="jenis_cuti">
        <option value="" disabled selected>Jenis Cuti</option>
        <option value="Cuti Sakit">Cuti Sakit</option>
        <option value="Cuti Liburan">Cuti Liburan</option>
      </select>

      <h6>Keterangan</h6>
      <textarea class="form-control" name="keterangan_cuti" rows="8" cols="80"></textarea>

      <h6>Sisa cuti : <?= sisa_cuti($_SESSION["username"]); ?></h6>
      <!-- <input type="text" name="" value=""> -->

      <input type="hidden" name="id_karyawan" value="<?= $_SESSION["username"]; ?>">

      <br><br>
      <button class="btn btn-default" type="submit" name="submit_add" value="true">Ajukan cuti</button>

    </form>

  </div>
</div>
