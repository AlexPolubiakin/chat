       <?php
                    $dbserver 	  = "localhost";
                  	$dbuser 	    = "root";
                  	$dbpwd 		    = "";
                  	$db 		      = "chat";
                  
                  $link = mysqli_connect($dbserver, $dbuser, $dbpwd, $db);
                  if(mysqli_connect_errno() > 0){
                      echo mysqli_connect_error();
                      die;
                  }
                  mysqli_set_charset($link, "utf8");
                  
                  $log = $_SESSION['login'];
                  $sql_get_id = "SELECT user_id FROM chat.users WHERE login='$log'";
                  $result_id = mysqli_query($link,$sql_get_id);
                  $log_id = mysqli_fetch_assoc($result_id);
                  

       ?>
      <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
      </head> 
       
       <div class="row">
          <div class="col-8">
            
            <div class='to_user'>
              <?php 
                if(isset($_GET['id'])){
                  $_SESSION['user_to_id'] = $_GET['id'];
                }
                if(isset($_SESSION['user_to_id'])){
                  echo "Написать пользователю: " . $_SESSION['user_to_id'];
                } else {
                  echo "<p class='text-center'>Адресат сообщения не выбран</p>";
                }
              ?>
            </div>
            <!-- сообщения чата -->
            <div class='chat'>
              <?php 
                if(isset($_GET['id'])){
                  	$usr_id = $_GET['id'];
                  	
                  	$sql_to_id = "SELECT user_id FROM chat.users WHERE login='$usr_id'";
                    $res_to = mysqli_query($link,$sql_to_id);
                    $to_id = mysqli_fetch_assoc($res_to);
                    
                    $to = $to_id['user_id'];
                    $log = $log_id['user_id'];
                    settype($to,"int");
                    settype($log,"int");
                    
                    $sql_get_msgs = "SELECT * FROM messages where to_user='$to' and from_user='$log' or to_user='$log' and from_user='$to'";
                    $res_msg = mysqli_query($link,$sql_get_msgs);
                    $all_msg = mysqli_fetch_all($res_msg,MYSQLI_ASSOC);
                    // print_r($all_msg);
                    
                    foreach ($all_msg as $key => $value) {
                      if($value['from_user'] == $log){
                        echo "<div class='msg'><span class='msg_send'>".$value['msg']."<span class='date'>".$value['msg_time']."</span></span></div>";
                      } else {
                        echo "<div class='msg'><span class='msg_rcv'>".$value['msg']."<span class='date'>".$value['msg_time']."</span></span></div>";
                      }
                    }
                }
                
     
              ?>
 
            </div>
            <!-- форма ввода сообщений -->
                <form action="msghandler.php" method="post">
                  <p><b>Введите ваше сообщение:</b></p>
                  <p><textarea class="form-control" rows="3" cols="50" name="msg"></textarea></p>
                  <p><input class="btn btn-dark" type="submit" value="Отправить сообщение"></p>
                </form>
              
          </div>
          
          <div class="col-4">
            <?php
          include "users.php";
            ?>
          </div>
        </div>
