<div class="medium-12">
  <ul class="tabs" data-active-collapse="true" data-tabs id="collapsing-tabs">
  <li class="tabs-title is-active medium-6 "><a href="#panel1c" aria-selected="true">Connexion</a></li>
  <li class="tabs-title medium-6 "><a href="#panel2c">Inscription</a></li>
</ul>

<div class="tabs-content" data-tabs-content="collapsing-tabs">
  <div class="tabs-panel is-active" id="panel1c">
    <div class="row">
      <h2>Connexion</h2>
      <form class="" action="" method="post" id="login-form">
        <label for="username">Pseudo</label>
        <input type="text" name="username" value="hanobenjamin" required>
        <label for="password">Mot de passe</label>
        <input type="password" name="password" value="harrogath" required>
        <!-- <input id="login-form" type="submit" class="button" name="" value="Se connecter"> -->

      </form>
      <button class=" button btn btn-default" onclick="submitForm()">Se connecter</button>
  </div>
  </div>
  <div class="tabs-panel" id="panel2c">
    <div class="row">
      <h2>Inscription</h2>
      <form class="" action="" method="post">
        <label for="username">Pseudo</label>
        <input type="text" name="username" value="hanobenjamin" required>
        <label for="email">Adresse Email</label>
        <input type="mail" name="email" value="" required>
        <label for="password">Mot de passe</label>
        <input type="password" name="password" value="" required>
        <label for="verif_pwd">Retaper votre mot de passe</label>
        <input type="password" name="verif_pwd" value="" required>
        <input type="submit" class="button" name="" value="Se connecter">
      </form>
    </div>
  </div>
</div>
</div>
