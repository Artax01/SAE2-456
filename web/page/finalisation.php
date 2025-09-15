<?php
    require_once '../CAS/session.php';
    require_once '../../php/connexion.php';
    if (!isLoggedIn()) {
        header("Location: ../page/signin.php");
        exit;
    }

    $resNum = "1";
    $comNum = null;
    $cliNum = getId();
    $comDate = null;
    $comHeureRecup = null;
    // $comPrixTotal = (string) str_replace('.', ',', getPrixTotal());
    $comPrixTotal = getPrixTotal();
    $comReducPoints = "0";
    $comReducPromo = "0";
    $comDureeTotalePrepa = "0";
    $successfullySaved = false;

    try {
        $comNumSql = "SELECT (max(COM_NUM) + 1) AS max FROM RAP_COMMANDE";
        $stmt2 = preparerRequetePDO($conn, $comNumSql);
        $stmt2->execute();
        $comNum = $stmt2->fetchColumn();
    }
    catch (PDOException $e) {
        echo "Problème pour récupérer le numéro de commande. <br/>";
    }

    try {
        // $comDate = date("d/m/Y"); (Oracle syntax)
        $comDate = date("Y-m-d H:i:s");
    }
    catch (Exception $e) {
        echo "Problème pour recuperer la date actuelle. <br/>";
    }

    try {
        $date = new DateTime();
        $date->modify('+1 hour');
        $comHeureRecup = $date->format('Y-m-d H:i:s');
    }
    catch (Exception $e) {
        echo "Problème pour recuperer l heure de recuperation de la commande. <br/>";
    }

    if (isset($resNum) && isset($comNum) && isset($cliNum) && isset($comDate) && isset($comHeureRecup) && isset($comPrixTotal) && isset($comReducPoints) && isset($comReducPromo) && isset($comDureeTotalePrepa)) {
        try {
            $conn->beginTransaction();

            // Insertion dans la table RAP_COMMANDE
            $sql = "INSERT INTO RAP_COMMANDE VALUES ('".$resNum."','".$comNum."','".$cliNum."','".$comDate."','".$comHeureRecup."','".$comPrixTotal."','".$comReducPoints."','".$comReducPromo."','".$comDureeTotalePrepa."','0')";
            $stmt = preparerRequetePDO($conn, $sql);
            $stmt->execute();

            // Si tout s'est bien passé, on passe à la deuxième partie
            // Insertion dans la table RAP_APPARTENIR pour chaque plat dans le panier à la commande
            foreach ($_SESSION['panier']['produits'] as $plat) {
                $plaNum = $plat['id'];
                $appQuantite = $plat['quantite'];

                $sql = "INSERT INTO RAP_APPARTENIR VALUES ('".$resNum."','".$comNum."','".$plaNum."','".$appQuantite."')";
                $stmt = preparerRequetePDO($conn, $sql);
                $stmt->execute();
            }

            // Si tout s'est bien passé, on valide la transaction
            // Insertion dans la table RAP_FIDELISATION
            $totsql = "SELECT p.PLA_NB_POINTS * a.APP_QUANTITE AS total_points
                    FROM RAP_APPARTENIR a
                    JOIN RAP_PLAT p ON a.PLA_NUM = p.PLA_NUM
                    WHERE a.RES_NUM = ".$resNum;
    
            $stmt = preparerRequetePDO($conn, $totsql);
            $stmt->execute();
            $totalPoints = $stmt->fetchColumn();

            // $suiDatePoints = date('d/m/Y');
            $suiDatePoints = date('Y-m-d H:i:s');

            $sql = "INSERT INTO RAP_FIDELISATION VALUES ('".$cliNum."','".$suiDatePoints."','".$totalPoints."')";
            $stmt = preparerRequetePDO($conn, $sql);
            $stmt->execute();

            $conn->commit();
        }
        catch (PDOException $e) {
            $conn->rollBack();
            echo "Problème lors de l'enregistrement de la commande. <br/>";
            // Prbl dans la table RAP_COMMANDE
        }

        $successfullySaved = true;

        if (isset($successfullySaved) && $successfullySaved) {
            $_SESSION['panier']['produits'] = [];
            $_SESSION['panier']['menus'] = [];
            $_SESSION['panier']['somme'] = 0;

            // echo "<script>
            //     let secondes = 10;
            //     const timer = document.getElementById('timer');
        
            //     const interval = setInterval(() => {
            //     secondes--;
            //     timer.textContent = secondes;
            //     if (secondes <= 0) {
            //         clearInterval(interval);
            //     }
            //     }, 1000);
            // </script>";
    
        }
    }
?>

<!-- Image de fond + filtre opaque -->
<!-- bg-[url('./web/assets/img/rapidc3.png')] -->
<div class="fixed inset-0 w-full h-full  bg-cover bg-center bg-no-repeat z-0 ">
    <div class="absolute inset-0 bg-black opacity-55"></div>
</div>
<!-- Contenu au-dessus du fond -->
<div class="relative z-10 flex items-center justify-center h-screen w-full">
    <div class="text-center bg-white/90 backdrop-blur-md p-8 rounded-xl shadow-xl max-w-md w-full">
        <h1 class="text-3xl font-bold text-green-600 mb-4">Commande terminée ✅</h1>
        <p class="text-gray-800 mb-2">Merci pour votre commande.</p>
        <p class="text-gray-700">Vous pouvez désormais retourner à <span id="timer" class="font-semibold text-black">l'accueil</span></p>
    </div>
</div>

</body>
</html>
