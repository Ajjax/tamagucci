<?php
 session_start();
 require_once 'dbcon.php';
 if(isset($_POST['username']) && isset($_POST['password'])) {
$username = trim($_POST['username']);
$user_password = trim($_POST['password']);
$q = $db_con->prepare("SELECT username, password, mail FROM users WHERE username =:username");
$q->execute(array(':username'=>$username));
$userrow = $q->fetch(PDO::FETCH_ASSOC);
if ($q->rowCount() > 0) {
  $_SESSION['username'] = $userrow['username'];
  echo "ok";
}
}
?>
