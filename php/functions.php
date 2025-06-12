<?php

require_once("connexion.php");


function getAllPlats($conn): array{
    $tab = [];
    
    $req_sql = "SELECT * FROM RAP_PLAT";
    $cur = preparerRequetePDO($conn, $req_sql);
    LireDonneesPDOPreparee($cur, $tab);
    return $tab;
}

function getPlatByType($conn, $type){
    $tab = [];
    
    $req_sql = "SELECT * FROM RAP_$type JOIN RAP_PLAT using(PLA_NUM) WHERE ROWNUM <=3";
    $cur = preparerRequetePDO($conn, $req_sql);
    LireDonneesPDOPreparee($cur, $tab);
    return $tab ?? [];
}

function getNamePlat($conn){
    return ["PIZZA", "KEBAB", "LEGUME", "DESSERT", "BOISSON"];
}


function getImgInfoPerPlats($conn, $pla_num): array{
    $plat = [];
    $req_sql = "SELECT * FROM RAP_PLAT_IMAGE WHERE PLA_NUM=?";
    $cur = preparerRequetePDO($conn, $req_sql);
    majDonneesPrepareesTabPDO($cur, [$pla_num]);
    LireDonneesPDOPreparee($cur, $plat);
    
    return $plat[0] ?? [];
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

function getAllMenus($conn){
    $tab = [];
    
    $req_sql = "SELECT * FROM RAP_PLAT WHERE PLA_MENU = 1 AND ROWNUM<=10";
    $cur = preparerRequetePDO($conn, $req_sql);
    LireDonneesPDOPreparee($cur, $tab);
    return $tab;
}

function getPlatesByMenu($conn, $pla_num){
    $tab = [];
    
    $req_sql = "SELECT * FROM RAP_PLAT WHERE PLA_MENU=1 AND PLA_NUM=?";
    $cur = preparerRequetePDO($conn, $req_sql);
    majDonneesPrepareesTabPDO($cur, [$pla_num]);
    LireDonneesPDOPreparee($cur, $tab);
    if(empty($tab)) return [];

    $newTab = [];
    $plats = [];

    //Premier plat

    $reqSqlPremierPlat = "SELECT * FROM RAP_PLAT WHERE PLA_NUM=SUBSTR(?, 1,1) || '000'";
    $cur = preparerRequetePDO($conn, $reqSqlPremierPlat);
    majDonneesPrepareesTabPDO($cur, [$tab[0]["PLA_NUM"]]);
    LireDonneesPDOPreparee($cur, $newTab);
    array_push($plats, $newTab[0]);

    $reqSqlPremierPlat = "SELECT * FROM RAP_PLAT WHERE PLA_NUM=SUBSTR(?, 2,1) || '00'";
    $cur = preparerRequetePDO($conn, $reqSqlPremierPlat);
    majDonneesPrepareesTabPDO($cur, [$tab[0]["PLA_NUM"]]);
    LireDonneesPDOPreparee($cur, $newTab);
    array_push($plats, $newTab[0]);

    $reqSqlPremierPlat = "SELECT * FROM RAP_PLAT WHERE PLA_NUM=SUBSTR(?, 3,1) || '0'";
    $cur = preparerRequetePDO($conn, $reqSqlPremierPlat);
    majDonneesPrepareesTabPDO($cur, [$tab[0]["PLA_NUM"]]);
    LireDonneesPDOPreparee($cur, $newTab);
    array_push($plats, $newTab[0]);

    $reqSqlPremierPlat = "SELECT * FROM RAP_PLAT WHERE PLA_NUM=SUBSTR(?, 4,1)";
    $cur = preparerRequetePDO($conn, $reqSqlPremierPlat);
    majDonneesPrepareesTabPDO($cur, [$tab[0]["PLA_NUM"]]);
    LireDonneesPDOPreparee($cur, $newTab);
    

    array_push($plats, $newTab[0]);
    
    
    

    return $plats;
}

/*
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
    
}*/
