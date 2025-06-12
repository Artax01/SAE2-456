<?php
require_once("connexion.php");
require_once("pdo_agile.php");




function récupérerUnPlat($conn){
    if(isset($_post['bouton'])){
        $platNum= $_post['bouton'];
        return $platNum;
    }
    return null;
}



function enregistrerUneCommande($conn, $platNum, $resNum, $dateRecup){
   
   $sql3="SELECT * FROM RAP_PLAT where pla_num= '$platNum'";
   $cur3=preparerRequetePDO($conn, $sql3);
   $tab = array();
   LireDonneesPDOPreparee($cur3,$tab);
   var_dump($tab);

   $prixHT = (double)$tab[0]["PLA_PRIX_VENTE_UNIT_HT"];
   $dureeTotal=$tab[0]["PLA_DUREE_PREPARATION"];
    $tva=(double)$tab[0]["PLA_TVA"];
    $prixTotal=$prixHT+($prixHT*($tva/100));
    $promo=$tab[0]["PLA_PROMOTION"];
    $nbPoints= $tab[0]["PLA_NB_POINTS"];
    var_dump($promo);
    var_dump($prixHT);
    print_r($prixHT);
    var_dump($dureeTotal);
    var_dump($prixTotal);
    var_dump($tva);
   $sql="INSERT INTO rap_commande (res_num, com_num,  cli_num, com_date, com_heure_recup, com_prix_total, com_reduc_points, com_reduc_promo, com_duree_totale_prepa)VALUES ($resNum, (SELECT MAX(com_num) + 1 FROM rap_commande), '124', SYSDATE, TO_DATE('$dateRecup','hh24:mi:ss'), $prixTotal, $promo, $nbPoints, $dureeTotal)";
   $sql2="INSERT INTO rap_appartenir(res_num, com_num, pla_num, app_quantite) values ($resNum, (select Max(com_num)+1 from rap_appartenir), $platNum, 1)";
    $cur =preparerRequetePDO($conn, $sql);
    $cur2 =preparerRequetePDO($conn, $sql2);
    majDonneesPrepareesPDO($cur);
    majDonneesPrepareesPDO($cur2);
    

}   

enregistrerUneCommande($conn, 100, 1, '20:50:00');

?>