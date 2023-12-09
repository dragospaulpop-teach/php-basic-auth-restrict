# Basic PHP Authentication System

## Overview
This project is a basic PHP web application implementing user authentication and access control. It uses cookies for session management and includes several PHP scripts to handle different aspects of authentication.

## Files and Functionality
- `index.php`: The main entry point of the application. It checks user access and redirects to either the secret page or the restricted page based on user credentials.
- `is_restricted.php`: Displays an unauthorized access message and provides a link to the login page.
- `logout.php`: Handles user logout by deleting the relevant cookie and redirects to the login page.
- `secret.php`: A protected page that is accessible only to authenticated users.
- `utilitare.php`: Contains utility functions for checking user access and managing cookies.

## How It Works
1. **User Access Check**: The application checks for a specific cookie to determine if the user is allowed access.
2. **Authentication**: User credentials are checked, and if valid, the user is redirected to the secret page.
3. **Access Control**: Unauthorized users are redirected to a restricted access page.

## Installation
1. Clone the repository to your local server environment.
2. Ensure PHP is installed and configured on your server.
3. Access the `index.php` from your web browser to start the application.

## Note
This is a basic implementation meant for educational purposes and should not be used in production as is. Further security measures like HTTPS, more secure cookie handling, and database-driven user management are recommended for production environments.
