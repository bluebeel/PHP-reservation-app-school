<!DOCTYPE html>
<html lang="fr" xmlns="http://www.w3.org/1999/html">
<head>
  <meta charset="utf-8">
  <!--<meta http-equiv="refresh" content="0";url=http://webmaster.net" >-->
  <title>Reservation</title>
  <link rel="stylesheet" type="text/css" href="static/index.css" />
</head>
<body>

  <div>
  </br>
  <div id="step4" class="form-style-5">
    <fieldset>
      <legend><span class="number">4</span> Confirmation des reservations</legend>

      <p>Votre demande a bien été enregistrée</p>
      <?php
      $somme = 0;
      for ($num = 1; $num <= $reservation->place(); $num++)
      {
        if ($reservation->personne()[$num-1][1] <= "10")
        {
          $somme += 10;
        }
        else {
          $somme += 15;
        }
      }
      echo "<p>Merci de bien vouloir verser la somme de ".$somme." euros sur le compte 000-000000-00</p>";
      ?>
    </fieldset>
    <input type="submit" value="Retour à la page d'accueil" onclick="redirect()"/>
  </div>
</div>
<script>function redirect() {
  <?php $reservation = new Reservation;
  $_SESSION["res"] = $reservation; ?>
  window.location.assign("index.php");
}</script>
</body>
</html>
