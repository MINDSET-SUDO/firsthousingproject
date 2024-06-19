function calculateValues() {
    // Get input values
    const monthlyRent = parseFloat(document.getElementById('monthlyRent').value) || 0;
    const monthlyPayment = parseFloat(document.getElementById('monthlyPayment').value) || 0;
    const balancesPerMonth = parseFloat(document.getElementById('balancesPerMonth').value) || 0;
    const maintenanceFees = parseFloat(document.getElementById('maintenanceFees').value) || 0;

    // Calculate total and income
    const monthlyTotal = monthlyRent + monthlyPayment;
    const monthlyIncome = monthlyTotal - maintenanceFees;

    // Update output
    document.getElementById('outputMonthlyTotal').textContent = monthlyTotal.toFixed(2);
    document.getElementById('outputBalancesPerMonth').textContent = balancesPerMonth.toFixed(2);
    document.getElementById('outputMonthlyIncome').textContent = monthlyIncome.toFixed(2);
}

document.addEventListener('DOMContentLoaded', () => {
    const toggleButton = document.getElementById('toggle-sidebar');
    const sidebar = document.getElementById('sidebar');

    toggleButton.addEventListener('click', () => {
        sidebar.classList.toggle('active');
    });
});

