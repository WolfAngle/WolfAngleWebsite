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

<header>
    <div class="container">
        <div class="logo backhome">
          <a class="backhome"href="index.php">Personal Work Tracker - Test Version</a>
        </div>
        <div class="logo">

        <?php
          if (isset($_SESSION['user_uid']) || isset($_SESSION['admin_user_uid'])){
            echo '<a class="loginTrue textred" href="includes/logout.inc.php">Logout</a></div></div></header>';
              if (isset($_SESSION['user_uid'])){
                $user_uid_logged = $_SESSION['user_uid'];
              } else if (isset($_SESSION['admin_user_uid'])){
                $user_uid_logged = $_SESSION['admin_user_uid'];
              };
              echo '<section>
              <div class="inside">
                  <div class="insidetext insidebox">
                      <ul class="insidelist">
                          <li><a class="insidetext " href="htmltest.php?module=1" >Profile</a></li>
                          <li><a class="insidetext " href="htmltest.php?module=2" >Global Standings</a></li>
                          <li><a class="insidetext " href="htmltest.php?module=3" >Submit Points</a></li>
                          <li><a class="insidetext " href="htmltest.php?module=4" >Confirmations</a></li>
                          <!-- <li><a class="insidetext " href="htmltest.php?module1" >Profile</a></li> --> ';
                        
                            if (isset($_SESSION['admin_user_uid'])){
                              echo '<li><a class="insidetext " href="htmltest.php?module=5" >Admin</a></li>';
                            };
                          
                       echo '</ul>
                  </div>';
                  
                  if (isset($_GET['module'])){
                        $module = $_GET['module'];
                            if($module == "1") {
                  echo '    <div class="insidedata">     
                              <p>	Lorem ipsum a arcu platea tincidunt nostra vitae lacinia dapibus etiam, scelerisque volutpat viverra aliquet quam erat cursus vehicula quam interdum,
                                  libero viverra orci aliquam tincidunt quis aliquam imperdiet diam. fusce suscipit viverra eget dolor ligula class massa tincidunt amet ullamcorper, 
                                  non at elit euismod vitae quisque facilisis fermentum cras, etiam posuere arcu maecenas sem quisque orci aliquam iaculis. porttitor senectus et ipsum 
                                  tristique aptent convallis etiam facilisis orci lobortis tellus pharetra, consequat inceptos nulla accumsan vivamus ultrices potenti purus nulla sit tempus.
                                  nulla euismod semper magna a fermentum faucibus adipiscing pulvinar quis, tortor feugiat pretium consectetur tempor sit vestibulum iaculis dictumst, sapien 
                                  molestie tristique sit primis et primis proin. </p>
                            </div>';
                      } else if($module == "2") {
                        echo '<div class="insidedata">
                                <p>	Hello '.$user_uid_logged.'!</p>
                              </div>';
                      }else if($module == "3") {
                        echo '<div class="insidedata">
                                <p>	Hi!</p>
                              </div>';
                      }else if($module == "4") {
                        echo '<div class="insidedata">
                                <p>	Sup!</p>
                              </div>';
                      }else if($module == "5" && isset($_SESSION['admin_user_uid'])) {
                        echo '<div class="insidedata">
                                <p>	Dude!</p>
                              </div>';
                      }else if($module == "5" && !isset($_SESSION['admin_user_uid'])){
                        echo '<div class="adminerror">
                                <p>Error! You do not have access to that module!</p>
                                </div>';
                      }
                  }
          
              echo '</div>
          
          </section>
          </html>';




          }
          else {
            echo '<a class="loginLogin <!--loginbutton textred-->" href="login.php">Login</a>
            <a class="discordLink" target="_blank" href="https://discord.gg/Ckzfexw">Discord</a></header>';
          }
        ?>
        </div>
    </div>
</header>
