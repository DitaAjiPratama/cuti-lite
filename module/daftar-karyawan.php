<?php

  // ==============================================================================
  // Fungsi view()
  // ==============================================================================

  function view($tahun) {

    include "config/connection.php";

    $result = mysqli_query($con,"SELECT * FROM karyawan
      INNER JOIN users
      ON karyawan.username = users.username
    ");
    while ($row = mysqli_fetch_array($result)) {
?>

  <tr>
    <td><?= $row['nama']; ?></td>
    <td><?= $row['divisi']; ?></td>
    <td><?= $row['jatah_cuti_per_tahun']; ?></td>
    <td><?= $row['username']; ?></td>
    <td><?= $row['password']; ?></td>
    <td><?= $row['level']; ?></td>
    <td>
      <a href="#" class="btn btn-sm btn-success">
        <i class="fa fa-edit"></i> Edit
      </a>
      <a href="#" class="btn btn-sm btn-danger">
        <i class="fa fa-trash"></i> Delete
      </a>
    </td>
  </tr>

<?php
    }
  }
?>
