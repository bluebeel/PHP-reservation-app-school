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
  <div id="step1" class="form-style-5">
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST" name="step1">
      <fieldset>
        <legend><span class="number">1</span> Reservation</legend>
        <p>Le prix de la place est de 10 euros jusqu'à 12 ans et ensuite de 15 euros.</p>
        <p>Le prix de l'assurance annulation est de 20 euros quel que soit le nombre de voyageurs.</p>
        <input type="text" name="id_destination" placeholder="Destination" value="<?php echo $reservation->destination();?>">
        <?php
        if ($destinationErr != "")
        {
          echo "<span class='error'>* ".$destinationErr."</span>";
        }
        ?>
        <input type="text" name="id_place" placeholder="Nombre de place" value="<?php echo $reservation->place();?>">
        <?php
        if ($placeErr != "")
        {
          echo "<span class='error'>* ".$placeErr."</span>";
        }
        ?>
        <label for="job">Assurance annulation</label>
        <input name="id_assurance" type="checkbox" <?php if ($reservation->assurance() == "OUI") echo "checked";?>>
      </fieldset>
      <input type="hidden" name="step" value=1>
      <input type="submit" name="next" value="Etape suivante" />
      <input type="submit" name="cancel" value="Annuler la réservation" />
    </form>
  </div>
</div>
</body>
</html>
