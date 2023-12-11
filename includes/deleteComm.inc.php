<?php
include "../includes/dbh.inc.php";
$id = $_GET['idComm'];
$idArticle = $_GET['idArticle'];
$sql = 'DELETE FROM commentaire WHERE idCommentaire =' . $id . ';';
$stmt = mysqli_stmt_init($conn);
if (!mysqli_stmt_prepare($stmt, $sql)) {
    header("Location: ../pages/blogarticle.php?error=sqlerror");
    exit();
} else {
    mysqli_stmt_execute($stmt);
    header("Location: ../pages/blogarticle.php?success=deleted&&idArticle=$idArticle");
    exit();
}
