<?php
include "../includes/dbh.inc.php";
session_start();
echo "<pre>";
print_r($_SESSION);
echo "<pre>";

$idUser = $_SESSION['userid'];
$idArticle = $_GET['idArticle'];
if (isset($_POST['addComm'])) {
    $commentaire = $_POST['commentaire'];

    if (empty($commentaire)) {
        header("Location: ../pages/blogarticle.php?idArticle=$idArticle&&error=epmty");

        exit();
    } else {
        $sql = 'INSERT INTO commentaire (textCommentaire, userID, idArticle ) VALUES (?, ? , ?);';
        $stmt = mysqli_stmt_init($conn);

        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../pages/blogarticle.php?error=sqlerror");
            exit();
        } else {
            mysqli_stmt_bind_param($stmt, "sii", $commentaire, $idUser, $idArticle);
            mysqli_stmt_execute($stmt);
            header("Location: ../pages/blogarticle.php?success=added&idArticle=$idArticle");
            exit();
        }
    }
}
