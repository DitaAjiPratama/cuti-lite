<?php

  // ==============================================================================
  // Fungsi jatah_cuti()
  // ==============================================================================

  function jatah_cuti($session_user) {

    include "config/connection.php";

    $result = mysqli_query($con,"SELECT * FROM karyawan
      WHERE username = '$session_user'
    ");
    while ($row = mysqli_fetch_array($result)) {
      $jatah = $row['jatah_cuti_per_tahun'];
    }
    return $jatah;
  }
?>

<?php

  // ==============================================================================
  // Fungsi sisa_cuti()
  // ==============================================================================

  function sisa_cuti($session_user) {

    include "config/connection.php";

    $jumlah = 0;
    $result = mysqli_query($con,"SELECT * FROM status_cuti
      INNER JOIN karyawan
      ON status_cuti.id_karyawan = karyawan.id
      WHERE username = '$session_user'
      AND status_pengajuan = 'Di Terima'
    ");
    while ($row = mysqli_fetch_array($result)) {
      $tanggal_mulai = $row['tanggal_mulai'];
      $tanggal_selesai = $row['tanggal_selesai'];

      $selisih = mysqli_query($con,"SELECT DATEDIFF('$tanggal_selesai', '$tanggal_mulai') AS selisih");
      while ($row2 = mysqli_fetch_array($selisih)) {
        $jumlah = $jumlah + $row2['selisih'] + 1;
      }

    }

    $sisa = jatah_cuti($session_user) - $jumlah;

    return $sisa;
  }
?>


<?php

  // ==============================================================================
  // Fungsi view()
  // ==============================================================================

  function view($tahun, $session_user) {

    include "config/connection.php";

    $result = mysqli_query($con,"SELECT * FROM status_cuti
      INNER JOIN karyawan
      ON status_cuti.id_karyawan = karyawan.id
      WHERE (
        year(tanggal_mulai) = $tahun
        OR
        year(tanggal_selesai) = $tahun
      )
      AND username = '$session_user'
    ");
    while ($row = mysqli_fetch_array($result)) {
?>

  <tr>
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
