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
  <div id="step2" class="form-style-5">
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST" name="step2">
      <fieldset>
        <legend><span class="number">2</span> Details des reservations</legend>
        <?php
        for ($num = 1; $num <= $reservation->place(); $num++)
        {
          echo "<input type='text' name='id_nom_".$num."' placeholder='Nom' value=".$reservation->personne()[$num-1][0]." >";
          if ($nameErr != "")
          {
            echo "<span class='error'>* ".$nameErr."</span>";
          }
          echo "<input type='text' name='id_age_".$num."' placeholder='Age' value=".$reservation->personne()[$num-1][1]." >";
          if ($ageErr != "")
          {
            echo "<span class='error'>* ".$ageErr."</span>";
          }
        }
        ?>
      </fieldset>
      <input type="hidden" name="step" value=2>
      <input type="submit" name="next" value="Etape suivante" />
      <input type="submit" name="before" value="Retour à la page précédente" />
      <input type="submit" name="cancel" value="Annuler la réservation" />
    </form>
  </div>
</div>
</body>
</html>
