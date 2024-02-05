<?php
    $dsn = 'mysql:host=localhost;dbname=escolapia';
    $username = "root";
    $password = "";

    try {
        $pdo = new PDO($dsn, $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        return "Error: " . $e->getMessage();
    }

    function verificarUsuari($id_persona, $contrasenya) {
        global $pdo;
    
        $consulta = $pdo->prepare("SELECT id_persona, contrasenya FROM usuaris WHERE id_persona = :id_persona AND contrasenya = :contrasenya");
        $consulta->bindParam(':id_persona', $id_persona, PDO::PARAM_STR);
        $consulta->bindParam(':contrasenya', $contrasenya, PDO::PARAM_STR);
    
        $consulta->execute();
    
        if ($consulta->rowCount() > 0) {
            return true;
        }
    
        return false;
    }

    function crearDireccio($carrer, $numero, $cp, $provincia, $municipi) {
        global $pdo;

        if (empty($carrer) || empty($numero) || empty($cp) || empty($provincia) || empty($municipi)) {
            return "Error: dades introduïdes no vàlides.";
        } else {
            try {
                $consulta = $pdo->prepare("INSERT INTO direccions (carrer, numero, cp, provincia, municipi) VALUES (:carrer, :numero, :cp, :provincia, :municipi)");
                $consulta->bindParam(':carrer', $carrer, PDO::PARAM_STR);
                $consulta->bindParam(':numero', $numero, PDO::PARAM_INT);
                $consulta->bindParam(':cp', $cp, PDO::PARAM_STR);
                $consulta->bindParam(':provincia', $provincia, PDO::PARAM_STR);
                $consulta->bindParam(':municipi', $municipi, PDO::PARAM_STR);
    
                $consulta->execute();
    
                return $pdo->lastInsertId();
    
            } catch (PDOException $e) {
                return "Error: " . $e->getMessage();
            }
        }
    }

    function crearPersona($dni, $nom, $cognoms, $carrer, $numero, $cp, $provincia, $municipi, $assignatures, $contrasenya) {
        global $pdo;

        $direccio = crearDireccio($carrer, $numero, $cp, $provincia, $municipi);

        if (empty($dni) || empty($nom) || empty($cognoms)) {
            return "Error: dades introduïdes no vàlides.";
        } else {
            try {
                $consulta = $pdo->prepare("INSERT INTO persones (dni, nom, cognoms, direccio) VALUES (:dni, :nom, :cognoms, :direccio)");
                $consulta->bindParam(':dni', $dni, PDO::PARAM_STR);
                $consulta->bindParam(':nom', $nom, PDO::PARAM_STR);
                $consulta->bindParam(':cognoms', $cognoms, PDO::PARAM_STR);
                $consulta->bindParam(':direccio', $direccio, PDO::PARAM_INT);
    
                $consulta->execute();

                crearEstudiant($dni, $assignatures);
                crearUsuari($dni, $contrasenya);

            } catch (PDOException $e) {
                return "Error: " . $e->getMessage();
            }
        }
    }

    function crearEstudiant($id_persona, $assignatures) {
        global $pdo;

        if (empty($id_persona)) {
            return "Error: dades introduïdes no vàlides.";
        } else {
            try {
                $consulta = $pdo->prepare("INSERT INTO estudiants (id_persona) VALUES (:id_persona)");
                $consulta->bindParam(':id_persona', $id_persona, PDO::PARAM_STR);
        
                $consulta->execute();

                $id_estudiant = $pdo->lastInsertId();

                matricularMateries($assignatures, $id_estudiant);
            } catch (PDOException $e) {
                return "Error: " . $e->getMessage();
            }
        }
    }

    function crearUsuari($id_persona, $contrasenya) {
        global $pdo;

        if (empty($contrasenya)) {
            return "Error: dades introduïdes no vàlides";
        } else {
            try {
                $consulta = $pdo->prepare("INSERT INTO usuaris (id_persona, contrasenya) VALUES (:id_persona, :contrasenya)");
                $consulta->bindParam(":id_persona", $id_persona, PDO::PARAM_STR);
                $consulta->bindParam(":contrasenya", $contrasenya, PDO::PARAM_STR);

                $consulta->execute();
            } catch (PDOException $e) {
                return "Error: " . $e->getMessage();
            }
        }
    }

    function matricularMateries($assignatures, $id_estudiant) {
        global $pdo;

        if (empty($assignatures)) {
            return "Error: dades introduïdes no vàlides.";
        } else {
            try {
                foreach ($assignatures as $assignatura) {
                    $consulta = $pdo->prepare("INSERT INTO assignatures_estudiant (id_assignatura, id_estudiant) VALUES (:assignatura, :id_estudiant)");
                    $consulta->bindParam(":assignatura", $assignatura, PDO::PARAM_INT);
                    $consulta->bindParam(":id_estudiant", $id_estudiant, PDO::PARAM_INT);

                    $consulta->execute();
                }
            } catch (PDOException $e) {
                return "Error: " . $e->getMessage();
            }
        }
    }

    function obtindreAssignatures() {
        global $pdo;

        $consulta = $pdo->prepare("SELECT * FROM assignatures");
        $consulta->execute();

        $assignatures = $consulta->fetchAll(PDO::FETCH_ASSOC);

        return $assignatures;
    }

    function obtindreAssignaturesEstudiant() {
        global $pdo;

        try {
            $consulta = $pdo->prepare("SELECT a.nom AS nom_assignatura, ae.nota
                                        FROM assignatures_estudiant ae
                                        JOIN estudiants e ON ae.id_estudiant = e.id_estudiant
                                        JOIN persones p ON e.id_persona = p.dni
                                        JOIN assignatures a ON ae.id_assignatura = a.id_assignatura
                                        WHERE p.dni = :dni");
            $consulta->bindParam(":dni", $_SESSION["dni"], PDO::PARAM_STR);
            $consulta->execute();
    
            $assignatures = $consulta->fetchAll(PDO::FETCH_ASSOC);
    
            return $assignatures;
        } catch (PDOException $e) {
            return "Error: " . $e->getMessage();
        }
    }

    function obtindreEstudiants() {
        global $pdo;

        try {
            $consulta = $pdo->prepare("SELECT e.id_estudiant, CONCAT(p.nom, ' ', p.cognoms) AS nom_cognoms
                                        FROM estudiants e
                                        JOIN persones p ON e.id_persona = p.dni
                                        WHERE e.id_estudiant != 1
                                        ORDER BY e.id_estudiant ASC");
            $consulta->execute();

            $estudiants = $consulta->fetchAll(PDO::FETCH_ASSOC);

            return $estudiants;
        } catch (PDOException $e) {
            return "Error: " . $e->getMessage();
        }
    }
?>
