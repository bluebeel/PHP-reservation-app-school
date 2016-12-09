<?php
include_once(PATH . "/models/reservation.php");

function reservationController($view, $db)
{
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
    $action = "";



  /** gets the step from current form
   *  the step help us to know where we are in the recording process of a reservation
   **/

    $step = isset($_POST['step']) ? $_POST['step'] : null;

    if (isset($_GET['action'])) {
        $action = $_GET['action'];
    } else {
        $action = null;
    }
    if (isset($_GET['id'])) {
        $_SESSION["id"] = $_GET['id'];
    } else {
        $_SESSION["id"] = null;
    }

    switch ($action) {
      case "insert":
      if ($step && $_SERVER["REQUEST_METHOD"] == "POST") {
          switch ($step) {
            /** Validation of the form, error handling and
             *  redirection to the correct view according to that
             **/

            case 1:
                if (isset($_POST['cancel']) && $_POST['cancel'] == "Annuler la réservation") {
                    $reservation     = new Reservation;
                    $_SESSION["res"] = $reservation;
                    $view->display('index.php');
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
                    } elseif ((int) input_validation($_POST["id_place"]) < 1 || (int) input_validation($_POST["id_place"]) > 10) {
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
                        $view->assign("placeErr", $placeErr);
                        $view->assign("destinationErr", $destinationErr);
                        $view->display('form1.php');
                    } else {
                        $view->display('form2.php');
                    }
                }
                break;
            case 2:
                if (isset($_POST['before']) && $_POST['before'] == "Retour à la page précédente") {
                    $view->assign("placeErr", $placeErr);
                    $view->assign("destinationErr", $destinationErr);
                    $view->display('form1.php');
                } elseif (isset($_POST['cancel']) && $_POST['cancel'] == "Annuler la réservation") {
                    $reservation     = new Reservation;
                    $_SESSION["res"] = $reservation;
                    $view->display('index.php');
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
                        } elseif ((int) input_validation($_POST["id_age_" . $num]) < 1) {
                            array_push($ageErr, "Veuillez entrer un age correct.");
                            $error = true;
                        } else {
                            array_push($person[$num], input_validation($_POST["id_age_" . $num]));
                            array_push($ageErr, "");
                        }
                    }
                    $_SESSION["res"] = $reservation;
                    if ($error) {
                        $view->assign("person", $person);
                        $view->assign("nameErr", $nameErr);
                        $view->assign("ageErr", $ageErr);
                        $view->display('form2.php');
                    } else {
                        $reservation->setPersonne($person);
                        $_SESSION["res"] = $reservation;
                        $view->display('form3.php');
                    }
                }
                break;
            case 3:
                if (isset($_POST['before']) && $_POST['before'] == "Retour à la page précédente") {
                    $view->assign("person", $person);
                    $view->assign("nameErr", $nameErr);
                    $view->assign("ageErr", $ageErr);
                    $view->display('form2.php');
                } elseif (isset($_POST['cancel']) && $_POST['cancel'] == "Annuler la réservation") {
                    $reservation     = new Reservation;
                    $_SESSION["res"] = $reservation;
                    $view->display('index.php');
                } else {
                    $result = $db->connect()->prepare("INSERT INTO reservation(Destination, Place, Assurance, Personnes) VALUES (?, ?, ?, ?)");
                    $result->bind_param("ssss", $Destination, $Place, $Assurance, $Personnes);
                    $Destination = $_SESSION["res"]->destination();
                    $Place = $_SESSION["res"]->place();
                    $Assurance = $_SESSION["res"]->assurance();
                    $Personnes = serialize($_SESSION["res"]->personne());
                    $result->execute();
                    $result->close();
                    $reservation     = new Reservation;
                    $_SESSION["res"] = $reservation;
                    $view->display('form4.php');
                }
                break;
        }
      } else {
          switch ($step) {
            case 1:
                $view->display('form2.php');
                break;
            case 2:
                $view->display('form3.php');
                break;
            case 3:
                $view->display('form4.php');
                break;
            default:
                $view->assign("reservation", $reservation);
                $view->assign("placeErr", $placeErr);
                $view->assign("destinationErr", $destinationErr);
                $view->display('form1.php');
                break;
        }
      }
      break;
      case "edit":
      if ($step && $_SERVER["REQUEST_METHOD"] == "POST") {
          switch ($step) {
            /** Validation of the form, error handling and
             *  redirection to the correct view according to that
             **/

            case 1:
                if (isset($_POST['cancel']) && $_POST['cancel'] == "Annuler la réservation") {
                    $reservation     = new Reservation;
                    $_SESSION["res"] = $reservation;
                    $view->display('index.php');
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
                    } elseif ((int) input_validation($_POST["id_place"]) < 1 || (int) input_validation($_POST["id_place"]) > 10) {
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
                        $view->assign("placeErr", $placeErr);
                        $view->assign("destinationErr", $destinationErr);
                        $view->display('form1.php');
                    } else {
                        $view->assign("person", $_SESSION["res"]->personne());
                        $view->display('form2.php');
                    }
                }
                break;
            case 2:
                if (isset($_POST['before']) && $_POST['before'] == "Retour à la page précédente") {
                    $view->assign("placeErr", $placeErr);
                    $view->assign("destinationErr", $destinationErr);
                    $view->display('form1.php');
                } elseif (isset($_POST['cancel']) && $_POST['cancel'] == "Annuler la réservation") {
                    $reservation     = new Reservation;
                    $_SESSION["res"] = $reservation;
                    $view->display('index.php');
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
                        } elseif ((int) input_validation($_POST["id_age_" . $num]) < 1) {
                            array_push($ageErr, "Veuillez entrer un age correct.");
                            $error = true;
                        } else {
                            array_push($person[$num], input_validation($_POST["id_age_" . $num]));
                            array_push($ageErr, "");
                        }
                    }
                    $_SESSION["res"] = $reservation;
                    if ($error) {
                        $view->assign("person", $person);
                        $view->assign("nameErr", $nameErr);
                        $view->assign("ageErr", $ageErr);
                        $view->display('form2.php');
                    } else {
                        $reservation->setPersonne($person);
                        $_SESSION["res"] = $reservation;
                        $view->display('form3.php');
                    }
                }
                break;
            case 3:
                if (isset($_POST['before']) && $_POST['before'] == "Retour à la page précédente") {
                    $view->assign("person", $person);
                    $view->assign("nameErr", $nameErr);
                    $view->assign("ageErr", $ageErr);
                    $view->display('form2.php');
                } elseif (isset($_POST['cancel']) && $_POST['cancel'] == "Annuler la réservation") {
                    $reservation     = new Reservation;
                    $_SESSION["res"] = $reservation;
                    $view->display('index.php');
                } else {
                    $result = $db->connect()->prepare("UPDATE reservation SET Destination=?, Place=?, Assurance=?, Personnes=? WHERE ID=?");
                    $result->bind_param("ssssi", $Destination, $Place, $Assurance, $Personnes, $id);
                    var_dump($result);
                    $id = (int)$_SESSION["id"];
                    $Destination = $_SESSION["res"]->destination();
                    $Place = $_SESSION["res"]->place();
                    $Assurance = $_SESSION["res"]->assurance();
                    $Personnes = serialize($_SESSION["res"]->personne());
                    $result->execute();
                    var_dump($result);
                    $result->close();
                    $reservation     = new Reservation;
                    $_SESSION["res"] = $reservation;
                    $view->display('form4.php');
                }
                break;
        }
      } else {
          switch ($step) {
            case 1:
                $view->display('form2.php');
                break;
            case 2:
                $view->display('form3.php');
                break;
            case 3:
                $view->display('form4.php');
                break;
            default:
                $result = $db->select("SELECT * FROM reservation WHERE ID=".$_SESSION["id"]."");
                var_dump($result);
                $_SESSION["res"]->setDestination($result[0]["Destination"]);
                $_SESSION["res"]->setPlace($result[0]["Place"]);
                $_SESSION["res"]->setAssurance($result[0]["Assurance"]);
                $_SESSION["res"]->setPersonne(unserialize($result[0]["Personnes"]));
                $view->assign("reservation", $reservation);
                $view->assign("placeErr", $placeErr);
                $view->assign("destinationErr", $destinationErr);
                $view->display('form1.php');
                break;
        }
      }
      break;
      case "delete":
      $result = $db->query("DELETE FROM reservation WHERE ID=".$_SESSION["id"]."");
      header("Location: /tw/");
      die();
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
