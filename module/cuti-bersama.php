<?php

  // ==============================================================================
  // Fungsi view()
  // ==============================================================================

  function view($tahun) {

    include "config/connection.php";

    $result = mysqli_query($con,"SELECT DISTINCT tanggal_mulai, tanggal_selesai, keterangan_cuti FROM status_cuti
      WHERE (
        year(tanggal_mulai) = $tahun
        OR
        year(tanggal_selesai) = $tahun
      )
      AND
        jenis_cuti = 'Cuti Bersama'
    ");
    while ($row = mysqli_fetch_array($result)) {
?>

  <tr>
    <td><?= $row['tanggal_mulai']; ?> - <?= $row['tanggal_selesai']; ?></td>
    <td><?= $row['keterangan_cuti']; ?></td>
  </tr>

<?php
    }
  }
?>
