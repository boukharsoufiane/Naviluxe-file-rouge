<?php

require_once("../PHP/db.php");

class gestion{
    private $etat;

    public function __construct($etat){
        $this->etat = $etat;
    }

    public function gestion_paiement($con){
        $etat = $con->real_escape_string($this->etat);
        $sql = "SELECT a.id_agence, a.nom_agence, SUM(p.amount) AS total_price FROM payments p INNER JOIN reservation r ON r.id_reservation = p.id_reservation INNER JOIN bateau b ON b.id_bateau = r.id_bateau INNER JOIN agence a ON a.id_agence = b.id_agence WHERE p.payment_status ='$etat' GROUP BY a.id_agence, a.nom_agence";
        $query = $con->query($sql);
        return $query;
    }
}

class gestion_paye{
    private $etat_paye;

    public function __construct($etat_paye){
        $this->etat_paye = $etat_paye;
    }

    public function gestion_payer($con){
        $etat_paye = $con->real_escape_string($this->etat_paye);
        $sql = "SELECT a.id_agence, a.nom_agence, SUM(p.amount) AS total_price FROM payments p INNER JOIN reservation r ON r.id_reservation = p.id_reservation INNER JOIN bateau b ON b.id_bateau = r.id_bateau INNER JOIN agence a ON a.id_agence = b.id_agence WHERE p.payment_status ='$etat_paye' GROUP BY a.id_agence, a.nom_agence";
        $query = $con->query($sql);
        return $query;
    }
}

class update_paiement{
    private $id_agence;

    public function __construct($id_agence){
        $this->id_agence = $id_agence;
    }

    public function updatePaiement($con){
        $id_agence = $this->id_agence;
        $sql = "UPDATE payments p INNER JOIN reservation r ON r.id_reservation = p.id_reservation INNER JOIN bateau b ON b.id_bateau = r.id_bateau INNER JOIN agence a ON a.id_agence = b.id_agence SET p.payment_status = 'Paye' WHERE a.id_agence = '$id_agence'";
        $query = $con->query($sql);
        return $query;
    }
}

if(isset($_POST["liste_paiement"])){
    $etat = "Non Paye";
    $etat_paye ="Paye";
    $liste = new gestion($etat);
    $payer = new gestion_paye($etat_paye);
    $result = $liste->gestion_paiement($con);
    $result_paye = $payer->gestion_payer($con);
    
    $listPaiement ="";
    $listAlreadyPaye="";
    
    if($result){
        if($result->num_rows > 0){
            while ($row = $result->fetch_assoc()) {
                $agence = $row["id_agence"];
                $button = "";
                if ($agence != "") {
                    $button = '<button type="submit" name="validerPaiement" class="btn btn-primary">Valider</button>';
                }
                $listPaiement .= '<tr>
                    <td>' . $row["nom_agence"] . '</td>
                    <td>' . $row["total_price"] . '</td>
                    <td>
                        <form action="gestion_paiement.php" method="post">
                            <input type="hidden" name="id_agence" value="' . $row["id_agence"] . '" />
                            ' . $button . '
                        </form>
                    </td>
                </tr>';
            }
            
            
        }
    }
    if($result_paye){
        if($result_paye->num_rows > 0){
            while($row_paye = $result_paye->fetch_assoc()){
                $listAlreadyPaye .='<tr>
                <td>'.$row_paye["nom_agence"].'</td>
                <td>'.$row_paye["total_price"].'</td>
              </tr>';
            }
    
        }
    }
    
}elseif(isset($_POST["validerPaiement"])){
    $id_agence = $_POST["id_agence"];
    $paiement = new update_paiement($id_agence);
    $result = $paiement->updatePaiement($con);
    if($result){
        header("Location: index.php?paiement=true");
    }
}


  
?>
  
