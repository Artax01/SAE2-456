function modifierQuantite(nomProduit, increment) {
    fetch('modifier_panier.php', {
        method: 'POST', headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        }, body: `nom=${encodeURIComponent(nomProduit)}&increment=${increment}`
    }).then(response => response.text()).then(data => {
        console.log(data); 
        location.reload();
    });
}