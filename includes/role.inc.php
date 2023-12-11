<?php

if (isset($_POST["role-submit"])) {
    require "dbh.inc.php";
    $role = $_POST["role"];
    session_start();
    $id = $_SESSION["userid"];

    if (empty($role)) {
        header("Location: ../pages/role.php?error=emptyfields");
        exit();
    } else {
        $sql = "update utilisateur set idRole = ? where idUser = ? ";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../pages/role.php?error=sqlerror");
            exit();
        } else {
            mysqli_stmt_bind_param($stmt, "sd", $role, $id);
            mysqli_stmt_execute($stmt);
            if ($role == "1") {
                session_start();
                $_SESSION["admin"] = "admin";
                $sql = "SELECT nom FROM `utilisateur` WHERE idUser = $id;";
                $result = mysqli_query($conn, $sql);
                if ($result) {
                    $row = mysqli_fetch_assoc($result);
                    $_SESSION["name"] = $row["nom"];
                    header("Location: ../pages/dashboard.php");
                    exit();
                } else {
                    echo "Error executing SQL: " . mysqli_error($conn);
                }
                header("Location: ../pages/dashboard.php");
                exit();
            } else if ($role == "2") {
                $sql2 = "insert into panier (idUser ) values (?)";
                $stmt2 = mysqli_stmt_init($conn);
                session_start();
                $lastInsertedID = mysqli_insert_id($conn);
                $_SESSION["panierId"] = $lastInsertedID;

                $sql = "SELECT * FROM utilisateur
                        JOIN panier ON utilisateur.idUser = panier.idUser
                        WHERE utilisateur.email = ?";

                $stmt = mysqli_stmt_init($conn);

                if (mysqli_stmt_prepare($stmt, $sql)) {
                    mysqli_stmt_bind_param($stmt, "s", $userid);
                    mysqli_stmt_execute($stmt);
                    $result = mysqli_stmt_get_result($stmt);
                    $row = mysqli_fetch_assoc($result);
                    $idP = $row['idPanier'];
                }
                $_SESSION["client"] = "client";
                $_SESSION["idUser"] = $row["idUser"];
                $_SESSION["useremail"] = $row["email"];


                if (!mysqli_stmt_prepare($stmt2, $sql2)) {
                    echo "error";
                } else {
                    mysqli_stmt_bind_param($stmt2, "i", $id);
                    mysqli_stmt_execute($stmt2);
                    mysqli_stmt_close($stmt2);

                    header("Location: ../pages/index.php");
                    exit();
                }
            }
        }
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
} else {
    header("Location: ../pages/signup.php?");
    exit();
}
