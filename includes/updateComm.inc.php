<?php
include "../includes/dbh.inc.php";

$newComment = $_GET['textComment'];
$idComment = $_GET['idComm'];
$idArticle = $_GET['idArticle'];



$sql = 'UPDATE commentaire SET textCommentaire = ? WHERE  idCommentaire   = ? ';
$stmt = mysqli_stmt_init($conn);
if (!mysqli_stmt_prepare($stmt, $sql)) {
    header("Location: ../pages/blogarticle.php?");
    exit();
} else {
    mysqli_stmt_bind_param($stmt, "si", $newComment, $idComment);
    mysqli_stmt_execute($stmt);
    header("Location: ../pages/blogarticle.php?idArticle=$idArticle");
    exit();
}
