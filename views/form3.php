
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
          <a class="collection-item blue-text text-lighten-1"><span class="badge">3</span>Validation de la reservation</a>
        </div>
          <form class="col s12" action="/tw/reservation?action=<?php echo $_GET['action'];?>" method="POST" name="step3">
            <div class="wrapper row">
              <div class="col s6">
                <h7 id="id_destination">Destination :</h7>
              </div>
              <div class="col s6 right-align">
                <h7><?php echo $_SESSION['res']->destination(); ?></h7>
              </div>
            </div>
            <div class="wrapper row">
              <div class="col s6"
                <h7 id="id_place">Nombre de places :</h7>
              </div>
              <div class="col s6 right-align">
                <h7><?php echo $_SESSION['res']->place(); ?></h7>
              </div>
            </div>
            <div class="wrapper row">
              <div class="col s6">
                <h7>Assurance annulation :</h7>
              </div>
              <div class="col s6 right-align">
                <h7><?php echo $_SESSION['res']->assurance();?></h7>
              </div>
            </div>
            <table class="centered highlight">
            <thead>
              <tr>
                  <th data-field="id">Nom</th>
                  <th data-field="name">Age</th>
              </tr>
            </thead>

            <tbody>
              <?php
              for ($num = 1; $num <= $_SESSION['res']->place(); $num++) {
                  echo "<tr>";
                  echo "<td>".$_SESSION['res']->personne()[$num-1][0]."</td>";
                  echo "<td>".$_SESSION['res']->personne()[$num-1][1]."</td>";
                  echo "</tr>";
              }
              ?>
            </tbody>
            </table>
            <br><br>
            <input type="hidden" name="step" value=3>
            <button class="btn waves-effect waves-light light-blue lighten-1" type="submit" name="before" value="Retour à la page précédente">Retour à la page précédente
              <i class="material-icons right">fast_rewind</i>
            </button>
            <button class="btn waves-effect waves-light light-blue lighten-1" type="submit" name="next" value="Confirmer">Confirmer
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
