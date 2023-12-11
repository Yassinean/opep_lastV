<?php
include "../includes/dbh.inc.php";
if (isset($_POST['ajouterPlante'])) {
    $nomPlante = $_POST['nomPlante'];
    $prixPlante = $_POST['pricePlante'];
    // $imagePlante = $_POST['imagePlante'];
    $catPlante = $_POST['catPlante'];


    $img_name = $_FILES['imagePlante']['name'];
    $img_size = $_FILES['imagePlante']['size'];
    $tmp_name = $_FILES['imagePlante']['tmp_name'];
    $error = $_FILES['imagePlante']['error'];


    $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
    $img_ex_lc = strtolower($img_ex);

    $new_img_name = uniqid("IMG-", true) . '.' . $img_ex_lc;
    $img_upload_path = '../uploads/' . $new_img_name;
    move_uploaded_file($tmp_name, $img_upload_path);




    if (empty($nomPlante) || empty($prixPlante)  || empty($catPlante)) {
        header("Location: ../pages/dashboard.php?error=emptyFields");
        exit();
    } else {
        $sql = 'insert into plante (nom,prix,image,idCategorie) values (?,?,?,?);';
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../pages/dashboard.php?error=sqlerror");
            exit();
        } else {
            mysqli_stmt_bind_param($stmt, "sisi", $nomPlante, $prixPlante, $new_img_name, $catPlante);
            mysqli_stmt_execute($stmt);
            header("Location: ../pages/dashboard.php?success=added");
            exit();
        }
    }
}



