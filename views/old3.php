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
    <form action="/tw/test" method="POST" name="step3">
      <fieldset>
        <legend><span class="number">3</span> Validation des reservations</legend>
        <div class="entry">
          <label for="id_destination">Destination:</label>
          <span><?php echo $_SESSION['res']->destination(); ?></span>
        </div>
        <div class="entry">
          <label for="id_place">Nombre de places:</label>
          <span><?php echo $_SESSION['res']->place(); ?></span>
        </div>
        <?php
        for ($num = 1; $num <= $_SESSION['res']->place(); $num++)
        {
          echo '<div class="entry_name">';
            echo "<label for='id_nom_".$num."'>Nom</label>";
            echo "<span id='id_nom_".$num."'>".$_SESSION['res']->personne()[$num-1][0]."</span>";
          echo '</div>';
          echo '<div class="entry_name">';
            echo "<label for='id_age_".$num."'>Age</label>";
            echo "<span id='id_age_".$num."'>".$_SESSION['res']->personne()[$num-1][1]."</span>";
          echo '</div>';
        }
        ?>
        <div class="entry">
          <label for="id_assurance">Assurance annulation:</label>
          <span><?php echo $_SESSION['res']->assurance();?></span>
        </div>
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
