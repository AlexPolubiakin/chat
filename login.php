<?php 
session_start();

include "func.php";

if($_SERVER["REQUEST_METHOD"] == "POST"){
  $_SESSION['login'] = $_POST['login'];
  $_SESSION['password'] = $_POST['password'];
      if(check($_SESSION['login'],$_SESSION['password'])){
          $_SESSION["flag"] = true;
            header("Location: /?page=chat"); 
      } else {
      	echo "<div class='alert alert-danger' role='alert'>Введите верный логин и пароль!</div>";  
      }
  }
?>

<div class="container">
    <h3>Введите ваш логин и пароль:</h3>
    <div class="col-4">
        <form method="post">
          <div class="form-group">
            <label for="exampleInputEmail1">Логин</label>
            <input type="text" class="form-control" name='login' placeholder="Введите ваш логин">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Пароль</label>
            <input type="password" class="form-control" name='password' placeholder="Введите ваш пароль">
          </div>
          <button type="submit" class="btn btn-dark">Вход</button>
        </form>
    </div>
</div>