<!doctype html>
<?php session_start(); ?>
  <?php include('function.php'); ?>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Foundation for Sites</title>
    <link rel="stylesheet" href="css/app.css">
  </head>
  <body user=<?php echo $_SESSION['username'];?> onload="init(this)">
    <div class="main">
      <header class="medium-6 medium-centered columns">
        <nav class="columns">
          <?php if (is_loged()): ?>
            <ul class="menu expanded">
            <li class="">Bonjour <?php echo $_SESSION['username']; ?></li>
            <li class="float-right"><button type="button" class="button " name="button" onclick="logout()">Déconnexion</button></li>
            </ul>
          <?php endif; ?>
        </nav>
      </header>
      <div class="content game_board medium-6 columns medium-centered">
        <?php if (is_loged()): get_tam($username);?>
          <div class="game_content">

            <!-- Gameboard -->
            <div class="panneau">
              <!-- <div class="" id="geoloc">

              </div> -->
              <div class="button" id="city" style="display:table;">

              </div>
              <nav>
                <ul>
                  <li id="pv">
                    <meter value="<?php echo $tamtam->pv; ?>" min="0" low="<?php echo floor($tamtam->pv_max * 0.33); ?>" high="<?php echo floor($tamtam->pv_max * 0.77); ?>" optimum="<?php echo $tamtam->pv_max;?>" max="<?php echo $tamtam->pv_max;?>"></meter>

                    <!-- <?php echo $tamtam->pv; ?> -->
                  </li>
                  </ul>
              </nav>

              <!-- infobulle -->
              <div class="infobulle" onclick="ferme(this)">
                <div class="inner_bulle">
                  <div class="info">
                  </div>
                </div>
                <div class="arrow-down"></div>
              </div>

              <!-- La bestiole -->
              <div class="tamview tamanime"></div>


            </div>
            <div class="board_button">
              <div class="info_tam">
                <ul>
                  <li id="name"><?php echo $tamtam->name;?></li>
                  <!-- <li id="life"><?php echo $tamtam->life; ?></li> -->
                  <li>A mangé le: <span id="miam"><?php
                  $date = new DateTime($tamtam->miam);
                  echo $date->format('d M Y à H:i:s');
                   ?></span></li>
                </ul>
                <ul>
                  <li><button type="button" class="button" name="button" onclick="feed()">Nourrir</button></li>
                  <li><button type="button" class="button" name="button" onclick="shake(this)">Papouille</button></li>
                </ul>
              </div>
              <div class="">

              </div>
            </div>
          </div>
        <?php else:header('Location: index.php'); ?>
        <?php endif; ?>
      </div>
    </div>
    <script src="bower_components/jquery/dist/jquery.js"></script>
    <script src="bower_components/what-input/dist/what-input.js"></script>
    <script src="bower_components/foundation-sites/dist/js/foundation.js"></script>
    <script src="js/app.js"></script>
  </body>
</html>
