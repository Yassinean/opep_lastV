<?php
include "../includes/dbh.inc.php";
if (isset($_POST['ajouterCateg'])) {
    $nomCateg = $_POST['nomCateg'];
 
    if (empty($nomCateg)) {
        header("Location: ../pages/dashboard.php?error=emptyFields");
        exit();
    } else {
        $sql = 'insert into categorie (nomCateorie) values (?);';
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../pages/dashboard.php?error=sqlerror");
            exit();
        } else {
            mysqli_stmt_bind_param($stmt, "s", $nomCateg);
            mysqli_stmt_execute($stmt);
            header("Location: ../pages/dashboard.php?success=added");
            exit();
        }
    }
}
