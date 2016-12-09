<!DOCTYPE html>
<html lang="fr" xmlns="http://www.w3.org/1999/html">
<head>
  <meta charset="utf-8">
  <title>Reservation</title>
  <link rel="stylesheet" type="text/css" href="static/index.css" />
</head>
<body>

  <div>
  </br>
  <div id="step1" class="form-style-5">
    <form action="/tw/test" method="POST" name="step1">
      <fieldset>
        <legend><span class="number">1</span> Reservation</legend>
        <p>Le prix de la place est de 10 euros jusqu'à 12 ans et ensuite de 15 euros.</p>
        <p>Le prix de l'assurance annulation est de 20 euros quel que soit le nombre de voyageurs.</p>
        <input type="text" name="id_destination" placeholder="Destination" value="<?php echo $_SESSION['res']->destination();?>">
        <input type="text" name="id_place" placeholder="Nombre de place" value="<?php echo $_SESSION['res']->place();?>">
        <?php
        if ($placeErr != "")
        {
          echo "<span class='error'>* ".$placeErr."</span>";
        }
        ?>
        <div id="cancel">
        <label for="job">Assurance annulation</label>
        <input name="id_assurance" type="checkbox" <?php if ($_SESSION['res']->assurance() == "OUI") echo "checked";?>>
        </div>
      </fieldset>
      <input type="hidden" name="step" value=1>
      <input type="submit" name="next" value="Etape suivante" />
      <input type="submit" name="cancel" value="Annuler la réservation" />
    </form>
  </div>
</div>
</body>
</html>
