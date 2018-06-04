<?php
  if ($_SESSION["level"]!="admin") {
    header("location:index.php?page=cuti-bersama");
  }
?>
pending-approval
