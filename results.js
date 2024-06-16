document.addEventListener('DOMContentLoaded', function() {
    fetch('fetch_agents.php')
        .then(response => response.json())
        .then(data => {
            const tableBody = document.querySelector('#agentsTable tbody');
            data.forEach(agent => {
                const row = document.createElement('tr');
                row.innerHTML = `
                    <td>${agent.agentName}</td>
                    <td>${agent.plotNumber}</td>
                    <td>${agent.plotMonthlyRent}</td>
                    <td>${agent.monthlyIncome}</td>
                    <td>${agent.date}</td>
                    <td>${agent.maintenanceFees}</td>
                    <td>${agent.transactionCost}</td>
                `;
                tableBody.appendChild(row);
            });
        })
        .catch(error => console.error('Error fetching data:', error));
});
