<?php

if (isset($_POST["signup-submit"])) {
    require "dbh.inc.php";
    $name = $_POST["uid"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $repeatedPassword = $_POST["password-repeat"];
    if (empty($name) || empty($email) || empty($password) || empty($repeatedPassword)) {
        header("Location: ../pages/signup.php?error=emptyfields");
        exit();
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z\s]+$/", $name)) {
        header("Location: ../pages/signup.php?error=invalidemailUid");
        exit();
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: ../pages/signup.php?error=invalidemail&uid=" . $name);
        exit();
    } else if (!preg_match("/^[a-zA-Z0-9]*$/", $name)) {
        header("Location: ../pages/signup.php?error=invaliduid&email=" . $email);
        exit();
    } else if ($password !== $repeatedPassword) {
        header("Location: ../pages/signup.php?error=passwordcheck&uid=" . $name . "&email=" . $email);
        exit();
    } else {
        $sql = "select email from utilisateur where email = ? ";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../pages/signup.php?error=sqlerror");
            exit();
        } else {
            mysqli_stmt_bind_param($stmt, "s", $email);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $resCheck = mysqli_stmt_num_rows($stmt);
            if ($resCheck > 0) {
                header("Location: ../pages/signup.php?error=usertaken&uid=" . $name);
                exit();
            } else {
                $sql = "insert into utilisateur (nom , email, passwordUser,idRole ) values (?,?,?,null)";
                $stmt = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    header("Location: ../pages/signup.php?error=sqlerror");
                    exit();
                } else {
                    $hashedpdw = password_hash($password, PASSWORD_DEFAULT);
                    mysqli_stmt_bind_param($stmt, "sss", $name, $email, $hashedpdw);
                    mysqli_stmt_execute($stmt);
                    $lastInsertedID = mysqli_insert_id($conn);
                    session_start();
                    $_SESSION["userid"] = $lastInsertedID;
                    header("Location: ../pages/role.php");
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


