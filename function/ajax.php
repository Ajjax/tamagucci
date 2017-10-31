<?php
require('dbcon.php');
// global $username;
if (isset($_GET['get_tam'])) {

  $tam = $_GET['get_tam'];

  $query = $db_con->prepare("SELECT * FROM tam WHERE owner =:tam");
  $query->execute(array(':tam'=>$tam));
  $tamrow = $query->fetch(PDO::FETCH_ASSOC);
  if ($query->rowCount() > 0) {


    $date_creation = date_create_from_format("Y-m-d H:i:s",  $tamrow['miam'] );
    $tamrow['miam'] = date_format($date_creation, "d/m/Y à H:i:s");

    echo json_encode($tamrow);
  }
}


if (isset($_POST['feed'])) {
  $feed = $_POST['feed'];
  $username = $_POST['user'];
  // $thedate = $_POST['date'];
$date_creation = date_create_from_format("d/m/Y à H:i:s",$_POST['date']);
$thedate = date_format($date_creation, "Y-m-d H:i:s");
    // $date = date_create_from_format("d/m/Y H:i:s", $thedate);
  // $bonne_date = date_format($date, "Y-m-d");
  $query = $db_con->prepare("UPDATE tam SET pv=:feed , miam =:miam WHERE owner=:username");
  $query->execute(array(':feed'=>$feed,':username'=>$username,':miam'=>date($thedate)));
}
 ?>
