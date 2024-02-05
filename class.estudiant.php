<?php
  class estudiant extends persona {
    private string $IDESTUDIANT;
    private array $ASSIGNATURES;

    public function __construct($persona, $idestudiant, $assignatures) {
        parent::__construct(
            $persona->getDNI(),
            $persona->getNom(),
            $persona->getCognoms(),
            $persona->getDireccio()
        );
        
      $this->IDESTUDIANT = $idestudiant;
      $this->ASSIGNATURES = $assignatures;
    }

    function getIDESTUDIANT() {
      return $this->IDESTUDIANT;
    }

    function getAssignatures() {
      return $this->ASSIGNATURES;
    }

    function setAssignatures($assignatures) {
      $this->ASSIGNATURES = $assignatures;
    }

    function setIDESTUDIANT($idest) {
      $this->IDESTUDIANT = $idest;
    }
  }
?>