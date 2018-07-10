<?php

  // ==============================================================================
  // Fungsi view()
  // ==============================================================================

  function view($tahun, $session_user) {

    include "config/connection.php";

    $result = mysqli_query($con,"SELECT * FROM status_cuti
      INNER JOIN karyawan
      ON status_cuti.id_karyawan = karyawan.id
      WHERE
      year(tanggal_mulai) = $tahun
      OR
      year(tanggal_selesai) = $tahun

    ");
    while ($row = mysqli_fetch_array($result)) {
?>

  <tr>
    <td><?= $row['nama']; ?></td>
    <td><?= $row['divisi']; ?></td>
    <td><?= $row['tanggal_mulai']; ?> - <?= $row['tanggal_selesai']; ?></td>
    <td><?= $row['jenis_cuti']; ?></td>
    <td><?= $row['keterangan_cuti']; ?></td>
    <td
      <?php
        if ($row['status_pengajuan']=="Di Terima")
          echo 'class="text-success"';
        if ($row['status_pengajuan']=="Di Tolak")
          echo 'class="text-danger"';
        else
          echo 'class="text-secondary"';
      ?>
    >
      <b><?= $row['status_pengajuan']; ?></b>
    </td>
  </tr>

<?php
    }
  }
?>
