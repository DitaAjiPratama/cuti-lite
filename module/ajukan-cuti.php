<?php

  // ==============================================================================
  // Fungsi sisa_cuti()
  // ==============================================================================

  function sisa_cuti($session_user) {

    include "config/connection.php";

    $result = mysqli_query($con,"SELECT COUNT(*) AS jumlah FROM status_cuti
      INNER JOIN karyawan
      ON status_cuti.id_karyawan = karyawan.id
      WHERE username = '$session_user'
      AND status_pengajuan = 'Di Terima'
    ");
    while ($row = mysqli_fetch_array($result)) {
      $jumlah = $row['jumlah'];
    }

    $result = mysqli_query($con,"SELECT * FROM karyawan
      WHERE username = '$session_user'
    ");
    while ($row = mysqli_fetch_array($result)) {
      $jatah = $row['jatah_cuti_per_tahun'];
    }

    $sisa = $jatah-$jumlah;

    return $sisa;
  }
?>

<?php

  // ==============================================================================
  // Fungsi add()
  // ==============================================================================

  function add($tanggal_mulai, $tanggal_selesai, $jenis_cuti, $keterangan_cuti, $status_pengajuan, $id_karyawan) {

    include "config/connection.php";

    $result = mysqli_query($con,"SELECT id FROM karyawan WHERE username = '$id_karyawan' ");
    while ($row = mysqli_fetch_array($result)) {
      $id_karyawan = $row['id'];
    }

    $sql = "INSERT INTO status_cuti
      VALUES (
        DEFAULT,
        '$tanggal_mulai',
        '$tanggal_selesai',
        '$jenis_cuti',
        '$keterangan_cuti',
        '$status_pengajuan',
        '$id_karyawan'
      )
    ";

    if (mysqli_query($con, $sql))
      header("location:index.php?page=status-cuti&msg=success");
    else
      header("location:index.php?page=status-cuti&msg=fail");
      // $msg = mysqli_error($con);

  }

  if (isset($_POST['submit_add'])) {
    add($_POST['tanggal_mulai'], $_POST['tanggal_selesai'], $_POST['jenis_cuti'], $_POST['keterangan_cuti'], "Pending", $_POST['id_karyawan']);
    // header("location:index.php?page=status-cuti");
  }

?>
