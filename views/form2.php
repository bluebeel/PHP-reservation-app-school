
<!DOCTYPE html>
<html>
  <head>
    <!--Import Google Icon Font-->
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/css/materialize.min.css">
    <title>Reservation app</title>

    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  </head>

  <body>
    <nav class="light-blue lighten-1">
    <div class="nav-wrapper">
      <a href="/tw/" class="brand-logo"> AirBnB</a>
      <ul id="nav-mobile" class="right hide-on-med-and-down">
        <li><a href="/tw/">Accueil</a></li>
        <li class="active"><a href="/tw/reservation">Reservation</a></li>
      </ul>
    </div>
    </nav>
    <div class="section no-pad-bot" id="index-banner">
      <div class="container">
        <br><br>
        <div class="collection">
          <a class="collection-item blue-text text-lighten-1"><span class="badge">2</span>Détails de la reservation</a>
        </div>
          <form class="col s12" action="/tw/reservation?action=<?php echo $_GET['action'];?>" method="POST" name="step2">
            <?php
          for ($num = 0; $num < $_SESSION['res']->place(); $num++) {
              echo "<div class='input-field col s12'>";
              echo "<input type='text' id='id_nom_". $num ."' name='id_nom_" . $num . "' class='validate'";
              if (!empty($person[$num])) {
                  echo "value=" . $person[$num][0] . " >";
              } else {
                  echo ">";
              }
              echo "<label for='nom" . $num . "'>Nom</label>";
              if (!empty($nameErr) && $nameErr[$num] != "") {
                  echo "<span class='error red-text text-darken-4'>* " . $nameErr[$num] . "</span>";
              }
              echo "</div>";
              echo "<div class='input-field col s12'>";
              echo "<input type='text' id='id_age_". $num ."' name='id_age_" . $num . "' class='validate'";
              if (!empty($person[$num][1])) {
                  echo "value=" . $person[$num][1] . " >";
              } else {
                  echo ">";
              }
              echo "<label for='id_age_" . $num . "'>Age</label>";
              if (!empty($nameErr) && $ageErr[$num] != "") {
                  echo "<span class='error red-text text-darken-4'>* " . $ageErr[$num] . "</span>";
                  echo "<br><br>";
              }
              echo "</div>";
          }
          ?>
            <input type="hidden" name="step" value=2>
            <button class="btn waves-effect waves-light light-blue lighten-1" type="submit" name="before" value="Retour à la page précédente">Retour à la page précédente
              <i class="material-icons right">fast_rewind</i>
            </button>
            <button class="btn waves-effect waves-light light-blue lighten-1" type="submit" name="next" value="Etape suivante">Etape suivante
              <i class="material-icons right">fast_forward</i>
            </button>
            <button class="btn waves-effect waves-light light-blue lighten-1" type="submit" name="cancel" value="Annuler la réservation">Annuler la réservation
              <i class="material-icons left">not_interested</i>
            </button>
          </form>
        <br><br>

      </div>
    </div>
    <!--Import jQuery before materialize.js-->
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/js/materialize.min.js"></script>
  </body>
</html>
