<?php

  // ==============================================================================
  // Fungsi view()
  // ==============================================================================

  function view($tahun) {

    include "config/connection.php";

    $result = mysqli_query($con,"SELECT *, status_cuti.id AS pilih FROM status_cuti
      INNER JOIN karyawan
      ON status_cuti.id_karyawan = karyawan.id
      WHERE (
        year(tanggal_mulai) = $tahun
        OR
        year(tanggal_selesai) = $tahun
      )
      AND status_pengajuan = 'Pending'
    ");
    while ($row = mysqli_fetch_array($result)) {
?>

  <tr>
    <td><?= $row['nama']; ?></td>
    <td><?= $row['divisi']; ?></td>
    <td><?= $row['tanggal_mulai']; ?> - <?= $row['tanggal_selesai']; ?></td>
    <td><?= $row['jenis_cuti']; ?></td>
    <td><?= $row['keterangan_cuti']; ?></td>
    <td>
      <form action="" method="post">
        <input type="hidden" name="id" value="<?= $row['pilih']; ?>">
        <button type="submit" name="status_pengajuan" value="Di Terima" class="btn btn-success">
          <b>Di Terima</b>
        </button>
        <button type="submit" name="status_pengajuan" value="Di Tolak" class="btn btn-danger">
          <b>Di Tolak</b>
        </button>
      </form>
    </td>
  </tr>

<?php
    }
  }
?>

<?php

  // ==============================================================================
  // Fungsi confirm()
  // ==============================================================================

  function confirm($id, $status_pengajuan) {

    include "config/connection.php";

    $sql = "UPDATE status_cuti
      SET status_pengajuan = '$status_pengajuan'
      WHERE id = '$id'
    ";

    if (mysqli_query($con, $sql))
      header("location:index.php?page=pending-approval&msg=success");
    else
      header("location:index.php?page=pending-approval&msg=fail");
      // $msg = mysqli_error($con);

  }

  if (isset($_POST['status_pengajuan'])) {
    confirm($_POST['id'], $_POST['status_pengajuan']);
    // header("location:index.php?page=status-cuti");
  }

?>
