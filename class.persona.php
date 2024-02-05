<?php
  class persona {
    private string $DNI;
    private string $NOM;
    private string $COGNOMS;
    private direccio $DIRECCIO;

    public function __construct($dni, $nom, $cognoms, $direccio) {
      $this->DNI = $dni;
      $this->NOM = $nom;
      $this->COGNOMS = $cognoms;
      $this->DIRECCIO = $direccio;
    }

    function setNom($nom) {
      $this->NOM = $nom;
    }

    function setCognoms($cognoms) {
      $this->COGNOMS = $cognoms;
    }

    function setDNI($dni) {
      $this->DNI = $dni;
    }

    function setDireccio($direccio) {
      $this->DIRECCIO = $direccio;
    }

    function getNom() {
      return $this->NOM;
    } 

    function getCognoms() {
      return $this->COGNOMS;
    }

    function getDNI() {
      return $this->DNI;
    }

    function getDireccio() {
      return $this->DIRECCIO;
    }

    function getNomComplert() {
      return $this->NOM . " " . $this->COGNOMS;
    }
  }
?>