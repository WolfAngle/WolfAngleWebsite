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
    <div class="mainText">
        <h1>Hello! Welcome to the <span style="color:#24c175">Personal Work Tracker</span> for USDF.<br> 
        Please sign up following the instructions given to you!<br>Also join us on Discord to get your
        account activated!
    </h1>
    </div>

    <div class="message">
    <?php 
        /* $fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        if (strpos($fullUrl, "signup=empty") == true) {
            echo '<p class="errorMessage">You did not fill all the spaces!</p>';
            include 'submit.again.button.php';
            exit();
        }else if (strpos($fullUrl, "signup=invalidemail") == true) {
            echo "<p class='errorMessage'>You used an invalid email!</p>";
            include 'submit.again.button.php';
            exit();
        }else if (strpos($fullUrl, "signup=error") == true) {
            echo "<p class='errorMessage'>You did not fill out the form!</p>";
            include 'submit.again.button.php';
            exit();
        }else if (strpos($fullUrl, "signup=success") == true) {
            echo "<p class='successMessage'>Your activation request has been submitted! <br>Your activation code is: ".$_GET['code'].". <span style='white-space: nowrap;'>Please contact an Admin to activate <br>
             account.</span></p>";
            exit();
        } */

        if (!isset($_GET['signup'])){
            
        } else {
            $signupCheck = $_GET['signup'];

            if ($signupCheck == "empty") {
            echo '<p class="errorMessage">You did not fill all the spaces!</p>';
            include 'includes/submit.again.button.inc.php';
            exit();
        } else if($signupCheck == "invalidemail") {
            echo "<p class='errorMessage'>You used an invalid email!</p>";
            include 'includes/submit.again.button.inc.php';
            exit();
        } else if ($signupCheck == "error") {
            echo "<p class='errorMessage'>You did not fill out the form!</p>";
            include 'includes/submit.again.button.inc.php';
            exit();
        }else if ($signupCheck == "usertaken") {
            echo "<p class='errorMessage'>This Username is already being used!</p>";
            include 'includes/submit.again.button.inc.php';
            exit();    
        } else if($signupCheck == "success"){
            echo "<p class='successMessage'>Your activation request has been submitted! <br>Your activation code is: ".$_GET['code'].". <span style='white-space: nowrap;'>
            Please contact an Admin to activate <br>
             account.</span></p>";
            exit();
        }
    }
    ?>

</div>

    <div class="signup">
        <form action="includes/signup.inc.php" method="POST">
            <input class="form-control" type="text" name="login" placeholder="Username" autofocus>
            <br>
            <input class="form-control" type="text" name="email" placeholder="USDF E-mail" autofocus>
            <br>
            <input class="form-control" type="text" name="uid" placeholder="Habbo Name" autofocus>
            <br>
            <input class="form-control" type="password" name="pwd" placeholder="Password" autofocus>
            <br>
            <button class="signupbuttom hover" type="submit" name="signup">Sign up</button>
        </form>
    </div>
    </section>


</body>
</html>
