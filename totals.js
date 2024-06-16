document.addEventListener('DOMContentLoaded', function() {
    fetch('totals.php')
        .then(response => response.json())
        .then(data => {
            const totalRentElem = document.getElementById('totalRent');
            const totalIncomeElem = document.getElementById('totalIncome');
            const totalFeesElem = document.getElementById('totalFees');

            totalRentElem.textContent = `$${data.totalRent}`;
            totalIncomeElem.textContent = `$${data.totalIncome}`;
            totalFeesElem.textContent = `$${data.totalFees}`;
        })
        .catch(error => console.error('Error fetching totals:', error));
});
