<?php

if (isset($_POST['login-submit'])) {

    require 'dbh.inc.php';

    $mailuid = $_POST['login-mailuid'];
    $password = $_POST['login-pwd'];


    if (empty($mailuid) || empty($password)){
        header("location: ../login.php?error=emptyfields");
        exit();
    }
    else {
        $sql = "SELECT * FROM users WHERE user_login=? OR user_email=?;";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)){
            header("location: ../login.php?error=sqlerror");
            exit();
        }
        else {
            mysqli_stmt_bind_param($stmt, "ss", $mailuid, $mailuid);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            if ($row = mysqli_fetch_assoc($result)){
                $pwdCheck = password_verify($password, $row['user_pwd']);
                if ($pwdCheck == false){
                    header("location: ../login.php?error=wrongpwd");
                    exit();
                }
                else if ($pwdCheck == true){
                    $uniqueid = $row['unique_id'];
                    if (is_numeric($uniqueid)){
                    header("location: ../login.php?error=notactivated&code=".$uniqueid);
                    exit();

                } else if($uniqueid == 'Y'){
                    session_start();
                    $_SESSION['user_uid'] = $row['user_uid'];
                    $_SESSION['user_id'] = $row['user_id'];

                    header("location: ../index.php?login=success");
                    exit();
                }else if($uniqueid == 'A'){
                    session_start();
                    $_SESSION['admin_user_uid'] = $row['user_uid'];
                    $_SESSION['admin_user_id'] = $row['user_id'];

                    header("location: ../index.php?login=success");
                    exit();


                } }
                else {
                    header("location: ../login.php?error=wrongpwd");
                    exit(); 
                }
        }
        else {
            header("location: ../login.php?error=nouser");
            exit();
        }
    }
}
}
else{
    header("location: ../index.php"); 
    exit();
}