
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
          <a class="collection-item blue-text text-lighten-1"><span class="badge">1</span>Reservation</a>
        </div>
          <form class="col s12" action="/tw/reservation?action=<?php echo $_GET['action'];?>" method="POST" name="step1">
            <div class="row">
              <div class="input-field col s12">
                <input value="<?php echo $_SESSION['res']->destination();?>" id="id_destination" type="text" name="id_destination" class="validate">
                 <?php if ($destinationErr != "") {
    echo "<span class='error red-text text-darken-4'>* ".$destinationErr."</span>";
}?>
                <label for="id_destination">Destination</label>
              </div>
              <div class="input-field col s12">
                <input id="id_place" type="text" name="id_place" value="<?php echo $_SESSION['res']->place();?>" class="validate">
                <?php
                if ($placeErr != "") {
                    echo "<span class='error red-text text-darken-4'>* ".$placeErr."</span>";
                }
                ?>
                <label for="id_place">Nombre de place</label>
              </div>
            </div>
            <div class="row">
              <input class="light-blue lighten-1" type="checkbox" id="id_assurance" name="id_assurance" <?php if ($_SESSION['res']->assurance() == "OUI") {
                    echo "checked";
                }?>/>
              <label for="id_assurance">Assurance annulation</label>
            </div>
            <input type="hidden" name="step" value=1>
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
