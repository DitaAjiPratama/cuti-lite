<?php

  // ==============================================================================
  // Fungsi view()
  // ==============================================================================

  function view() {

    include "config/connection.php";

    $result = mysqli_query($con,"SELECT *, karyawan.id AS pilih FROM karyawan
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
      <!-- <a href="/?page=daftar-karyawan&id=<?= $row['pilih']; ?>" data-toggle="modal" data-id="<?= $row['pilih']; ?>" data-target="#edit" class="btn btn-sm btn-success"> -->
      <form action="index.php?page=daftar-karyawan" method="post">
        <a href="index.php?page=daftar-karyawan&id=<?= $row['pilih']; ?>" class="btn btn-sm btn-success">
          <i class="fa fa-edit"></i> Edit
        </a>
        <input type="hidden" name="id" value="<?= $row['username']; ?>">
        <button type="submit" name="submit" value="delete" class="btn btn-sm btn-danger">
          <i class="fa fa-trash"></i> Delete
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
  // Fungsi add()
  // ==============================================================================

  function add($nama, $divisi, $jatah_cuti_per_tahun, $username_login, $password_login, $level) {

    include "config/connection.php";

    $sql1 = "INSERT INTO users
      VALUES (
        '$username_login',
        '$password_login',
        '$level'
      )
    ";

    $sql2 = "INSERT INTO karyawan
    VALUES (
      DEFAULT,
      '$nama',
      '$divisi',
      '$jatah_cuti_per_tahun',
      '$username_login'
    )
    ";

    if ( mysqli_query($con, $sql1) && mysqli_query($con, $sql2) ) {

      $result = mysqli_query($con,"SELECT id FROM karyawan WHERE username = '$username_login' ");
      while ($row2 = mysqli_fetch_array($result)) {
        $id_karyawan = $row2['id'];

        $result = mysqli_query($con,"SELECT DISTINCT tanggal_mulai, tanggal_selesai, keterangan_cuti FROM status_cuti
          WHERE (
            year(tanggal_mulai) = year( NOW() )
            OR
            year(tanggal_selesai) = year( NOW() )
          )
          AND
            jenis_cuti = 'Cuti Bersama'
        ");
        while ($row = mysqli_fetch_array($result)) {

          $sql = "INSERT INTO status_cuti
          VALUES (
            DEFAULT,
            '{$row['tanggal_mulai']}',
            '{$row['tanggal_selesai']}',
            'Cuti Bersama',
            '{$row['keterangan_cuti']}',
            'Di Terima',
            '$id_karyawan'
          )
          ";

          if (mysqli_query($con, $sql)) {}

            else
            header("location:index.php?page=cuti-bersama&msg=fail");
            // $msg = mysqli_error($con);
        }


      }
      header("location:index.php?page=daftar-karyawan&msg=success");
    }
    else
      header("location:index.php?page=daftar-karyawan&msg=fail");
      // $msg = mysqli_error($con);

  }

  if (isset($_POST['submit']) && $_POST['submit']=="add") {
    add($_POST['nama'], $_POST['divisi'], $_POST['jatah_cuti_per_tahun'], $_POST['username'], $_POST['password'], $_POST['level']);
    // header("location:index.php?page=status-cuti");
  }

?>

<?php

  // ==============================================================================
  // Fungsi edit()
  // ==============================================================================

  function edit($id, $nama, $divisi, $jatah_cuti_per_tahun, $username_login, $password_login, $level) {

    include "config/connection.php";

    $sql1 = "UPDATE users
      SET
        username = '$username_login',
        password = '$password_login',
        level = '$level'
      WHERE username = '$id'
    ";

    $sql2 = "UPDATE karyawan
      SET
        nama = '$nama',
        divisi = '$divisi',
        jatah_cuti_per_tahun = '$jatah_cuti_per_tahun',
        username = '$username_login'
      WHERE username = '$username_login'
    ";

    if ( mysqli_query($con, $sql1) && mysqli_query($con, $sql2) )
      header("location:index.php?page=daftar-karyawan&msg=success");
    else
      header("location:index.php?page=daftar-karyawan&msg=fail");
      // $msg = mysqli_error($con);

  }

  if (isset($_POST['submit']) && $_POST['submit']=="edit") {
    edit($_POST['id'], $_POST['nama'], $_POST['divisi'], $_POST['jatah_cuti_per_tahun'], $_POST['username'], $_POST['password'], $_POST['level']);
    // header("location:index.php?page=status-cuti");
  }

?>

<?php

  // ==============================================================================
  // Fungsi delete()
  // ==============================================================================

  function delete($id) {

    include "config/connection.php";

    $sql = "DELETE FROM users WHERE username = '$id' ";

    if ( mysqli_query($con, $sql) )
      header("location:index.php?page=daftar-karyawan&msg=success");
    else
      header("location:index.php?page=daftar-karyawan&msg=fail");
      // $msg = mysqli_error($con);

  }

  if (isset($_POST['submit']) && $_POST['submit']=="delete") {
    delete($_POST['id']);
    // header("location:index.php?page=status-cuti");
  }

?>

<?php

  // ==============================================================================
  // Fungsi modal_add()
  // ==============================================================================

  function modal_add() {

?>

<div id="add" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <div class="modal-content">

      <div class="modal-header">
        <h4 class="modal-title">Tambah Karyawan</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <div class="modal-body">
        <form action="index.php?page=daftar-karyawan" method="post">

          <div class="form-group">
            <label for="nama"><b>Nama :</b></label>
            <input class="form-control" type="text" id="nama" name="nama" value="">
          </div>

          <div class="form-group">
            <label for="divisi"><b>Divisi :</b></label>
            <input class="form-control" type="text" id="divisi" name="divisi" value="">
          </div>

          <div class="form-group">
            <label for="jatah_cuti_per_tahun"><b>Jatah Cuti per Tahun :</b></label>
            <input class="form-control" type="number" id="jatah_cuti_per_tahun" name="jatah_cuti_per_tahun" value="">
          </div>

          <div class="form-group">
            <label for="username"><b>Username :</b></label>
            <input class="form-control" type="text" id="username" name="username" value="">
          </div>

          <div class="form-group">
            <label for="password"><b>Password :</b></label>
            <input class="form-control" type="password" id="password" name="password" value="">
          </div>

          <div class="form-group">
            <label for="level"><b>Level :</b></label>
            <select class="form-control" id="level" name="level">
              <option value="" selected disabled>Select Level</option>
              <option value="admin">admin</option>
              <option value="user">user</option>
            </select>
          </div>

          <button type="submit" name="submit" value="add" class="btn btn-default">Tambah</button>

        </form>

      </div>

    </div>

  </div>
</div>

<?php
  }
  modal_add();
?>

<?php

  // ==============================================================================
  // Fungsi modal_edit()
  // ==============================================================================

  function modal_edit() {

?>

<div id="edit" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <div class="modal-content">

      <div class="modal-header">
        <h4 class="modal-title">Edit Karyawan</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <div class="modal-body">

        <?php

        include "config/connection.php";

        $result = mysqli_query($con,"SELECT * FROM karyawan
          INNER JOIN users
          ON karyawan.username = users.username
          WHERE karyawan.id = '{$_GET['id']}'
        ");
        while ($row = mysqli_fetch_array($result)) {

        ?>
        <form action="index.php?page=daftar-karyawan" method="post">

          <input type="hidden" name="id" id="id" value="<?= $row['username']; ?>" />

          <div class="form-group">
            <label for="nama"><b>Nama :</b></label>
            <input class="form-control" type="text" id="nama" name="nama" value="<?= $row['nama']; ?>">
          </div>

          <div class="form-group">
            <label for="divisi"><b>Divisi :</b></label>
            <input class="form-control" type="text" id="divisi" name="divisi" value="<?= $row['divisi']; ?>">
          </div>

          <div class="form-group">
            <label for="jatah_cuti_per_tahun"><b>Jatah Cuti per Tahun :</b></label>
            <input class="form-control" type="number" id="jatah_cuti_per_tahun" name="jatah_cuti_per_tahun" value="<?= $row['jatah_cuti_per_tahun']; ?>">
          </div>

          <div class="form-group">
            <label for="username"><b>Username :</b></label>
            <input class="form-control" type="text" id="username" name="username" value="<?= $row['username']; ?>">
          </div>

          <div class="form-group">
            <label for="password"><b>Password :</b></label>
            <input class="form-control" type="password" id="password" name="password" value="<?= $row['password']; ?>">
          </div>

          <div class="form-group">
            <label for="level"><b>Level :</b></label>
            <input class="form-control" type="text" id="level" name="level" value="<?= $row['level']; ?>">
            <select class="form-control" id="level" name="level">
              <option value="" disabled>Select Level</option>
              <option value="admin" 
                <?php if ($row['level'] == "admin") echo "selected"; ?>
              >admin</option>
              <option value="user"
                <?php if ($row['level'] == "user") echo "selected"; ?>
              >user</option>
            </select>
          </div>

          <button type="submit" name="submit" value="edit" class="btn btn-default">Edit</button>

        </form>

        <?php } ?>

      </div>

    </div>

  </div>
</div>

<?php
  }
  modal_edit();
?>
