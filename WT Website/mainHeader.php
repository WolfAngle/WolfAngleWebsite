<?php
  session_start();
?>


<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css?v=<?php echo time(); ?>">
    <meta charset="UTF-8">
    <title>Personal Work Tracker</title>
    <link rel="shortcut icon" type="image/jpg" href="images/favicon.png">
</head>

<header >
    <div class="container">
        <div class="logo backhome">
          <a class="backhome"href="index.php">Personal Work Tracker</a>
        </div>
        <div class="logo">

        <?php
          if (isset($_SESSION['user_id']) || isset($_SESSION['admin_user_uid'])){
            echo '<a class="loginTrue textred" href="includes/logout.inc.php">Logout</a>
            ';
          }
          else {
            echo '<a class="loginLogin <!--loginbutton textred-->" href="login.php">Login</a>
            <a class="discordLink" target="_blank" href="https://discord.gg/Ckzfexw">Discord</a>';
          }
        ?>


        </div>
    </div>
</header>