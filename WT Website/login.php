

<?php
include 'mainHeader.php';
?>
<body>

<section class="loginform">
  <!--
    //USDF Logo with a link to PTS - removed due to defomatation on the page and space distribuction//  
    <div class="usdfLogo">
        <a target="_blank" href="https://www.habbousdf.com/pts/"><img src="images\USDF Logo.png" width=10% alt="PTS"></a>
    </div> -->
    <div class="mainText loginText">
        <h1>Login to the <span style="color:#24c175">Work Tracker</span> using your username or email.<br>
        If you have registered and forgot the activation code,<br> you can log in and it will be displayed!</h1>
    </div>

    <div class="message">
    <?php 
        if (!isset($_GET['error'])){
            
        } else {
            $signupCheck = $_GET['error'];

            if ($signupCheck == "emptyfields") {
            echo '<p class="errorMessage">You did not fill all the spaces!</p>';
            include 'includes/login.again.button.inc.php';
            exit();
        } else if($signupCheck == "nouser") {
            echo "<p class='errorMessage'>Username not found! </p>";
            include 'includes/login.again.button.inc.php';
            exit();
        } else if ($signupCheck == "wrongpwd") {
            echo "<p class='errorMessage'>The password is incorrect!</p>";
            include 'includes/login.again.button.inc.php';
            exit();
        }else if ($signupCheck == "notactivated") {
            echo "<p class='activateMessage'>Your account has not been activated yet!
            <br> Follow the instructions on the 
            <br>#account-activation channel on <a class='discordTwo' target='_blank' href='https://discord.gg/Ckzfexw'>Discord</a>!
            <br>Your activation code is ".$_GET['code'].".</p>";
            include 'includes/login.again.button.inc.php';
            exit();    
        } else if($signupCheck == "success"){
            echo "<p class='successMessage'>Your activation request has been submitted! <br>Your activation code is: ".$_GET['code'].". <span style='white-space: nowrap;'>Please contact an Admin to activate your account.</span></p>";
            exit();
        }
    }
    ?>

</div>

    <div class="signup">
        <form action="includes/login.inc.php" method="POST">
            <input class="form-control" type="text" name="login-mailuid" placeholder="Username or USDF Email" autofocus>
            <br>
            <input class="form-control" type="password" name="login-pwd" placeholder="Password" autofocus>
            <br>
            <button class="loginbuttom" type="submit" name="login-submit">Login</button>
        </form>
    </div>
    </section>


</body>
</html>
