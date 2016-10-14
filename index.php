<?php
define("PATH", dirname(__FILE__));

include_once(PATH . "/models/reservation.php");

session_start();
if (!isset($_SESSION["res"])) {
    $reservation     = new Reservation;
    $_SESSION["res"] = $reservation;
} else {
    $reservation = $_SESSION["res"];
}
// define variables and set to empty values
$destinationErr = "";
$placeErr       = "";
$nameErr        = array();
$ageErr         = array();
$person         = array();
$error          = false;
$refresh        = "";

/** gets the step from current form
 *  the step help us to know where we are in the recording process of a reservation
 **/
$step = isset($_POST['step']) ? $_POST['step'] : NULL;

if ($step && $_SERVER["REQUEST_METHOD"] == "POST") {
    switch ($step) {
        /** Validation of the form, error handling and
         *  redirection to the correct view according to that
         **/
        case 1:
            if (isset($_POST['cancel']) && $_POST['cancel'] == "Annuler la réservation") {
                $reservation     = new Reservation;
                $_SESSION["res"] = $reservation;
                include(PATH . "/views/index.php");
            } else {
                if ($_POST["id_destination"] == "") {
                    $destinationErr = "La destination est requise.";
                    $error          = true;
                } else {
                    $reservation->setDestination(input_validation($_POST["id_destination"]));
                    $destinationErr = "";
                }
                if (empty($_POST["id_place"])) {
                    $placeErr = "Le nombre de place est requis.";
                    $error    = true;
                } else if ((int) input_validation($_POST["id_place"]) < 1 || (int) input_validation($_POST["id_place"]) > 10) {
                    $placeErr = "Veuillez entrer un nombre compris entre 1 et 10.";
                    $error    = true;
                } else {
                    $reservation->setPlace(input_validation($_POST["id_place"]));
                    $placeErr = "";
                }
                if (isset($_POST['id_assurance'])) {
                    $reservation->setAssurance("OUI");
                } else {
                    $reservation->setAssurance("NON");
                }
                $_SESSION["res"] = $reservation;
                if ($error) {
                    include(PATH . "/views/index.php");
                } else {
                    include(PATH . "/views/form2.php");
                }
            }
            break;
        case 2:
            if (isset($_POST['before']) && $_POST['before'] == "Retour à la page précédente") {
                include(PATH . "/views/index.php");
            } elseif (isset($_POST['cancel']) && $_POST['cancel'] == "Annuler la réservation") {
                $reservation     = new Reservation;
                $_SESSION["res"] = $reservation;
                include(PATH . "/views/index.php");
            } else {
                for ($num = 0; $num < $reservation->place(); $num++) {
                    if (empty($_POST["id_nom_" . $num])) {
                        array_push($nameErr, "Le nom est requis.");
                        $error = true;
                    } else {
                        array_push($person, array(
                            input_validation($_POST["id_nom_" . $num])
                        ));
                        array_push($nameErr, "");
                    }
                    if (empty($_POST["id_age_" . $num])) {
                        array_push($ageErr, "L'age est requis.");
                        $error = true;
                    } else if ((int) input_validation($_POST["id_age_" . $num]) < 1) {
                        array_push($ageErr, "Veuillez entrer un age correct.");
                        $error = true;
                    } else {
                        array_push($person[$num], input_validation($_POST["id_age_" . $num]));
                        array_push($ageErr, "");
                    }
                }
                if ($error) {
                    include(PATH . "/views/form2.php");
                } else {
                    $reservation->setPersonne($person);
                    $_SESSION["res"] = $reservation;
                    include(PATH . "/views/form3.php");
                }
            }
            break;
        case 3:
            if (isset($_POST['before']) && $_POST['before'] == "Retour à la page précédente") {
                include(PATH . "/views/form2.php");
            } elseif (isset($_POST['cancel']) && $_POST['cancel'] == "Annuler la réservation") {
                $reservation     = new Reservation;
                $_SESSION["res"] = $reservation;
                include(PATH . "/views/index.php");
            } else {
                include(PATH . "/views/form4.php");
            }
            break;
    }
} else {
    switch ($step) {
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

// Function to validate input to prevent XSS injections.
function input_validation($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>
