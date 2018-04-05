<?php 
session_start();
/**
 * Отправка сообщений пользователю в базу данных
 * для отправки нужно знать:
 * id_sender
 * id_reciver
 * msg
 * написать функцию обработки и вставки данного сообщения в базу данных
 */
 
	$dbserver 	= "localhost";
	$dbuser 	= "root";
	$dbpwd 		= "";
	$db 		= "chat";

$link = mysqli_connect($dbserver, $dbuser, $dbpwd, $db);
if(mysqli_connect_errno() > 0){
    echo mysqli_connect_error();
    die;
}
mysqli_set_charset($link, "utf8");

$to_id = $_SESSION['user_to_id'];
$from_id = $_SESSION['login']; 
$msg = $_POST['msg'];

$sql_get_from_id = "SELECT user_id FROM chat.users WHERE login='$from_id'";
$result_from = mysqli_query($link,$sql_get_from_id);
$from_id = mysqli_fetch_assoc($result_from);

$sql_get_to_id = "SELECT user_id FROM chat.users WHERE login='$to_id'";
$result_to = mysqli_query($link,$sql_get_to_id );
$to_id = mysqli_fetch_assoc($result_to);

settype($from_id['user_id'],"int");
settype($to_id['user_id'],"int");

$sql = "INSERT INTO chat.messages VALUES(NULL,?,?,?,CURRENT_TIMESTAMP)";
$stmt = mysqli_prepare($link,$sql);
mysqli_stmt_bind_param($stmt,'iis',$to_id['user_id'],$from_id['user_id'],$msg);
mysqli_stmt_execute($stmt);
mysqli_stmt_close($stmt);

header("Location: /?page=chat&id=".$_SESSION['user_to_id']);

?>


