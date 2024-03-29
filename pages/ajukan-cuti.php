<?php
  // include
  include "module/ajukan-cuti.php";
?>

<!-- Example Card-->
<div class="card mb-3">
  <div class="card-header">
    <h5><i class="fa fa-calendar-plus-o"></i> Ajukan cuti</h5>
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
        <label for="jenis_cuti"><b>Jenis Cuti :</b></label>
        <select class="form-control" id="jenis_cuti" name="jenis_cuti">
          <option value="" disabled selected>Jenis Cuti</option>
          <option>Cuti Tahunan</option>
          <option>Cuti Besar</option>
          <option>Cuti Sakit</option>
          <option>Cuti Bersalin</option>
        </select>
      </div>

      <div class="form-group">
        <label for="keterangan_cuti"><b>Keterangan :</b></label>
        <textarea class="form-control" id="keterangan_cuti" name="keterangan_cuti" rows="8" cols="80"></textarea>
      </div>

      <h6><b>Sisa cuti : <?= sisa_cuti($_SESSION["username"]); ?></b></h6>
      <!-- <input type="text" name="" value=""> -->

      <input type="hidden" name="id_karyawan" value="<?= $_SESSION["username"]; ?>">

      <button class="btn btn-default" type="submit" name="submit_add" value="true"><b>Ajukan cuti</b></button>

    </form>

  </div>
</div>
