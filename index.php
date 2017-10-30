<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Foundation for Sites</title>
    <link rel="stylesheet" href="css/app.css">
  </head>
  <body>
    <?php session_start(); ?>
    <?php include('function.php'); ?>
    <div class="main">
      <header>
        <nav>
          <?php if (is_loged()): ?>
            <ul class="menu">
            <li>Bonjour <?php echo $_SESSION['username']; ?></li>
            <li><button type="button" class="button" name="button" onclick="logout()">Déconnexion</button></li>
            </ul>
          <?php endif; ?>
        </nav>
      </header>
      <div class="content medium-6 columns medium-centered">
        <?php if (is_loged()): include('parts/game.php');?>
        <?php else: include('parts/login.php');?>
        <?php endif; ?>
      </div>
    </div>
    <script src="bower_components/jquery/dist/jquery.js"></script>
    <script src="bower_components/what-input/dist/what-input.js"></script>
    <script src="bower_components/foundation-sites/dist/js/foundation.js"></script>
    <script src="js/app.js"></script>
  </body>
</html>
