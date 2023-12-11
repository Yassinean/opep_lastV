<?php
include "../includes/dbh.inc.php";
$id = $_GET['id'];
$sql = 'DELETE FROM theme WHERE idTheme  =' . $id . ';';
$stmt = mysqli_stmt_init($conn);
if (!mysqli_stmt_prepare($stmt, $sql)) {
    header("Location: ../pages/dashboard.php?error=sqlerror");
    exit();
} else {
    mysqli_stmt_execute($stmt);
    header("Location: ../pages/dashboard.php?success=deleted");
    exit();
}
