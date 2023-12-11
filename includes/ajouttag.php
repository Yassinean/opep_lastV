<?php
include "../includes/dbh.inc.php";
if (isset($_POST['ajouterTag'])) {
    $nomTag = $_POST['tagName'];
    $themeTag = $_POST['themeTag'];



    echo $nomTag;
    echo $themeTag;
    if (empty($nomTag) || empty($themeTag) ) {
        header("Location: ../pages/dashboard.php?error=emptyFields");
        exit();
    } else {
        $sql = "INSERT INTO tag  VALUES (NULL,'$nomTag',$themeTag)";
        $stmt = mysqli_query($conn,$sql);
       header("Location: ../pages/dashboard.php");
    }
}



