<?php

  // ==============================================================================
  // Fungsi add()
  // ==============================================================================

  function add($tanggal_mulai, $tanggal_selesai, $keterangan_cuti) {

    include "config/connection.php";

    $result = mysqli_query($con,"SELECT id FROM karyawan");
    while ($row = mysqli_fetch_array($result)) {
      $id_karyawan = $row['id'];

      $sql = "INSERT INTO status_cuti
        VALUES (
          DEFAULT,
          '$tanggal_mulai',
          '$tanggal_selesai',
          'Cuti Bersama',
          '$keterangan_cuti',
          'Di Terima',
          '$id_karyawan'
        )
      ";

      if (mysqli_query($con, $sql)) {}
        // header("location:index.php?page=status-cuti&msg=success");
      else
        header("location:index.php?page=cuti-bersama&msg=fail");
        // $msg = mysqli_error($con);

    }

  }

  if (isset($_POST['submit_add'])) {
    add($_POST['tanggal_mulai'], $_POST['tanggal_selesai'], $_POST['keterangan_cuti']);
    header("location:index.php?page=cuti-bersama&msg=success");
  }

?>
