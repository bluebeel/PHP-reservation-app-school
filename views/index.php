
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
        <li class="active"><a href="/tw/">Accueil</a></li>
        <li><a href="/tw/reservation">Reservation</a></li>
      </ul>
    </div>
    </nav>
    <div class="section no-pad-bot" id="index-banner">
      <div class="container">
        <br><br>
        <div class="row left">
          <h4 class="header left blue-text text-lighten-1 col s12">Liste des réservations. </h4>
        </div>
        <div class="row right">
          <a href="/tw/reservation?action=insert" id="download-button" class="btn-floating btn-medium waves-effect waves-light blue"><i class="material-icons">add</i></a>
        </div>
        <div class="row center">
          <table class="centered highlight">
          <thead>
            <tr>
                <th data-field="id">Id</th>
                <th data-field="destination">Destination</th>
                <th data-field="assurance">Assurance</th>
                <th data-field="somme">Total</th>
                <th data-field="nom-age">Nom - Age</th>
                <th data-field="edit">Editer</th>
                <th data-field="delete">Supprimer</th>
            </tr>
          </thead>

          <tbody>
            <?php
            foreach ($reservationList as $value) {
                echo "<tr>";
                echo "<td>".$value["ID"]."</td>";
                echo "<td>".$value["Destination"]."</td>";
                echo "<td>".$value["Assurance"]."</td>";
                echo "<td>".$value["Place"]."</td>";
                echo "<td>";
                foreach (unserialize($value["Personnes"]) as $element) {
                    echo "<li>".$element[0]." - ".$element[1]." ans</li>";
                }
                echo "</td>";
                echo "<td><a href='/tw/reservation?action=edit&id=".$value["ID"]."'>Editer</a></td>";
                echo "<td><a href='/tw/reservation?action=delete&id=".$value["ID"]."'>Supprimer</a></td>";
                echo "</tr>";
            }
            ?>
          </tbody>
          </table>
          <br><br>
        </div>
        <br><br>

      </div>
    </div>
    <!--Import jQuery before materialize.js-->
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/js/materialize.min.js"></script>
  </body>
</html>
