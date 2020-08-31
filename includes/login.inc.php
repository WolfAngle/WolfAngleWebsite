<?php

if (isset($_POST['login-submit'])) {

    require 'dbh.inc.php';

    $mailuid = $_POST['login-mailuid'];
    $password = $_POST['login-pwd'];


    if (empty($mailuid) || empty($password)){
        header("location: ../index.php?error=emptyfields");
        exit();
    }
    else {
        $sql = "SELECT * FROM users WHERE user_login=? OR user_email=?;";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)){
            header("location: ../index.php?error=sqlerror");
            exit();
        }
        else {
            mysqli_stmt_bind_param($stmt, "ss", $mailuid, $mailuid);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            if ($row = mysqli_fetch_assoc($result)){
                $pwdCheck = password_verify($password, $row['user_pwd']);
                if ($pwdCheck == false){
                    header("location: ../index.php?error=wrongpwd");
                    exit();
                }
                else if ($pwdCheck == true){
                    session_start();
                    $_SESSION['user_uid'] = $row['user_uid'];
                    $_SESSION['user_id'] = $row['id'];

                    header("location: ../index.php?login=success");
                    exit();
                }
                else {
                    header("location: ../index.php?error=wrongpwd");
                    exit(); 
                }
        }
        else {
            header("location: ../index.php?error=nouser");
            exit();
        }
    }
}
}
else{
    header("location: ../index.php"); 
    exit();
}