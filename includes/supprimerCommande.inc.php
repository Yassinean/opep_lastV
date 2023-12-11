<?php
include "../includes/dbh.inc.php";

$idPlante = $_GET['id'];

$sql = "DELETE FROM `panierplante` WHERE `plante_id` = ?";

$stmt = mysqli_stmt_init($conn);
if (!mysqli_stmt_prepare($stmt, $sql)) {
    header("Location: ../pages/cart.php?error=sqlerror");
    exit();
} else {
    mysqli_stmt_bind_param($stmt, "i", $idPlante);
    mysqli_stmt_execute($stmt);
    header("Location: ../pages/cart.php?ssssssss");
    exit();
}
