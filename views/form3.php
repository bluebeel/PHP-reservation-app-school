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
  <div id="step3" class="form-style-5">
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST" name="step3">
      <fieldset>
        <legend><span class="number">3</span> Validation des reservations</legend>
        <label for="id_destination">Destination:</label>
        <p><?php echo $reservation->destination(); ?></p>
        <label for="id_place">Nombre de places:</label>
        <p><?php echo $reservation->place(); ?></p>
        <?php
        for ($num = 1; $num <= $reservation->place(); $num++)
        {
          echo "<label for='id_nom_".$num."'>Nom</label>";
          echo "<p id='id_nom_".$num."'>".$reservation->personne()[$num-1][0]."</p>";
          echo "<label for='id_age_".$num."'>Age</label>";
          echo "<p id='id_age_".$num."'>".$reservation->personne()[$num-1][1]."</p>";
        }
        ?>
        <label for="id_assurance">Assurance annulation:</label>
        <p><?php echo $reservation->assurance();?></p>
      </fieldset>
      <input type="hidden" name="step" value=3>
      <input type="submit" name="next" value="Confirmer" />
      <input type="submit" name="before" value="Retour à la page précédente" />
      <input type="submit" name="cancel" value="Annuler la réservation" />
    </form>
  </div>
</div>
</body>
</html>
