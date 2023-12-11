<?php
if (isset($_POST["login-submit"])) {
    require "dbh.inc.php";
    $userid = $_POST["userId"];
    $password = $_POST["password"];
    if (empty($userid) || empty($password)) {
        header("Location: ../pages/index.php?error=emptyfields");
        exit();
    } else {
        $sql = "select * from utilisateur where email = ? ";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../pages/index.php?error=sqlerror");
            exit();
        } else {
            mysqli_stmt_bind_param($stmt, "s", $userid);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            $row = mysqli_fetch_assoc($result);

            if ($row) {
                $pwdCheck = password_verify($password, $row["passwordUser"]);
                if ($pwdCheck == false) {
                    header("Location: ../pages/index.php?error=nouser");
                    exit();
                } else if ($pwdCheck == true) {
                    if ($row["idRole"] == "2") {
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
                        session_start();
                        $_SESSION["panierId"] = $idP;
                        $_SESSION["client"] = "client";
                        $_SESSION["userid"] = $row["idUser"];
                        $_SESSION["useremail"] = $row["email"];

                        header("Location: ../pages/index.php");
                        exit();
                    } else if ($row["idRole"] == "1") {
                        session_start();
                        $_SESSION["admin"] = "admin";
                        $_SESSION["username"] = $row["nom"];
                        $_SESSION["useremail"] = $row["email"];
                        header("Location: ../pages/dashboard.php");
                        exit();
                    }
                } else {
                    header("Location: ../pages/index.php?error=nouser");
                    exit();
                }
            } else {
                header("Location: ../pages/index.php?error=nouser");
                exit();
            }
        }
    }
} else {
    header("Location: ../index.php?");
    exit();
}
