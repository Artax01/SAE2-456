<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<div class="relative min-h-screen w-full">

<?php
    require_once '../session/session.php';
    require_once '../../php/connexion.php';
    if (!isLoggedIn()) {
        header("Location: ../page/signin.php");
        exit;
    }
    
    $cliNum = getId();
    //$checkSql = "SELECT * FROM rap_fidelisation WHERE cli_num = ".getId();
    //$stmt = preparerRequetePDO($conn, $checkSql);
    //$stmt->execute();
    //$fidelisation = $stmt->fetch();
    //
    //if ($fidelisation) {
    //    $sql = " UPDATE rap_fidelisation SET total_points = total_points + 20 WHERE cli_num = ".getId();
    //    $stmt = preparerRequetePDO($conn, $sql);
    //    $stmt->execute();
    //} 
    //else {
    //$totsql = "
    //    SELECT SUM(p.PLA_NB_POINTS * cp.QUANTITE) AS total_points
    //    FROM RAP_COMMANDE cp
    //    JOIN RAP_PLAT p on cp.ID_PLAT = p.ID_PLAT
    //    WHERE cp.ID_COMMANDE = ?   
    //";

    $ressql = "
    SELECT RES_NUM
    FROM RAP_COMMANDE
    WHERE CLI_NUM = ?
    ORDER BY COM_DATE DESC, COM_NUM DESC
    FETCH FIRST 1 ROWS ONLY
    ";

    $stmt = preparerRequetePDO($conn, $ressql);
    $stmt->execute([$cliNum]);
    $res_num = $stmt->fetchColumn();

    $totsql = "
    SELECT SUM(p.PLA_NB_POINTS * a.APP_QUANTITE) AS total_points
    FROM RAP_APPARTENIR a
    JOIN RAP_PLAT p ON a.PLA_NUM = p.PLA_NUM
    WHERE a.RES_NUM = ?
    ";

    $stmt = preparerRequetePDO($conn, $totsql);
    $stmt->execute([$res_num]);
    $total_points = $stmt->fetchColumn();


    $insertSql = "INSERT INTO rap_fidelisation (cli_num, sui_date_points, total_points) VALUES (:cli_num, sysdate, :total_points)";
    $stmt = preparerRequetePDO($conn, $insertSql);
    $stmt->execute(['cli_num' => $cliNum, 'total_points' => $total_points]);
    //}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Commande terminée</title>
  <meta http-equiv="refresh" content="10;url=http://localhost/sae2-456-grp2/?page=accueil.php">
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@3.3.2/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="flex items-center justify-center min-h-screen bg-gray-100">

        <!-- Image de fond + filtre opaque -->
    <div class="fixed inset-0 w-full h-full bg-[url('./web/assets/img/rapidc3.png')] bg-cover bg-center bg-no-repeat z-0 ">
        <div class="absolute inset-0 bg-black opacity-55"></div>
    </div>
    <!-- Contenu au-dessus du fond -->
    <div class="relative z-10 flex items-center justify-center h-screen w-full">
        <div class="text-center bg-white/90 backdrop-blur-md p-8 rounded-xl shadow-xl max-w-md w-full">
            <h1 class="text-3xl font-bold text-green-600 mb-4">Commande terminée ✅</h1>
            <p class="text-gray-800 mb-2">Merci pour votre commande.</p>
            <p class="text-gray-700">Redirection vers l'accueil dans <span id="timer" class="font-semibold text-black">10</span> secondes...</p>
        </div>
    </div>
  

    <script>
        let secondes = 10;
        const timer = document.getElementById("timer");

        const interval = setInterval(() => {
        secondes--;
        timer.textContent = secondes;
        if (secondes <= 0) {
            clearInterval(interval);
        }
        }, 1000);
    </script>

</body>
</html>
