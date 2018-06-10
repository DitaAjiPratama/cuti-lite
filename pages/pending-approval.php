<?php
  if ($_SESSION["level"]!="admin") {
    header("location:index.php?page=cuti-bersama");
  }
?>

<?php
  // include
  include "module/pending-approval.php";
?>

<!-- Example DataTables Card-->
<div class="card mb-3">
  <div class="card-header">
    <h5><i class="fa fa-clock-o"></i> Pending Approval</h5>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

        <thead>
          <tr>
            <th>Nama</th>
            <th>Divisi</th>
            <th>Tanggal</th>
            <th>Jumlah Hari</th>
            <th>Jenis Cuti</th>
            <th>Keterangan</th>
            <th>Status</th>
          </tr>
        </thead>

        <tbody>
          <?php view( date("Y") ); ?>
        </tbody>
      </table>
    </div>
  </div>
  <!-- <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div> -->
</div>
