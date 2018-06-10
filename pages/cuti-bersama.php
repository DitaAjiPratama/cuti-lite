<?php
  // include
  include "module/cuti-bersama.php";
?>

<!-- Example DataTables Card-->
<div class="card mb-3">
  <div class="card-header">
    <h5><i class="fa fa-calendar"></i> Daftar cuti bersama tahun <?= date("Y"); ?></h5>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

        <thead>
          <tr>
            <th>Tanggal</th>
            <th>Cuti Bersama</th>
          </tr>
        </thead>

        <tbody>
          <?php view(date("Y")); ?>
        </tbody>

      </table>
    </div>
  </div>
  <!-- <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div> -->
</div>
