<?php 
session_start();

include "func.php";

$_SESSION['login'] = $_POST['login'];
$_SESSION['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);

if(isset($_SESSION['login'])){
  if(registration($_SESSION['login'],$_SESSION['password'])){
  
  echo '<div class="alert alert-success" role="alert">';
  echo '<h4 class="alert-heading">Вы успешно зарегистрировались!</h4>';
  echo '<p>Вы можете использовать логин и пароль для входа.</p>';
  echo '<hr>';
  echo '<p class="mb-0"><a href="?page=login" class="btn btn-dark">Войти</a></p>
</div>';
    
  } else {
  echo "<div class='alert alert-danger' role='alert'>Данный логин уже зарегистрирован!</div>";  
  }
}

?>
<div class="container">
    <h3>Введите ваши данные:</h3>
    <div class="col-4">
        <form method="post">
          <div class="form-group">
            <label for="exampleInputEmail1">Логин:</label>
            <input type="text" class="form-control" id="exampleInputText" name="login" aria-describedby="textHelp" placeholder="Введите ваш логин" required>
            
          </div>
        
          <div class="form-group">
            <label for="exampleInputPassword1">Пароль:</label>
            <input type="password" class="form-control" id="exampleInputPassword1" name="password" placeholder="Введите ваш пароль" required>
          </div>
        
          <button type="submit" class="btn btn-dark">Регистрация</button>
        
        </form>
    </div>
</div>
