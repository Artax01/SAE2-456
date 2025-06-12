<?php

require_once("connexion.php");


function getPlats($conn): array{
    $tab = [];
    
    $req_sql = "SELECT * FROM RAP_PLAT";
    $cur = preparerRequetePDO($conn, $req_sql);
    LireDonneesPDOPreparee($cur, $tab);
    return $tab;
}

function getImgInfoPerPlats($conn, $pla_num): array{
    $plat = [];
    $req_sql = "SELECT * FROM RAP_PLAT_IMAGE WHERE PLA_NUM=?";
    $cur = preparerRequetePDO($conn, $req_sql);
    majDonneesPrepareesTabPDO($cur, [$pla_num]);
    LireDonneesPDOPreparee($cur, $plat);
    return $plat[0];
}

function isPlatExist($conn, $pla_num): bool{
    $tab = [];
    $req_sql = "SELECT * FROM RAP_PLAT WHERE PLA_NUM=?";
    $cur = preparerRequetePDO($conn, $req_sql);
    majDonneesPrepareesTabPDO($cur, [$pla_num]);
    LireDonneesPDOPreparee($cur, $tab);
    return !empty($tab);
}

function isClientExist($conn, $cli_num): bool{
    $tab = [];
    $req_sql = "SELECT * FROM RAP_CLIENT WHERE CLI_NUM=?";
    $cur = preparerRequetePDO($conn, $req_sql);
    majDonneesPrepareesTabPDO($cur, [$cli_num]);
    LireDonneesPDOPreparee($cur, $tab);
    return !empty($tab);
}
function payerPlat($conn, $plat_num, $cli_num){
    try{
        if(!isPlatExist($conn, $plat_num)){
            http_response_code(400);
            echo json_encode([
                "error" => "Plat inexistant !",
            ]);
            exit;
        }

        if(!isClientExist($conn, $cli_num) || !isset($_SESSION["CLI_NUM"])){
            http_response_code(400);
            echo json_encode([
                "error" => "Vous devez être connecté pour payer un plat !",
                "redirect" => "login.php"
            ]);
            exit;
        }


    } catch(Exception $e) {
        echo json_encode(["error"=>"Erreur lors du paiement"]);
    }

payerPlat($conn, 1, $cli_num);

}