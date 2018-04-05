<?php session_start(); ?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="my.css">

    <title>Chat iT!</title>
  </head>
  <body>
    
      <div class='container'>
       <div class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="collapse navbar-collapse">
                <a class="navbar-brand" href="<?php echo $header = $_SESSION['flag'] ? '?page=chat' : '/'; ?>">Chat It!</a>
            </div>
            
            <?php if(isset($_SESSION['login']) and $_SESSION['flag']){ ?>
            <div class="float-right">
                
			    <span class="text-light">Вы вошли как: <?php echo $_SESSION['login']; ?></span>
          <a href="?page=logout" class="btn btn-outline-light">Выход</a>
            </div>
            
            <?php } else { ?>
            
            <div class="float-right">
			    
			    <a href="?page=login" class="btn btn-outline-light">Вход</a>
                <a href="?page=register" class="btn btn-outline-light">Регистрация</a>

            </div>
            
            <?php } ?>
        </div> <!-- navbar -->
        
        <div class="content">
                          <?php 
                    if (isset($_GET['page'])){
                    $q = trim(strip_tags($_GET['page']));
                    switch ( $q ) {
                      case 'login' :          include "login.php"; break;
                      case 'register' :       include "register.php"; break;
                      case 'chat' :           include "chat.php"; break;
                      case 'logout' :         include "logout.php"; break;
                      default :               include "info.php"; break;
                    }
                } else {
                  if(isset($_SESSION['flag'])){
                    include "chat.php"; 
                  } else {
                    include "info.php"; 
                  }
                }
                

                ?>
                
        </div> <!-- content -->
        

      </div><!-- container -->
      
      
      
    

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>