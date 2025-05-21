<!DOCTYPE html>

<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- 
        S'il vous plaît ne supprimez pas ces balises script:
        elles servent à utliser TailwindCSS ainsi que Preline, 
        deux frameworks complémentaire.
    -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/preline@latest/dist/preline.js"></script>
</head>
<body>


    <?php
        echo "<h2>Bienvenue sur l'application web de la SAE2-456</h2>"."</br>";
    ?>


    <script>
        window.addEventListener('load', () => {
            window.HSStaticMethods.autoInit();
        });
    </script>
</body>
</html>