<?php
include "../includes/dbh.inc.php";

if (isset($_POST['editTheme'])) {
    $nomTheme = $_POST['nomTheme'];
    $descriptionTheme = $_POST['descriptionTheme'];

    $id = $_POST['id'];



    $img_name = $_FILES['imageTheme']['name'];
    $img_size = $_FILES['imageTheme']['size'];
    $tmp_name = $_FILES['imageTheme']['tmp_name'];
    $error = $_FILES['imageTheme']['error'];

    $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
    $img_ex_lc = strtolower($img_ex);

    $new_img_name = uniqid("IMG-", true) . '.' . $img_ex_lc;
    $img_upload_path = '../uploads/' . $new_img_name;
    move_uploaded_file($tmp_name, $img_upload_path);

    // move_uploaded_file($tmp_name, $img_upload_path);
    // echo "File moved to: " . $img_upload_path;

    if (empty($nomTheme) || empty($descriptionTheme)) {
        header("Location: ../pages/modifierTheme.php?error=emptyFields");
        exit();
    } else {
        $sql = 'UPDATE theme SET nomTheme = ?, descriptionTheme = ?, imageTheme = ? WHERE  idTheme  = ? ';
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../pages/dashboard.php?error=sqlerror");
            exit();
        } else {
            mysqli_stmt_bind_param($stmt, "sssi", $nomTheme, $descriptionTheme, $new_img_name, $id);
            mysqli_stmt_execute($stmt);
            header("Location: ../pages/dashboard.php?success=updated");
            exit();
        }
    }
}
