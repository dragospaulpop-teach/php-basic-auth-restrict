<?php
// Check if the 'restrictionat' cookie is set and delete it
if (isset($_COOKIE['restrictionat'])) {
    // Unset the cookie by setting its expiration date to one hour ago
    setcookie('restrictionat', '', time() - 3600);
}
// Redirect to the login page or home page after logout
header('Location: index.php');
?>
