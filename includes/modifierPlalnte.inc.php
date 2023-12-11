<?php
include "../includes/dbh.inc.php";

if (isset($_POST['editPlante'])) {
    $nomPlante = $_POST['nomPlanteEdit'];
    $prixPlante = $_POST['pricePlanteEdit'];
    // $imagePlante = $_POST['imagePlanteEdit'];
    $catPlante = $_POST['catPlanteEdit'];
    $id = $_POST['id'];



    $img_name = $_FILES['imagePlanteEdit']['name'];
    $img_size = $_FILES['imagePlanteEdit']['size'];
    $tmp_name = $_FILES['imagePlanteEdit']['tmp_name'];
    $error = $_FILES['imagePlanteEdit']['error'];

    $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
    $img_ex_lc = strtolower($img_ex);

    $new_img_name = uniqid("IMG-", true) . '.' . $img_ex_lc;
    $img_upload_path = '../uploads/' . $new_img_name;
    move_uploaded_file($tmp_name, $img_upload_path);


    if (empty($nomPlante) || empty($prixPlante)  || empty($catPlante)) {
        header("Location: ../pages/modifierPlante.php?error=emptyFields");
        exit();
    } else {
        $sql = 'UPDATE plante SET nom = ?, prix = ?, image = ? , idCategorie  = ? WHERE  idPlante  = ? ';
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../pages/dashboard.php?error=sqlerror");
            exit();
        } else {
            mysqli_stmt_bind_param($stmt, "sisii", $nomPlante, $prixPlante, $new_img_name, $catPlante, $id);
            mysqli_stmt_execute($stmt);
            header("Location: ../pages/dashboard.php?success=updated");
            exit();
        }
    }
}
