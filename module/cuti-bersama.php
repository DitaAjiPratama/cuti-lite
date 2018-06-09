<?php

  // ==============================================================================
  // Fungsi view()
  // ==============================================================================

  function view($tahun) {

    include "config/connection.php";

    $result = mysqli_query($con,"SELECT * FROM cuti_bersama
      WHERE
        year(tanggal_mulai) = $tahun
        OR
        year(tanggal_selesai) = $tahun
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



<?php

  // ==============================================================================
  // Fungsi add()
  // ==============================================================================

  function add($tanggal_mulai, $tanggal_selesai, $keterangan_cuti) {

    include "config/connection.php";

    $sql = "INSERT INTO mahasiswa
      VALUES (
        DEFAULT,
        '$tanggal_mulai',
        '$tanggal_selesai',
        '$keterangan_cuti'
      )
    ";
  }

?>