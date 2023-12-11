<?php
include "../includes/dbh.inc.php";
if (isset($_GET['id'])) {
    session_start();
    $id = $_GET['id'];
    $sql2 = 'UPDATE panierplante SET status = 1 WHERE  plante_id  = ? ';

    $stmt2 = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt2, $sql2)) {
        header("Location: ../pages/cart.php?error=sqlerror");
        exit();
    } else {
        mysqli_stmt_bind_param($stmt2, "i", $id);
        mysqli_stmt_execute($stmt2);
        header("Location: ../pages/cart.php?");
    }
    $check = "SELECT * FROM panierplante where plante_id = $id;";
    $result = mysqli_query($conn, $check);
    if (mysqli_num_rows($result) > 0) {
        $getQtt = "SELECT quantite FROM `panierplante` WHERE plante_id = $id;";
        $qtt = mysqli_query($conn, $getQtt);
        if ($qtt) {
            if ($row = mysqli_fetch_row($qtt)) {
                $currentQTT = $row[0];
            }
        }
        $currentQTT++;

        $sql = 'UPDATE panierplante SET quantite = ? WHERE  plante_id  = ? ';
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../pages/cart.php?error=sqlerror");
            exit();
        } else {
            mysqli_stmt_bind_param($stmt, "ii", $currentQTT, $id);
            mysqli_stmt_execute($stmt);
            header("Location: ../pages/index.php?addedToCart");
            exit();
        }
    } else {
        $idPanier = $_SESSION["panierId"];
        $sql = "insert into panierplante (plante_id , panier_id, quantite) values (?,?,1)";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../pages/index.php?error=sqlerror");
            exit();
        } else {
            mysqli_stmt_bind_param($stmt, "ii", $id, $idPanier);
            mysqli_stmt_execute($stmt);
            header("Location: ../pages/index.php?success=addedtopanier");
            exit();
        }
    }
}
