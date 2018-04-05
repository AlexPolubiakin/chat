 <?php
	$dbserver 	= "localhost";
	$dbuser 	= "root";
	$dbpwd 		= "";
	$db 		= "chat";

$link = mysqli_connect($dbserver, $dbuser, $dbpwd, $db);
if(mysqli_connect_errno() > 0){
    echo mysqli_connect_error();
    die;
}
mysqli_query($link,"SET NAMES UTF8");

 
 function registration($login,$password){
  global $link; 
  $flag = false;
  
     $sql = "SELECT login FROM chat.users WHERE login='$login'";
     $result = mysqli_query($link,$sql);
     $row = mysqli_fetch_row($result);
     mysqli_free_result($result);
     
     
  if($row[0]){
      return  $flag;
    }  else {
      // внесение записи в базу данных о логине и пароле
      $sql = "INSERT INTO chat.users VALUES(NULL,?,?,CURRENT_TIMESTAMP)";
      $stmt = mysqli_prepare($link, $sql);
      mysqli_stmt_bind_param($stmt, 'ss', $login, $password);
      $flag = mysqli_stmt_execute($stmt);
      mysqli_stmt_close($stmt);
      return $flag;   
  }
}

// функция проверки пароля в базе данных
function check($login,$psw){
    global $link; 
      $sql = "SELECT password FROM users WHERE login='$login'";
      $result = mysqli_query($link,$sql);
      $hash = mysqli_fetch_row($result);// подумать как возвращать значение конкретного поля
      mysqli_free_result($result);
      mysqli_close($link);
    //   echo $hash[0];
        if (password_verify($psw, $hash[0])) {
          return true;
        } else {
          return false;
        }
}
 
 
 ?>