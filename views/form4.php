
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
      <a href="/tw/" class="brand-logo"> Reservation app</a>
      <ul id="nav-mobile" class="right hide-on-med-and-down">
        <li><a href="/tw/">Accueil</a></li>
        <li class="active"><a href="/tw/reservation?action=insert">Reservation</a></li>
      </ul>
    </div>
    </nav>
    <div class="section no-pad-bot" id="index-banner">
      <div class="container">
        <br><br>
        <div class="collection">
          <a class="collection-item blue-text text-lighten-1"><span class="badge">4</span>Confirmation de la reservation</a>
        </div>
        <div class="row">
          <div class="col s12">
            <div class="card-panel light-blue lighten-1">
              <span class="white-text">
                <?php
                echo "Votre demande a bien été enregistrée.";
                echo "<br>";
                echo "Merci de bien vouloir verser la somme de ".$sum." euros sur le compte 000-000000-00";
                ?>
              </span>
            </div>
          </div>
        </div>
      </div>
    </div>
</body>
</html>
