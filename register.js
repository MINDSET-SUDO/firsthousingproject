document.getElementById('registrationForm').addEventListener('submit', function(event) {
    const username = document.getElementById('username').value;
    const userId = document.getElementById('user_id').value;
    const password = document.getElementById('password').value;
    const errorMessage = document.getElementById('error-message');

    if (username === '' || userId === '' || password === '') {
        errorMessage.textContent = 'All fields are required.';
        errorMessage.style.display = 'block';
        event.preventDefault();
    } else {
        errorMessage.style.display = 'none';
    }
});
