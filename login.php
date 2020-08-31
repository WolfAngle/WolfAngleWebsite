

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
        If you have registered and forgot the activation code,<br> you can login and it will be displayed!</h1>
    </div>

    <div class="message">
    <?php 
        if (!isset($_GET['signup'])){
            
        } else {
            $signupCheck = $_GET['signup'];

            if ($signupCheck == "empty") {
            echo '<p class="errorMessage">You did not fill all the spaces!</p>';
            include 'submit.again.button.php';
            exit();
        } else if($signupCheck == "invalidemail") {
            echo "<p class='errorMessage'>You used an invalid email!</p>";
            include 'submit.again.button.php';
            exit();
        } else if ($signupCheck == "error") {
            echo "<p class='errorMessage'>You did not fill out the form!</p>";
            include 'submit.again.button.php';
            exit();
        }else if ($signupCheck == "usertaken") {
            echo "<p class='errorMessage'>This Username is already being used!</p>";
            include 'submit.again.button.php';
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
