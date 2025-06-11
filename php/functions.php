<?php

require_once("connexion.php");


function getPlats($conn){
    $req_sql = "SELECT * FROM RAP_PLATS";
    $tab = [];
    $cur = preparerRequetePDO($conn, $req_sql);
    LireDonneesPDOPreparee($cur, $tab);
    var_dump($tab);
}