/**
 * Provides general functionality across the pages
 */
document.addEventListener('DOMContentLoaded', () => {
    // Handling logout
    const logoutBtn = document.getElementById('logout-btn');
    const url = './includes/logoutHandler.php';

    logoutBtn.onclick = () => {
        console.log('Clicked');

        window.location = 'http://localhost/php-blog/logout';
        /*
        fetch(url, {
            method: 'POST'
        })
            .then((response) => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                else {
                    window.location = 'http://localhost/php-blog/login';
                }
            })
            .catch((error) => {
                console.error('There was a problem with the fetch operation:', error);
            });
            */
    }
});