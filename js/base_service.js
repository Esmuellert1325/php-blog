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
    }
});