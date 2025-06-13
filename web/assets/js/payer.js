function initPayerJS() {
    console.log('initPayerJS appelé');
    const input = document.getElementById('points_utilises');
    const reductionSpan = document.getElementById('reduction-montant');
    if (!input || !reductionSpan) {
        console.log('payer.js : éléments non trouvés');
        return;
    }

    function updateReduction() {
        let val = input.value;
        let reduction = 0;
        if (/^\d+$/.test(val)) {
            reduction = (parseInt(val, 10) * 0.01).toFixed(2).replace('.', ',');
        } else {
            reduction = "0,00";
        }
        reductionSpan.textContent = reduction + " €";
    }

    input.addEventListener('input', updateReduction);
    updateReduction();
}

initPayerJS();