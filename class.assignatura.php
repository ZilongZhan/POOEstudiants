<?php
  class assignatura {
    private string $NOM;
    private int $CREDITS;

    public function __construct($nom, $credits) {
      $this->NOM = $nom;
      $this->CREDITS = $credits;
    }

    function setNom($nom) {
      $this->NOM = $nom;
    }

    function setCredits($credits) {
      $this->CREDITS = $credits;
    }

    function getNom() {
      return $this->NOM;
    }

    function getCredits() {
      return $this->CREDITS;
    }
  }
?>