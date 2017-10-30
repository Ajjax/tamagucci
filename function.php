<!-- loged function -->

<?php
class tam {
public function __construct(array $arguments = array()) {
  if (!empty($arguments)) {
      foreach ($arguments as $property => $argument) {
          $this->{$property} = $argument;
      }
  }
}
}

function is_loged(){
  if ( isset($_SESSION['username'])) {
    global $username ;
    $username = $_SESSION['username'];

    return true;
  }
  return false;
}

function get_tam($tam){
  require('\function\dbcon.php');
  if ($tam) {
    $query = $db_con->prepare("SELECT * FROM tam WHERE owner =:tam");
    $query->execute(array(':tam'=>$tam));
    $tamrow = $query->fetch(PDO::FETCH_ASSOC);
    if ($query->rowCount() > 0) {
        $_SESSION['tamtam'] = $tamrow['name'];
        global $tamtam;
        $tamtam = new tam();
        $tamtam->name = $tamrow['name'];
        $tamtam->life = $tamrow['life'];
        $tamtam->owner = $tamrow['owner'];
        $tamtam->miam = $tamrow['miam'];

      // echo "<div>Ton tam</div><div><span>Nom: </span>".$tamtam->name."</div><div><span>Pts de vie: </span>".$tamtam->life."</div>";
    }
  }
}
?>
