<?php
require_once("connexion.php");




function récupérerUnPlat($conn){
    if(isset($_post['bouton'])){
        $platNum= $_post['bouton'];
        return $platNum;
    }
    return null;
}



function enregistrerUneCommande($conn, $platNum, $resNum, $dateRecup){
    if(isset($_post['bouton_payer'])){
        $platNum= $_post['bouton'];
    }
    $sql3=$conn->prepare("SELECT * FROM RAP_PLAT where pla_num = $platNum;");
    $sql3->execute();
    $res = $sql3->fetchAll(PDO::FETCH_ASSOC);
    $prixHT = $res["pla_prix_vente_unit_ht"];
    $dureeTotal=$res["pla_duree_preparation"];
    $tva=$res["pla_tva"];
    $prixTotal=$prixHT*$tva;
    $promo=$res["pla_promotion"];
    $nbPoints= $res["pla_nb_points"];
    


    $sql="INSERT INTO rap_commande (res_num, com_num,  cli_num, com_date, com_heure_recup, com_prix_total, com_reduc_points, com_reduc_promo, com_duree_totale_prepa)VALUES ($resNum, (select Max(com_num)+1 from rap_commande), '124', SYSDATE, TO_DATE($dateRecup, 'YYYY-MM-DD HH24:MI:SS'), $prixTotal, $, 0, 15);";
    $sql2="INSERT INTO rap_appartenir(res_num, com_num, pla_num, app_quantite) values ($resNum, (select Max(com_num)+1 from rap_commande), $platNum, 1)";
    $cur =preparerRequetePDO($conn, $sql);
    $cur2 =preparerRequetePDO($conn, $sql);
    majDonneesPrepareesPDO($cur);
    majDonneesPrepareesPDO($cur2);

}   

?>