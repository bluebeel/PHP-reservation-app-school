
<!DOCTYPE html>
<html>
  <head>
    <!--Import Google Icon Font-->
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/css/materialize.min.css">
    <link rel="stylesheet" href="/tw/static/index.css">
    <title>Reservation app</title>

    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  </head>

  <body>
    <nav class="light-blue lighten-1">
    <div class="nav-wrapper">
      <a href="/tw/" class="brand-logo"> Reservation app</a>
      <ul id="nav-mobile" class="right hide-on-med-and-down">
        <li class="active"><a href="/tw/">Accueil</a></li>
        <li><a href="/tw/reservation?action=insert">Reservation</a></li>
      </ul>
    </div>
    </nav>
    <div class="section no-pad-bot" id="index-banner">
      <div class="container">
        <br><br>
        <div class="row center">
          <h4 class="header left blue-text text-lighten-1 col s12">Bienvenue sur Reservation App. </h4>
          <br></br>
          <a href="/tw/reservation?action=insert" class="waves-effect waves-light btn blue">Nouvelle reservation</a>
        </div>
      </div>
    </div>
    <!--Import jQuery before materialize.js-->
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/js/materialize.min.js"></script>
  </body>
</html>
