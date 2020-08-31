<?php
    
    //checks if the user submitted the form
    if (isset($_POST['signup'])){
        
        include_once 'dbh.inc.php';

        $username = mysqli_real_escape_string($conn, $_POST['login']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $uid = mysqli_real_escape_string($conn, $_POST['uid']);
        $pwd = mysqli_real_escape_string($conn, $_POST['pwd']);
        $uniqueCode = rand(10000,99999);

        //check if inputs are empty
        if (empty($username) || empty($email) || empty($uid) || empty($pwd)) {

            header("location: ../signup.php?signup=empty");
            exit();
        //checks if the email is valid
     } else if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {

            header("location: ../signup.php?signup=invalidemail");
            exit();
     } else if(!preg_match("/^[a-zA-Z0-9]*$/", $username)) {

            header("location: ../signup.php?signup=invalidusername");
            exit();
     } else {
         $sql = "SELECT user_login FROM users WHERE user_login=?";
         $stmt = mysqli_stmt_init($conn);
         if  (!mysqli_stmt_prepare($stmt, $sql)) {
             
            header("location: ../signup.php?signup=sqlerror");
            exit();
         }
         else {
            mysqli_stmt_bind_param($stmt, "s", $username);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $resultCheck = mysqli_stmt_num_rows($stmt);
            if ($resultCheck > 0) {
                header("location: ../signup.php?signup=usertaken");
                exit();
            }
        else {
            $sql = "INSERT INTO users (user_login, user_email, user_uid, user_pwd, unique_id) VALUES (?, ?, ?, ?, ?);";
            $stmt = mysqli_stmt_init($conn);

            if (!mysqli_stmt_prepare($stmt, $sql)){

                header("location: ../signup.php?signup=sqlerror");
                exit();
            } else {

                $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

                mysqli_stmt_bind_param($stmt, "ssssi", $username, $email, $uid, $hashedPwd, $uniqueCode);
                mysqli_stmt_execute($stmt);
            }
            header("location: ../signup.php?signup=success&code=".$uniqueCode);
            exit();
        }
        }   
      } 
      mysqli_stmt_close($stmt);
      mysqli_close($conn);
    }
        else {
            header("location: ../signup.php?signup=error"); 
            exit();
        }












        
        
    
        


            