<?php

class Reservation
{
    private $_destination;
    private $_place;
    private $_personne;
    private $_assurance;

  // GETTER
  public function destination()
  {
      return $this->_destination;
  }

    public function place()
    {
        return $this->_place;
    }

    public function assurance()
    {
        return $this->_assurance;
    }

    public function personne()
    {
        return $this->_personne;
    }

  // SETTER
  public function setDestination($destination)
  {
      $this->_destination = $destination;
  }

    public function setPlace($place)
    {
        $this->_place = $place;
    }

    public function setAssurance($assurance)
    {
        $this->_assurance = $assurance;
    }

    public function setPersonne($tab)
    {
        $this->_personne = $tab;
    }
}
