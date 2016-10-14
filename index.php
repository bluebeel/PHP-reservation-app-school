<?php
define("PATH", dirname(__FILE__));

include_once(PATH . "/models/reservation.php");
session_start();
if (!isset($_SESSION["res"]))
{
  $reservation = new Reservation;
  $_SESSION["res"] = $reservation;

}
else {
  $reservation = $_SESSION["res"];
}
// define variables and set to empty values
$nameErr = $destinationErr = $placeErr = $ageErr = "";
$refresh = "";

// gets the current form
$step = isset($_POST['step']) ? $_POST['step'] : NULL;

if ($step && $_SERVER["REQUEST_METHOD"] == "POST")
{
  switch ($step)
  {
    case 1:
    if (isset($_POST['cancel']) && $_POST['cancel'] == "Annuler la réservation")
    {
      $reservation = new Reservation;
      $_SESSION["res"] = $reservation;
      include(PATH . "/views/index.php");
    }
    else {
      if ($_POST["id_destination"] == "")
      {
        $destinationErr = "La destination est requise.";
      }
      else
      {
        $reservation->setDestination(input_validation($_POST["id_destination"]));
        $destinationErr = "";
      }
      if (empty($_POST["id_place"]))
      {
        $placeErr = "Le nombre de place est requis.";
      }
      else if ((int)input_validation($_POST["id_place"]) < 1 || (int)input_validation($_POST["id_place"]) > 10)
      {
        $placeErr = "Veuillez entrer un nombre compris entre 1 et 10.";
      }
      else
      {
        $reservation->setPlace(input_validation($_POST["id_place"]));
        $placeErr = "";
      }
      if (isset($_POST['id_assurance']))
      {
        $reservation->setAssurance("OUI");
      }
      $_SESSION["res"] = $reservation;
      include(PATH . "/views/form2.php");
    }
    break;
    case 2:
    if (isset($_POST['before']) && $_POST['before'] == "Retour à la page précédente")
    {
      include(PATH . "/views/index.php");
    }
    elseif (isset($_POST['cancel']) && $_POST['cancel'] == "Annuler la réservation")
    {
      $reservation = new Reservation;
      $_SESSION["res"] = $reservation;
      include(PATH . "/views/index.php");
    }
    else {
      $tab = array();
      for ($num = 1; $num <= $reservation->place(); $num++)
      {
        if (empty($_POST["id_nom_".$num]))
        {
          $nameErr = "Le nom est requis.";
        }
        else
        {
          array_push($tab, array(input_validation($_POST["id_nom_".$num])));
          $nameErr = "";
        }
        if (empty($_POST["id_age_".$num]))
        {
          $ageErr = "L'age est requis.";
        }
        else if ((int)input_validation($_POST["id_age_".$num]) < 1)
        {
          $ageErr = "Veuillez entrer un age correct.";
        }
        else
        {
          array_push($tab[$num -1], input_validation($_POST["id_age_".$num]));
          $ageErr = "";
        }
      }
      $reservation->setPersonne($tab);
      $_SESSION["res"] = $reservation;
      include(PATH . "/views/form3.php");
    }
    break;
    case 3:
    if (isset($_POST['before']) && $_POST['before'] == "Retour à la page précédente")
    {
      include(PATH . "/views/form2.php");
    }
    elseif (isset($_POST['cancel']) && $_POST['cancel'] == "Annuler la réservation")
    {
      $reservation = new Reservation;
      $_SESSION["res"] = $reservation;
      include(PATH . "/views/index.php");
    }
    else {
      include(PATH . "/views/form4.php");
    }
    break;
  }
}
else {
  switch ($step)
  {
    case 1:
    include(PATH . "/views/form2.php");
    break;
    case 2:
    include(PATH . "/views/form3.php");
    break;
    case 3:
    include(PATH . "/views/form4.php");
    break;
    default:
    include(PATH . "/views/index.php");
    break;
  }
}

function input_validation($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>
