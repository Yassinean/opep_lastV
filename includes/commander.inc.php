<?php
include "../includes/dbh.inc.php";
$idPivot = (int) $_GET['idPivot'];
$idplante = (int) $_GET['idplante'];
$numCommande = mt_rand(100, 10000);
$sql = "INSERT INTO commande (numCommande, idPivotfk) VALUES (?,?)";
$stmt = mysqli_stmt_init($conn);
if (!mysqli_stmt_prepare($stmt, $sql)) {
    header("Location: ../pages/cart.php?error=sqlerror");
    exit();
} else {
    mysqli_stmt_bind_param($stmt, "ii", $numCommande, $idPivot);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    $sql2 = 'UPDATE panierplante SET status = 0, quantite = 1 WHERE plante_id = ?';

    $stmt2 = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt2, $sql2)) {
        header("Location: ../pages/cart.php?error=sqlerror");
        exit();
    } else {
        mysqli_stmt_bind_param($stmt2, "i", $idplante);
        mysqli_stmt_execute($stmt2);
        header("Location: ../pages/cart.php?ssssssss");
        exit();
    }

    echo "<script>alert('Commande passée avec succès!');</script>";

    header("Location: ../pages/cart.php?success=commander");
    exit();
}
