<?php
include 'mainHeader.php';
?>
<body>
<?php
 if (isset($_SESSION['user_id'])){

    if (isset($_GET['login'])){
        $signupCheck = $_GET['login'];
            if($signupCheck == "success") {
                echo '<p id="hideMe" class="LoginMessage">You have been logged in successfuly!</p>';
          }
        }
        
        
        } else {
            if (isset($_GET['logout'])){
                $signupCheck = $_GET['logout'];
                    if($signupCheck == "success") {
                        echo '<p id="hideMe" class="LoginMessage">You have been logged out successfuly!</p>';
                  }
                }


            echo '<section class="indexText loginform">
            <div class="mainText">
                    <h2>Welcome to the <span style="color:#24c175">WolfAngle</span> official website.<br><br>If you are new, register to receive news about our company, by 
                    <br>clicking the button below!
                    <form action="signup.php">
                    <button class="registerbuttom" >Register</button></form><br><br>
                    Need support? Contact any Staff on our <a class="logo discord" href="">Discord</button></a>.<h1>
                    </h2>
                </div>
            </section>';
          }
        

?>


<?php
    include 'includes\footer.php';
?>
</body>
</html>