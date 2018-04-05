    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<p>Выбор пользователя для чата: </p>
<?php
include "func.php";
global $link;
    $sql = "SELECT user_id,login FROM chat.users";
     $result_users = mysqli_query($link,$sql);
     while ($row = mysqli_fetch_assoc($result_users)){
         echo "<div class='row'><a href=?page=chat&id=" . $row['login'] . " class='btn btn-outline-dark'>". $row['login'] ." </a></div>";
     }
     
