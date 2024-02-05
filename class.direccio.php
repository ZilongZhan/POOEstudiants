<?php
  class direccio {
    private string $CARRER;
    private int $NUMERO;
    private string $CP;
    private string $PROVINCIA;
    private string $MUNICIPI;

    public function __construct($carrer, $numero, $cp, $provincia, $municipi) {
      $this->CARRER = $carrer;
      $this->NUMERO = $numero;
      $this->CP = $cp;
      $this->PROVINCIA = $provincia;
      $this->MUNICIPI = $municipi;
    }

    function setCarrer($carrer) {
      $this->CARRER = $carrer;
    }

    function setNumero($numero) {
      $this->NUMERO = $numero;
    }

    function setCodiPostal($cp) {
      $this->CP = $cp;
    }

    function setProvincia($provincia) {
      $this->PROVINCIA = $provincia;
    }

    function setMunicipi($municipi) {
      $this->MUNICIPI = $municipi;
    }

    function getCarrer() {
      return $this->CARRER;
    }

    function getNumero() {
      return $this->NUMERO;
    }

    function getCodiPostal() {
      return $this->CP;
    }

    function getProvincia() {
      return $this->PROVINCIA;
    }

    function getMunicipi() {
      return $this->MUNICIPI;
    }
  }
?>