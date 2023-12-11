<?php
include "../includes/dbh.inc.php";

if (isset($_POST['editCateg'])) {
    $nomCategEdit = $_POST['nomCategEdit'];
    $id = $_POST['id'];

    if (empty($nomCategEdit) ) {
        header("Location: ../pages/modifierCateg.php?error=emptyFields");
        exit();
    } else {
        $sql = 'UPDATE categorie SET nomCateorie = ? WHERE  idCategorie  = ? ';
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../pages/dashboard.php?error=sqlerror");
            exit();
        } else {
            mysqli_stmt_bind_param($stmt, "si", $nomCategEdit, $id);
            mysqli_stmt_execute($stmt);
            header("Location: ../pages/dashboard.php?success=updated");
            exit();
        }
    }
}
